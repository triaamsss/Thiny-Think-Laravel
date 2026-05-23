<?php

namespace App\Http\Controllers;

use App\Data\HijaiyahData;
use App\Models\Player;
use App\Models\QuizScore;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class GameController extends Controller
{
    public function enterForm(Request $request): View|RedirectResponse
    {
        if ($token = session('player_token')) {
            if (Player::where('session_token', $token)->exists()) {
                return redirect()->route('game.modules');
            }
        }
        return view('play.enter');
    }

    public function enterSubmit(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'name' => 'required|string|max:100',
        ]);

        $token = Str::random(32);
        Player::create([
            'name'          => $data['name'],
            'classroom_id'  => null,
            'session_token' => $token,
        ]);

        session(['player_token' => $token]);
        return redirect()->route('game.modules');
    }

    public function modules(Request $request): View
    {
        $player = $request->player;
        $player->load('quizScores', 'classroom');
        $unlocked = $player->unlockedModules();

        $basicScore    = $player->quizScores->firstWhere('quiz_type', 'basic');
        $advancedScore = $player->quizScores->firstWhere('quiz_type', 'advanced');

        return view('play.modules', compact('player', 'unlocked', 'basicScore', 'advancedScore'));
    }

    // ── Modul 1: Belajar Huruf Dasar ─────────────────────────────────────────
    public function learnBasic(Request $request): View
    {
        $player = $request->player;
        if (! $player->learned_basic) {
            $player->update(['learned_basic' => true]);
        }
        
        // GANTI DI SINI: Bungkus dengan array_values()
        $letters = array_values(HijaiyahData::basicLetters());
        
        return view('modules.learn-basic', compact('letters'));
    }

    // ── Modul 2: Belajar Harakat Fathah ──────────────────────────────────────
    public function learnFathah(Request $request): View|RedirectResponse
    {
        $player = $request->player;
        if (! $player->learned_basic) {
            return redirect()->route('game.modules')->with('info', 'Pelajari Huruf Dasar terlebih dahulu!');
        }
        if (! $player->learned_fathah) {
            $player->update(['learned_fathah' => true]);
        }
        
        // GANTI DI SINI: Bungkus dengan array_values()
        $letters = array_values(HijaiyahData::fatahLetters());
        
        return view('modules.learn-fathah', compact('letters'));
    }
    
    // ── Modul 3: Kuis Dasar ───────────────────────────────────────────────────
    public function quizBasic(Request $request): View|RedirectResponse
    {
        $player = $request->player;
        if (! $player->learned_fathah) {
            return redirect()->route('game.modules')->with('info', 'Pelajari Harakat Fathah terlebih dahulu!');
        }
        $questions = $this->buildBasicQuestions();
        return view('modules.quiz-basic', compact('questions'));
    }

    public function submitBasicScore(Request $request): JsonResponse
    {
        $data = $request->validate([
            'score'   => 'required|integer|min:0|max:100',
            'correct' => 'required|integer|min:0',
            'total'   => 'required|integer|min:1',
        ]);

        $player = $request->player;
        QuizScore::updateOrCreate(
            ['player_id' => $player->id, 'quiz_type' => 'basic'],
            [
                'score'           => $data['score'],
                'correct_answers' => $data['correct'],
                'total_questions' => $data['total'],
                'completed_at'    => now(),
            ]
        );

        return response()->json(['success' => true, 'redirect' => route('game.result')]);
    }

    // ── Modul 4: Game Pencocokkan Huruf ──────────────────────────────────────
    public function quizAdvanced(Request $request): View|RedirectResponse
    {
        $player = $request->player;
        if (! $player->hasCompletedBasic()) {
            return redirect()->route('game.modules')->with('info', 'Selesaikan Kuis Dasar terlebih dahulu!');
        }
        $questions = $this->buildMatchingQuestions();
        return view('modules.quiz-advanced', compact('questions'));
    }

    public function submitAdvancedScore(Request $request): JsonResponse
    {
        $data = $request->validate([
            'score'   => 'required|integer|min:0|max:100',
            'correct' => 'required|integer|min:0',
            'total'   => 'required|integer|min:1',
        ]);

        $player = $request->player;
        QuizScore::updateOrCreate(
            ['player_id' => $player->id, 'quiz_type' => 'advanced'],
            [
                'score'           => $data['score'],
                'correct_answers' => $data['correct'],
                'total_questions' => $data['total'],
                'completed_at'    => now(),
            ]
        );

        return response()->json(['success' => true, 'redirect' => route('game.result')]);
    }

    public function result(Request $request): View
    {
        $player = $request->player;
        $player->load('quizScores', 'classroom');
        $basicScore    = $player->quizScores->firstWhere('quiz_type', 'basic');
        $advancedScore = $player->quizScores->firstWhere('quiz_type', 'advanced');
        return view('play.result', compact('player', 'basicScore', 'advancedScore'));
    }

    public function leave(Request $request): RedirectResponse
    {
        session()->forget('player_token');
        return redirect()->route('welcome')->with('success', 'Terima kasih sudah belajar!');
    }

    // ── Build soal Kuis Dasar ─────────────────────────────────────────────────
    // 10 soal diacak:
    //   3 soal visual-basic  : huruf Arab tanpa harakat di bulatan, tebak nama latin  (option: basicLetters)
    //   3 soal visual-fathah : huruf Arab berharakat di bulatan, tebak bunyi (option: fatahLetters -> sound)
    //   4 soal audio         : klik suara, tebak huruf (option: basicLetters arabic+latin)
    private function buildBasicQuestions(): array
    {
        $allBasic = collect(HijaiyahData::basicLetters());
        $allFatah = collect(HijaiyahData::fatahLetters());

        // 3 soal visual-basic
        $visualBasic = $allBasic->shuffle()->take(3)->map(function ($letter) use ($allBasic) {
            $wrong = $allBasic->filter(fn($l) => $l['name'] !== $letter['name'])->shuffle()->take(3);
            $options = $wrong->push($letter)->shuffle()->map(fn($item) => [
                'latin'  => $item['name'],
                'arabic' => $item['arabic'],
                'sound'  => null,
            ])->values();
            return [
                'type'          => 'visual',
                'subtype'       => 'basic',
                'arabic'        => $letter['arabic'],
                'name'          => $letter['name'],
                'sound'         => null,
                'image'         => null,
                'audio'         => $letter['audio'],
                'options'       => $options->all(),
                'correct_index' => $options->search(fn($o) => $o['latin'] === $letter['name']),
            ];
        })->values();

        // 3 soal visual-fathah (option tampilkan bunyi: a, ba, ta, ...)
        $visualFatah = $allFatah->shuffle()->take(3)->map(function ($letter) use ($allFatah) {
            $wrong = $allFatah->filter(fn($l) => $l['sound'] !== $letter['sound'])->shuffle()->take(3);
            $options = $wrong->push($letter)->shuffle()->map(fn($item) => [
                'latin'  => $item['sound'],
                'arabic' => $item['arabic'],
                'sound'  => $item['sound'],
            ])->values();
            return [
                'type'          => 'visual',
                'subtype'       => 'fathah',
                'arabic'        => $letter['arabic'],
                'name'          => $letter['name'],
                'sound'         => $letter['sound'],
                'image'         => null,
                'audio'         => $letter['audio'],
                'options'       => $options->all(),
                'correct_index' => $options->search(fn($o) => $o['sound'] === $letter['sound']),
            ];
        })->values();

        // 4 soal audio dari basicLetters (option arabic + latin)
        $audio = $allBasic->shuffle()->take(4)->map(function ($letter) use ($allBasic) {
            $wrong = $allBasic->filter(fn($l) => $l['name'] !== $letter['name'])->shuffle()->take(3);
            $options = $wrong->push($letter)->shuffle()->map(fn($item) => [
                'latin'  => $item['name'],
                'arabic' => $item['arabic'],
                'sound'  => null,
            ])->values();
            return [
                'type'          => 'audio',
                'subtype'       => 'basic',
                'arabic'        => $letter['arabic'],
                'name'          => $letter['name'],
                'sound'         => null,
                'image'         => $letter['image'],
                'audio'         => $letter['audio'],
                'options'       => $options->all(),
                'correct_index' => $options->search(fn($o) => $o['latin'] === $letter['name']),
            ];
        })->values();

        // Gabung & acak urutan
        return $visualBasic->concat($visualFatah)->concat($audio)->shuffle()->values()->all();
    }

    // ── Build soal Pencocokkan ────────────────────────────────────────────────
    // 5 soal diacak:
    //   3 soal basic  : arabic tanpa harakat <-> nama latin (Alif, Ba, ...)
    //   2 soal fathah : arabic berharakat <-> bunyi sound (A, Ba, Ta, ...)
    private function buildMatchingQuestions(): array
    {
        $allBasic = collect(HijaiyahData::basicLetters())->shuffle();
        $allFatah = collect(HijaiyahData::fatahLetters())->shuffle();

        $questions = [];

        // 3 soal basic
        $basicPool = $allBasic->take(9)->values();
        for ($i = 0; $i < 3; $i++) {
            $group = $basicPool->slice($i * 3, 3);
            $questions[] = [
                'subtype' => 'basic',
                'pairs'   => $group->map(fn($l) => [
                    'arabic' => $l['arabic'],
                    'name'   => $l['name'],
                ])->values()->all(),
            ];
        }

        // 2 soal fathah (tile = bunyi: a, ba, ta, ...)
        $fatahPool = $allFatah->take(6)->values();
        for ($i = 0; $i < 2; $i++) {
            $group = $fatahPool->slice($i * 3, 3);
            $questions[] = [
                'subtype' => 'fathah',
                'pairs'   => $group->map(fn($l) => [
                    'arabic' => $l['arabic'],
                    'name'   => $l['sound'],
                ])->values()->all(),
            ];
        }

        // Acak urutan 5 soal
        return collect($questions)->shuffle()->values()->all();
    }
}