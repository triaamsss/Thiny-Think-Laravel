<?php

use Illuminate\Support\Facades\Route;

// CONTROLLER ADMIN
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LessonController;
use App\Http\Controllers\Admin\ModuleController;
use App\Http\Controllers\Admin\HadistController;
use App\Http\Controllers\Admin\DoaHarianController;
use App\Http\Controllers\Admin\QuizController;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\HijaiyahScoreController;
// use App\Http\Controllers\Admin\SuratPendekController; 
use App\Http\Controllers\Admin\KosaKataController;     
// use App\Http\Controllers\Admin\PencocokkanAbjadController; 

// MODEL
use App\Models\Module;
use App\Models\Lesson;
use App\Models\Hadist;
use App\Models\DoaHarian;
use App\Models\Quiz;
use App\Models\KosaKata;

/*
|--------------------------------------------------------------------------
| PUBLIC ROUTES
|--------------------------------------------------------------------------
*/

Route::view('/', 'pages.home')->name('home');
Route::view('/about', 'pages.about')->name('about');
Route::view('/panduan', 'pages.panduan')->name('panduan');
Route::view('/service', 'pages.service')->name('service');
Route::view('/coming-soon', 'pages.comingsoon')->name('comingsoon');

Route::get('/belajar', function () {
    $modules = Module::latest()->get();
    return view('pages.modules', compact('modules'));
})->name('modules');

Route::get('/modules/{slug}', function ($slug) {
    $module = Module::where('slug', $slug)->with('lessons')->firstOrFail();
    return view('pages.module-detail', compact('module'));
})->name('modules.show');

Route::view('/hijaiyah', 'pages.hijaiyah')->name('hijaiyah');
Route::view('/hijaiyah/play', 'pages.hijaiyah_play')->name('hijaiyah.play');

Route::view('/doa-harian', 'pages.doa_harian')->name('doa-harian');
Route::get('/doa-harian/mulai', function () {
    $doaHarians = collect([]);
    return view('pages.doa_harian_mulai', compact('doaHarians'));
})->name('doa-harian.mulai');

Route::view('/hadist', 'pages.hadist_menu')->name('hadist.menu');
Route::get('/hadist/play', function () {
    $hadists = Hadist::all();
    $quizzes = Quiz::where('category', 'hadist')->get();
    return view('pages.hadist_play', compact('hadists','quizzes'));
})->name('hadist.play');

Route::view('/abjad', 'pages.abjad')->name('abjad');
Route::view('/abjad/play', 'pages.abjad_play')->name('abjad.play');

Route::view('/pencocokkan-abjad', 'pages.pencocokkan_abjad')->name('pencocokkan-abjad');
Route::view('/pencocokkan-abjad/play', 'pages.pencocokkan_abjad_play')->name('pencocokkan-abjad.play');

Route::view('/surat-pendek', 'pages.surat_pendek')->name('surat-pendek');
Route::view('/surat-pendek/play', 'pages.surat_pendek_play')->name('surat-pendek.play');    

Route::view('/kosa-kata', 'pages.kosa_kata')->name('kosa-kata');

Route::get('/kosa-kata/play', function () {
    $items = KosaKata::orderBy('kategori')->get();

    $labels = [
        'buah' => '🍎 Buah',
        'hewan' => '🐾 Hewan',
        'benda' => '🏠 Benda',
        'alam' => '🌿 Alam',
        'pekerjaan' => '👩‍⚕️ Pekerjaan',
        'transportasi' => '🚗 Transportasi',
        'sayuran' => '🥦 Sayuran',
        'warna' => '🎨 Warna',
    ];

    $colors = [
        'buah' => 'var(--orange)',
        'hewan' => 'var(--green)',
        'benda' => 'var(--blue)',
        'alam' => 'var(--teal)',
        'pekerjaan' => 'var(--purple)',
        'transportasi' => 'var(--red)',
        'sayuran' => 'var(--green)',
        'warna' => 'var(--pink)',
    ];

    $data = [];

    foreach ($items as $item) {
        if (!isset($data[$item->kategori])) {
            $data[$item->kategori] = [
                'label' => $item->label ?: ($labels[$item->kategori] ?? ucfirst($item->kategori)),
                'color' => $colors[$item->kategori] ?? 'var(--orange)',
                'words' => [],
            ];
        }

        $data[$item->kategori]['words'][] = [
            'kata' => $item->kata,
            'suku' => is_array($item->suku) ? $item->suku : json_decode($item->suku, true),
            'emoji' => $item->emoji,
            'audio' => $item->audio ? asset('storage/' . $item->audio) : null,
        ];
    }

    return view('pages.kosa_kata_play', compact('data'));
})->name('kosa-kata.play');

