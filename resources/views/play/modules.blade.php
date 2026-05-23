<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Pilih Modul — Belajar Hijaiyah</title>
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
            0%   { transform: scale(.8); opacity: 0; }
            55%  { transform: scale(1.05); opacity: 1; }
            100% { transform: scale(1); }
        }
        @keyframes twinkle {
            0%,100% { opacity: .2; transform: scale(.8);  }
            50%     { opacity: 1;  transform: scale(1.2); }
        }
        @keyframes pulseGlow {
            0%,100% { box-shadow: 0 8px 28px rgba(13,148,136,.3); }
            50%     { box-shadow: 0 8px 44px rgba(13,148,136,.6); }
        }
        @keyframes progressFill {
            from { width: 0; }
        }
        @keyframes blobMorph {
            0%,100% { border-radius: 60% 40% 30% 70% / 60% 30% 70% 40%; }
            50%     { border-radius: 30% 60% 70% 40% / 50% 60% 30% 60%; }
        }

        .anim-float      { animation: floatY     4s   ease-in-out infinite; }
        .anim-float-slow { animation: floatYSlow 6s   ease-in-out infinite; }
        .anim-slide-up   { animation: slideUp    .65s ease-out both; }
        .anim-bounce-in  { animation: bounceIn   .7s  cubic-bezier(.34,1.56,.64,1) both; }
        .anim-twinkle    { animation: twinkle    2.8s ease-in-out infinite; }
        .anim-glow       { animation: pulseGlow  2.2s ease-in-out infinite; }
        .anim-blob       { animation: blobMorph  9s   ease-in-out infinite; }
        .anim-progress   { animation: progressFill .9s ease-out both; }

        .d-100  { animation-delay: .10s; }
        .d-200  { animation-delay: .20s; }
        .d-300  { animation-delay: .30s; }
        .d-400  { animation-delay: .40s; }
        .d-500  { animation-delay: .50s; }
        .d-600  { animation-delay: .60s; }
        .d-700  { animation-delay: .70s; }
        .d-800  { animation-delay: .80s; }
        .d-1000 { animation-delay:1.00s; }
        .d-1400 { animation-delay:1.40s; }

        .module-card {
            transition: transform .28s cubic-bezier(.34,1.56,.64,1), box-shadow .25s ease, border-color .2s ease;
        }
        .module-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 20px 48px rgba(0,0,0,.1);
        }

        .btn-cta {
            transition: transform .22s cubic-bezier(.34,1.56,.64,1);
        }
        .btn-cta:hover  { transform: scale(1.04) translateY(-2px); }
        .btn-cta:active { transform: scale(.96); }
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
            <a href="{{ route('game.modules') }}" class="text-sm font-bold text-teal-600 border-b-2 border-teal-400 pb-0.5">Modul</a>
            @if($basicScore || $advancedScore)
                <a href="{{ route('game.result') }}" class="text-sm font-bold text-gray-500 hover:text-teal-600 transition-colors">Nilai Saya</a>
            @endif
            <form method="POST" action="{{ route('game.exit') }}" class="inline">
                @csrf
                <button type="submit" class="text-sm font-bold text-red-400 hover:text-red-600 transition-colors">Keluar</button>
            </form>
        </div>
    </div>
</nav>

