export function matchingGame(questions, submitUrl, csrfToken) {
    return {
        questions,
        current:      0,
        finished:     false,
        submitting:   false,
        correct:      0,

        // Per-round state
        slots:        [],   // top slots: { id, arabic, name, filled: null }
        tiles:        [],   // bottom draggable tiles: { id, arabic, name, placed: false }
        connections:  [],   // { slotId, tileId, correct: bool }
        roundDone:    false,
        roundFeedback: null, // 'correct' | 'wrong'
        dragging:     null,  // tile id being dragged

        // Touch drag state
        _touchTile:   null,
        _touchGhost:  null,

        // Background music
        bgMusic:      null,
        bgMuted:      false,
        bgStarted:    false,
        _ctx:         null,

        init() {
            this.bgMusic = new Audio('/sounds/quiz-bg.mp3');
            this.bgMusic.loop   = true;
            this.bgMusic.volume = 0.22;
            this._buildRound();
        },

        destroy() {
            this._stopBg();
            if (this._ctx) { this._ctx.close(); this._ctx = null; }
            this._removeGhost();
        },

        get round()        { return this.questions[this.current]; },
        get progress()     { return Math.round((this.current / this.questions.length) * 100); },
        get scorePercent() { return Math.round((this.correct / this.questions.length) * 100); },
        get progressDisplay() { return this.current + 1; },

        // ── Build a round ──────────────────────────────────────────────────
        _buildRound() {
            const round = this.round;
            // slots = the 3 "answer boxes" at top, showing arabic
            this.slots = round.pairs.map((p, i) => ({
                id:     i,
                arabic: p.arabic,
                name:   p.name,
                filled: null,   // will hold tile id when dropped
            }));
            // tiles = the 3 shuffled latin-name tiles at bottom
            const shuffled = [...round.pairs].sort(() => Math.random() - 0.5);
            this.tiles = shuffled.map((p, i) => ({
                id:     i,
                arabic: p.arabic,
                name:   p.name,
                placed: false,
            }));
            this.connections  = [];
            this.roundDone    = false;
            this.roundFeedback = null;
            this.dragging     = null;
        },

        // ── Drag & Drop (mouse) ────────────────────────────────────────────
        onDragStart(tileId) {
            this._startBg();
            if (this.roundDone) return;
            this.dragging = tileId;
        },

        onDragOver(e) {
            if (this.dragging === null) return;
            e.preventDefault();
        },

        onDrop(slotId) {
            if (this.dragging === null || this.roundDone) return;
            this._placeTile(slotId, this.dragging);
            this.dragging = null;
        },

        // ── Touch drag ────────────────────────────────────────────────────
        onTouchStart(e, tileId) {
            if (this.roundDone) return;
            this._startBg();
            this._touchTile = tileId;
            const tile = e.currentTarget;
            const rect = tile.getBoundingClientRect();
            const ghost = tile.cloneNode(true);
            ghost.style.cssText = `
                position:fixed; pointer-events:none; z-index:9999;
                width:${rect.width}px; height:${rect.height}px;
                left:${rect.left}px; top:${rect.top}px;
                opacity:0.85; transform:scale(1.08);
                transition: none;
            `;
            ghost.id = '__drag-ghost__';
            document.body.appendChild(ghost);
            this._touchGhost = ghost;
        },

        onTouchMove(e) {
            e.preventDefault();
            if (!this._touchGhost) return;
            const t = e.touches[0];
            const w = this._touchGhost.offsetWidth;
            const h = this._touchGhost.offsetHeight;
            this._touchGhost.style.left = (t.clientX - w / 2) + 'px';
            this._touchGhost.style.top  = (t.clientY - h / 2) + 'px';
        },

        onTouchEnd(e) {
            if (this._touchTile === null) return;
            this._removeGhost();
            const t = e.changedTouches[0];
            const el = document.elementFromPoint(t.clientX, t.clientY);
            const slotEl = el ? el.closest('[data-slot-id]') : null;
            if (slotEl) {
                const slotId = parseInt(slotEl.dataset.slotId);
                this._placeTile(slotId, this._touchTile);
            }
            this._touchTile = null;
        },

        _removeGhost() {
            if (this._touchGhost) {
                this._touchGhost.remove();
                this._touchGhost = null;
            }
        },

        // ── Core placement logic ───────────────────────────────────────────
        _placeTile(slotId, tileId) {
            const slot = this.slots.find(s => s.id === slotId);
            const tile = this.tiles.find(t => t.id === tileId);
            if (!slot || !tile || tile.placed) return;

            // If slot already has a tile, unplace it
            if (slot.filled !== null) {
                const prev = this.tiles.find(t => t.id === slot.filled);
                if (prev) prev.placed = false;
            }

            slot.filled = tileId;
            tile.placed  = true;

            // Check if all slots filled
            if (this.slots.every(s => s.filled !== null)) {
                this._checkRound();
            }
        },

        // Tap-to-unplace
        onSlotTap(slotId) {
            if (this.roundDone) return;
            const slot = this.slots.find(s => s.id === slotId);
            if (!slot || slot.filled === null) return;
            const tile = this.tiles.find(t => t.id === slot.filled);
            if (tile) tile.placed = false;
            slot.filled = null;
        },

        _checkRound() {
            let allCorrect = true;
            this.connections = this.slots.map(slot => {
                const tile = this.tiles.find(t => t.id === slot.filled);
                const isCorrect = tile && tile.name === slot.name;
                if (!isCorrect) allCorrect = false;
                return { slotId: slot.id, tileId: slot.filled, correct: isCorrect };
            });
            this.roundDone = true;
            this.roundFeedback = allCorrect ? 'correct' : 'wrong';
            if (allCorrect) {
                this.correct++;
                this._playCorrectSfx();
            } else {
                this._playWrongSfx();
            }
            setTimeout(() => this._advance(), 1800);
        },

        _advance() {
            if (this.current < this.questions.length - 1) {
                this.current++;
                this._buildRound();
            } else {
                this.finished = true;
                this._stopBg();
                setTimeout(() => this._playScoreSfx(this.scorePercent >= 70), 500);
                this._submit();
            }
        },

        slotFeedbackClass(slotId) {
            if (!this.roundDone) return '';
            const conn = this.connections.find(c => c.slotId === slotId);
            if (!conn) return '';
            return conn.correct ? 'slot-correct' : 'slot-wrong';
        },

        tileFeedbackClass(tileId) {
            if (!this.roundDone) return '';
            const conn = this.connections.find(c => c.tileId === tileId);
            if (!conn) return '';
            return conn.correct ? 'tile-correct' : 'tile-wrong';
        },

        tileInsideSlot(slotId) {
            const slot = this.slots.find(s => s.id === slotId);
            if (!slot || slot.filled === null) return null;
            return this.tiles.find(t => t.id === slot.filled) || null;
        },

        async _submit() {
            this.submitting = true;
            try {
                const resp = await fetch(submitUrl, {
                    method:  'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken,
                        'Accept':       'application/json',
                    },
                    body: JSON.stringify({
                        score:   this.scorePercent,
                        correct: this.correct,
                        total:   this.questions.length,
                    }),
                });
                const data = await resp.json();
                if (data.redirect) setTimeout(() => { window.location.href = data.redirect; }, 1800);
            } catch (e) {
                this.submitting = false;
            }
        },

        // ── Background music ───────────────────────────────────────────────
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

        // ── SFX ───────────────────────────────────────────────────────────
        _getCtx() {
            if (!this._ctx) this._ctx = new (window.AudioContext || window.webkitAudioContext)();
            return this._ctx;
        },
        _tone(freq, dur, type = 'sine', vol = 0.28, delay = 0) {
            try {
                const ctx  = this._getCtx();
                const osc  = ctx.createOscillator();
                const gain = ctx.createGain();
                osc.connect(gain); gain.connect(ctx.destination);
                osc.type = type; osc.frequency.value = freq;
                const t = ctx.currentTime + delay;
                gain.gain.setValueAtTime(vol, t);
                gain.gain.exponentialRampToValueAtTime(0.0001, t + dur);
                osc.start(t); osc.stop(t + dur + 0.01);
            } catch (_) {}
        },
        _playCorrectSfx() {
            this._tone(880,  0.14, 'sine', 0.28, 0.00);
            this._tone(1108, 0.20, 'sine', 0.24, 0.09);
        },
        _playWrongSfx() {
            this._tone(320, 0.16, 'square', 0.20, 0.00);
            this._tone(240, 0.22, 'square', 0.16, 0.14);
        },
        _playScoreSfx(won) {
            if (won) {
                [523, 659, 784, 1047].forEach((f, i) => this._tone(f, 0.45, 'sine', 0.32, i * 0.14));
                setTimeout(() => { this._tone(2093, 0.3, 'sine', 0.12, 0); this._tone(1568, 0.3, 'sine', 0.10, 0.08); }, 680);
            } else {
                this._tone(440, 0.40, 'sine', 0.22, 0.00);
                this._tone(392, 0.50, 'sine', 0.18, 0.32);
            }
        },
    };
}