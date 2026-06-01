<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Masuk — Belajar Hijaiyah</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Amiri:ital,wght@0,400;0,700;1,400&family=Nunito:wght@400;600;700;800;900&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        *, *::before, *::after { box-sizing: border-box; }
        body        { font-family: 'Nunito', sans-serif; }
        .font-arabic{ font-family: 'Amiri', serif; }

        @keyframes floatY {
            0%,100% { transform: translateY(0); }
            50%      { transform: translateY(-14px); }
        }
        @keyframes floatYSlow {
            0%,100% { transform: translateY(0) rotate(0deg); }
            33%     { transform: translateY(-10px) rotate(1.5deg); }
            66%     { transform: translateY(-6px)  rotate(-1deg); }
        }
        @keyframes bounceIn {
            0%   { transform: scale(.78); opacity: 0; }
            55%  { transform: scale(1.06); opacity: 1; }
            100% { transform: scale(1); }
        }
        @keyframes slideUp {
            from { transform: translateY(32px); opacity: 0; }
            to   { transform: translateY(0);    opacity: 1; }
        }
        @keyframes twinkle {
            0%,100% { opacity: .2;  transform: scale(.8);  }
            50%     { opacity: 1;   transform: scale(1.25); }
        }
        @keyframes pulseGlow {
            0%,100% { box-shadow: 0 8px 28px rgba(13,148,136,.35); }
            50%     { box-shadow: 0 8px 48px rgba(13,148,136,.65); }
        }
        @keyframes blobMorph {
            0%,100% { border-radius: 60% 40% 30% 70% / 60% 30% 70% 40%; }
            50%     { border-radius: 30% 60% 70% 40% / 50% 60% 30% 60%; }
        }

        .anim-float      { animation: floatY     4s   ease-in-out infinite; }
        .anim-float-slow { animation: floatYSlow 6s   ease-in-out infinite; }
        .anim-bounce-in  { animation: bounceIn   .75s cubic-bezier(.34,1.56,.64,1) both; }
        .anim-slide-up   { animation: slideUp    .65s ease-out both; }
        .anim-twinkle    { animation: twinkle    2.8s ease-in-out infinite; }
        .anim-glow       { animation: pulseGlow  2.2s ease-in-out infinite; }
        .anim-blob       { animation: blobMorph  9s   ease-in-out infinite; }

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

        .btn-cta {
            transition: transform .22s cubic-bezier(.34,1.56,.64,1), box-shadow .22s ease;
        }
        .btn-cta:hover  { transform: scale(1.04) translateY(-2px); }
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

{{-- ── NAVBAR ── --}}
<nav class="sticky top-0 z-50 bg-white/90 backdrop-blur-md border-b border-teal-100 shadow-sm">
    <div class="max-w-6xl mx-auto px-5 py-3 flex items-center justify-between">
        <a href="{{ route('welcome') }}" class="flex items-center gap-2 group">
            <img src="{{ asset('img/logo-tinythink.png') }}" 
                alt="Logo Tiny Think"
                class="w-10 h-10 object-contain flex-shrink-0 transition-transform group-hover:scale-105">
            <span class="text-xl font-black text-teal-700 group-hover:text-teal-500 transition-colors">Belajar Hijaiyah</span>
        </a>
        @if(session('player_token'))
            <div class="flex items-center gap-5">
                <a href="{{ route('game.modules') }}" class="text-sm font-bold text-teal-600 hover:text-teal-800 transition-colors">Modul Belajar</a>
                <form method="POST" action="{{ route('game.exit') }}" class="inline">
                    @csrf
                    <button type="submit" class="text-sm font-bold text-red-400 hover:text-red-600 transition-colors">Keluar</button>
                </form>
            </div>
        @else
        @endif
    </div>
</nav>

