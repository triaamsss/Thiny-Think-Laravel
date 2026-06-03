<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <title>TinyThink - Kumpulan Hadist</title>

  <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />

  <link
    href="https://fonts.googleapis.com/css2?family=Fredoka:wght@300..700&display=swap"
    rel="stylesheet"
  />

  <style>
    body {
      font-family: "Fredoka", sans-serif;
      margin: 0;
      overflow-x: hidden;
      background: linear-gradient(135deg, #e9fbff 0%, #f2fdff 45%, #f2fff7 100%);
      position: relative;
    }

    .logo-top-left {
      position: fixed;
      top: 14px;
      left: 16px;
      z-index: 1201;
      width: 170px;
      height: 48px;
      object-fit: contain;
    }

    .back-btn {
      position: fixed;
      top: 16px;
      right: 16px;
      width: 52px;
      height: 52px;
      border: none;
      border-radius: 999px;
      cursor: pointer;
      z-index: 1202;
      background: linear-gradient(180deg, #ffb24a 0%, #ff7a00 100%);
      box-shadow: 0 14px 26px rgba(0, 0, 0, 0.14);
      color: white;
      font-size: 28px;
      font-weight: 900;
    }

    .header {
      text-align: center;
      padding: 86px 16px 10px;
    }

    .header h1 {
      font-size: 38px;
      color: #0f2b6d;
      font-weight: 900;
      margin: 0 0 10px;
    }

    .search-wrap {
      width: min(900px, 92%);
      margin: 0 auto 14px;
      display: flex;
      gap: 10px;
      justify-content: center;
      flex-wrap: wrap;
    }

    .search-input {
      flex: 1;
      min-width: 220px;
      max-width: 520px;
      padding: 12px 14px;
      border-radius: 14px;
      border: 2px solid rgba(0, 160, 200, 0.18);
      outline: none;
      font-size: 16px;
      background: white;
    }

    .search-btn,
    .reset-btn {
      padding: 12px 14px;
      border: none;
      border-radius: 14px;
      cursor: pointer;
      font-size: 16px;
      font-weight: 900;
    }

    .search-btn {
      background: #ffd3e7;
    }

    .reset-btn {
      background: white;
      border: 2px solid rgba(255, 120, 180, 0.28);
    }

    .board {
      background: linear-gradient(135deg, #9fd7ff 0%, #c6ebff 55%, #9fd7ff 100%);
      border: 14px solid #ffe1b5;
      border-radius: 26px;
      margin: 10px auto 28px;
      width: min(1000px, 92%);
      padding: 22px;
      box-shadow: 0 18px 40px rgba(0, 0, 0, 0.1);
    }

    .hadist-container {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
      gap: 18px;
    }

    .hadist-card {
      background: linear-gradient(180deg, #ffe6f1 0%, white 100%);
      border-radius: 22px;
      padding: 18px;
      text-align: center;
      cursor: pointer;
      box-shadow: 0 14px 28px rgba(0, 0, 0, 0.12);
      transition: 0.25s;
      border: 2px solid rgba(255, 120, 180, 0.28);
    }

    .hadist-card:hover {
      transform: translateY(-6px);
    }

    .icon-box {
      width: 100px;
      height: 100px;
      margin: 0 auto 10px;
      border-radius: 26px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 52px;
      background: #dff0ff;
      box-shadow: 0 10px 20px rgba(0, 0, 0, 0.08);
    }

    .hadist-card h3 {
      color: #0f2b6d;
      font-size: 20px;
      margin: 8px 0 0;
      font-weight: 900;
    }

    .quiz-button-wrapper {
      width: 100%;
      display: flex;
      justify-content: center;
      margin: -5px 0 80px;
    }

    .quiz-button,
    .back-hadist-btn,
    .next-btn,
    .restart-btn {
      border: none;
      padding: 16px 30px;
      border-radius: 22px;
      color: white;
      font-size: 22px;
      font-weight: 900;
      cursor: pointer;
      box-shadow: 0 14px 30px rgba(0, 0, 0, 0.18);
      transition: 0.25s;
    }

    .quiz-button,
    .next-btn {
      background: linear-gradient(180deg, #ffb347 0%, #ff7a00 100%);
    }

    .back-hadist-btn {
      background: linear-gradient(180deg, #60a5fa 0%, #2563eb 100%);
      margin-bottom: 20px;
    }

    .restart-btn {
      background: linear-gradient(180deg, #4ade80 0%, #16a34a 100%);
    }

    .quiz-button:hover,
    .back-hadist-btn:hover,
    .next-btn:hover,
    .restart-btn:hover {
      transform: translateY(-4px) scale(1.03);
    }

    #modal {
      display: none;
      position: fixed;
      inset: 0;
      background: rgba(0, 0, 0, 0.65);
      justify-content: center;
      align-items: center;
      z-index: 999;
      padding: 18px;
    }

    .modal-box {
  background: white;
  width: 92%;
  max-width: 560px;
  border-radius: 22px;
  padding: 16px 18px;
  text-align: center;
  position: relative;
}

    .close-x {
      position: absolute;
      top: 12px;
      right: 12px;
      width: 44px;
      height: 44px;
      border: none;
      border-radius: 14px;
      cursor: pointer;
      font-size: 24px;
      font-weight: 900;
      background: rgba(0, 0, 0, 0.06);
    }

    #judul {
      color: #0f2b6d;
      font-size: 30px;
      font-weight: 900;
    }

    video{
  width:100%;
  max-height:220px;
  object-fit:cover;
  border-radius:16px;
  margin-top:8px;
}

    

    #emojiBesar {
      font-size: 76px;
    }

    .audio-box {
      background: #ffe8f2;
      border-radius: 18px;
      padding: 16px;
      margin-bottom: 18px;
    }

    .audio-box p {
      margin: 0 0 10px;
      color: #0f2b6d;
      font-weight: 900;
      font-size: 18px;
    }

    audio {
      width: 100%;
    }

    #arab {
      font-size: 30px;
      direction: rtl;
      margin-top: 12px;
      line-height: 2;
      font-weight: 700;
    }

    #latin {
      font-style: italic;
      margin-top: 6px;
      color: #475569;
      font-size: 18px;
    }

    #arti {
      margin-top: 6px;
      font-weight: 900;
      color: #0f766e;
      font-size: 22px;
    }

    #pesan {
      margin-top: 12px;
      color: #475569;
      font-weight: 700;
      font-size: 18px;
    }

    .btn-tutup {
      padding: 10px 24px;
      border: none;
      border-radius: 14px;
      font-size: 18px;
      cursor: pointer;
      margin-top: 12px;
      font-weight: 900;
      background: #ff7aa6;
      color: white;
    }

    #halamanKuis {
      display: none;
    }

    .quiz-card {
      background: white;
      border-radius: 30px;
      padding: 30px;
      text-align: center;
      max-width: 850px;
      margin: auto;
      box-shadow: 0 18px 40px rgba(0, 0, 0, 0.1);
    }

    .score-box {
      background: #fff4bf;
      color: #ff7a00;
      padding: 12px 20px;
      border-radius: 999px;
      display: inline-block;
      font-size: 22px;
      font-weight: 900;
      margin-bottom: 20px;
    }

    #questionNumber {
      color: #64748b;
      font-weight: 700;
      margin-bottom: 10px;
    }

    #questionText {
      white-space: pre-line;
      font-size: 32px;
      color: #0f2b6d;
      font-weight: 900;
      margin-bottom: 18px;
    }

    #questionEmoji {
      font-size: 90px;
      margin-bottom: 22px;
    }

    #optionsBox {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(160px, 1fr));
      gap: 18px;
    }

    .question-image {
  width: 160px;
  height: 160px;
  object-fit: contain;
}

