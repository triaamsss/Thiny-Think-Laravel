const popup = document.getElementById('hurufPopup');
const popupImg = document.getElementById('popupImg');
const popupName = document.getElementById('popupName');
const popupCheck = document.getElementById('popupCheck');
const audio = document.getElementById('huruf-audio');

const btnPlay = document.getElementById('btnPlayAudio');
const btnPrev = document.getElementById('btnPrev');
const btnNext = document.getElementById('btnNext');
const btnClose = document.getElementById('popupClose');

const items = Array.from(document.querySelectorAll('.huruf-item'));
let currentIndex = 0;

/* OPEN POPUP */
items.forEach((item, index) => {
  item.addEventListener('click', () => {
    currentIndex = index;
    openPopup();
  });
});

function openPopup() {
  const item = items[currentIndex];

  popupImg.src = item.dataset.img;
  popupName.textContent = item.querySelector('img').alt || '';
  audio.src = item.dataset.audio;

  const isDone = item.classList.contains('done');
  popupCheck.classList.toggle('active', isDone);
  btnNext.classList.toggle('disabled', !isDone);

  updateProgress();
  popup.classList.add('active');
}

/* AUDIO */
btnPlay.addEventListener('click', () => {
  audio.currentTime = 0;
  audio.play();

  items[currentIndex].classList.add('done');
  popupCheck.classList.add('active');
  btnNext.classList.remove('disabled');

  updateProgress();
});

/* NEXT */
btnNext.addEventListener('click', () => {
  if (btnNext.classList.contains('disabled')) return;

  animateFlip('next');
  currentIndex = (currentIndex + 1) % items.length;
  setTimeout(openPopup, 260);
});

/* PREV */
btnPrev.addEventListener('click', () => {
  animateFlip('prev');
  currentIndex = (currentIndex - 1 + items.length) % items.length;
  setTimeout(openPopup, 260);
});

/* CLOSE */
btnClose.addEventListener('click', closePopup);
popup.addEventListener('click', e => {
  if (e.target === popup) closePopup();
});

function closePopup() {
  popup.classList.remove('active');
  audio.pause();
}


const popupBook = document.querySelector('.popup-book');

function animateFlip(direction) {
  popupBook.classList.remove('flip-next', 'flip-prev');

  void popupBook.offsetWidth;

  popupBook.classList.add(direction === 'next' ? 'flip-next' : 'flip-prev');
}


const progressBar = document.getElementById('progressBar');

function updateProgress() {
  const doneCount = items.filter(item =>
    item.classList.contains('done')
  ).length;

  const percent = Math.round((doneCount / items.length) * 100);
  progressBar.style.width = percent + '%';
}



