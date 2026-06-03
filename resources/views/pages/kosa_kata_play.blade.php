<!doctype html>
<html lang="id">

<head>
    <<<<<<< HEAD <!--=========================================================BAGIAN 1: INFORMASI DASAR HALAMAN File ini
        adalah halaman game kosakata TinyThink. Isi halaman: pilih kategori -> baca materi -> mulai kuis -> hasil akhir.
        ========================================================== -->
        =======
        >>>>>>> a6459a9454a29f920689b6f9deb724dba47fb55e
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Buat Kata Seru! - TinyThink</title>

        <link
            href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@400;500;600;700;800;900&family=Nunito:wght@700;800;900&display=swap"
            rel="stylesheet" />

        <style>
            <<<<<<< HEAD
            /* =========================================================
        BAGIAN 2: STYLE / CSS
        Berisi tampilan halaman, kartu, tombol, game dan responsif
      ========================================================== */

            /* =========================================================
        2.1 VARIABEL WARNA DAN RESET DASAR
      ========================================================== */
            *,
            *::before,
            *::after {
                box-sizing: border-box;
                margin: 0;
                padding: 0;
            }

            =======

            /* --- Base & Root Colors --- */
            * {
                box-sizing: border-box;
                margin: 0;
                padding: 0;
            }

            >>>>>>>a6459a9454a29f920689b6f9deb724dba47fb55e :root {
                --cream: #fff8ee;
                --warm: #fff0d6;
                --paper: #fffbf4;
                --dark: #2b2040;
                --ink: #3d3260;
                --red: #ff5252;
                --orange: #ff8c42;
                --yellow: #ffd166;
                --green: #06d6a0;
                --teal: #26c6da;
                --blue: #4b9eff;
                --purple: #7c4dff;
                --pink: #ff6eb4;
            }

            body {
                font-family: "Nunito", sans-serif;
                background: var(--cream);
                min-height: 100vh;
                overflow-x: hidden;
            }

            body::before {
                <<<<<<< HEAD content: "";
                position: fixed;
                inset: 0;
                z-index: 0;
                background-image:
                    radial-gradient(circle,
                        rgba(255, 209, 102, 0.18) 2px,
                        transparent 2px),
                    radial-gradient(circle, rgba(255, 82, 82, 0.1) 2px, transparent 2px);
                background-size:
                    40px 40px,
                    60px 60px;
                background-position:
                    0 0,
                    20px 20px;
                pointer-events: none;
            }

            .deco {
                position: fixed;
                z-index: 0;
                pointer-events: none;
            }

            .deco-star {
                font-size: 28px;
                animation: float-star ease-in-out infinite alternate;
                opacity: 0.35;
            }

            @keyframes float-star {
                from {
                    transform: translateY(0) rotate(0deg);
                }

                to {
                    transform: translateY(-16px) rotate(20deg);
                }
            }

            .d1 {
                top: 8%;
                left: 3%;
                animation-duration: 3.2s;
            }

            .d2 {
                top: 15%;
                right: 5%;
                animation-duration: 4.1s;
                animation-delay: -0.8s;
            }

            .d3 {
                top: 45%;
                left: 1%;
                animation-duration: 3.8s;
                animation-delay: -0.4s;
            }

            .d4 {
                top: 60%;
                right: 3%;
                animation-duration: 4.4s;
                animation-delay: -1.2s;
            }

            .d5 {
                top: 80%;
                left: 6%;
                animation-duration: 3.5s;
                animation-delay: -0.6s;
            }

            .d6 {
                top: 85%;
                right: 8%;
                animation-duration: 4s;
                animation-delay: -1.8s;
            }

            /* =========================================================
        3. LAYOUT UTAMA
      ========================================================== */
            .page {
                position: relative;
                z-index: 1;
                min-height: 100vh;
                padding-bottom: 60px;
            }

            /* =========================================================
        4. HEADER, LOGO, TOMBOL ULANG, DAN SKOR BINTANG
      ========================================================== */
            .header {
                background: var(--dark);
                padding: 10px 28px;
                min-height: 75px;
                display: flex;
                align-items: center;
                justify-content: space-between;
                border-bottom: 5px solid var(--yellow);
                position: sticky;
                top: 0;
                z-index: 200;
            }

            .logo-container {
                display: flex;
                flex-direction: column;
                align-items: flex-start;
                text-decoration: none;
                gap: 2px;
            }

            .main-logo {
                max-height: 38px;
                width: auto;
                display: block;
            }

            .logo-sub-text {
                font-family: "Baloo 2", cursive;
                font-size: 12px;
                font-weight: 700;
                color: rgba(255, 255, 255, 0.6);
                letter-spacing: 0.5px;
                margin-left: 2px;
            }

            .header-right {
                display: flex;
                align-items: center;
                gap: 12px;
            }

            .restart-btn {
                height: 42px;
                background: var(--yellow);
                color: var(--dark);
                border: 3px solid rgba(255, 255, 255, 0.25);
                border-radius: 999px;
                display: inline-flex;
                align-items: center;
                justify-content: center;
                gap: 6px;
                padding: 0 14px;
                font-family: "Baloo 2", cursive;
                font-size: 15px;
                font-weight: 900;
                cursor: pointer;
                box-shadow: 0 4px 0 #ff8c42;
                transition:
                    transform 0.15s ease,
                    box-shadow 0.15s ease,
                    background 0.15s ease,
                    color 0.15s ease;
            }

            .restart-btn:hover {
                background: #ff8c42;
                color: white;
                transform: translateY(-2px);
                box-shadow: 0 6px 0 var(--yellow);
            }

            .restart-btn:active {
                transform: translateY(3px);
                box-shadow: 0 1px 0 #ff8c42;
            }

            .restart-icon {
                font-size: 20px;
                line-height: 1;
            }

            .restart-text {
                line-height: 1;
            }

            .star-counter {
                background: rgba(255, 255, 255, 0.1);
                border: 2px solid rgba(255, 255, 255, 0.25);
                border-radius: 99px;
                padding: 6px 16px;
                font-family: "Baloo 2", cursive;
                font-size: 16px;
                font-weight: 700;
                color: white;
                display: flex;
                align-items: center;
                gap: 6px;
            }

            /* =========================================================
        5. TOMBOL BACK BULAT
      ========================================================== */
            .circle-back-btn {
                position: fixed;
                left: 30px;
                top: 100px;
                width: 46px;
                height: 46px;
                background: var(--yellow);
                color: var(--dark);
                border: 3px solid var(--dark);
                border-radius: 50%;
                display: inline-flex;
                align-items: center;
                justify-content: center;
                font-size: 28px;
                font-weight: 900;
                text-decoration: none;
                line-height: 1;
                box-shadow: 0 5px 0 #ff8c42;
                transition:
                    transform 0.15s ease,
                    box-shadow 0.15s ease,
                    background 0.15s ease,
                    color 0.15s ease;
                z-index: 300;
                cursor: pointer;
            }

            .circle-back-btn:hover {
                background: #ff8c42;
                color: white;
                transform: translateY(-2px);
                box-shadow: 0 7px 0 var(--yellow);
            }

            .circle-back-btn:active {
                transform: translateY(3px);
                box-shadow: 0 2px 0 #ff8c42;
            }

            /* =========================================================
        6. HALAMAN PILIH KATEGORI
      ========================================================== */
            .category-screen {
                min-height: calc(100vh - 90px);
                display: flex;
                align-items: center;
                justify-content: center;
                padding: 40px 20px;
            }

            .category-card {
                max-width: 720px;
                width: 100%;
                background: var(--paper);
                border-radius: 32px;
                padding: 42px 30px;
                text-align: center;
                box-shadow: 8px 8px 0 var(--dark);
            }

            .hero-badge {
                display: inline-flex;
                align-items: center;
                gap: 8px;
                background: var(--yellow);
                color: var(--dark);
                border-radius: 99px;
                padding: 7px 22px;
                font-family: "Baloo 2", cursive;
                font-size: 15px;
                font-weight: 700;
                border: 3px solid var(--dark);
                box-shadow: 3px 3px 0 var(--dark);
                margin-bottom: 20px;
            }

            .category-title {
                font-family: "Baloo 2", cursive;
                font-size: clamp(34px, 6vw, 56px);
                font-weight: 900;
                color: var(--dark);
                line-height: 1.1;
                margin: 16px 0 10px;
            }

            .category-desc {
                font-size: 17px;
                color: #666;
                font-weight: 800;
                margin-bottom: 28px;
            }

            .category-menu {
                display: grid;
                grid-template-columns: repeat(2, minmax(180px, 1fr));
                gap: 16px;
            }

            .category-choice {
                border: 4px solid var(--dark);
                border-radius: 22px;
                padding: 22px 16px;
                font-family: "Baloo 2", cursive;
                font-size: 22px;
                font-weight: 900;
                color: white;
                cursor: pointer;
                box-shadow: 5px 5px 0 var(--dark);
                transition:
                    transform 0.15s ease,
                    box-shadow 0.15s ease;
            }

            .category-choice:hover {
                transform: translate(-2px, -3px);
                box-shadow: 7px 8px 0 var(--dark);
            }

            .buah-choice {
                background: var(--orange);
            }

            .hewan-choice {
                background: var(--green);
            }

            .benda-choice {
                background: var(--blue);
            }

            .alam-choice {
                background: var(--teal);
            }

            .pekerjaan-choice {
                background: var(--yellow);
            }

            .transportasi-choice {
                background: var(--red);
            }

            .sayuran-choice {
                background: var(--pink);
            }

            .warna-choice {
                background: var(--purple);
            }

            /* =========================================================
        7. HALAMAN GAME: HERO DAN INFORMASI GAME
      ========================================================== */
            .hero {
                text-align: center;
                padding: 44px 20px 20px;
            }

            .hero h1 {
                font-family: "Baloo 2", cursive;
                font-size: clamp(30px, 5.5vw, 52px);
                font-weight: 800;
                color: var(--dark);
                line-height: 1.15;
                margin-bottom: 10px;
            }

            .hero h1 .wave {
                display: inline-block;
                color: var(--purple);
                -webkit-text-stroke: 2px var(--dark);
                animation: wave-rock 2s ease-in-out infinite;
            }

            @keyframes wave-rock {

                0%,
                100% {
                    transform: rotate(-3deg);
                }

                50% {
                    transform: rotate(3deg);
                }
            }

            .hero p {
                font-size: 17px;
                color: #666;
                font-weight: 700;
                max-width: 480px;
                margin: 0 auto 10px;
            }

            .game-area {
                max-width: 900px;
                margin: 24px auto 0;
                padding: 0 20px;
                display: grid;
                grid-template-rows: auto auto auto;
                gap: 20px;
            }

            /* =========================================================
        8. PROGRESS BAR DAN SKOR GAME
      ========================================================== */
            /* .progress-wrap {
        max-width: 500px;
        margin: 0 auto 4px;
        display: flex;
        align-items: center;
        gap: 12px;
      } */

            /* .progress-track {
        flex: 1;
        height: 14px;
        background: rgba(0, 0, 0, 0.08);
        border-radius: 99px;
        border: 2px solid var(--dark);
        overflow: hidden;
      } */

            /* .progress-fill {
        height: 100%;
        background: linear-gradient(90deg, var(--green), var(--teal));
        border-radius: 99px;
        transition: width 0.5s cubic-bezier(0.34, 1.56, 0.64, 1);
      } */

            /* .progress-label {
        font-family: "Baloo 2", cursive;
        font-size: 14px;
        font-weight: 700;
        color: #888;
        white-space: nowrap;
      } */

            /* .score-row {
        display: flex;
        gap: 12px;
        justify-content: center;
        flex-wrap: wrap;
        max-width: 500px;
        margin: 0 auto;
      } */

            /* .score-card {
        background: white;
        border: 3px solid var(--dark);
        border-radius: 16px;
        padding: 10px 20px;
        text-align: center;
        box-shadow: 3px 3px 0 var(--dark);
        min-width: 100px;
      } */

            /* .sc-label {
        font-size: 12px;
        font-weight: 800;
        color: #aaa;
        letter-spacing: 0.5px;
        text-transform: uppercase;
      } */

            /* .sc-val {
        font-family: "Baloo 2", cursive;
        font-size: 26px;
        font-weight: 800;
        color: var(--dark);
      } */

            /* =========================================================
        9. KARTU GAMBAR TARGET
      ========================================================== */
            /* .picture-card {
        background: var(--paper);
        border: 4px solid var(--dark);
        border-radius: 28px;
        padding: 24px 20px 20px;
        text-align: center;
        box-shadow: 6px 6px 0 var(--dark);
        position: relative;
        animation: card-drop 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
      } */

            @keyframes card-drop {
                from {
                    transform: scale(0.8) translateY(-20px);
                    opacity: 0;
                }

                to {
                    transform: scale(1) translateY(0);
                    opacity: 1;
                }
            }

            .cat-badge {
                position: absolute;
                top: 14px;
                right: 14px;
                padding: 5px 14px;
                border-radius: 99px;
                font-family: "Baloo 2", cursive;
                font-size: 12px;
                font-weight: 700;
                border: 2px solid var(--dark);
                box-shadow: 2px 2px 0 var(--dark);
            }

            /* .pic-label {
        font-family: "Baloo 2", cursive;
        font-size: 13px;
        font-weight: 700;
        color: #999;
        letter-spacing: 1px;
        text-transform: uppercase;
        margin-bottom: 10px;
      } */

            /* .pic-emoji-wrap {
        width: 140px;
        height: 140px;
        margin: 0 auto 16px;
        background: var(--warm);
        border-radius: 50%;
        border: 4px solid var(--dark);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 80px;
        line-height: 1;
        box-shadow: 4px 4px 0 var(--dark);
        animation: emoji-bounce 2.5s ease-in-out infinite;
      } */

            @keyframes emoji-bounce {

                0%,
                100% {
                    transform: scale(1);
                }

                50% {
                    transform: scale(1.06);
                }
            }

            /* .pic-hint {
        font-family: "Baloo 2", cursive;
        font-size: 15px;
        font-weight: 700;
        color: #888;
        margin-bottom: 6px;
      } */

            /* .pic-syllables {
        display: flex;
        gap: 8px;
        justify-content: center;
        flex-wrap: wrap;
        margin-bottom: 6px;
      } */

            /* .syllable-pill {
        background: var(--yellow);
        border: 2px solid var(--dark);
        border-radius: 99px;
        padding: 4px 14px;
        font-family: "Baloo 2", cursive;
        font-size: 15px;
        font-weight: 700;
        color: var(--dark);
        box-shadow: 2px 2px 0 var(--dark);
      } */

            /* .speak-btn {
        background: var(--purple);
        color: white;
        border: 3px solid var(--dark);
        border-radius: 14px;
        padding: 10px 22px;
        font-family: "Baloo 2", cursive;
        font-size: 16px;
        font-weight: 700;
        cursor: pointer;
        box-shadow: 3px 3px 0 var(--dark);
        transition:
          transform 0.1s,
          box-shadow 0.1s;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        margin-top: 12px;
      } */

            .speak-btn:hover {
                transform: translate(-1px, -2px);
                box-shadow: 4px 5px 0 var(--dark);
            }

            /* =========================================================
        10. TEMPAT JAWABAN SUSUN HURUF
      ========================================================== */
            /* .builder-label {
        font-family: "Baloo 2", cursive;
        font-size: 15px;
        font-weight: 700;
        color: #888;
        text-align: center;
        margin-bottom: 10px;
        letter-spacing: 0.5px;
      } */

            /* .answer-tray {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 8px;
        flex-wrap: wrap;
        min-height: 90px;
        background: var(--paper);
        border: 3px dashed #ccc;
        border-radius: var(--card-r);
        padding: 14px 20px;
        position: relative;
        transition:
          border-color 0.2s,
          background 0.2s;
      } */

            .answer-tray.has-letters {
                border-color: var(--dark);
                border-style: solid;
            }

            .answer-tray.correct-flash {
                background: #e8f5e9;
                border-color: var(--green);
            }

            .answer-tray.wrong-flash {
                background: #ffebee;
                border-color: var(--red);
            }

            /* .tray-placeholder {
        font-family: "Baloo 2", cursive;
        font-size: 16px;
        font-weight: 700;
        color: #ccc;
        pointer-events: none;
        user-select: none;
      } */

            /* .answer-slot {
        width: 56px;
        height: 64px;
        background: white;
        border: 3px solid var(--dark);
        border-radius: var(--block-r);
        display: flex;
        align-items: center;
        justify-content: center;
        font-family: "Baloo 2", cursive;
        font-size: 30px;
        font-weight: 800;
        color: var(--dark);
        cursor: pointer;
        box-shadow: var(--block-shadow) var(--dark);
        user-select: none;
        animation: slot-pop 0.25s cubic-bezier(0.34, 1.56, 0.64, 1);
      } */

            @keyframes slot-pop {
                from {
                    transform: scale(0.6);
                    opacity: 0;
                }

                to {
                    transform: scale(1);
                    opacity: 1;
                }
            }

            .answer-slot:hover {
                transform: scale(1.05) translateY(-2px);
                box-shadow: 0 8px 0 var(--dark);
            }

            /* =========================================================
        11. PESAN FEEDBACK DAN TOMBOL AKSI
      ========================================================== */
            /* .feedback-strip {
        text-align: center;
        min-height: 30px;
        font-family: "Baloo 2", cursive;
        font-size: 18px;
        font-weight: 800;
        transition: opacity 0.2s;
      } */

            .feedback-strip.ok {
                color: var(--green);
            }

            .feedback-strip.err {
                color: var(--red);
            }

            .action-row {
                display: flex;
                gap: 12px;
                justify-content: center;
                flex-wrap: wrap;
            }

            .action-btn {
                border: 3px solid var(--dark);
                border-radius: var(--block-r);
                padding: 13px 28px;
                font-family: "Baloo 2", cursive;
                font-size: 18px;
                font-weight: 800;
                cursor: pointer;
                box-shadow: 4px 4px 0 var(--dark);
                transition:
                    transform 0.1s,
                    box-shadow 0.1s;
                display: inline-flex;
                align-items: center;
                gap: 8px;
            }

            .action-btn:hover {
                transform: translate(-2px, -2px);
                box-shadow: 6px 6px 0 var(--dark);
            }

            .action-btn:active {
                transform: translate(2px, 2px);
                box-shadow: 2px 2px 0 var(--dark);
            }

            .btn-check {
                background: var(--green);
                color: white;
            }

            .btn-clear {
                background: var(--warm);
                color: var(--dark);
            }

            .btn-next {
                background: var(--orange);
                color: white;
            }

            .btn-speak2 {
                background: var(--blue);
                color: white;
            }

            /* =========================================================
        12. BLOK HURUF YANG DIKLIK USER
      ========================================================== */
            /* .blocks-label {
        font-family: "Baloo 2", cursive;
        font-size: 15px;
        font-weight: 700;
        color: #888;
        text-align: center;
        margin-bottom: 12px;
        letter-spacing: 0.5px;
      } */

            /* .blocks-grid {
        display: flex;
        gap: 10px;
        justify-content: center;
        flex-wrap: wrap;
        padding: 4px;
      } */

            /* .letter-block {
        width: 62px;
        height: 70px;
        border: 3px solid var(--dark);
        border-radius: var(--block-r);
        display: flex;
        align-items: center;
        justify-content: center;
        font-family: "Baloo 2", cursive;
        font-size: 28px;
        font-weight: 800;
        cursor: pointer;
        box-shadow: var(--block-shadow) var(--dark);
        transition:
          transform 0.12s cubic-bezier(0.34, 1.56, 0.64, 1),
          box-shadow 0.12s,
          opacity 0.2s;
        user-select: none;
        position: relative;
        animation: block-in 0.35s cubic-bezier(0.34, 1.56, 0.64, 1) both;
      } */

            @keyframes block-in {
                from {
                    transform: scale(0.4) rotate(-15deg);
                    opacity: 0;
                }

                to {
                    transform: scale(1) rotate(0deg);
                    opacity: 1;
                }
            }

            .letter-block:hover:not(.used) {
                transform: translateY(-4px) scale(1.06);
                box-shadow: 0 10px 0 var(--dark);
            }

            .letter-block.used {
                opacity: 0.28;
                pointer-events: none;
                transform: scale(0.9);
                box-shadow: 0 2px 0 var(--dark);
            }

            /* .bc0 {
        background: #ff6b6b;
        color: white;
      }
      .bc1 {
        background: #ff8c42;
        color: white;
      }
      .bc2 {
        background: #ffd166;
        color: var(--dark);
      }
      .bc3 {
        background: #06d6a0;
        color: white;
      }
      .bc4 {
        background: #26c6da;
        color: white;
      }
      .bc5 {
        background: #4b9eff;
        color: white;
      }
      .bc6 {
        background: #7c4dff;
        color: white;
      }
      .bc7 {
        background: #ff6eb4;
        color: white;
      }
      .bc8 {
        background: #a8e063;
        color: var(--dark);
      }
      .bc9 {
        background: #ffa5a5;
        color: white;
      } */

            /* .kbd-hint {
        text-align: center;
        font-size: 12px;
        color: #bbb;
        font-weight: 700;
        padding: 8px 0 0;
        letter-spacing: 0.3px;
      } */

            /* =========================================================
            MATERI SEBELUM KUIS
      ========================================================== */
            .materi-wrapper {
                max-width: 860px;
                margin: 40px auto 0;
                background: var(--paper);
                border: 4px solid var(--dark);
                border-radius: 32px;
                padding: 36px 32px;
                text-align: center;
                box-shadow: 8px 8px 0 var(--dark);
            }

            .materi-bridge {
                display: inline-flex;
                align-items: center;
                gap: 8px;
                background: var(--yellow);
                color: var(--dark);
                border-radius: 99px;
                padding: 7px 22px;
                font-family: "Baloo 2", cursive;
                font-size: 15px;
                font-weight: 800;
                border: 3px solid var(--dark);
                box-shadow: 3px 3px 0 var(--dark);
                margin-bottom: 18px;
            }

            .materi-title {
                font-family: "Baloo 2", cursive;
                font-size: clamp(34px, 5vw, 54px);
                font-weight: 900;
                color: var(--dark);
                margin-bottom: 10px;
            }

            .materi-desc {
                max-width: 680px;
                margin: 0 auto 22px;
                font-size: 18px;
                font-weight: 800;
                color: #666;
                line-height: 1.5;
            }

            .materi-box {
                background: #ffffff;
                border: 3px dashed var(--dark);
                border-radius: 24px;
                padding: 22px;
                margin-top: 20px;
            }

            .materi-subtitle {
                font-family: "Baloo 2", cursive;
                font-size: 26px;
                font-weight: 900;
                color: var(--purple);
                margin-bottom: 14px;
            }

            .materi-list {
                display: grid;
                grid-template-columns: repeat(2, minmax(180px, 1fr));
                gap: 14px;
            }

            .materi-item {
                background: var(--warm);
                border: 3px solid var(--dark);
                border-radius: 18px;
                padding: 14px 12px;
                font-family: "Baloo 2", cursive;
                font-size: 21px;
                font-weight: 900;
                color: var(--dark);
                box-shadow: 4px 4px 0 var(--dark);
                cursor: pointer;
            }

            .materi-item:hover {
                background: #fff4c7;
                transform: translate(-2px, -2px);
                box-shadow: 6px 6px 0 var(--dark);
            }

            .materi-kata {
                font-size: 22px;
                font-weight: 900;
            }

            .materi-suku {
                display: block;
                margin-top: 4px;
                font-size: 17px;
                color: var(--orange);
            }

            .materi-note {
                margin-top: 18px;
                font-family: "Baloo 2", cursive;
                font-size: 18px;
                font-weight: 900;
                color: var(--dark);
            }

            @media (max-width: 600px) {
                .materi-list {
                    grid-template-columns: 1fr;
                }

                .materi-wrapper {
                    margin: 30px 16px 0;
                    padding: 28px 20px;
                }
            }


            /* =========================================================
        GAME LENGKAPI SUKU KATA
      ========================================================== */
            #game-screen {
                display: none;
                padding: 32px 20px 0;
            }

            .suku-game-wrapper {
                max-width: 980px;
                margin: 0 auto;
                background: #ffffff;
                border: 5px solid var(--purple);
                border-radius: 30px;
                padding: 28px;
                box-shadow: 8px 8px 0 var(--dark);
            }

            .suku-title-area {
                text-align: center;
                margin-bottom: 20px;
            }

            .suku-title {
                font-family: "Baloo 2", cursive;
                font-size: clamp(42px, 7vw, 72px);
                font-weight: 900;
                line-height: 0.95;
                margin-bottom: 8px;
            }

            .suku-title span:nth-child(2) {
                color: #4b9eff;
                text-shadow: 3px 3px 0 #d9f2ff;
            }

            .suku-title span:nth-child(3) {
                color: #7ed957;
                text-shadow: 3px 3px 0 #fff1a8;
            }

            .suku-title-area p {
                font-size: 18px;
                font-weight: 900;
                color: #444;
            }

            .suku-score-row {
                display: flex;
                justify-content: center;
                gap: 14px;
                margin-bottom: 20px;
                flex-wrap: wrap;
            }

            .suku-score-card {
                background: var(--warm);
                border: 3px solid var(--dark);
                border-radius: 18px;
                padding: 10px 20px;
                font-family: "Baloo 2", cursive;
                font-size: 20px;
                font-weight: 900;
                color: var(--dark);
                box-shadow: 4px 4px 0 var(--dark);
            }

            .suku-board {
                display: grid;
                grid-template-columns: 1fr 150px 1fr;
                gap: 22px;
                align-items: center;
            }

            .suku-cards {
                display: grid;
                gap: 18px;
                justify-items: center;
            }

            .suku-card {
                background: #fff;
                border: 5px solid #ffb6c1;
                border-radius: 16px;
                overflow: hidden;
                width: 255px;
                height: 175px;
                color: #ffb6c1;
            }

            .suku-card.green {
                border-color: #75d85a;
                color: #75d85a;
            }

            .suku-card.yellow {
                border-color: #f1dd3f;
                color: #f1dd3f;
            }

            .suku-card.purple {
                border-color: #a687e8;
                color: #a687e8;
            }

            .suku-image {
                height: 115px;
                width: 100%;
                display: flex;
                align-items: center;
                justify-content: center;
                background: #ffffff;
                border-bottom: 5px solid currentColor;
                overflow: hidden;
                padding: 8px;
                box-sizing: border-box;
            }

            .suku-image img {
                width: 100%;
                height: 100%;
                object-fit: contain;
                display: block;
                padding: 8px;
            }

            .suku-word-row {
                display: grid;
                height: 60px;
            }

            .suku-part {
                display: flex;
                align-items: center;
                justify-content: center;
                font-family: "Baloo 2", cursive;
                font-size: 30px;
                font-weight: 900;
                color: #ff2727;
                background: #ffffff;
                border-right: 4px solid currentColor;
                height: 60px;
                text-align: center;
                padding: 4px;
            }

            .suku-part:last-child {
                border-right: none;
            }

            .suku-blank {
                cursor: pointer;
                background: #fffdf7;
            }

            .suku-blank.active {
                background: #fff1a8;
            }

            .suku-blank.correct {
                background: #d8ffd1;
            }

            .suku-blank.wrong {
                background: #ffd7d7;
                color: #ff2727;
            }

            .suku-options {
                display: flex;
                flex-direction: column;
                gap: 14px;
                justify-content: center;
            }

            .suku-option-btn {
                min-height: 64px;
                background: #ffffff;
                border: 4px solid #d8dfcc;
                border-radius: 14px;
                color: #ff2727;
                font-family: "Baloo 2", cursive;
                font-size: 30px;
                font-weight: 900;
                cursor: pointer;
                box-shadow: 0 4px 0 #d8dfcc;
                transition: 0.15s ease;
            }

            .suku-option-btn:hover {
                transform: translateY(-3px);
                background: #fff5cf;
            }

            .suku-option-btn.used {
                opacity: 0.35;
                pointer-events: none;
            }

            .suku-feedback {
                min-height: 34px;
                text-align: center;
                margin-top: 22px;
                font-family: "Baloo 2", cursive;
                font-size: 24px;
                font-weight: 900;
                color: var(--dark);
            }

            /* =========================================================
GAME SUSUN HURUF
========================================================== */
            .letter-game-wrapper {
                max-width: 860px;
                margin: 40px auto 0;
                background: #ffffff;
                border: 5px solid var(--purple);
                border-radius: 30px;
                padding: 32px;
                box-shadow: 8px 8px 0 var(--dark);
                text-align: center;
            }

            .letter-title-area {
                margin-bottom: 20px;
            }

            .letter-title {
                font-family: "Baloo 2", cursive;
                font-size: clamp(42px, 7vw, 68px);
                font-weight: 900;
                color: var(--dark);
                line-height: 1;
            }

            .letter-title-area p {
                font-size: 18px;
                font-weight: 900;
                color: #555;
            }

            .letter-score-row {
                display: flex;
                justify-content: center;
                gap: 14px;
                margin-bottom: 24px;
                flex-wrap: wrap;
            }

            .letter-score-card {
                background: var(--warm);
                border: 3px solid var(--dark);
                border-radius: 18px;
                padding: 10px 20px;
                font-family: "Baloo 2", cursive;
                font-size: 20px;
                font-weight: 900;
                color: var(--dark);
                box-shadow: 4px 4px 0 var(--dark);
            }

            .letter-card {
                background: var(--paper);
                border: 4px solid var(--dark);
                border-radius: 28px;
                padding: 28px 24px;
                box-shadow: 6px 6px 0 var(--dark);
            }

            .letter-image {
                width: 170px;
                height: 150px;
                margin: 0 auto 14px;
                background: #ffffff;
                border: 4px solid var(--dark);
                border-radius: 22px;
                display: flex;
                align-items: center;
                justify-content: center;
                box-shadow: 5px 5px 0 var(--dark);
                overflow: hidden;
                padding: 10px;
            }

            .letter-image img {
                width: 100%;
                height: 100%;
                object-fit: contain;
                display: block;
            }

            .letter-hint {
                font-family: "Baloo 2", cursive;
                font-size: 20px;
                font-weight: 900;
                color: #666;
                margin-bottom: 8px;
            }

            .letter-suku-hint {
                display: inline-block;
                background: var(--yellow);
                border: 3px solid var(--dark);
                border-radius: 99px;
                padding: 6px 18px;
                font-family: "Baloo 2", cursive;
                font-size: 17px;
                font-weight: 900;
                color: var(--dark);
                margin-bottom: 18px;
                box-shadow: 3px 3px 0 var(--dark);
            }

            .letter-answer {
                min-height: 78px;
                background: #ffffff;
                border: 3px dashed var(--dark);
                border-radius: 20px;
                padding: 12px;
                display: flex;
                justify-content: center;
                gap: 8px;
                flex-wrap: wrap;
                margin-bottom: 20px;
            }

            .answer-letter {
                width: 52px;
                height: 58px;
                border: 3px solid var(--dark);
                border-radius: 14px;
                background: var(--yellow);
                display: flex;
                align-items: center;
                justify-content: center;
                font-family: "Baloo 2", cursive;
                font-size: 30px;
                font-weight: 900;
                color: var(--dark);
                box-shadow: 3px 3px 0 var(--dark);
                cursor: pointer;
            }

            .letter-options {
                display: flex;
                justify-content: center;
                gap: 10px;
                flex-wrap: wrap;
            }

            .letter-option {
                width: 58px;
                height: 64px;
                border: 3px solid var(--dark);
                border-radius: 16px;
                background: var(--orange);
                color: white;
                font-family: "Baloo 2", cursive;
                font-size: 30px;
                font-weight: 900;
                cursor: pointer;
                box-shadow: 4px 4px 0 var(--dark);
                transition: 0.15s ease;
            }

            .letter-option:hover:not(.used) {
                transform: translate(-2px, -3px);
                box-shadow: 6px 7px 0 var(--dark);
            }

            .letter-option.used {
                opacity: 0.3;
                pointer-events: none;
            }

            .letter-feedback {
                min-height: 34px;
                margin-top: 20px;
                font-family: "Baloo 2", cursive;
                font-size: 24px;
                font-weight: 900;
                color: var(--dark);
            }

            @media (max-width: 600px) {
                .letter-option {
                    width: 50px;
                    height: 56px;
                    font-size: 26px;
                }

                .answer-letter {
                    width: 46px;
                    height: 52px;
                    font-size: 26px;
                }
            }

            /* =========================================================
        13. HALAMAN HASIL AKHIR
      ========================================================== */
            #result-screen {
                display: none;
                max-width: 560px;
                margin: 40px auto;
                padding: 0 20px;
                text-align: center;
            }

            .result-card {
                background: var(--paper);
                border: 4px solid var(--dark);
                border-radius: 32px;
                padding: 40px 28px 32px;
                box-shadow: 8px 8px 0 var(--dark);
                animation: card-drop 0.5s cubic-bezier(0.34, 1.56, 0.64, 1);
            }

            .result-emoji {
                font-size: 64px;
                display: block;
                margin-bottom: 14px;
            }

            .result-title {
                font-family: "Baloo 2", cursive;
                font-size: 36px;
                font-weight: 800;
                color: var(--dark);
                margin-bottom: 6px;
            }

            .result-stars {
                font-size: 44px;
                margin: 10px 0 6px;
                letter-spacing: 4px;
            }

            .result-label {
                font-family: "Baloo 2", cursive;
                font-size: 18px;
                font-weight: 900;
                color: #777;
                margin-top: 8px;
            }

            .result-score {
                font-family: "Baloo 2", cursive;
                font-size: 54px;
                font-weight: 800;
                color: var(--orange);
                margin-bottom: 6px;
            }

            .result-msg {
                font-size: 18px;
                font-weight: 800;
                color: #777;
                margin-bottom: 28px;
            }

            .result-btns {
                display: flex;
                gap: 12px;
                justify-content: center;
                flex-wrap: wrap;
            }

            .rbtn {
                border: 3px solid var(--dark);
                border-radius: 16px;
                padding: 13px 26px;
                font-family: "Baloo 2", cursive;
                font-size: 18px;
                font-weight: 800;
                cursor: pointer;
                box-shadow: 4px 4px 0 var(--dark);
                transition:
                    transform 0.1s,
                    box-shadow 0.1s;
                display: inline-flex;
                align-items: center;
                gap: 8px;
            }

            .rbtn:hover {
                transform: translate(-2px, -2px);
                box-shadow: 6px 6px 0 var(--dark);
            }

            .r-yellow {
                background: var(--yellow);
                color: var(--dark);
            }

            .r-blue {
                background: var(--blue);
                color: white;
            }

            .r-green {
                background: var(--green);
                color: white;
            }

            /* =========================================================
        14. CANVAS UNTUK ANIMASI KEMBANG API
      ========================================================== */
            #fwCanvas {
                position: fixed;
                inset: 0;
                pointer-events: none;
                z-index: 999;
            }

            /* =========================================================
        15. RESPONSIVE UNTUK LAYAR KECIL
      ========================================================== */
            @media (max-width: 850px) {
                .suku-board {
                    grid-template-columns: 1fr;
                }

                .suku-options {
                    flex-direction: row;
                    flex-wrap: wrap;
                }

                .suku-option-btn {
                    width: 120px;
                }
            }

            @media (max-width: 600px) {
                .category-menu {
                    grid-template-columns: 1fr;
                }

                .category-card {
                    padding: 30px 20px;
                }
            }

            @media (max-width: 520px) {
                .letter-block {
                    width: 52px;
                    height: 60px;
                    font-size: 24px;
                }

                .answer-slot {
                    width: 48px;
                    height: 56px;
                    font-size: 26px;
                }

                .pic-emoji-wrap {
                    width: 110px;
                    height: 110px;
                    font-size: 60px;
                }
            }

            =======content:"";
            position:fixed;
            inset:0;
            z-index:0;
            background-image: radial-gradient(circle, rgba(255, 209, 102, 0.18) 2px, transparent 2px),
            radial-gradient(circle, rgba(255, 82, 82, 0.1) 2px, transparent 2px);
            background-size: 40px 40px,
            60px 60px;
            background-position: 0 0,
            20px 20px;
            pointer-events:none;
            }

            .page {
                position: relative;
                z-index: 1;
                min-height: 100vh;
                padding-bottom: 60px;
            }

            /* --- Header --- */
            .header {
                background: var(--dark);
                padding: 10px 28px;
                min-height: 75px;
                display: flex;
                align-items: center;
                justify-content: space-between;
                border-bottom: 5px solid var(--yellow);
                position: sticky;
                top: 0;
                z-index: 200;
            }

            .logo-container {
                display: flex;
                flex-direction: column;
                align-items: flex-start;
                gap: 2px;
                text-decoration: none;
            }

            .main-logo {
                max-height: 38px;
                width: auto;
                display: block;
            }

            .logo-sub-text {
                font-family: "Baloo 2", cursive;
                font-size: 12px;
                font-weight: 700;
                color: rgba(255, 255, 255, 0.6);
                letter-spacing: 0.5px;
                margin-left: 2px;
            }

            .header-right {
                display: flex;
                align-items: center;
                gap: 12px;
            }

            .restart-btn {
                height: 42px;
                background: var(--yellow);
                color: var(--dark);
                border: 3px solid rgba(255, 255, 255, 0.25);
                border-radius: 999px;
                display: inline-flex;
                align-items: center;
                justify-content: center;
                gap: 6px;
                padding: 0 14px;
                font-family: "Baloo 2", cursive;
                font-size: 15px;
                font-weight: 900;
                cursor: pointer;
                box-shadow: 0 4px 0 #ff8c42;
            }

            .restart-btn:hover {
                background: #ff8c42;
                color: white;
            }

            .star-counter {
                background: rgba(255, 255, 255, 0.1);
                border: 2px solid rgba(255, 255, 255, 0.25);
                border-radius: 99px;
                padding: 6px 16px;
                font-family: "Baloo 2", cursive;
                font-size: 16px;
                font-weight: 700;
                color: white;
                display: flex;
                align-items: center;
                gap: 6px;
            }

            .circle-back-btn {
                position: fixed;
                left: 30px;
                top: 100px;
                width: 46px;
                height: 46px;
                background: var(--yellow);
                color: var(--dark);
                border: 3px solid var(--dark);
                border-radius: 50%;
                display: inline-flex;
                align-items: center;
                justify-content: center;
                font-size: 28px;
                font-weight: 900;
                box-shadow: 0 5px 0 #ff8c42;
                z-index: 300;
                cursor: pointer;
            }

            /* --- Screens --- */
            section {
                display: none;
                padding: 20px;
            }

            #category-screen {
                display: flex;
                align-items: center;
                justify-content: center;
                min-height: calc(100vh - 90px);
            }

            .category-card {
                max-width: 760px;
                background: var(--paper);
                border-radius: 32px;
                padding: 42px 30px;
                text-align: center;
                box-shadow: 8px 8px 0 var(--dark);
            }

            .hero-badge {
                display: inline-flex;
                align-items: center;
                gap: 8px;
                background: var(--yellow);
                color: var(--dark);
                border-radius: 99px;
                padding: 7px 22px;
                font-family: "Baloo 2", cursive;
                font-size: 15px;
                font-weight: 800;
                border: 3px solid var(--dark);
                box-shadow: 3px 3px 0 var(--dark);
                margin-bottom: 20px;
            }

            .category-title {
                font-family: "Baloo 2", cursive;
                font-size: clamp(34px, 6vw, 56px);
                font-weight: 900;
                color: var(--dark);
                line-height: 1.1;
                margin: 16px 0 10px;
            }

            .category-desc {
                font-size: 17px;
                color: #666;
                font-weight: 800;
                margin-bottom: 28px;
            }

            .category-menu {
                display: grid;
                grid-template-columns: repeat(2, minmax(180px, 1fr));
                gap: 16px;
            }

            .category-choice {
                border: 4px solid var(--dark);
                border-radius: 22px;
                padding: 22px 16px;
                font-family: "Baloo 2", cursive;
                font-size: 22px;
                font-weight: 900;
                color: white;
                cursor: pointer;
                box-shadow: 5px 5px 0 var(--dark);
                transition: transform 0.15s ease, box-shadow 0.15s ease;
            }

            .category-choice:hover {
                transform: translate(-2px, -3px);
                box-shadow: 7px 8px 0 var(--dark);
            }

            .buah-choice {
                background: var(--orange);
            }

            .hewan-choice {
                background: var(--green);
            }

            .benda-choice {
                background: var(--blue);
            }

            .alam-choice {
                background: var(--teal);
            }

            .pekerjaan-choice {
                background: var(--yellow);
                color: var(--dark);
            }

            .transportasi-choice {
                background: var(--red);
            }

            .sayuran-choice {
                background: var(--pink);
            }

            .warna-choice {
                background: var(--purple);
            }

            .empty-kosakata-box {
                grid-column: 1/-1;
                background: #fff0d6;
                border: 3px solid #2b2040;
                border-radius: 18px;
                padding: 24px;
                font-family: "Baloo 2", cursive;
                font-size: 22px;
                font-weight: 900;
                color: #2b2040;
                box-shadow: 4px 4px 0 #2b2040;
            }

            >>>>>>>a6459a9454a29f920689b6f9deb724dba47fb55e
        </style>
