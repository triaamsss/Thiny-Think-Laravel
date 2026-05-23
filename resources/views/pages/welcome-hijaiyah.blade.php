<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Belajar Hijaiyah - Kenali Huruf Al-Qur'an</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Amiri:ital,wght@0,400;0,700;1,400&family=Nunito:wght@400;600;700;800;900&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        *, *::before, *::after { box-sizing: border-box; }
        body  { font-family: 'Nunito', sans-serif; }
        .font-arabic { font-family: 'Amiri', serif; }

        @keyframes floatY {
            0%,100% { transform: translateY(0); }
            50%      { transform: translateY(-14px); }
        }
        @keyframes floatYSlow {
            0%,100% { transform: translateY(0) rotate(0deg); }
            33%     { transform: translateY(-10px) rotate(1.5deg); }
            66%     { transform: translateY(-6px) rotate(-1deg); }
        }
        @keyframes bounceIn {
            0%   { transform: scale(.78); opacity: 0; }
            55%  { transform: scale(1.06); opacity: 1; }
            100% { transform: scale(1); }
        }
        @keyframes slideUp {
            from { transform: translateY(36px); opacity: 0; }
            to   { transform: translateY(0);    opacity: 1; }
        }
        @keyframes twinkle {
            0%,100% { opacity: .25; transform: scale(.8);  }
            50%     { opacity: 1;   transform: scale(1.25); }
        }
        @keyframes pulseGlow {
            0%,100% { box-shadow: 0 8px 28px rgba(13,148,136,.35); }
            50%     { box-shadow: 0 8px 48px rgba(13,148,136,.65); }
        }
        @keyframes cloudDrift {
            0%,100% { transform: translateX(0); }
            50%     { transform: translateX(9px); }
        }
        @keyframes spinSlow {
            from { transform: rotate(0deg); }
            to   { transform: rotate(360deg); }
        }
        @keyframes blobMorph {
            0%,100% { border-radius: 60% 40% 30% 70% / 60% 30% 70% 40%; }
            50%     { border-radius: 30% 60% 70% 40% / 50% 60% 30% 60%; }
        }

        .anim-float     { animation: floatY     4s ease-in-out infinite; }
        .anim-float-slow{ animation: floatYSlow 6s ease-in-out infinite; }
        .anim-bounce-in { animation: bounceIn   .75s cubic-bezier(.34,1.56,.64,1) both; }
        .anim-slide-up  { animation: slideUp    .7s  ease-out both; }
        .anim-twinkle   { animation: twinkle    2.8s ease-in-out infinite; }
        .anim-glow      { animation: pulseGlow  2.2s ease-in-out infinite; }
        .anim-cloud     { animation: cloudDrift 5.5s ease-in-out infinite; }
        .anim-spin-slow { animation: spinSlow   22s  linear infinite; }
        .anim-blob      { animation: blobMorph  9s   ease-in-out infinite; }

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
        .d-1800 { animation-delay:1.80s; }
        .d-2200 { animation-delay:2.20s; }

        .card-hover {
            transition: transform .32s cubic-bezier(.34,1.56,.64,1), box-shadow .3s ease;
        }
        .card-hover:hover {
            transform: translateY(-8px) rotate(.4deg);
            box-shadow: 0 22px 50px rgba(13,148,136,.13);
        }

        .btn-cta {
            transition: transform .22s cubic-bezier(.34,1.56,.64,1), box-shadow .22s ease;
        }
        .btn-cta:hover  { transform: scale(1.05) translateY(-2px); }
        .btn-cta:active { transform: scale(.96); }

        .input-game {
            transition: border-color .2s, box-shadow .2s;
        }
        .input-game:focus {
            border-color: #0d9488 !important;
            box-shadow: 0 0 0 4px rgba(13,148,136,.15);
            outline: none;
        }
    </style>
</head>
<body class="bg-gradient-to-br from-teal-50 via-sky-50 to-emerald-50 min-h-screen overflow-x-hidden">

