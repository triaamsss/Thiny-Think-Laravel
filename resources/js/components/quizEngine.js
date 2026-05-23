export function quizEngine(questions, submitUrl, csrfToken) {
    return {
        questions,
        current:      0,
        selected:     null,
        answered:     false,
        correct:      0,
        history:      [],
        finished:     false,
        submitting:   false,
        playingAudio: false,
        activeAudio:  null,

        /* ── background music ── */
        bgMusic:   null,
        bgMuted:   false,
        bgStarted: false,

        /* ── Web Audio context (lazy) ── */
        _ctx: null,

        /* ─────────────────────────────────────────
           Alpine lifecycle
        ───────────────────────────────────────── */
        init() {
            /* Prepare bg music object — actual playback deferred to first
               user interaction to satisfy browser autoplay policy.
               Place your loop file at:  public/sounds/quiz-bg.mp3       */
            this.bgMusic = new Audio('/sounds/quiz-bg.mp3');
            this.bgMusic.loop   = true;
            this.bgMusic.volume = 0.22;
        },

        destroy() {
            this._stopBg();
            if (this._ctx) { this._ctx.close(); this._ctx = null; }
        },

        /* ─────────────────────────────────────────
           Getters
        ───────────────────────────────────────── */
        get question()        { return this.questions[this.current]; },
        get progress()        { return Math.round((this.current / this.questions.length) * 100); },
        get scorePercent()    { return Math.round((this.correct / this.questions.length) * 100); },
        get progressDisplay() { return this.current + 1; },

        /* ─────────────────────────────────────────
           Quiz logic
        ───────────────────────────────────────── */
        choose(idx) {
            if (this.answered) return;
            this._startBg();           // first interaction → start bg music
            this.selected  = idx;
            this.answered  = true;
            const wasCorrect = idx === this.question.correct_index;
            if (wasCorrect) {
                this.correct++;
                this._playCorrectSfx();
            } else {
                this._playWrongSfx();
            }
            this.history.push({ ...this.question, selected: idx, was_correct: wasCorrect });
            setTimeout(() => this.advance(), 1400);
        },

        advance() {
            if (this.current < this.questions.length - 1) {
                this.current++;
                this.selected = null;
                this.answered = false;
            } else {
                this.finished = true;
                this._stopBg();
                /* score fanfare fires after ring animation begins (≈500 ms) */
                setTimeout(() => this._playScoreSfx(this.scorePercent >= 70), 500);
                this.submit();
            }
        },

        playAudio() {
            if (this.activeAudio) {
                this.activeAudio.pause();
                this.activeAudio.currentTime = 0;
            }
            this.activeAudio = new Audio('/storage/' + this.question.audio);
            this.playingAudio = true;
            this.activeAudio.play().catch(() => { this.playingAudio = false; });
            this.activeAudio.onended = () => { this.playingAudio = false; };
        },

        async submit() {
            this.submitting = true;
            try {
                const resp = await fetch(submitUrl, {
                    method:  'POST',
                    headers: {
                        'Content-Type':  'application/json',
                        'X-CSRF-TOKEN':  csrfToken,
                        'Accept':        'application/json',
                    },
                    body: JSON.stringify({
                        score:   this.scorePercent,
                        correct: this.correct,
                        total:   this.questions.length,
                    }),
                });
                const data = await resp.json();
                /* delay redirect so score fanfare has time to finish */
                if (data.redirect) setTimeout(() => { window.location.href = data.redirect; }, 1800);
            } catch (e) {
                this.submitting = false;
            }
        },

        optionClass(idx) {
            let base = 'bg-white border-gray-100 shadow-sm hover:border-violet-300 ';
            
            if (this.answered) {
                if (idx === this.question.correct_index) {
                    return 'bg-green-500 border-green-500 text-green-700 z-10';
                }
                if (this.selected === idx && idx !== this.question.correct_index) {
                    return 'bg-red-50 border-red-500 text-red-700 z-10';
                }
                return 'opacity-50 border-gray-100';
            }
            
            return base;
        },  

        /* ─────────────────────────────────────────
           Background music helpers
        ───────────────────────────────────────── */
        toggleMute() {
            this.bgMuted = !this.bgMuted;
            if (!this.bgMusic) return;
            if (this.bgMuted) {
                this.bgMusic.pause();
            } else if (this.bgStarted) {
                this.bgMusic.play().catch(() => {});
            }
        },

        _startBg() {
            if (this.bgStarted || this.bgMuted || !this.bgMusic) return;
            this.bgMusic.play().catch(() => {});
            this.bgStarted = true;
        },

        _stopBg() {
            if (this.bgMusic) { this.bgMusic.pause(); this.bgMusic.currentTime = 0; }
        },

        /* ─────────────────────────────────────────
           Web Audio API — sound effects
        ───────────────────────────────────────── */
        _getCtx() {
            if (!this._ctx) {
                this._ctx = new (window.AudioContext || window.webkitAudioContext)();
            }
            return this._ctx;
        },

        /* Single oscillator tone with exponential fade-out */
        _tone(freq, dur, type = 'sine', vol = 0.28, delay = 0) {
            try {
                const ctx  = this._getCtx();
                const osc  = ctx.createOscillator();
                const gain = ctx.createGain();
                osc.connect(gain);
                gain.connect(ctx.destination);
                osc.type           = type;
                osc.frequency.value = freq;
                const t = ctx.currentTime + delay;
                gain.gain.setValueAtTime(vol, t);
                gain.gain.exponentialRampToValueAtTime(0.0001, t + dur);
                osc.start(t);
                osc.stop(t + dur + 0.01);
            } catch (_) {}
        },

        /* ✔ Correct answer — two rising chime notes */
        _playCorrectSfx() {
            this._tone(880,  0.14, 'sine', 0.28, 0.00);
            this._tone(1108, 0.20, 'sine', 0.24, 0.09);
        },

        /* ✘ Wrong answer — two descending low pulses */
        _playWrongSfx() {
            this._tone(320, 0.16, 'square', 0.20, 0.00);
            this._tone(240, 0.22, 'square', 0.16, 0.14);
        },

        /* 🏆 Score reveal fanfare */
        _playScoreSfx(won) {
            if (won) {
                /* ascending arpeggio: C5 → E5 → G5 → C6 */
                [523, 659, 784, 1047].forEach((f, i) => {
                    this._tone(f, 0.45, 'sine', 0.32, i * 0.14);
                });
                /* sparkle layer on top */
                setTimeout(() => {
                    this._tone(2093, 0.3, 'sine', 0.12, 0);
                    this._tone(1568, 0.3, 'sine', 0.10, 0.08);
                }, 680);
            } else {
                /* gentle neutral resolution */
                this._tone(440, 0.40, 'sine', 0.22, 0.00);
                this._tone(392, 0.50, 'sine', 0.18, 0.32);
            }
        },
    };
}