</head>

<body>
    <div class="page">
        <header class="header">
            <div class="header-left">
                <a href="{{ url('/') }}" class="logo-container">
                    <img src="{{ asset('assets/images/logo-tinythink.png') }}" alt="TinyThink Logo" class="main-logo" />
                    <span class="logo-sub-text">Buat Kata Seru!</span>
                </a>
            </div>

            <div class="header-right">
                <button id="restartBtn" class="restart-btn" onclick="goHome()">
                    <span>↻</span>
                    <span>Mulai Ulang</span>
                </button>

                <div class="star-counter">
                    <span>⭐</span>
                    <span id="totalStars">0</span>
                </div>
            </div>
        </header>

        <button class="circle-back-btn" onclick="handleBackButton()">←</button>

        <!-- Category Section -->
        <section id="category-screen" class="category-screen">
            <div class="category-card">
                <div class="hero-badge">📚 Modul Kosakata · TK & PAUD</div>
                <h1 class="category-title">Pilih Kategori Kosakata</h1>
                <p class="category-desc">Pilih salah satu kategori untuk menyusun huruf menjadi kata!</p>
                <div class="category-menu" id="categoryMenu"></div>
            </div>
        </section>

        <!-- Materi Section -->
        <section id="materi-screen">
            <div class="materi-wrapper">
                <div class="materi-bridge">📚 Materi Kosakata</div>
                <h1 class="materi-title" id="materiTitle">Materi Kosakata</h1>
                <p class="materi-desc" id="materiDesc">Yuk belajar kosakata terlebih dahulu sebelum mulai kuis!</p>
                <div class="materi-box">
                    <h3 class="materi-subtitle">Contoh Kosakata</h3>
                    <div class="materi-list" id="materiList"></div>
                </div>
                <<<<<<< HEAD <div class="materi-note">Setelah membaca materi, klik tombol mulai kuis ya!
            </div>

            <div class="action-row" style="margin-top: 24px">
                <button class="action-btn btn-clear" onclick="goHome()">
                    ← Kembali
                </button>

                <button class="action-btn btn-next" onclick="startQuizFromMateri()">
                    Mulai Kuis →
                </button>
            </div>
    </div>
    </section>

    <!-- =========================================================
        HALAMAN GAME PUZZLE HURUF - KATEGORI BUAH, HEWAN, BENDA, ALAM
      ========================================================== -->
    <section id="suku-game-screen" style="display: none">
        <div class="suku-game-wrapper">
            <div class="suku-title-area">
                <h1 class="suku-title">
                    <span>Mengenal</span>
                    <span>Suku</span>
                    <span>Kata</span>
                </h1>

                <p id="gameInstruction">
                    Klik kotak kosong, lalu pilih suku kata yang benar!
                </p>
            </div>

            <div class="suku-score-row">
                <div class="suku-score-card">
                    Kategori: <span id="sukuCategoryLabel">Buah</span>
                </div>

                <div class="suku-score-card">
                    Skor: <span id="sukuScore">0</span>
                </div>

                <div class="suku-score-card">
                    Benar: <span id="sukuCorrect">0</span> /
                    <span id="sukuTotal">10</span>
                </div>

                <div class="suku-board">
                    <div class="suku-cards" id="leftSukuCards"></div>
                    <div class="suku-options" id="sukuOptions"></div>
                    <div class="suku-cards" id="rightSukuCards"></div>
                </div>

                <div class="suku-feedback" id="sukuFeedback"></div>

                <div class="action-row" style="margin-top: 20px">
                    <button class="action-btn btn-clear" onclick="resetSukuGame()">
                        🔄 Ulangi
                    </button>

                    <button class="action-btn btn-next" onclick="goHome()">
                        ➡ Kategori Lain
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- =========================================================
        HALAMAN GAME SUSUN HURUF - KATEGORI PEKERJAAN, TRANSPORTASI, SAYURAN, WARNA
      ========================================================== -->
    <section id="letter-game-screen" style="display: none">
        <div class="letter-game-wrapper">
            <div class="letter-title-area">
                <h1 class="letter-title">Susun Huruf</h1>
                <p>Susun huruf-huruf di bawah ini untuk menemukan nama gambar yang tepat!</p>
            </div>

            <div class="letter-score-row">
                <div class="letter-score-card">
                    Kategori: <span id="letterCategoryLabel">Pekerjaan</span>
                </div>

                <div class="letter-score-card">
                    Skor: <span id="letterScore">0</span>
                </div>

                <div class="letter-score-card">
                    Benar: <span id="letterCorrect">0</span> /
                    <span id="letterTotal">6</span>
                </div>
            </div>

            <div class="letter-card">
                <div class="letter-image" id="letterImage">👩‍⚕️</div>

                <div class="letter-hint">
                    Susun nama gambar ini!
                </div>

                <div class="letter-suku-hint" id="letterSukuHint">
                    Petunjuk: dok - ter
                </div>

                <div class="letter-answer" id="letterAnswer"></div>

                <div class="letter-options" id="letterOptions"></div>

                <div class="letter-feedback" id="letterFeedback"></div>

                <div class="action-row" style="margin-top: 20px">
                    <button class="action-btn btn-clear" onclick="clearLetterAnswer()">
                        🗑 Hapus
                    </button>

                    <button class="action-btn btn-check" onclick="checkLetterAnswer()">
                        ✓ Cek Jawaban
                    </button>

                    <button class="action-btn btn-next" onclick="goHome()">
                        ➡ Kategori Lain
                    </button>
                </div>
            </div>
        </div>
    </section>
    <!-- <section id="game-screen">
        <div class="suku-game-wrapper">
          <div class="suku-title-area">
            <h1 class="suku-title">
              <span>Mengenal</span>
              <span>Suku</span>
              <span>Kata</span>
            </h1>
            <p id="gameInstruction">
              Klik kotak kosong, lalu pilih suku kata yang benar!
            </p>
        </div>

        <div class="suku-score-row">
          <div class="suku-score-card">Kategori: <span id="categoryLabel">Buah</span></div>
          <div class="suku-score-card">Skor: <span id="sukuScore">0</span></div>
          <div class="suku-score-card">Benar: <span id="sukuCorrect">0</span> / <span id="sukuTotal">4</span></div>
        </div>

        <div class="suku-board">
          <div class="suku-cards" id="leftSukuCards"></div>
          <div class="suku-options" id="sukuOptions"></div>
          <div class="suku-cards" id="rightSukuCards"></div>
        </div>

        <div class="suku-feedback" id="sukuFeedback"></div>

        <div class="action-row" style="margin-top: 20px">
          <button class="action-btn btn-clear" onclick="resetSukuGame()">🔄 Ulangi</button>
          <button class="action-btn btn-next" onclick="goHome()">➡ Kategori Lain</button>
        </div>
      </div>
