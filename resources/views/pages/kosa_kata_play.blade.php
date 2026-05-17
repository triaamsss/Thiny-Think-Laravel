<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Buat Kata Seru! – TinyThink</title>
<link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@400;500;600;700;800&family=Nunito:wght@700;800;900&display=swap" rel="stylesheet">
<style>
/* ══════════════════════════════
   TOKENS & RESET
══════════════════════════════ */
*, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

:root {
  --cream:   #FFF8EE;
  --warm:    #FFF0D6;
  --paper:   #FFFBF4;
  --dark:    #2B2040;
  --ink:     #3D3260;

  --red:     #FF5252;
  --orange:  #FF8C42;
  --yellow:  #FFD166;
  --green:   #06D6A0;
  --teal:    #26C6DA;
  --blue:    #4B9EFF;
  --purple:  #7C4DFF;
  --pink:    #FF6EB4;

  --block-shadow: 0 6px 0;
  --card-r: 20px;
  --block-r: 16px;
}

html { scroll-behavior: smooth; }

body {
  font-family: 'Nunito', sans-serif;
  background: var(--cream);
  min-height: 100vh;
  overflow-x: hidden;
  cursor: default;
}

/* ══════════════════════════════
   ANIMATED BG — POLKADOT PAPER
══════════════════════════════ */
body::before {
  content: '';
  position: fixed; inset: 0; z-index: 0;
  background-image:
    radial-gradient(circle, rgba(255,209,102,0.18) 2px, transparent 2px),
    radial-gradient(circle, rgba(255,82,82,0.10) 2px, transparent 2px);
  background-size: 40px 40px, 60px 60px;
  background-position: 0 0, 20px 20px;
  pointer-events: none;
}

/* ══════════════════════════════
   FLOATING DECO SHAPES
══════════════════════════════ */
.deco { position: fixed; z-index: 0; pointer-events: none; }
.deco-star {
  font-size: 28px;
  animation: float-star ease-in-out infinite alternate;
  opacity: 0.35;
}
@keyframes float-star {
  from { transform: translateY(0) rotate(0deg); }
  to   { transform: translateY(-16px) rotate(20deg); }
}
.d1  { top: 8%;   left: 3%;   animation-duration: 3.2s; }
.d2  { top: 15%;  right: 5%;  animation-duration: 4.1s; animation-delay: -.8s; }
.d3  { top: 45%;  left: 1%;   animation-duration: 3.8s; animation-delay: -.4s; }
.d4  { top: 60%;  right: 3%;  animation-duration: 4.4s; animation-delay: -1.2s; }
.d5  { top: 80%;  left: 6%;   animation-duration: 3.5s; animation-delay: -.6s; }
.d6  { top: 85%;  right: 8%;  animation-duration: 4.0s; animation-delay: -1.8s; }

/* ══════════════════════════════
   LAYOUT
══════════════════════════════ */
.page { position: relative; z-index: 1; min-height: 100vh; padding-bottom: 60px; }

/* ══════════════════════════════
   HEADER
══════════════════════════════ */
/* Update CSS untuk Header dengan Logo Baru */

/* Container Logo agar kontennya menumpuk ke bawah */
.logo-container {
  display: flex;
  flex-direction: column; /* Membuat konten berderet ke bawah */
  align-items: flex-start; /* Rata kiri (atau gunakan 'center' jika ingin di tengah) */
  text-decoration: none;
  gap: 2px; /* Jarak antara gambar logo dan teks */
}

/* Ukuran Gambar Logo Utama */
.main-logo {
  max-height: 38px; /* Sesuaikan ukuran logo biru */
  width: auto;
  display: block;
}

/* Kalimat "Buat Kata Seru!" di bawah logo */
.logo-sub-text {
  font-family: 'Baloo 2', cursive;
  font-size: 12px;
  font-weight: 700;
  color: rgba(255, 255, 255, 0.6); /* Warna putih transparan agar elegan di bg gelap */
  letter-spacing: 0.5px;
  margin-left: 2px; /* Sedikit geser agar sejajar dengan visual logo */
}

/* Penyesuaian Header agar tinggi cukup untuk 2 baris */
.header {
  background: var(--dark);
  padding: 10px 28px; /* Menggunakan padding daripada fixed height agar lebih fleksibel */
  min-height: 75px; 
  display: flex; 
  align-items: center; 
  justify-content: space-between;
  border-bottom: 5px solid var(--yellow);
  position: sticky; 
  top: 0; 
  z-index: 200;
}
.header-right { display: flex; align-items: center; gap: 12px; }