{{-- ════════════════════════════════════════
     NAVBAR
════════════════════════════════════════ --}}
<nav class="sticky top-0 z-50 bg-white/90 backdrop-blur-md border-b border-teal-100 shadow-sm">
    <div class="max-w-6xl mx-auto px-5 py-3 flex items-center justify-between">
        <a href="{{ route('welcome') }}" class="flex items-center gap-2 group">
            <img src="{{ asset('img/logo-tinythink.png') }}" 
                alt="Logo Tiny Think"
                class="w-10 h-10 object-contain flex-shrink-0 transition-transform group-hover:scale-105">
            <span class="text-xl font-black text-teal-700 group-hover:text-teal-500 transition-colors">Belajar Hijaiyah</span>
        </a>
    <div class="flex items-center gap-5">
        <a href="{{ route('hijaiyah') }}"
        class="text-sm font-bold text-red-400 hover:text-red-600 transition-colors">
        Keluar
        </a>
    </div>
    </div>
</nav>

{{-- Flash messages --}}
<div class="max-w-6xl mx-auto px-5">
    @if(session('error'))
        <div class="mt-4 bg-red-50 border border-red-200 text-red-700 rounded-xl px-4 py-3 text-sm font-semibold anim-slide-up">{{ session('error') }}</div>
    @endif
    @if(session('success'))
        <div class="mt-4 bg-green-50 border border-green-200 text-green-700 rounded-xl px-4 py-3 text-sm font-semibold anim-slide-up">{{ session('success') }}</div>
    @endif
    @if(session('info'))
        <div class="mt-4 bg-sky-50 border border-sky-200 text-sky-700 rounded-xl px-4 py-3 text-sm font-semibold anim-slide-up">{{ session('info') }}</div>
    @endif
    @if($errors->any())
        <div class="mt-4 bg-red-50 border border-red-200 text-red-700 rounded-xl px-4 py-3 text-sm font-semibold anim-slide-up" id="portal-errors">
            Mohon periksa kembali isian formulir di bawah.
        </div>
    @endif
</div>

