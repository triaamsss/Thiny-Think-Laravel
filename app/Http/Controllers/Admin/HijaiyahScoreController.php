<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Player;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use League\Csv\Writer;
use SplTempFileObject;

class HijaiyahScoreController extends Controller
{
    public function index(Request $request): View
    {
        $query = Player::with('quizScores')->latest();

        if ($request->filled('name')) {
            $query->where('name', 'like', '%' . $request->name . '%');
        }

        if ($request->boolean('has_basic')) {
            $query->whereHas('quizScores', fn($q) => $q->where('quiz_type', 'basic'));
        }

        if ($request->boolean('has_advanced')) {
            $query->whereHas('quizScores', fn($q) => $q->where('quiz_type', 'advanced'));
        }

        $players = $query->paginate(50)->withQueryString();

        return view('admin.hijaiyah.scores', compact('players'));
    }

    public function exportCsv(Request $request): Response
    {
        $query = Player::with('quizScores')->latest();

        if ($request->filled('name')) {
            $query->where('name', 'like', '%' . $request->name . '%');
        }

        $players = $query->get();

        $csv = Writer::createFromFileObject(new SplTempFileObject());
        $csv->insertOne(['Nama Siswa', 'Kuis Dasar (%)', 'Benar Dasar', 'Pencocokkan Huruf (%)', 'Benar Lanjut', 'Tanggal Bergabung']);

        foreach ($players as $player) {
            $basic    = $player->quizScores->firstWhere('quiz_type', 'basic');
            $advanced = $player->quizScores->firstWhere('quiz_type', 'advanced');

            $csv->insertOne([
                $player->name,
                $basic    ? $basic->score    : '-',
                $basic    ? $basic->correct_answers . '/' . $basic->total_questions : '-',
                $advanced ? $advanced->score : '-',
                $advanced ? $advanced->correct_answers . '/' . $advanced->total_questions : '-',
                $player->created_at->format('d/m/Y H:i'),
            ]);
        }

        $filename = 'nilai-hijaiyah-' . now()->format('Ymd-His') . '.csv';

        return response((string) $csv, 200, [
            'Content-Type'        => 'text/csv; charset=UTF-8',
            'Content-Disposition' => "attachment; filename=\"{$filename}\"",
        ]);
    }

    public function exportSelectedCsv(Request $request): Response
    {
        $ids     = $request->input('ids', []);
        $players = Player::with('quizScores')->whereIn('id', $ids)->latest()->get();

        $csv = Writer::createFromFileObject(new SplTempFileObject());
        $csv->insertOne(['Nama Siswa', 'Kuis Dasar (%)', 'Benar Dasar', 'Pencocokkan Huruf (%)', 'Benar Lanjut', 'Tanggal Bergabung']);

        foreach ($players as $player) {
            $basic    = $player->quizScores->firstWhere('quiz_type', 'basic');
            $advanced = $player->quizScores->firstWhere('quiz_type', 'advanced');

            $csv->insertOne([
                $player->name,
                $basic    ? $basic->score    : '-',
                $basic    ? $basic->correct_answers . '/' . $basic->total_questions : '-',
                $advanced ? $advanced->score : '-',
                $advanced ? $advanced->correct_answers . '/' . $advanced->total_questions : '-',
                $player->created_at->format('d/m/Y H:i'),
            ]);
        }

        $filename = 'nilai-terpilih-' . now()->format('Ymd-His') . '.csv';

        return response((string) $csv, 200, [
            'Content-Type'        => 'text/csv; charset=UTF-8',
            'Content-Disposition' => "attachment; filename=\"{$filename}\"",
        ]);
    }

    public function exportPdf(Request $request)
    {
        $query = Player::with('quizScores')->latest();

        if ($request->filled('name')) {
            $query->where('name', 'like', '%' . $request->name . '%');
        }

        if ($request->boolean('has_basic')) {
            $query->whereHas('quizScores', fn($q) => $q->where('quiz_type', 'basic'));
        }

        if ($request->boolean('has_advanced')) {
            $query->whereHas('quizScores', fn($q) => $q->where('quiz_type', 'advanced'));
        }

        $players  = $query->get();
        $title    = 'Semua Nilai Siswa';
        $filename = 'nilai-hijaiyah-' . now()->format('Ymd-His') . '.pdf';

        $pdf = Pdf::loadView('admin.hijaiyah.pdf', compact('players', 'title'))
                  ->setPaper('a4', 'landscape');

        return $pdf->download($filename);
    }

    public function exportSelectedPdf(Request $request)
    {
        $ids     = $request->input('ids', []);
        $players = Player::with('quizScores')->whereIn('id', $ids)->latest()->get();

        $title    = 'Nilai Siswa Terpilih';
        $filename = 'nilai-terpilih-' . now()->format('Ymd-His') . '.pdf';

        $pdf = Pdf::loadView('admin.hijaiyah.pdf', compact('players', 'title'))
                  ->setPaper('a4', 'landscape');

        return $pdf->download($filename);
    }

    public function bulkDestroy(Request $request)
    {
        $ids   = $request->input('ids', []);
        $count = Player::whereIn('id', $ids)->count();
        Player::whereIn('id', $ids)->delete();

        return redirect()->route('admin.hijaiyah.scores')
            ->with('success', $count . ' data siswa berhasil dihapus.');
    }

    public function dashboard(): View
    {
        $stats = [
            'total_players' => Player::count(),

            'basic_completed' => Player::whereHas(
                'quizScores', fn($q) => $q->where('quiz_type', 'basic')
            )->count(),

            'advanced_completed' => Player::whereHas(
                'quizScores', fn($q) => $q->where('quiz_type', 'advanced')
            )->count(),

            // Rata-rata: ambil score terbaru per siswa, lalu avg
            'avg_basic_score' => round(
                Player::whereHas('quizScores', fn($q) => $q->where('quiz_type', 'basic'))
                    ->with(['quizScores' => fn($q) => $q->where('quiz_type', 'basic')->latest()])
                    ->get()
                    ->avg(fn($p) => optional($p->quizScores->first())->score ?? 0) ?? 0
            ),

            'avg_advanced_score' => round(
                Player::whereHas('quizScores', fn($q) => $q->where('quiz_type', 'advanced'))
                    ->with(['quizScores' => fn($q) => $q->where('quiz_type', 'advanced')->latest()])
                    ->get()
                    ->avg(fn($p) => optional($p->quizScores->first())->score ?? 0) ?? 0
            ),

            // Lulus: hitung siswa unik yang score-nya >= 70
            'passed_basic' => Player::whereHas(
                'quizScores', fn($q) => $q->where('quiz_type', 'basic')->where('score', '>=', 70)
            )->count(),

            'passed_advanced' => Player::whereHas(
                'quizScores', fn($q) => $q->where('quiz_type', 'advanced')->where('score', '>=', 70)
            )->count(),
        ];

        $recentPlayers = Player::with('quizScores')->latest()->take(10)->get();

        return view('admin.hijaiyah.dashboard', compact('stats', 'recentPlayers'));
    }
}