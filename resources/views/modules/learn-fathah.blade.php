<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Harakat Fathah — Belajar Hijaiyah</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Amiri:wght@400;700&family=Nunito:wght@400;600;700;800;900&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        *, *::before, *::after { box-sizing: border-box; }
        body        { font-family: 'Nunito', sans-serif; }
        .font-arabic{ font-family: 'Amiri', serif; }

        /* ── Keyframes ── */
        @keyframes popIn {
            0%   { opacity: 0; transform: scale(.18) rotate(-20deg); }
            65%  { transform: scale(1.14) rotate(3deg); opacity: 1; }
            100% { transform: scale(1) rotate(0deg); opacity: 1; }
        }
        @keyframes floatLetter {
            0%,100% { transform: translateY(0); }
            50%     { transform: translateY(-7px); }
        }
        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(18px); }
            to   { opacity: 1; transform: translateY(0); }
        }
        @keyframes pulseGlow {
            0%,100% { box-shadow: 0 6px 24px rgba(13,148,136,.40); }
            50%     { box-shadow: 0 6px 42px rgba(13,148,136,.70); }
        }
        @keyframes centerPulse {
            0%,100% { box-shadow: 0 0 0 0 rgba(13,148,136,.25), 0 8px 28px rgba(13,148,136,.18); }
            50%     { box-shadow: 0 0 0 12px rgba(13,148,136,.00), 0 8px 28px rgba(13,148,136,.32); }
        }
        @keyframes blobMorph {
            0%,100% { border-radius: 60% 40% 30% 70%/60% 30% 70% 40%; }
            50%     { border-radius: 30% 60% 70% 40%/50% 60% 30% 60%; }
        }
        @keyframes twinkle {
            0%,100% { opacity: .2; transform: scale(.8); }
            50%     { opacity: 1;  transform: scale(1.2); }
        }

        /* ── Letter circle nodes ── */
        .letter-node {
            width: 48px; height: 48px;
            border-radius: 50%;
            position: absolute;
            display: flex; align-items: center; justify-content: center;
            cursor: pointer;
            border: 2px solid rgba(255,255,255,.35);
            color: white;
            animation: popIn .55s cubic-bezier(.34,1.56,.64,1) both,
                       floatLetter 3.8s ease-in-out infinite;
            transition: transform .18s cubic-bezier(.34,1.56,.64,1), filter .18s;
            -webkit-tap-highlight-color: transparent;
            outline: none;
        }
        .letter-node:hover  { transform: scale(1.28) !important; filter: brightness(1.1); z-index: 20; }
        .letter-node:active { transform: scale(1.05) !important; }
        .letter-node.opened { border-color: rgba(255,255,255,.85); }

        /* ── Letter grid chips (mobile) ── */
        .letter-chip {
            border-radius: 14px;
            padding: 10px 6px 8px;
            display: flex; flex-direction: column; align-items: center; justify-content: center;
            cursor: pointer; color: white;
            animation: popIn .5s cubic-bezier(.34,1.56,.64,1) both;
            transition: transform .18s cubic-bezier(.34,1.56,.64,1), filter .18s;
            -webkit-tap-highlight-color: transparent;
            outline: none;
            border: 2px solid rgba(255,255,255,.2);
        }
        .letter-chip:hover  { transform: translateY(-4px) scale(1.06); filter: brightness(1.08); }
        .letter-chip:active { transform: scale(.95); }
        .letter-chip.opened { border-color: rgba(255,255,255,.75); }

       /* ── Color palette (cycling × 4) ── */
        .cc-teal    { background: linear-gradient(135deg,#0d9488,#14b8a6); box-shadow: 0 4px 14px rgba(13,148,136,.42); }
        .cc-emerald { background: linear-gradient(135deg,#059669,#34d399); box-shadow: 0 4px 14px rgba(5,150,105,.42); }
        .cc-sky     { background: linear-gradient(135deg,#0284c7,#38bdf8); box-shadow: 0 4px 14px rgba(2,132,199,.42); }
        .cc-cyan    { background: linear-gradient(135deg,#0891b2,#22d3ee); box-shadow: 0 4px 14px rgba(8,145,178,.42); }

        /* ── Orbit ring ── */
        .orbit-ring {
            position: absolute; border-radius: 50%;
            border: 1.5px dashed rgba(13,148,136,.18);
            pointer-events: none;
        }

        /* ── Center hub ── */
        .center-hub { animation: centerPulse 2.8s ease-in-out infinite; }

        /* ── Utility ── */
        .anim-fade-up { animation: fadeUp .6s ease-out both; }
        .anim-glow    { animation: pulseGlow 2.2s ease-in-out infinite; }
        .anim-blob    { animation: blobMorph 9s ease-in-out infinite; }
        .anim-twinkle { animation: twinkle 2.8s ease-in-out infinite; }
        .d-100  { animation-delay: .1s; }
        .d-200  { animation-delay: .2s; }
        .d-300  { animation-delay: .3s; }
        .d-500  { animation-delay: .5s; }
        .d-800  { animation-delay: .8s; }
        .d-1400 { animation-delay: 1.4s; }

        /* ── Buttons ── */
        .btn-audio {
            transition: transform .18s cubic-bezier(.34,1.56,.64,1), filter .18s;
        }
        .btn-audio:hover  { transform: scale(1.05); }
        .btn-audio:active { transform: scale(.93); }

        .btn-mnav {
            transition: transform .18s cubic-bezier(.34,1.56,.64,1), background-color .15s, border-color .15s, color .15s;
        }
        .btn-mnav:hover  { transform: scale(1.04) translateY(-1px); }
        .btn-mnav:active { transform: scale(.93); }

        [x-cloak] { display: none !important; }
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
            <a href="{{ route('game.modules') }}" class="text-sm font-bold text-gray-500 hover:text-teal-600 transition-colors flex items-center gap-1.5">
                <svg class="w-4 h-4" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd"/></svg>
                Modul
            </a>
            <form method="POST" action="{{ route('game.exit') }}" class="inline">
                @csrf
                <button type="submit" class="text-sm font-bold text-red-400 hover:text-red-600 transition-colors">Keluar</button>
            </form>
        </div>
    </div>
</nav>

{{-- ── MAIN ── --}}
<main x-data="fathahCircle({{ json_encode($letters) }})">

    {{-- Background decorations --}}
    <div aria-hidden="true" class="pointer-events-none fixed inset-0 -z-10 overflow-hidden">
        <div class="absolute -top-24 -right-24 w-80 h-80 bg-teal-200   opacity-[.12] anim-blob"></div>
        <div class="absolute -bottom-16 -left-16 w-64 h-64 bg-emerald-200 opacity-[.12] anim-blob d-1400"></div>
        @foreach([
            ['8%','6%','14','d-100'],['89%','11%','11','d-300'],
            ['4%','55%','9','d-500'],['92%','65%','13','d-200'],['44%','2%','9','d-800'],
        ] as [$x,$y,$s,$d])
            <svg class="absolute anim-twinkle {{ $d }}" style="left:{{ $x }};top:{{ $y }};width:{{ $s }}px;height:{{ $s }}px" viewBox="0 0 24 24" fill="#fbbf24">
                <path d="M12 2l2.4 7.4H22l-6.2 4.5 2.4 7.4L12 17l-6.2 4.3 2.4-7.4L2 9.4h7.6z"/>
            </svg>
        @endforeach
    </div>

    {{-- ── PAGE HEADER ── --}}
    <div class="text-center pt-8 pb-3 px-4 anim-fade-up">
        <div class="inline-flex items-center gap-2 bg-teal-50 border border-teal-200 text-teal-700 text-xs font-black uppercase tracking-widest px-3 py-1.5 rounded-full mb-3">
            <svg class="w-3.5 h-3.5" viewBox="0 0 20 20" fill="currentColor"><path d="M9 4.804A7.968 7.968 0 005.5 4c-1.255 0-2.443.29-3.5.804v10A7.969 7.969 0 015.5 14c1.669 0 3.218.51 4.5 1.385A7.962 7.962 0 0114.5 14c1.255 0 2.443.29 3.5.804v-10A7.968 7.968 0 0014.5 4c-1.255 0-2.443.29-3.5.804V12a1 1 0 11-2 0V4.804z"/></svg>
            Modul 2 · Harakat Fathah
        </div>
        <h1 class="text-2xl lg:text-3xl font-black text-gray-800">Huruf Hijaiyah Berharakat Fathah</h1>
        <p class="text-gray-500 text-sm mt-1.5">Tap salah satu huruf untuk melihat cara membacanya dengan fathah (bunyi "a")</p>
        {{-- Progress counter --}}
        <p class="text-xs font-bold text-teal-500 mt-2 anim-fade-up d-200">
            <span x-text="openedCount"></span><span class="text-gray-400"> / 28 huruf dijelajahi</span>
        </p>
    </div>

    {{-- ══════════════════════════════════════
         CIRCLE LAYOUT — desktop (md+)
    ══════════════════════════════════════ --}}
    <div class="hidden md:flex justify-center items-center py-4">
        <div class="relative flex-shrink-0" style="width:560px;height:560px;">

            {{-- Orbit rings --}}
            {{-- Outer faint dotted ring --}}
            <div class="orbit-ring" style="inset:10px;opacity:.35;border-style:dotted;"></div>
            {{-- Main dashed ring aligned to letter radius (r=43% → inset = (0.5-0.43)*560 = 39.2px) --}}
            <div class="orbit-ring" style="inset:39px;"></div>

            {{-- Center hub --}}
            <div class="absolute inset-0 flex items-center justify-center pointer-events-none" style="z-index:5;">
                <div class="center-hub w-32 h-32 bg-white rounded-full border-4 border-teal-100 shadow-xl flex flex-col items-center justify-center select-none">
                    <svg class="w-9 h-9 mb-0.5" viewBox="0 0 40 40" fill="none">
                        <circle cx="20" cy="20" r="20" fill="#0d9488"/>
                        <path d="M24 11a10 10 0 1 0 0 18 8 8 0 1 1 0-18z" fill="white"/>
                        <polygon points="27,12 27.9,14.8 30.8,14.8 28.5,16.5 29.4,19.3 27,17.6 24.6,19.3 25.5,16.5 23.2,14.8 26.1,14.8" fill="white"/>
                    </svg>
                    <span class="text-[11px] font-black text-teal-700 leading-tight">
                        <span x-text="openedCount"></span>/28
                    </span>
                    <span class="text-[9px] text-teal-400 font-bold leading-tight">huruf</span>
                </div>
            </div>

            {{-- Letter nodes --}}
            <template x-for="(letter, i) in letters" :key="i">
                <button
                    class="letter-node"
                    :class="[colorClass(i), isOpened(i) ? 'opened' : '']"
                    :style="nodeStyle(i)"
                    @click="openLetter(i)"
                    :title="letter.name"
                    :aria-label="letter.name"
                >
                    <span class="font-arabic text-[22px] leading-none select-none" x-text="letter.arabic"></span>
                </button>
            </template>
        </div>
    </div>

    {{-- ══════════════════════════════════════
         GRID LAYOUT — mobile (< md)
    ══════════════════════════════════════ --}}
    <div class="md:hidden px-4 pt-2 pb-4">
        <div class="grid grid-cols-4 gap-2.5">
            <template x-for="(letter, i) in letters" :key="i">
                <button
                    class="letter-chip"
                    :class="[colorClass(i), isOpened(i) ? 'opened' : '']"
                    :style="`animation-delay:${i * 42}ms`"
                    @click="openLetter(i)"
                >
                    <span class="font-arabic text-[30px] leading-none mb-0.5 select-none" x-text="letter.arabic"></span>
                    <span class="text-[10px] font-bold opacity-90 leading-none" x-text="letter.name"></span>
                </button>
            </template>
        </div>
    </div>

    {{-- ── QUIZ CTA ── --}}
    <div class="max-w-sm mx-auto px-4 pt-2 pb-10 anim-fade-up d-500">
    <div class="bg-white rounded-3xl border border-teal-100 shadow-sm overflow-hidden">
        <div class="bg-gradient-to-r from-teal-600 to-emerald-500 px-5 py-4 text-center">
            <p class="text-white/80 text-xs font-bold uppercase tracking-wider">Sudah mengenal semua huruf?</p>
            <p class="text-white font-black text-lg mt-0.5">Siap Uji Kemampuan!</p>
        </div>
        <div class="px-5 py-4 flex flex-col items-center">
            <p class="text-gray-400 text-xs mb-3 text-center">Selesaikan kuis untuk membuka Modul selanjutnya</p>
            <a href="{{ route('game.quiz-basic') }}" {{-- Pastikan rute ini sesuai dengan kuis fathah Anda --}}
               class="anim-glow inline-flex items-center gap-2 bg-gradient-to-r from-teal-600 to-emerald-500 text-white font-black px-7 py-3 rounded-xl shadow-md shadow-teal-100 hover:shadow-lg hover:shadow-teal-200 transition-all hover:scale-[1.04] active:scale-95">
                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor"><path d="M8 5v14l11-7z"/></svg>
                Mulai Kuis Dasar
            </a>
        </div>
    </div>
</div>

    {{-- ══════════════════════════════════════
         MODAL
    ══════════════════════════════════════ --}}
    <div
        x-show="modalOpen"
        x-cloak
        class="fixed inset-0 z-50 flex items-end sm:items-center justify-center sm:p-4"
        @keydown.escape.window="closeModal()"
        @keydown.arrow-left.window="if (modalOpen) prevLetter()"
        @keydown.arrow-right.window="if (modalOpen) nextLetter()"
    >
        {{-- Backdrop --}}
        <div
            class="absolute inset-0 bg-black/50 backdrop-blur-sm"
            x-show="modalOpen"
            x-transition:enter="transition-opacity duration-300"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="transition-opacity duration-200"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            @click="closeModal()"
        ></div>

        {{-- Card — slides up on mobile, scales in on desktop --}}
        <div
            class="relative bg-white rounded-t-3xl sm:rounded-3xl shadow-2xl w-full sm:max-w-sm overflow-hidden z-10"
            x-show="modalOpen"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 translate-y-10 sm:translate-y-0 sm:scale-90"
            x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
            x-transition:leave-end="opacity-0 translate-y-10 sm:translate-y-0 sm:scale-90"
        >
            {{-- Card header --}}
            <div class="bg-gradient-to-r from-teal-600 to-emerald-500 px-5 py-4 flex items-center justify-between">
                <div class="flex items-center gap-2.5">
                    <span
                        class="bg-white/25 text-white text-xs font-black px-2.5 py-0.5 rounded-full tabular-nums"
                        x-text="selected ? `${selected.index} / 28` : ''"
                    ></span>
                    <span class="text-white font-black text-base leading-none" x-text="selected?.name"></span>
                </div>
                <button
                    @click="closeModal()"
                    class="w-8 h-8 bg-white/20 hover:bg-white/35 rounded-xl flex items-center justify-center text-white transition-colors flex-shrink-0"
                    aria-label="Tutup"
                >
                    <svg class="w-4 h-4" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/>
                    </svg>
                </button>
            </div>

            {{-- Card body --}}
            <div class="px-6 py-5 text-center">

                {{-- Letter image with Arabic fallback always underneath --}}
                <div class="relative mx-auto w-40 h-40 mb-4 rounded-2xl bg-gradient-to-br from-teal-50 to-emerald-50 border border-teal-100 overflow-hidden shadow-sm">
                    {{-- Fallback Arabic (always present, image sits on top) --}}
                    <div class="absolute inset-0 flex items-center justify-center">
                        <span class="font-arabic text-[80px] text-teal-300 leading-none select-none" x-text="selected?.arabic"></span>
                    </div>
                    {{-- Image --}}
                    <img
                        :src="`/storage/${selected?.image}`"
                        :alt="selected?.name"
                        class="absolute inset-0 w-full h-full object-contain z-10"
                        x-on:error="$el.style.opacity='0'"
                    >
                </div>
                {{-- Huruf --}}
                <div class="font-arabic text-7xl text-gray-800 leading-none mb-6 select-none" x-text="selected?.arabic"></div>

                <div class="text-4xl font-black text-teal-600 mb-6 tracking-wide" x-text="selected?.sound"></div>

                {{-- Name --}}
                <div class="text-base font-bold text-gray-400 mb-5" x-text="`Huruf: ${selected?.name}`"></div>

                {{-- Audio button --}}
                <button
                @click="playAudio()"
                :class="playing
                    ? 'bg-teal-700 scale-95 shadow-inner'
                    : 'bg-gradient-to-r from-teal-600 to-emerald-500 anim-glow shadow-md shadow-teal-200'"
                class="btn-audio w-full text-white font-bold py-3 rounded-2xl flex items-center justify-center gap-2.5 mb-5 transition-all"
                >
                    <svg class="w-5 h-5 flex-shrink-0" viewBox="0 0 24 24" fill="currentColor">
                        <path x-show="!playing" d="M15.536 8.464a5 5 0 010 7.072M18.364 5.636a9 9 0 010 12.728M9.383 3.076A1 1 0 0110 4v12a1 1 0 01-1.707.707L4.586 13H2a1 1 0 01-1-1V8a1 1 0 011-1h2.586l3.707-3.707a1 1 0 011.09-.217z"/>
                        <path x-show="playing" d="M10 9v6m4-6v6m7-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <span x-text="playing ? 'Memutar…' : 'Dengarkan Pengucapan'"></span>
                </button>

                {{-- Prev / Next --}}
                <div class="flex items-center gap-2.5">
                    <button
                        @click="prevLetter()"
                        class="btn-mnav flex-1 flex items-center justify-center gap-1.5 bg-gray-50 hover:bg-gray-100 border-2 border-gray-200 hover:border-teal-200 text-gray-600 hover:text-teal-600 font-bold py-2.5 rounded-xl"
                    >
                        <svg class="w-4 h-4" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                        Sebelumnya
                    </button>
                    <button
                    @click="nextLetter()"
                    class="btn-mnav flex-1 flex items-center justify-center gap-1.5 bg-gradient-to-r from-teal-600 to-emerald-500 text-white font-bold py-2.5 rounded-xl shadow-sm shadow-teal-100"
                    >
                        Berikutnya
                        <svg class="w-4 h-4" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/></svg>
                    </button>
                </div>

                {{-- iOS safe area spacer --}}
                <div class="h-2 sm:hidden"></div>
            </div>
        </div>
    </div>

</main>

<footer class="text-center text-gray-400 text-sm py-6 border-t border-gray-100 mt-2">
    &copy; {{ date('Y') }} Tiny Think. Belajar Hijaiyah.
</footer>

<script>
function fathahCircle(letters) {
    return {
        letters,
        selectedIndex: null,
        modalOpen:     false,
        playing:       false,
        _audio:        null,
        _opened:       [],

        get selected() {
            return this.selectedIndex !== null ? this.letters[this.selectedIndex] : null;
        },

        get openedCount() {
            return this._opened.length;
        },

        isOpened(i) {
            return this._opened.includes(i);
        },

        colorClass(i) {
            return ['cc-teal', 'cc-emerald', 'cc-sky', 'cc-cyan'][i % 4];
        },

        /* Radial position for circle nodes.
           Container: 560×560 px. Button: 48×48 px (offset 24px).
           r = 43% of container → radius ≈ 240px.
           Orbit ring inset = (0.5 - 0.43) × 560 = 39.2 px (matches ring CSS). */
        nodeStyle(i) {
            const n   = this.letters.length;
            const ang = (2 * Math.PI * i / n) - Math.PI / 2;
            const r   = 43;
            const x   = 50 + r * Math.cos(ang);
            const y   = 50 + r * Math.sin(ang);
            const d1  = i * 55;       // popIn stagger
            const d2  = d1 + 600;     // floatLetter starts after popIn settles
            return `left:calc(${x}% - 24px);top:calc(${y}% - 24px);animation-delay:${d1}ms,${d2}ms;`;
        },

        openLetter(i) {
            this.stopAudio();
            this.selectedIndex = i;
            this.modalOpen     = true;
            if (!this._opened.includes(i)) this._opened.push(i);
        },

        closeModal() {
            this.stopAudio();
            this.modalOpen = false;
        },

        prevLetter() {
            this.stopAudio();
            this.selectedIndex = (this.selectedIndex - 1 + this.letters.length) % this.letters.length;
            if (!this._opened.includes(this.selectedIndex)) this._opened.push(this.selectedIndex);
        },

        nextLetter() {
            this.stopAudio();
            this.selectedIndex = (this.selectedIndex + 1) % this.letters.length;
            if (!this._opened.includes(this.selectedIndex)) this._opened.push(this.selectedIndex);
        },

        playAudio() {
            if (this._audio) {
                this._audio.pause();
                this._audio  = null;
                this.playing = false;
                return;
            }
            if (!this.selected) return;
            this._audio  = new Audio('/storage/' + this.selected.audio);
            this.playing = true;
            this._audio.play().catch(() => { this.playing = false; });
            this._audio.onended = () => { this.playing = false; this._audio = null; };
        },

        stopAudio() {
            if (this._audio) { this._audio.pause(); this._audio = null; }
            this.playing = false;
        },
    };
}
</script>
</body>
</html>