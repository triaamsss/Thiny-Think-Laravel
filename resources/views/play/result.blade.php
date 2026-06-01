<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Hasil Belajar — Belajar Hijaiyah</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Amiri:ital,wght@0,400;0,700;1,400&family=Nunito:wght@400;600;700;800;900&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        *, *::before, *::after { box-sizing: border-box; }
        body        { font-family: 'Nunito', sans-serif; }
        .font-arabic{ font-family: 'Amiri', serif; }

        @keyframes floatY {
            0%,100% { transform: translateY(0); }
            50%      { transform: translateY(-12px); }
        }
        @keyframes floatYSlow {
            0%,100% { transform: translateY(0) rotate(0deg); }
            40%     { transform: translateY(-9px) rotate(1deg); }
            70%     { transform: translateY(-5px) rotate(-1deg); }
        }
        @keyframes slideUp {
            from { transform: translateY(28px); opacity: 0; }
            to   { transform: translateY(0);    opacity: 1; }
        }
        @keyframes bounceIn {
            0%   { transform: scale(.75); opacity: 0; }
            55%  { transform: scale(1.08); opacity: 1; }
            100% { transform: scale(1); }
        }
        @keyframes twinkle {
            0%,100% { opacity: .2; transform: scale(.8);  }
            50%     { opacity: 1;  transform: scale(1.25); }
        }
        @keyframes pulseGlow {
            0%,100% { box-shadow: 0 8px 28px rgba(13,148,136,.3); }
            50%     { box-shadow: 0 8px 44px rgba(13,148,136,.6); }
        }
        @keyframes blobMorph {
            0%,100% { border-radius: 60% 40% 30% 70% / 60% 30% 70% 40%; }
            50%     { border-radius: 30% 60% 70% 40% / 50% 60% 30% 60%; }
        }
        @keyframes ringFill {
            from { stroke-dashoffset: 339.29; }
            to   { stroke-dashoffset: var(--ring-end, 0); }
        }
        @keyframes scoreCount {
            from { opacity: 0; transform: scale(.6); }
            to   { opacity: 1; transform: scale(1); }
        }
        @keyframes confettiFall {
            0%   { transform: translateY(-20px) rotate(0deg);   opacity: 1; }
            100% { transform: translateY(80px)  rotate(360deg); opacity: 0; }
        }
        @keyframes shimmer {
            0%,100% { opacity: .6; }
            50%     { opacity: 1; }
        }

        .anim-float       { animation: floatY     4s   ease-in-out infinite; }
        .anim-float-slow  { animation: floatYSlow 6s   ease-in-out infinite; }
        .anim-slide-up    { animation: slideUp    .65s ease-out both; }
        .anim-bounce-in   { animation: bounceIn   .75s cubic-bezier(.34,1.56,.64,1) both; }
        .anim-twinkle     { animation: twinkle    2.8s ease-in-out infinite; }
        .anim-glow        { animation: pulseGlow  2.2s ease-in-out infinite; }
        .anim-blob        { animation: blobMorph  9s   ease-in-out infinite; }
        .anim-ring        { animation: ringFill   1.4s cubic-bezier(.25,.1,.25,1) both; }
        .anim-score       { animation: scoreCount .6s  cubic-bezier(.34,1.56,.64,1) both; }
        .anim-shimmer     { animation: shimmer    2s   ease-in-out infinite; }

        .d-100  { animation-delay: .10s; }
        .d-200  { animation-delay: .20s; }
        .d-300  { animation-delay: .30s; }
        .d-400  { animation-delay: .40s; }
        .d-500  { animation-delay: .50s; }
        .d-600  { animation-delay: .60s; }
        .d-700  { animation-delay: .70s; }
        .d-800  { animation-delay: .80s; }
        .d-1000 { animation-delay:1.00s; }
        .d-1200 { animation-delay:1.20s; }
        .d-1400 { animation-delay:1.40s; }

        .btn-cta {
            transition: transform .22s cubic-bezier(.34,1.56,.64,1);
        }
        .btn-cta:hover  { transform: scale(1.05) translateY(-2px); }
        .btn-cta:active { transform: scale(.96); }

        .score-card {
            transition: transform .28s cubic-bezier(.34,1.56,.64,1), box-shadow .25s ease;
        }
        .score-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 48px rgba(0,0,0,.09);
        }

        /* Confetti dots */
        .confetti-dot {
            position: absolute;
            width: 8px; height: 8px;
            border-radius: 50%;
            animation: confettiFall 2s ease-in both;
        }
    </style>