.star-counter {
  background: rgba(255,255,255,.1);
  border: 2px solid rgba(255,255,255,.25);
  border-radius: 99px; 
  padding: 6px 16px;
  font-family: 'Baloo 2', cursive; 
  font-size: 16px; 
  font-weight: 700;
  color: white; 
  display: flex; 
  align-items: center; 
  gap: 6px;
}
/* ══════════════════════════════
   HERO SECTION
══════════════════════════════ */
.hero {
  text-align: center;
  padding: 44px 20px 20px;
}
.hero-badge {
  display: inline-flex; align-items: center; gap: 8px;
  background: var(--yellow); color: var(--dark);
  border-radius: 99px; padding: 7px 22px;
  font-family: 'Baloo 2', cursive; font-size: 15px; font-weight: 700;
  border: 3px solid var(--dark); box-shadow: 3px 3px 0 var(--dark);
  margin-bottom: 20px;
}
.hero h1 {
  font-family: 'Baloo 2', cursive; font-size: clamp(30px, 5.5vw, 52px);
  font-weight: 800; color: var(--dark); line-height: 1.15; margin-bottom: 10px;
}
.hero h1 .wave {
  display: inline-block; color: var(--purple);
  -webkit-text-stroke: 2px var(--dark);
  animation: wave-rock 2s ease-in-out infinite;
}
@keyframes wave-rock { 0%,100%{transform:rotate(-3deg)} 50%{transform:rotate(3deg)} }
.hero p {
  font-size: 17px; color: #666; font-weight: 700;
  max-width: 480px; margin: 0 auto 10px;
}

/* ══════════════════════════════
   TAB BAR — category selector
══════════════════════════════ */
.tab-bar {
  display: flex; justify-content: center; gap: 10px;
  flex-wrap: wrap; padding: 16px 20px 4px;
}
.tab-btn {
  background: white; border: 3px solid var(--dark);
  border-radius: 99px; padding: 9px 22px;
  font-family: 'Baloo 2', cursive; font-size: 15px; font-weight: 700;
  cursor: pointer; color: var(--dark);
  box-shadow: 3px 3px 0 var(--dark);
  transition: transform .12s, box-shadow .12s;
  display: flex; align-items: center; gap: 7px;
}
.tab-btn:hover { transform: translate(-1px,-2px); box-shadow: 4px 5px 0 var(--dark); }
.tab-btn:active { transform: translate(1px,1px); box-shadow: 2px 2px 0 var(--dark); }
.tab-btn.active { color: white; }
.tab-btn.t-buah  { background: var(--orange); }
.tab-btn.t-hewan { background: var(--green); }
.tab-btn.t-benda { background: var(--blue); }
.tab-btn.t-alam  { background: var(--teal); }

/* ══════════════════════════════
   MAIN GAME AREA
══════════════════════════════ */
.game-area {
  max-width: 900px; margin: 24px auto 0;
  padding: 0 20px;
  display: grid;
  grid-template-rows: auto auto auto;
  gap: 20px;
}

/* ══════════════════════════════
   PICTURE CARD — target image
══════════════════════════════ */
.picture-card {
  background: var(--paper);
  border: 4px solid var(--dark);
  border-radius: 28px;
  padding: 24px 20px 20px;
  text-align: center;
  box-shadow: 6px 6px 0 var(--dark);
  position: relative;
  animation: card-drop .4s cubic-bezier(.34,1.56,.64,1);
}
@keyframes card-drop { from{transform:scale(.8) translateY(-20px);opacity:0} to{transform:scale(1) translateY(0);opacity:1} }

.pic-label {
  font-family: 'Baloo 2', cursive; font-size: 13px; font-weight: 700;
  color: #999; letter-spacing: 1px; text-transform: uppercase; margin-bottom: 10px;
}
.pic-emoji-wrap {
  width: 140px; height: 140px; margin: 0 auto 16px;
  background: var(--warm); border-radius: 50%;
  border: 4px solid var(--dark);
  display: flex; align-items: center; justify-content: center;
  font-size: 80px; line-height: 1;
  box-shadow: 4px 4px 0 var(--dark);
  animation: emoji-bounce 2.5s ease-in-out infinite;
}
@keyframes emoji-bounce { 0%,100%{transform:scale(1)} 50%{transform:scale(1.06)} }

.pic-hint {
  font-family: 'Baloo 2', cursive; font-size: 15px; font-weight: 700;
  color: #888; margin-bottom: 6px;
}
.pic-syllables {
  display: flex; gap: 8px; justify-content: center; flex-wrap: wrap;
  margin-bottom: 6px;
}
.syllable-pill {
  background: var(--yellow); border: 2px solid var(--dark); border-radius: 99px;
  padding: 4px 14px; font-family: 'Baloo 2', cursive; font-size: 15px; font-weight: 700;
  color: var(--dark); box-shadow: 2px 2px 0 var(--dark);
}

/* Category badge */
.cat-badge {
  position: absolute; top: 14px; right: 14px;
  padding: 5px 14px; border-radius: 99px;
  font-family: 'Baloo 2', cursive; font-size: 12px; font-weight: 700;
  border: 2px solid var(--dark); box-shadow: 2px 2px 0 var(--dark);
}

/* Speaker button */
.speak-btn {
  background: var(--purple); color: white;
  border: 3px solid var(--dark); border-radius: 14px;
  padding: 10px 22px; font-family: 'Baloo 2', cursive; font-size: 16px; font-weight: 700;
  cursor: pointer; box-shadow: 3px 3px 0 var(--dark);
  transition: transform .1s, box-shadow .1s;
  display: inline-flex; align-items: center; gap: 8px;
  margin-top: 12px;
}
.speak-btn:hover { transform: translate(-1px,-2px); box-shadow: 4px 5px 0 var(--dark); }
.speak-btn:active { transform: translate(1px,1px); box-shadow: 2px 2px 0 var(--dark); }

