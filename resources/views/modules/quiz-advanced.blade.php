<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Permainan Pencocokkan Huruf</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Amiri:ital,wght@0,400;0,700;1,400&family=Nunito:wght@400;600;700;800;900&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        *, *::before, *::after { box-sizing: border-box; }
        body        { font-family: 'Nunito', sans-serif; touch-action: manipulation; }
        [x-cloak]   { display: none !important; }

        /* ── Animations ── */
        @keyframes floatY {
            0%,100% { transform: translateY(0); }
            50%      { transform: translateY(-10px); }
        }
        @keyframes slideUp {
            from { transform: translateY(24px); opacity: 0; }
            to   { transform: translateY(0);    opacity: 1; }
        }
        @keyframes twinkle {
            0%,100% { opacity: .2; transform: scale(.8);  }
            50%     { opacity: 1;  transform: scale(1.2); }
        }
        @keyframes blobMorph {
            0%,100% { border-radius: 60% 40% 30% 70% / 60% 30% 70% 40%; }
            50%     { border-radius: 30% 60% 70% 40% / 50% 60% 30% 60%; }
        }
        @keyframes spin {
            from { transform: rotate(0deg); }
            to   { transform: rotate(360deg); }
        }
        @keyframes scoreIn {
            0%   { transform: scale(.7); opacity: 0; }
            60%  { transform: scale(1.08); }
            100% { transform: scale(1); opacity: 1; }
        }
        @keyframes ringFill {
            from { stroke-dashoffset: 339.29; }
            to   { stroke-dashoffset: var(--ring-end, 0); }
        }
        @keyframes popIn {
            0%   { transform: scale(0.7); opacity: 0; }
            70%  { transform: scale(1.08); }
            100% { transform: scale(1); opacity: 1; }
        }
        @keyframes shakeX {
            0%,100% { transform: translateX(0); }
            20%     { transform: translateX(-6px); }
            40%     { transform: translateX(6px); }
            60%     { transform: translateX(-4px); }
            80%     { transform: translateX(4px); }
        }
        @keyframes bounceIn {
            0%   { transform: scale(0.5); opacity: 0; }
            60%  { transform: scale(1.12); }
            100% { transform: scale(1); opacity: 1; }
        }

        .anim-float      { animation: floatY    4s   ease-in-out infinite; }
        .anim-slide-up   { animation: slideUp   .6s  ease-out both; }
        .anim-twinkle    { animation: twinkle   2.8s ease-in-out infinite; }
        .anim-blob       { animation: blobMorph 9s   ease-in-out infinite; }
        .anim-spin       { animation: spin      1s   linear infinite; }
        .anim-score-in   { animation: scoreIn   .7s  cubic-bezier(.34,1.56,.64,1) both; }
        .anim-ring       { animation: ringFill  1.4s cubic-bezier(.25,.1,.25,1) both; }
        .anim-pop-in     { animation: popIn     .4s  cubic-bezier(.34,1.56,.64,1) both; }
        .anim-shake      { animation: shakeX    .5s  ease-in-out both; }
        .anim-bounce-in  { animation: bounceIn  .5s  cubic-bezier(.34,1.56,.64,1) both; }

        .d-100  { animation-delay: .10s; }
        .d-200  { animation-delay: .20s; }
        .d-300  { animation-delay: .30s; }
        .d-400  { animation-delay: .40s; }
        .d-500  { animation-delay: .50s; }
        .d-800  { animation-delay: .80s; }
        .d-1400 { animation-delay: 1.40s; }

        /* ── Drop Slots (top row) ── */
        .drop-slot {
            width: 90px; height: 100px;
            border: 2.5px dashed #c4b5fd;
            border-radius: 18px;
            background: #f5f3ff;
            display: flex; flex-direction: column;
            align-items: center; justify-content: center;
            position: relative;
            transition: border-color .2s, background .2s, transform .15s;
            cursor: default;
        }
        .drop-slot.drag-over {
            border-color: #7c3aed;
            background: #ede9fe;
            transform: scale(1.04);
        }
        .drop-slot .slot-arabic {
            font-family: 'Amiri', serif;
            font-size: 2.2rem;
            line-height: 1.1;
            color: #5b21b6;
            user-select: none;
        }
        .drop-slot .slot-hint {
            font-size: 0.6rem;
            font-weight: 700;
            color: #a78bfa;
            text-transform: uppercase;
            letter-spacing: 0.04em;
            margin-top: 2px;
        }

        /* Filled slot — shows placed tile content */
        .drop-slot.filled {
            border-style: solid;
            border-color: #8b5cf6;
            background: #ede9fe;
            cursor: pointer;
        }
        .drop-slot.slot-correct {
            border-color: #22c55e !important;
            background: #f0fdf4 !important;
        }
        .drop-slot.slot-wrong {
            border-color: #ef4444 !important;
            background: #fef2f2 !important;
        }

        /* ── Draggable Tiles (bottom row) ── */
        .drag-tile {
            width: 90px; height: 100px;
            background: linear-gradient(145deg, #7c3aed, #6d28d9);
            border-radius: 18px;
            display: flex; flex-direction: column;
            align-items: center; justify-content: center;
            cursor: grab;
            user-select: none;
            transition: transform .18s cubic-bezier(.34,1.56,.64,1), opacity .2s, box-shadow .2s;
            box-shadow: 0 6px 20px rgba(109,40,217,.35);
            position: relative;
        }
        .drag-tile:active { cursor: grabbing; transform: scale(1.08) rotate(2deg); }
        .drag-tile:hover  { transform: scale(1.05); box-shadow: 0 8px 28px rgba(109,40,217,.45); }
        .drag-tile.placed { opacity: 0.25; pointer-events: none; cursor: default; }
        .drag-tile .tile-arabic {
            font-family: 'Amiri', serif;
            font-size: 2.2rem;
            line-height: 1.1;
            color: #ffffff;
            user-select: none;
        }
        .drag-tile .tile-latin {
            font-size: 0.62rem;
            font-weight: 800;
            color: #ddd6fe;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            margin-top: 2px;
        }
        .drag-tile.tile-correct {
            background: linear-gradient(145deg, #16a34a, #15803d) !important;
            box-shadow: 0 6px 20px rgba(22,163,74,.4) !important;
        }
        .drag-tile.tile-wrong {
            background: linear-gradient(145deg, #dc2626, #b91c1c) !important;
            box-shadow: 0 6px 20px rgba(220,38,38,.4) !important;
        }

        /* Placed tile shown INSIDE a slot */
        .placed-tile-inner {
            display: flex; flex-direction: column;
            align-items: center; justify-content: center;
            width: 100%; height: 100%;
        }
        .placed-tile-inner .tile-arabic {
            font-family: 'Amiri', serif;
            font-size: 2rem;
            color: #5b21b6;
        }
        .placed-tile-inner .tile-latin {
            font-size: 0.6rem;
            font-weight: 800;
            color: #7c3aed;
            text-transform: uppercase;
        }

        /* ── Connector lines area ── */
        .game-area {
            position: relative;
        }

        /* ── Feedback banner ── */
        .feedback-banner {
            border-radius: 16px;
            padding: 12px 18px;
            display: flex; align-items: center; gap: 10px;
            font-weight: 800;
            font-size: 0.9rem;
        }
        .feedback-banner.correct {
            background: #f0fdf4;
            border: 2px solid #86efac;
            color: #15803d;
        }
        .feedback-banner.wrong {
            background: #fef2f2;
            border: 2px solid #fca5a5;
            color: #b91c1c;
        }

        /* Progress dots */
        .prog-dot {
            width: 8px; height: 8px;
            border-radius: 50%;
            transition: all .3s;
        }
    </style>
</head>
<body class="bg-gradient-to-br from-violet-50 via-purple-50 to-teal-50 min-h-screen overflow-x-hidden">

{{-- ── NAVBAR ── --}}
<nav class="sticky top-0 z-50 bg-white/90 backdrop-blur-md border-b border-violet-100 shadow-sm">
    <div class="max-w-5xl mx-auto px-5 py-3 flex items-center justify-between">
        <a href="{{ route('welcome') }}" class="flex items-center gap-2 group">
            <img src="{{ asset('img/logo-tinythink.png') }}"
                 alt="Logo Tiny Think"
                 class="w-10 h-10 object-contain flex-shrink-0 transition-transform group-hover:scale-105">
            <span class="text-xl font-black text-teal-700 group-hover:text-teal-500 transition-colors">Belajar Hijaiyah</span>
        </a>
        <div class="flex items-center gap-5">
            <a href="{{ route('game.modules') }}" class="text-sm font-bold text-gray-500 hover:text-violet-600 transition-colors flex items-center gap-1.5">
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
<main class="max-w-lg mx-auto px-5 py-8">

    {{-- Background decorations --}}
    <div aria-hidden="true" class="pointer-events-none fixed inset-0 -z-10 overflow-hidden">
        <div class="absolute -top-20 -right-20 w-72 h-72 bg-violet-200 opacity-15 rounded-full anim-blob"></div>
        <div class="absolute -bottom-16 -left-16 w-60 h-60 bg-teal-200  opacity-15 rounded-full anim-blob d-1400"></div>
        @foreach([['8%','6%','14','d-100'],['89%','10%','11','d-300'],['4%','50%','9','d-500'],['92%','60%','13','d-200']] as [$x,$y,$s,$d])
            <svg class="absolute anim-twinkle {{ $d }}" style="left:{{ $x }};top:{{ $y }};width:{{ $s }}px;height:{{ $s }}px" viewBox="0 0 24 24" fill="#fbbf24">
                <path d="M12 2l2.4 7.4H22l-6.2 4.5 2.4 7.4L12 17l-6.2 4.3 2.4-7.4L2 9.4h7.6z"/>
            </svg>
        @endforeach
    </div>

    {{-- Alpine root --}}
    <div x-data="matchingGame(
            {{ json_encode($questions) }},
            '{{ route('game.quiz-advanced.submit') }}',
            document.querySelector('meta[name=csrf-token]').getAttribute('content')
         )"
         @touchmove.passive="onTouchMove($event)"
         @touchend="onTouchEnd($event)">

        {{-- ══ IN PROGRESS ══ --}}
        <div x-show="!finished">

            {{-- Header --}}
            <div class="text-center mb-5 anim-slide-up">
                <div class="inline-flex items-center gap-2 bg-violet-50 border border-violet-200 text-violet-700 text-xs font-black uppercase tracking-widest px-3 py-1.5 rounded-full mb-2">
                    <svg class="w-3.5 h-3.5" viewBox="0 0 20 20" fill="currentColor"><path d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-8.707l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13a1 1 0 102 0V9.414l1.293 1.293a1 1 0 001.414-1.414z"/></svg>
                    Modul 4
                </div>
                <h1 class="text-2xl font-black text-gray-800">Pencocokkan Huruf</h1>
            </div>

            {{-- Progress bar --}}
            <div class="bg-white rounded-2xl shadow-sm border border-violet-100 px-5 py-4 mb-5 anim-slide-up d-100">
                <div class="flex items-center justify-between text-xs font-bold mb-2.5">
                    <span class="text-violet-600" x-text="`Soal ke- ${progressDisplay} dari ${questions.length}`"></span>
                    <span class="text-gray-400" x-text="`${progress}%`"></span>
                </div>
                <div class="h-3 bg-gray-100 rounded-full overflow-hidden">
                    <div class="h-full bg-gradient-to-r from-violet-500 to-teal-400 rounded-full transition-all duration-500"
                         :style="`width: ${progress}%`"></div>
                </div>
                {{-- Dots --}}
                <div class="flex justify-center gap-1.5 mt-3">
                    <template x-for="(q, i) in questions" :key="i">
                        <div class="prog-dot"
                             :class="i < current ? 'bg-violet-400' : i === current ? 'bg-violet-600 scale-125' : 'bg-gray-200'"></div>
                    </template>
                </div>
            </div>

            {{-- Game card --}}
            <div class="bg-white rounded-3xl shadow-lg border border-violet-100 overflow-hidden mb-4 anim-slide-up d-200">

                {{-- Top colour strip --}}
                <div class="h-1.5 bg-gradient-to-r from-violet-500 to-teal-400"></div>

                <div class="p-6">
                    <p class="text-xs font-black text-gray-400 uppercase tracking-widest mb-6 text-center">
                        Cocokkan huruf Arab sesuai pasangannya!
                    </p>

                    {{-- ── TOP ROW: Drop slots ── --}}
                    <div class="flex justify-center gap-4 mb-8 game-area">
                        <template x-for="slot in slots" :key="slot.id">
                            <div
                                class="drop-slot"
                                :class="{
                                    'filled':     slot.filled !== null,
                                    'drag-over':  false,
                                    [slotFeedbackClass(slot.id)]: roundDone
                                }"
                                :data-slot-id="slot.id"
                                @dragover.prevent="$el.classList.add('drag-over')"
                                @dragleave="$el.classList.remove('drag-over')"
                                @drop.prevent="$el.classList.remove('drag-over'); onDrop(slot.id)"
                                @click="onSlotTap(slot.id)"
                            >
                                {{-- Empty: show arabic letter to match --}}
                                <template x-if="slot.filled === null">
                                    <div class="flex flex-col items-center">
                                        <span class="slot-arabic" x-text="slot.arabic"></span>
                                        <span class="slot-hint">taruh di sini</span>
                                    </div>
                                </template>

                                {{-- Filled: show placed tile content --}}
                                <template x-if="slot.filled !== null">
                                    <div class="placed-tile-inner anim-pop-in"
                                         :class="roundDone ? (slotFeedbackClass(slot.id) === 'slot-correct' ? 'text-green-700' : 'text-red-700') : ''">
                                        <span class="slot-arabic" x-text="slot.arabic"></span>
                                        <span class="tile-latin text-violet-700 text-xs font-black mt-1"
                                              x-text="tileInsideSlot(slot.id) ? tileInsideSlot(slot.id).name : ''"></span>
                                        {{-- Feedback icons --}}
                                        <template x-if="roundDone && slotFeedbackClass(slot.id) === 'slot-correct'">
                                            <svg class="w-4 h-4 text-green-500 mt-1" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-10.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                            </svg>
                                        </template>
                                        <template x-if="roundDone && slotFeedbackClass(slot.id) === 'slot-wrong'">
                                            <svg class="w-4 h-4 text-red-500 mt-1" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                                            </svg>
                                        </template>
                                    </div>
                                </template>
                            </div>
                        </template>
                    </div>

                    {{-- Divider with arrow --}}
                    <div class="flex items-center justify-center gap-3 mb-6">
                        <div class="flex-1 h-px bg-gradient-to-r from-transparent to-violet-200"></div>
                        <svg class="w-5 h-5 text-violet-300" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
                        </svg>
                        <div class="flex-1 h-px bg-gradient-to-l from-transparent to-violet-200"></div>
                    </div>

                    {{-- ── BOTTOM ROW: Draggable tiles ── --}}
                    <div class="flex justify-center gap-4">
                        <template x-for="tile in tiles" :key="tile.id">
                            <div
                                class="drag-tile"
                                :class="{
                                    'placed': tile.placed,
                                    [tileFeedbackClass(tile.id)]: roundDone && tile.placed
                                }"
                                draggable="true"
                                @dragstart="onDragStart(tile.id)"
                                @dragend="dragging = null"
                                @touchstart.passive="onTouchStart($event, tile.id)"
                            >
                                <span class="tile-arabic" x-text="tile.arabic"></span>
                                <span class="tile-latin"  x-text="tile.name"></span>
                            </div>
                        </template>
                    </div>

                    {{-- Hint text --}}
                    <p class="text-center text-xs text-gray-400 font-semibold mt-5">
                        Seret huruf ke kotak yang sesuai • Ketuk kotak untuk batal
                    </p>
                </div>
            </div>

            {{-- Feedback banner --}}
            <div x-show="roundFeedback !== null" x-cloak class="mb-4 anim-bounce-in">
                <div class="feedback-banner" :class="roundFeedback">
                    <template x-if="roundFeedback === 'correct'">
                        <svg class="w-5 h-5 flex-shrink-0" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-10.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                    </template>
                    <template x-if="roundFeedback === 'wrong'">
                        <svg class="w-5 h-5 flex-shrink-0" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                        </svg>
                    </template>
                    <span x-text="roundFeedback === 'correct' ? 'MasyaAllah benar semua! Luar biasa! 🎉' : 'Ada yang kurang tepat. Lanjut yuk!'"></span>
                </div>
            </div>

        </div>{{-- /!finished --}}

        {{-- ══ FINISHED ══ --}}
        <div x-show="finished" x-cloak class="anim-bounce-in">
            <div class="bg-white rounded-3xl shadow-xl border border-violet-100 overflow-hidden">

                <div class="h-2 bg-gradient-to-r from-violet-500 to-teal-400"></div>

                <div class="px-8 py-10 text-center">
                    {{-- Trophy --}}
                    <div class="flex justify-center mb-6">
                        <svg viewBox="0 0 100 90" class="w-24 h-20 anim-float" xmlns="http://www.w3.org/2000/svg">
                            <path d="M28 16h44l-5 31a22 22 0 01-34 0Z" fill="#fbbf24"/>
                            <path d="M28 16h44l-3 18H31Z" fill="#fcd34d"/>
                            <path d="M28 22 Q16 22 16 33 Q16 42 28 40" stroke="#f59e0b" stroke-width="5" fill="none" stroke-linecap="round"/>
                            <path d="M72 22 Q84 22 84 33 Q84 42 72 40" stroke="#f59e0b" stroke-width="5" fill="none" stroke-linecap="round"/>
                            <rect x="44" y="47" width="12" height="16" rx="2" fill="#f59e0b"/>
                            <rect x="32" y="63" width="36" height="8"  rx="4" fill="#f59e0b"/>
                            <path d="M50 24 l1.8 5.4h5.6l-4.5 3.3 1.8 5.4-4.7-3.3-4.7 3.3 1.8-5.4-4.5-3.3h5.6z" fill="white" opacity=".85"/>
                            <path d="M20 10 l1.4 4.2h4.4l-3.5 2.6 1.4 4.2-3.7-2.7-3.7 2.7 1.4-4.2-3.5-2.6h4.4z" fill="#fbbf24" opacity=".8" class="anim-twinkle d-200"/>
                            <path d="M76 6  l1.2 3.6h3.8l-3 2.2 1.2 3.6-3.2-2.2-3.2 2.2 1.2-3.6-3-2.2h3.8z"       fill="#fbbf24" opacity=".8" class="anim-twinkle d-500"/>
                        </svg>
                    </div>

                    <h2 class="text-3xl font-black text-gray-800 mb-1">Game Selesai!</h2>
                    <p class="text-gray-500 text-sm mb-6">Inilah hasil game pencocokkanmu</p>

                    {{-- Score ring --}}
                    <div class="flex justify-center mb-4">
                        <div class="relative w-40 h-40">
                            <svg class="w-full h-full" viewBox="0 0 120 120" style="transform:rotate(-90deg)">
                                <circle cx="60" cy="60" r="54" fill="none" stroke="#f1f5f9" stroke-width="10"/>
                                <circle cx="60" cy="60" r="54" fill="none"
                                        :stroke="scorePercent >= 70 ? '#0d9488' : '#8b5cf6'"
                                        stroke-width="10"
                                        stroke-dasharray="339.29"
                                        stroke-linecap="round"
                                        class="anim-ring d-200"
                                        :style="`--ring-end: ${339.29 * (1 - scorePercent / 100)}; stroke-dashoffset: ${339.29 * (1 - scorePercent / 100)}`"/>
                            </svg>
                            <div class="absolute inset-0 flex flex-col items-center justify-center anim-score-in d-400">
                                <span class="text-4xl font-black leading-none"
                                      :class="scorePercent >= 70 ? 'text-teal-600' : 'text-violet-600'"
                                      x-text="`${scorePercent}`"></span>
                                <span class="text-sm font-bold text-gray-400">%</span>
                            </div>
                        </div>
                    </div>

                    <p class="text-gray-500 font-semibold mb-6"
                       x-text="`${correct} dari ${questions.length} soal benar`"></p>

                    {{-- Saving indicator --}}
                    <div x-show="submitting" class="flex items-center justify-center gap-2 text-sm text-gray-400">
                        <svg class="w-4 h-4 anim-spin" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                            <path d="M12 2v4M12 18v4M4.93 4.93l2.83 2.83M16.24 16.24l2.83 2.83M2 12h4M18 12h4M4.93 19.07l2.83-2.83M16.24 7.76l2.83-2.83" stroke-linecap="round"/>
                        </svg>
                        Menyimpan nilai...
                    </div>
                </div>
            </div>
        </div>{{-- /finished --}}

        {{-- ── MUTE TOGGLE ── --}}
        <button @click="toggleMute()"
                class="fixed bottom-6 right-6 z-50 w-12 h-12 rounded-full shadow-lg flex items-center justify-center transition-all duration-200 hover:scale-110 active:scale-95"
                :class="bgMuted ? 'bg-gray-100 text-gray-400 border-2 border-gray-200' : 'bg-violet-600 text-white shadow-violet-200'"
                :title="bgMuted ? 'Nyalakan musik' : 'Matikan musik'">
            <svg x-show="!bgMuted" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M9.383 3.076A1 1 0 0110 4v12a1 1 0 01-1.707.707L4.586 13H2a1 1 0 01-1-1V8a1 1 0 011-1h2.586l3.707-3.707a1 1 0 011.09-.217zM14.657 2.929a1 1 0 011.414 0A9.972 9.972 0 0119 10a9.972 9.972 0 01-2.929 7.071 1 1 0 01-1.414-1.414A7.971 7.971 0 0017 10c0-2.21-.894-4.208-2.343-5.657a1 1 0 010-1.414zm-2.829 2.828a1 1 0 011.415 0A5.983 5.983 0 0115 10a5.984 5.984 0 01-1.757 4.243 1 1 0 01-1.415-1.415A3.984 3.984 0 0013 10a3.983 3.983 0 00-1.172-2.828 1 1 0 010-1.415z" clip-rule="evenodd"/>
            </svg>
            <svg x-show="bgMuted" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M9.383 3.076A1 1 0 0110 4v12a1 1 0 01-1.707.707L4.586 13H2a1 1 0 01-1-1V8a1 1 0 011-1h2.586l3.707-3.707a1 1 0 011.09-.217z" clip-rule="evenodd"/>
                <path d="M12.707 7.293a1 1 0 10-1.414 1.414L12.586 10l-1.293 1.293a1 1 0 001.414 1.414L14 11.414l1.293 1.293a1 1 0 001.414-1.414L15.414 10l1.293-1.293a1 1 0 00-1.414-1.414L14 8.586l-1.293-1.293z"/>
            </svg>
        </button>

    </div>{{-- /x-data --}}
</main>

<footer class="text-center text-gray-400 text-sm py-6 border-t border-gray-100 mt-4">
    &copy; {{ date('Y') }} Tiny Think. Belajar Hijaiyah.
</footer>

</body>
</html>