</head>
<body class="bg-gradient-to-br from-teal-50 via-sky-50 to-emerald-50 min-h-screen overflow-x-hidden">

{{-- ── NAVBAR ── --}}
<nav class="sticky top-0 z-50 bg-white/90 backdrop-blur-md border-b border-teal-100 shadow-sm">
    <div class="max-w-5xl mx-auto px-5 py-3 flex items-center justify-between">
        <a href="{{ route('welcome') }}" class="flex items-center gap-2 group">
            <img src="{{ asset('img/logo-tinythink.png') }}" 
                alt="Logo Tiny Think"
                class="w-10 h-10 object-contain flex-shrink-0 transition-transform group-hover:scale-105">
            <span class="text-xl font-black text-teal-700 group-hover:text-teal-500 transition-colors">Belajar Hijaiyah</span>
        </a>
        <div class="flex items-center gap-5">
            <a href="{{ route('game.modules') }}" class="text-sm font-bold text-gray-500 hover:text-teal-600 transition-colors">Modul</a>
            <form method="POST" action="{{ route('game.exit') }}" class="inline">
                @csrf
                <button type="submit" class="text-sm font-bold text-red-400 hover:text-red-600 transition-colors">Keluar</button>
            </form>
        </div>
    </div>
</nav>

{{-- Flash messages --}}
<div class="max-w-2xl mx-auto px-5">
    @if(session('error'))
        <div class="mt-4 bg-red-50 border border-red-200 text-red-700 rounded-xl px-4 py-3 text-sm font-semibold anim-slide-up">{{ session('error') }}</div>
    @endif
    @if(session('success'))
        <div class="mt-4 bg-green-50 border border-green-200 text-green-700 rounded-xl px-4 py-3 text-sm font-semibold anim-slide-up">{{ session('success') }}</div>
    @endif
    @if(session('info'))
        <div class="mt-4 bg-sky-50 border border-sky-200 text-sky-700 rounded-xl px-4 py-3 text-sm font-semibold anim-slide-up">{{ session('info') }}</div>
    @endif
</div>