{{-- ════════════════════════════════════════
     HERO
════════════════════════════════════════ --}}
<section class="relative overflow-hidden min-h-[88vh] flex flex-col justify-center">

    {{-- Background blobs --}}
    <div aria-hidden="true" class="pointer-events-none">
        <div class="absolute -top-24 -right-24 w-96 h-96 bg-teal-200 opacity-20 rounded-full anim-blob"></div>
        <div class="absolute -bottom-20 -left-20 w-80 h-80 bg-emerald-200 opacity-20 rounded-full anim-blob d-1800"></div>
        <div class="absolute top-1/3 left-1/3 w-56 h-56 bg-sky-200 opacity-15 rounded-full anim-blob d-1000"></div>
    </div>

    {{-- Background Arabic letters --}}
    <div aria-hidden="true" class="absolute inset-0 pointer-events-none select-none overflow-hidden">
        @foreach([
            ['ا','7%','12%','text-7xl','text-teal-200','d-100'],
            ['ب','83%','8%', 'text-6xl','text-sky-200', 'd-300'],
            ['ت','4%', '58%','text-5xl','text-emerald-200','d-500'],
            ['ث','88%','48%','text-7xl','text-teal-200','d-200'],
            ['ج','18%','82%','text-6xl','text-sky-200','d-700'],
            ['ح','72%','78%','text-5xl','text-emerald-200','d-400'],
            ['خ','48%','3%', 'text-6xl','text-teal-200','d-600'],
        ] as [$ltr,$x,$y,$sz,$clr,$d])
            <span class="absolute font-arabic {{ $sz }} {{ $clr }} anim-float-slow {{ $d }} opacity-40"
                  style="left:{{ $x }};top:{{ $y }}">{{ $ltr }}</span>
        @endforeach
    </div>

    {{-- Stars --}}
    <div aria-hidden="true" class="absolute inset-0 pointer-events-none select-none">
        @foreach([
            ['11%','7%','18','d-100'],['87%','18%','13','d-300'],
            ['5%','42%','11','d-500'],['91%','63%','15','d-200'],
            ['33%','4%','11','d-800'],['61%','88%','13','d-400'],
            ['76%','35%','9','d-600'],
        ] as [$x,$y,$s,$d])
            <svg class="absolute anim-twinkle {{ $d }}" style="left:{{ $x }};top:{{ $y }};width:{{ $s }}px;height:{{ $s }}px" viewBox="0 0 24 24" fill="#fbbf24">
                <path d="M12 2l2.4 7.4H22l-6.2 4.5 2.4 7.4L12 17l-6.2 4.3 2.4-7.4L2 9.4h7.6z"/>
            </svg>
        @endforeach
    </div>

    <div class="max-w-6xl mx-auto px-5 py-16 lg:py-20 grid lg:grid-cols-2 gap-10 items-center relative z-10">

        {{-- Left: copy --}}
        <div>
            <div class="inline-flex items-center gap-2 bg-teal-50 border border-teal-200 text-teal-700 text-xs font-black uppercase tracking-widest px-3 py-1.5 rounded-full mb-5 anim-slide-up">
                <svg class="w-3.5 h-3.5" viewBox="0 0 20 20" fill="currentColor"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 00.951-.69l1.07-3.292z"/></svg>
                Modul Belajar Hijaiyah
            </div>

            <h1 class="text-4xl lg:text-5xl xl:text-[3.4rem] font-black text-gray-800 leading-tight mb-5 anim-slide-up d-100">
                Perjalanan menuju<br>
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-teal-600 to-emerald-500">Al-Qur'an</span>
                dimulai dari satu huruf
            </h1>

            <p class="text-lg text-gray-500 mb-8 max-w-md anim-slide-up d-200">
                Kenali 28 huruf hijaiyah dengan cara yang menyenangkan, interaktif, dan mudah dipahami untuk semua kalangan.
            </p>

            <div class="flex flex-wrap items-center gap-4 anim-slide-up d-300">
                <a href="#portal"
                   class="btn-cta anim-glow inline-flex items-center gap-3 bg-gradient-to-r from-teal-600 to-emerald-500 text-white text-lg font-black px-9 py-4 rounded-2xl shadow-lg">
                    <svg class="w-6 h-6" viewBox="0 0 24 24" fill="currentColor"><path d="M8 5v14l11-7z"/></svg>
                    Mulai Perjalanan
                </a>
                <span class="text-sm text-gray-400 font-semibold">Gratis · Tanpa Daftar · Langsung Main</span>
            </div>
        </div>

        {{-- Right: illustration --}}
        <div class="flex justify-center anim-bounce-in d-200">
            <div class="relative w-full max-w-sm lg:max-w-md">
                <div class="absolute inset-0 rounded-full bg-gradient-to-br from-teal-200 to-emerald-200 opacity-25 blur-3xl scale-110"></div>
                <svg viewBox="0 0 380 360" class="w-full relative drop-shadow-xl" xmlns="http://www.w3.org/2000/svg">

                    {{-- Ground --}}
                    <ellipse cx="190" cy="330" rx="155" ry="26" fill="#ccfbf1" opacity=".7"/>

                    {{-- Clouds --}}
                    <g class="anim-cloud d-500">
                        <ellipse cx="55"  cy="75"  rx="32" ry="19" fill="white" opacity=".85"/>
                        <ellipse cx="38"  cy="86"  rx="22" ry="15" fill="white" opacity=".85"/>
                        <ellipse cx="72"  cy="86"  rx="22" ry="15" fill="white" opacity=".85"/>
                    </g>
                    <g class="anim-cloud d-1400">
                        <ellipse cx="315" cy="55"  rx="27" ry="16" fill="white" opacity=".75"/>
                        <ellipse cx="298" cy="64"  rx="19" ry="13" fill="white" opacity=".75"/>
                        <ellipse cx="332" cy="64"  rx="19" ry="13" fill="white" opacity=".75"/>
                    </g>

                    {{-- ── CHARACTER ── --}}
                    {{-- Shoes --}}
                    <ellipse cx="168" cy="312" rx="18" ry="10" fill="#134e4a"/>
                    <ellipse cx="198" cy="312" rx="18" ry="10" fill="#134e4a"/>
                    {{-- Legs --}}
                    <rect x="153" y="262" width="30" height="52" rx="15" fill="#0f766e"/>
                    <rect x="183" y="262" width="30" height="52" rx="15" fill="#0f766e"/>
                    {{-- Body --}}
                    <rect x="150" y="182" width="76" height="88" rx="26" fill="#0d9488"/>
                    {{-- Collar --}}
                    <path d="M166 182 L188 200 L210 182" stroke="white" stroke-width="2.5" fill="none" stroke-linecap="round" stroke-linejoin="round"/>
                    {{-- Left arm --}}
                    <path d="M150 202 Q118 226 120 255" stroke="#0d9488" stroke-width="20" stroke-linecap="round" fill="none"/>
                    <circle cx="120" cy="259" r="11" fill="#fac898"/>
                    {{-- Right arm --}}
                    <path d="M226 202 Q258 226 256 255" stroke="#0d9488" stroke-width="20" stroke-linecap="round" fill="none"/>
                    <circle cx="256" cy="259" r="11" fill="#fac898"/>

                    {{-- Book --}}
                    <rect x="112" y="254" width="152" height="56" rx="8" fill="white" stroke="#e2e8f0" stroke-width="2"/>
                    <rect x="184" y="254" width="5"   height="56" fill="#cbd5e1" rx="2"/>
                    <rect x="116" y="258" width="64"  height="48" rx="4" fill="#f0fdfa"/>
                    <rect x="196" y="258" width="64"  height="48" rx="4" fill="#f0fdfa"/>
                    <text x="148" y="288" font-family="Amiri,serif" font-size="30" fill="#0d9488" text-anchor="middle">ا</text>
                    <text x="228" y="288" font-family="Amiri,serif" font-size="30" fill="#059669" text-anchor="middle">ب</text>

                    {{-- Neck --}}
                    <rect x="178" y="164" width="20" height="22" rx="10" fill="#fac898"/>
                    {{-- Head --}}
                    <circle cx="188" cy="148" r="42" fill="#fac898"/>
                    {{-- Peci --}}
                    <path d="M146 141 Q148 108 188 106 Q228 108 230 141 Z" fill="#134e4a"/>
                    <path d="M148 141 Q150 114 188 112 Q226 114 228 141" stroke="#0f766e" stroke-width="1.5" fill="none"/>
                    {{-- Ears --}}
                    <ellipse cx="146" cy="152" rx="9"  ry="11" fill="#fac898"/>
                    <ellipse cx="230" cy="152" rx="9"  ry="11" fill="#fac898"/>
                    <ellipse cx="146" cy="152" rx="5"  ry="6.5" fill="#e9a87a"/>
                    <ellipse cx="230" cy="152" rx="5"  ry="6.5" fill="#e9a87a"/>
                    {{-- Eyes --}}
                    <ellipse cx="174" cy="150" rx="6"  ry="6.5" fill="#1c1917"/>
                    <ellipse cx="202" cy="150" rx="6"  ry="6.5" fill="#1c1917"/>
                    <circle  cx="176.5" cy="147" r="2.2" fill="white"/>
                    <circle  cx="204.5" cy="147" r="2.2" fill="white"/>
                    {{-- Eyebrows --}}
                    <path d="M167 139 Q174 135 181 139" stroke="#92400e" stroke-width="2.2" fill="none" stroke-linecap="round"/>
                    <path d="M195 139 Q202 135 209 139" stroke="#92400e" stroke-width="2.2" fill="none" stroke-linecap="round"/>
                    {{-- Smile --}}
                    <path d="M176 161 Q188 172 200 161" stroke="#c2410c" stroke-width="2.8" fill="none" stroke-linecap="round"/>
                    {{-- Blush --}}
                    <circle cx="162" cy="163" r="9" fill="#fda4af" opacity=".35"/>
                    <circle cx="214" cy="163" r="9" fill="#fda4af" opacity=".35"/>

                    {{-- Floating letter bubbles --}}
                    <g class="anim-float d-200">
                        <circle cx="62"  cy="168" r="24" fill="#0d9488" opacity=".12"/>
                        <text   x="62"  y="176"  font-family="Amiri,serif" font-size="28" fill="#0d9488"  text-anchor="middle">ت</text>
                    </g>
                    <g class="anim-float d-500">
                        <circle cx="315" cy="148" r="22" fill="#10b981" opacity=".12"/>
                        <text   x="315" y="156"  font-family="Amiri,serif" font-size="26" fill="#059669"  text-anchor="middle">ج</text>
                    </g>
                    <g class="anim-float d-800">
                        <circle cx="72"  cy="248" r="20" fill="#0ea5e9" opacity=".12"/>
                        <text   x="72"  y="256"  font-family="Amiri,serif" font-size="24" fill="#0284c7"  text-anchor="middle">د</text>
                    </g>
                    <g class="anim-float d-300">
                        <circle cx="308" cy="230" r="20" fill="#8b5cf6" opacity=".10"/>
                        <text   x="308" y="238"  font-family="Amiri,serif" font-size="24" fill="#7c3aed"  text-anchor="middle">ر</text>
                    </g>
                    <g class="anim-float d-700">
                        <circle cx="50"  cy="318" r="17" fill="#10b981" opacity=".10"/>
                        <text   x="50"  y="325"  font-family="Amiri,serif" font-size="20" fill="#059669"  text-anchor="middle">م</text>
                    </g>
                    <g class="anim-float d-1000">
                        <circle cx="322" cy="308" r="17" fill="#f59e0b" opacity=".10"/>
                        <text   x="322" y="315"  font-family="Amiri,serif" font-size="20" fill="#d97706"  text-anchor="middle">س</text>
                    </g>

                    {{-- Stars in illo --}}
                    <path d="M100 42 l3.2 9.8h10.3l-8.3 6 3.2 9.8L100 61l-8.4 6.6 3.2-9.8-8.3-6h10.3z" fill="#fbbf24" opacity=".85" class="anim-twinkle d-200"/>
                    <path d="M272 86 l2.6 8h8.4l-6.8 4.9 2.6 8-6.8-4.9-6.8 4.9 2.6-8-6.8-4.9h8.4z"      fill="#fbbf24" opacity=".75" class="anim-twinkle d-500"/>
                    <path d="M340 178 l2 6.2h6.5l-5.3 3.8 2 6.2-5.2-3.8-5.3 3.8 2-6.2-5.3-3.8h6.6z"      fill="#fbbf24" opacity=".65" class="anim-twinkle d-800"/>
                    <path d="M28 210 l1.8 5.5h5.8l-4.7 3.4 1.8 5.5-4.7-3.4-4.7 3.4 1.8-5.5-4.7-3.4h5.8z"  fill="#fbbf24" opacity=".65" class="anim-twinkle d-400"/>
                </svg>
            </div>
        </div>
    </div>

    {{-- Scroll cue --}}
    <div class="text-center pb-8 relative z-10 anim-float d-600">
        <a href="#how-it-works" class="inline-flex flex-col items-center gap-1 text-teal-400 hover:text-teal-600 transition-colors">
            <span class="text-xs font-bold">Pelajari Lebih Lanjut</span>
            <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                <path d="M19 9l-7 7-7-7"/>
            </svg>
        </a>
    </div>