</section> -->

    <!-- <section id="game-screen" style="display: none">
        <div class="suku-game-wrapper">
          <div class="suku-title-area">
            <h1 class="suku-title">
              <span>Mengenal</span>
              <span>Suku</span>
              <span>Kata</span>
            </h1>
            <p id="gameInstruction">
              Klik kotak kosong, lalu pilih suku kata yang cocok!
            </p>
          </div>

          <div class="suku-score-row">
            <div class="suku-score-card">
              Kategori: <span id="categoryLabel">Buah</span>
            </div>
            <div class="suku-score-card">Skor</div>
          </div>
        </div> -->
    <!-- Judul halaman game -->
    <!-- <div class="hero">
          <h1>
            Susun <span class="wave">Huruf</span>,<br />Buat Kata Seru! 🎉
          </h1>
          <p>Susunlah huruf-huruf menjadi sebuah kata!</p>
        </div> -->

    <!-- <div class="game-area"> -->
    <!-- Progress dan skor -->
    <!-- <div>
            <div class="progress-wrap">
              <div class="progress-track">
                <div
                  class="progress-fill"
                  id="progFill"
                  style="width: 0%"
                ></div>
              </div>
              <div class="progress-label" id="progLabel">0 / 10</div>
            </div>

            <div class="score-row">
              <div class="score-card">
                <div class="sc-label">Benar</div>
                <div class="sc-val" id="scOk">0</div>
              </div>

              <div class="score-card">
                <div class="sc-label">Percobaan</div>
                <div class="sc-val" id="scTry">0</div>
              </div>

              <div class="score-card">
                <div class="sc-label">Kata</div>
                <div class="sc-val" id="scQ">1 / 10</div>
              </div>
            </div>
          </div> -->

    <!-- Kartu gambar target -->
    <!-- <div class="picture-card" id="picCard">
            <div class="cat-badge" id="catBadge">🍎 Buah</div>
            <div class="pic-label">Apa nama gambar ini?</div>
            <div class="pic-emoji-wrap" id="picEmoji">🍎</div>
            <div class="pic-hint">
              Terdiri dari <strong id="letterCount">4</strong> huruf
            </div>
            <div class="pic-syllables" id="syllablesRow"></div>
            <button class="speak-btn" onclick="speakCurrentWord()">
              🔊 Dengarkan
            </button>
          </div> -->

    <!-- Tempat menyusun jawaban -->
    <!-- <div class="builder-section">
            <div class="builder-label">
              ✏️ Susun kata di sini — ketuk huruf untuk memasukkan
            </div>

            <div class="answer-tray" id="answerTray">
              <div class="tray-placeholder" id="trayPlaceholder">
                Ketuk huruf di bawah 👇
              </div>
            </div>

            <div class="feedback-strip" id="feedback"></div>

            <div class="action-row" style="margin-top: 12px">
              <button class="action-btn btn-check" onclick="checkAnswer()">
                ✓ Cek Jawaban
              </button>

              <button class="action-btn btn-clear" onclick="clearAnswer()">
                🗑 Hapus
              </button>

              <button
                class="action-btn btn-speak2"
                onclick="speakCurrentWord()"
              >
                🔊 Petunjuk Suara
              </button>
            </div>
          </div> -->

    <!-- Blok huruf yang dipilih user -->
    <!-- <div class="blocks-section">
            <div class="blocks-label">🔤 Blok Huruf — ketuk untuk menyusun</div>
            <div class="blocks-grid" id="blocksGrid"></div>
            <div class="kbd-hint">
              💡 Kamu juga bisa ketik huruf di keyboard!
            </div>
          </div> -->
    <!-- </div> -->
    <!-- </section> -->

    <!-- =========================================================
        HALAMAN HASIL AKHIR
      ========================================================== -->
    <section id="result-screen">
        <div class="result-card">
            <span class="result-emoji" id="rEmoji">🏆</span>
            <div class="result-title" id="rTitle">Luar Biasa!</div>
            <div class="result-stars" id="rStars">⭐⭐⭐</div>
            <div class="result-label">Nilai Akhir</div>
            <div class="result-score" id="rScore">100</div>
            <div class="result-msg" id="rMsg">
                Kamu adalah juara kosakata hari ini!
            </div>

            <div class="result-btns">
                <button class="rbtn r-yellow" onclick="retryCurrentGame()">
                    🔄 Coba Lagi
                </button> <button class="rbtn r-green" onclick="goHome()">
                    ➡ Topik Lain
                </button>
                <button class="rbtn r-blue" onclick="goHome()">🏠 Menu</button>
                =======
                <div class="action-row">
                    <button class="action-btn btn-clear" onclick="goHome()">← Kembali</button>
                    <button class="action-btn btn-next" onclick="startQuizFromMateri()">Mulai Kuis →</button>
                    >>>>>>> a6459a9454a29f920689b6f9deb724dba47fb55e
                </div>
            </div>
    </section>
    </div>

    <script>
        << << << < HEAD
        /* ========================================================
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    1. DATA KOSAKATA
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    ========================================================== */
        const DATA = {
            buah: {
                label: "🍎 Buah",
                color: "var(--orange)",
                words: [{
                        kata: "APEL",
                        suku: ["A", "PEL"],
                        emoji: "🍎"
                    },
                    {
                        kata: "PISANG",
                        suku: ["PI", "SANG"],
                        emoji: "🍌"
                    },
                    {
                        kata: "MANGGA",
                        suku: ["MANG", "GA"],
                        emoji: "🥭"
                    },
                    {
                        kata: "JERUK",
                        suku: ["JE", "RUK"],
                        emoji: "🍊"
                    },
                    {
                        kata: "SEMANGKA",
                        suku: ["SE", "MANG", "KA"],
                        emoji: "🍉"
                    },
                    {
                        kata: "ANGGUR",
                        suku: ["ANG", "GUR"],
                        emoji: "🍇"
                    },
                    {
                        kata: "STROBERI",
                        suku: ["STRO", "BER", "I"],
                        emoji: "🍓"
                    },
                    {
                        kata: "NANAS",
                        suku: ["NA", "NAS"],
                        emoji: "🍍"
                    },
                    {
                        kata: "KELAPA",
                        suku: ["KE", "LA", "PA"],
                        emoji: "🥥"
                    },
                    {
                        kata: "ALPUKAT",
                        suku: ["AL", "PU", "KAT"],
                        emoji: "🥑"
                    },
                ],
            },
            ===
            === =
            // --- Data dari backend Laravel ---
            const DATA = @json($data); >>>
            >>> > a6459a9454a29f920689b6f9deb724dba47fb55e

            // State
            let currentCat = null;
            let currentGameType = "suku";

            <<
            << << < HEAD
            benda: {
                label: "🏠 Benda",
                color: "var(--blue)",
                words: [{
                        kata: "BUKU",
                        suku: ["BU", "KU"],
                        emoji: "📚"
                    },
                    {
                        kata: "KURSI",
                        suku: ["KUR", "SI"],
                        emoji: "🪑"
                    },
                    {
                        kata: "MEJA",
                        suku: ["ME", "JA"],
                        emoji: "🪵"
                    },
                    {
                        kata: "PENSIL",
                        suku: ["PEN", "SIL"],
                        emoji: "✏️"
                    },
                    {
                        kata: "TOPI",
                        suku: ["TO", "PI"],
                        emoji: "🎩"
                    },
                    {
                        kata: "SEPATU",
                        suku: ["SE", "PA", "TU"],
                        emoji: "👟"
                    },
                    {
                        kata: "BOLA",
                        suku: ["BO", "LA"],
                        emoji: "⚽"
                    },
                    {
                        kata: "PINTU",
                        suku: ["PIN", "TU"],
                        emoji: "🚪"
                    },
                    {
                        kata: "SENDOK",
                        suku: ["SEN", "DOK"],
                        emoji: "🥄"
                    },
                    {
                        kata: "PIRING",
                        suku: ["PI", "RING"],
                        emoji: "🍽️"
                    },
                ],
            },

            alam: {
                label: "🌿 Alam",
                color: "var(--teal)",
                words: [{
                        kata: "BUNGA",
                        suku: ["BUNG", "A"],
                        emoji: "🌸"
                    },
                    {
                        kata: "POHON",
                        suku: ["PO", "HON"],
                        emoji: "🌳"
                    },
                    {
                        kata: "HUJAN",
                        suku: ["HU", "JAN"],
                        emoji: "🌧️"
                    },
                    {
                        kata: "BINTANG",
                        suku: ["BIN", "TANG"],
                        emoji: "⭐"
                    },
                    {
                        kata: "BULAN",
                        suku: ["BU", "LAN"],
                        emoji: "🌙"
                    },
                    {
                        kata: "MATAHARI",
                        suku: ["MA", "TA", "HA", "RI"],
                        emoji: "☀️"
                    },
                    {
                        kata: "AWAN",
                        suku: ["A", "WAN"],
                        emoji: "☁️"
                    },
                    {
                        kata: "GUNUNG",
                        suku: ["GU", "NUNG"],
                        emoji: "⛰️"
                    },
                    {
                        kata: "LAUT",
                        suku: ["LA", "UT"],
                        emoji: "🌊"
                    },
                    {
                        kata: "API",
                        suku: ["A", "PI"],
                        emoji: "🔥"
                    },
                ],
            },

            pekerjaan: {
                label: "👩‍⚕️ Pekerjaan",
                color: "var(--purple)",
                words: [{
                        kata: "DOKTER",
                        suku: ["DOK", "TER"],
                        emoji: "👨‍⚕️",
                        gambar: "{{ asset('assets/images/kosakata/pekerjaan/dokter.jpg') }}"
                    },
                    {
                        kata: "GURU",
                        suku: ["GU", "RU"],
                        emoji: "👩‍🏫",
                        gambar: "{{ asset('assets/images/kosakata/pekerjaan/guru.png') }}"
                    },
                    {
                        kata: "POLISI",
                        suku: ["PO", "LI", "SI"],
                        emoji: "👮",
                        gambar: "{{ asset('assets/images/kosakata/pekerjaan/polisi.jpg') }}"
                    },
                    {
                        kata: "PETANI",
                        suku: ["PE", "TA", "NI"],
                        emoji: "👨‍🌾",
                        gambar: "{{ asset('assets/images/kosakata/pekerjaan/petani.png') }}"
                    },
                    {
                        kata: "KOKI",
                        suku: ["KO", "KI"],
                        emoji: "👨‍🍳",
                        gambar: "{{ asset('assets/images/kosakata/pekerjaan/koki.jpg') }}"

                    },
                    {
                        kata: "PILOT",
                        suku: ["PI", "LOT"],
                        emoji: "👨‍✈️",
                        gambar: "{{ asset('assets/images/kosakata/pekerjaan/pilot.jpg') }}"
                    },
                    {
                        kata: "MASINIS",
                        suku: ["MA", "SI", "NIS"],
                        emoji: "🚗",
                        gambar: "{{ asset('assets/images/kosakata/pekerjaan/masinis.jpg') }}"
                    },
                    {
                        kata: "NELAYAN",
                        suku: ["NE", "LA", "YAN"],
                        emoji: "🎣",
                        gambar: "{{ asset('assets/images/kosakata/pekerjaan/nelayan.png') }}"
                    },
                    {
                        kata: "PERAWAT",
                        suku: ["PE", "RA", "WAT"],
                        emoji: "🧑‍⚕️",
                        gambar: "{{ asset('assets/images/kosakata/pekerjaan/perawat.png') }}"
                    },
                    {
                        kata: "PEMADAM",
                        suku: ["PE", "MA", "DAM"],
                        emoji: "👨‍🚒",
                        gambar: "{{ asset('assets/images/kosakata/pekerjaan/pemadam.jpg') }}"
                    },
                ],
            },

            transportasi: {
                label: "🚗 Transportasi",
                color: "var(--red)",
                words: [{
                        kata: "MOBIL",
                        suku: ["MO", "BIL"],
                        emoji: "🚗",
                        gambar: "{{ asset('assets/images/kosakata/alat-transportasi/mobil.jpg') }}"
                    },
                    {
                        kata: "MOTOR",
                        suku: ["MO", "TOR"],
                        emoji: "🏍️",
                        gambar: "{{ asset('assets/images/kosakata/alat-transportasi/motor.jpg') }}"

                    },
                    {
                        kata: "BUS",
                        suku: ["BUS"],
                        emoji: "🚌",
                        gambar: "{{ asset('assets/images/kosakata/alat-transportasi/bus.jpg') }}"

                    },
                    {
                        kata: "KERETA",
                        suku: ["KE", "RE", "TA"],
                        emoji: "🚆",
                        gambar: "{{ asset('assets/images/kosakata/alat-transportasi/kereta.jpg') }}"

                    },
                    {
                        kata: "KAPAL",
                        suku: ["KA", "PAL"],
                        emoji: "🚢",
                        gambar: "{{ asset('assets/images/kosakata/alat-transportasi/kapal.jpg') }}"

                    },
                    {
                        kata: "PESAWAT",
                        suku: ["PE", "SA", "WAT"],
                        emoji: "✈️",
                        gambar: "{{ asset('assets/images/kosakata/alat-transportasi/pesawat.jpg') }}"

                    },
                    {
                        kata: "SEPEDA",
                        suku: ["SE", "PE", "DA"],
                        emoji: "🚲",
                        gambar: "{{ asset('assets/images/kosakata/alat-transportasi/sepeda.png') }}"
                    },
                    {
                        kata: "BECAK",
                        suku: ["BE", "CAK"],
                        emoji: "🛺",
                        gambar: "{{ asset('assets/images/kosakata/alat-transportasi/becak.jpg') }}"
                    },
                    {
                        kata: "TRUK",
                        suku: ["TRUK"],
                        emoji: "🚚",
                        gambar: "{{ asset('assets/images/kosakata/alat-transportasi/truk.jpg') }}"
                    },
                    {
                        kata: "TAKSI",
                        suku: ["TAK", "SI"],
                        emoji: "🚕",
                        gambar: "{{ asset('assets/images/kosakata/alat-transportasi/taksi.jpg') }}"
                    },
                ],
            },

            sayuran: {
                label: "🥦 Sayuran",
                color: "var(--green)",
                words: [{
                        kata: "BAYAM",
                        suku: ["BA", "YAM"],
                        emoji: "🥬",
                        gambar: "{{ asset('assets/images/kosakata/sayuran/bayam.jpg') }}"

                    },
                    {
                        kata: "WORTEL",
                        suku: ["WOR", "TEL"],
                        emoji: "🥕",
                        gambar: "{{ asset('assets/images/kosakata/sayuran/wortel.jpg') }}"

                    },
                    {
                        kata: "KUBIS",
                        suku: ["KU", "BIS"],
                        emoji: "🥬",
                        gambar: "{{ asset('assets/images/kosakata/sayuran/kubis.jpg') }}"
                    },
                    {
                        kata: "TOMAT",
                        suku: ["TO", "MAT"],
                        emoji: "🍅",
                        gambar: "{{ asset('assets/images/kosakata/sayuran/tomat.jpg') }}"
                    },
                    {
                        kata: "TIMUN",
                        suku: ["TI", "MUN"],
                        emoji: "🥒",
                        gambar: "{{ asset('assets/images/kosakata/sayuran/timun.jpg') }}"
                    },
                    {
                        kata: "TERONG",
                        suku: ["TE", "RONG"],
                        emoji: "🍆",
                        gambar: "{{ asset('assets/images/kosakata/sayuran/terong.jpg') }}"
                    },
                    {
                        kata: "JAGUNG",
                        suku: ["JA", "GUNG"],
                        emoji: "🌽",
                        gambar: "{{ asset('assets/images/kosakata/sayuran/jagung.jpg') }}"
                    },
                    {
                        kata: "KENTANG",
                        suku: ["KEN", "TANG"],
                        emoji: "🥔",
                        gambar: "{{ asset('assets/images/kosakata/sayuran/kentang.jpg') }}"
                    },
                    {
                        kata: "BROKOLI",
                        suku: ["BRO", "KO", "LI"],
                        emoji: "🥦",
                        gambar: "{{ asset('assets/images/kosakata/sayuran/brokoli.jpg') }}"
                    },
                    {
                        kata: "LABU",
                        suku: ["LA", "BU"],
                        emoji: "🎃",
                        gambar: "{{ asset('assets/images/kosakata/sayuran/labu.jpg') }}"
                    },
                ],
            },

            warna: {
                label: "🎨 Warna",
                color: "var(--pink)",
                words: [{
                        kata: "MERAH",
                        suku: ["ME", "RAH"],
                        emoji: "🔴",
                        gambar: "{{ asset('assets/images/kosakata/warna/merah.jpg') }}"

                    },
                    {
                        kata: "HIJAU",
                        suku: ["HI", "JAU"],
                        emoji: "🟢",
                        gambar: "{{ asset('assets/images/kosakata/warna/hijau.jpg') }}"
                    },
                    {
                        kata: "BIRU",
                        suku: ["BI", "RU"],
                        emoji: "🔵",
                        gambar: "{{ asset('assets/images/kosakata/warna/biru.jpg') }}"
                    },
                    {
                        kata: "KUNING",
                        suku: ["KU", "NING"],
                        emoji: "🟡",
                        gambar: "{{ asset('assets/images/kosakata/warna/kuning.jpg') }}"
                    },
                    {
                        kata: "PUTIH",
                        suku: ["PU", "TIH"],
                        emoji: "⚪",
                        gambar: "{{ asset('assets/images/kosakata/warna/putih.jpg') }}"
                    },
                    {
                        kata: "ABUABU",
                        suku: ["A", "BU", "A", "BU"],
                        emoji: "⚫",
                        gambar: "{{ asset('assets/images/kosakata/warna/abu-abu.jpg') }}"
                    },
                    {
                        kata: "ORANGE",
                        suku: ["O", "RANGE"],
                        emoji: "🟠",
                        gambar: "{{ asset('assets/images/kosakata/warna/oranye.jpg') }}"
                    },
                    {
                        kata: "UNGU",
                        suku: ["U", "NGU"],
                        emoji: "🟣",
                        gambar: "{{ asset('assets/images/kosakata/warna/ungu.jpg') }}"
                    },
                    {
                        kata: "COKLAT",
                        suku: ["COK", "LAT"],
                        emoji: "🟤",
                        gambar: "{{ asset('assets/images/kosakata/warna/coklat.jpg') }}"
                    },
                    {
                        kata: "HITAM",
                        suku: ["HI", "TAM"],
                        emoji: "⚫",
                        gambar: "{{ asset('assets/images/kosakata/warna/hitam.jpg') }}"
                    },
                ],
            },
        };

        // BAGIAN PUZZLE KATA
        const SUKU_DATA = {
            buah: {
                label: "🍎 Buah",
                pilihanSalah: ["ma", "sa", "tu", "fa", "li", "ri", "na", "ko"],
                soal: [{
                        nama: "Jeruk",
                        gambar: "{{ asset('assets/images/kosakata/buah/jeruk.jpg') }}",
                        suku: ["je", "ruk"],
                        kosongIndex: 1,
                        warna: "purple"
                    },
                    {
                        nama: "Apel",
                        gambar: "{{ asset('assets/images/kosakata/buah/jeruk.jpg') }}",
                        suku: ["a", "pel"],
                        kosongIndex: 1,
                        warna: "green"
                    },
                    {
                        nama: "Pisang",
                        gambar: "{{ asset('assets/images/kosakata/buah/pisang.jpg') }}",
                        suku: ["pi", "sang"],
                        kosongIndex: 1,
                        warna: "yellow"
                    },
                    {
                        nama: "Anggur",
                        gambar: "{{ asset('assets/images/kosakata/buah/anggur.jpg') }}",
                        suku: ["ang", "gur"],
                        kosongIndex: 1,
                        warna: "purple"
                    },
                    {
                        nama: "Mangga",
                        gambar: "{{ asset('assets/images/kosakata/buah/mangga.jpg') }}",
                        suku: ["mang", "ga"],
                        kosongIndex: 1,
                        warna: "green"
                    },
                    {
                        nama: "Semangka",
                        gambar: "{{ asset('assets/images/kosakata/buah/semangka.jpg') }}",
                        suku: ["se", "mang", "ka"],
                        kosongIndex: 2,
                        warna: "yellow"
                    },
                    {
                        nama: "Durian",
                        gambar: "{{ asset('assets/images/kosakata/buah/durian.jpg') }}",
                        suku: ["du", "ri", "an"],
                        kosongIndex: 2,
                        warna: "purple"
                    },
                    {
                        nama: "Salak",
                        gambar: "{{ asset('assets/images/kosakata/buah/salak.jpg') }}",
                        suku: ["sa", "lak"],
                        kosongIndex: 1,
                        warna: "green"
                    },
                    {
                        nama: "Melon",
                        gambar: "{{ asset('assets/images/kosakata/buah/melon.jpg') }}",
                        suku: ["me", "lon"],
                        kosongIndex: 1,
                        warna: "yellow"
                    },
                    {
                        nama: "Alpukat",
                        gambar: "{{ asset('assets/images/kosakata/buah/alpukat.jpg') }}",
                        suku: ["al", "pu", "kat"],
                        kosongIndex: 2,
                        warna: "purple"
                    }
                ]
            },
            hewan: {
                label: "🐾 Hewan",
                pilihanSalah: ["ma", "sa", "tu", "fa", "li", "ri", "na", "ko"],
                soal: [{
                        nama: "Kucing",
                        gambar: "{{ asset('assets/images/kosakata/hewan/kucing.jpg') }}",
                        suku: ["ku", "cing"],
                        kosongIndex: 1,
                        warna: "purple"
                    },
                    {
                        nama: "Ayam",
                        gambar: "{{ asset('assets/images/kosakata/hewan/ayam.jpg') }}",
                        suku: ["a", "yam"],
                        kosongIndex: 1,
                        warna: "green"
                    },
                    {
                        nama: "Ikan",
                        gambar: "{{ asset('assets/images/kosakata/hewan/ikan.jpg') }}",
                        suku: ["i", "kan"],
                        kosongIndex: 1,
                        warna: "yellow"
                    },
                    {
                        nama: "Gajah",
                        gambar: "{{ asset('assets/images/kosakata/hewan/gajah.jpg') }}",
                        suku: ["ga", "jah"],
                        kosongIndex: 1,
                        warna: "purple"
                    },
                    {
                        nama: "Kelinci",
                        gambar: "{{ asset('assets/images/kosakata/hewan/kelinci.jpg') }}",
                        suku: ["ke", "lin", "ci"],
                        kosongIndex: 2,
                        warna: "green"
                    },
                    {
                        nama: "Burung",
                        gambar: "{{ asset('assets/images/kosakata/hewan/burung.jpg') }}",
                        suku: ["bu", "rung"],
                        kosongIndex: 1,
                        warna: "yellow"
                    },
                    {
                        nama: "Sapi",
                        gambar: "{{ asset('assets/images/kosakata/hewan/sapi.jpg') }}",
                        suku: ["sa", "pi"],
                        kosongIndex: 1,
                        warna: "purple"
                    },
                    {
                        nama: "Kambing",
                        gambar: "{{ asset('assets/images/kosakata/hewan/kambing.jpg') }}",
                        suku: ["kam", "bing"],
                        kosongIndex: 1,
                        warna: "green"
                    },
                    {
                        nama: "Singa",
                        gambar: "{{ asset('assets/images/kosakata/hewan/singa.jpg') }}",
                        suku: ["si", "nga"],
                        kosongIndex: 1,
                        warna: "yellow"
                    },
                    {
                        nama: "Anjing",
                        gambar: "{{ asset('assets/images/kosakata/hewan/anjing.jpg') }}",
                        suku: ["an", "jing"],
                        kosongIndex: 1,
                        warna: "purple"
                    }
                ]
            },
            benda: {
                label: "🏠 Benda",
                pilihanSalah: ["ma", "sa", "tu", "fa", "li", "ri", "na", "ko"],
                soal: [{
                        nama: "Bola",
                        gambar: "{{ asset('assets/images/kosakata/benda/bola.jpg') }}",
                        suku: ["bo", "la"],
                        kosongIndex: 1,
                        warna: "purple"
                    },
                    {
                        nama: "Buku",
                        gambar: "{{ asset('assets/images/kosakata/benda/buku.jpg') }}",
                        suku: ["bu", "ku"],
                        kosongIndex: 1,
                        warna: "green"
                    },
                    {
                        nama: "Kursi",
                        gambar: "{{ asset('assets/images/kosakata/benda/kursi.jpg') }}",
                        suku: ["kur", "si"],
                        kosongIndex: 1,
                        warna: "yellow"
                    },
                    {
                        nama: "Pintu",
                        gambar: "{{ asset('assets/images/kosakata/benda/pintu.jpg') }}",
                        suku: ["pin", "tu"],
                        kosongIndex: 1,
                        warna: "purple"
                    },
                    {
                        nama: "Piring",
                        gambar: "{{ asset('assets/images/kosakata/benda/piring.jpg') }}",
                        suku: ["pi", "ring"],
                        kosongIndex: 1,
                        warna: "green"
                    },
                    {
                        nama: "Meja",
                        gambar: "{{ asset('assets/images/kosakata/benda/meja.jpg') }}",
                        suku: ["me", "ja"],
                        kosongIndex: 1,
                        warna: "yellow"
                    },
                    {
                        nama: "Pensil",
                        gambar: "{{ asset('assets/images/kosakata/benda/pensil.jpg') }}",
                        suku: ["pen", "sil"],
                        kosongIndex: 1,
                        warna: "purple"
                    },
                    {
                        nama: "Sepatu",
                        gambar: "{{ asset('assets/images/kosakata/benda/sepatu.jpg') }}",
                        suku: ["se", "pa", "tu"],
                        kosongIndex: 2,
                        warna: "green"
                    },
                    {
                        nama: "Sendok",
                        gambar: "{{ asset('assets/images/kosakata/benda/sendok.jpg') }}",
                        suku: ["sen", "dok"],
                        kosongIndex: 1,
                        warna: "yellow"
                    },
                    {
                        nama: "Topi",
                        gambar: "{{ asset('assets/images/kosakata/benda/topi.jpg') }}",
                        suku: ["to", "pi"],
                        kosongIndex: 1,
                        warna: "purple"
                    }
                ]
            },

            alam: {
                label: "🌿 Alam",
                pilihanSalah: ["ma", "sa", "tu", "fa", "li", "ri", "na", "ko"],
                soal: [{
                        nama: "Bunga",
                        gambar: "{{ asset('assets/images/kosakata/alam/bunga.jpg') }}",
                        suku: ["bu", "nga"],
                        kosongIndex: 1,
                        warna: "purple"
                    },
                    {
                        nama: "Pohon",
                        gambar: "{{ asset('assets/images/kosakata/alam/pohon.jpg') }}",
                        suku: ["po", "hon"],
                        kosongIndex: 1,
                        warna: "green"
                    },
                    {
                        nama: "Hujan",
                        gambar: "{{ asset('assets/images/kosakata/alam/hujan.jpg') }}",
                        suku: ["hu", "jan"],
                        kosongIndex: 1,
                        warna: "yellow"
                    },
                    {
                        nama: "Bulan",
                        gambar: "{{ asset('assets/images/kosakata/alam/bulan.jpg') }}",
                        suku: ["bu", "lan"],
                        kosongIndex: 1,
                        warna: "purple"
                    },
                    {
                        nama: "Bintang",
                        gambar: "{{ asset('assets/images/kosakata/alam/bintang.jpg') }}",
                        suku: ["bin", "tang"],
                        kosongIndex: 1,
                        warna: "green"
                    },
                    {
                        nama: "Matahari",
                        gambar: "{{ asset('assets/images/kosakata/alam/matahari.jpg') }}",
                        suku: ["ma", "ta", "ha", "ri"],
                        kosongIndex: 3,
                        warna: "yellow"
                    },
                    {
                        nama: "Awan",
                        gambar: "{{ asset('assets/images/kosakata/alam/awan.jpg') }}",
                        suku: ["a", "wan"],
                        kosongIndex: 1,
                        warna: "purple"
                    },
                    {
                        nama: "Gunung",
                        gambar: "{{ asset('assets/images/kosakata/alam/gunung.jpg') }}",
                        suku: ["gu", "nung"],
                        kosongIndex: 1,
                        warna: "green"
                    },
                    {
                        nama: "Laut",
                        gambar: "{{ asset('assets/images/kosakata/alam/laut.jpg') }}",
                        suku: ["la", "ut"],
                        kosongIndex: 1,
                        warna: "yellow"
                    },
                    {
                        nama: "Api",
                        gambar: "{{ asset('assets/images/kosakata/alam/api.jpg') }}",
                        suku: ["a", "pi"],
                        kosongIndex: 1,
                        warna: "purple"
                    },
                ]
            },
        };

        /* =========================================================
          UNTUK MATERI DATA & AUDIO
        ========================================================== */
        const MATERI_DATA = {
                buah: {
                    title: "🍎 Buah",
                    desc: "Buah adalah makanan sehat yang bersal dari tumbuhan. Ada buah yang rasanya manis, asam, dan segar.",
                    items: [{
                            kata: "Jeruk",
                            suku: "je-ruk",
                            audio: "{{ asset('assets/audio/kosakata/buah/jeruk.mp4') }}"
                        },
                        {
                            kata: "Apel",
                            suku: "a-pel",
                            audio: "{{ asset('assets/audio/kosakata/buah/apel.mp4') }}"
                        },
                        {
                            kata: "Pisang",
                            suku: "pi-sang",
                            audio: "{{ asset('assets/audio/kosakata/buah/pisang.mp4') }}"
                        },
                        {
                            kata: "Semangka",
                            suku: "se-mang-ka",
                            audio: "{{ asset('assets/audio/kosakata/buah/semangka.mp4') }}"
                        },
                        {
                            kata: "Durian",
                            suku: "du-ri-an",
                            audio: "{{ asset('assets/audio/kosakata/buah/durian.mp4') }}"
                        },
                        {
                            kata: "Alpukat",
                            suku: "al-pu-kat",
                            audio: "{{ asset('assets/audio/kosakata/buah/alpukat.mp4') }}"
                        },
                        {
                            kata: "Anggur",
                            suku: "ang-gur",
                            audio: "{{ asset('assets/audio/kosakata/buah/anggur.mp4') }}"
                        },
                        {
                            kata: "Mangga",
                            suku: "mang-ga",
                            audio: "{{ asset('assets/audio/kosakata/buah/mangga.mp4') }}"
                        },
                        {
                            kata: "Salak",
                            suku: "sa-lak",
                            audio: "{{ asset('assets/audio/kosakata/buah/salak.mp4') }}"
                        },
                        {
                            kata: "Melon",
                            suku: "me-lon",
                            audio: "{{ asset('assets/audio/kosakata/buah/melon.mp4') }}"
                        },
                    ]
                },

                hewan: {
                    title: "🐾 Hewan",
                    desc: "Hewan adalah makhluk hidup yang ada di sekitar kita. Hewan dapat hidup di darat, air, atau udara.",
                    items: [{
                            kata: "KUCING",
                            suku: "ku-cing",
                            audio: "{{ asset('assets/audio/kosakata/hewan/kucing.mp4') }}"
                        },
                        {
                            kata: "ANJING",
                            suku: "an-jing",
                            audio: "{{ asset('assets/audio/kosakata/hewan/anjing.mp4') }}"
                        },
                        {
                            kata: "KELINCI",
                            suku: "ke-lin-ci",
                            audio: "{{ asset('assets/audio/kosakata/hewan/kelinci.mp4') }}"
                        },
                        {
                            kata: "GAJAH",
                            suku: "ga-jah",
                            audio: "{{ asset('assets/audio/kosakata/hewan/gajah.mp4') }}"
                        },
                        {
                            kata: "SINGA",
                            suku: "si-nga",
                            audio: "{{ asset('assets/audio/kosakata/hewan/singa.mp4') }}"
                        },
                        {
                            kata: "IKAN",
                            suku: "i-kan",
                            audio: "{{ asset('assets/audio/kosakata/hewan/ikan.mp4') }}"
                        },
                        {
                            kata: "AYAM",
                            suku: "a-yam",
                            audio: "{{ asset('assets/audio/kosakata/hewan/ayam.mp4') }}"
                        },
                        {
                            kata: "SAPI",
                            suku: "sa-pi",
                            audio: "{{ asset('assets/audio/kosakata/hewan/sapi.mp4') }}"
                        },
                        {
                            kata: "KAMBING",
                            suku: "kam-bing",
                            audio: "{{ asset('assets/audio/kosakata/hewan/kambing.mp4') }}"
                        },
                        {
                            kata: "BURUNG",
                            suku: "bu-rung",
                            audio: "{{ asset('assets/audio/kosakata/hewan/burung.mp4') }}"
                        },
                    ]
                },

                benda: {
                    title: "🏠 Benda",
                    desc: "Benda adalah sesuatu yang dapat kita lihat dan gunakan dalam kehidupan sehari-hari.",
                    items: [{
                            kata: "BUKU",
                            suku: "bu-ku",
                            audio: "{{ asset('assets/audio/kosakata/benda/buku.mp4') }}"
                        },
                        {
                            kata: "KURSI",
                            suku: "kur-si",
                            audio: "{{ asset('assets/audio/kosakata/benda/kursi.mp4') }}"
                        },
                        {
                            kata: "MEJA",
                            suku: "me-ja",
                            audio: "{{ asset('assets/audio/kosakata/benda/meja.mp4') }}"
                        },
                        {
                            kata: "PENSIL",
                            suku: "pen-sil",
                            audio: "{{ asset('assets/audio/kosakata/benda/pensil.mp4') }}"
                        },
                        {
                            kata: "TOPI",
                            suku: "to-pi",
                            audio: "{{ asset('assets/audio/kosakata/benda/topi.mp4') }}"
                        },
                        {
                            kata: "SEPATU",
                            suku: "se-pa-tu",
                            audio: "{{ asset('assets/audio/kosakata/benda/sepatu.mp4') }}"
                        },
                        {
                            kata: "BOLA",
                            suku: "bo-la",
                            audio: "{{ asset('assets/audio/kosakata/benda/bola.mp4') }}"
                        },
                        {
                            kata: "PINTU",
                            suku: "pin-tu",
                            audio: "{{ asset('assets/audio/kosakata/benda/pintu.mp4') }}"
                        },
                        {
                            kata: "SENDOK",
                            suku: "sen-dok",
                            audio: "{{ asset('assets/audio/kosakata/benda/sendok.mp4') }}"
                        },
                        {
                            kata: "PIRING",
                            suku: "pi-ring",
                            audio: "{{ asset('assets/audio/kosakata/benda/piring.mp4') }}"
                        },
                    ]
                },

                alam: {
                    title: "🌿 Alam",
                    desc: "Alam adalah lingkungan di sekitar kita, seperti tumbuhan, langit, hujan, bulan, dan bintang.",
                    items: [{
                            kata: "BUNGA",
                            suku: "bu-nga",
                            audio: "{{ asset('assets/audio/kosakata/alam/bunga.mp4') }}"
                        },
                        {
                            kata: "POHON",
                            suku: "po-hon",
                            audio: "{{ asset('assets/audio/kosakata/alam/pohon.mp4') }}"
                        },
                        {
                            kata: "HUJAN",
                            suku: "hu-jan",
                            audio: "{{ asset('assets/audio/kosakata/alam/hujan.mp4') }}"
                        },
                        {
                            kata: "BINTANG",
                            suku: "bin-tang",
                            audio: "{{ asset('assets/audio/kosakata/alam/bintang.mp4') }}"
                        },
                        {
                            kata: "BULAN",
                            suku: "bu-lan",
                            audio: "{{ asset('assets/audio/kosakata/alam/bulan.mp4') }}"
                        },
                        {
                            kata: "MATAHARI",
                            suku: "ma-ta-ha-ri",
                            audio: "{{ asset('assets/audio/kosakata/alam/matahari.mp4') }}"
                        },
                        {
                            kata: "AWAN",
                            suku: "a-wan",
                            audio: "{{ asset('assets/audio/kosakata/alam/awan.mp4') }}"
                        },
                        {
                            kata: "GUNUNG",
                            suku: "gu-nung",
                            audio: "{{ asset('assets/audio/kosakata/alam/gunung.mp4') }}"
                        },
                        {
                            kata: "LAUT",
                            suku: "la-ut",
                            audio: "{{ asset('assets/audio/kosakata/alam/laut.mp4') }}"
                        },
                        {
                            kata: "API",
                            suku: "a-pi",
                            audio: "{{ asset('assets/audio/kosakata/alam/api.mp4') }}"
                        },
                    ]
                },
                pekerjaan: {
                    title: "👩‍⚕️ Pekerjaan",
                    desc: "Pekerjaan adalah kegiatan yang dilakukan seseorang. Setiap pekerjaan memiliki tugas yang berbeda.",
                    items: [{
                            kata: "DOKTER",
                            suku: "dok-ter",
                            audio: "{{ asset('assets/audio/kosakata/pekerjaan/dokter.mp4') }}"
                        },
                        {
                            kata: "GURU",
                            suku: "gu-ru",
                            audio: "{{ asset('assets/audio/kosakata/pekerjaan/guru.mp4') }}"
                        },
                        {
                            kata: "POLISI",
                            suku: "po-li-si",
                            audio: "{{ asset('assets/audio/kosakata/pekerjaan/polisi.mp4') }}"
                        },
                        {
                            kata: "PETANI",
                            suku: "pe-ta-ni",
                            audio: "{{ asset('assets/audio/kosakata/pekerjaan/petani.mp4') }}"
                        },
                        {
                            kata: "KOKI",
                            suku: "ko-ki",
                            audio: "{{ asset('assets/audio/kosakata/pekerjaan/koki.mp4') }}"
                        },
                        {
                            kata: "PILOT",
                            suku: "pi-lot",
                            audio: "{{ asset('assets/audio/kosakata/pekerjaan/pilot.mp4') }}"
                        },
                        {
                            kata: "MASINIS",
                            suku: "ma-si-nis",
                            audio: "{{ asset('assets/audio/kosakata/pekerjaan/masinis.mp4') }}"
                        },
                        {
                            kata: "NELAYAN",
                            suku: "ne-la-yan",
                            audio: "{{ asset('assets/audio/kosakata/pekerjaan/nelayan.mp4') }}"
                        },
                        {
                            kata: "PERAWAT",
                            suku: "pe-ra-wat",
                            audio: "{{ asset('assets/audio/kosakata/pekerjaan/perawat.mp4') }}"
                        },
                        {
                            kata: "PEMADAM",
                            suku: "pe-ma-dam",
                            audio: "{{ asset('assets/audio/kosakata/pekerjaan/pemadam.mp4') }}"
                        },
                    ]
                },

                transportasi: {
                    title: "🚗 Alat Transportasi",
                    desc: "Alat transportasi digunakan untuk berpindah dari satu tempat ke tempat lain.",
                    items: [{
                            kata: "MOBIL",
                            suku: "mo-bil",
                            audio: "{{ asset('assets/audio/kosakata/alat-transportasi/mobil.mp4') }}"
                        },
                        {
                            kata: "MOTOR",
                            suku: "mo-tor",
                            audio: "{{ asset('assets/audio/kosakata/alat-transportasi/motor.mp4') }}"
                        },
                        {
                            kata: "BUS",
                            suku: "bus",
                            audio: "{{ asset('assets/audio/kosakata/alat-transportasi/bus.mp4') }}"
                        },
                        {
                            kata: "KERETA",
                            suku: "ke-re-ta",
                            audio: "{{ asset('assets/audio/kosakata/alat-transportasi/kereta.mp4') }}"
                        },
                        {
                            kata: "KAPAL",
                            suku: "ka-pal",
                            audio: "{{ asset('assets/audio/kosakata/alat-transportasi/kapal.mp4') }}"
                        },
                        {
                            kata: "PESAWAT",
                            suku: "pe-sa-wat",
                            audio: "{{ asset('assets/audio/kosakata/alat-transportasi/pesawat.mp4') }}"
                        },
                        {
                            kata: "SEPEDA",
                            suku: "se-pe-da",
                            audio: "{{ asset('assets/audio/kosakata/alat-transportasi/sepeda.mp4') }}"
                        },
                        {
                            kata: "BECAK",
                            suku: "be-cak",
                            audio: "{{ asset('assets/audio/kosakata/alat-transportasi/becak.mp4') }}"
                        },
                        {
                            kata: "TRUK",
                            suku: "truk",
                            audio: "{{ asset('assets/audio/kosakata/alat-transportasi/truk.mp4') }}"
                        },
                        {
                            kata: "TAKSI",
                            suku: "tak-si",
                            audio: "{{ asset('assets/audio/kosakata/alat-transportasi/taksi.mp4') }}"
                        },
                    ]
                },

                sayuran: {
                    title: "🥦 Sayuran",
                    desc: "Sayuran adalah makanan sehat yang berasal dari tumbuhan. Sayuran baik untuk tubuh.",
                    items: [{
                            kata: "BAYAM",
                            suku: "ba-yam",
                            audio: "{{ asset('assets/audio/kosakata/sayuran/bayam.mp4') }}"
                        },
                        {
                            kata: "WORTEL",
                            suku: "wor-tel",
                            audio: "{{ asset('assets/audio/kosakata/sayuran/wortel.mp4') }}"
                        },
                        {
                            kata: "KUBIS",
                            suku: "ku-bis",
                            audio: "{{ asset('assets/audio/kosakata/sayuran/kubis.mp4') }}"
                        },
                        {
                            kata: "TOMAT",
                            suku: "to-mat",
                            audio: "{{ asset('assets/audio/kosakata/sayuran/tomat.mp4') }}"
                        },
                        {
                            kata: "TIMUN",
                            suku: "ti-mun",
                            audio: "{{ asset('assets/audio/kosakata/sayuran/timun.mp4') }}"
                        },
                        {
                            kata: "TERONG",
                            suku: "te-rong",
                            audio: "{{ asset('assets/audio/kosakata/sayuran/terong.mp4') }}"
                        },
                        {
                            kata: "JAGUNG",
                            suku: "ja-gung",
                            audio: "{{ asset('assets/audio/kosakata/sayuran/jagung.mp4') }}"
                        },
                        {
                            kata: "KENTANG",
                            suku: "ken-tang",
                            audio: "{{ asset('assets/audio/kosakata/sayuran/kentang.mp4') }}"
                        },
                        {
                            kata: "BROKOLI",
                            suku: "bro-ko-li",
                            audio: "{{ asset('assets/audio/kosakata/sayuran/brokoli.mp4') }}"
                        },
                        {
                            kata: "LABU",
                            suku: "la-bu",
                            audio: "{{ asset('assets/audio/kosakata/sayuran/labu.mp4') }}"
                        },
                    ]
                },

                warna: {
                    title: "🎨 Warna",
                    desc: "Warna membuat benda terlihat berbeda dan menarik. Kita dapat mengenal warna dari benda di sekitar.",
                    items: [{
                                kata: "MERAH",
                                suku: "me-rah",
                                audio: "{{ asset('assets/audio/kosakata/warna/merah.mp4') }}"
                            },
                            {
                                kata: "HIJAU",
                                suku: "hi-jau",
                                audio: "{{ asset('assets/audio/kosakata/warna/hijau.mp4') }}"
                            },
                            {
                                kata: "BIRU",
                                suku: "bi-ru",
                                audio: "{{ asset('assets/audio/kosakata/warna/biru.mp4') }}"
                            },
                            {
                                kata: "KUNING",
                                suku: "ku-ning",
                                audio: "{{ asset('assets/audio/kosakata/warna/kuning.mp4') }}"
                            },
                            {
                                kata: "PUTIH",
                                suku: "pu-tih",
                                audio: "{{ asset('assets/audio/kosakata/warna/putih.mp4') }}"
                            },
                            {
                                kata: "ABU-ABU",
                                suku: "a-bu-a-bu",
                                audio: "{{ asset('assets/audio/kosakata/warna/abuabu.mp4') }}"
                            },
                            {
                                kata: "ORANYE",
                                suku: "o-ran-ye",
                                audio: "{{ asset('assets/audio/kosakata/warna/oranye.mp4') }}"
                            },
                            {
                                kata: "UNGU",
                                suku: "u-ngu",
                                audio: "{{ asset('assets/audio/kosakata/warna/ungu.mp4') }}"
                            },
                            {
                                kata: "COKLAT",
                                suku: "cok-lat",
                                audio: "{{ asset('assets/audio/kosakata/warna/coklat.mp4') }}"
                            },
                            {
                                kata: "HITAM",
                                suku: "hi-tam",
                                audio: "{{ asset('assets/audio/kosakata/warna/hitam.mp4') }}"
                            },
                        ] ===
                        === =
                        const categoryMenu = document.getElementById("categoryMenu");
                    const categoryClasses = {
                        buah: "buah-choice",
                        hewan: "hewan-choice",
                        benda: "benda-choice",
                        alam: "alam-choice",
                        pekerjaan: "pekerjaan-choice",
                        transportasi: "transportasi-choice",
                        sayuran: "sayuran-choice",
                        warna: "warna-choice"
                    };

                    const MATERI_DATA = {};
                    Object.keys(DATA).forEach(kategori => {
                        const kategoriData = DATA[kategori];
                        MATERI_DATA[kategori] = {
                            title: kategoriData.label,
                            desc: "Yuk belajar kosakata terlebih dahulu sebelum mulai kuis!",
                            items: kategoriData.words.map(item => ({
                                kata: item.kata,
                                suku: Array.isArray(item.suku) ? item.suku.join(" - ").toLowerCase() :
                                    item.suku,
                                emoji: item.emoji ?? "📚"
                            }))
                        };
                    });

                    function renderCategoryButtons() {
                        if (Object.keys(DATA).length === 0) {
                            categoryMenu.innerHTML = `
                    <div class="empty-kosakata-box">
                        Data kosakata masih kosong. Silakan isi melalui halaman admin terlebih dahulu.
                    </div>
                `;
                            return;
                        }

                        categoryMenu.innerHTML = "";

                        Object.keys(DATA).forEach(kategori => {
                            const button = document.createElement("button");
                            button.className = `category-choice ${categoryClasses[kategori] ?? "buah-choice"}`;
                            button.textContent = DATA[kategori].label ?? kategori;
                            button.onclick = () => showMateri(kategori, DATA[kategori].tipe_game ?? "suku");
                            categoryMenu.appendChild(button);
                        });
                    }

                    function showScreen(screenId) {
                        ["category-screen", "materi-screen"].forEach(id => {
                            const el = document.getElementById(id);
                            if (el) el.style.display = "none";
                        });

                        const target = document.getElementById(screenId);
                        if (target) {
                            if (screenId === "category-screen") target.style.display = "flex";
                            else target.style.display = "block"; >>>
                            >>> > a6459a9454a29f920689b6f9deb724dba47fb55e
                        }
                        window.scrollTo(0, 0);
                    }

                    function showMateri(kategori, tipeGame) {
                        currentCat = kategori;
                        currentGameType = tipeGame;
                        renderMateri(kategori);
                        showScreen("materi-screen");
                    }

                    function renderMateri(categoryName) {
                        const materi = MATERI_DATA[categoryName];
                        if (!materi) {
                            alert("Materi kategori ini belum tersedia.");
                            goHome();
                            return;
                        }

                        document.getElementById("materiTitle").textContent = materi.title;
                        document.getElementById("materiDesc").textContent = materi.desc;

                        const materiList = document.getElementById("materiList");
                        materiList.innerHTML = "";

                        materi.items.forEach(item => {
                            const div = document.createElement("div");
                            div.className = "materi-item";
                            div.innerHTML =
                                `<div>${item.emoji} ${item.kata}</div><span class="materi-suku">${item.suku}</span>`;
                            materiList.appendChild(div);
                        });
                    }

                    <<
                    << << < HEAD
                    let currentMateriAudio = null;

                    function playMateriAudio(audioSrc) {
                        if (!audioSrc) {
                            return;
                        }

                        if (currentMateriAudio) {
                            currentMateriAudio.pause();
                            currentMateriAudio.currentTime = 0;
                        }

                        currentMateriAudio = new Audio(audioSrc);
                        currentMateriAudio.play().catch(() => {
                            console.log("Audio belum bisa diputar.");
                        });
                    }

                    function startQuizFromMateri() {
                        if (selectedGameType === "suku") {
                            startSukuCategory(currentCat);
                        } else {
                            startCategory(currentCat);
                        }
                    }

                    function startSukuCategory(categoryName) {
                        currentCat = categoryName;

                        document.getElementById("category-screen").style.display = "none";
                        document.getElementById("materi-screen").style.display = "none";
                        document.getElementById("suku-game-screen").style.display = "block";
                        document.getElementById("letter-game-screen").style.display = "none";
                        document.getElementById("result-screen").style.display = "none";

                        headerRight.style.display = "flex";

                        resetSukuGame();
                    }

                    function resetSukuGame() {
                        sukuScoreValue = 0;
                        sukuCorrectValue = 0;
                        selectedBlank = null;
                        totalStars = 0;

                        document.getElementById("sukuScore").textContent = sukuScoreValue;
                        document.getElementById("sukuCorrect").textContent = sukuCorrectValue;
                        starsEl.textContent = totalStars;

                        localStorage.setItem("tt_kosa_stars", totalStars);

                        renderSukuGame();
                    }

                    function renderSukuGame() {
                        const category = SUKU_DATA[currentCat] || SUKU_DATA.buah;

                        // acak soal, ambil 5
                        sukuCurrentData = shuffle([...category.soal]).slice(0, 6);

                        const leftSukuCards = document.getElementById("leftSukuCards");
                        const rightSukuCards = document.getElementById("rightSukuCards");
                        const sukuOptions = document.getElementById("sukuOptions");
                        const sukuFeedback = document.getElementById("sukuFeedback");

                        document.getElementById("sukuCategoryLabel").textContent = category.label;
                        document.getElementById("sukuScore").textContent = sukuScoreValue;
                        document.getElementById("sukuCorrect").textContent = sukuCorrectValue;
                        document.getElementById("sukuTotal").textContent = sukuCurrentData.length;

                        leftSukuCards.innerHTML = "";
                        rightSukuCards.innerHTML = "";
                        sukuOptions.innerHTML = "";
                        sukuFeedback.textContent = "";

                        selectedBlank = null;

                        sukuCurrentData.forEach((item, index) => {
                            const card = document.createElement("div");
                            card.className = `suku-card ${item.warna}`;

                            // jawaban benar diambil dari suku yang dikosongkan
                            const jawabanBenar = item.suku[item.kosongIndex];

                            // buat kotak suku kata sesuai jumlah array
                            const partsHTML = item.suku.map((bagian, i) => {
                                if (i === item.kosongIndex) {
                                    return `
                    <div
                        class="suku-part suku-blank"
                        data-answer="${jawabanBenar}"
                        onclick="selectSukuBlank(this)"
                    ></div>
                `;
                                } else {
                                    return `<div class="suku-part">${bagian}</div>`;
                                }
                            }).join("");

                            card.innerHTML = `
            <div class="suku-image">
                <img src="${item.gambar}" alt="${item.nama}">
            </div>

            <div class="suku-word-row" style="grid-template-columns: repeat(${item.suku.length}, 1fr);">
                ${partsHTML}
            </div>
        `;

                            if (index < Math.ceil(sukuCurrentData.length / 2)) {
                                leftSukuCards.appendChild(card);
                            } else {
                                rightSukuCards.appendChild(card);
                            }
                        });

                        // pilihan jawaban benar
                        const correctChoices = sukuCurrentData.map((item) => item.suku[item.kosongIndex]);

                        // gabungkan dengan pilihan salah
                        const MAX_OPTIONS = 10;

                        const wrongChoices = shuffle([...category.pilihanSalah]).slice(
                            0,
                            Math.max(0, MAX_OPTIONS - correctChoices.length)
                        );

                        const allChoices = shuffle([...correctChoices, ...wrongChoices]);

                        allChoices.forEach((choice) => {
                            const button = document.createElement("button");
                            button.className = "suku-option-btn";
                            button.textContent = choice;

                            button.onclick = function() {
                                chooseSukuAnswer(button, choice);
                            };

                            sukuOptions.appendChild(button);
                        });
                    }

                    function selectSukuBlank(blankElement) {
                        if (blankElement.classList.contains("correct")) {
                            return;
                        }

                        document.querySelectorAll(".suku-blank").forEach((blank) => {
                            blank.classList.remove("active");
                        });

                        selectedBlank = blankElement;
                        selectedBlank.classList.add("active");

                        document.getElementById("sukuFeedback").textContent =
                            "Sekarang pilih suku kata di tengah ya!";
                    }

                    function chooseSukuAnswer(button, choice) {
                        const sukuFeedback = document.getElementById("sukuFeedback");

                        if (!selectedBlank) {
                            sukuFeedback.textContent = "Klik kotak kosong dulu ya 😊";
                            return;
                        }

                        const correctAnswer = selectedBlank.dataset.answer;

                        // Isi kotak dengan jawaban yang dipilih user
                        selectedBlank.textContent = choice;

                        // Tombol pilihan dibuat tidak bisa dipkai lagi
                        button.classList.add("used");

                        if (choice === correctAnswer) {
                            selectedBlank.classList.remove("active", "wrong");
                            selectedBlank.classList.add("correct");

                            sukuScoreValue += 10;
                            sukuCorrectValue++;
                            totalStars += 10;

                            document.getElementById("sukuScore").textContent = sukuScoreValue;
                            document.getElementById("sukuCorrect").textContent = sukuCorrectValue;

                            starsEl.textContent = totalStars;
                            localStorage.setItem("tt_kosa_stars", totalStars);

                            sukuFeedback.textContent = "Jawaban kamu benar!";
                        } else {
                            selectedBlank.classList.remove("active", "correct");
                            selectedBlank.classList.add("wrong");

                            sukuFeedback.textContent = `Belum tepat. Jawaban yang benar adalah "${correctAnswer}"`;
                        }

                        selectedBlank = null;

                        const answeredCount = document.querySelectorAll(
                            ".suku-blank.correct, .suku-blank.wrong"
                        ).length;

                        if (answeredCount === sukuCurrentData.length) {
                            setTimeout(showSukuResult, 1000);
                        }
                    }

                    function showSukuResult() {
                        document.getElementById("suku-game-screen").style.display = "none";
                        document.getElementById("letter-game-screen").style.display = "none";
                        document.getElementById("result-screen").style.display = "block";

                        constSoal = sukuCurrentData.length;
                        const nilaiAkhir = Math.round(
                            (sukuCorrectValue / sukuCurrentData.length) * 100
                        );

                        // const maxScore = sukuCurrentData.length * 10;
                        let emoji = "💪";
                        let title = "Ayo Coba Lagi!";
                        let stars = "⭐";
                        let message = `Kamu menjawab benar ${sukuCorrectValue} dari ${sukuCurrentData.length} soal!`;

                        if (nilaiAkhir === 100) {
                            emoji = "🏆";
                            title = "Hebat Sekali!";
                            stars = "⭐⭐⭐";
                            // message = "Kamu juara kosakata hari ini!";
                        } else if (nilaiAkhir >= 70) {
                            emoji = "🎉";
                            title = "Bagus Sekali!";
                            stars = "⭐⭐";
                            // message = "Hampir sempurna, coba lagi ya!";
                        } else if (nilaiAkhir >= 40) {
                            emoji = "😊";
                            title = "Cukup Bagus!";
                            stars = "⭐";
                            // message = "Latihan lagi untuk jadi lebih baik!";
                        } else {
                            emoji = "😊";
                            title = "Coba lagi ya!";
                            stars = "⭐";
                            // message = "Latihan lagi untuk jadi lebih baik!";
                        }
                        document.getElementById("rEmoji").textContent = emoji;
                        document.getElementById("rTitle").textContent = title;
                        document.getElementById("rStars").textContent = stars;
                        document.getElementById("rScore").textContent = nilaiAkhir;
                        // sukuScoreValue + " / " + maxScore;
                        document.getElementById("rMsg").textContent = message;
                    }

                    function startCategory(categoryName) {
                        currentCat = categoryName;

                        document.getElementById("category-screen").style.display = "none";
                        document.getElementById("materi-screen").style.display = "none";
                        document.getElementById("suku-game-screen").style.display = "none";
                        document.getElementById("letter-game-screen").style.display = "block";
                        document.getElementById("result-screen").style.display = "none";

                        headerRight.style.display = "flex";

                        resetLetterGame();
                    }

                    function resetLetterGame() {
                        const category = DATA[currentCat] || DATA.pekerjaan;

                        letterCurrentData = shuffle([...category.words]).slice(0, 5);
                        letterIndex = 0;
                        letterScoreValue = 0;
                        letterCorrectValue = 0;
                        letterAnswerValue = [];
                        letterUsedIndexes = [];
                        totalStars = 0;

                        document.getElementById("letterCategoryLabel").textContent = category.label;
                        document.getElementById("letterScore").textContent = letterScoreValue;
                        document.getElementById("letterCorrect").textContent = letterCorrectValue;
                        document.getElementById("letterTotal").textContent = letterCurrentData.length;

                        starsEl.textContent = totalStars;
                        localStorage.setItem("tt_kosa_stars", totalStars);

                        renderLetterQuestion();
                    }

                    function renderLetterQuestion() {
                        currentLetterQuestion = letterCurrentData[letterIndex];

                        if (!currentLetterQuestion) {
                            showLetterResult();
                            return;
                        }

                        letterAnswerValue = [];
                        letterUsedIndexes = [];

                        const letterImage = document.getElementById("letterImage");
                        const letterAnswer = document.getElementById("letterAnswer");
                        const letterOptions = document.getElementById("letterOptions");
                        const letterFeedback = document.getElementById("letterFeedback");
                        const letterSukuHint = document.getElementById("letterSukuHint");

                        letterAnswer.innerHTML = "";
                        letterOptions.innerHTML = "";
                        letterFeedback.textContent = "";

                        letterImage.innerHTML = `
            <img src="${currentLetterQuestion.gambar}" alt="${currentLetterQuestion.kata}">
            `;
                        letterSukuHint.textContent = "Petunjuk: " + currentLetterQuestion.suku.join(" - ");

                        const letters = shuffle(currentLetterQuestion.kata.split(""));

                        letters.forEach((letter, index) => {
                            const button = document.createElement("button");
                            button.className = "letter-option";
                            button.textContent = letter;

                            button.onclick = function() {
                                chooseLetter(button, letter, index);
                            };

                            letterOptions.appendChild(button);
                        });
                    }

                    function chooseLetter(button, letter, index) {
                        if (letterUsedIndexes.includes(index)) {
                            return;
                        }

                        letterUsedIndexes.push(index);
                        letterAnswerValue.push({
                            letter: letter,
                            index: index
                        });

                        button.classList.add("used");

                        renderLetterAnswer();

                        if (letterAnswerValue.length === currentLetterQuestion.kata.length) {
                            setTimeout(checkLetterAnswer, 400);
                        }
                    }

                    function renderLetterAnswer() {
                        const letterAnswer = document.getElementById("letterAnswer");
                        letterAnswer.innerHTML = "";

                        letterAnswerValue.forEach((item, answerIndex) => {
                            const div = document.createElement("div");
                            div.className = "answer-letter";
                            div.textContent = item.letter;

                            div.onclick = function() {
                                removeLetterAnswer(answerIndex);
                            };

                            letterAnswer.appendChild(div);
                        });
                    }

                    function removeLetterAnswer(answerIndex) {
                        const removed = letterAnswerValue[answerIndex];

                        letterAnswerValue.splice(answerIndex, 1);
                        letterUsedIndexes = letterUsedIndexes.filter((item) => item !== removed.index);

                        const optionButtons = document.querySelectorAll(".letter-option");
                        if (optionButtons[removed.index]) {
                            optionButtons[removed.index].classList.remove("used");
                        }

                        renderLetterAnswer();
                        document.getElementById("letterFeedback").textContent = "";
                    }

                    function clearLetterAnswer() {
                        letterAnswerValue = [];
                        letterUsedIndexes = [];

                        document.querySelectorAll(".letter-option").forEach((button) => {
                            button.classList.remove("used");
                        });

                        renderLetterAnswer();
                        document.getElementById("letterFeedback").textContent = "";
                    }

                    function checkLetterAnswer() {
                        const letterFeedback = document.getElementById("letterFeedback");

                        if (!currentLetterQuestion) {
                            return;
                        }

                        if (letterAnswerValue.length < currentLetterQuestion.kata.length) {
                            letterFeedback.textContent = "Susun hurufnya sampai lengkap dulu ya 😊";
                            return;
                        }

                        const userAnswer = letterAnswerValue.map((item) => item.letter).join("");
                        const correctAnswer = currentLetterQuestion.kata;

                        if (userAnswer === correctAnswer) {
                            letterScoreValue += 10;
                            letterCorrectValue++;
                            totalStars += 10;

                            document.getElementById("letterScore").textContent = letterScoreValue;
                            document.getElementById("letterCorrect").textContent = letterCorrectValue;

                            starsEl.textContent = totalStars;
                            localStorage.setItem("tt_kosa_stars", totalStars);

                            letterFeedback.textContent = "Benar! Hebat sekali 🎉";
                        } else {
                            letterFeedback.textContent = `Belum tepat. Jawaban yang benar adalah ${correctAnswer}`;
                        }

                        setTimeout(() => {
                            letterIndex++;

                            if (letterIndex >= letterCurrentData.length) {
                                showLetterResult();
                            } else {
                                renderLetterQuestion();
                            }
                        }, 1200);
                    }

                    function showLetterResult() {
                        document.getElementById("suku-game-screen").style.display = "none";
                        document.getElementById("letter-game-screen").style.display = "none";
                        document.getElementById("result-screen").style.display = "block";

                        const totalSoal = letterCurrentData.length;
                        const nilaiAkhir = Math.round((letterCorrectValue / totalSoal) * 100);

                        let emoji = "💪";
                        let title = "Ayo Coba Lagi!";
                        let stars = "⭐";
                        let message = `Kamu menjawab benar ${letterCorrectValue} dari ${totalSoal} soal!`;

                        if (nilaiAkhir === 100) {
                            emoji = "🏆";
                            title = "Hebat Sekali!";
                            stars = "⭐⭐⭐";
                        } else if (nilaiAkhir >= 70) {
                            emoji = "🎉";
                            title = "Bagus Sekali!";
                            stars = "⭐⭐";
                        } else if (nilaiAkhir >= 40) {
                            emoji = "😊";
                            title = "Cukup Bagus!";
                            stars = "⭐";
                        } else {
                            emoji = "💪";
                            title = "Coba Lagi Ya!";
                            stars = "⭐";
                        }

                        document.getElementById("rEmoji").textContent = emoji;
                        document.getElementById("rTitle").textContent = title;
                        document.getElementById("rStars").textContent = stars;
                        document.getElementById("rScore").textContent = nilaiAkhir;
                        document.getElementById("rMsg").textContent = message;
                    }

                    function switchCategory(categoryName) {
                        currentCat = categoryName;
                        wordList = shuffle(DATA[categoryName].words.slice());
                        wordIndex = 0;
                        score = 0;
                        tries = 0;
                        totalStars = 0;

                        starsEl.textContent = totalStars;
                        localStorage.setItem("tt_kosa_stars", totalStars);

                        updateScoreboard();
                        loadWord();
                    }

                    ===
                    === = >>>
                    >>> > a6459a9454a29f920689b6f9deb724dba47fb55e

                    function goHome() {
                        currentCat = null;
                        currentGameType = "suku";
                        document.getElementById("totalStars").textContent = 0;
                        showScreen("category-screen");
                    }

                    renderCategoryButtons();
    </script>
</body>

</html>
