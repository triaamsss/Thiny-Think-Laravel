<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width,initial-scale=1"/>
  <title>Doa Harian - TinyThink</title>

  <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@300..700&display=swap" rel="stylesheet">

  <style>
    html, body { height: 100%; margin: 0; }
    body { font-family: "Fredoka", system-ui, sans-serif; overflow: hidden; }

    .kids-bg{
      height: 100vh; width: 100vw;
      position: relative; overflow: hidden;
      display: flex; align-items: center; justify-content: center;
      padding: 24px;
      background:
        linear-gradient(180deg, rgba(247,251,255,.92), rgba(247,251,255,.82)),
        url("assets/images/slider/slider-2.png");
      background-size: cover;
      background-position: center;
    }

    .bubble{ position:absolute; border-radius:999px; filter: blur(.2px); opacity:.7; pointer-events:none; animation: float 7s ease-in-out infinite; }
    .b1{ width:140px;height:140px; left:-30px; top:120px; background:rgba(255,176,219,.65); }
    .b2{ width:90px;height:90px; right:40px; top:160px; background:rgba(122,210,255,.6); animation-delay:.8s; }
    .b3{ width:180px;height:180px; right:-60px; bottom:120px; background:rgba(255,220,120,.65); animation-delay:1.4s; }
    .b4{ width:70px;height:70px; left:70px; bottom:160px; background:rgba(124,255,193,.55); animation-delay:1.1s; }
    @keyframes float{ 0%,100%{ transform:translateY(0)} 50%{ transform:translateY(-14px)} }

    .btn-close-app{
      position:absolute; top: 16px; left: 16px; z-index: 50;
      width: 46px; height: 46px; border-radius: 16px; border: none;
      background: #ff5f7a; color:#fff; font-weight: 900;
      box-shadow: 0 14px 24px rgba(0,0,0,.18); cursor:pointer;
    }

    .board{
      width: min(980px, 92vw);
      height: min(680px, 86vh);
      background: rgba(255,255,255,.88);
      border: 3px solid rgba(28,44,107,.10);
      border-radius: 26px;
      box-shadow: 0 26px 60px rgba(0,0,0,.15);
      backdrop-filter: blur(6px);
      padding: 22px 34px;
      position: relative;
      display:flex; flex-direction:column;
    }
    @media (max-width: 900px){ .board{ padding: 18px; } }

    .head{ display:flex; gap:14px; align-items:center; justify-content:space-between; flex-wrap:wrap; margin-bottom: 10px; }
    .head-left{ display:flex; gap:14px; align-items:center; }
    .head-left img{ width:72px; height:auto; border-radius: 14px; }
    .subtitle{ margin:0; font-weight:800; color:#0aa6c2; letter-spacing:.6px; font-size:14px; }
    .title{ margin:0; font-weight:900; color:#1c2c6b; font-size: clamp(26px, 3vw, 38px); }

    .sticker{
      padding: 10px 12px;
      border-radius: 999px;
      background: #fff;
      border: 2px dashed rgba(28,44,107,.25);
      box-shadow: 0 12px 24px rgba(0,0,0,.08);
      font-weight:900;
      color:#1c2c6b;
      white-space:nowrap;
      display:flex;
      align-items:center;
      gap:10px;
    }
    .score-pill{
      background:#eaf7ff;
      border: 2px solid rgba(70,180,255,.25);
      color:#0a7ac2;
      padding: 6px 10px;
      border-radius: 999px;
      font-size: 12px;
      font-weight: 900;
      white-space: nowrap;
    }
    .btn-reset{
      border:none;
      border-radius: 999px;
      padding: 8px 10px;
      background:#fff;
      border: 2px solid rgba(28,44,107,.12);
      color:#1c2c6b;
      font-weight: 900;
      cursor:pointer;
      box-shadow: 0 10px 18px rgba(0,0,0,.06);
      font-size: 12px;
    }

    .search-row{ display:flex; gap:10px; align-items:center; justify-content:space-between; flex-wrap:wrap; margin: 8px 0 12px; }
    .search-input{
      width:min(520px, 100%);
      border: 2px solid rgba(28,44,107,.12);
      border-radius: 16px;
      padding: 12px 14px;
      outline:none;
      font-weight:800;
      background: rgba(255,255,255,.92);
    }
    .hint{ color:#6a74a8; font-weight:800; }

    .list-area{
      flex: 1; min-height: 0;
      background: rgba(255,255,255,.65);
      border: 2px solid rgba(28,44,107,.10);
      border-radius: 22px;
      padding: 14px;
      overflow: auto;
    }

    .doa-grid{
      display:grid;
      grid-template-columns: repeat(auto-fill, minmax(170px, 1fr));
      gap: 16px;
    }

    .doa-box{
      background:#fff;
      border-radius: 22px;
      border: 2px solid rgba(28,44,107,.08);
      box-shadow: 0 12px 24px rgba(0,0,0,.08);
      padding: 14px 12px 12px;
      text-align:center;
      cursor:pointer;
      transition: transform .18s ease, box-shadow .18s ease;
      position: relative;
    }
    .doa-box:hover{ transform: translateY(-6px); box-shadow: 0 18px 34px rgba(0,0,0,.12); }

    .doa-thumb{
      width: 96px; height: 96px;
      object-fit: contain;
      margin: 4px auto 10px;
      display:block;
    }

    .doa-box-title{
      font-weight: 900;
      font-size: 14px;
      color:#1c2c6b;
      line-height: 1.2;
    }

    .tag-pill{
      display:inline-block;
      margin-top: 8px;
      background: #eaf7ff;
      border: 2px solid rgba(70,180,255,.25);
      color:#0a7ac2;
      padding: 6px 10px;
      border-radius: 999px;
      font-size: 12px;
      font-weight: 900;
      white-space: nowrap;
    }

    .pin{
      position:absolute; top:-10px; left: 12px;
      width: 56px; height: 18px;
      background: rgba(255,220,120,.92);
      border-radius: 10px;
      transform: rotate(-7deg);
      box-shadow: 0 6px 10px rgba(0,0,0,.08);
    }

    .empty{
      display:none;
      text-align:center;
      padding: 18px;
      color:#6a74a8;
      font-weight: 900;
    }

    /* ===== MODAL FULLSCREEN ===== */
    .doa-modal{
      position: fixed; inset: 0;
      background: rgba(16,25,59,.45);
      display: none;
      place-items: center;
      z-index: 9999;
      padding: 18px;
    }
    .doa-modal.show{ display:grid; }

    .doa-modal-card{
      width: min(920px, 96vw);
      height: min(720px, 92vh);
      background: rgba(255,255,255,.96);
      border-radius: 26px;
      box-shadow: 0 30px 80px rgba(0,0,0,.25);
      border: 3px solid rgba(28,44,107,.10);
      overflow: hidden;
      display:flex; flex-direction: column;
      margin: 0 auto;
    }

    .doa-modal-top{
      padding: 16px 18px;
      display:flex; align-items:center; justify-content:space-between; gap:12px;
      background: linear-gradient(90deg, rgba(70,180,255,.16), rgba(98,230,176,.18));
      border-bottom: 2px dashed rgba(28,44,107,.12);
    }

    .doa-modal-title{
      font-weight: 900;
      font-size: clamp(18px, 3.2vw, 28px);
      color:#1c2c6b;
      margin:0;
    }

    .doa-close{
      width: 46px; height: 46px;
      border-radius: 16px;
      border:none;
      background:#ff5f7a;
      color:#fff;
      font-weight: 900;
      cursor:pointer;
      box-shadow: 0 12px 22px rgba(0,0,0,.18);
    }

    .doa-modal-body{ padding: 18px; overflow:auto; }

    .doa-arab-big{
      direction: rtl; text-align: right;
      font-size: clamp(28px, 5vw, 44px);
      line-height: 2.0;
      color:#10193b;
      margin: 8px 0 16px 0;
      font-family: "Scheherazade New", "Amiri", serif;
    }

    .doa-latin-big{
      font-size: clamp(16px, 2.4vw, 22px);
      line-height: 1.7;
      color:#2f3767;
      font-weight: 800;
      font-style: italic;
      margin: 0 0 14px 0;
    }

    .doa-arti-big{
      background:#f3f7ff;
      border-left: 6px solid #46b4ff;
      padding: 14px 14px;
      border-radius: 16px;
      font-size: clamp(15px, 2.2vw, 20px);
      line-height: 1.7;
      color:#2f3767;
      font-weight: 800;
      margin: 0 0 16px 0;
    }
    .arti-hidden{ display:none; }

    .btn-row{
      display:flex; gap:12px; flex-wrap:wrap; align-items:center;
      margin-bottom: 14px;
    }

    .btn-audio-big{
      border:none;
      border-radius: 18px;
      padding: 14px 18px;
      background: linear-gradient(90deg, #46b4ff, #62e6b0);
      color:#fff;
      font-weight: 900;
      font-size: 18px;
      display:inline-flex;
      align-items:center;
      gap:10px;
      box-shadow: 0 14px 28px rgba(0,0,0,.14);
      cursor:pointer;
    }

    .btn-quiz, .btn-eye{
      border:none;
      border-radius: 18px;
      padding: 14px 18px;
      background: #fff;
      color:#1c2c6b;
      font-weight: 900;
      font-size: 18px;
      border: 2px solid rgba(28,44,107,.12);
      cursor:pointer;
      box-shadow: 0 12px 24px rgba(0,0,0,.06);
    }

    /* ===== Highlight words ===== */
    .word{ display:inline-block; padding: 2px 6px; border-radius: 10px; margin: 2px 1px; transition: transform .12s ease; }
    .word.active{ background: rgba(255,220,120,.9); box-shadow: 0 10px 18px rgba(0,0,0,.10); transform: scale(1.03); }
    .word.done{ opacity: .65; }

    /* ===== Quiz ===== */
    .quiz-box{
      background: rgba(255,255,255,.85);
      border: 2px dashed rgba(28,44,107,.18);
      border-radius: 18px;
      padding: 14px;
      margin-top: 10px;
    }
    .quiz-opts{ display:grid; gap:10px; }
    .opt{
      text-align:left; width:100%;
      border-radius: 16px;
      border: 2px solid rgba(28,44,107,.10);
      padding: 12px 12px;
      font-weight: 800;
      color:#2f3767;
      background:#fff;
      cursor:pointer;
      box-shadow: 0 10px 20px rgba(0,0,0,.06);
    }
    .opt.correct{ border-color: rgba(98,230,176,.8); background: rgba(98,230,176,.18); }
    .opt.wrong{ border-color: rgba(255,95,122,.8); background: rgba(255,95,122,.12); }
    .quiz-feedback{ margin-top:10px; font-weight: 900; color:#1c2c6b; }
  </style>
</head>

<body>
  <audio id="player" preload="metadata"></audio>

  <div class="kids-bg">
    <button class="btn-close-app" onclick="window.location.href='{{ route('home') }}'">✕</button>

    <div class="bubble b1"></div><div class="bubble b2"></div><div class="bubble b3"></div><div class="bubble b4"></div>

    <div class="board">
      <div class="head">
        <div class="head-left">
          <img src="{{ asset('assets/images/slider/slider-2.png') }}" alt="Doa Harian">
          <div>
            <p class="subtitle">Doa Sehari-hari</p>
            <h1 class="title">Hafalan Doa Harian</h1>
          </div>
        </div>

        <div class="sticker">
          ⭐ <span id="progressText">0/10</span>
          <span class="score-pill">🏆 Skor: <span id="scoreText">0</span></span>
          <button class="btn-reset" id="resetBtn">🔄 Reset</button>
        </div>
      </div>

      <div class="search-row">
        <input id="search" class="search-input" placeholder="Cari doa... (contoh: masjid / kelas / hujan)">
        <div class="hint">Klik kartu doa → belajar + kuis ✨</div>
      </div>

      <div class="list-area">
        <div class="doa-grid" id="doaList"></div>
        <div class="empty" id="emptyState">Tidak ada doa yang cocok 🥲</div>
      </div>
    </div>
  </div>

  <!-- ===== MODAL FULLSCREEN ===== -->
  <div class="doa-modal" id="doaModal">
    <div class="doa-modal-card">
      <div class="doa-modal-top">
        <h2 class="doa-modal-title" id="modalTitle">Judul Doa</h2>
        <button class="doa-close" id="modalClose">✕</button>
      </div>

      <div class="doa-modal-body">
        <div class="doa-arab-big" id="modalArab"></div>
        <div class="doa-latin-big" id="modalLatin"></div>

        <div class="doa-arti-big" id="modalArti"></div>

        <div class="btn-row">
          <button class="btn-audio-big" id="modalAudioBtn">
            <span>▶️</span><span>Mulai Bacaan</span>
          </button>

          <button class="btn-eye" id="toggleArtiBtn">👀 Lihat Arti</button>
          <button class="btn-quiz" id="modalQuizBtn">🧠 Kuis Arti</button>
        </div>

        <div class="quiz-box" id="quizBox" style="display:none;">
          <div style="font-weight:900;color:#1c2c6b;margin:0 0 10px 0;">Apa arti doa ini?</div>
          <div class="quiz-opts" id="quizOpts"></div>
          <div class="quiz-feedback" id="quizFeedback"></div>
        </div>
      </div>
    </div>
  </div>

  <script>
    // === Data DOA (10 sesuai TK) ===
    const DOA = [
      { id:"doa-masuk-kelas", title:"Doa Masuk Kelas", tag:"Kelas",
        image:"assets/images/hijaiyah/C1.png",
        arab:"رَبِّ زِدْنِي عِلْمًا وَارْزُقْنِي فَهْمًا وَاجْعَلْنِي مِنَ الصَّالِحِينَ",
        latin:"Robbi zidnii ‘ilmaa, warzuqnii fahmaa, waj‘alnii minash-shoolihiin.",
        arti:"Ya Allah, tambahkanlah aku ilmu, berilah aku pemahaman, dan jadikanlah aku termasuk orang-orang yang shalih.",
        audio:"assets/audio/doa/doa_masuk_kelas.mp3"
      },
      { id:"doa-keluar-kelas", title:"Doa Keluar Kelas", tag:"Kelas",
        image:"assets/images/hijaiyah/C2.png",
        arab:"بِاسْمِ اللهِ تَوَكَّلْتُ عَلَى اللهِ، لَا حَوْلَ وَلَا قُوَّةَ إِلَّا بِاللَّهِ",
        latin:"Bismillahi tawakkaltu 'ala Allahi wa laa hawla wa laa quwwata illa bi Allahi",
        arti:"Dengan menyebut nama Allah, aku bertawakal kepada Allah, tiada daya dan tiada kekuatan kecuali dengan pertolongan Allah.",
        audio:"assets/audio/doa/doa_keluar_kelas.mp3"
      },
      { id:"doa-masuk-masjid", title:"Doa Masuk Masjid", tag:"Masjid",
        image:"assets/images/hijaiyah/C1.png",
        arab:"اللَّهُمَّ افْتَحْ لي أبْوَابَ رَحْمَتِكَ",
        latin:"Allahummaftha lii abwaaba rahmatik",
        arti:"Ya Allah, bukalah pintu-pintu rahmat-Mu untukku.",
        audio:"assets/audio/doa/doa_masuk_masjid.mp3"
      },
      { id:"doa-keluar-masjid", title:"Doa Keluar Masjid", tag:"Masjid",
        image:"assets/images/hijaiyah/C2.png",
        arab:"اللَّهُمَّ إِنِّي أَسْأَلُكَ مِنْ فَضْلِكَ",
        latin:"Allaahumma innii as'aluka min fadhlik",
        arti:"Ya Allah, sesungguhnya aku memohon fadilah kepada-Mu.",
        audio:"assets/audio/doa/doa_keluar_masjid.mp3"
      },
      { id:"doa-sesudah-wudhu", title:"Doa Sesudah Berwudhu", tag:"Ibadah",
        image:"assets/images/hijaiyah/C1.png",
        arab:"اَشْهَدُ اَنْ لَااِلٰهَ اِلَّااللهُ وَحْدَهُ لاَشَرِيْكَ لَهُ وَاَشْهَدُ اَنَّ مُحَمَّدًاعَبْدُهُ وَرَسُوْلُهُ. اَللّٰهُمَّ اجْعَلْنِىْ مِنَ التَّوَّابِيْنَ وَاجْعَلْنِىْ مِنَ الْمُتَطَهِّرِيْنَ، وَجْعَلْنِيْ مِنْ عِبَادِكَ الصَّالِحِيْنَ",
        latin:"Asyhadu allaa ilaahah illallaah wahdahuu laa syariika lahuu wa asyhadu anna muhammadan 'abduhuu wa rosuuluh. Allaahummaj'alnii minat tawwaabiina waj'alnii minal mutathahhiriina, waj'alnii min 'ibadikash shaalihiin.",
        arti:"Aku bersaksi, tiada Tuhan selain Allah Yang Maha Tunggal, tiada sekutu bagi-Nya. Dan aku bersaksi bahwa Nabi Muhammad adalah hamba dan Utusan-Nya. Ya Allah, jadikanlah aku orang yang bertaubat dan jadikanlah aku orang yang suci dan jadikanlah aku dari golongan hamba-hamba Mu yang shalih.",
        audio:"assets/audio/doa/doa_sesudah_wudhu.mp3"
      },
      { id:"doa-sesudah-adzan", title:"Doa Sesudah Adzan", tag:"Ibadah",
        image:"assets/images/hijaiyah/C2.png",
        arab:"اَللّٰهُمَّ رَبَّ هٰذِهِ الدَّعْوَةِ التَّآمَّةِ، وَالصَّلاَةِ الْقَآئِمَةِ، آتِ مُحَمَّدَانِ الْوَسِيْلَةَ وَالْفَضِيْلَةَ وَالشَّرَفَ وَالدَّرَجَةَ الْعَالِيَةَ الرَّفِيْعَةَ وَابْعَثْهُ مَقَامًامَحْمُوْدَانِ الَّذِىْ وَعَدْتَهُ اِنَّكَ لاَتُخْلِفُ الْمِيْعَادَ يَآاَرْحَمَ الرَّحِمِيْنَ",
        latin:"Allaahumma robba haadzihid da'watit taammati wash sholaatil qooimati aati muhammadanil wasiilata wal fadhiilata wasy syarofa wad darajatal 'aaliyatar raofii'ata wab'atshu maqoomam mahmuudanil ladzii wa'adtahu, innaka laa tukhliful mii'aada yaa arhamar roohimiina.",
        arti:"Ya Allah, Tuhan yang mempunyai seruan yang sempurna, dan sholat yang tetap didirikan, karuniailah nabi Muhammad tempat yang luhur, kelebihan, kemuliaan, dan derajat yang tinggi. tempatkanlah dia pada kedudukan yang terpuji seperti yang telah Engkau janjikan. Sesungguhnya Engkau tiada menyalahi janji. wahai dzat yang Maha Penyayang",
        audio:"assets/audio/doa/doa_sesudah_adzan.mp3"
      },
      { id:"doa-di-atas-kendaraan", title:"Doa Berada di Atas Kendaraan", tag:"Perjalanan",
        image:"assets/images/hijaiyah/C1.png",
        arab:"سُبْحَانَ الَّذِىْ سَخَّرَلَنَا هَذَا وَمَاكُنَّالَهُ مُقْرِنِيْنَ وَاِنَّآ اِلَى رَبِّنَا لَمُنْقَلِبُوْنَ",
        latin:"Subhaanalladzii sakkhara lanaa hadza wama kunna lahu muqriniin wa-inna ilaa rabbina lamunqalibuun.",
        arti:"Maha suci Allah yang telah menundukkan untuk kami (kendaraan) ini. padahal sebelumnya kami tidak mampu untuk menguasainya, dan hanya kepada-Mu lah kami akan kembali.",
        audio:"assets/audio/doa/doa_naik_kendaraan.mp3"
      },
      { id:"doa-turun-hujan", title:"Doa Ketika Turun Hujan", tag:"Cuaca",
        image:"assets/images/hijaiyah/C2.png",
        arab:"اللَّهُمَّ اجْعَلْهُ صَيِّبًا نَافِعًا",
        latin:"Allahummaj'alhu shayyiban naafi'an.",
        arti:"Ya Allah, jadikanlah hujan ini bermanfaat.",
        audio:"assets/audio/doa/doa_turun_hujan.mp3"
      },
      { id:"doa-berbuka-puasa", title:"Doa Ketika Berbuka Puasa", tag:"Puasa",
        image:"assets/images/hijaiyah/C1.png",
        arab:"ذَهَبَ الظَّمَأُ وَابْتَلَّتِ الْعُرُوقُ وَثَبَتَ الْأَجْرُ إِنْ شَاءَ اللَّهُ",
        latin:"Dzahabaz zhama'u wabtallatil 'uruuqu wa tsabatal ajru in syaa Allah.",
        arti:"Telah hilang rasa haus, urat-urat telah basah, dan pahala telah tetap, insya Allah.",
        audio:"assets/audio/doa/doa_berbuka_puasa.mp3"
      },
      { id:"doa-kendaraan-berjalan", title:"Doa Kendaraan Sudah Berjalan", tag:"Perjalanan",
        image:"assets/images/hijaiyah/C2.png",
        arab:"بِسْمِ اللهِ مَجْرَهَا وَمُرْسَهَآاِنَّ رَبِّىْ لَغَفُوْرٌرَّحِيْمٌ",
        latin:"Bismillaahi majrahaa wa mursaahaa inna robbii laghofuurur rohiim",
        arti:"Dengan nama Allah yang menjalankan kendaraan ini berlayar dan berlabuh, sesungguhnya Tuhanku benar-benar Maha Pengampun lagi Maha Penyayang.",
        audio:"assets/audio/doa/doa_kendaraan_berjalan.mp3"
      },
    ];

    // ===== LocalStorage Keys =====
    const listenedKey = "tt_doa_listened";
    const scoreKey = "tt_doa_score";

    // ===== DOM =====
    const doaListEl = document.getElementById("doaList");
    const searchEl = document.getElementById("search");
    const emptyEl = document.getElementById("emptyState");

    const player = document.getElementById("player");
    const progressText = document.getElementById("progressText");
    const scoreText = document.getElementById("scoreText");
    const resetBtn = document.getElementById("resetBtn");

    // LOAD persistent state
    let listened = JSON.parse(localStorage.getItem(listenedKey) || "{}");
    let score = Number(localStorage.getItem(scoreKey) || "0");

    // modal refs
    const doaModal = document.getElementById("doaModal");
    const modalTitle = document.getElementById("modalTitle");
    const modalArab  = document.getElementById("modalArab");
    const modalLatin = document.getElementById("modalLatin");
    const modalArti  = document.getElementById("modalArti");
    const modalClose = document.getElementById("modalClose");
    const modalAudioBtn = document.getElementById("modalAudioBtn");
    const modalQuizBtn = document.getElementById("modalQuizBtn");
    const toggleArtiBtn = document.getElementById("toggleArtiBtn");

    const quizBox = document.getElementById("quizBox");
    const quizOpts = document.getElementById("quizOpts");
    const quizFeedback = document.getElementById("quizFeedback");

    // state
    let modalAudioSrc = "";
    let modalDoaId = "";
    let modalCurrentDoa = null;

    let currentSrc = "";
    let arabWords = [];
    let latinWords = [];
    let artiVisible = false;

    // ===== Highlight timer (STABIL) =====
    let highlightTimer = null;

    function stopHighlightTimer(){
      if (highlightTimer) clearInterval(highlightTimer);
      highlightTimer = null;
    }

    function updateHighlightStep(){
      if (!player.duration || !isFinite(player.duration) || player.duration <= 0) return;
      if (player.paused) return;

      const ratio = Math.min(1, Math.max(0, player.currentTime / player.duration));

      const arabIdx  = arabWords.length  ? Math.min(arabWords.length-1,  Math.floor(ratio * arabWords.length)) : 0;
      const latinIdx = latinWords.length ? Math.min(latinWords.length-1, Math.floor(ratio * latinWords.length)) : 0;

      if (arabWords.length)  markProgressWord(arabWords, arabIdx);
      if (latinWords.length) markProgressWord(latinWords, latinIdx);
    }

    function startHighlightTimer(){
      stopHighlightTimer();
      highlightTimer = setInterval(updateHighlightStep, 200);
      updateHighlightStep();
    }

    function saveState(){
      localStorage.setItem(listenedKey, JSON.stringify(listened));
      localStorage.setItem(scoreKey, String(score));
    }

    function getFiltered(){
      const q = (searchEl.value || "").trim().toLowerCase();
      if (!q) return DOA;
      return DOA.filter(d => (d.title + " " + d.tag).toLowerCase().includes(q));
    }

    function updateProgress(){
      const done = Object.values(listened).filter(Boolean).length;
      progressText.textContent = `${done}/${DOA.length}`;
      scoreText.textContent = String(score);
    }

    function render(list){
      doaListEl.innerHTML = "";
      emptyEl.style.display = list.length ? "none" : "block";

      list.forEach((d) => {
        const box = document.createElement("div");
        box.className = "doa-box";

        const mark = listened[d.id] ? "✅ " : "⭐ ";

        box.innerHTML = `
          <div class="pin"></div>
          <img class="doa-thumb" src="${escapeHtml(d.image)}" alt="">
          <div class="doa-box-title">${mark}${escapeHtml(d.title)}</div>
          <div class="tag-pill">${escapeHtml(d.tag)}</div>
        `;

        box.addEventListener("click", () => openModal(d));
        doaListEl.appendChild(box);
      });

      updateProgress();
    }

    function openModal(doa){
      modalCurrentDoa = doa;
      modalTitle.textContent = doa.title;

      modalArab.innerHTML = buildWordSpans(doa.arab);
      modalLatin.innerHTML = buildWordSpans(doa.latin);

      arabWords = Array.from(modalArab.querySelectorAll(".word"));
      latinWords = Array.from(modalLatin.querySelectorAll(".word"));

      modalAudioSrc = doa.audio;
      modalDoaId = doa.id;

      artiVisible = false;
      applyArtiVisibility();

      resetQuizUI();
      stopAudio(true);
      setModalBtn(false);

      doaModal.classList.add("show");
    }

    function closeModal(){
      doaModal.classList.remove("show");
      stopAudio(true);
      resetQuizUI();
    }

    modalClose.addEventListener("click", closeModal);
    doaModal.addEventListener("click", (e) => {
      if (e.target === doaModal) closeModal();
    });

    function setModalBtn(playing){
      const icon = modalAudioBtn.querySelector("span:first-child");
      const label = modalAudioBtn.querySelector("span:last-child");
      if (playing) { icon.textContent = "⏸️"; label.textContent = "Pause"; }
      else { icon.textContent = "▶️"; label.textContent = "Mulai Bacaan"; }
    }

    function applyArtiVisibility(){
      if (!modalCurrentDoa) return;
      if (artiVisible){
        modalArti.classList.remove("arti-hidden");
        modalArti.innerHTML = "<b>Arti:</b> " + escapeHtml(modalCurrentDoa.arti);
        toggleArtiBtn.textContent = "🙈 Sembunyikan Arti";
      } else {
        modalArti.classList.add("arti-hidden");
        modalArti.innerHTML = "<b>Arti:</b> (disembunyikan)";
        toggleArtiBtn.textContent = "👀 Lihat Arti";
      }
    }

    toggleArtiBtn.addEventListener("click", () => {
      artiVisible = !artiVisible;
      applyArtiVisibility();
    });

    function clearHighlight(){
      [...arabWords, ...latinWords].forEach(w => w.classList.remove("active", "done"));
    }

    function markProgressWord(list, idx){
      for (let i = 0; i < list.length; i++){
        list[i].classList.remove("active");
        if (i < idx) list[i].classList.add("done");
        else list[i].classList.remove("done");
      }
      if (list[idx]) list[idx].classList.add("active");
    }

    function stopAudio(resetHighlightAlso){
      stopHighlightTimer();

      player.pause();
      player.currentTime = 0;
      player.removeAttribute("src");
      player.load();
      currentSrc = "";

      if (resetHighlightAlso) clearHighlight();
      setModalBtn(false);
    }

    // Play/Pause 1 tombol (pause = stop & balik awal)
    modalAudioBtn.addEventListener("click", () => {
      const src = modalAudioSrc;
      if (!src) return;

      if (currentSrc !== src) {
        stopAudio(true);
        currentSrc = src;
        player.src = src;

        player.play().then(() => {
          setModalBtn(true);
          startHighlightTimer();
        }).catch(() => {
          alert("Audio tidak ditemukan / belum bisa diputar. Pastikan mp3 ada.");
          stopAudio(true);
        });
      } else {
        if (!player.paused) {
          player.pause();
          player.currentTime = 0;
          stopHighlightTimer();
          setModalBtn(false);
          clearHighlight();
        } else {
          player.currentTime = 0;
          clearHighlight();
          player.play().then(() => {
            setModalBtn(true);
            startHighlightTimer();
          }).catch(() => alert("Audio belum bisa diputar."));
        }
      }

      // tandai sudah dipelajari (persist)
      listened[modalDoaId] = true;
      saveState();
      render(getFiltered());
    });

    player.addEventListener("ended", () => {
      stopHighlightTimer();
      setModalBtn(false);
      clearHighlight();
    });

    // ===== QUIZ =====
    function resetQuizUI(){
      quizBox.style.display = "none";
      quizOpts.innerHTML = "";
      quizFeedback.textContent = "";
      modalQuizBtn.textContent = "🧠 Kuis Arti";
    }

    function shuffle(arr){
      const a = [...arr];
      for (let i = a.length - 1; i > 0; i--){
        const j = Math.floor(Math.random() * (i + 1));
        [a[i], a[j]] = [a[j], a[i]];
      }
      return a;
    }

    function startQuizForCurrentDoa(){
      if (!modalCurrentDoa) return;

      // pas kuis: arti otomatis disembunyikan
      artiVisible = false;
      applyArtiVisibility();

      const correct = modalCurrentDoa.arti;

      const others = DOA.filter(d => d.id !== modalCurrentDoa.id).map(d => d.arti);
      const distractors = shuffle(others).slice(0, 2);
      const options = shuffle([correct, ...distractors]);

      quizBox.style.display = "block";
      quizOpts.innerHTML = "";
      quizFeedback.textContent = "";

      options.forEach((optText) => {
        const btn = document.createElement("button");
        btn.className = "opt";
        btn.type = "button";
        btn.textContent = optText;

        btn.addEventListener("click", () => {
          Array.from(quizOpts.querySelectorAll("button")).forEach(b => b.disabled = true);

          const isCorrect = (optText === correct);

          if (isCorrect){
            btn.classList.add("correct");
            quizFeedback.textContent = "🎉 Hebat! Jawaban kamu benar!";
            score += 10;
          } else {
            btn.classList.add("wrong");
            Array.from(quizOpts.querySelectorAll("button")).forEach(b => {
              if (b.textContent === correct) b.classList.add("correct");
            });
            quizFeedback.textContent = "🙂 Belum tepat. Coba lihat jawaban yang benar ya!";
          }

          saveState();
          updateProgress();
        });

        quizOpts.appendChild(btn);
      });

      modalQuizBtn.textContent = "🔄 Ulang Kuis";
    }

    modalQuizBtn.addEventListener("click", () => {
      stopAudio(true);
      startQuizForCurrentDoa();
    });

    // ===== RESET BUTTON =====
    resetBtn.addEventListener("click", () => {
      const ok = confirm("Reset semua progress & skor? Ini untuk mulai dari awal ya 😊");
      if (!ok) return;

      listened = {};
      score = 0;
      localStorage.removeItem(listenedKey);
      localStorage.removeItem(scoreKey);

      stopAudio(true);
      resetQuizUI();
      updateProgress();
      render(getFiltered());

      alert("Sudah di-reset! Semua doa kembali ⭐");
    });

    // ===== SEARCH =====
    searchEl.addEventListener("input", () => render(getFiltered()));

    // ===== HELPERS =====
    function buildWordSpans(text){
      const safe = escapeHtml(text).trim();
      if (!safe) return "";
      return safe.split(/\s+/).map(w => `<span class="word">${w}</span>`).join(" ");
    }
    function escapeHtml(str){
      return String(str)
        .replaceAll("&","&amp;")
        .replaceAll("<","&lt;")
        .replaceAll(">","&gt;")
        .replaceAll('"',"&quot;")
        .replaceAll("'","&#039;");
    }

    // first render
    render(DOA);
  </script>
</body>
</html>
