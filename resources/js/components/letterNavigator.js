export function letterNavigator(letters) {
    return {
        letters,
        current: 0,
        direction: 'next',
        transitioning: false,
        playing: false,
        activeAudio: null,

        get letter()  { return this.letters[this.current]; },
        get isFirst() { return this.current === 0; },
        get isLast()  { return this.current === this.letters.length - 1; },
        get progress(){ return Math.round(((this.current + 1) / this.letters.length) * 100); },

        prev() {
            if (this.isFirst || this.transitioning) return;
            this.direction = 'prev';
            this._doTransition(() => this.current--);
        },

        next() {
            if (this.isLast || this.transitioning) return;
            this.direction = 'next';
            this._doTransition(() => this.current++);
        },

        _doTransition(fn) {
            this.transitioning = true;
            setTimeout(() => {
                fn();
                this.transitioning = false;
            }, 280);
        },

        playAudio() {
            if (this.activeAudio) {
                this.activeAudio.pause();
                this.activeAudio.currentTime = 0;
            }
            const src = '/storage/' + this.letter.audio;
            this.activeAudio = new Audio(src);
            this.playing = true;
            this.activeAudio.play().catch(() => { this.playing = false; });
            this.activeAudio.onended = () => { this.playing = false; };
        },
    };
}