</section>

{{-- ════════════════════════════════════════
     HOW IT WORKS
════════════════════════════════════════ --}}
<section id="how-it-works" class="py-20 bg-white/55 backdrop-blur-sm">
    <div class="max-w-6xl mx-auto px-5">

        <div class="text-center mb-14">
            <span class="text-teal-600 font-black text-xs uppercase tracking-widest">Cara Kerja</span>
            <h2 class="text-3xl lg:text-4xl font-black text-gray-800 mt-2">Bagaimana cara belajarnya?</h2>
            <p class="text-gray-500 mt-3 max-w-sm mx-auto text-sm">Tiga langkah sederhana menuju kemampuan membaca Al-Qur'an</p>
        </div>

        <div class="grid md:grid-cols-3 gap-6">

            {{-- Card 1 --}}
            <div class="card-hover bg-white rounded-3xl p-7 shadow-sm border border-teal-50 relative overflow-hidden">
                <span class="absolute top-4 right-5 text-teal-100 font-black text-6xl leading-none select-none" aria-hidden="true">1</span>
                <div class="w-16 h-16 bg-gradient-to-br from-teal-500 to-teal-600 rounded-2xl flex items-center justify-center mb-5 shadow-lg shadow-teal-100">
                    <svg class="w-9 h-9" viewBox="0 0 48 48" fill="none">
                        <path d="M24 10C24 10 13 8 5 10L5 39C13 37 24 39 24 39C24 39 35 37 43 39L43 10C35 8 24 10 24 10Z" stroke="white" stroke-width="2.5" fill="rgba(255,255,255,.15)" stroke-linejoin="round"/>
                        <line x1="24" y1="10" x2="24" y2="39" stroke="white" stroke-width="2.5"/>
                        <line x1="9"  y1="17" x2="21" y2="17" stroke="white" stroke-width="2" stroke-linecap="round" opacity=".7"/>
                        <line x1="9"  y1="23" x2="21" y2="23" stroke="white" stroke-width="2" stroke-linecap="round" opacity=".7"/>
                        <line x1="9"  y1="29" x2="21" y2="29" stroke="white" stroke-width="2" stroke-linecap="round" opacity=".7"/>
                        <line x1="27" y1="17" x2="39" y2="17" stroke="white" stroke-width="2" stroke-linecap="round" opacity=".7"/>
                        <line x1="27" y1="23" x2="39" y2="23" stroke="white" stroke-width="2" stroke-linecap="round" opacity=".7"/>
                        <line x1="27" y1="29" x2="39" y2="29" stroke="white" stroke-width="2" stroke-linecap="round" opacity=".7"/>
                    </svg>
                </div>
                <h3 class="text-xl font-black text-gray-800 mb-2">Belajar</h3>
                <p class="text-gray-500 text-sm leading-relaxed">Kenali 28 huruf hijaiyah lengkap beserta cara pengucapan yang benar melalui modul belajar interaktif.</p>
                <div class="mt-5 flex items-center gap-1.5 text-teal-600 text-sm font-bold">
                    Mulai dari huruf Alif
                    <svg class="w-4 h-4" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"/></svg>
                </div>
            </div>

            {{-- Card 2 --}}
            <div class="card-hover bg-white rounded-3xl p-7 shadow-sm border border-sky-50 relative overflow-hidden">
                <span class="absolute top-4 right-5 text-sky-100 font-black text-6xl leading-none select-none" aria-hidden="true">2</span>
                <div class="w-16 h-16 bg-gradient-to-br from-sky-500 to-sky-600 rounded-2xl flex items-center justify-center mb-5 shadow-lg shadow-sky-100">
                    <svg class="w-9 h-9" viewBox="0 0 48 48" fill="none">
                        <circle cx="24" cy="24" r="17" stroke="white" stroke-width="2.5" fill="rgba(255,255,255,.1)"/>
                        <circle cx="24" cy="24" r="10" stroke="white" stroke-width="2.5" fill="rgba(255,255,255,.15)"/>
                        <circle cx="24" cy="24" r="4"  fill="white"/>
                        <path d="M32 9L37 5L44 5L44 12L40 16L35 11Z" fill="rgba(255,255,255,.7)"/>
                        <line x1="35" y1="13" x2="26" y2="22" stroke="white" stroke-width="2.2" stroke-linecap="round"/>
                    </svg>
                </div>
                <h3 class="text-xl font-black text-gray-800 mb-2">Kuis Seru</h3>
                <p class="text-gray-500 text-sm leading-relaxed">Uji pemahamanmu dengan soal-soal kuis pilihan ganda yang menarik setelah menyelesaikan setiap materi.</p>
                <div class="mt-5 flex items-center gap-1.5 text-sky-600 text-sm font-bold">
                    10 soal per sesi
                    <svg class="w-4 h-4" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"/></svg>
                </div>
            </div>

            {{-- Card 3 --}}
            <div class="card-hover bg-white rounded-3xl p-7 shadow-sm border border-emerald-50 relative overflow-hidden">
                <span class="absolute top-4 right-5 text-emerald-100 font-black text-6xl leading-none select-none" aria-hidden="true">3</span>
                <div class="w-16 h-16 bg-gradient-to-br from-emerald-500 to-emerald-600 rounded-2xl flex items-center justify-center mb-5 shadow-lg shadow-emerald-100">
                    <svg class="w-9 h-9" viewBox="0 0 48 48" fill="none">
                        <path d="M16 8h16v16a8 8 0 01-16 0V8z" stroke="white" stroke-width="2.5" fill="rgba(255,255,255,.15)"/>
                        <path d="M16 15H8a4 4 0 004 4h4"  stroke="white" stroke-width="2.5" stroke-linecap="round"/>
                        <path d="M32 15h8a4 4 0 01-4 4h-4" stroke="white" stroke-width="2.5" stroke-linecap="round"/>
                        <line x1="24" y1="32" x2="24" y2="38" stroke="white" stroke-width="2.5" stroke-linecap="round"/>
                        <line x1="18" y1="38" x2="30" y2="38" stroke="white" stroke-width="2.5" stroke-linecap="round"/>
                        <circle cx="24" cy="19" r="3.5" fill="rgba(255,255,255,.85)"/>
                    </svg>
                </div>
                <h3 class="text-xl font-black text-gray-800 mb-2">Catat Nilaimu</h3>
                <p class="text-gray-500 text-sm leading-relaxed">Hasil belajarmu otomatis tersimpan dan dapat dilihat oleh guru sebagai laporan kemajuan belajar.</p>
                <div class="mt-5 flex items-center gap-1.5 text-emerald-600 text-sm font-bold">
                    Dilaporkan ke guru
                    <svg class="w-4 h-4" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"/></svg>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ════════════════════════════════════════
     ENTRY PORTAL
