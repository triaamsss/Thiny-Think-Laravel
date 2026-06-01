<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Kosa Kata</title>

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />

    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.4/dist/aos.css" />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@300..700&display=swap" rel="stylesheet" />

    <style>
        html,
        body {
            width: 100%;
            height: 100%;
            margin: 0;
            overflow: hidden;
        }

        .btn-close-app a,
        .btn-start a {
            color: inherit;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <audio id="bg-music" loop preload="auto">
        <source src="{{ asset('assets/audio/bgm.mp3') }}" type="audio/mpeg" />
    </audio>

    <div class="app-wrapper">
        <button class="btn-mute" id="btnMute">🔊</button>

        <button class="btn-close-app">
            <a href="{{ url('/') }}">✕</a>
        </button>

        <div class="board-area">
            <img src="{{ asset('assets/images/hijaiyah/BG14.png') }}" class="board-bg"
                alt="Background papan kosa kata" />

            <h1 class="board-title" data-aos="zoom-in">KOSA KATA</h1>

            <h1 class="btn-start" data-aos="zoom-in" data-aos-delay="200">
                <a href="{{ route('kosa-kata.play') }}">MULAI</a>
            </h1>
        </div>

        <div class="character character-left" data-aos="fade-up">
            <img src="{{ asset('assets/images/hijaiyah/C1.png') }}" alt="Karakter kiri" />
        </div>

        <div class="character character-right" data-aos="fade-up" data-aos-delay="150">
            <img src="{{ asset('assets/images/hijaiyah/C2.png') }}" alt="Karakter kanan" />
        </div>
    </div>

    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>

    <script>
        AOS.init({
            once: true,
            duration: 800,
            easing: "ease-out-cubic",
        });

        $(".btn-start").on("click", function() {
            console.log("Mulai belajar");
        });
    </script>

    <script>
        const music = document.getElementById("bg-music");
        const btnMute = document.getElementById("btnMute");

        function updateIcon() {
            if (music.muted || music.paused) {
                btnMute.textContent = "🔇";
            } else {
                btnMute.textContent = "🔊";
            }
        }

        btnMute.addEventListener("click", function(event) {
            event.stopPropagation();

            music.muted = !music.muted;

            if (!music.muted && music.paused) {
                music.play().catch(() => {});
            }

            updateIcon();
        });

        window.addEventListener("load", async () => {
            try {
                music.muted = false;
                await music.play();
            } catch (err) {}

            updateIcon();
        });

        function playOnFirstUserAction() {
            music.muted = false;
            music.play().catch(() => {});
            updateIcon();

            document.removeEventListener("click", playOnFirstUserAction);
            document.removeEventListener("touchstart", playOnFirstUserAction);
            document.removeEventListener("keydown", playOnFirstUserAction);
        }

        document.addEventListener("click", playOnFirstUserAction);
        document.addEventListener("touchstart", playOnFirstUserAction);
        document.addEventListener("keydown", playOnFirstUserAction);
    </script>
</body>

</html>