{{-- ── MAIN ── --}}
<main class="max-w-2xl mx-auto px-5 py-10">

    {{-- Background decorations --}}
    <div aria-hidden="true" class="pointer-events-none fixed inset-0 -z-10 overflow-hidden">
        <div class="absolute -top-20 -right-20 w-80 h-80 bg-teal-200   opacity-15 rounded-full anim-blob"></div>
        <div class="absolute top-1/2 -left-20   w-64 h-64 bg-sky-200   opacity-15 rounded-full anim-blob d-1000"></div>
        <div class="absolute -bottom-20 right-1/4 w-72 h-72 bg-emerald-200 opacity-15 rounded-full anim-blob d-1400"></div>

        @foreach([
            ['ا','4%','10%','text-6xl','text-teal-200','d-100'],
            ['ب','87%','5%','text-5xl','text-sky-200','d-300'],
            ['ت','3%','55%','text-5xl','text-emerald-200','d-500'],
            ['ث','90%','58%','text-6xl','text-teal-200','d-200'],
        ] as [$ltr,$x,$y,$sz,$clr,$d])
            <span class="absolute font-arabic {{ $sz }} {{ $clr }} anim-float-slow {{ $d }} opacity-25 select-none"
                  style="left:{{ $x }};top:{{ $y }}">{{ $ltr }}</span>
        @endforeach

        @foreach([
            ['8%','6%','14','d-100'],['90%','12%','11','d-300'],
            ['5%','45%','9','d-500'],['93%','65%','13','d-200'],
            ['40%','3%','9','d-800'],['62%','92%','11','d-400'],
        ] as [$x,$y,$s,$d])
            <svg class="absolute anim-twinkle {{ $d }}" style="left:{{ $x }};top:{{ $y }};width:{{ $s }}px;height:{{ $s }}px" viewBox="0 0 24 24" fill="#fbbf24">
                <path d="M12 2l2.4 7.4H22l-6.2 4.5 2.4 7.4L12 17l-6.2 4.3 2.4-7.4L2 9.4h7.6z"/>
            </svg>
        @endforeach
    </div>

    @php
        $bothDone  = $basicScore && $advancedScore;
        $avgScore  = $bothDone ? round(($basicScore->score + $advancedScore->score) / 2) : null;
        $allPass   = $bothDone && $basicScore->score >= 70 && $advancedScore->score >= 70;

        // Ring circumference = 2π × 54 ≈ 339.29
        $circ = 339.29;
        $basicOffset    = $basicScore    ? round($circ * (1 - $basicScore->score    / 100), 2) : $circ;
        $advancedOffset = $advancedScore ? round($circ * (1 - $advancedScore->score / 100), 2) : $circ;
    @endphp

    {{-- ── HERO / CELEBRATION HEADER ── --}}
    <div class="text-center mb-10 relative">

        {{-- Confetti burst (shown when any score ≥ 70) --}}
        @if(($basicScore && $basicScore->score >= 70) || ($advancedScore && $advancedScore->score >= 70))
            <div class="absolute inset-x-0 top-0 flex justify-center pointer-events-none" aria-hidden="true">
                @foreach([
                    ['#0d9488','15%','0s'],  ['#fbbf24','25%','.15s'], ['#10b981','35%','.05s'],
                    ['#0ea5e9','45%','.2s'],  ['#8b5cf6','55%','.1s'],  ['#f43f5e','65%','.25s'],
                    ['#0d9488','72%','.08s'], ['#fbbf24','80%','.18s'], ['#10b981','42%','.3s'],
                    ['#0ea5e9','58%','.12s'],
                ] as [$c,$l,$del])
                    <div class="confetti-dot absolute" style="background:{{ $c }};left:{{ $l }};animation-delay:{{ $del }};animation-duration:{{ (rand(15,25)/10) }}s"></div>
                @endforeach
            </div>
        @endif

        {{-- Trophy illustration --}}
        <div class="flex justify-center mb-5 anim-bounce-in">
            <div class="relative">
                <svg viewBox="0 0 140 130" class="w-36 h-32" xmlns="http://www.w3.org/2000/svg">
                    {{-- Glow --}}
                    <ellipse cx="70" cy="110" rx="45" ry="12" fill="#fbbf24" opacity=".2"/>

                    {{-- Stars --}}
                    <path d="M18 22 l2.2 6.6h6.9l-5.6 4.1 2.2 6.6-5.7-4.1-5.7 4.1 2.2-6.6-5.6-4.1h6.9z" fill="#fbbf24" opacity=".9" class="anim-twinkle d-200"/>
                    <path d="M115 14 l1.8 5.4h5.6l-4.5 3.3 1.8 5.4-4.7-3.3-4.7 3.3 1.8-5.4-4.5-3.3h5.6z"       fill="#fbbf24" opacity=".85" class="anim-twinkle d-500"/>
                    <path d="M130 55 l1.4 4.2h4.4l-3.5 2.6 1.4 4.2-3.7-2.6-3.7 2.6 1.4-4.2-3.5-2.6h4.4z"         fill="#fbbf24" opacity=".7" class="anim-twinkle d-800"/>
                    <path d="M8 68 l1.2 3.6h3.8l-3 2.2 1.2 3.6-3.2-2.2-3.2 2.2 1.2-3.6-3-2.2h3.8z"               fill="#fbbf24" opacity=".7" class="anim-twinkle d-400"/>

                    {{-- Trophy handles --}}
                    <path d="M38 34 Q22 34 22 48 Q22 60 38 57" stroke="#f59e0b" stroke-width="6" fill="none" stroke-linecap="round"/>
                    <path d="M102 34 Q118 34 118 48 Q118 60 102 57" stroke="#f59e0b" stroke-width="6" fill="none" stroke-linecap="round"/>

                    {{-- Cup body --}}
                    <path d="M36 18 H104 L98 62 A30 30 0 0 1 42 62 Z" fill="#fbbf24"/>
                    {{-- Cup shade --}}
                    <path d="M36 18 H104 L101 38 H39 Z" fill="#fcd34d"/>
                    {{-- Cup shine --}}
                    <path d="M46 26 Q50 20 56 24 Q52 32 46 26Z" fill="rgba(255,255,255,.45)"/>

                    {{-- Star on cup --}}
                    <path d="M70 30 l2.4 7.2h7.6l-6.1 4.4 2.4 7.2-6.3-4.4-6.3 4.4 2.4-7.2-6.1-4.4h7.6z" fill="white" opacity=".85"/>

                    {{-- Stem --}}
                    <rect x="60" y="62" width="20" height="22" rx="3" fill="#f59e0b"/>
                    {{-- Stem shade --}}
                    <rect x="60" y="62" width="8"  height="22" rx="3" fill="#fbbf24"/>

                    {{-- Base --}}
                    <rect x="44" y="84" width="52" height="11" rx="5.5" fill="#f59e0b"/>
                    <rect x="44" y="84" width="52" height="5"  rx="5.5" fill="#fcd34d"/>

                    {{-- Sparkles around trophy --}}
                    <circle cx="28" cy="70"  r="3" fill="#0d9488" opacity=".7" class="anim-twinkle d-300"/>
                    <circle cx="112" cy="65" r="2.5" fill="#10b981" opacity=".7" class="anim-twinkle d-600"/>
                    <circle cx="22" cy="50"  r="2" fill="#fbbf24" opacity=".6"  class="anim-twinkle d-100"/>
                    <circle cx="118" cy="42" r="2" fill="#0ea5e9" opacity=".6"  class="anim-twinkle d-800"/>
                </svg>

                {{-- Animated glow ring --}}
                @if($allPass)
                    <div class="absolute inset-0 rounded-full bg-yellow-300 opacity-20 blur-2xl anim-shimmer -z-10 scale-125"></div>
                @endif
            </div>
        </div>

        <h1 class="text-3xl lg:text-4xl font-black text-gray-800 mb-2 anim-slide-up d-100">
            Hasil Belajarmu
        </h1>
        <p class="text-gray-500 anim-slide-up d-200">
            @if($allPass)
                Luar biasa, <strong class="text-teal-600">{{ $player->name }}</strong>! Kamu berhasil menguasai semua materi!
            @elseif($basicScore || $advancedScore)
                Bagus, <strong class="text-teal-600">{{ $player->name }}</strong>! Ini adalah nilaimu sejauh ini.
            @else
                Halo, <strong class="text-teal-600">{{ $player->name }}</strong>! Kamu belum mengerjakan kuis apapun.
            @endif
        </p>
    </div>

    {{-- ── SCORE CARDS ── --}}
    <div class="grid sm:grid-cols-2 gap-5 mb-8">

        {{-- Basic Score Card --}}
        <div class="score-card bg-white rounded-3xl shadow-sm border border-teal-100 overflow-hidden anim-slide-up d-200">
            <div class="bg-gradient-to-r from-teal-600 to-teal-500 px-6 py-4 flex items-center gap-3">
                <div class="w-10 h-10 bg-white/20 rounded-xl flex items-center justify-center flex-shrink-0">
                    <svg class="w-6 h-6" viewBox="0 0 48 48" fill="none">
                        <path d="M24 11C24 11 13 9 5 11L5 39C13 37 24 39 24 39C24 39 35 37 43 39L43 11C35 9 24 11 24 11Z"
                              stroke="white" stroke-width="2.5" fill="rgba(255,255,255,.15)" stroke-linejoin="round"/>
                        <line x1="24" y1="11" x2="24" y2="39" stroke="white" stroke-width="2.5"/>
                        <text x="14" y="28" font-family="Amiri,serif" font-size="13" fill="white" opacity=".9">ا</text>
                        <text x="27" y="28" font-family="Amiri,serif" font-size="13" fill="white" opacity=".9">ب</text>
                    </svg>
                </div>
                <div>
                    <p class="text-white/70 text-xs font-bold uppercase tracking-wider">Kuis Huruf</p>
                    <p class="text-white font-black text-base leading-tight">Dasar</p>
                </div>
            </div>

            <div class="px-6 py-6 flex flex-col items-center">
                @if($basicScore)
                    {{-- Ring --}}
                    <div class="relative w-36 h-36 mb-4">
                        <svg class="w-full h-full" viewBox="0 0 120 120" style="transform:rotate(-90deg)">
                            <circle cx="60" cy="60" r="54" fill="none" stroke="#f1f5f9" stroke-width="10"/>
                            <circle cx="60" cy="60" r="54" fill="none"
                                    stroke="{{ $basicScore->score >= 70 ? '#0d9488' : '#f97316' }}"
                                    stroke-width="10"
                                    stroke-dasharray="339.29"
                                    stroke-linecap="round"
                                    class="anim-ring d-400"
                                    style="--ring-end: {{ $basicOffset }}; stroke-dashoffset: {{ $basicOffset }}"/>
                        </svg>
                        <div class="absolute inset-0 flex flex-col items-center justify-center anim-score d-600">
                            <span class="text-4xl font-black leading-none {{ $basicScore->score >= 70 ? 'text-teal-600' : 'text-orange-500' }}">
                                {{ $basicScore->score }}
                            </span>
                            <span class="text-sm font-bold text-gray-400 leading-none">%</span>
                        </div>
                    </div>

                    <p class="text-sm text-gray-500 font-semibold">
                        {{ $basicScore->correct_answers }}/{{ $basicScore->total_questions }} soal benar
                    </p>
                    <span class="mt-2 text-xs font-black px-3 py-1 rounded-full
                        {{ $basicScore->score >= 70
                            ? 'bg-teal-50 text-teal-700 border border-teal-200'
                            : 'bg-orange-50 text-orange-700 border border-orange-200' }}">
                        {{ $basicScore->score >= 70 ? 'Lulus' : 'Perlu Ditingkatkan' }}
                    </span>
                @else
                    <div class="py-6 flex flex-col items-center gap-3">
                        <div class="w-24 h-24 rounded-full bg-gray-100 flex items-center justify-center">
                            <span class="text-3xl font-black text-gray-300">—</span>
                        </div>
                        <p class="text-sm text-gray-400 font-semibold">Belum dikerjakan</p>
                        <a href="{{ route('game.quiz-basic') }}"
                           class="text-xs font-black text-teal-600 hover:text-teal-800 transition-colors flex items-center gap-1">
                            Mulai Kuis
                            <svg class="w-3.5 h-3.5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"/></svg>
                        </a>
                    </div>
                @endif
            </div>
        </div>

        {{-- Advanced Score Card --}}
        <div class="score-card bg-white rounded-3xl shadow-sm border border-violet-100 overflow-hidden anim-slide-up d-300">
            <div class="bg-gradient-to-r from-violet-600 to-violet-500 px-6 py-4 flex items-center gap-3">
                <div class="w-10 h-10 bg-white/20 rounded-xl flex items-center justify-center flex-shrink-0">
                    <svg class="w-6 h-6" viewBox="0 0 48 48" fill="none">
                        <text x="24" y="34" font-family="Amiri,serif" font-size="24" fill="white" text-anchor="middle">بَ</text>
                        <circle cx="36" cy="10" r="4" fill="rgba(255,255,255,.8)"/>
                        <circle cx="42" cy="17" r="3" fill="rgba(255,255,255,.6)"/>
                        <circle cx="30" cy="7"  r="2.5" fill="rgba(255,255,255,.5)"/>
                    </svg>
                </div>
                <div>
                    <p class="text-white/70 text-xs font-bold uppercase tracking-wider">Pencocokkan Huruf</p>
                    <p class="text-white font-black text-base leading-tight">Lanjut</p>
                </div>
            </div>

            <div class="px-6 py-6 flex flex-col items-center">
                @if($advancedScore)
                    {{-- Ring --}}
                    <div class="relative w-36 h-36 mb-4">
                        <svg class="w-full h-full" viewBox="0 0 120 120" style="transform:rotate(-90deg)">
                            <circle cx="60" cy="60" r="54" fill="none" stroke="#f1f5f9" stroke-width="10"/>
                            <circle cx="60" cy="60" r="54" fill="none"
                                    stroke="{{ $advancedScore->score >= 70 ? '#7c3aed' : '#f97316' }}"
                                    stroke-width="10"
                                    stroke-dasharray="339.29"
                                    stroke-linecap="round"
                                    class="anim-ring d-500"
                                    style="--ring-end: {{ $advancedOffset }}; stroke-dashoffset: {{ $advancedOffset }}"/>
                        </svg>
                        <div class="absolute inset-0 flex flex-col items-center justify-center anim-score d-700">
                            <span class="text-4xl font-black leading-none {{ $advancedScore->score >= 70 ? 'text-violet-600' : 'text-orange-500' }}">
                                {{ $advancedScore->score }}
                            </span>
                            <span class="text-sm font-bold text-gray-400 leading-none">%</span>
                        </div>
                    </div>

                    <p class="text-sm text-gray-500 font-semibold">
                        {{ $advancedScore->correct_answers }}/{{ $advancedScore->total_questions }} soal benar
                    </p>
                    <span class="mt-2 text-xs font-black px-3 py-1 rounded-full
                        {{ $advancedScore->score >= 70
                            ? 'bg-violet-50 text-violet-700 border border-violet-200'
                            : 'bg-orange-50 text-orange-700 border border-orange-200' }}">
                        {{ $advancedScore->score >= 70 ? 'Lulus' : 'Perlu Ditingkatkan' }}
                    </span>
                @else
                    <div class="py-6 flex flex-col items-center gap-3">
                        <div class="w-24 h-24 rounded-full bg-gray-100 flex items-center justify-center">
                            <span class="text-3xl font-black text-gray-300">—</span>
                        </div>
                        <p class="text-sm text-gray-400 font-semibold">Belum dikerjakan</p>
                        @if($unlocked[4] ?? false)
                            <a href="{{ route('game.quiz-advanced') }}"
                               class="text-xs font-black text-violet-600 hover:text-violet-800 transition-colors flex items-center gap-1">
                                Mulai Kuis
                                <svg class="w-3.5 h-3.5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"/></svg>
                            </a>
                        @endif
                    </div>
                @endif
            </div>
        </div>
    </div>

    {{-- ── OVERALL SUMMARY (shown when both scores exist) ── --}}
    @if($bothDone)
        <div class="bg-white rounded-3xl shadow-sm border {{ $allPass ? 'border-teal-200' : 'border-gray-100' }} p-6 mb-8 anim-slide-up d-400">
            <div class="flex items-center justify-between flex-wrap gap-4">
                <div>
                    <p class="text-xs font-black text-gray-400 uppercase tracking-wider mb-1">Rata-rata Nilai</p>
                    <div class="flex items-end gap-2">
                        <span class="text-5xl font-black {{ $avgScore >= 70 ? 'text-teal-600' : 'text-orange-500' }}">{{ $avgScore }}</span>
                        <span class="text-xl font-bold text-gray-400 mb-1">%</span>
                    </div>
                    <p class="text-sm text-gray-500 mt-1">dari dua kuis yang diselesaikan</p>
                </div>
                @if($allPass)
                    <div class="text-center">
                        <div class="w-16 h-16 bg-gradient-to-br from-teal-500 to-emerald-500 rounded-2xl flex items-center justify-center shadow-lg shadow-teal-100 mb-2 mx-auto">
                            <svg class="w-9 h-9 text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                                <path d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                        <span class="text-xs font-black text-teal-700 bg-teal-50 border border-teal-200 px-3 py-1 rounded-full">Semua Lulus!</span>
                    </div>
                @else
                    <div class="text-center">
                        <div class="w-16 h-16 bg-gradient-to-br from-orange-400 to-amber-400 rounded-2xl flex items-center justify-center shadow-lg shadow-orange-100 mb-2 mx-auto">
                            <svg class="w-9 h-9 text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                                <path d="M13 10V3L4 14h7v7l9-11h-7z" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                        <span class="text-xs font-black text-orange-700 bg-orange-50 border border-orange-200 px-3 py-1 rounded-full">Terus Semangat!</span>
                    </div>
                @endif
            </div>
        </div>
    @endif

    {{-- ── ACTION BUTTONS ── --}}
    <div class="flex flex-col sm:flex-row gap-3 justify-center anim-slide-up d-500">
        <a href="{{ route('game.modules') }}"
           class="btn-cta anim-glow inline-flex items-center justify-center gap-3 bg-gradient-to-r from-teal-600 to-emerald-500 text-white font-black text-base px-8 py-3.5 rounded-2xl shadow-lg shadow-teal-100">
            <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                <path d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            Kembali ke Modul
        </a>

        <form method="POST" action="{{ route('game.exit') }}">
            @csrf
            <button type="submit"
                    class="btn-cta w-full sm:w-auto inline-flex items-center justify-center gap-3 bg-white hover:bg-gray-50 text-gray-600 font-black text-base px-8 py-3.5 rounded-2xl shadow-sm border-2 border-gray-200 hover:border-gray-300 transition-colors">
                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                    <path d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                Selesai
            </button>
        </form>
    </div>

</main>

<footer class="text-center text-gray-400 text-sm py-6 border-t border-gray-100 mt-4">
    &copy; {{ date('Y') }} Tiny Think. Belajar Hijaiyah.
</footer>

</body>
</html>