{{-- Flash messages --}}
<div class="max-w-5xl mx-auto px-5">
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
<main class="max-w-5xl mx-auto px-5 py-10 relative">

    {{-- Background decorations --}}
    <div aria-hidden="true" class="pointer-events-none fixed inset-0 -z-10 overflow-hidden">
        <div class="absolute -top-24 -right-24 w-80 h-80 bg-teal-200 opacity-15 rounded-full anim-blob"></div>
        <div class="absolute top-1/2  -left-20  w-64 h-64 bg-sky-200   opacity-15 rounded-full anim-blob d-1000"></div>
        <div class="absolute -bottom-20 right-1/4 w-72 h-72 bg-emerald-200 opacity-15 rounded-full anim-blob d-1400"></div>

        {{-- Ghost Arabic letters --}}
        @foreach([
            ['ا','4%', '12%','text-6xl','text-teal-200',   'd-100'],
            ['ب','88%','6%', 'text-5xl','text-sky-200',    'd-300'],
            ['ت','2%', '52%','text-5xl','text-emerald-200','d-500'],
            ['ث','90%','55%','text-6xl','text-teal-200',   'd-200'],
            ['ج','45%','2%', 'text-5xl','text-sky-200',    'd-600'],
            ['ح','78%','85%','text-5xl','text-emerald-200','d-400'],
        ] as [$ltr,$x,$y,$sz,$clr,$d])
            <span class="absolute font-arabic {{ $sz }} {{ $clr }} anim-float-slow {{ $d }} opacity-30 select-none"
                  style="left:{{ $x }};top:{{ $y }}">{{ $ltr }}</span>
        @endforeach

        {{-- Stars --}}
        @foreach([
            ['8%','5%','14','d-100'],['91%','14%','11','d-300'],
            ['4%','42%','9','d-500'],['94%','62%','13','d-200'],
            ['38%','3%','9','d-800'],['65%','92%','11','d-400'],
        ] as [$x,$y,$s,$d])
            <svg class="absolute anim-twinkle {{ $d }}"
                 style="left:{{ $x }};top:{{ $y }};width:{{ $s }}px;height:{{ $s }}px"
                 viewBox="0 0 24 24" fill="#fbbf24">
                <path d="M12 2l2.4 7.4H22l-6.2 4.5 2.4 7.4L12 17l-6.2 4.3 2.4-7.4L2 9.4h7.6z"/>
            </svg>
        @endforeach
    </div>

    {{-- ── PLAYER GREETING BANNER ── --}}
    @php
        $done1 = $player->learned_basic;
        $done2 = $player->learned_fathah;
        $done3 = $basicScore !== null;
        $done4 = $advancedScore !== null;
        $doneCount = collect([$done1,$done2,$done3,$done4])->filter()->count();
        $progressPct = ($doneCount / 4) * 100;
        $initial = mb_strtoupper(mb_substr($player->name, 0, 1));
    @endphp

    <div class="bg-white rounded-3xl shadow-sm border border-teal-100 overflow-hidden mb-8 anim-slide-up">
        <div class="bg-gradient-to-r from-teal-600 to-emerald-500 px-7 py-6">
            <div class="flex items-center justify-between flex-wrap gap-4">
                <div class="flex items-center gap-4">
                    {{-- Avatar --}}
                    <div class="w-14 h-14 rounded-2xl bg-white/25 flex items-center justify-center flex-shrink-0 text-white font-black text-2xl shadow-inner">
                        {{ $initial }}
                    </div>
                    <div>
                        <p class="text-white/75 text-xs font-bold uppercase tracking-wider">Selamat Datang</p>
                        <h1 class="text-white font-black text-2xl leading-tight">{{ $player->name }}</h1>
                        @if($player->classroom)
                            <p class="text-white/80 text-sm mt-0.5">
                                <span class="font-arabic text-base">&#xFE71;</span>
                                Kelas: <strong>{{ $player->classroom->name }}</strong>
                            </p>
                        @endif
                    </div>
                </div>

                {{-- Progress summary --}}
                <div class="text-right">
                    <p class="text-white/75 text-xs font-bold uppercase tracking-wider mb-1">Progress Belajar</p>
                    <p class="text-white font-black text-3xl">{{ $doneCount }}<span class="text-white/60 text-lg font-bold">/4</span></p>
                    <p class="text-white/70 text-xs mt-0.5">modul selesai</p>
                </div>
            </div>
        </div>

        {{-- Progress bar --}}
        <div class="px-7 py-4">
            <div class="flex items-center justify-between text-xs font-bold text-gray-500 mb-2">
                <span>Kemajuan keseluruhan</span>
                <span class="text-teal-600">{{ (int)$progressPct }}%</span>
            </div>
            <div class="h-3 bg-gray-100 rounded-full overflow-hidden">
                <div class="h-full bg-gradient-to-r from-teal-500 to-emerald-400 rounded-full anim-progress d-200"
                     style="width: {{ $progressPct }}%"></div>
            </div>

            {{-- Step dots --}}
            <div class="flex items-center justify-between mt-3">
                @foreach([
                    ['Huruf Dasar',    $done1],
                    ['Huruf Fathah', $done2],
                    ['Kuis Dasar',     $done3],
                    ['Pencocokkan Huruf',    $done4],
                ] as $i => [$label, $done])
                    <div class="flex flex-col items-center gap-1 text-center" style="width:22%">
                        <div class="w-6 h-6 rounded-full flex items-center justify-center text-xs font-black
                            {{ $done ? 'bg-teal-500 text-white' : 'bg-gray-200 text-gray-400' }}">
                            @if($done)
                                <svg class="w-3.5 h-3.5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                            @else
                                {{ $i + 1 }}
                            @endif
                        </div>
                        <span class="text-[10px] font-bold {{ $done ? 'text-teal-600' : 'text-gray-400' }} leading-tight">{{ $label }}</span>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    {{-- ── MODULE GRID ── --}}
    <div class="grid sm:grid-cols-2 gap-5">

        {{-- ── MODUL 1: Huruf Dasar (selalu terbuka) ── --}}
        <a href="{{ route('game.learn-basic') }}"
           class="module-card bg-white rounded-3xl p-6 shadow-sm border-2 border-transparent hover:border-teal-300 block anim-slide-up d-100">
            <div class="flex items-start gap-4">
                <div class="w-14 h-14 flex-shrink-0 bg-gradient-to-br from-teal-500 to-teal-600 rounded-2xl flex items-center justify-center shadow-lg shadow-teal-100">
                    <svg class="w-8 h-8" viewBox="0 0 48 48" fill="none">
                        <path d="M24 11C24 11 13 9 5 11L5 39C13 37 24 39 24 39C24 39 35 37 43 39L43 11C35 9 24 11 24 11Z"
                              stroke="white" stroke-width="2.5" fill="rgba(255,255,255,.15)" stroke-linejoin="round"/>
                        <line x1="24" y1="11" x2="24" y2="39" stroke="white" stroke-width="2.5"/>
                        <text x="14" y="28" font-family="Amiri,serif" font-size="13" fill="white" opacity=".9">ا</text>
                        <text x="27" y="28" font-family="Amiri,serif" font-size="13" fill="white" opacity=".9">ب</text>
                    </svg>
                </div>
                <div class="flex-1 min-w-0">
                    <div class="flex flex-wrap items-center gap-2 mb-1.5">
                        <span class="text-xs bg-teal-50 text-teal-700 font-black px-2 py-0.5 rounded-full border border-teal-200">TERBUKA</span>
                        @if($player->learned_basic)
                            <span class="text-xs bg-emerald-50 text-emerald-700 font-black px-2 py-0.5 rounded-full border border-emerald-200 flex items-center gap-1">
                                <svg class="w-3 h-3" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                                Sudah Dipelajari
                            </span>
                        @endif
                    </div>
                    <h2 class="text-lg font-black text-gray-800 leading-tight">Modul 1: Huruf Dasar</h2>
                    <p class="text-sm text-gray-500 mt-1 leading-relaxed">Kenali 28 huruf hijaiyah satu per satu dengan gambar &amp; suara.</p>
                    <div class="mt-3 flex items-center gap-1 text-teal-600 text-xs font-black">
                        {{ $player->learned_basic ? 'Ulangi Belajar' : 'Mulai Belajar' }}
                        <svg class="w-3.5 h-3.5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"/></svg>
                    </div>
                </div>
            </div>
        </a>

        {{-- ── MODUL 2: Harakat Fathah ── --}}
        @if($unlocked[2])
            <a href="{{ route('game.learn-fathah') }}"
               class="module-card bg-white rounded-3xl p-6 shadow-sm border-2 border-transparent hover:border-sky-300 block anim-slide-up d-200">
                <div class="flex items-start gap-4">
                    <div class="w-14 h-14 flex-shrink-0 rounded-2xl flex items-center justify-center" 
                        style="background: linear-gradient(135deg, #0284c7, #38bdf8); box-shadow: 0 4px 14px rgba(2, 132, 199, 0.42);">
                        <svg class="w-8 h-8" viewBox="0 0 48 48" fill="none">
                            <text x="24" y="35" font-family="Amiri, serif" font-size="32" font-weight="900" fill="#ffffff" text-anchor="middle">بَ</text>
                        </svg>
                    </div>
                    <div class="flex-1 min-w-0">
                        <div class="flex flex-wrap items-center gap-2 mb-1.5">
                            <span class="text-xs bg-sky-50 text-sky-700 font-black px-2 py-0.5 rounded-full border border-sky-200">TERBUKA</span>
                            @if($player->learned_fathah)
                                <span class="text-xs bg-emerald-50 text-emerald-700 font-black px-2 py-0.5 rounded-full border border-emerald-200 flex items-center gap-1">
                                    <svg class="w-3 h-3" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                                    Sudah Dipelajari
                                </span>
                            @endif
                        </div>
                        <h2 class="text-lg font-black text-gray-800 leading-tight">Modul 2: Huruf Fathah</h2>
                        <p class="text-sm text-gray-500 mt-1 leading-relaxed">Pelajari 28 huruf hijaiyah berharakat fathah satu per satu dengan gambar & suara.</p>
                        <div class="mt-3 flex items-center gap-1 text-sky-600 text-xs font-black">
                            {{ $player->learned_fathah ? 'Ulangi Belajar' : 'Mulai Belajar' }}
                            <svg class="w-3.5 h-3.5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"/></svg>
                        </div>
                    </div>
                </div>
            </a>
        @else
            <div class="bg-gray-50 rounded-3xl p-6 border-2 border-dashed border-gray-200 opacity-60 cursor-not-allowed anim-slide-up d-200">
                <div class="flex items-start gap-4">
                    <div class="w-14 h-14 flex-shrink-0 bg-gray-200 rounded-2xl flex items-center justify-center">
                        <svg class="w-7 h-7 text-gray-400" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 1C8.676 1 6 3.676 6 7v1H4a1 1 0 00-1 1v12a1 1 0 001 1h16a1 1 0 001-1V9a1 1 0 00-1-1h-2V7c0-3.324-2.676-6-6-6zm0 2c2.276 0 4 1.724 4 4v1H8V7c0-2.276 1.724-4 4-4zm0 9a2 2 0 110 4 2 2 0 010-4z"/>
                        </svg>
                    </div>
                    <div>
                        <span class="text-xs bg-gray-200 text-gray-500 font-black px-2 py-0.5 rounded-full">TERKUNCI</span>
                        <h2 class="text-lg font-black text-gray-500 mt-1.5 leading-tight">Modul 2: Harakat Fathah</h2>
                        <p class="text-sm text-gray-400 mt-1">Selesaikan Modul 1 terlebih dahulu.</p>
                    </div>
                </div>
            </div>
        @endif

        {{-- ── MODUL 3: Kuis Dasar ── --}}
        @if($unlocked[3])
            <a href="{{ route('game.quiz-basic') }}"
               class="module-card bg-white rounded-3xl p-6 shadow-sm border-2 border-transparent hover:border-emerald-300 block anim-slide-up d-300">
                <div class="flex items-start gap-4">
                    <div class="w-14 h-14 flex-shrink-0 bg-gradient-to-br from-emerald-500 to-emerald-600 rounded-2xl flex items-center justify-center shadow-lg shadow-emerald-100">
                        <svg class="w-8 h-8" viewBox="0 0 48 48" fill="none">
                            <circle cx="24" cy="24" r="17" stroke="white" stroke-width="2.5" fill="rgba(255,255,255,.1)"/>
                            <circle cx="24" cy="24" r="10" stroke="white" stroke-width="2.5" fill="rgba(255,255,255,.15)"/>
                            <circle cx="24" cy="24" r="4" fill="white"/>
                            <path d="M32 9L37 5L44 5L44 12L40 16L35 11Z" fill="rgba(255,255,255,.7)"/>
                            <line x1="35" y1="13" x2="26" y2="22" stroke="white" stroke-width="2.2" stroke-linecap="round"/>
                        </svg>
                    </div>
                    <div class="flex-1 min-w-0">
                        <div class="flex flex-wrap items-center gap-2 mb-1.5">
                            <span class="text-xs bg-emerald-50 text-emerald-700 font-black px-2 py-0.5 rounded-full border border-emerald-200">TERBUKA</span>
                            @if($basicScore)
                                <span class="text-xs font-black px-2 py-0.5 rounded-full border
                                    {{ $basicScore->score >= 70
                                        ? 'bg-emerald-50 text-emerald-700 border-emerald-200'
                                        : 'bg-orange-50 text-orange-700 border-orange-200' }}">
                                    {{ $basicScore->score }}%
                                </span>
                            @endif
                        </div>
                        <h2 class="text-lg font-black text-gray-800 leading-tight">Modul 3: Kuis Dasar</h2>
                        <p class="text-sm text-gray-500 mt-1 leading-relaxed">Tebak huruf dari suara & tampilan. 10 soal acak!</p>
                        <div class="mt-3 flex items-center gap-1 text-emerald-600 text-xs font-black">
                            {{ $basicScore ? 'Coba Lagi' : 'Mulai Kuis' }}
                            <svg class="w-3.5 h-3.5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"/></svg>
                        </div>
                    </div>
                </div>
            </a>
        @else
            <div class="bg-gray-50 rounded-3xl p-6 border-2 border-dashed border-gray-200 opacity-60 cursor-not-allowed anim-slide-up d-300">
                <div class="flex items-start gap-4">
                    <div class="w-14 h-14 flex-shrink-0 bg-gray-200 rounded-2xl flex items-center justify-center">
                        <svg class="w-7 h-7 text-gray-400" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 1C8.676 1 6 3.676 6 7v1H4a1 1 0 00-1 1v12a1 1 0 001 1h16a1 1 0 001-1V9a1 1 0 00-1-1h-2V7c0-3.324-2.676-6-6-6zm0 2c2.276 0 4 1.724 4 4v1H8V7c0-2.276 1.724-4 4-4zm0 9a2 2 0 110 4 2 2 0 010-4z"/>
                        </svg>
                    </div>
                    <div>
                        <span class="text-xs bg-gray-200 text-gray-500 font-black px-2 py-0.5 rounded-full">TERKUNCI</span>
                        <h2 class="text-lg font-black text-gray-500 mt-1.5 leading-tight">Modul 3: Kuis Dasar</h2>
                        <p class="text-sm text-gray-400 mt-1">Selesaikan Modul 2 terlebih dahulu.</p>
                    </div>
                </div>
            </div>
        @endif

        {{-- ── MODUL 4: Pencocokkan Huruf ── --}}
        @if($unlocked[4])
            <a href="{{ route('game.quiz-advanced') }}"
               class="module-card bg-white rounded-3xl p-6 shadow-sm border-2 border-transparent hover:border-violet-300 block anim-slide-up d-400">
                <div class="flex items-start gap-4">
                    <div class="w-14 h-14 flex-shrink-0 bg-gradient-to-br from-violet-500 to-violet-600 rounded-2xl flex items-center justify-center shadow-lg shadow-violet-100">
                        <svg class="w-8 h-8" viewBox="0 0 48 48" fill="none">
                            <path d="M16 9h16v16a8 8 0 01-16 0V9z" stroke="white" stroke-width="2.5" fill="rgba(255,255,255,.15)"/>
                            <path d="M16 15H8a4 4 0 004 4h4"  stroke="white" stroke-width="2.5" stroke-linecap="round"/>
                            <path d="M32 15h8a4 4 0 01-4 4h-4" stroke="white" stroke-width="2.5" stroke-linecap="round"/>
                            <line x1="24" y1="33" x2="24" y2="39" stroke="white" stroke-width="2.5" stroke-linecap="round"/>
                            <line x1="18" y1="39" x2="30" y2="39" stroke="white" stroke-width="2.5" stroke-linecap="round"/>
                            <circle cx="24" cy="19" r="3.5" fill="rgba(255,255,255,.85)"/>
                        </svg>
                    </div>
                    <div class="flex-1 min-w-0">
                        <div class="flex flex-wrap items-center gap-2 mb-1.5">
                            <span class="text-xs bg-violet-50 text-violet-700 font-black px-2 py-0.5 rounded-full border border-violet-200">TERBUKA</span>
                            @if($advancedScore)
                                <span class="text-xs font-black px-2 py-0.5 rounded-full border
                                    {{ $advancedScore->score >= 70
                                        ? 'bg-emerald-50 text-emerald-700 border-emerald-200'
                                        : 'bg-violet-50 text-violet-700 border-violet-200' }}">
                                    {{ $advancedScore->score }}%
                                </span>
                            @endif
                        </div>
                        <h2 class="text-lg font-black text-gray-800 leading-tight">Modul 4: Pencocokkan Huruf</h2>
                        <p class="text-sm text-gray-500 mt-1 leading-relaxed">Seret huruf ke tempat yang tepat. Game 5 soal!</p>
                        <div class="mt-3 flex items-center gap-1 text-violet-600 text-xs font-black">
                            {{ $advancedScore ? 'Coba Lagi' : 'Mulai Game' }}
                            <svg class="w-3.5 h-3.5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"/></svg>
                        </div>
                    </div>
                </div>
            </a>
        @else
            <div class="bg-gray-50 rounded-3xl p-6 border-2 border-dashed border-gray-200 opacity-60 cursor-not-allowed anim-slide-up d-400">
                <div class="flex items-start gap-4">
                    <div class="w-14 h-14 flex-shrink-0 bg-gray-200 rounded-2xl flex items-center justify-center">
                        <svg class="w-7 h-7 text-gray-400" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 1C8.676 1 6 3.676 6 7v1H4a1 1 0 00-1 1v12a1 1 0 001 1h16a1 1 0 001-1V9a1 1 0 00-1-1h-2V7c0-3.324-2.676-6-6-6zm0 2c2.276 0 4 1.724 4 4v1H8V7c0-2.276 1.724-4 4-4zm0 9a2 2 0 110 4 2 2 0 010-4z"/>
                        </svg>
                    </div>
                    <div>
                        <span class="text-xs bg-gray-200 text-gray-500 font-black px-2 py-0.5 rounded-full">TERKUNCI</span>
                        <h2 class="text-lg font-black text-gray-500 mt-1.5 leading-tight">Modul 4: Pencocokkan Huruf</h2>
                        <p class="text-sm text-gray-400 mt-1">Selesaikan Kuis Dasar terlebih dahulu.</p>
                    </div>
                </div>
            </div>
        @endif

    </div>

    {{-- ── VIEW SCORES CTA ── --}}
    @if($basicScore || $advancedScore)
        <div class="text-center mt-10 anim-slide-up d-500">
            <a href="{{ route('game.result') }}"
               class="btn-cta anim-glow inline-flex items-center gap-3 bg-gradient-to-r from-teal-600 to-emerald-500 text-white font-black text-base px-8 py-3.5 rounded-2xl shadow-lg shadow-teal-100">
                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                    <path d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                Lihat Nilai Saya
            </a>
        </div>
    @endif

</main>

<footer class="text-center text-gray-400 text-sm py-6 border-t border-gray-100 mt-4">
    &copy; {{ date('Y') }} Tiny Think. Belajar Hijaiyah.
</footer>

</body>
</html>