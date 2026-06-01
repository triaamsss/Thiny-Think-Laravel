<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Kuis Huruf Dasar</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Amiri:ital,wght@0,400;0,700;1,400&family=Nunito:wght@400;600;700;800;900&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        *, *::before, *::after { box-sizing: border-box; }
        body        { font-family: 'Nunito', sans-serif; }
        [x-cloak]   { display: none !important; }

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
        @keyframes pulseGlowSky {
            0%,100% { box-shadow: 0 0 0 0 rgba(14,165,233,.4); }
            50%     { box-shadow: 0 0 0 8px rgba(14,165,233,0); }
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

        .anim-float     { animation: floatY    4s   ease-in-out infinite; }
        .anim-slide-up  { animation: slideUp   .6s  ease-out both; }
        .anim-twinkle   { animation: twinkle   2.8s ease-in-out infinite; }
        .anim-blob      { animation: blobMorph 9s   ease-in-out infinite; }
        .anim-ping-sky  { animation: pulseGlowSky 1.8s ease-in-out infinite; }
        .anim-spin      { animation: spin      1s   linear infinite; }
        .anim-score-in  { animation: scoreIn   .7s  cubic-bezier(.34,1.56,.64,1) both; }
        .anim-ring      { animation: ringFill  1.4s cubic-bezier(.25,.1,.25,1) both; }

        .d-100 { animation-delay: .10s; }
        .d-200 { animation-delay: .20s; }
        .d-300 { animation-delay: .30s; }
        .d-400 { animation-delay: .40s; }
        .d-500 { animation-delay: .50s; }
        .d-800 { animation-delay: .80s; }
        .d-1400{ animation-delay:1.40s; }

        /* Option button transitions */
        .option-btn {
            transition: transform .18s cubic-bezier(.34,1.56,.64,1), border-color .15s, background-color .15s;
        }
        .option-btn:not(:disabled):hover {
            transform: scale(1.03);
            border-color: #38bdf8;
            background-color: #f0f9ff;
        }
        .option-btn:not(:disabled):active {
            transform: scale(.96);
        }

        .btn-audio {
            transition: transform .2s cubic-bezier(.34,1.56,.64,1);
        }
        .btn-audio:hover  { transform: scale(1.05); }
        .btn-audio:active { transform: scale(.94); }
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
<main class="max-w-lg mx-auto px-5 py-8">

    {{-- Background --}}
    <div aria-hidden="true" class="pointer-events-none fixed inset-0 -z-10 overflow-hidden">
        <div class="absolute -top-20 -right-20 w-72 h-72 bg-sky-200   opacity-15 rounded-full anim-blob"></div>
        <div class="absolute -bottom-16 -left-16 w-60 h-60 bg-teal-200 opacity-15 rounded-full anim-blob d-1400"></div>
        @foreach([['8%','6%','14','d-100'],['89%','10%','11','d-300'],['4%','50%','9','d-500'],['92%','60%','13','d-200']] as [$x,$y,$s,$d])
            <svg class="absolute anim-twinkle {{ $d }}" style="left:{{ $x }};top:{{ $y }};width:{{ $s }}px;height:{{ $s }}px" viewBox="0 0 24 24" fill="#fbbf24">
                <path d="M12 2l2.4 7.4H22l-6.2 4.5 2.4 7.4L12 17l-6.2 4.3 2.4-7.4L2 9.4h7.6z"/>
            </svg>
        @endforeach
    </div>

    {{-- Alpine root --}}
    <div x-data="quizEngine(
            {{ json_encode($questions) }},
            '{{ route('game.quiz-basic.submit') }}',
            document.querySelector('meta[name=csrf-token]').getAttribute('content')
         )">

        {{-- ══ IN PROGRESS ══ --}}
        <div x-show="!finished">

            {{-- Header --}}
            <div class="text-center mb-5 anim-slide-up">
                <div class="inline-flex items-center gap-2 bg-sky-50 border border-sky-200 text-sky-700 text-xs font-black uppercase tracking-widest px-3 py-1.5 rounded-full mb-2">
                    <svg class="w-3.5 h-3.5" viewBox="0 0 20 20" fill="currentColor"><path d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-8.707l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13a1 1 0 102 0V9.414l1.293 1.293a1 1 0 001.414-1.414z"/></svg>
                    Modul 3
                </div>
                <h1 class="text-2xl font-black text-gray-800">Kuis Huruf Dasar</h1>
            </div>

            {{-- Progress bar --}}
            <div class="bg-white rounded-2xl shadow-sm border border-sky-100 px-5 py-4 mb-5 anim-slide-up d-100">
                <div class="flex items-center justify-between text-xs font-bold mb-2.5">
                    <span class="text-sky-600" x-text="`Soal ke- ${progressDisplay} dari ${questions.length}`"></span>
                    <span class="text-gray-400" x-text="`${progress}%`"></span>
                </div>
                <div class="h-3 bg-gray-100 rounded-full overflow-hidden">
                    <div class="h-full bg-gradient-to-r from-sky-500 to-teal-400 rounded-full transition-all duration-500"
                         :style="`width: ${progress}%`"></div>
                </div>
                {{-- Soal dots --}}
                <div class="flex justify-center gap-1.5 mt-3">
                    <template x-for="(q, i) in questions" :key="i">
                        <div class="w-2 h-2 rounded-full transition-all duration-300"
                             :class="i < current ? 'bg-sky-400' : i === current ? 'bg-sky-600 scale-125' : 'bg-gray-200'"></div>
                    </template>
                </div>
            </div>

            {{-- Question card --}}
            <div class="bg-white rounded-3xl shadow-lg border border-sky-100 overflow-hidden mb-4 anim-slide-up d-200">

                {{-- Card top strip --}}
                <div class="h-1.5 bg-gradient-to-r from-sky-500 to-teal-400"></div>

                <div class="p-7">

                    {{-- Judul soal berubah sesuai tipe --}}
                    <p class="text-s font-black text-gray-800 uppercase tracking-widest mb-8 text-center"
                       x-text="question.type === 'audio' ? 'Huruf apakah ini?' : (question.subtype === 'fathah' ? 'Apa bunyi huruf ini?' : 'Apa nama huruf ini?')">
                    </p>

                    {{-- ── TIPE AUDIO: tombol klik suara ── --}}
                    <template x-if="question.type === 'audio'">
                        <div class="flex flex-col items-center justify-center mb-10">
                            <button @click="playAudio()"
                                    :class="playingAudio ? 'scale-95 opacity-60' : 'hover:scale-105'"
                                    class="group relative w-32 h-32 rounded-full bg-sky-50 border-4 border-sky-100 flex items-center justify-center transition-all duration-300 shadow-inner">
                                <div x-show="playingAudio" class="absolute inset-0 rounded-full bg-sky-400 animate-ping opacity-20"></div>
                                <div class="flex flex-col items-center gap-2">
                                    <svg class="w-12 h-12 text-sky-500 group-hover:text-sky-600 transition-colors" viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M13.5 4.06c0-1.336-1.616-2.005-2.56-1.06l-4.5 4.5H4.5A1.5 1.5 0 003 9v6a1.5 1.5 0 001.5 1.5h2l4.5 4.5c.944.945 2.56.276 2.56-1.06V4.06zM18.54 5.44a.75.75 0 011.06 0 11.25 11.25 0 010 15.91a.75.75 0 01-1.06-1.06 9.75 9.75 0 000-13.79.75.75 0 010-1.06zm-3.18 3.18a.75.75 0 011.06 0 6.75 6.75 0 010 9.54.75.75 0 11-1.06-1.06 5.25 5.25 0 000-7.42.75.75 0 010-1.06z" />
                                    </svg>
                                    <span class="text-xs font-bold text-sky-600" x-text="playingAudio ? 'Memutar...' : 'Klik Suara'"></span>
                                </div>
                            </button>
                        </div>
                    </template>

                    {{-- ── TIPE VISUAL: tampilkan huruf Arab di bulatan ── --}}
                    <template x-if="question.type === 'visual'">
                        <div class="flex flex-col items-center justify-center mb-10">
                            <div class="relative w-32 h-32 rounded-full flex items-center justify-center shadow-inner"
                                 :class="question.subtype === 'fathah'
                                    ? 'bg-gradient-to-br from-sky-50 to-blue-50 border-4 border-sky-200'
                                    : 'bg-gradient-to-br from-teal-50 to-sky-50 border-4 border-teal-200'">
                                <div class="absolute inset-0 rounded-full border-2 border-dashed scale-110 opacity-50"
                                     :class="question.subtype === 'fathah' ? 'border-sky-200' : 'border-teal-200'"></div>
                                <span class="font-arabic leading-none select-none"
                                      :class="question.subtype === 'fathah' ? 'text-sky-700' : 'text-teal-700'"
                                      :style="question.subtype === 'fathah' ? 'font-size:2.8rem;line-height:1.5' : 'font-size:3.5rem;line-height:1'"
                                      x-text="question.arabic"></span>
                            </div>
                            <p class="mt-3 text-xs text-gray-400 font-semibold"
                               x-text="question.subtype === 'fathah' ? 'Lihat huruf berharakat, pilih bunyinya' : 'Lihat hurufnya, lalu pilih namanya'"></p>
                        </div>
                    </template>

                    {{-- ── PILIHAN JAWABAN ──
                         Tipe audio  → tampilkan arab + latin
                         Tipe visual → tampilkan latin saja
                    ── --}}
                    <div class="grid grid-cols-2 gap-4 mt-2">
                        <template x-for="(opt, idx) in question.options" :key="idx">
                            <button
                                @click="choose(idx)"
                                :disabled="answered"
                                :class="optionClass(idx)"
                                class="relative flex flex-col items-center justify-center p-4 rounded-2xl border-2 transition-all duration-200 active:scale-95 disabled:opacity-100"
                            >
                                {{-- Tipe audio: arab + latin --}}
                                <template x-if="question.type === 'audio'">
                                    <span class="flex flex-col items-center gap-1 w-full">
                                        <span class="text-4xl font-arabic leading-tight" x-text="opt.arabic"></span>
                                        <span class="text-base font-bold" x-text="opt.latin"></span>
                                    </span>
                                </template>

                                {{-- Tipe visual basic: nama latin saja --}}
                                <template x-if="question.type === 'visual' && question.subtype === 'basic'">
                                    <span class="text-xl font-black tracking-wide py-2" x-text="opt.latin"></span>
                                </template>

                                {{-- Tipe visual fathah: bunyi saja (a, ba, ta, ...) --}}
                                <template x-if="question.type === 'visual' && question.subtype === 'fathah'">
                                    <span class="text-2xl font-black tracking-wide py-3" x-text="opt.sound ?? opt.latin"></span>
                                </template>

                                {{-- Icon benar --}}
                                <template x-if="answered && idx === question.correct_index">
                                    <div class="absolute -top-2 -right-2 bg-green-500 text-white rounded-full p-1 shadow-sm">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                                    </div>
                                </template>
                            </button>
                        </template>
                    </div>
                </div>
            </div>

            {{-- Feedback --}}
            <div x-show="answered" x-cloak class="mb-4 animate-bounce-in">
                <div class="rounded-2xl px-4 py-3.5 border-2 flex items-start gap-3"
                    :class="selected === question.correct_index
                        ? 'bg-green-50 border-green-200'
                        : 'bg-red-50 border-red-200'">
                    
                    {{-- Icon Benar --}}
                    <svg x-show="selected === question.correct_index" class="w-5 h-5 flex-shrink-0 mt-0.5 text-green-600" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-10.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>

                    {{-- Icon Salah --}}
                    <svg x-show="selected !== question.correct_index" class="w-5 h-5 flex-shrink-0 mt-0.5 text-red-500" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                    </svg>

                    <span class="font-black text-sm"
                        :class="selected === question.correct_index ? 'text-green-700' : 'text-red-600'"
                        x-text="selected === question.correct_index
                            ? 'MasyaAllah, Benar! Bagus sekali!'
                            : `Kurang tepat. Jawabannya: ${question.options[question.correct_index].latin} (${question.options[question.correct_index].arabic})`">
                    </span>
                </div>
            </div>

        </div>{{-- /!finished --}}

        {{-- ══ FINISHED ══ --}}
        <div x-show="finished" x-cloak class="animate-bounce-in">
            <div class="bg-white rounded-3xl shadow-xl border border-sky-100 overflow-hidden">

                {{-- Header strip --}}
                <div class="h-2 bg-gradient-to-r from-sky-500 to-teal-400"></div>

                <div class="px-8 py-10 text-center">
                    {{-- Trophy SVG --}}
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

                    <h2 class="text-3xl font-black text-gray-800 mb-1">Kuis Selesai!</h2>
                    <p class="text-gray-500 text-sm mb-6">Inilah hasil kuis huruf dasarmu</p>

                    {{-- Score ring --}}
                    <div class="flex justify-center mb-4">
                        <div class="relative w-40 h-40">
                            <svg class="w-full h-full" viewBox="0 0 120 120" style="transform:rotate(-90deg)">
                                <circle cx="60" cy="60" r="54" fill="none" stroke="#f1f5f9" stroke-width="10"/>
                                <circle cx="60" cy="60" r="54" fill="none"
                                        :stroke="scorePercent >= 70 ? '#0d9488' : '#f97316'"
                                        stroke-width="10"
                                        stroke-dasharray="339.29"
                                        stroke-linecap="round"
                                        class="anim-ring d-200"
                                        :style="`--ring-end: ${339.29 * (1 - scorePercent / 100)}; stroke-dashoffset: ${339.29 * (1 - scorePercent / 100)}`"/>
                            </svg>
                            <div class="absolute inset-0 flex flex-col items-center justify-center anim-score-in d-400">
                                <span class="text-4xl font-black leading-none"
                                      :class="scorePercent >= 70 ? 'text-teal-600' : 'text-orange-500'"
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
                :class="bgMuted ? 'bg-gray-100 text-gray-400 border-2 border-gray-200' : 'bg-teal-600 text-white shadow-teal-200'"
                :title="bgMuted ? 'Nyalakan musik' : 'Matikan musik'">
            {{-- Speaker on --}}
            <svg x-show="!bgMuted" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M9.383 3.076A1 1 0 0110 4v12a1 1 0 01-1.707.707L4.586 13H2a1 1 0 01-1-1V8a1 1 0 011-1h2.586l3.707-3.707a1 1 0 011.09-.217zM14.657 2.929a1 1 0 011.414 0A9.972 9.972 0 0119 10a9.972 9.972 0 01-2.929 7.071 1 1 0 01-1.414-1.414A7.971 7.971 0 0017 10c0-2.21-.894-4.208-2.343-5.657a1 1 0 010-1.414zm-2.829 2.828a1 1 0 011.415 0A5.983 5.983 0 0115 10a5.984 5.984 0 01-1.757 4.243 1 1 0 01-1.415-1.415A3.984 3.984 0 0013 10a3.983 3.983 0 00-1.172-2.828 1 1 0 010-1.415z" clip-rule="evenodd"/>
            </svg>
            {{-- Speaker off --}}
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