════════════════════════════════════════ --}}
<section id="portal" class="py-20 scroll-mt-16 relative overflow-hidden">

    {{-- Rotating geometric bg --}}
    <div aria-hidden="true" class="absolute inset-0 pointer-events-none flex items-center justify-center opacity-[.04]">
        <svg class="w-[640px] h-[640px] anim-spin-slow" viewBox="0 0 200 200">
            <polygon points="100,5 122,72 192,72 136,116 158,183 100,140 42,183 64,116 8,72 78,72" fill="#0d9488"/>
            <polygon points="100,25 118,78 172,78 128,108 146,162 100,128 54,162 72,108 28,78 82,78" fill="none" stroke="#0d9488" stroke-width="1.5"/>
            <polygon points="100,48 113,85 152,85 122,106 135,143 100,120 65,143 78,106 48,85 87,85" fill="#0d9488"/>
        </svg>
    </div>

    <div class="max-w-[440px] mx-auto px-5 relative z-10">

        {{-- Portal heading --}}
        <div class="text-center mb-8">
            <div class="flex justify-center mb-4">
                <svg class="w-16 h-16 anim-float" viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg">
                    <defs>
                        <linearGradient id="sg" x1="0%" y1="0%" x2="100%" y2="100%">
                            <stop offset="0%"   stop-color="#0d9488"/>
                            <stop offset="100%" stop-color="#10b981"/>
                        </linearGradient>
                    </defs>
                    <path d="M32 4L36.4 19.2H52L39.8 28.2L44.2 43.4L32 34.4L19.8 43.4L24.2 28.2L12 19.2H27.6Z" fill="url(#sg)" opacity=".9"/>
                    <circle cx="32" cy="26" r="10" fill="white"/>
                    <text x="32" y="32" font-family="Amiri,serif" font-size="15" fill="#0d9488" text-anchor="middle">ا</text>
                </svg>
            </div>
            <h2 class="text-3xl font-black text-gray-800">Siap Memulai?</h2>
            <p class="text-gray-500 mt-1.5 text-sm">Masukkan namamu untuk mulai petualangan belajar!</p>
        </div>

        {{-- Form card --}}
        <div class="bg-white rounded-3xl shadow-xl border border-teal-100 overflow-hidden">

            {{-- Card header --}}
            <div class="bg-gradient-to-r from-teal-600 to-emerald-500 px-8 py-6">
                <div class="flex items-center gap-3 mb-3">
                    <div class="w-10 h-10 bg-white/20 rounded-xl flex items-center justify-center flex-shrink-0">
                        <svg class="w-6 h-6 text-white" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M8 5v14l11-7z"/>
                        </svg>
                    </div>
                    <div>
                        <p class="text-white/75 text-xs font-bold uppercase tracking-wider">Portal Masuk</p>
                        <p class="text-white font-black text-lg leading-tight">Belajar Hijaiyah</p>
                    </div>
                </div>
                <div class="flex gap-3 opacity-30 select-none" aria-hidden="true">
                    @foreach(['ا','ب','ت','ث','ج','ح'] as $l)
                        <span class="font-arabic text-white text-2xl">{{ $l }}</span>
                    @endforeach
                </div>
            </div>

            {{-- Form body --}}
            <div class="px-8 py-7">
                <form method="POST" action="{{ route('game.enter.submit') }}">
                    @csrf

                    {{-- Name --}}
                    <div class="mb-5">
                        <label for="name" class="flex items-center gap-1.5 text-sm font-black text-gray-700 mb-2">
                            <svg class="w-4 h-4 text-teal-500 flex-shrink-0" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
                            </svg>
                            Nama Kamu <span class="text-red-400">*</span>
                        </label>
                        <input
                            type="text"
                            id="name"
                            name="name"
                            value="{{ old('name') }}"
                            placeholder="Contoh: Fadly Kalam"
                            required
                            class="input-game w-full px-4 py-3.5 rounded-xl border-2 {{ $errors->has('name') ? 'border-red-400' : 'border-gray-200' }} text-gray-800 font-semibold"
                        >
                        @error('name')
                            <p class="mt-1.5 text-sm text-red-500 flex items-center gap-1">
                                <svg class="w-4 h-4 flex-shrink-0" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <button type="submit"
                            class="btn-cta anim-glow w-full bg-gradient-to-r from-teal-600 to-emerald-500 text-white font-black text-lg py-4 rounded-xl shadow-lg shadow-teal-200 flex items-center justify-center gap-3">
                        <svg class="w-6 h-6" viewBox="0 0 24 24" fill="currentColor"><path d="M8 5v14l11-7z"/></svg>
                        Mulai Belajar Sekarang!
                    </button>
                </form>
            </div>
        </div>

        {{-- Trust badges --}}
        <div class="flex flex-wrap justify-center gap-5 mt-6">
            <div class="flex items-center gap-1.5 text-gray-400 text-xs font-semibold">
                <svg class="w-4 h-4 text-teal-400" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                Gratis Sepenuhnya
            </div>
            <div class="flex items-center gap-1.5 text-gray-400 text-xs font-semibold">
                <svg class="w-4 h-4 text-teal-400" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/></svg>
                Tanpa Daftar Akun
            </div>
            <div class="flex items-center gap-1.5 text-gray-400 text-xs font-semibold">
                <svg class="w-4 h-4 text-teal-400" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M12.395 2.553a1 1 0 00-1.45-.385c-.345.23-.614.558-.822.88-.214.33-.403.713-.57 1.116-.334.804-.614 1.768-.84 2.734a31.365 31.365 0 00-.613 3.58 2.64 2.64 0 01-.945-1.067c-.328-.68-.398-1.534-.398-2.654A1 1 0 005.05 6.05 6.981 6.981 0 003 11a7 7 0 1011.95-4.95c-.592-.591-.98-.985-1.348-1.467-.363-.476-.724-1.063-1.207-2.03zM12.12 15.12A3 3 0 017 13s.879.5 2.5.5c0-1 .5-4 1.25-4.5.5 1 .786 1.293 1.371 1.879A2.99 2.99 0 0113 13a2.99 2.99 0 01-.879 2.121z" clip-rule="evenodd"/></svg>
                Langsung Main
            </div>
        </div>
    </div>
</section>

{{-- ════════════════════════════════════════
     FOOTER
════════════════════════════════════════ --}}
<footer class="bg-gray-800">
    <div class="max-w-6xl mx-auto px-5 py-10 flex flex-col md:flex-row items-center justify-between gap-4">
        <div class="flex items-center gap-2">
            <img src="{{ asset('img/logo-tinythink.png') }}" 
                alt="Logo Tiny Think"
                class="w-10 h-10 object-contain flex-shrink-0 transition-transform group-hover:scale-105">
            <span class="font-black text-white">Belajar Hijaiyah</span>
        </div>
        <p class="text-sm text-gray-500">&copy; {{ date('Y') }} Tiny Think. Belajar Hijaiyah.</p>
    </div>
</footer>

@if($errors->any())
<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.getElementById('portal')?.scrollIntoView({ behavior: 'smooth' });
    });
</script>
@endif

</body>
</html>