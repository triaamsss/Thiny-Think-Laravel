<?php

use App\Http\Controllers\GameController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;


Route::view('/', 'pages.home')->name('home');
Route::view('/about', 'pages.about')->name('about');
Route::view('/panduan', 'pages.panduan')->name('panduan');
Route::view('/service', 'pages.service')->name('service');
Route::view('/coming-soon', 'pages.comingsoon')->name('comingsoon');
Route::view('/doa-harian', 'pages.doa_harian')->name('doa-harian');
Route::view('/doa-harian/mulai', 'pages.doa_harian_mulai')->name('doa-harian.mulai');
Route::view('/hadist', 'pages.hadist_menu')->name('hadist.menu');
Route::view('/hadist/play', 'pages.hadist_play')->name('hadist.play');
Route::view('/abjad', 'pages.abjad')->name('abjad');
Route::view('/abjad/play', 'pages.abjad_play')->name('abjad.play');
Route::view('/pencocokkan-abjad', 'pages.pencocokkan_abjad')->name('pencocokkan-abjad');
Route::view('/pencocokkan-abjad/play', 'pages.pencocokkan_abjad_play')->name('pencocokkan-abjad.play');
Route::view('/kosa-kata', 'pages.kosa_kata')->name('kosa-kata');
Route::view('/kosa-kata/play', 'pages.kosa_kata_play')->name('kosa-kata.play');
Route::view('/surat-pendek', 'pages.surat_pendek')->name('surat-pendek');
Route::view('/surat-pendek/play', 'pages.surat_pendek_play')->name('surat-pendek.play');

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