{{-- Flash messages --}}
<div class="max-w-lg mx-auto px-5">
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
<main class="relative min-h-[calc(100vh-64px)] flex items-center justify-center py-12 px-5 overflow-hidden">

    {{-- Background blobs --}}
    <div aria-hidden="true" class="pointer-events-none absolute inset-0">
        <div class="absolute -top-20 -right-20 w-80 h-80 bg-teal-200 opacity-20 rounded-full anim-blob"></div>
        <div class="absolute -bottom-16 -left-16 w-64 h-64 bg-emerald-200 opacity-20 rounded-full anim-blob d-1400"></div>
        <div class="absolute top-1/2 left-1/4  w-48 h-48 bg-sky-200   opacity-15 rounded-full anim-blob d-700"></div>
    </div>

    {{-- Background Arabic letters --}}
    <div aria-hidden="true" class="absolute inset-0 pointer-events-none select-none overflow-hidden">
        @foreach([
            ['ا','6%', '10%','text-6xl','text-teal-200',   'd-100'],
            ['ب','84%','8%', 'text-5xl','text-sky-200',    'd-300'],
            ['ت','3%', '55%','text-5xl','text-emerald-200','d-500'],
            ['ث','87%','52%','text-6xl','text-teal-200',   'd-200'],
            ['ج','16%','82%','text-5xl','text-sky-200',    'd-700'],
            ['ح','74%','80%','text-5xl','text-emerald-200','d-400'],
            ['خ','46%','3%', 'text-5xl','text-teal-200',   'd-600'],
        ] as [$ltr,$x,$y,$sz,$clr,$d])
            <span class="absolute font-arabic {{ $sz }} {{ $clr }} anim-float-slow {{ $d }} opacity-40"
                  style="left:{{ $x }};top:{{ $y }}">{{ $ltr }}</span>
        @endforeach
    </div>

    {{-- Background stars --}}
    <div aria-hidden="true" class="absolute inset-0 pointer-events-none select-none">
        @foreach([
            ['10%','6%','16','d-100'],['88%','16%','12','d-300'],
            ['5%', '44%','10','d-500'],['92%','66%','14','d-200'],
            ['34%','3%', '10','d-800'],['62%','90%','12','d-400'],
            ['77%','38%','9', 'd-600'],
        ] as [$x,$y,$s,$d])
            <svg class="absolute anim-twinkle {{ $d }}"
                 style="left:{{ $x }};top:{{ $y }};width:{{ $s }}px;height:{{ $s }}px"
                 viewBox="0 0 24 24" fill="#fbbf24">
                <path d="M12 2l2.4 7.4H22l-6.2 4.5 2.4 7.4L12 17l-6.2 4.3 2.4-7.4L2 9.4h7.6z"/>
            </svg>
        @endforeach
    </div>

    {{-- Portal card --}}
    <div class="relative z-10 w-full max-w-[440px]">

        {{-- Heading --}}
        <div class="text-center mb-8 anim-bounce-in">
            <div class="flex justify-center mb-4">
                <svg class="w-16 h-16 anim-float" viewBox="0 0 64 64">
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
            <h1 class="text-3xl font-black text-gray-800">Siapa Namamu?</h1>
            <p class="text-gray-500 mt-1.5 text-sm">Masukkan namamu untuk mulai petualangan belajar!</p>
        </div>

        {{-- Card --}}
        <div class="bg-white rounded-3xl shadow-xl border border-teal-100 overflow-hidden anim-slide-up d-100">

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

            {{-- Form --}}
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
                            autofocus
                            class="input-game w-full px-4 py-3.5 rounded-xl border-2 {{ $errors->has('name') ? 'border-red-400' : 'border-gray-200' }} text-gray-800 font-semibold"
                        >
                        @error('name')
                            <p class="mt-1.5 text-sm text-red-500 flex items-center gap-1">
                                <svg class="w-4 h-4 flex-shrink-0" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    {{-- Class code --}}
                    <div class="mb-7">
                        <label for="class_code" class="flex items-center gap-1.5 text-sm font-black text-gray-700 mb-2">
                            <svg class="w-4 h-4 text-teal-500 flex-shrink-0" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0zM6 18a1 1 0 001-1v-2.065a8.935 8.935 0 00-2-.712V17a1 1 0 001 1z"/>
                            </svg>
                            Kode Kelas
                            <span class="text-gray-400 font-normal text-xs">(opsional)</span>
                        </label>
                        <input
                            type="text"
                            id="class_code"
                            name="class_code"
                            value="{{ old('class_code') }}"
                            placeholder="AISYIYAH1"
                            maxlength="9"
                            class="input-game w-full px-4 py-3.5 rounded-xl border-2 {{ $errors->has('class_code') ? 'border-red-400' : 'border-gray-200' }} text-gray-800 font-black uppercase tracking-[.3em] text-center"
                            oninput="this.value = this.value.toUpperCase()"
                        >
                        <p class="mt-1.5 text-xs text-gray-400 text-center">Kode dari guru (9 huruf). Kosongkan jika tidak punya.</p>
                        @error('class_code')
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
        <div class="flex flex-wrap justify-center gap-5 mt-6 anim-slide-up d-300">
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

        {{-- Back link --}}
        <div class="text-center mt-5 anim-slide-up d-400">
            <a href="{{ route('welcome') }}" class="text-sm text-gray-400 hover:text-teal-600 transition-colors font-semibold inline-flex items-center gap-1">
                <svg class="w-4 h-4" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd"/></svg>
                Kembali ke halaman utama
            </a>
        </div>
    </div>
</main>

<footer class="text-center text-gray-400 text-sm py-6 border-t border-gray-100">
    &copy; {{ date('Y') }} Tiny Think. Belajar Hijaiyah.
</footer>

</body>
</html>