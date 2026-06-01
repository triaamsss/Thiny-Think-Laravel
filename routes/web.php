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
use App\Http\Controllers\Admin\KosaKataController;

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
    $doaHarians = DoaHarian::latest()->get();
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
        Route::resource('quiz', QuizController::class);
        Route::resource('kosa-kata', KosaKataController::class);
    });
});