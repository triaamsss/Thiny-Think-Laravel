<!doctype html>
<html lang="id">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Tiny Think - Hafalan Surat Harian</title>

<link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@300..700&display=swap" rel="stylesheet">

<link rel="stylesheet" href="{{ asset('assets/css/suratpendek.css') }}">
</head>

<body>

<div class="container">
<div class="title">
  <img src="{{ asset('assets/images/slider/logo quran.png') }}" class="title-icon">
  Hafalan Surat Harian
  </div>

<div id="list"></div>
</div>
<audio id="audioPlayer"></audio>

<script src="{{ asset('assets/js/suratpendek.js') }}"></script>
<!-- MODAL -->
<div class="modal" id="modal">

  <div class="modal-card">

    <span class="close" onclick="closeModal()">✖</span>

    <div class="modal-title" id="title"></div>

    <div class="surat-total" id="suratTotal"></div>

    <div class="ayat-no" id="ayatNo"></div>

    <div class="modal-arab" id="arab"></div>

    <div class="modal-latin" id="latin"></div>

    <div class="modal-arti" id="arti"></div>

    <div class="btn-group">
  <button class="btn eye" onclick="toggleArti()">👁 Arti</button>

  <button class="btn prev" onclick="prevAyat()">
    ⬅ 
  </button>

  <button class="btn next" onclick="nextAyat()">
     ➡
  </button>

  <button id="playBtn" class="btn play-btn" onclick="playAudio()">
  🔇
</button>

  <button class="btn quiz-btn" onclick="startQuiz()">
  🧩 Quiz
</button>
  
</div>

  </div>

</div>

<!-- FINISH POPUP -->
<div class="finish-popup" id="finishPopup">
  <div class="finish-card">

    <div class="finish-icon">🎉</div>

    <h2>Selamat!</h2>

    <p id="finishText"></p>

    <button onclick="closeFinishPopup()">
      Tutup
    </button>

  </div>
</div>

<!-- QUIZ -->
<div class="modal" id="quizPopup">

  <div class="modal-card">

    <span class="close" onclick="closeQuiz()">✖</span>

      <h2 class="modal-title">
      Quiz Surat Pendek
    </h2>

    <div class="quiz-question" id="quizQuestion"></div>

<button
  id="quizAudioBtn"
  class="btn play-btn quiz-audio-btn"
  onclick="playQuizAudio()"
  style="display:none;"
>
  🔊 Dengarkan Audio
</button>
    <div id="quizOptions"></div>

    <div class="quiz-score" id="quizScore"></div>

    <button class="btn next" onclick="closeQuiz()">
      Tutup Quiz
    </button>

  </div>

</div>

</body>
</html>