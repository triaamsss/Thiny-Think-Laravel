<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Ayo Belajar Abjad! – TinyThink</title>
<link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@400;600;700;800&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet">
<style>
:root {
  --bg:#FFF8EE; --dark:#2B2340; --radius:28px; --card-shadow:5px 5px 0px;
}
*{box-sizing:border-box;margin:0;padding:0;}
body{font-family:'Nunito',sans-serif;background:var(--bg);min-height:100vh;overflow-x:hidden;}

/* BG */
.bg-bubbles{position:fixed;inset:0;z-index:0;overflow:hidden;pointer-events:none;}
.bubble{position:absolute;border-radius:50%;opacity:.1;animation:floatUp linear infinite;}
@keyframes floatUp{0%{transform:translateY(110vh) scale(.8) rotate(0);opacity:0;}10%{opacity:.12;}90%{opacity:.12;}100%{transform:translateY(-15vh) scale(1.1) rotate(360deg);opacity:0;}}

/* HEADER */
.header{position:relative;z-index:10;background:white;border-bottom:4px solid var(--dark);padding:14px 28px;display:flex;align-items:center;justify-content:space-between;box-shadow:0 4px 0 rgba(0,0,0,.07);}

.header-right{display:flex;align-items:center;gap:12px;}
.progress-pill{background:#A8E063;border:2px solid var(--dark);border-radius:99px;padding:6px 16px;font-family:'Baloo 2',cursive;font-size:15px;color:var(--dark);font-weight:700;box-shadow:2px 2px 0 var(--dark);}
.reset-btn{background:#FFE0E0;border:2px solid var(--dark);border-radius:99px;padding:6px 14px;font-family:'Baloo 2',cursive;font-size:13px;cursor:pointer;color:var(--dark);font-weight:700;box-shadow:2px 2px 0 var(--dark);}
.reset-btn:hover{background:#FFCDD2;}

/* HERO */
.hero{position:relative;z-index:5;text-align:center;padding:36px 20px 20px;}
.hero-title{font-family:'Baloo 2',cursive;font-size:clamp(34px,7vw,58px);font-weight:800;color:var(--dark);line-height:1.1;margin-bottom:10px;}
.wl{display:inline-block;animation:wave 2.4s ease-in-out infinite;}
@keyframes wave{0%,100%{transform:translateY(0)}50%{transform:translateY(-9px)}}
.hero-sub{font-size:18px;color:#888;font-weight:700;max-width:460px;margin:0 auto;}

/* GRID */
.alphabet-section{position:relative;z-index:5;max-width:900px;margin:0 auto;padding:10px 20px 30px;}
.alphabet-grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(100px,1fr));gap:14px;}

/* CARD */
.letter-card{aspect-ratio:1;border-radius:var(--radius);border:3px solid var(--dark);cursor:pointer;display:flex;flex-direction:column;align-items:center;justify-content:center;position:relative;overflow:hidden;transition:transform .18s cubic-bezier(.34,1.56,.64,1),box-shadow .18s;animation:cardIn .4s both cubic-bezier(.34,1.56,.64,1);user-select:none;}
.letter-card:hover{transform:translateY(-6px) rotate(-1deg) scale(1.05);}
.letter-card:active{transform:translateY(2px) scale(.96);}
.letter-card.playing{animation:pulseCard .5s cubic-bezier(.34,1.56,.64,1);}
@keyframes pulseCard{0%{transform:scale(1)}40%{transform:scale(1.15) rotate(3deg)}70%{transform:scale(.95) rotate(-2deg)}100%{transform:scale(1)}}
@keyframes cardIn{from{transform:scale(.5) rotate(-10deg);opacity:0}to{transform:scale(1) rotate(0);opacity:1}}
.card-big{font-family:'Baloo 2',cursive;font-size:38px;font-weight:800;color:var(--dark);line-height:1;}
.card-small{font-family:'Baloo 2',cursive;font-size:22px;font-weight:700;color:var(--dark);opacity:.7;}
.card-emoji{font-size:18px;margin-top:2px;display:none;}
.explore-mode .card-emoji{display:block;}
.explore-mode .card-big{font-size:30px;}
.explore-mode .card-small{font-size:18px;}
.card-check{position:absolute;top:6px;right:6px;width:22px;height:22px;border-radius:50%;background:white;border:2px solid var(--dark);display:flex;align-items:center;justify-content:center;font-size:12px;opacity:0;transition:opacity .3s;}
.letter-card.done .card-check{opacity:1;}
.ripple{position:absolute;border-radius:50%;width:10px;height:10px;background:rgba(255,255,255,.6);transform:scale(0);pointer-events:none;animation:rippleOut .6s ease-out forwards;}
@keyframes rippleOut{to{transform:scale(14);opacity:0;}}

/* MODE TOGGLE */
.mode-toggle{display:flex;background:#F0E6FF;border:2px solid var(--dark);border-radius:99px;overflow:hidden;box-shadow:2px 2px 0 var(--dark);}
.mode-btn{padding:7px 16px;border:none;background:transparent;font-family:'Baloo 2',cursive;font-size:14px;cursor:pointer;color:var(--dark);font-weight:700;transition:background .2s;}
.mode-btn.active{background:#BB6BD9;color:white;border-radius:99px;}

/* DETAIL PANEL */
.detail-panel{position:fixed;inset:0;z-index:100;display:flex;align-items:center;justify-content:center;background:rgba(43,35,64,.55);opacity:0;pointer-events:none;transition:opacity .25s;}
.detail-panel.open{opacity:1;pointer-events:all;}
.detail-card{width:min(440px,92vw);background:white;border:4px solid var(--dark);border-radius:36px;padding:32px 28px 28px;text-align:center;box-shadow:10px 10px 0 var(--dark);transform:scale(.8) translateY(30px);transition:transform .35s cubic-bezier(.34,1.56,.64,1);position:relative;}
.detail-panel.open .detail-card{transform:scale(1) translateY(0);}
.detail-close{position:absolute;top:16px;right:16px;width:36px;height:36px;border-radius:50%;background:#FFE0E0;border:2px solid var(--dark);font-size:18px;cursor:pointer;display:flex;align-items:center;justify-content:center;box-shadow:2px 2px 0 var(--dark);color:var(--dark);transition:transform .15s;}
.detail-close:hover{transform:scale(1.1) rotate(10deg);}
.detail-letter-box{width:130px;height:130px;border-radius:30px;border:4px solid var(--dark);margin:0 auto 20px;display:flex;flex-direction:column;align-items:center;justify-content:center;box-shadow:6px 6px 0 var(--dark);animation:popIn .4s cubic-bezier(.34,1.56,.64,1);}
@keyframes popIn{from{transform:scale(.6);opacity:0}to{transform:scale(1);opacity:1}}
.detail-letter-big{font-family:'Baloo 2',cursive;font-size:64px;font-weight:800;color:var(--dark);line-height:1;}
.detail-letter-small{font-family:'Baloo 2',cursive;font-size:36px;font-weight:700;color:var(--dark);opacity:.7;}
.detail-emoji{font-size:60px;margin-bottom:8px;display:block;animation:bounceIn .5s .1s both;}
@keyframes bounceIn{from{transform:scale(0) rotate(-20deg);opacity:0}to{transform:scale(1) rotate(0);opacity:1}}
.detail-word{font-family:'Baloo 2',cursive;font-size:28px;font-weight:800;color:var(--dark);margin-bottom:4px;}
.detail-word em{font-style:normal;text-decoration:underline 3px;text-underline-offset:3px;}
.detail-desc{font-size:15px;color:#999;font-weight:700;margin-bottom:20px;}
.detail-actions{display:flex;gap:10px;justify-content:center;flex-wrap:wrap;}
.d-btn{padding:12px 20px;border-radius:16px;border:3px solid var(--dark);font-family:'Baloo 2',cursive;font-size:16px;font-weight:700;cursor:pointer;box-shadow:4px 4px 0 var(--dark);transition:transform .12s,box-shadow .12s;display:flex;align-items:center;gap:8px;}
.d-btn:hover{transform:translate(-2px,-2px);box-shadow:6px 6px 0 var(--dark);}
.d-btn:active{transform:translate(2px,2px);box-shadow:2px 2px 0 var(--dark);}
.play-btn{background:#56CCF2;color:var(--dark);}
.play-btn.speaking{background:#2D9CDB;color:white;}
.prev-btn{background:#FFE0A0;color:var(--dark);}
.next-btn{background:#A8E063;color:var(--dark);}
.detail-progress-row{display:flex;justify-content:center;margin-top:14px;}
.detail-prog-text{font-family:'Baloo 2',cursive;font-size:15px;color:#bbb;}

/* SOUND WAVE */
.swave{display:none;align-items:center;gap:3px;height:20px;}
.swave span{display:block;width:4px;background:white;border-radius:2px;animation:sbar .6s ease-in-out infinite alternate;}
.swave span:nth-child(1){height:6px;animation-delay:0s;}
.swave span:nth-child(2){height:14px;animation-delay:.1s;}
.swave span:nth-child(3){height:20px;animation-delay:.2s;}
.swave span:nth-child(4){height:12px;animation-delay:.3s;}
.swave span:nth-child(5){height:8px;animation-delay:.4s;}
@keyframes sbar{to{transform:scaleY(.3);}}
.play-btn.speaking .swave{display:flex;}
.play-btn.speaking .play-icon{display:none;}

/* BOTTOM BAR */
.bottom-bar{position:relative;z-index:5;max-width:900px;margin:0 auto 40px;padding:0 20px;}
.progress-track{background:white;border:3px solid var(--dark);border-radius:99px;height:22px;overflow:hidden;box-shadow:3px 3px 0 var(--dark);}
.progress-fill{height:100%;border-radius:99px;background:linear-gradient(90deg,#A8E063,#56CCF2);transition:width .5s cubic-bezier(.34,1.56,.64,1);display:flex;align-items:center;justify-content:flex-end;padding-right:8px;}
.prog-stars{font-size:11px;color:white;font-weight:800;white-space:nowrap;}
.progress-label{text-align:center;margin-top:8px;font-family:'Baloo 2',cursive;font-size:15px;color:#aaa;}

/* CONFETTI */
.cf-canvas{position:fixed;inset:0;pointer-events:none;z-index:200;}

/* MOBILE */
@media(max-width:500px){
  .alphabet-grid{grid-template-columns:repeat(5,1fr);gap:8px;}
  .mode-toggle{display:none;}
  .card-big{font-size:26px;}
  .card-small{font-size:16px;}
  .header{padding:10px 14px;}
}
</style>
</head>
<body>

<canvas class="cf-canvas" id="cfCanvas"></canvas>
<div class="bg-bubbles" id="bgBubbles"></div>

<header class="header">
  <a class="navbar-brand" href="{{ route('home') }}" style="text-decoration: none; display: flex; align-items: center; gap: 10px;">
    <img src="{{ asset('assets/images/logo-tinythink.png') }}" alt="logo" style="max-height: 40px; width: auto;">
    <span class="logo-text" style="font-size: 18px; opacity: 0.6; margin-left: 5px;"></span>
</a>
  <div class="header-right">
    <div class="progress-pill">🌟 <span id="doneCount">0</span> / 26</div>
    <div class="mode-toggle">
      <button class="mode-btn active" onclick="setMode('grid')">Grid</button>
      <button class="mode-btn" onclick="setMode('explore')">Jelajah</button>
    </div>
    <button class="reset-btn" onclick="resetProgress()">↺ Reset</button>
  </div>
</header>

<div class="hero">
  <h1 class="hero-title" id="heroTitle"></h1>
  <p class="hero-sub">Ketuk huruf untuk mendengar bunyinya dalam Bahasa Indonesia! 🔊</p>
</div>

<div class="alphabet-section">
  <div class="alphabet-grid" id="alphaGrid"></div>
</div>

<div class="bottom-bar">
  <div class="progress-track">
    <div class="progress-fill" id="progressFill" style="width:0%">
      <span class="prog-stars" id="progStars"></span>
    </div>
  </div>
  <div class="progress-label" id="progressLabel">Ketuk huruf untuk memulai belajar!</div>
</div>

<!-- DETAIL -->
<div class="detail-panel" id="detailPanel" onclick="panelClick(event)">
  <div class="detail-card">
    <button class="detail-close" onclick="closeDetail()">✕</button>
    <div class="detail-letter-box" id="dlBox">
      <div class="detail-letter-big" id="dlBig">A</div>
      <div class="detail-letter-small" id="dlSmall">a</div>
    </div>
    <span class="detail-emoji" id="dlEmoji">🍎</span>
    <div class="detail-word" id="dlWord"></div>
    <div class="detail-desc" id="dlDesc"></div>
    <div class="detail-actions">
      <button class="d-btn prev-btn" onclick="navDetail(-1)">◀ Sebelum</button>
      <button class="d-btn play-btn" id="playBtn" onclick="speakCurrent()">
        <div class="swave"><span></span><span></span><span></span><span></span><span></span></div>
        <span class="play-icon">🔊 Dengarkan</span>
      </button>
      <button class="d-btn next-btn" onclick="navDetail(1)">Berikut ▶</button>
    </div>
    <div class="detail-progress-row">
      <span class="detail-prog-text" id="dlProg">1 / 26</span>
    </div>
  </div>
</div>

<script>
const LETTERS=[
  {l:'A',emoji:'🍎',kata:'Apel',   desc:'"A seperti Apel!"',      say:'Huruf A. A seperti Apel.'},
  {l:'B',emoji:'📖',kata:'Buku',   desc:'"B seperti Buku!"',       say:'Huruf B. B seperti Buku.'},
  {l:'C',emoji:'🦎',kata:'Cicak',  desc:'"C seperti Cicak!"',      say:'Huruf C. C seperti Cicak.'},
  {l:'D',emoji:'🐑',kata:'Domba',  desc:'"D seperti Domba!"',      say:'Huruf D. D seperti Domba.'},
  {l:'E',emoji:'🦅',kata:'Elang',  desc:'"E seperti Elang!"',      say:'Huruf E. E seperti Elang.'},
  {l:'F',emoji:'🦩',kata:'Flamingo',desc:'"F seperti Flamingo!"',  say:'Huruf F. F seperti Flamingo.'},
  {l:'G',emoji:'🐘',kata:'Gajah',  desc:'"G seperti Gajah!"',      say:'Huruf G. G seperti Gajah.'},
  {l:'H',emoji:'🐯',kata:'Harimau',desc:'"H seperti Harimau!"',    say:'Huruf H. H seperti Harimau.'},
  {l:'I',emoji:'🐟',kata:'Ikan',   desc:'"I seperti Ikan!"',       say:'Huruf I. I seperti Ikan.'},
  {l:'J',emoji:'🦒',kata:'Jerapah',desc:'"J seperti Jerapah!"',    say:'Huruf J. J seperti Jerapah.'},
  {l:'K',emoji:'🐇',kata:'Kelinci',desc:'"K seperti Kelinci!"',    say:'Huruf K. K seperti Kelinci.'},
  {l:'L',emoji:'🌊',kata:'Laut',   desc:'"L seperti Laut!"',       say:'Huruf L. L seperti Laut.'},
  {l:'M',emoji:'🌙',kata:'Matahari',desc:'"M seperti Matahari!"',  say:'Huruf M. M seperti Matahari.'},
  {l:'N',emoji:'🍍',kata:'Nanas',  desc:'"N seperti Nanas!"',      say:'Huruf N. N seperti Nanas.'},
  {l:'O',emoji:'🦧',kata:'Orang-utan',desc:'"O seperti Orang-utan!"',say:'Huruf O. O seperti Orang utan.'},
  {l:'P',emoji:'🌴',kata:'Pohon',  desc:'"P seperti Pohon!"',      say:'Huruf P. P seperti Pohon.'},
  {l:'Q',emoji:'❓',kata:'Qatar',  desc:'"Q seperti Qatar!"',      say:'Huruf Q. Q seperti Qatar.'},
  {l:'R',emoji:'🏠',kata:'Rumah',  desc:'"R seperti Rumah!"',      say:'Huruf R. R seperti Rumah.'},
  {l:'S',emoji:'🦁',kata:'Singa',  desc:'"S seperti Singa!"',      say:'Huruf S. S seperti Singa.'},
  {l:'T',emoji:'🐭',kata:'Tikus',  desc:'"T seperti Tikus!"',      say:'Huruf T. T seperti Tikus.'},
  {l:'U',emoji:'🐛',kata:'Ulat',   desc:'"U seperti Ulat!"',       say:'Huruf U. U seperti Ulat.'},
  {l:'V',emoji:'🎻',kata:'Violin', desc:'"V seperti Violin!"',     say:'Huruf V. V seperti Violin.'},
  {l:'W',emoji:'🎨',kata:'Warna',  desc:'"W seperti Warna!"',      say:'Huruf W. W seperti Warna.'},
  {l:'X',emoji:'🎸',kata:'Xilofon',desc:'"X seperti Xilofon!"',    say:'Huruf X. X seperti Xilofon.'},
  {l:'Y',emoji:'🦁',kata:'Yak',   desc:'"Y seperti Yak!"',        say:'Huruf Y. Y seperti Yak.'},
  {l:'Z',emoji:'🦓',kata:'Zebra',  desc:'"Z seperti Zebra!"',      say:'Huruf Z. Z seperti Zebra.'},
];

const COLORS=['#FFD43B','#FF6B6B','#A8E063','#56CCF2','#FF8E53','#BB6BD9',
               '#FFD43B','#FF6B6B','#A8E063','#56CCF2','#FF8E53','#BB6BD9',
               '#FFD43B','#FF6B6B','#A8E063','#56CCF2','#FF8E53','#BB6BD9',
               '#FFD43B','#FF6B6B','#A8E063','#56CCF2','#FF8E53','#BB6BD9',
               '#FFD43B','#FF6B6B'];

let doneSet=new Set(JSON.parse(localStorage.getItem('tt_az_done')||'[]'));
let curIdx=0, isSpeaking=false, currentMode='grid';

/* ── HERO TITLE ── */
(function buildHero(){
  const words=['Ayo','Belajar','ABC!'];
  const colors=['#FF6B6B','#56CCF2','#FFC300'];
  const delays=[0,.05,.1,.15,.2,.25,.3,.35,.4,.45,.5,.55,.6,.65];
  let html=''; let di=0;
  words.forEach((word,wi)=>{
    word.split('').forEach(ch=>{
      html+=`<span class="wl" style="animation-delay:${delays[di]||0}s;color:${di<3?colors[0]:di<10?colors[1]:colors[2]}">${ch}</span>`;
      di++;
    });
    if(wi<words.length-1) html+=' ';
  });
  document.getElementById('heroTitle').innerHTML=html;
})();

/* ── BG BUBBLES ── */
(function buildBubbles(){
  const wrap=document.getElementById('bgBubbles');
  COLORS.slice(0,14).forEach((c,i)=>{
    const b=document.createElement('div');
    b.className='bubble';
    const sz=40+Math.random()*80;
    b.style.cssText=`width:${sz}px;height:${sz}px;background:${c};left:${Math.random()*100}%;animation-duration:${12+Math.random()*16}s;animation-delay:${-Math.random()*20}s;`;
    wrap.appendChild(b);
  });
})();

/* ── GRID ── */
function buildGrid(){
  const grid=document.getElementById('alphaGrid');
  grid.innerHTML='';
  LETTERS.forEach((item,i)=>{
    const card=document.createElement('div');
    card.className='letter-card'+(doneSet.has(item.l)?' done':'');
    card.id='card-'+item.l;
    card.style.cssText=`background:${COLORS[i]};box-shadow:var(--card-shadow) ${dk(COLORS[i])};animation-delay:${i*.03}s;`;
    card.innerHTML=`
      <span class="card-big">${item.l}</span>
      <span class="card-small">${item.l.toLowerCase()}</span>
      <span class="card-emoji">${item.emoji}</span>
      <div class="card-check">✓</div>`;
    card.addEventListener('click',e=>{addRipple(card,e);openDetail(i);});
    grid.appendChild(card);
  });
}

function dk(hex){
  const n=parseInt(hex.slice(1),16);
  return `rgb(${Math.max(0,(n>>16)-45)},${Math.max(0,((n>>8)&255)-45)},${Math.max(0,(n&255)-45)})`;
}

function addRipple(card,e){
  const r=document.createElement('div');
  r.className='ripple';
  const rect=card.getBoundingClientRect();
  r.style.left=(e.clientX-rect.left-5)+'px';
  r.style.top=(e.clientY-rect.top-5)+'px';
  card.appendChild(r);
  r.addEventListener('animationend',()=>r.remove());
}

/* ── MODE ── */
function setMode(mode){
  currentMode=mode;
  document.querySelectorAll('.mode-btn').forEach((b,i)=>b.classList.toggle('active',i===(mode==='grid'?0:1)));
  document.getElementById('alphaGrid').classList.toggle('explore-mode',mode==='explore');
}

/* ── DETAIL ── */
function openDetail(idx){
  curIdx=idx;
  renderDetail();
  document.getElementById('detailPanel').classList.add('open');
  setTimeout(()=>speakCurrent(),350);
}

function renderDetail(){
  const item=LETTERS[curIdx];
  const color=COLORS[curIdx];
  const box=document.getElementById('dlBox');
  box.style.background=color;
  box.style.boxShadow=`6px 6px 0 ${dk(color)}`;
  box.style.animation='none'; box.offsetWidth; box.style.animation='';
  document.getElementById('dlBig').textContent=item.l;
  document.getElementById('dlSmall').textContent=item.l.toLowerCase();
  document.getElementById('dlEmoji').textContent=item.emoji;
  const w=item.kata;
  document.getElementById('dlWord').innerHTML=`<em>${w[0]}</em>${w.slice(1)}`;
  document.getElementById('dlDesc').textContent=item.desc;
  document.getElementById('dlProg').textContent=`${curIdx+1} / 26`;
}

function panelClick(e){if(e.target===document.getElementById('detailPanel'))closeDetail();}
function closeDetail(){speechSynthesis.cancel();document.getElementById('detailPanel').classList.remove('open');setSpeakUI(false);}

function navDetail(d){
  speechSynthesis.cancel(); setSpeakUI(false);
  curIdx=(curIdx+d+26)%26;
  renderDetail();
  setTimeout(()=>speakCurrent(),280);
}

/* ── SPEECH ── */
function speakCurrent(){
  if(isSpeaking){speechSynthesis.cancel();setSpeakUI(false);return;}
  const item=LETTERS[curIdx];
  speechSynthesis.cancel();
  const u=new SpeechSynthesisUtterance(item.say);
  u.lang='id-ID'; u.rate=0.8; u.pitch=1.1;
  const voices=speechSynthesis.getVoices();
  const v=voices.find(v=>v.lang.startsWith('id'))||voices.find(v=>v.lang.startsWith('ms'))||null;
  if(v) u.voice=v;
  u.onstart=()=>setSpeakUI(true);
  u.onend=()=>{
    setSpeakUI(false);
    markDone(item.l);
    const c=document.getElementById('card-'+item.l);
    if(c){c.classList.add('playing');setTimeout(()=>c.classList.remove('playing'),500);}
  };
  u.onerror=()=>setSpeakUI(false);
  speechSynthesis.speak(u);
}

function setSpeakUI(on){
  isSpeaking=on;
  document.getElementById('playBtn').classList.toggle('speaking',on);
}

/* ── PROGRESS ── */
function markDone(l){
  doneSet.add(l);
  localStorage.setItem('tt_az_done',JSON.stringify([...doneSet]));
  const c=document.getElementById('card-'+l);
  if(c) c.classList.add('done');
  updateBar();
  if(doneSet.size===26) setTimeout(celebrate,500);
}

function updateBar(){
  const n=doneSet.size;
  const pct=Math.round(n/26*100);
  document.getElementById('progressFill').style.width=pct+'%';
  document.getElementById('doneCount').textContent=n;
  document.getElementById('progStars').textContent=n>0?'⭐'.repeat(Math.min(Math.ceil(n/5),5)):'';
  const lbl=document.getElementById('progressLabel');
  if(n===0) lbl.textContent='Ketuk huruf untuk memulai belajar!';
  else if(n<13) lbl.textContent=`Bagus! Sudah belajar ${n} huruf. Terus semangat! 💪`;
  else if(n<26) lbl.textContent=`Hampir selesai! ${26-n} huruf lagi! 🌟`;
  else lbl.textContent='🏆 Luar biasa! Kamu sudah hafal semua 26 huruf!';
}

function resetProgress(){
  if(!confirm('Reset semua progres?')) return;
  doneSet.clear();
  localStorage.removeItem('tt_az_done');
  buildGrid(); updateBar();
}

/* ── CONFETTI ── */
const cfCanvas=document.getElementById('cfCanvas');
const cfCtx=cfCanvas.getContext('2d');
let cfP=[];
function resizeCF(){cfCanvas.width=window.innerWidth;cfCanvas.height=window.innerHeight;}
resizeCF(); window.addEventListener('resize',resizeCF);

function celebrate(){
  for(let i=0;i<130;i++){
    cfP.push({x:Math.random()*cfCanvas.width,y:-20-Math.random()*100,
      w:7+Math.random()*8,h:4+Math.random()*6,
      vx:(Math.random()-.5)*4,vy:2+Math.random()*4,
      rot:Math.random()*360,rotV:(Math.random()-.5)*8,
      color:COLORS[Math.floor(Math.random()*COLORS.length)],life:1});
  }
}
(function aCF(){
  requestAnimationFrame(aCF);
  if(!cfP.length) return;
  cfCtx.clearRect(0,0,cfCanvas.width,cfCanvas.height);
  cfP=cfP.filter(p=>p.life>.01);
  cfP.forEach(p=>{
    p.x+=p.vx;p.y+=p.vy;p.vy+=.08;p.rot+=p.rotV;p.life-=.008;
    cfCtx.save();cfCtx.globalAlpha=p.life;cfCtx.translate(p.x,p.y);
    cfCtx.rotate(p.rot*Math.PI/180);cfCtx.fillStyle=p.color;
    cfCtx.fillRect(-p.w/2,-p.h/2,p.w,p.h);cfCtx.restore();
  });
})();

window.addEventListener('load',()=>speechSynthesis.getVoices());
speechSynthesis.onvoiceschanged=()=>{};

buildGrid();
updateBar();
</script>
</body>
</html>
