<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Hafalan Doa Harian</title>

  <!-- Existing CSS -->
  <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

  <!-- New Animation Library -->
  <link rel="stylesheet" href="https://unpkg.com/aos@2.3.4/dist/aos.css">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@300..700&display=swap" rel="stylesheet">

  <style>
    html, body {
      width: 100%;
      height: 100%;
      margin: 0;
      overflow: hidden;
    }
  </style>
</head>

<body>

<!-- BACKGROUND MUSIC -->
<!-- CATATAN: autoplay sering diblokir browser, tapi kita akan "coba play" via JS saat load -->
<audio id="bg-music" loop preload="auto">
  <source src="{{ asset('assets/audio/Doa Harian audio/Backsound.mp3') }}" type="audio/mpeg">
</audio>

<!-- MAIN WRAPPER -->
<div class="app-wrapper">
  <button class="btn-mute" id="btnMute">🔇</button>

  <!-- CLOSE BUTTON -->
  <button class="btn-close-app">
    <a href="{{ route('home') }}" style="color: white;">✕</a>
  </button>

  <!-- BOARD AREA -->
  <div class="board-area">
    <img src="{{ asset('assets/images/hijaiyah/BG14.png') }}" class="board-bg" alt="">

    <h1 class="board-title" data-aos="zoom-in">
      HAFALAN DOA HARIAN
    </h1>

    <h1 class="btn-start" data-aos="zoom-in" data-aos-delay="200">
      <a href="{{ route('doa-harian.mulai') }}">MULAI</a>
    </h1>
  </div>

  <!-- CHARACTER LEFT -->
  <div class="character character-left" data-aos="fade-up">
    <img src="{{ asset('assets/images/hijaiyah/C1.png') }}" alt="">
  </div>

  <!-- CHARACTER RIGHT -->
  <div class="character character-right" data-aos="fade-up" data-aos-delay="150">
    <img src="{{ asset('assets/images/hijaiyah/C2.png') }}" alt="">
  </div>
</div>

<!-- JS -->
<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>

<script>
  AOS.init({
    once: true,
    duration: 800,
    easing: 'ease-out-cubic'
  });
</script>

<script>
  const music = document.getElementById('bg-music');
  const btnMute = document.getElementById('btnMute');

  // helper: update icon sesuai kondisi
  function updateIcon() {
    // kalau muted ATAU belum jalan -> tampilkan 🔇
    // kalau sedang play dan tidak muted -> 🔊
    if (music.muted || music.paused) btnMute.textContent = '🔇';
    else btnMute.textContent = '🔊';
  }

  // toggle mute
  btnMute.addEventListener('click', function (e) {
    e.stopPropagation(); // biar gak "klik body" kebaca dobel
    music.muted = !music.muted;

    // kalau user unmute tapi musik belum jalan, coba play
    if (!music.muted && music.paused) {
      music.play().catch(() => {});
    }
    updateIcon();
  });

  // 1) COBA AUTOPLAY SAAT LOAD
  window.addEventListener('load', async () => {
    try {
      // jangan muted supaya beneran terdengar (kalau browser ngizinin)
      music.muted = false;
      await music.play();     // kalau diblokir bakal masuk catch
    } catch (err) {
      // autoplay diblokir -> normal, nanti nyala setelah klik user
    }
    updateIcon();
  });

  // 2) FALLBACK: sekali klik di mana aja, musik nyala
  // (ini yang paling aman buat Chrome)
  function playOnFirstUserAction() {
    music.muted = false;
    music.play().catch(() => {});
    updateIcon();

    document.removeEventListener('click', playOnFirstUserAction);
    document.removeEventListener('touchstart', playOnFirstUserAction);
    document.removeEventListener('keydown', playOnFirstUserAction);
  }
  document.addEventListener('click', playOnFirstUserAction);
  document.addEventListener('touchstart', playOnFirstUserAction);
  document.addEventListener('keydown', playOnFirstUserAction);
</script>

</body>
</html>
