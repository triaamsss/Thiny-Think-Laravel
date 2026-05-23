/**
 * hijaiyahCircle — Alpine component untuk Modul 1 (Huruf Dasar)
 * Dipanggil via x-data="hijaiyahCircle(letters)" di learn-basic.blade.php
 */
export function hijaiyahCircle(letters) {
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

        /*
         * Posisi radial untuk setiap node huruf.
         * Container: 560×560 px. Tombol: 48×48 px (offset 24px).
         * r = 43% → radius ≈ 240px.
         */
        nodeStyle(i) {
            const n   = this.letters.length;
            const ang = (2 * Math.PI * i / n) - Math.PI / 2;
            const r   = 43;
            const x   = 50 + r * Math.cos(ang);
            const y   = 50 + r * Math.sin(ang);
            const d1  = i * 55;
            const d2  = d1 + 600;
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

/**
 * fathahCircle — Alpine component untuk Modul 2 (Harakat Fathah)
 * Dipanggil via x-data="fathahCircle(letters)" di learn-fathah.blade.php
 * Sama persis dengan hijaiyahCircle, hanya nama berbeda.
 */
export function fathahCircle(letters) {
    return hijaiyahCircle(letters);
}