.option-image{
  width:95px;
  height:95px;
  object-fit:contain;
}

.option-text{
  font-size:24px;
  font-weight:900;
  color:#0f2b6d;
  margin-top:0px;
  line-height:1.2;
}

.option-text-only{
  font-size:24px;
  font-weight:900;
  color:#0f2b6d;
  margin:0;
  }

.question-image{
  width:160px;
  height:160px;

  object-fit:cover;

  border-radius:20px;
}

.modal-box{
  position:relative;
  z-index:1001;
}

.close-x{
  position:absolute;
  top:14px;
  right:14px;
  width:46px;
  height:46px;
  border:none;
  border-radius:14px;
  cursor:pointer;
  font-size:24px;
  font-weight:900;
  background:#ff6b81;
  color:white;
  z-index:2000;
}

.btn-tutup{
  position:relative;
  z-index:2000;
}

video{
  position:relative;
  z-index:1;
}

    .option-btn{
      border:none;
      border-radius:24px;
      padding:20px 14px;
      background:#f8fbff;
      cursor:pointer;
      min-height:210px;
      display:flex;
      flex-direction:column;
      align-items:center;
      justify-content:center;
      gap:14px;
      transition:.25s;
      box-shadow:
  0 10px 20px rgba(0,0,0,.08);
}

    .option-btn:hover {
      transform: translateY(-5px) scale(1.04);
      background: #eef8ff;
    }

    .option-btn.correct {
      background: #bbf7d0;
    }

    .option-btn.wrong {
      background: #fecdd3;
    }

    .option-emoji{
      font-size:70px;
      line-height:1;
      margin-bottom:10px;
      }

    .option-arab{
      font-size: 42px;
      font-weight: 700;
      direction: rtl;
      color: #0f2b6d;
      line-height: 1.5;
    }

    .option-latin{
      font-size: 18px;
      font-weight: 700;
      color: #0f2b6d;
      margin-top: 8px;
    }

    .option-indo{
      font-size: 16px;
      font-weight: 700;
      color: #64748b;
      margin-top: 6px;
    }

    #feedback {
      margin-top: 22px;
      font-size: 28px;
      font-weight: 900;
      min-height: 40px;
    }

    .next-btn {
      display: none;
      margin-top: 20px;
    }

    #finishBox {
      display: none;
      text-align: center;
    }

    .finish-emoji {
      font-size: 100px;
    }

    .finish-title {
      font-size: 42px;
      color: #0f2b6d;
      font-weight: 900;
    }

    .finish-score {
      font-size: 28px;
      color: #ff7a00;
      font-weight: 900;
      margin-bottom: 20px;
    }

    @media (max-width: 600px) {
      .logo-top-left {
        width: 120px;
        height: 42px;
      }

      .header h1 {
        font-size: 28px;
      }

      #questionText {
        font-size: 24px;
      }

      #arab {
        font-size: 24px;
      }
    }
  </style>
