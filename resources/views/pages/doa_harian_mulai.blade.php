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
    html, body { height:100%; margin:0; }
    body { font-family:"Fredoka", system-ui, sans-serif; overflow:hidden; background:#f7fbff; }
    .kids-bg{
      height:100vh; width:100vw; position:relative; overflow:hidden;
      display:flex; align-items:center; justify-content:center; padding:24px;
      background:linear-gradient(180deg, rgba(247,251,255,.94), rgba(247,251,255,.84)),
      url("assets/images/slider/slider-2.png");
      background-size:cover; background-position:center;
    }
    .bubble{ position:absolute; border-radius:999px; opacity:.72; pointer-events:none; animation:float 7s ease-in-out infinite; }
    .b1{ width:140px;height:140px; left:-30px; top:120px; background:rgba(255,176,219,.65); }
    .b2{ width:90px;height:90px; right:40px; top:160px; background:rgba(122,210,255,.6); animation-delay:.8s; }
    .b3{ width:180px;height:180px; right:-60px; bottom:120px; background:rgba(255,220,120,.65); animation-delay:1.4s; }
    .b4{ width:70px;height:70px; left:70px; bottom:160px; background:rgba(124,255,193,.55); animation-delay:1.1s; }
    @keyframes float{ 0%,100%{ transform:translateY(0)} 50%{ transform:translateY(-14px)} }

    .btn-close-app{
      position:absolute; top:16px; left:16px; z-index:50; width:46px; height:46px;
      border-radius:16px; border:0; background:#ff5f7a; color:white; font-weight:900;
      box-shadow:0 14px 24px rgba(0,0,0,.18); cursor:pointer;
    }
    .board{
      width:min(1020px, 94vw); height:min(690px, 88vh);
      background:rgba(255,255,255,.9); border:3px solid rgba(28,44,107,.10);
      border-radius:26px; box-shadow:0 26px 60px rgba(0,0,0,.15);
      backdrop-filter:blur(6px); padding:22px 34px; position:relative; display:flex; flex-direction:column;
    }
    @media(max-width:900px){ .board{ padding:18px; } }
    .head{ display:flex; gap:14px; align-items:center; justify-content:space-between; flex-wrap:wrap; margin-bottom:10px; }
    .head-left{ display:flex; gap:14px; align-items:center; }
    .head-left img{ width:72px; height:auto; border-radius:14px; }
    .subtitle{ margin:0; font-weight:800; color:#0aa6c2; letter-spacing:.6px; font-size:14px; }
    .title{ margin:0; font-weight:900; color:#1c2c6b; font-size:clamp(26px, 3vw, 38px); }
    .sticker{
      padding:10px 12px; border-radius:999px; background:white; border:2px dashed rgba(28,44,107,.25);
      box-shadow:0 12px 24px rgba(0,0,0,.08); font-weight:900; color:#1c2c6b; white-space:nowrap;
      display:flex; align-items:center; gap:10px; flex-wrap:wrap;
    }
    .score-pill{ background:#eaf7ff; border:2px solid rgba(70,180,255,.25); color:#0a7ac2; padding:6px 10px; border-radius:999px; font-size:12px; font-weight:900; }
    .btn-reset, .btn-arena{
      border:0; border-radius:999px; padding:9px 12px; background:white; border:2px solid rgba(28,44,107,.12);
      color:#1c2c6b; font-weight:900; cursor:pointer; box-shadow:0 10px 18px rgba(0,0,0,.06); font-size:13px;
    }
    .btn-arena{ background:linear-gradient(90deg,#46b4ff,#62e6b0); color:white; border:0; }
    .search-row{ display:flex; gap:10px; align-items:center; justify-content:space-between; flex-wrap:wrap; margin:8px 0 12px; }
    .search-input{ width:min(520px,100%); border:2px solid rgba(28,44,107,.12); border-radius:16px; padding:12px 14px; outline:0; font-weight:800; background:rgba(255,255,255,.92); }
    .hint{ color:#6a74a8; font-weight:800; }
    .list-area{ flex:1; min-height:0; background:rgba(255,255,255,.65); border:2px solid rgba(28,44,107,.10); border-radius:22px; padding:14px; overflow:auto; }
    .doa-grid{ display:grid; grid-template-columns:repeat(auto-fill, minmax(170px, 1fr)); gap:16px; }
    .doa-box{ background:white; border-radius:22px; border:2px solid rgba(28,44,107,.08); box-shadow:0 12px 24px rgba(0,0,0,.08); padding:14px 12px 12px; text-align:center; cursor:pointer; transition:.18s ease; position:relative; }
    .doa-box:hover{ transform:translateY(-6px); box-shadow:0 18px 34px rgba(0,0,0,.12); }
    .doa-thumb{ width:110px; height:90px; object-fit:cover; margin:4px auto 10px; display:block; border-radius:16px; background:#f7fbff; }
    .doa-box-title{ font-weight:900; font-size:14px; color:#1c2c6b; line-height:1.2; }
    .tag-pill{ display:inline-block; margin-top:8px; background:#eaf7ff; border:2px solid rgba(70,180,255,.25); color:#0a7ac2; padding:6px 10px; border-radius:999px; font-size:12px; font-weight:900; }
    .pin{ position:absolute; top:-10px; left:12px; width:56px; height:18px; background:rgba(255,220,120,.92); border-radius:10px; transform:rotate(-7deg); box-shadow:0 6px 10px rgba(0,0,0,.08); }
    .empty{ display:none; text-align:center; padding:18px; color:#6a74a8; font-weight:900; }

    .doa-modal, .arena-modal{ position:fixed; inset:0; background:rgba(16,25,59,.48); display:none; place-items:center; z-index:9999; padding:18px; }
    .doa-modal.show, .arena-modal.show{ display:grid; }
    .modal-card, .arena-card{ width:min(940px,96vw); height:min(720px,92vh); background:rgba(255,255,255,.97); border-radius:28px; border:3px solid rgba(28,44,107,.10); box-shadow:0 30px 80px rgba(0,0,0,.26); overflow:hidden; display:flex; flex-direction:column; }
    .modal-top, .arena-top{ padding:16px 18px; display:flex; align-items:center; justify-content:space-between; gap:12px; background:linear-gradient(90deg, rgba(70,180,255,.16), rgba(98,230,176,.18)); border-bottom:2px dashed rgba(28,44,107,.12); }
    .modal-title, .arena-title{ margin:0; font-weight:900; font-size:clamp(20px,3vw,30px); color:#1c2c6b; }
    .close-btn{ width:46px; height:46px; border-radius:16px; border:0; background:#ff5f7a; color:white; font-weight:900; cursor:pointer; box-shadow:0 12px 22px rgba(0,0,0,.18); }
    .modal-body, .arena-body{ padding:18px; overflow:auto; }
    .doa-arab-big{ direction:rtl; text-align:right; font-size:clamp(28px,5vw,44px); line-height:2; color:#10193b; margin:8px 0 16px; font-family:"Scheherazade New","Amiri",serif; }
    .doa-latin-big{ font-size:clamp(16px,2.4vw,22px); line-height:1.7; color:#2f3767; font-weight:800; font-style:italic; margin:0 0 14px; }
    .doa-arti-big{ background:#f3f7ff; border-left:6px solid #46b4ff; padding:14px; border-radius:16px; font-size:clamp(15px,2.2vw,20px); line-height:1.7; color:#2f3767; font-weight:800; margin:0 0 16px; }
    .arti-hidden{ display:none; }
    .btn-row{ display:flex; gap:12px; flex-wrap:wrap; align-items:center; margin-bottom:14px; }
    .btn-audio-big, .main-btn{
      border:0; border-radius:18px; padding:14px 18px; background:linear-gradient(90deg,#46b4ff,#62e6b0);
      color:white; font-weight:900; font-size:18px; display:inline-flex; align-items:center; gap:10px;
      box-shadow:0 14px 28px rgba(0,0,0,.14); cursor:pointer;
    }
    .main-btn.secondary{ background:white; color:#1c2c6b; border:2px solid rgba(28,44,107,.12); }

    .arena-status{ display:flex; gap:10px; flex-wrap:wrap; align-items:center; justify-content:space-between; background:#f3f7ff; border-radius:18px; padding:12px; margin-bottom:12px; border:2px solid rgba(70,180,255,.18); color:#1c2c6b; font-weight:900; }
    .arena-actions{ display:flex; gap:10px; flex-wrap:wrap; }
    .arena-play{ background:rgba(255,255,255,.92); border:2px dashed rgba(28,44,107,.16); border-radius:22px; padding:14px; min-height:360px; }
    .game-scene{ display:grid; grid-template-columns:220px 1fr; gap:18px; align-items:center; background:linear-gradient(90deg, rgba(255,220,120,.24), rgba(70,180,255,.14)); border-radius:22px; padding:16px; margin-bottom:14px; }
    @media(max-width:680px){ .game-scene{ grid-template-columns:1fr; text-align:center; } }
    .game-img{ width:210px; height:160px; border-radius:24px; background:white; border:3px dashed rgba(28,44,107,.14); display:flex; align-items:center; justify-content:center; overflow:hidden; box-shadow:0 14px 24px rgba(0,0,0,.08); margin:auto; font-size:64px; }
    .game-img img{ width:100%; height:100%; object-fit:cover; display:block; }
    .game-mode{ margin:0 0 8px; color:#0aa6c2; font-size:15px; font-weight:900; }
    .game-question{ font-size:clamp(21px,3vw,31px); line-height:1.35; margin:0; color:#1c2c6b; font-weight:900; }
    .game-small{ margin:8px 0 0; color:#59639a; font-weight:900; font-size:15px; }
    .quiz-opts{ display:grid; gap:10px; }
    .opt{ text-align:left; width:100%; border-radius:16px; border:3px solid rgba(28,44,107,.10); padding:12px; font-weight:900; color:#2f3767; background:white; cursor:pointer; box-shadow:0 10px 20px rgba(0,0,0,.06); font-size:17px; transition:.14s; }
    .opt:hover{ transform:translateY(-2px); }
    .opt.correct{ border-color:rgba(98,230,176,.8); background:rgba(98,230,176,.18); }
    .opt.wrong{ border-color:rgba(255,95,122,.8); background:rgba(255,95,122,.12); }
    .quiz-feedback{ margin-top:10px; font-weight:900; color:#1c2c6b; font-size:18px; }
    .voice-card{ background:white; border-radius:18px; padding:14px; border:2px dashed rgba(28,44,107,.18); display:grid; gap:10px; }
    .voice-actions{ display:flex; gap:10px; flex-wrap:wrap; }

    .image-options{
      display:grid;
      grid-template-columns: repeat(auto-fit, minmax(160px, 1fr));
      gap:12px;
    }
    .img-opt{
      text-align:center;
      padding:10px;
      min-height:170px;
      display:flex;
      flex-direction:column;
      justify-content:space-between;
      align-items:center;
      gap:8px;
    }
    .img-opt img{
      width:100%;
      max-width:180px;
      height:120px;
      object-fit:cover;
      border-radius:16px;
      border:2px solid rgba(28,44,107,.10);
      background:#fff;
    }
    .doa-preview{
      background:#fff;
      border:2px dashed rgba(28,44,107,.18);
      border-radius:18px;
      padding:12px;
      margin-top:8px;
      color:#1c2c6b;
      font-weight:900;
      line-height:1.55;
    }
    .doa-preview-arab{
      direction:rtl;
      text-align:right;
      font-size:24px;
      line-height:1.8;
      margin-bottom:8px;
      font-family:"Scheherazade New","Amiri",serif;
    }
    .doa-preview-latin{
      font-size:17px;
      font-style:italic;
      color:#2f3767;
    }

    .mini-star{ display:inline-block; animation:popStar .5s ease; }
    @keyframes popStar{ 0%{ transform:scale(.3) rotate(0deg); opacity:0; } 100%{ transform:scale(1) rotate(360deg); opacity:1; } }
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
          <button class="btn-arena" id="openArenaBtn" type="button" onclick="openArena()">🎮 Arena Kuis</button>
          <button class="btn-reset" id="resetBtn" type="button">🔄 Reset</button>
        </div>
      </div>

      <div class="search-row">
        <input id="search" class="search-input" placeholder="Cari doa... (contoh: masjid / kelas / hujan)">
        <div class="hint">Dengarkan doa sampai ✅, lalu main di Arena Kuis 🎮</div>
      </div>

      <div class="list-area">
        <div class="doa-grid" id="doaList"></div>
        <div class="empty" id="emptyState">Tidak ada doa yang cocok 🥲</div>
      </div>
    </div>
  </div>

  <div class="doa-modal" id="doaModal">
    <div class="modal-card">
      <div class="modal-top">
        <h2 class="modal-title" id="modalTitle">Judul Doa</h2>
        <button class="close-btn" id="modalClose">✕</button>
      </div>
      <div class="modal-body">
        <div class="doa-arab-big" id="modalArab"></div>
        <div class="doa-latin-big" id="modalLatin"></div>
        <div class="doa-arti-big" id="modalArti"></div>

        <div class="btn-row">
          <button class="btn-audio-big" id="modalAudioBtn" type="button">
            <span>▶️</span><span>Mulai Bacaan</span>
          </button>
          <button class="main-btn secondary" id="toggleArtiBtn" type="button">👀 Lihat Arti</button>
        </div>
      </div>
    </div>
  </div>

  <div class="arena-modal" id="arenaModal">
    <div class="arena-card">
      <div class="arena-top">
        <h2 class="arena-title">🎮 Arena Kuis Doa</h2>
        <button class="close-btn" id="arenaClose" type="button">✕</button>
      </div>
      <div class="arena-body">
        <div class="arena-status">
          <div id="arenaStatusText">Dengarkan doa dulu supaya kuisnya terbuka ⭐</div>
          <div class="arena-actions">
            <button class="main-btn" id="arenaStartBtn" type="button" onclick="startArenaQuiz()">▶️ Mulai Kuis</button>
            <button class="main-btn secondary" id="arenaFinalBtn" type="button" onclick="startFinalQuiz()">🏆 Kuis Final</button>
          </div>
        </div>
        <div class="arena-play" id="arenaPlayArea">
          <div class="game-scene">
            <div class="game-img"><span>🎮</span></div>
            <div>
              <p class="game-question">Belum ada soal. Klik “Mulai Kuis” ya ✨</p>
              <p class="game-small">Soal akan mengambil doa yang sudah diceklis. Setiap doa punya minimal 2 kuis.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

<script>

  const DOA = [
      { id:"doa-masuk-kelas", title:"Doa Masuk Kelas", tag:"Kelas",
        image:"/assets/images/doa harian/C1.png",
        quizImage:"/assets/images/doa harian/masuk kelas.png",
        arab:" بِسْمِا للَّهِ وَلَجْنَا، وَبِسْمِ اللَّهِ خَرَجْنَا، وَعَلَى اللَّهِ رَبِّنَا تَوَكَّلْنَا",
        latin:"Bismillaahi walajnaa, wa bismillaahi khorojnaa, wa ‘alallaahi robbinaa tawakkalnaa.",
        arti:"Dengan menyebut nama Allah kami masuk, dengan menyebut nama Allah kami keluar, dan kepada Allah Tuhan kami, kami bertawakal.",
        audio:"/assets/audio/Doa Harian audio/1.mp3",
        scene:"Anak sedang masuk kelas atau ruangan.",
        question:"Kegiatan mana yang cocok dengan doa masuk kelas?",
        startLatin:"Bismillaahi walajnaa",
        continueLatin:"wa bismillaahi khorojnaa, wa ‘alallaahi robbinaa tawakkalnaa.",
      },
      { id:"doa-keluar-kelas", title:"Doa Keluar Kelas", tag:"Kelas",
        image:"/assets/images/doa harian/C2.png",
        quizImage:"/assets/images/doa harian/keluar kelas.png",
        arab:"بِاسْمِ اللهِ تَوَكَّلْتُ عَلَى اللهِ، لَا حَوْلَ وَلَا قُوَّةَ إِلَّا بِاللَّهِ",
        latin:"Bismillahi tawakkaltu 'ala Allahi wa laa hawla wa laa quwwata illa bi Allahi",
        arti:"Dengan menyebut nama Allah, aku bertawakal kepada Allah, tiada daya dan tiada kekuatan kecuali dengan pertolongan Allah.",
        audio:"/assets/audio/Doa Harian audio/2.mp3",
        scene:"Anak selesai belajar dan keluar kelas.",
        question:"Kegiatan mana yang cocok dengan doa keluar kelas?",
        startLatin:"Bismillahi tawakkaltu 'ala Allahi",
        continueLatin:"wa laa hawla wa laa quwwata illa bi Allahi.",
      },
      { id:"doa-masuk-masjid", title:"Doa Masuk Masjid", tag:"Masjid",
        image:"/assets/images/doa harian/C1.png",
        quizImage:"/assets/images/doa harian/masuk masjid.png",
        arab:"اللَّهُمَّ افْتَحْ لي أبْوَابَ رَحْمَتِكَ",
        latin:"Allahummaftha lii abwaaba rahmatik",
        arti:"Ya Allah, bukalah pintu-pintu rahmat-Mu untukku.",
        audio:"/assets/audio/Doa Harian audio/3.mp3",
        scene:"Anak mau masuk masjid.",
        question:"Kegiatan mana yang cocok dengan doa masuk masjid?",
        startLatin:"Allahummaftha lii",
        continueLatin:"abwaaba rahmatik",
      },
      { id:"doa-keluar-masjid", title:"Doa Keluar Masjid", tag:"Masjid",
        image:"/assets/images/doa harian/C2.png",
        quizImage:"/assets/images/doa harian/keluar masjid.png",
        arab:"اللَّهُمَّ إِنِّي أَسْأَلُكَ مِنْ فَضْلِكَ",
        latin:"Allaahumma innii as'aluka min fadhlik",
        arti:"Ya Allah, sesungguhnya aku memohon fadilah kepada-Mu.",
        audio:"assets/audio/doa/doa_keluar_masjid.mp3",
        scene:"Anak selesai salat dan mau keluar masjid.",
        question:"Kegiatan mana yang cocok dengan doa keluar masjid?",
        startLatin:"Allaahumma innii",
        continueLatin:"as'aluka min fadhlik",
      },
      { id:"doa-sesudah-wudhu", title:"Doa Sesudah Berwudhu", tag:"Ibadah",
        image:"/assets/images/doa harian/C1.png",
        quizImage:"/assets/images/doa harian/setelah wudhu.png",
        arab:"اَشْهَدُ اَنْ لَااِلٰهَ اِلَّااللهُ وَحْدَهُ لاَشَرِيْكَ لَهُ وَاَشْهَدُ اَنَّ مُحَمَّدًاعَبْدُهُ وَرَسُوْلُهُ. اَللّٰهُمَّ اجْعَلْنِىْ مِنَ التَّوَّابِيْنَ وَاجْعَلْنِىْ مِنَ الْمُتَطَهِّرِيْنَ، وَجْعَلْنِيْ مِنْ عِبَادِكَ الصَّالِحِيْنَ",
        latin:"Asyhadu allaa ilaahah illallaah wahdahuu laa syariika lahuu wa asyhadu anna muhammadan 'abduhuu wa rosuuluh. Allaahummaj'alnii minat tawwaabiina waj'alnii minal mutathahhiriina, waj'alnii min 'ibadikash shaalihiin.",
        arti:"Aku bersaksi, tiada Tuhan selain Allah Yang Maha Tunggal, tiada sekutu bagi-Nya. Dan aku bersaksi bahwa Nabi Muhammad adalah hamba dan Utusan-Nya. Ya Allah, jadikanlah aku orang yang bertaubat dan jadikanlah aku orang yang suci dan jadikanlah aku dari golongan hamba-hamba Mu yang shalih.",
        audio:"assets/audio/doa/doa_sesudah_wudhu.mp3",
        scene:"Anak sudah selesai berwudhu.",
        question:"Kegiatan mana yang cocok dengan doa sesudah wudhu?",
        startLatin:"Asyhadu allaa ilaahah",
        continueLatin:"illallaah wahdahuu laa syariika lahuu",
      },
      { id:"doa-sesudah-adzan", title:"Doa Sesudah Adzan", tag:"Ibadah",
        image:"/assets/images/doa harian/C2.png",
        quizImage:"/assets/images/doa harian/setelah adzan.png",
        arab:"اَللّٰهُمَّ رَبَّ هٰذِهِ الدَّعْوَةِ التَّامَّةِ، وَالصَّلَاةِ الْقَائِمَةِ، آتِ مُحَمَّدًا الْوَسِيلَةَ وَالْفَضِيلَةَ، وَابْعَثْهُ مَقَامًا مَحْمُودًا الَّذِي وَعَدْتَهُ",
        latin:"Allaahumma robba haadzihid-da’watiit-taammah, wash-sholaatil-qoo-imah. Aati muhammadanil-wasiilata wal-fadhiilah, wab’atshu maqoomam mahmuudan alladzii wa’adtah.",
        arti:"Ya Allah, Tuhan pemilik seruan yang sempurna ini dan salat yang sedang ditegakkan, berilah Nabi Muhammad wasilah dan keutamaan, serta bangkitkanlah beliau pada kedudukan yang terpuji sebagaimana yang telah Engkau janjikan.",
        audio:"assets/audio/doa/doa_sesudah_adzan.mp3",
        scene:"Anak selesai mendengar adzan.",
        question:"Kegiatan mana yang cocok dengan doa sesudah adzan?",
        startLatin:"Allaahumma robba haadzihid-da’watiit-taammah",
        continueLatin:"wash-sholaatil-qoo-imah",
      },
      { id:"doa-di-atas-kendaraan", title:"Doa Berada di Atas Kendaraan", tag:"Perjalanan",
        image:"/assets/images/doa harian/C1.png",
        quizImage:"/assets/images/doa harian/naik kendaraan.png",
        arab:"سُبْحَانَ الَّذِي سَخَّرَ لَنَا هٰذَا وَمَا كُنَّا لَهُ مُقْرِنِينَ وَإِنَّا إِلَىٰ رَبِّنَا لَمُنْقَلِبُونَ",
        latin:"Subhaanalladzii sakh-khoro lanaa haadzaa wa maa kunnaa lahu muqriniin. Wa innaa ilaa robbinaa lamunqolibuun.",
        arti:"Maha Suci Allah yang telah menundukkan kendaraan ini untuk kami, padahal kami sebelumnya tidak mampu menguasainya. Dan sesungguhnya kepada Tuhan kami, kami akan kembali.",
        audio:"assets/audio/doa/doa_naik_kendaraan.mp3",
        scene:"Anak sedang naik kendaraan.",
        question:"Kegiatan mana yang cocok dengan doa naik kendaraan?",
        startLatin:"Subhaanalladzii sakh-khoro lanaa haadzaa",
        continueLatin:"wa maa kunnaa lahu muqriniin",
      },
      { id:"doa-turun-hujan", title:"Doa Ketika Turun Hujan", tag:"Cuaca",
        image:"/assets/images/doa harian/C2.png",
        quizImage:"/assets/images/doa harian/hujan turun.png",
        arab:"اللَّهُمَّ صَيِّبًا نَافِعًا",
        latin:"Allahumma shayyiban naafi'an.",
        arti:"Ya Allah, turunkanlah hujan yang bermanfaat.",
        audio:"assets/audio/doa/doa_turun_hujan.mp3",
        scene:"Anak melihat hujan turun.",
        question:"Kegiatan mana yang cocok dengan doa ketika turun hujan?",
        startLatin:"Allahumma",
        continueLatin:"shayyiban naafi'an.",
      },
      { id:"doa-berbuka-puasa", title:"Doa Ketika Berbuka Puasa", tag:"Puasa",
        image:"/assets/images/doa harian/C1.png",
        quizImage:"/assets/images/doa harian/buka puasa.png",
        arab:"ذَهَبَ الظَّمَأُ وَابْتَلَّتِ الْعُرُوقُ وَثَبَتَ الْأَجْرُ إِنْ شَاءَ اللَّهُ",
        latin:"Dzahabaz zhama'u wabtallatil 'uruuqu wa tsabatal ajru in syaa Allah.",
        arti:"Telah hilang rasa haus, urat-urat telah basah, dan pahala telah tetap, insya Allah.",
        audio:"assets/audio/doa/doa_berbuka_puasa.mp3",
        scene:"Anak-anak sedang berbuka puasa.",
        question:"Kegiatan mana yang cocok dengan doa berbuka puasa?",
        startLatin:"Dzahabaz zhama'u",
        continueLatin:"wabtallatil 'uruuqu wa tsabatal ajru",
      },
      { id:"doa-kendaraan-berjalan", title:"Doa Kendaraan Sudah Berjalan", tag:"Perjalanan",
        image:"/assets/images/doa harian/C2.png",
        quizImage:"/assets/images/doa harian/kendaraan berjalan.png",
        arab:"بِسْمِ اللهِ مَجْرَهَا وَمُرْسَهَآاِنَّ رَبِّىْ لَغَفُوْرٌرَّحِيْمٌ",
        latin:"Bismillaahi majrahaa wa mursaahaa inna robbii laghofuurur rohiim",
        arti:"Dengan nama Allah yang menjalankan kendaraan ini berlayar dan berlabuh, sesungguhnya Tuhanku benar-benar Maha Pengampun lagi Maha Penyayang.",
        audio:"assets/audio/doa/doa_kendaraan_berjalan.mp3",
        scene:"Kendaraan sudah mulai berjalan.",
        question:"Kegiatan mana yang cocok dengan doa kendaraan sudah berjalan?",
        startLatin:"Bismillaahi majrahaa",
        continueLatin:"wa mursaahaa inna robbii laghofuurur rohiim",
      },
  ];

  const listenedKey = "tt_doa_listened";
  const scoreKey = "tt_doa_score";

  const player = document.getElementById("player");
  const doaListEl = document.getElementById("doaList");
  const searchEl = document.getElementById("search");
  const emptyEl = document.getElementById("emptyState");
  const progressText = document.getElementById("progressText");
  const scoreText = document.getElementById("scoreText");

  const doaModal = document.getElementById("doaModal");
  const modalTitle = document.getElementById("modalTitle");
  const modalArab = document.getElementById("modalArab");
  const modalLatin = document.getElementById("modalLatin");
  const modalArti = document.getElementById("modalArti");
  const modalClose = document.getElementById("modalClose");
  const modalAudioBtn = document.getElementById("modalAudioBtn");
  const toggleArtiBtn = document.getElementById("toggleArtiBtn");

  const arenaModal = document.getElementById("arenaModal");
  const arenaClose = document.getElementById("arenaClose");
  const arenaStatusText = document.getElementById("arenaStatusText");
  const arenaPlayArea = document.getElementById("arenaPlayArea");
  const arenaFinalBtn = document.getElementById("arenaFinalBtn");

  let listened = JSON.parse(localStorage.getItem(listenedKey) || "{}");
  let score = Number(localStorage.getItem(scoreKey) || "0");
  let currentDoa = null;
  let currentSrc = "";
  let artiVisible = false;
  let arenaIndex = 0;
  let finalQueue = [];
  let finalIndex = 0;
  let finalCorrect = 0;
  let lastArenaDoaId = null;
  let lastArenaQuestionKey = null;

  function saveState(){
    localStorage.setItem(listenedKey, JSON.stringify(listened));
    localStorage.setItem(scoreKey, String(score));
  }

  function getUnlocked(){
    return DOA.filter(d => listened[d.id]);
  }

  function updateProgress(){
    const done = getUnlocked().length;
    progressText.textContent = `${done}/${DOA.length}`;
    scoreText.textContent = String(score);
    updateArenaStatus();
  }

  function updateArenaStatus(){
    const unlocked = getUnlocked();
    arenaStatusText.textContent = `Doa terbuka: ${unlocked.length}/${DOA.length} ✅ | Skor: ${score} ⭐`;
    arenaFinalBtn.disabled = unlocked.length < 3;
  }

  function getFiltered(){
    const q = (searchEl.value || "").trim().toLowerCase();
    if (!q) return DOA;
    return DOA.filter(d => (d.title + " " + d.tag).toLowerCase().includes(q));
  }

  function render(list){
    doaListEl.innerHTML = "";
    emptyEl.style.display = list.length ? "none" : "block";
    list.forEach(d => {
      const box = document.createElement("div");
      box.className = "doa-box";
      const mark = listened[d.id] ? "✅ " : "⭐ ";
      box.innerHTML = `
        <div class="pin"></div>
        <img class="doa-thumb" src="${esc(d.image)}" alt="">
        <div class="doa-box-title">${mark}${esc(d.title)}</div>
        <div class="tag-pill">${esc(d.tag)}</div>
      `;
      box.addEventListener("click", () => openDoa(d));
      doaListEl.appendChild(box);
    });
    updateProgress();
  }

  function openDoa(doa){
    currentDoa = doa;
    currentSrc = "";
    artiVisible = false;
    player.pause();
    player.removeAttribute("src");
    player.load();
    modalTitle.textContent = doa.title;
    modalArab.textContent = doa.arab;
    modalLatin.textContent = doa.latin;
    applyArti();
    setAudioBtn(false);
    doaModal.classList.add("show");
  }

  function closeDoa(){
    player.pause();
    player.currentTime = 0;
    setAudioBtn(false);
    doaModal.classList.remove("show");
  }

  function applyArti(){
    if (!currentDoa) return;
    if (artiVisible){
      modalArti.classList.remove("arti-hidden");
      modalArti.innerHTML = "<b>Artinya:</b> " + esc(currentDoa.arti);
      toggleArtiBtn.textContent = "🙈 Sembunyikan Arti";
    } else {
      modalArti.classList.add("arti-hidden");
      modalArti.innerHTML = "<b>Artinya:</b> (disembunyikan)";
      toggleArtiBtn.textContent = "👀 Lihat Arti";
    }
  }

  function setAudioBtn(playing){
    const spans = modalAudioBtn.querySelectorAll("span");
    spans[0].textContent = playing ? "⏸️" : "▶️";
    spans[1].textContent = playing ? "Pause" : "Mulai Bacaan";
  }

  modalAudioBtn.addEventListener("click", () => {
    if (!currentDoa) return;
    if (currentSrc !== currentDoa.audio){
      currentSrc = currentDoa.audio;
      player.src = currentDoa.audio;
      player.play().then(() => setAudioBtn(true)).catch(() => alert("Audio tidak ditemukan. Pastikan file mp3 ada."));
    } else if (player.paused) {
      player.play().then(() => setAudioBtn(true)).catch(() => alert("Audio belum bisa diputar."));
    } else {
      player.pause();
      setAudioBtn(false);
    }

    // Begitu audio dipencet, doa dianggap sudah dipelajari dan kuisnya terbuka.
    listened[currentDoa.id] = true;
    saveState();
    render(getFiltered());
  });

  player.addEventListener("ended", () => setAudioBtn(false));
  modalClose.addEventListener("click", closeDoa);
  doaModal.addEventListener("click", e => { if (e.target === doaModal) closeDoa(); });
  toggleArtiBtn.addEventListener("click", () => { artiVisible = !artiVisible; applyArti(); });
  searchEl.addEventListener("input", () => render(getFiltered()));

  document.getElementById("resetBtn").addEventListener("click", () => {
    if (!confirm("Reset semua progress dan skor?")) return;
    listened = {};
    score = 0;
    localStorage.removeItem(listenedKey);
    localStorage.removeItem(scoreKey);
    player.pause();
    render(getFiltered());
    lastArenaDoaId = null;
    lastArenaQuestionKey = null;
    arenaPlayArea.innerHTML = welcomeArenaHtml("Progress sudah di-reset. Dengarkan doa lagi ya ⭐");
  });

  function openArena(){
    closeDoa();
    updateArenaStatus();
    const unlocked = getUnlocked();
    arenaPlayArea.innerHTML = unlocked.length === 0
      ? lockedHtml()
      : welcomeArenaHtml(`Siap main dari ${unlocked.length} doa yang sudah diceklis? Setiap doa punya minimal 2 soal: gambar, bacaan, dan audio.`);
    arenaModal.classList.add("show");
  }

  function closeArena(){
    player.pause();
    arenaModal.classList.remove("show");
  }

  arenaClose.addEventListener("click", closeArena);
  arenaModal.addEventListener("click", e => { if (e.target === arenaModal) closeArena(); });

  function lockedHtml(){
    return `
      <div class="game-scene">
        <div class="game-img"><span>🔒</span></div>
        <div>
          <p class="game-question">Arena masih terkunci nih!</p>
          <p class="game-small">Klik salah satu doa, lalu tekan “Mulai Bacaan” sampai kartunya jadi ✅.</p>
        </div>
      </div>`;
  }

  function welcomeArenaHtml(text){
    return `
      <div class="game-scene">
        <div class="game-img"><span>🎮</span></div>
        <div>
          <p class="game-question">Arena Kuis siap dimainkan!</p>
          <p class="game-small">${esc(text)}</p>
        </div>
      </div>`;
  }

  // ====== SETIAP DOA MINIMAL 4 SOAL ======
  function makeQuestionSet(doa, pool){
    // Soal gambar cukup 1 per doa, tapi bentuk doanya divariasikan:
    // ada yang latin, ada yang arab, ada yang arab + latin.
    const imageStyleMap = {
      "doa-masuk-kelas": "latin",
      "doa-keluar-kelas": "arab",
      "doa-masuk-masjid": "arablatin",
      "doa-keluar-masjid": "latin",
      "doa-sesudah-wudhu": "arab",
      "doa-sesudah-adzan": "arablatin",
      "doa-di-atas-kendaraan": "latin",
      "doa-turun-hujan": "arab",
      "doa-berbuka-puasa": "latin",
      "doa-kendaraan-berjalan": "arablatin"
    };

    const style = imageStyleMap[doa.id] || "latin";
    const imageQuestion = {
      type:"gambar-" + style,
      mode:"🖼️ Pilih Gambar",
      title:"Dari bacaan doa ini, kegiatan mana yang paling sesuai?",
      hint:"Baca doanya, lalu pilih gambar kegiatan yang cocok.",
      image:null,
      doaArab:(style === "arab" || style === "arablatin") ? doa.arab : "",
      doaLatin:(style === "latin" || style === "arablatin") ? doa.latin : "",
      audio:null,
      options:imageOptions(doa, pool)
    };

    return [
      imageQuestion,
      {
        type:"bacaan",
        mode:"📖 Tebak Bacaan",
        title:"Kalau kegiatannya seperti gambar di samping, mana bacaan doa yang benar?",
        hint:"Lihat gambarnya, lalu pilih bacaan latin yang sesuai.",
        image:(doa.quizImage || doa.image),
        audio:null,
        options:latinOptions(doa, pool)
      },
      {
        type:"audio",
        mode:"🔊 Tebak Audio",
        title:"Dengarkan suara doa ini. Itu doa apa ya?",
        hint:"Klik tombol audio dulu, lalu pilih nama doa yang kamu dengar.",
        image:(doa.quizImage || doa.image),
        audio:doa.audio,
        options:titleOptions(doa, pool)
      },
      {
        type:"sambung",
        mode:"🧩 Sambung Doa",
        title:`Lanjutkan bacaan ini: “${doa.startLatin} ...”`,
        hint:"Pilih lanjutannya saja. Jangan pilih bacaan dari awal.",
        image:(doa.quizImage || doa.image),
        audio:null,
        options:continuationOptions(doa, pool)
      }
    ];
  }

  function startArenaQuiz(){
    const pool = getUnlocked();
    updateArenaStatus();

    if (pool.length < 1){
      arenaPlayArea.innerHTML = lockedHtml();
      return;
    }

    // Acak doa yang sudah terbuka.
    // Kalau doa terbuka lebih dari 1, jangan ulang doa yang sama beruntun.
    let doaCandidates = pool;
    if (pool.length > 1 && lastArenaDoaId){
      doaCandidates = pool.filter(d => d.id !== lastArenaDoaId);
    }

    const doa = shuffle(doaCandidates)[0];
    const questions = makeQuestionSet(doa, pool);

    // Acak jenis soal juga.
    // Kalau masih doa yang sama, hindari jenis soal yang sama beruntun.
    let questionCandidates = questions;
    if (lastArenaDoaId === doa.id && lastArenaQuestionKey){
      questionCandidates = questions.filter(q => q.type !== lastArenaQuestionKey);
      if (questionCandidates.length === 0) questionCandidates = questions;
    }

    const q = shuffle(questionCandidates)[0];

    lastArenaDoaId = doa.id;
    lastArenaQuestionKey = q.type;

    renderQuestion(q, null);
  }

  function startFinalQuiz(){
    const pool = getUnlocked();
    if (pool.length < 3){
      arenaPlayArea.innerHTML = `
      <div class="game-scene">
        <div class="game-img"><span>🔒</span></div>
        <div>
          <p class="game-question">Kuis Final belum terbuka.</p>
          <p class="game-small">Minimal harus ada 3 doa yang sudah diceklis dulu ya.</p>
        </div>
      </div>`;
      return;
    }

    finalCorrect = 0;
    finalIndex = 0;
    finalQueue = [];
    shuffle(pool).forEach(d => {
      const qs = makeQuestionSet(d, pool);
      finalQueue.push(qs[0]); // pilih gambar dari bacaan doa
      finalQueue.push(qs[1]); // tebak bacaan
      finalQueue.push(qs[2]); // tebak audio
      finalQueue.push(qs[3]); // sambung doa
    });
    finalQueue = shuffle(finalQueue).slice(0, Math.min(12, finalQueue.length));
    renderFinalStep();
  }

  function renderFinalStep(){
    if (finalIndex >= finalQueue.length){
      arenaPlayArea.innerHTML = `
      <div class="game-scene">
        <div class="game-img"><span>🏆</span></div>
        <div>
          <p class="game-question">Kuis Final selesai!</p>
          <p class="game-small">Benar: ${finalCorrect}/${finalQueue.length}. Skor sekarang: ${score} ⭐</p>
        </div>
      </div>
      <div class="quiz-feedback">${finalCorrect === finalQueue.length ? "MasyaAllah sempurna! 🎉" : "Bagus banget, ayo ulang lagi biar makin hafal! 💪"}</div>`;
      return;
    }

    const q = finalQueue[finalIndex];
    finalIndex++;
    renderQuestion(q, renderFinalStep);
  }

  function renderQuestion(q, afterAnswer){
    player.pause();

    const isImageQuiz = q.type && q.type.startsWith("gambar");
    const imgHtml = q.image ? `<img src="${esc(q.image)}" alt="">` : `<span>📖</span>`;
    const audioHtml = q.audio ? `<div class="voice-actions" style="margin:10px 0;"><button class="btn-audio-big" id="quizAudioBtn" type="button">▶️ Putar Audio</button></div>` : "";

    let doaPreview = "";
    if (isImageQuiz){
      doaPreview = `
        <div class="doa-preview">
          ${q.doaArab ? `<div class="doa-preview-arab">${esc(q.doaArab)}</div>` : ""}
          ${q.doaLatin ? `<div class="doa-preview-latin">${esc(q.doaLatin)}</div>` : ""}
                  </div>
      `;
    }

    arenaPlayArea.innerHTML = `
      <div class="game-scene">
        <div class="game-img">${imgHtml}</div>
        <div>
          <p class="game-mode">${esc(q.mode)}</p>
          <p class="game-question">${esc(q.title)}</p>
          <p class="game-small">${esc(q.hint)}</p>
          ${doaPreview}
          ${audioHtml}
        </div>
      </div>
      <div class="quiz-opts ${isImageQuiz ? "image-options" : ""}" id="quizOptions"></div>
      <div class="quiz-feedback" id="quizFeedback"></div>
    `;

    if (q.audio){
      document.getElementById("quizAudioBtn").addEventListener("click", () => {
        player.pause();
        player.src = q.audio;
        player.play().catch(() => alert("Audio tidak ditemukan. Pastikan file mp3 ada."));
      });
    }

    const opts = document.getElementById("quizOptions");
    q.options.forEach((opt, idx) => {
      const btn = document.createElement("button");
      btn.className = isImageQuiz ? "opt img-opt" : "opt";
      btn.type = "button";

      if (isImageQuiz && opt.image){
        btn.innerHTML = `<img src="${esc(opt.image)}" alt=""><span>${esc(opt.text)}</span>`;
      } else {
        btn.textContent = opt.text;
      }

      btn.addEventListener("click", () => answer(btn, q.options, idx, afterAnswer));
      opts.appendChild(btn);
    });
  }

  function answer(btn, options, idx, afterAnswer){
    const all = Array.from(document.querySelectorAll("#quizOptions .opt"));
    all.forEach(b => b.disabled = true);
    const selected = options[idx];

    if (selected.correct){
      btn.classList.add("correct");
      score += 10;
      finalCorrect += afterAnswer ? 1 : 0;
      document.getElementById("quizFeedback").innerHTML = `<span class="mini-star">🎉</span> Benar! +10 bintang ⭐`;
    } else {
      btn.classList.add("wrong");
      all.forEach((b, i) => { if (options[i].correct) b.classList.add("correct"); });
      document.getElementById("quizFeedback").textContent = "🙂 Belum tepat, coba lagi nanti ya!";
    }

    saveState();
    updateProgress();
    if (afterAnswer) setTimeout(afterAnswer, 900);
  }

  function imageOptions(correct, pool){
    // Pilihan gambar tetap 3: 1 benar + 2 pengecoh.
    const candidates = (pool && pool.length >= 3 ? pool : DOA);
    const wrong = shuffle(candidates.filter(d => d.id !== correct.id)).slice(0, 2);
    return shuffle([correct, ...wrong]).map(d => ({
      text:d.scene,
      image:(d.quizImage || d.image),
      correct:d.id === correct.id
    }));
  }

  function titleOptions(correct, pool){
    const candidates = (pool && pool.length >= 3 ? pool : DOA);
    const wrong = shuffle(candidates.filter(d => d.id !== correct.id)).slice(0, 2);
    return shuffle([correct, ...wrong]).map(d => ({ text:d.title, correct:d.id === correct.id }));
  }

  function latinOptions(correct, pool){
    const candidates = (pool && pool.length >= 3 ? pool : DOA);
    const wrong = shuffle(candidates.filter(d => d.id !== correct.id)).slice(0, 2);
    return shuffle([correct, ...wrong]).map(d => ({ text:d.latin, correct:d.id === correct.id }));
  }

  function continuationOptions(correct, pool){
    // Untuk sambung doa, opsi tidak mengulang bagian yang sudah ditulis di soal.
    const candidates = (pool && pool.length >= 3 ? pool : DOA);
    const wrong = shuffle(candidates.filter(d => d.id !== correct.id)).slice(0, 3);
    return shuffle([correct, ...wrong]).map(d => ({
      text:d.continueLatin || d.latin,
      correct:d.id === correct.id
    }));
  }

  function shuffle(arr){
    const a = [...arr];
    for (let i=a.length-1; i>0; i--){
      const j = Math.floor(Math.random() * (i+1));
      [a[i], a[j]] = [a[j], a[i]];
    }
    return a;
  }

  function esc(str){
    return String(str ?? "")
      .replaceAll("&","&amp;")
      .replaceAll("<","&lt;")
      .replaceAll(">","&gt;")
      .replaceAll('"',"&quot;")
      .replaceAll("'","&#039;");
  }

  window.openArena = openArena;
  window.startArenaQuiz = startArenaQuiz;
  window.startFinalQuiz = startFinalQuiz;

  render(DOA);
</script>
</body>
</html>
