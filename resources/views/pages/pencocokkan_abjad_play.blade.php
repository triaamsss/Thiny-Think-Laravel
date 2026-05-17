

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Pencocokkan Huruf – TinyThink</title>
<link href="https://fonts.googleapis.com/css2?family=Fredoka+One&family=Nunito:wght@400;600;700;800&display=swap" rel="stylesheet">
<style>
:root {
  --sky: #6EC6F5;
  --sun: #FFD43B;
  --grass: #5BC85B;
  --coral: #FF7043;
  --lavender: #B39DDB;
  --mint: #4DD0A0;
  --peach: #FFB74D;
  --white: #FFFDF7;
  --dark: #2D2A3E;
  --card-r: 24px;
}

* { box-sizing: border-box; margin: 0; padding: 0; }

body {
  font-family: 'Nunito', sans-serif;
  background: #E8F8FF;
  min-height: 100vh;
  overflow-x: hidden;
}

/* ── BACKGROUND ── */
.bg-scene {
  position: fixed; inset: 0; z-index: 0; pointer-events: none;
  background: linear-gradient(180deg, #C9EEFF 0%, #E8F8FF 60%, #D4F4D4 100%);
}
.cloud {
  position: absolute; background: white; border-radius: 50px; opacity: 0.85;
  animation: drift linear infinite;
}
.cloud::before, .cloud::after {
  content:''; position: absolute; background: white; border-radius: 50%;
}
.c1 { width:100px; height:38px; top:8%; left:-120px; animation-duration:28s; animation-delay:-8s; }
.c1::before { width:50px; height:50px; top:-22px; left:15px; }
.c1::after  { width:35px; height:35px; top:-14px; left:45px; }
.c2 { width:130px; height:45px; top:18%; left:-160px; animation-duration:36s; animation-delay:-20s; opacity:.6; }
.c2::before { width:60px; height:60px; top:-28px; left:20px; }
.c2::after  { width:42px; height:42px; top:-18px; left:60px; }
.c3 { width:80px; height:30px; top:5%; left:-100px; animation-duration:22s; animation-delay:-5s; opacity:.5; }
.c3::before { width:38px; height:38px; top:-17px; left:10px; }
.c3::after  { width:28px; height:28px; top:-11px; left:38px; }
@keyframes drift { from { transform: translateX(0) } to { transform: translateX(110vw) } }

.ground { position: fixed; bottom: 0; left: 0; right: 0; height: 60px; background: #5BC85B; border-radius: 60% 60% 0 0 / 30px 30px 0 0; z-index: 0; }
.ground::before { content:''; position:absolute; inset:0; background:#4aab4a; border-radius: 60% 60% 0 0 / 30px 30px 0 0; top:8px; }

/* ── LAYOUT ── */
.page { position: relative; z-index: 1; min-height: 100vh; padding: 0 0 80px; }

/* ── HEADER ── */
.header {
  background: white;
  border-bottom: 4px solid var(--sky);
  padding: 14px 24px;
  display: flex; align-items: center; justify-content: space-between;
  box-shadow: 0 4px 0 #B3E5FC;
}
/* TAMBAHKAN CSS INI */
.navbar-brand {
  display: flex;
  align-items: center;
  text-decoration: none; /* Menghilangkan garis bawah pada link */
}

.navbar-brand img {
  max-height: 40px; /* Atur tinggi gambar agar pas dengan header */
  width: auto;      /* Biarkan lebar menyesuaikan secara proporsional */
  display: block;
}
.header-stars { display: flex; gap: 6px; align-items: center; }
.star-badge {
  background: var(--sun); border: 2px solid var(--dark); border-radius: 10px;
  padding: 4px 12px; font-family: 'Fredoka One', cursive; font-size: 16px;
  color: var(--dark); box-shadow: 2px 2px 0 var(--dark);
}
.back-btn {
  background: var(--coral); color: white; border: 3px solid var(--dark);
  border-radius: 14px; padding: 8px 18px; font-family: 'Fredoka One', cursive;
  font-size: 16px; cursor: pointer; box-shadow: 3px 3px 0 var(--dark);
  transition: transform .1s, box-shadow .1s; display: none;
}
.back-btn:hover { transform: translate(1px,1px); box-shadow: 2px 2px 0 var(--dark); }

/* ── HERO ── */
.hero {
  text-align: center; padding: 40px 20px 24px;
}
.hero-badge {
  display: inline-block; background: var(--sun); border: 3px solid var(--dark);
  border-radius: 99px; padding: 6px 20px; font-family: 'Fredoka One', cursive;
  font-size: 14px; color: var(--dark); box-shadow: 3px 3px 0 var(--dark); margin-bottom: 16px;
}
.hero h1 {
  font-family: 'Fredoka One', cursive; font-size: clamp(32px, 6vw, 52px);
  color: var(--dark); line-height: 1.1; margin-bottom: 10px;
}
.hero h1 .highlight {
  color: var(--coral); -webkit-text-stroke: 2px var(--dark);
  display: inline-block; animation: wobble 3s ease-in-out infinite;
}
@keyframes wobble { 0%,100% { transform: rotate(-2deg) } 50% { transform: rotate(2deg) } }
.hero p { font-size: 18px; color: #555; max-width: 500px; margin: 0 auto; font-weight: 600; }

/* ── LEVEL SELECTOR ── */
.level-section { padding: 10px 20px 30px; max-width: 860px; margin: 0 auto; }
.section-label {
  font-family: 'Fredoka One', cursive; font-size: 22px; color: var(--dark);
  margin-bottom: 16px; text-align: center;
}
.level-grid {
  display: grid; grid-template-columns: repeat(auto-fit, minmax(230px, 1fr)); gap: 16px;
}
.level-card {
  background: white; border: 3px solid var(--dark); border-radius: var(--card-r);
  padding: 22px 18px; cursor: pointer; text-align: center;
  box-shadow: 5px 5px 0 var(--dark); transition: transform .15s, box-shadow .15s;
  position: relative; overflow: hidden;
}
.level-card:hover { transform: translate(-2px,-2px); box-shadow: 7px 7px 0 var(--dark); }
.level-card:active { transform: translate(2px,2px); box-shadow: 3px 3px 0 var(--dark); }
.level-card .lc-emoji { font-size: 52px; margin-bottom: 10px; display: block; }
.level-card .lc-title { font-family: 'Fredoka One', cursive; font-size: 22px; color: var(--dark); margin-bottom: 4px; }
.level-card .lc-desc { font-size: 14px; color: #777; font-weight: 600; }
.level-card .lc-tag {
  position: absolute; top: 12px; right: 12px;
  background: var(--sun); border: 2px solid var(--dark); border-radius: 8px;
  font-size: 11px; font-family: 'Fredoka One', cursive; padding: 2px 8px; color: var(--dark);
}
.lc-green { border-color: var(--grass); box-shadow: 5px 5px 0 var(--grass); background: #F0FFF0; }
.lc-blue  { border-color: var(--sky); box-shadow: 5px 5px 0 var(--sky); background: #F0F9FF; }
.lc-coral { border-color: var(--coral); box-shadow: 5px 5px 0 var(--coral); background: #FFF4F0; }

/* ── GAME SCREEN ── */
#game-screen { display: none; padding: 20px; max-width: 900px; margin: 0 auto; }

.game-topbar {
  display: flex; align-items: center; justify-content: space-between;
  background: white; border: 3px solid var(--dark); border-radius: 20px;
  padding: 12px 20px; margin-bottom: 20px;
  box-shadow: 4px 4px 0 var(--dark);
}
.game-topbar .level-name { font-family: 'Fredoka One', cursive; font-size: 18px; color: var(--dark); }
.game-progress-wrap { flex: 1; margin: 0 16px; }
.game-progress-track {
  background: #e0e0e0; border-radius: 99px; height: 14px;
  border: 2px solid var(--dark); overflow: hidden;
}
.game-progress-fill {
  height: 100%; background: var(--grass); border-radius: 99px;
  transition: width .4s cubic-bezier(.34,1.56,.64,1);
}
.game-score {
  font-family: 'Fredoka One', cursive; font-size: 22px; color: var(--dark);
  display: flex; align-items: center; gap: 4px;
}
.game-score .star { color: var(--sun); -webkit-text-stroke: 1px var(--dark); }

/* ── QUESTION CARD ── */
.question-area { text-align: center; margin-bottom: 24px; }
.question-label {
  font-family: 'Fredoka One', cursive; font-size: 17px; color: #777; margin-bottom: 12px;
}

/* Mode A: huruf besar–kecil */
.letter-pair {
  display: flex; align-items: center; justify-content: center; gap: 20px; flex-wrap: wrap;
}
.big-letter {
  width: 130px; height: 130px; background: var(--sun); border: 4px solid var(--dark);
  border-radius: 28px; box-shadow: 6px 6px 0 var(--dark);
  display: flex; align-items: center; justify-content: center;
  font-family: 'Fredoka One', cursive; font-size: 80px; color: var(--dark);
  animation: pop-in .4s cubic-bezier(.34,1.56,.64,1);
}
.pair-arrow { font-size: 32px; color: var(--dark); font-weight: 800; }

/* Mode B: kata & huruf awal */
.word-display {
  background: white; border: 4px solid var(--dark); border-radius: 28px;
  padding: 20px 32px; display: inline-flex; align-items: center; gap: 16px;
  box-shadow: 6px 6px 0 var(--dark); animation: pop-in .4s cubic-bezier(.34,1.56,.64,1);
}
.word-emoji { font-size: 56px; }
.word-text { font-family: 'Fredoka One', cursive; font-size: 32px; color: var(--dark); }
.word-question { font-family: 'Fredoka One', cursive; font-size: 18px; color: #888; margin-top: 4px; }

/* Mode C: pasangkan */
.drag-area {
  display: grid; grid-template-columns: 1fr 1fr; gap: 20px; max-width: 500px; margin: 0 auto;
}
.drag-col { display: flex; flex-direction: column; gap: 10px; align-items: center; }
.drag-col-label { font-family: 'Fredoka One', cursive; font-size: 15px; color: #888; margin-bottom: 4px; }
.drag-item {
  background: white; border: 3px solid var(--dark); border-radius: 16px;
  padding: 14px 22px; font-family: 'Fredoka One', cursive; font-size: 26px;
  cursor: pointer; box-shadow: 4px 4px 0 var(--dark);
  transition: transform .15s, box-shadow .15s; min-width: 80px; text-align: center;
  user-select: none;
}
.drag-item:hover { transform: translate(-2px,-2px); box-shadow: 6px 6px 0 var(--dark); }
.drag-item.selected-left { background: #FFF9C4; border-color: var(--sun); box-shadow: 4px 4px 0 var(--sun); }
.drag-item.matched { background: #E8F5E9; border-color: var(--grass); box-shadow: 4px 4px 0 var(--grass); opacity:.7; }
.drag-item.wrong-flash { animation: shake .4s; background: #FFEBEE; border-color: var(--coral); }
@keyframes shake { 0%,100%{transform:translateX(0)} 25%{transform:translateX(-8px)} 75%{transform:translateX(8px)} }

/* ── ANSWER CHOICES ── */
.choices-grid {
  display: grid; grid-template-columns: repeat(2,1fr); gap: 12px; max-width: 500px; margin: 0 auto;
}
.choice-btn {
  background: white; border: 3px solid var(--dark); border-radius: 18px;
  padding: 18px 10px; font-family: 'Fredoka One', cursive; font-size: 36px;
  cursor: pointer; box-shadow: 4px 4px 0 var(--dark);
  transition: transform .15s, box-shadow .15s; text-align: center;
}
.choice-btn:hover { transform: translate(-2px,-2px); box-shadow: 6px 6px 0 var(--dark); }
.choice-btn.correct { background: #C8E6C9; border-color: var(--grass); box-shadow: 4px 4px 0 var(--grass); animation: bounce .4s; }
.choice-btn.wrong   { background: #FFCDD2; border-color: var(--coral); box-shadow: 4px 4px 0 var(--coral); animation: shake .4s; }
@keyframes bounce { 0%,100%{transform:scale(1)} 50%{transform:scale(1.12)} }
@keyframes pop-in { from{transform:scale(0.7);opacity:0} to{transform:scale(1);opacity:1} }

/* ── FEEDBACK ── */
.feedback-bubble {
  text-align: center; min-height: 44px; margin: 12px 0;
  font-family: 'Fredoka One', cursive; font-size: 20px;
  transition: opacity .2s;
}
.feedback-bubble.ok   { color: var(--grass); }
.feedback-bubble.err  { color: var(--coral); }

/* ── NEXT BTN ── */
.next-btn {
  display: block; width: 100%; max-width: 360px; margin: 8px auto 0;
  background: var(--coral); color: white; border: 3px solid var(--dark);
  border-radius: 18px; padding: 16px; font-family: 'Fredoka One', cursive;
  font-size: 22px; cursor: pointer; box-shadow: 5px 5px 0 var(--dark);
  transition: transform .1s, box-shadow .1s; text-align: center;
}
.next-btn:hover { transform: translate(-2px,-2px); box-shadow: 7px 7px 0 var(--dark); }
.next-btn:active { transform: translate(2px,2px); box-shadow: 3px 3px 0 var(--dark); }

/* ── FIREWORKS ── */
.firework-canvas { position: fixed; inset: 0; pointer-events: none; z-index: 999; }

/* ── RESULT SCREEN ── */
#result-screen {
  display: none; max-width: 520px; margin: 30px auto; padding: 20px;
  text-align: center;
}
.result-card {
  background: white; border: 4px solid var(--dark); border-radius: 28px;
  padding: 36px 24px; box-shadow: 8px 8px 0 var(--dark);
  animation: pop-in .5s cubic-bezier(.34,1.56,.64,1);
}
.result-title { font-family: 'Fredoka One', cursive; font-size: 34px; color: var(--dark); margin-bottom: 6px; }
.result-stars { font-size: 42px; margin: 12px 0; letter-spacing: 4px; }
.result-score { font-family: 'Fredoka One', cursive; font-size: 52px; color: var(--coral); margin-bottom: 6px; }
.result-msg { font-size: 18px; color: #777; font-weight: 700; margin-bottom: 24px; }
.result-btns { display: flex; gap: 12px; justify-content: center; flex-wrap: wrap; }
.rbtn {
  background: var(--sun); border: 3px solid var(--dark); border-radius: 16px;
  padding: 12px 24px; font-family: 'Fredoka One', cursive; font-size: 18px;
  cursor: pointer; box-shadow: 4px 4px 0 var(--dark); color: var(--dark);
  transition: transform .1s, box-shadow .1s;
}
.rbtn.blue { background: var(--sky); }
.rbtn:hover { transform: translate(-2px,-2px); box-shadow: 6px 6px 0 var(--dark); }

/* ── ANIMATE-IN STAGGER ── */
.level-card { animation: card-in .4s both; }
.level-card:nth-child(1) { animation-delay: .05s }
.level-card:nth-child(2) { animation-delay: .12s }
.level-card:nth-child(3) { animation-delay: .19s }
@keyframes card-in { from{transform:translateY(20px);opacity:0} to{transform:translateY(0);opacity:1} }

/* ── RESPONSIVE ── */
@media (max-width: 500px) {
  .choices-grid { grid-template-columns: repeat(2,1fr); }
  .big-letter { width: 100px; height: 100px; font-size: 64px; }
  .drag-area { gap: 12px; }
}
</style>
</head>
<body>

<canvas class="firework-canvas" id="fwCanvas"></canvas>

<div class="bg-scene">
  <div class="cloud c1"></div>
  <div class="cloud c2"></div>
  <div class="cloud c3"></div>
</div>
<div class="ground"></div>

<div class="page">

  <!-- HEADER -->
  <header class="header">
    <a class="navbar-brand" href="{{ route('home') }}" onclick="goHome()">
  <img src="{{ asset('assets/images/logo-tinythink.png') }}" alt="logo">
</a>
    <button class="back-btn" id="backBtn" onclick="goHome()">← Kembali</button>
    <div class="header-stars">
      <div class="star-badge">⭐ <span id="totalStars">0</span></div>
    </div>
  </header>

  <!-- HOME SCREEN -->
  <div id="home-screen">
    <div class="hero">
      <div class="hero-badge">🎓 Modul Literasi TK & PAUD</div>
      <h1>Pencocokkan <span class="highlight">Huruf</span> ✏️</h1>
      <p>Yuk belajar mengenali dan mencocokkan huruf dengan cara yang seru!</p>
    </div>

    <div class="level-section">
      <div class="section-label">🌟 Pilih Level Bermain</div>
      <div class="level-grid">
        <div class="level-card lc-green" onclick="startLevel('besar_kecil')">
          <div class="lc-tag">Pemula</div>
          <span class="lc-emoji">🔤</span>
          <div class="lc-title">Huruf Besar & Kecil</div>
          <div class="lc-desc">Cocokkan A dengan a, B dengan b...</div>
        </div>
        <div class="level-card lc-blue" onclick="startLevel('kata_huruf')">
          <div class="lc-tag">Menengah</div>
          <span class="lc-emoji">🍎</span>
          <div class="lc-title">Kata & Huruf Awal</div>
          <div class="lc-desc">Temukan huruf pertama dari sebuah kata</div>
        </div>
        <div class="level-card lc-coral" onclick="startLevel('pasangkan')">
          <div class="lc-tag">Lanjutan</div>
          <span class="lc-emoji">🧩</span>
          <div class="lc-title">Pasangkan Huruf</div>
          <div class="lc-desc">Hubungkan huruf besar dengan pasangannya</div>
        </div>
      </div>
    </div>
  </div>

  <!-- GAME SCREEN -->
  <div id="game-screen">
    <div class="game-topbar">
      <div class="level-name" id="levelName">Level</div>
      <div class="game-progress-wrap">
        <div class="game-progress-track">
          <div class="game-progress-fill" id="progressFill" style="width:0%"></div>
        </div>
      </div>
      <div class="game-score">
        <span class="star">⭐</span>
        <span id="liveScore">0</span>
      </div>
    </div>
    <div id="question-container"></div>
  </div>

  <!-- RESULT SCREEN -->
  <div id="result-screen">
    <div class="result-card">
      <div class="result-title" id="resultTitle">Selesai!</div>
      <div class="result-stars" id="resultStars">⭐⭐⭐</div>
      <div class="result-score" id="resultScore">10 / 10</div>
      <div class="result-msg" id="resultMsg">Luar biasa! Kamu bintang hari ini!</div>
      <div class="result-btns">
        <button class="rbtn" onclick="retryLevel()">🔄 Coba Lagi</button>
        <button class="rbtn blue" onclick="goHome()">🏠 Menu</button>
      </div>
    </div>
  </div>

</div>

<script>
/* ══════════════════════════════
   DATA
══════════════════════════════ */
const ALPHABET = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ'.split('');

const KATA_DATA = [
  { emoji:'🍎', kata:'APEL',    huruf:'A' },
  { emoji:'🦋', kata:'BUKU',    huruf:'B' },
  { emoji:'🐱', kata:'KUCING',  huruf:'K' },
  { emoji:'🌙', kata:'BULAN',   huruf:'B' },
  { emoji:'🐘', kata:'GAJAH',   huruf:'G' },
  { emoji:'🐟', kata:'IKAN',    huruf:'I' },
  { emoji:'🦁', kata:'SINGA',   huruf:'S' },
  { emoji:'🏠', kata:'RUMAH',   huruf:'R' },
  { emoji:'🌹', kata:'MAWAR',   huruf:'M' },
  { emoji:'🐢', kata:'KURA',    huruf:'K' },
  { emoji:'🍌', kata:'PISANG',  huruf:'P' },
  { emoji:'🦆', kata:'BEBEK',   huruf:'B' },
  { emoji:'🌻', kata:'BUNGA',   huruf:'B' },
  { emoji:'🐸', kata:'KATAK',   huruf:'K' },
  { emoji:'🦊', kata:'HARIMAU', huruf:'H' },
  { emoji:'🍊', kata:'JERUK',   huruf:'J' },
  { emoji:'✏️', kata:'PENSIL',  huruf:'P' },
  { emoji:'🐦', kata:'ELANG',   huruf:'E' },
  { emoji:'🌊', kata:'OMBAK',   huruf:'O' },
  { emoji:'🎒', kata:'TAS',     huruf:'T' },
];

/* ══════════════════════════════
   STATE
══════════════════════════════ */
let currentLevel = null;
let questions = [];
let qIndex = 0;
let score = 0;
let totalStars = parseInt(localStorage.getItem('tt_stars') || '0');

/* DOM */
const homeScreen   = document.getElementById('home-screen');
const gameScreen   = document.getElementById('game-screen');
const resultScreen = document.getElementById('result-screen');
const backBtn      = document.getElementById('backBtn');
const totalStarsEl = document.getElementById('totalStars');

totalStarsEl.textContent = totalStars;

/* ══════════════════════════════
   LEVEL START
══════════════════════════════ */
function startLevel(level) {
  currentLevel = level;
  qIndex = 0; score = 0;
  questions = buildQuestions(level);

  homeScreen.style.display = 'none';
  resultScreen.style.display = 'none';
  gameScreen.style.display = 'block';
  backBtn.style.display = 'block';

  document.getElementById('levelName').textContent = levelLabel(level);
  document.getElementById('liveScore').textContent = '0';
  updateProgress();
  renderQuestion();
}

function levelLabel(l) {
  if (l === 'besar_kecil') return '🔤 Huruf Besar & Kecil';
  if (l === 'kata_huruf')  return '🍎 Kata & Huruf Awal';
  return '🧩 Pasangkan Huruf';
}

/* ══════════════════════════════
   BUILD QUESTIONS
══════════════════════════════ */
function shuffle(a) { return a.slice().sort(() => Math.random() - .5); }
function pick(a, n) { return shuffle(a).slice(0, n); }
function rand(a) { return a[Math.floor(Math.random() * a.length)]; }

function buildQuestions(level) {
  if (level === 'besar_kecil') {
    return pick(ALPHABET, 10).map(letter => {
      const distractors = shuffle(ALPHABET.filter(l => l !== letter)).slice(0, 3);
      const choices = shuffle([letter, ...distractors]);
      return { type: 'besar_kecil', letter, choices };
    });
  }
  if (level === 'kata_huruf') {
    return pick(KATA_DATA, 10).map(item => {
      const distractors = shuffle(ALPHABET.filter(l => l !== item.huruf)).slice(0, 3);
      const choices = shuffle([item.huruf, ...distractors]);
      return { type: 'kata_huruf', ...item, choices };
    });
  }
  if (level === 'pasangkan') {
    // Build 5 pairs per round
    const letters = pick(ALPHABET, 5);
    return [{ type: 'pasangkan', letters }]; // single multi-pair question
  }
}

/* ══════════════════════════════
   RENDER QUESTION
══════════════════════════════ */
function renderQuestion() {
  const container = document.getElementById('question-container');
  const q = questions[qIndex];

  if (!q) { showResult(); return; }

  if (q.type === 'besar_kecil') renderBesarKecil(q, container);
  else if (q.type === 'kata_huruf') renderKataHuruf(q, container);
  else if (q.type === 'pasangkan') renderPasangkan(q, container);
}

/* ── A: Besar–Kecil ── */
function renderBesarKecil(q, container) {
  container.innerHTML = `
    <div class="question-area">
      <div class="question-label">Huruf kecil mana yang cocok? 🤔</div>
      <div class="letter-pair">
        <div class="big-letter">${q.letter}</div>
        <div class="pair-arrow">→</div>
        <div class="big-letter" style="background:#E3F2FD; font-size:68px">?</div>
      </div>
    </div>
    <div class="choices-grid">
      ${q.choices.map(c => `
        <button class="choice-btn" onclick="answerBC(this,'${c}','${q.letter}')">${c.toLowerCase()}</button>
      `).join('')}
    </div>
    <div class="feedback-bubble" id="fb"></div>
    <button class="next-btn" id="nextBtn" style="display:none" onclick="nextQ()">Lanjut ➜</button>
  `;
}

function answerBC(btn, chosen, correct) {
  if (btn.closest('.choices-grid').querySelector('.correct, .wrong')) return;
  const isOk = chosen === correct;
  btn.classList.add(isOk ? 'correct' : 'wrong');
  if (!isOk) {
    document.querySelectorAll('.choice-btn').forEach(b => {
      if (b.textContent === correct.toLowerCase()) b.classList.add('correct');
    });
  }
  onAnswer(isOk);
}

/* ── B: Kata–Huruf ── */
function renderKataHuruf(q, container) {
  container.innerHTML = `
    <div class="question-area">
      <div class="question-label">Huruf pertama dari kata ini adalah... 🔍</div>
      <div class="word-display">
        <span class="word-emoji">${q.emoji}</span>
        <div>
          <div class="word-text">${q.kata}</div>
          <div class="word-question">Huruf awalnya apa ya?</div>
        </div>
      </div>
    </div>
    <div class="choices-grid">
      ${q.choices.map(c => `
        <button class="choice-btn" onclick="answerKH(this,'${c}','${q.huruf}')">${c}</button>
      `).join('')}
    </div>
    <div class="feedback-bubble" id="fb"></div>
    <button class="next-btn" id="nextBtn" style="display:none" onclick="nextQ()">Lanjut ➜</button>
  `;
}

function answerKH(btn, chosen, correct) {
  if (btn.closest('.choices-grid').querySelector('.correct, .wrong')) return;
  const isOk = chosen === correct;
  btn.classList.add(isOk ? 'correct' : 'wrong');
  if (!isOk) {
    document.querySelectorAll('.choice-btn').forEach(b => {
      if (b.textContent === correct) b.classList.add('correct');
    });
  }
  onAnswer(isOk);
}

/* ── C: Pasangkan ── */
let pairing = { selected: null, matched: {}, letters: [] };

function renderPasangkan(q, container) {
  pairing = { selected: null, matched: {}, letters: q.letters, correct: 0 };
  const shuffledSmall = shuffle(q.letters);

  container.innerHTML = `
    <div class="question-area">
      <div class="question-label">Pasangkan huruf besar dengan huruf kecilnya! 🧩</div>
    </div>
    <div class="drag-area">
      <div class="drag-col">
        <div class="drag-col-label">HURUF BESAR</div>
        ${q.letters.map(l => `
          <div class="drag-item" id="big-${l}" onclick="pairSelect('big','${l}')">${l}</div>
        `).join('')}
      </div>
      <div class="drag-col">
        <div class="drag-col-label">huruf kecil</div>
        ${shuffledSmall.map(l => `
          <div class="drag-item" id="small-${l}" onclick="pairSelect('small','${l}')">${l.toLowerCase()}</div>
        `).join('')}
      </div>
    </div>
    <div class="feedback-bubble" id="fb"></div>
    <button class="next-btn" id="nextBtn" style="display:none" onclick="nextQ()">Lanjut ➜</button>
  `;
}

function pairSelect(side, letter) {
  if (pairing.matched[letter]) return;
  const id = side + '-' + letter;
  const el = document.getElementById(id);
  if (el.classList.contains('matched')) return;

  if (!pairing.selected) {
    // first pick
    if (pairing.prevEl) pairing.prevEl.classList.remove('selected-left');
    pairing.selected = { side, letter };
    el.classList.add('selected-left');
    pairing.prevEl = el;
  } else {
    // second pick
    const prev = pairing.selected;
    if (prev.side === side) {
      // same side – switch selection
      if (pairing.prevEl) pairing.prevEl.classList.remove('selected-left');
      pairing.selected = { side, letter };
      el.classList.add('selected-left');
      pairing.prevEl = el;
      return;
    }
    // check match
    const bigL  = prev.side === 'big'   ? prev.letter : letter;
    const smL   = prev.side === 'small' ? prev.letter : letter;
    const isOk = bigL === smL;

    const bigEl  = document.getElementById('big-'   + bigL);
    const smEl   = document.getElementById('small-' + smL);

    if (pairing.prevEl) pairing.prevEl.classList.remove('selected-left');
    pairing.selected = null; pairing.prevEl = null;

    if (isOk) {
      bigEl.classList.add('matched'); smEl.classList.add('matched');
      pairing.matched[bigL] = true;
      pairing.correct++;
      setFb('Benar! 🎉', 'ok');
      if (pairing.correct === pairing.letters.length) {
        score += pairing.correct;
        document.getElementById('liveScore').textContent = score;
        setTimeout(() => { qIndex++; updateProgress(); showResult(); }, 600);
      }
    } else {
      bigEl.classList.add('wrong-flash'); smEl.classList.add('wrong-flash');
      setTimeout(() => { bigEl.classList.remove('wrong-flash'); smEl.classList.remove('wrong-flash'); }, 400);
      setFb('Belum tepat, coba lagi! 💪', 'err');
    }
  }
}

/* ══════════════════════════════
   SHARED
══════════════════════════════ */
function onAnswer(isOk) {
  if (isOk) {
    score++;
    document.getElementById('liveScore').textContent = score;
    setFb('Hebat! Kamu benar! 🎉', 'ok');
    if (score % 3 === 0) launchFireworks();
  } else {
    setFb('Belum tepat, coba lagi ya! 💪', 'err');
  }
  document.getElementById('nextBtn').style.display = 'block';
}

function setFb(msg, type) {
  const fb = document.getElementById('fb');
  if (!fb) return;
  fb.textContent = msg;
  fb.className = 'feedback-bubble ' + type;
}

function nextQ() {
  qIndex++;
  updateProgress();
  renderQuestion();
}

function updateProgress() {
  const total = questions.length;
  const pct = Math.round((qIndex / total) * 100);
  document.getElementById('progressFill').style.width = pct + '%';
}

/* ══════════════════════════════
   RESULT
══════════════════════════════ */
function showResult() {
  gameScreen.style.display = 'none';
  resultScreen.style.display = 'block';

  const total = currentLevel === 'pasangkan' ? 5 : questions.length;
  const pct = score / total;

  let stars = '⭐';
  let title = 'Terus Semangat!';
  let msg = 'Kamu pasti bisa lebih baik lagi!';
  if (pct >= 0.9) { stars = '⭐⭐⭐'; title = 'Luar Biasa! 🏆'; msg = 'Kamu adalah bintang hari ini!'; }
  else if (pct >= 0.6) { stars = '⭐⭐'; title = 'Bagus Sekali! 😊'; msg = 'Hampir sempurna! Coba lagi ya!'; }

  document.getElementById('resultTitle').textContent = title;
  document.getElementById('resultStars').textContent = stars;
  document.getElementById('resultScore').textContent = score + ' / ' + total;
  document.getElementById('resultMsg').textContent = msg;

  const earned = stars.split('⭐').length - 1;
  totalStars += earned;
  localStorage.setItem('tt_stars', totalStars);
  totalStarsEl.textContent = totalStars;

  if (pct >= 0.9) launchFireworks();
}

function retryLevel() {
  resultScreen.style.display = 'none';
  startLevel(currentLevel);
}

function goHome() {
  homeScreen.style.display = 'block';
  gameScreen.style.display = 'none';
  resultScreen.style.display = 'none';
  backBtn.style.display = 'none';
}

/* ══════════════════════════════
   FIREWORKS
══════════════════════════════ */
const fwCanvas = document.getElementById('fwCanvas');
const fwCtx    = fwCanvas.getContext('2d');
let fwParticles = [];

function resizeFW() {
  fwCanvas.width  = window.innerWidth;
  fwCanvas.height = window.innerHeight;
}
resizeFW();
window.addEventListener('resize', resizeFW);

function launchFireworks() {
  for (let i = 0; i < 5; i++) {
    setTimeout(() => burst(
      Math.random() * fwCanvas.width * 0.6 + fwCanvas.width * 0.2,
      Math.random() * fwCanvas.height * 0.5 + 60
    ), i * 180);
  }
}

function burst(x, y) {
  const colors = ['#FFD43B','#FF7043','#6EC6F5','#5BC85B','#B39DDB','#FF80AB'];
  for (let i = 0; i < 28; i++) {
    const angle = (Math.PI * 2 * i) / 28;
    const speed = 3 + Math.random() * 4;
    fwParticles.push({
      x, y,
      vx: Math.cos(angle) * speed,
      vy: Math.sin(angle) * speed - 1,
      color: colors[Math.floor(Math.random() * colors.length)],
      life: 1, size: 5 + Math.random() * 5
    });
  }
}

(function animateFW() {
  requestAnimationFrame(animateFW);
  if (!fwParticles.length) return;
  fwCtx.clearRect(0, 0, fwCanvas.width, fwCanvas.height);
  fwParticles = fwParticles.filter(p => p.life > 0);
  fwParticles.forEach(p => {
    p.x += p.vx; p.y += p.vy; p.vy += 0.12; p.vx *= 0.97;
    p.life -= 0.025;
    fwCtx.globalAlpha = p.life;
    fwCtx.fillStyle = p.color;
    fwCtx.beginPath();
    fwCtx.arc(p.x, p.y, p.size * p.life, 0, Math.PI * 2);
    fwCtx.fill();
  });
  fwCtx.globalAlpha = 1;
})();
</script>
</body>
</html>