</head>

<body>
  <audio id="sfxClick" src="{{ asset('assets/audio/hadist/close.mp3') }}" preload="auto"></audio>

  <img class="logo-top-left" src="{{ asset('assets/images/logo-tinythink.png') }}" alt="TinyThink" />

  <button class="back-btn" onclick="goBack()">❮</button>

  <!-- HALAMAN HADIST -->
  <div id="halamanHadist">
    <div class="header">
      <h1>KUMPULAN HADIST</h1>
    </div>

    <div class="search-wrap">
      <input
        id="searchInput"
        class="search-input"
        type="text"
        placeholder="Cari hadist... contoh: ilmu, malu"
      />

      <button class="search-btn" onclick="cari()">🔎 Cari</button>
      <button class="reset-btn" onclick="resetCari()">⟲ Reset</button>
    </div>

    <div class="board">
      <div class="hadist-container" id="hadistContainer"></div>
    </div>

    <div class="quiz-button-wrapper">
      <button class="quiz-button" onclick="bukaKuis()">
        🧠 Mulai Kuis Hadist
      </button>
    </div>
  </div>

  <!-- HALAMAN KUIS -->
  <div id="halamanKuis">
    <div class="header">
      <h1>🧠 Kuis Hadist Ceria</h1>
    </div>

    <div class="board">
      <div class="quiz-card">
        <button class="back-hadist-btn" onclick="kembaliKeHadist()">
          ← Kembali ke Hadist
        </button>

        <div id="quizBox">
          <div class="score-box">
            ⭐ Skor: <span id="score">0</span>
          </div>

          <p id="questionNumber"></p>
          <h2 id="questionText"></h2>
          <div id="questionEmoji"></div>
          <div id="optionsBox"></div>
          <div id="feedback"></div>

          <button id="nextBtn" class="next-btn" onclick="nextQuestion()">
            ➜ Lanjut
          </button>
        </div>

        <div id="finishBox">
          <div class="finish-emoji">🏆</div>
          <h2 class="finish-title">Hebat!</h2>
          <p id="finalScore" class="finish-score"></p>

          <button class="restart-btn" onclick="restartQuiz()">
            🔄 Main Lagi
          </button>
        </div>
      </div>
    </div>
  </div>

  <!-- MODAL HADIST -->
  <div id="modal" onclick="klikOverlay(event)">
    <div class="modal-box">
      <button class="close-x" onclick="tutup()">
        ✕
      </button>

      <h2 id="judul"></h2>

      <div class="modal-image-box">
        <div id="emojiBesar">📚</div>
      </div>
      
      <div class="audio-box">
        <p>🎬 Tonton video pembelajaran</p>
      
        <video id="videoHadist" controls width="100%" style="border-radius:16px;">
          <source src="" type="video/mp4">
        </video>
      </div>

      <div id="arab"></div>
      <div id="latin"></div>
      <div id="arti"></div>

      <button class="btn-tutup" onclick="tutup()">Tutup</button>
    </div>
  </div>

  <script>
    const hadistList = @json($hadists);

    const quizData = @json($quizzes).map((quiz) => ({
        question: quiz.question,
        audio: quiz.audio ? "/" + quiz.audio : "",
        options: [
            {
                image: quiz.option_a_image ? "/" + quiz.option_a_image : "",
                text: quiz.option_a,
                correct: quiz.correct_answer === "A"
            },
            {
                image: quiz.option_b_image ? "/" + quiz.option_b_image : "",
                text: quiz.option_b,
                correct: quiz.correct_answer === "B"
            },
            {
                image: quiz.option_c_image ? "/" + quiz.option_c_image : "",
                text: quiz.option_c,
                correct: quiz.correct_answer === "C"
            }
        ]
    }));

    function shuffleArray(array) {
        for (let i = array.length - 1; i > 0; i--) {
            const j = Math.floor(Math.random() * (i + 1));
            [array[i], array[j]] = [array[j], array[i]];
        }
    }

    let selectedQuiz = [];
    let currentQuestion = 0;
    let score = 0;
    let answered = false;

    const modal = document.getElementById("modal");
    const videoHadist = document.getElementById("videoHadist");
    const hadistContainer = document.getElementById("hadistContainer");
    const searchInput = document.getElementById("searchInput");

    function renderHadistCards() {
        hadistContainer.innerHTML = "";

        hadistList.forEach((hadist) => {
            const card = document.createElement("div");
            card.className = "hadist-card";
            card.onclick = () => buka(hadist.key);

            card.innerHTML = `
                <div class="icon-box">${hadist.emoji}</div>
                <h3>${hadist.title}</h3>
            `;

            hadistContainer.appendChild(card);
        });
    }

    function buka(key) {
        const hadist = hadistList.find((item) => item.key === key);
        if (!hadist) return;

        document.getElementById("judul").innerText = hadist.title;
        document.getElementById("emojiBesar").innerText = hadist.emoji;
        document.getElementById("arab").innerText = hadist.arab;
        document.getElementById("latin").innerText = hadist.latin;
        document.getElementById("arti").innerText = hadist.arti;

        videoHadist.pause();
        videoHadist.currentTime = 0;

        if (hadist.video) {
            videoHadist.src = "/" + hadist.video;
            videoHadist.load();
        } else {
            videoHadist.removeAttribute("src");
            videoHadist.load();
        }

        modal.style.display = "flex";
    }

    function tutup() {
        videoHadist.pause();
        videoHadist.removeAttribute("src");
        videoHadist.load();
        modal.style.display = "none";
    }

    function klikOverlay(event) {
        if (event.target.id === "modal") tutup();
    }

    function cari() {
        const keyword = searchInput.value.trim().toLowerCase();

        document.querySelectorAll(".hadist-card").forEach((card) => {
            const title = card.querySelector("h3").innerText.toLowerCase();
            card.style.display = title.includes(keyword) ? "" : "none";
        });
    }

    function resetCari() {
        searchInput.value = "";

        document.querySelectorAll(".hadist-card").forEach((card) => {
            card.style.display = "";
        });
    }

    searchInput.addEventListener("keydown", function (event) {
        if (event.key === "Enter") cari();
    });

    function bukaKuis() {
        if (quizData.length === 0) {
            alert("Belum ada quiz. Tambahkan quiz dulu dari admin.");
            return;
        }

        document.getElementById("halamanHadist").style.display = "none";
        document.getElementById("halamanKuis").style.display = "block";

        restartQuiz();
    }

    function kembaliKeHadist() {
        document.getElementById("halamanKuis").style.display = "none";
        document.getElementById("halamanHadist").style.display = "block";
    }

    function loadQuestion() {
        answered = false;

        const q = selectedQuiz[currentQuestion];

        document.getElementById("questionNumber").innerText =
            `Soal ${currentQuestion + 1} dari ${selectedQuiz.length}`;

        let audioHTML = "";

        if (q.audio) {
    audioHTML = `
        <audio class="quiz-audio" controls>
            <source src="${q.audio}">
        </audio>
    `;
}

        document.getElementById("questionText").innerHTML = `
            ${q.question}
            <br>
            ${audioHTML}
        `;

        document.getElementById("questionEmoji").innerHTML = "";

        const optionsBox = document.getElementById("optionsBox");
        optionsBox.innerHTML = "";

        document.getElementById("feedback").innerText = "";
        document.getElementById("nextBtn").style.display = "none";

        const shuffledOptions = [...q.options];
        shuffleArray(shuffledOptions);

        shuffledOptions.forEach((option) => {
            const button = document.createElement("button");
            button.className = "option-btn";

            if (option.image) {
                button.innerHTML = `
                    <img src="${option.image}" class="option-image">
                    <p class="option-text">${option.text}</p>
                `;
            } else {
                button.innerHTML = `
                    <p class="option-text-only">${option.text}</p>
                `;
            }

            button.onclick = () => checkAnswer(button, option.correct);

            optionsBox.appendChild(button);
        });
    }

    

    function checkAnswer(button, correct) {
        if (answered) return;

        answered = true;

        const buttons = document.querySelectorAll(".option-btn");

        buttons.forEach((btn) => {
            btn.disabled = true;
        });

        if (correct) {
            score += 20;
            button.classList.add("correct");

            document.getElementById("score").innerText = score;
            document.getElementById("feedback").innerText = "🎉 Hebat! Jawaban benar";
            document.getElementById("feedback").style.color = "#16a34a";
        } else {
            button.classList.add("wrong");

            document.getElementById("feedback").innerText = "😊 Belum tepat, coba ingat lagi";
            document.getElementById("feedback").style.color = "#dc2626";

            buttons.forEach((btn) => {
                if (btn.onclick && btn !== button) {
                    // warna jawaban benar ditangani lewat option.correct saat klik berikutnya tidak aktif
                }
            });
        }

        document.getElementById("nextBtn").style.display = "inline-block";
    }

    function nextQuestion() {
        currentQuestion++;

        if (currentQuestion < selectedQuiz.length) {
            loadQuestion();
        } else {
            finishQuiz();
        }
    }

    function finishQuiz() {
        document.getElementById("quizBox").style.display = "none";
        document.getElementById("finishBox").style.display = "block";

        document.getElementById("finalScore").innerText =
            `Skor Kamu: ${score} dari ${selectedQuiz.length * 20}`;
    }

    function restartQuiz() {
        currentQuestion = 0;
        score = 0;
        answered = false;

        const copiedQuiz = [...quizData];
        shuffleArray(copiedQuiz);

        selectedQuiz = copiedQuiz.slice(0, 5);

        document.getElementById("score").innerText = "0";
        document.getElementById("quizBox").style.display = "block";
        document.getElementById("finishBox").style.display = "none";

        loadQuestion();
    }

    function goBack() {
        if (document.getElementById("halamanKuis").style.display === "block") {
            kembaliKeHadist();
        } else {
            window.history.back();
        }
    }

    renderHadistCards();
</script>
</body>
</html>