/* ══════════════════════════════
   WORD BUILDER — answer tray
══════════════════════════════ */
.builder-section { }

.builder-label {
  font-family: 'Baloo 2', cursive; font-size: 15px; font-weight: 700;
  color: #888; text-align: center; margin-bottom: 10px; letter-spacing: .5px;
}

.answer-tray {
  display: flex; justify-content: center; align-items: center;
  gap: 8px; flex-wrap: wrap;
  min-height: 90px;
  background: var(--paper);
  border: 3px dashed #ccc;
  border-radius: var(--card-r);
  padding: 14px 20px;
  position: relative;
  transition: border-color .2s, background .2s;
}
.answer-tray.has-letters { border-color: var(--dark); border-style: solid; }
.answer-tray.correct-flash { background: #E8F5E9; border-color: var(--green); }
.answer-tray.wrong-flash  { background: #FFEBEE; border-color: var(--red); }
.answer-tray.correct-flash .answer-slot { background: var(--green); color: white; border-color: #0a9e78; }
.answer-tray.wrong-flash  .answer-slot { background: var(--red);   color: white; border-color: #cc2020; }

.tray-placeholder {
  font-family: 'Baloo 2', cursive; font-size: 16px; font-weight: 700;
  color: #ccc; pointer-events: none; user-select: none;
}

.answer-slot {
  width: 56px; height: 64px;
  background: white;
  border: 3px solid var(--dark);
  border-radius: var(--block-r);
  display: flex; align-items: center; justify-content: center;
  font-family: 'Baloo 2', cursive; font-size: 30px; font-weight: 800;
  color: var(--dark);
  cursor: pointer;
  box-shadow: var(--block-shadow) var(--dark);
  transition: transform .12s cubic-bezier(.34,1.56,.64,1), box-shadow .12s, background .2s;
  user-select: none;
  animation: slot-pop .25s cubic-bezier(.34,1.56,.64,1);
}
@keyframes slot-pop { from{transform:scale(.6);opacity:0} to{transform:scale(1);opacity:1} }
.answer-slot:hover { transform: scale(1.05) translateY(-2px); box-shadow: 0 8px 0 var(--dark); }
.answer-slot:active { transform: scale(.96) translateY(2px); box-shadow: 0 3px 0 var(--dark); }

/* ══════════════════════════════
   FEEDBACK STRIP
══════════════════════════════ */
.feedback-strip {
  text-align: center; min-height: 30px;
  font-family: 'Baloo 2', cursive; font-size: 18px; font-weight: 800;
  transition: opacity .2s;
}
.feedback-strip.ok  { color: var(--green); }
.feedback-strip.err { color: var(--red); }

/* ══════════════════════════════
   ACTION BUTTONS
══════════════════════════════ */
.action-row {
  display: flex; gap: 12px; justify-content: center; flex-wrap: wrap;
}
.action-btn {
  border: 3px solid var(--dark); border-radius: var(--block-r);
  padding: 13px 28px;
  font-family: 'Baloo 2', cursive; font-size: 18px; font-weight: 800;
  cursor: pointer; box-shadow: 4px 4px 0 var(--dark);
  transition: transform .1s, box-shadow .1s;
  display: inline-flex; align-items: center; gap: 8px;
}
.action-btn:hover  { transform: translate(-2px,-2px); box-shadow: 6px 6px 0 var(--dark); }
.action-btn:active { transform: translate(2px,2px);   box-shadow: 2px 2px 0 var(--dark); }
.btn-check  { background: var(--green);  color: white; }
.btn-clear  { background: var(--warm);   color: var(--dark); }
.btn-next   { background: var(--orange); color: white; }
.btn-speak2 { background: var(--blue);   color: white; }

/* ══════════════════════════════
   LETTER BLOCKS — source palette
══════════════════════════════ */
.blocks-section { }
.blocks-label {
  font-family: 'Baloo 2', cursive; font-size: 15px; font-weight: 700;
  color: #888; text-align: center; margin-bottom: 12px; letter-spacing: .5px;
}
.blocks-grid {
  display: flex; gap: 10px; justify-content: center;
  flex-wrap: wrap; padding: 4px;
}

.letter-block {
  width: 62px; height: 70px;
  border: 3px solid var(--dark);
  border-radius: var(--block-r);
  display: flex; align-items: center; justify-content: center;
  font-family: 'Baloo 2', cursive; font-size: 28px; font-weight: 800;
  cursor: pointer;
  box-shadow: var(--block-shadow) var(--dark);
  transition: transform .12s cubic-bezier(.34,1.56,.64,1), box-shadow .12s, opacity .2s;
  user-select: none;
  position: relative;
  animation: block-in .35s cubic-bezier(.34,1.56,.64,1) both;
}
@keyframes block-in { from{transform:scale(.4) rotate(-15deg);opacity:0} to{transform:scale(1) rotate(0deg);opacity:1} }

.letter-block:hover:not(.used) { transform: translateY(-4px) scale(1.06); box-shadow: 0 10px 0 var(--dark); }
.letter-block:active:not(.used){ transform: translateY(2px) scale(.97); box-shadow: 0 3px 0 var(--dark); }
.letter-block.used { opacity: .28; pointer-events: none; transform: scale(.9); box-shadow: 0 2px 0 var(--dark); }

/* Block color palette — cycle through */
.bc0  { background: #FF6B6B; color: white; }
.bc1  { background: #FF8C42; color: white; }
.bc2  { background: #FFD166; color: var(--dark); }
.bc3  { background: #06D6A0; color: white; }
.bc4  { background: #26C6DA; color: white; }
.bc5  { background: #4B9EFF; color: white; }
.bc6  { background: #7C4DFF; color: white; }
.bc7  { background: #FF6EB4; color: white; }
.bc8  { background: #A8E063; color: var(--dark); }
.bc9  { background: #FFA5A5; color: white; }

/* ══════════════════════════════
   PROGRESS BAR
══════════════════════════════ */
.progress-wrap {
  max-width: 500px; margin: 0 auto 4px;
  display: flex; align-items: center; gap: 12px;
}
.progress-track {
  flex: 1; height: 14px; background: rgba(0,0,0,.08);
  border-radius: 99px; border: 2px solid var(--dark); overflow: hidden;
}
.progress-fill {
  height: 100%; background: linear-gradient(90deg, var(--green), var(--teal));
  border-radius: 99px;
  transition: width .5s cubic-bezier(.34,1.56,.64,1);
}
.progress-label {
  font-family: 'Baloo 2', cursive; font-size: 14px; font-weight: 700; color: #888; white-space: nowrap;
}

/* ══════════════════════════════
   SCORE CARDS
══════════════════════════════ */
.score-row {
  display: flex; gap: 12px; justify-content: center; flex-wrap: wrap;
  max-width: 500px; margin: 0 auto;
}
.score-card {
  background: white; border: 3px solid var(--dark); border-radius: 16px;
  padding: 10px 20px; text-align: center;
  box-shadow: 3px 3px 0 var(--dark);
  min-width: 100px;
}
.sc-label { font-size: 12px; font-weight: 800; color: #aaa; letter-spacing: .5px; text-transform: uppercase; }
.sc-val   { font-family: 'Baloo 2', cursive; font-size: 26px; font-weight: 800; color: var(--dark); }

/* ══════════════════════════════
   RESULT SCREEN
══════════════════════════════ */
#result-screen {
  display: none; max-width: 560px; margin: 40px auto;
  padding: 0 20px; text-align: center;
}
.result-card {
  background: var(--paper); border: 4px solid var(--dark); border-radius: 32px;
  padding: 40px 28px 32px;
  box-shadow: 8px 8px 0 var(--dark);
  animation: card-drop .5s cubic-bezier(.34,1.56,.64,1);
}
.result-emoji   { font-size: 64px; display: block; margin-bottom: 14px; }
.result-title   { font-family: 'Baloo 2', cursive; font-size: 36px; font-weight: 800; color: var(--dark); margin-bottom: 6px; }
.result-stars   { font-size: 44px; margin: 10px 0 6px; letter-spacing: 4px; }
.result-score   { font-family: 'Baloo 2', cursive; font-size: 54px; font-weight: 800; color: var(--orange); margin-bottom: 6px; }
.result-msg     { font-size: 18px; font-weight: 800; color: #777; margin-bottom: 28px; }
.result-btns    { display: flex; gap: 12px; justify-content: center; flex-wrap: wrap; }
.rbtn {
  border: 3px solid var(--dark); border-radius: 16px;
  padding: 13px 26px; font-family: 'Baloo 2', cursive; font-size: 18px; font-weight: 800;
  cursor: pointer; box-shadow: 4px 4px 0 var(--dark);
  transition: transform .1s, box-shadow .1s; display: inline-flex; align-items: center; gap: 8px;
}
.rbtn:hover  { transform: translate(-2px,-2px); box-shadow: 6px 6px 0 var(--dark); }
.rbtn.r-yellow { background: var(--yellow); color: var(--dark); }
.rbtn.r-blue   { background: var(--blue);   color: white; }
.rbtn.r-green  { background: var(--green);  color: white; }

/* ══════════════════════════════
   FIREWORKS CANVAS
══════════════════════════════ */
#fwCanvas { position: fixed; inset: 0; pointer-events: none; z-index: 999; }

/* ══════════════════════════════
   KEYBOARD HINT
══════════════════════════════ */
.kbd-hint {
  text-align: center; font-size: 12px; color: #bbb; font-weight: 700;
  padding: 8px 0 0; letter-spacing: .3px;
}

/* ══════════════════════════════
   RESPONSIVE
══════════════════════════════ */
@media (max-width: 520px) {
  .letter-block { width: 52px; height: 60px; font-size: 24px; }
  .answer-slot  { width: 48px; height: 56px; font-size: 26px; }
  .pic-emoji-wrap { width: 110px; height: 110px; font-size: 60px; }
}
</style>
</head>
<body>

<canvas id="fwCanvas"></canvas>

<!-- Floating deco -->
<div class="deco deco-star d1">⭐</div>
<div class="deco deco-star d2">🌟</div>
<div class="deco deco-star d3">✨</div>
<div class="deco deco-star d4">💫</div>
<div class="deco deco-star d5">🎈</div>
<div class="deco deco-star d6">🎀</div>

<div class="page">

  <!-- HEADER -->
  <header class="header">
  <a href="{{ route('home') }}" class="logo-container">
    <img src="{{ asset('assets/images/logo-tinythink.png') }}" alt="TinyThink Logo" class="main-logo">
    
    <span class="logo-sub-text">Buat Kata Seru!</span>
  </a>

  <div class="header-right">
    <div class="star-counter">
      <span class="s">⭐</span>
      <span id="totalStars">0</span>
    </div>
  </div>
</header>

  <!-- GAME SCREEN -->
  <div id="game-screen">

    <!-- HERO -->
    <div class="hero">
      <div class="hero-badge">📚 Modul Kosakata · TK & PAUD</div>
      <h1>Susun <span class="wave">Huruf</span>,<br>Buat Kata Seru! 🎉</h1>
      <p>Pilih topik, lalu susun huruf-huruf menjadi sebuah kata!</p>
    </div>

    <!-- CATEGORY TABS -->
    <div class="tab-bar" id="tabBar">
      <button class="tab-btn t-buah  active" onclick="switchCat('buah')"  >🍎 Buah-buahan</button>
      <button class="tab-btn t-hewan"         onclick="switchCat('hewan')" >🐾 Hewan</button>
      <button class="tab-btn t-benda"         onclick="switchCat('benda')" >🏠 Benda</button>
      <button class="tab-btn t-alam"          onclick="switchCat('alam')"  >🌿 Alam</button>
    </div>

    <!-- MAIN GAME -->
    <div class="game-area">

      <!-- PROGRESS -->
      <div>
        <div class="progress-wrap">
          <div class="progress-track"><div class="progress-fill" id="progFill" style="width:0%"></div></div>
          <div class="progress-label" id="progLabel">0 / 6</div>
        </div>
        <div class="score-row">
          <div class="score-card"><div class="sc-label">Benar</div><div class="sc-val" id="scOk">0</div></div>
          <div class="score-card"><div class="sc-label">Percobaan</div><div class="sc-val" id="scTry">0</div></div>
          <div class="score-card"><div class="sc-label">Kata</div><div class="sc-val" id="scQ">1 / 6</div></div>
        </div>
      </div>

      <!-- PICTURE CARD -->
      <div class="picture-card" id="picCard">
        <div class="cat-badge" id="catBadge">🍎 Buah</div>
        <div class="pic-label">Apa nama gambar ini?</div>
        <div class="pic-emoji-wrap" id="picEmoji">🍎</div>
        <div class="pic-hint">Terdiri dari <strong id="letterCount">4</strong> huruf</div>
        <div class="pic-syllables" id="syllablesRow"></div>
        <button class="speak-btn" onclick="speakCurrentWord()">
          🔊 Dengarkan
        </button>
      </div>

      <!-- WORD BUILDER -->
      <div class="builder-section">
        <div class="builder-label">✏️ Susun kata di sini — ketuk huruf untuk memasukkan</div>
        <div class="answer-tray" id="answerTray">
          <div class="tray-placeholder" id="trayPlaceholder">Ketuk huruf di bawah 👇</div>
        </div>
        <div class="feedback-strip" id="feedback"></div>
        <div class="action-row" style="margin-top:12px">
          <button class="action-btn btn-check"  onclick="checkAnswer()">✓ Cek Jawaban</button>
          <button class="action-btn btn-clear"  onclick="clearAnswer()">🗑 Hapus</button>
          <button class="action-btn btn-speak2" onclick="speakCurrentWord()">🔊 Petunjuk Suara</button>
        </div>
      </div>

      <!-- LETTER BLOCKS -->
      <div class="blocks-section">
        <div class="blocks-label">🔤 Blok Huruf — ketuk untuk menyusun</div>
        <div class="blocks-grid" id="blocksGrid"></div>
        <div class="kbd-hint">💡 Kamu juga bisa ketik huruf di keyboard!</div>
      </div>

    </div>
  </div>

  <!-- RESULT SCREEN -->
  <div id="result-screen">
    <div class="result-card">
      <span class="result-emoji" id="rEmoji">🏆</span>
      <div class="result-title"  id="rTitle">Luar Biasa!</div>
      <div class="result-stars"  id="rStars">⭐⭐⭐</div>
      <div class="result-score"  id="rScore">6 / 6</div>
      <div class="result-msg"    id="rMsg">Kamu adalah juara kosakata hari ini!</div>
      <div class="result-btns">
        <button class="rbtn r-yellow" onclick="retryGame()">🔄 Coba Lagi</button>
        <button class="rbtn r-green"  onclick="nextCat()">➡ Topik Lain</button>
        <button class="rbtn r-blue"   onclick="goHome()">🏠 Menu</button>
      </div>
    </div>
  </div>

</div><!-- end .page -->

<script>
/* ══════════════════════════════════════════════
   DATA — 4 kategori, 6 kata masing-masing
══════════════════════════════════════════════ */
const DATA = {
  buah: {
    label:"🍎 Buah", color:"var(--orange)",
    words:[
      {kata:"APEL",    suku:["A","PEL"],    emoji:"🍎"},
      {kata:"PISANG",  suku:["PI","SANG"],  emoji:"🍌"},
      {kata:"MANGA",   suku:["MAN","GA"],   emoji:"🥭"},
      {kata:"JERUK",   suku:["JE","RUK"],   emoji:"🍊"},
      {kata:"SEMANGKA",suku:["SE","MANG","KA"],emoji:"🍉"},
      {kata:"ANGGUR",  suku:["ANG","GUR"],  emoji:"🍇"},
    ]
  },
  hewan: {
    label:"🐾 Hewan", color:"var(--green)",
    words:[
      {kata:"KUCING",  suku:["KU","CING"],  emoji:"🐱"},
      {kata:"ANJING",  suku:["AN","JING"],  emoji:"🐶"},
      {kata:"KELINCI", suku:["KE","LIN","CI"],emoji:"🐰"},
      {kata:"GAJAH",   suku:["GA","JAH"],   emoji:"🐘"},
      {kata:"SINGA",   suku:["SI","NGA"],   emoji:"🦁"},
      {kata:"IKAN",    suku:["I","KAN"],    emoji:"🐟"},
    ]
  },
  benda: {
    label:"🏠 Benda", color:"var(--blue)",
    words:[
      {kata:"BUKU",    suku:["BU","KU"],    emoji:"📚"},
      {kata:"KURSI",   suku:["KUR","SI"],   emoji:"🪑"},
      {kata:"MEJA",    suku:["ME","JA"],    emoji:"🪵"},
      {kata:"PENSIL",  suku:["PEN","SIL"],  emoji:"✏️"},
      {kata:"TOPI",    suku:["TO","PI"],    emoji:"🎩"},
      {kata:"SEPATU",  suku:["SE","PA","TU"],emoji:"👟"},
    ]
  },
  alam: {
    label:"🌿 Alam", color:"var(--teal)",
    words:[
      {kata:"BUNGA",   suku:["BUNG","A"],   emoji:"🌸"},
      {kata:"POHON",   suku:["PO","HON"],   emoji:"🌳"},
      {kata:"HUJAN",   suku:["HU","JAN"],   emoji:"🌧️"},
      {kata:"BINTANG", suku:["BIN","TANG"],  emoji:"⭐"},
      {kata:"BULAN",   suku:["BU","LAN"],   emoji:"🌙"},
      {kata:"MATAHARI",suku:["MA","TA","HA","RI"],emoji:"☀️"},
    ]
  }
};

/* ══ STATE ══ */
let currentCat   = "buah";
let wordList     = [];
let wordIndex    = 0;
let currentWord  = null;
let answerLetters= [];     // {letter, blockIdx}
let blockUsed    = [];     // bool array
let score        = 0;
let tries        = 0;
let totalStars   = parseInt(localStorage.getItem("tt_kosa_stars")||"0");

/* ══ DOM ══ */
const answerTray    = document.getElementById("answerTray");
const trayPH        = document.getElementById("trayPlaceholder");
const blocksGrid    = document.getElementById("blocksGrid");
const feedbackEl    = document.getElementById("feedback");
const picEmoji      = document.getElementById("picEmoji");
const catBadge      = document.getElementById("catBadge");
const letterCount   = document.getElementById("letterCount");
const syllablesRow  = document.getElementById("syllablesRow");
const progFill      = document.getElementById("progFill");
const progLabel     = document.getElementById("progLabel");
const scOk          = document.getElementById("scOk");
const scTry         = document.getElementById("scTry");
const scQ           = document.getElementById("scQ");
const starsEl       = document.getElementById("totalStars");

starsEl.textContent = totalStars;

/* ══ COLORS ══ */
const BLOCK_COLORS = ["bc0","bc1","bc2","bc3","bc4","bc5","bc6","bc7","bc8","bc9"];
const CAT_COLORS = {buah:"var(--orange)",hewan:"var(--green)",benda:"var(--blue)",alam:"var(--teal)"};

/* ══ SWITCH CATEGORY ══ */
function switchCat(cat) {
  currentCat = cat;
  wordList   = shuffle(DATA[cat].words.slice());
  wordIndex  = 0; score = 0; tries = 0;
  updateScoreboard();
  // Tab styling
  document.querySelectorAll(".tab-btn").forEach(b => b.classList.remove("active"));
  const tMap = {buah:"t-buah",hewan:"t-hewan",benda:"t-benda",alam:"t-alam"};
  document.querySelector("."+tMap[cat]).classList.add("active");
  // Show game, hide result
  document.getElementById("game-screen").style.display="block";
  document.getElementById("result-screen").style.display="none";
  loadWord();
}

/* ══ LOAD WORD ══ */
function loadWord() {
  currentWord   = wordList[wordIndex];
  answerLetters = [];
  const letters = shuffle(currentWord.kata.split(""));
  blockUsed     = new Array(letters.length).fill(false);

  // Update picture card
  picEmoji.textContent = currentWord.emoji;
  letterCount.textContent = currentWord.kata.length;
  catBadge.textContent    = DATA[currentCat].label;
  catBadge.style.background = CAT_COLORS[currentCat];
  catBadge.style.color = (currentCat==="buah"||currentCat==="benda")?"white":"white";

  // Syllables
  syllablesRow.innerHTML = currentWord.suku.map(s =>
    `<span class="syllable-pill">${s}</span>`
  ).join("");

  // Re-animate picture card
  const card = document.getElementById("picCard");
  card.style.animation="none"; void card.offsetWidth; card.style.animation="card-drop .4s cubic-bezier(.34,1.56,.64,1)";

  // Build blocks
  blocksGrid.innerHTML = "";
  letters.forEach((l, i) => {
    const block = document.createElement("div");
    block.className = `letter-block ${BLOCK_COLORS[i % BLOCK_COLORS.length]}`;
    block.id = `block-${i}`;
    block.textContent = l;
    block.style.animationDelay = `${i * 0.05}s`;
    block.dataset.letter = l;
    block.dataset.idx = i;
    block.onclick = () => clickBlock(i, l);
    blocksGrid.appendChild(block);
  });

  // Clear tray
  renderTray();
  clearFeedback();
  updateProgress();
  updateScoreboard();
}

/* ══ CLICK BLOCK ══ */
function clickBlock(idx, letter) {
  if (blockUsed[idx]) return;
  if (answerLetters.length >= currentWord.kata.length) return;

  blockUsed[idx] = true;
  document.getElementById(`block-${idx}`).classList.add("used");
  answerLetters.push({ letter, blockIdx: idx });
  renderTray();
  clearFeedback();

  // Auto-check when full
  if (answerLetters.length === currentWord.kata.length) {
    setTimeout(checkAnswer, 300);
  }
}

/* ══ RENDER TRAY ══ */
function renderTray() {
  trayPH.style.display = answerLetters.length ? "none" : "block";
  // Remove old slots
  answerTray.querySelectorAll(".answer-slot").forEach(s=>s.remove());
  answerTray.classList.toggle("has-letters", answerLetters.length > 0);

  answerLetters.forEach((item, i) => {
    const slot = document.createElement("div");
    slot.className = "answer-slot";
    slot.textContent = item.letter;
    slot.title = "Klik untuk hapus huruf ini";
    slot.onclick = () => removeSlot(i);
    answerTray.appendChild(slot);
  });
}

/* ══ REMOVE SLOT ══ */
function removeSlot(idx) {
  const item = answerLetters[idx];
  blockUsed[item.blockIdx] = false;
  document.getElementById(`block-${item.blockIdx}`).classList.remove("used");
  answerLetters.splice(idx, 1);
  renderTray();
  clearFeedback();
  answerTray.classList.remove("correct-flash","wrong-flash");
}

/* ══ CHECK ANSWER ══ */
function checkAnswer() {
  if (!answerLetters.length) {
    setFeedback("Susun dulu huruf-hurufnya ya! 😊","");
    return;
  }
  const built = answerLetters.map(a=>a.letter).join("");
  tries++;
  updateScoreboard();

  if (built === currentWord.kata) {
    score++;
    totalStars += 2;
    localStorage.setItem("tt_kosa_stars", totalStars);
    starsEl.textContent = totalStars;
    updateScoreboard();

    answerTray.classList.add("correct-flash");
    setFeedback("✅ Betul! Hebat sekali! 🎉","ok");
    speakWord(currentWord.kata.toLowerCase());
    if (score % 2 === 0) launchFireworks();

    setTimeout(()=>{
      answerTray.classList.remove("correct-flash","wrong-flash");
      wordIndex++;
      if (wordIndex >= wordList.length) { showResult(); }
      else { loadWord(); }
    }, 1200);
  } else {
    answerTray.classList.add("wrong-flash");
    setFeedback("Belum tepat, coba susun lagi! 💪","err");
    speakWord("coba lagi");

    // Shake blocks
    document.querySelectorAll(".answer-slot").forEach(s=>{
      s.style.animation="none"; void s.offsetWidth; s.style.animation="";
    });
    setTimeout(()=>{
      answerTray.classList.remove("correct-flash","wrong-flash");
    }, 600);
  }
}

/* ══ CLEAR ANSWER ══ */
function clearAnswer() {
  answerLetters.forEach(a=>{
    blockUsed[a.blockIdx]=false;
    const el=document.getElementById(`block-${a.blockIdx}`);
    if(el)el.classList.remove("used");
  });
  answerLetters=[];
  renderTray();
  clearFeedback();
  answerTray.classList.remove("correct-flash","wrong-flash");
}

/* ══ FEEDBACK ══ */
function setFeedback(msg, type) {
  feedbackEl.textContent = msg;
  feedbackEl.className = "feedback-strip " + type;
}
function clearFeedback() {
  feedbackEl.textContent = "";
  feedbackEl.className = "feedback-strip";
}

/* ══ PROGRESS ══ */
function updateProgress() {
  const pct = Math.round((wordIndex / wordList.length) * 100);
  progFill.style.width  = pct + "%";
  progLabel.textContent = wordIndex + " / " + wordList.length;
  scQ.textContent       = (wordIndex+1) + " / " + wordList.length;
}
function updateScoreboard() {
  scOk.textContent  = score;
  scTry.textContent = tries;
}

/* ══ SPEECH ══ */
function speakWord(text) {
  speechSynthesis.cancel();
  const u = new SpeechSynthesisUtterance(text);
  u.lang = "id-ID"; u.rate = 0.72; u.pitch = 1.1;
  const v = speechSynthesis.getVoices().find(x=>x.lang.startsWith("id"));
  if (v) u.voice = v;
  speechSynthesis.speak(u);
}
speechSynthesis.onvoiceschanged = ()=>speechSynthesis.getVoices();
function speakCurrentWord() {
  if (currentWord) speakWord(currentWord.kata.toLowerCase());
}

/* ══ SHOW RESULT ══ */
function showResult() {
  document.getElementById("game-screen").style.display="none";
  document.getElementById("result-screen").style.display="block";

  const total = wordList.length;
  const pct = score / total;
  let emoji="💪", title="Terus Semangat!", stars="⭐", msg="Kamu pasti bisa lebih baik!";
  if (pct>=1)       { emoji="🏆"; title="Sempurna! Luar Biasa!"; stars="⭐⭐⭐"; msg="Kamu Juara Kosakata hari ini!"; }
  else if (pct>=.7) { emoji="🎉"; title="Bagus Sekali!";         stars="⭐⭐";  msg="Hampir sempurna, coba lagi ya!"; }
  else if (pct>=.4) { emoji="😊"; title="Cukup Bagus!";         stars="⭐";    msg="Latihan lagi untuk jadi lebih baik!"; }

  document.getElementById("rEmoji").textContent = emoji;
  document.getElementById("rTitle").textContent = title;
  document.getElementById("rStars").textContent = stars;
  document.getElementById("rScore").textContent = score+" / "+total;
  document.getElementById("rMsg").textContent   = msg;

  if (pct >= .7) launchFireworks();
}

/* ══ RESULT ACTIONS ══ */
function retryGame() {
  score=0; tries=0; wordIndex=0;
  wordList=shuffle(DATA[currentCat].words.slice());
  document.getElementById("game-screen").style.display="block";
  document.getElementById("result-screen").style.display="none";
  updateScoreboard();
  loadWord();
}

function nextCat() {
  const cats=Object.keys(DATA);
  const ni=(cats.indexOf(currentCat)+1)%cats.length;
  switchCat(cats[ni]);
}
function goHome() {
  document.getElementById("game-screen").style.display="block";
  document.getElementById("result-screen").style.display="none";
  retryGame();
}

/* ══ KEYBOARD INPUT ══ */
document.addEventListener("keydown", e=>{
  if (e.key==="Backspace") { if(answerLetters.length){removeSlot(answerLetters.length-1);} return; }
  if (e.key==="Enter") { checkAnswer(); return; }
  if (e.key==="Escape") { clearAnswer(); return; }
  const k=e.key.toUpperCase();
  if (!/^[A-Z]$/.test(k)) return;
  // Find first unused block with this letter
  const blocks=Array.from(blocksGrid.querySelectorAll(".letter-block:not(.used)"));
  const match=blocks.find(b=>b.dataset.letter===k);
  if (match) { const idx=parseInt(match.dataset.idx); clickBlock(idx,k); }
});

/* ══ SHUFFLE ══ */
function shuffle(a) { return a.slice().sort(()=>Math.random()-.5); }

/* ══ FIREWORKS ══ */
const fwC=document.getElementById("fwCanvas");
const fwX=fwC.getContext("2d");
let fwP=[];
function resizeFW(){fwC.width=innerWidth;fwC.height=innerHeight;}
resizeFW(); window.addEventListener("resize",resizeFW);
function launchFireworks(){for(let i=0;i<7;i++)setTimeout(()=>burst(innerWidth*.1+Math.random()*innerWidth*.8,innerHeight*.1+Math.random()*innerHeight*.5),i*180);}
function burst(x,y){const cols=["#FF5252","#FFD166","#06D6A0","#4B9EFF","#7C4DFF","#FF6EB4","#FF8C42"];for(let i=0;i<30;i++){const a=Math.PI*2*i/30,s=3+Math.random()*5;fwP.push({x,y,vx:Math.cos(a)*s,vy:Math.sin(a)*s-1.5,c:cols[i%cols.length],l:1,sz:4+Math.random()*5});}}
(function raf(){requestAnimationFrame(raf);if(!fwP.length)return;fwX.clearRect(0,0,fwC.width,fwC.height);fwP=fwP.filter(p=>p.l>0);fwP.forEach(p=>{p.x+=p.vx;p.y+=p.vy;p.vy+=.1;p.vx*=.97;p.l-=.022;fwX.globalAlpha=p.l;fwX.fillStyle=p.c;fwX.beginPath();fwX.arc(p.x,p.y,p.sz*p.l,0,Math.PI*2);fwX.fill();});fwX.globalAlpha=1;})();

/* ══ INIT ══ */
switchCat("buah");
</script>
</body>
</html>