/*
|--------------------------------------------------------------------------
| HIJAIYAH — Portal belajar huruf
|--------------------------------------------------------------------------
*/

use App\Http\Controllers\GameController;
use App\Http\Controllers\WelcomeController;

Route::get('/hijaiyah', function () {
    return view('pages.hijaiyah');
})->name('hijaiyah');

Route::get('/hijaiyah/welcome', [WelcomeController::class, 'index'])->name('welcome');
Route::post('/hijaiyah/masuk', [GameController::class, 'enterSubmit'])->name('game.enter.submit');

Route::middleware('player.session')->prefix('hijaiyah/play')->name('game.')->group(function () {
    Route::get('/modules',               [GameController::class, 'modules'])->name('modules');
    Route::get('/learn-basic',           [GameController::class, 'learnBasic'])->name('learn-basic');
    Route::get('/learn-fathah',          [GameController::class, 'learnFathah'])->name('learn-fathah');
    Route::get('/quiz-basic',            [GameController::class, 'quizBasic'])->name('quiz-basic');
    Route::post('/quiz-basic/submit',    [GameController::class, 'submitBasicScore'])->name('quiz-basic.submit');
    Route::get('/quiz-advanced',         [GameController::class, 'quizAdvanced'])->name('quiz-advanced');
    Route::post('/quiz-advanced/submit', [GameController::class, 'submitAdvancedScore'])->name('quiz-advanced.submit');
    Route::get('/result',                [GameController::class, 'result'])->name('result');
    Route::post('/exit',                 [GameController::class, 'leave'])->name('exit');
});

/*
|--------------------------------------------------------------------------
| ADMIN AUTH
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->name('admin.')->group(function () {

    // LOGIN
    Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AdminAuthController::class, 'login'])->name('login.submit');

    // ROUTES PROTECTED ADMIN
    Route::middleware('auth:admin')->group(function() {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');
        Route::resource('modules', ModuleController::class);
        Route::resource('lessons', LessonController::class);
        Route::resource('hadist', HadistController::class);
        Route::resource('doa-harian', DoaHarianController::class);
        Route::get('/surat-pendek', function () {
            return view('admin.coming-soon', ['title' => 'Surat Pendek']);
        })->name('surat-pendek.index');
        Route::get('/pencocokkan-abjad', function () {
            return view('admin.coming-soon', ['title' => 'Pencocokkan Abjad']);
        })->name('pencocokkan-abjad.index');
        Route::resource('quiz', QuizController::class);
        Route::resource('kosa-kata', KosaKataController::class);

        // ── Huruf Hijaiyah — Nilai Siswa ─────────────────────────────────
        Route::get('/hijaiyah',                              [HijaiyahScoreController::class, 'dashboard'])->name('hijaiyah.dashboard');
        Route::get('/hijaiyah/scores',                [HijaiyahScoreController::class, 'index'])->name('hijaiyah.scores');
        Route::get('/hijaiyah/scores/export-csv',     [HijaiyahScoreController::class, 'exportCsv'])->name('hijaiyah.export-csv');
        Route::get('/hijaiyah/scores/export-pdf',     [HijaiyahScoreController::class, 'exportPdf'])->name('hijaiyah.export-pdf');
        Route::post('/hijaiyah/scores/export-selected-csv', [HijaiyahScoreController::class, 'exportSelectedCsv'])->name('hijaiyah.export-selected-csv');
        Route::post('/hijaiyah/scores/export-selected-pdf', [HijaiyahScoreController::class, 'exportSelectedPdf'])->name('hijaiyah.export-selected-pdf');
        Route::post('/hijaiyah/scores/bulk-destroy',  [HijaiyahScoreController::class, 'bulkDestroy'])->name('hijaiyah.bulk-destroy');
    });
});