<!doctype html>
<html lang="id">

<head>
    <!-- =========================================================
      INFORMASI DASAR HALAMAN
      File ini adalah halaman game kosakata TinyThink.
      Isi halaman: pilih kategori -> susun huruf -> hasil akhir.
    ========================================================== -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Buat Kata Seru! - TinyThink</title>

    <!-- Font dari Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@400;500;600;700;800&family=Nunito:wght@700;800;900&display=swap"
        rel="stylesheet" />

    <style>
        /* =========================================================
        1. VARIABEL WARNA DAN RESET DASAR
      ========================================================== */
        *,
        *::before,
        *::after {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        :root {
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

            --block-shadow: 0 6px 0;
            --card-r: 20px;
            --block-r: 16px;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: "Nunito", sans-serif;
            background: var(--cream);
            min-height: 100vh;
            overflow-x: hidden;
            cursor: default;
        }

        /* =========================================================
        2. BACKGROUND POLKADOT DAN DEKORASI
      ========================================================== */
        body::before {
            content: "";
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
        }

        .suku-card {
            background: #fff;
            border: 5px solid #ffb6c1;
            border-radius: 16px;
            overflow: hidden;
            min-height: 210px;
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
            height: 145px;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #ffffff;
            border-bottom: 5px solid currentColor;
            overflow: hidden;
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
            min-height: 58px;
        }

        .suku-part {
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: "Baloo 2", cursive;
            font-size: 34px;
            font-weight: 900;
            color: #ff2727;
            background: #ffffff;
            border-right: 4px solid currentColor;
            min-height: 58px;
            text-align: center;
            padding: 6px;
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
            width: 150px;
            height: 150px;
            margin: 0 auto 14px;
            background: var(--warm);
            border: 4px solid var(--dark);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 82px;
            box-shadow: 5px 5px 0 var(--dark);
        }

        .letter-image img {
            max-width: 120px;
            max-height: 120px;
            object-fit: contain;
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
    </style>
</head>

<body>
    <!-- Canvas khusus untuk efek fireworks saat jawaban benar / hasil bagus -->
    <canvas id="fwCanvas"></canvas>

    <!-- Dekorasi kecil yang melayang di background -->
    <div class="deco deco-star d1">⭐</div>
    <div class="deco deco-star d2">🌟</div>
    <div class="deco deco-star d3">✨</div>
    <div class="deco deco-star d4">💫</div>
    <div class="deco deco-star d5">🎈</div>
    <div class="deco deco-star d6">🎀</div>

    <div class="page">
        <!-- =========================================================
        HEADER WEBSITE
        Berisi logo, tombol mulai ulang, dan jumlah bintang.
      ========================================================== -->
        <header class="header">
            <div class="header-left">
                <a href="{{ url('/') }}" class="logo-container"> <img
                        src="{{ asset('assets/images/logo-tinythink.png') }}" alt="TinyThink Logo" class="main-logo" />
                    <span class="logo-sub-text">Buat Kata Seru!</span>
                </a>
            </div>

            <div class="header-right" id="headerRight">
                <button id="restartBtn" class="restart-btn" title="Mulai ulang latihan">
                    <span class="restart-icon">↻</span>
                    <span class="restart-text">Mulai Ulang</span>
                </button>

                <div class="star-counter">
                    <span>⭐</span>
                    <span id="totalStars">0</span>
                </div>
            </div>
        </header>

        <!-- Tombol kembali. Saat di kategori, tombol ini kembali ke halaman sebelumnya. Saat di game, kembali ke kategori. -->
        <button class="circle-back-btn" title="Kembali" onclick="handleBackButton()">
            ←
        </button>

        <!-- =========================================================
        HALAMAN PILIH KATEGORI
      ========================================================== -->
        <section id="category-screen" class="category-screen">
            <div class="category-card">
                <div class="hero-badge">📚 Modul Kosakata · TK & PAUD</div>

                <h1 class="category-title">
                    Pilih Kategori <br />
                    Kosakata
                </h1>

                <p class="category-desc">
                    Pilih salah satu kategori untuk menyusun huruf menjadi kata!
                </p>

                <!-- KATEGORI -->
                <div class="category-menu">
                    <button class="category-choice buah-choice" onclick="showMateri('buah', 'suku')"> 🍎
                        Buah-buahan</button>
                    <button class="category-choice hewan-choice" onclick="showMateri('hewan', 'suku')"> 🐾
                        Hewan</button>
                    <button class="category-choice benda-choice" onclick="showMateri('benda', 'suku' )"> 🏠
                        Benda</button>
                    <button class="category-choice alam-choice" onclick="showMateri('alam', 'suku')"> 🌿 Alam</button>

                    <button class="category-choice pekerjaan-choice" onclick="showMateri('pekerjaan', 'letter')"> 👩‍⚕️
                        Pekerjaan</button>
                    <button class="category-choice transportasi-choice" onclick="showMateri('transportasi', 'letter')">
                        🚗 Alat Transportasi</button>
                    <button class="category-choice sayuran-choice" onclick="showMateri('sayuran', 'letter')"> 🥦
                        Sayuran</button>
                    <button class="category-choice warna-choice" onclick="showMateri('warna', 'letter')"> 🎨
                        Warna</button>

                </div>
        </section>

        <!-- =========================================================
        HALAMAN MATERI KATEGORI KOSAKATA SEBELUM HALAMAN KUIS
      ========================================================== -->
        <section id="materi-screen" style="display: none">
            {{-- Materi Kategori --}}
            <div class="materi-wrapper">
                <div class="materi-bridge">📚 Materi Kosakata</div>
                <h1 class="materi-title" id="materiTitle">Buah-buahan</h1>

                <p class="materi-desc" id="materiDesc">Yuk belajar kosakata terlebih dahulu sebelum mulai kuis!</p>

                <div class="materi-box">
                    <h3 class="materi-subtitle">Contoh Kosakata</h3>
                    <div class="materi-list" id="materiList"></div>
                </div>

                <div class="materi-note">Setelah membaca materi, klik tombol mulai kuis ya!</div>

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
                    <p>Susun huruf acak menjadi nama gambar yang benar!</p>
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
                </div>
            </div>
        </section>
    </div>

    <script>
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

            hewan: {
                label: "🐾 Hewan",
                color: "var(--green)",
                words: [{
                        kata: "KUCING",
                        suku: ["KU", "CING"],
                        emoji: "🐱"
                    },
                    {
                        kata: "ANJING",
                        suku: ["AN", "JING"],
                        emoji: "🐶"
                    },
                    {
                        kata: "KELINCI",
                        suku: ["KE", "LIN", "CI"],
                        emoji: "🐰"
                    },
                    {
                        kata: "GAJAH",
                        suku: ["GA", "JAH"],
                        emoji: "🐘"
                    },
                    {
                        kata: "SINGA",
                        suku: ["SI", "NGA"],
                        emoji: "🦁"
                    },
                    {
                        kata: "IKAN",
                        suku: ["I", "KAN"],
                        emoji: "🐟"
                    },
                    {
                        kata: "AYAM",
                        suku: ["A", "YAM"],
                        emoji: "🐔"
                    },
                    {
                        kata: "SAPI",
                        suku: ["SA", "PI"],
                        emoji: "🐄"
                    },
                    {
                        kata: "KAMBING",
                        suku: ["KAM", "BING"],
                        emoji: "🐐"
                    },
                    {
                        kata: "BURUNG",
                        suku: ["BU", "RUNG"],
                        emoji: "🐦"
                    },
                ],
            },

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
                        emoji: "👨‍⚕️"
                    },
                    {
                        kata: "GURU",
                        suku: ["GU", "RU"],
                        emoji: "👩‍🏫"
                    },
                    {
                        kata: "POLISI",
                        suku: ["PO", "LI", "SI"],
                        emoji: "👮"
                    },
                    {
                        kata: "PETANI",
                        suku: ["PE", "TA", "NI"],
                        emoji: "👨‍🌾"
                    },
                    {
                        kata: "KOKI",
                        suku: ["KO", "KI"],
                        emoji: "👨‍🍳"
                    },
                    {
                        kata: "PILOT",
                        suku: ["PI", "LOT"],
                        emoji: "👨‍✈️"
                    },
                    {
                        kata: "SOPIR",
                        suku: ["SO", "PIR"],
                        emoji: "🚗"
                    },
                    {
                        kata: "NELAYAN",
                        suku: ["NE", "LA", "YAN"],
                        emoji: "🎣"
                    },
                    {
                        kata: "PERAWAT",
                        suku: ["PE", "RA", "WAT"],
                        emoji: "🧑‍⚕️"
                    },
                    {
                        kata: "PEMADAM",
                        suku: ["PE", "MA", "DAM"],
                        emoji: "👨‍🚒"
                    },
                ],
            },

            transportasi: {
                label: "🚗 Transportasi",
                color: "var(--red)",
                words: [{
                        kata: "MOBIL",
                        suku: ["MO", "BIL"],
                        emoji: "🚗"
                    },
                    {
                        kata: "MOTOR",
                        suku: ["MO", "TOR"],
                        emoji: "🏍️"
                    },
                    {
                        kata: "BUS",
                        suku: ["BUS"],
                        emoji: "🚌"
                    },
                    {
                        kata: "KERETA",
                        suku: ["KE", "RE", "TA"],
                        emoji: "🚆"
                    },
                    {
                        kata: "KAPAL",
                        suku: ["KA", "PAL"],
                        emoji: "🚢"
                    },
                    {
                        kata: "PESAWAT",
                        suku: ["PE", "SA", "WAT"],
                        emoji: "✈️"
                    },
                    {
                        kata: "SEPEDA",
                        suku: ["SE", "PE", "DA"],
                        emoji: "🚲"
                    },
                    {
                        kata: "BECAK",
                        suku: ["BE", "CAK"],
                        emoji: "🛺"
                    },
                    {
                        kata: "TRUK",
                        suku: ["TRUK"],
                        emoji: "🚚"
                    },
                    {
                        kata: "TAKSI",
                        suku: ["TAK", "SI"],
                        emoji: "🚕"
                    },
                ],
            },

            sayuran: {
                label: "🥦 Sayuran",
                color: "var(--green)",
                words: [{
                        kata: "BAYAM",
                        suku: ["BA", "YAM"],
                        emoji: "🥬"
                    },
                    {
                        kata: "WORTEL",
                        suku: ["WOR", "TEL"],
                        emoji: "🥕"
                    },
                    {
                        kata: "KUBIS",
                        suku: ["KU", "BIS"],
                        emoji: "🥬"
                    },
                    {
                        kata: "TOMAT",
                        suku: ["TO", "MAT"],
                        emoji: "🍅"
                    },
                    {
                        kata: "TIMUN",
                        suku: ["TI", "MUN"],
                        emoji: "🥒"
                    },
                    {
                        kata: "TERONG",
                        suku: ["TE", "RONG"],
                        emoji: "🍆"
                    },
                    {
                        kata: "JAGUNG",
                        suku: ["JA", "GUNG"],
                        emoji: "🌽"
                    },
                    {
                        kata: "KENTANG",
                        suku: ["KEN", "TANG"],
                        emoji: "🥔"
                    },
                    {
                        kata: "BROKOLI",
                        suku: ["BRO", "KO", "LI"],
                        emoji: "🥦"
                    },
                    {
                        kata: "LABU",
                        suku: ["LA", "BU"],
                        emoji: "🎃"
                    },
                ],
            },

            warna: {
                label: "🎨 Warna",
                color: "var(--pink)",
                words: [{
                        kata: "MERAH",
                        suku: ["ME", "RAH"],
                        emoji: "🔴"
                    },
                    {
                        kata: "HIJAU",
                        suku: ["HI", "JAU"],
                        emoji: "🟢"
                    },
                    {
                        kata: "BIRU",
                        suku: ["BI", "RU"],
                        emoji: "🔵"
                    },
                    {
                        kata: "KUNING",
                        suku: ["KU", "NING"],
                        emoji: "🟡"
                    },
                    {
                        kata: "PUTIH",
                        suku: ["PU", "TIH"],
                        emoji: "⚪"
                    },
                    {
                        kata: "ABUABU",
                        suku: ["A", "BU", "A", "BU"],
                        emoji: "⚫"
                    },
                    {
                        kata: "ORANGE",
                        suku: ["O", "RANGE"],
                        emoji: "🟠"
                    },
                    {
                        kata: "UNGU",
                        suku: ["U", "NGU"],
                        emoji: "🟣"
                    },
                    {
                        kata: "COKLAT",
                        suku: ["COK", "LAT"],
                        emoji: "🟤"
                    },
                    {
                        kata: "HITAM",
                        suku: ["HI", "TAM"],
                        emoji: "⚫"
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
                        gambar: "{{ asset('assets/images/kosakata/hewan/kucing.png') }}",
                        suku: ["ku", "cing"],
                        kosongIndex: 1,
                        warna: "purple"
                    },
                    {
                        nama: "Ayam",
                        gambar: "{{ asset('assets/images/kosakata/hewan/ayam.png') }}",
                        suku: ["a", "yam"],
                        kosongIndex: 1,
                        warna: "green"
                    },
                    {
                        nama: "Ikan",
                        gambar: "{{ asset('assets/images/kosakata/hewan/ikan.png') }}",
                        suku: ["i", "kan"],
                        kosongIndex: 1,
                        warna: "yellow"
                    },
                    {
                        nama: "Gajah",
                        gambar: "{{ asset('assets/images/kosakata/hewan/gajah.png') }}",
                        suku: ["ga", "jah"],
                        kosongIndex: 1,
                        warna: "purple"
                    },
                    {
                        nama: "Kelinci",
                        gambar: "{{ asset('assets/images/kosakata/hewan/kelinci.png') }}",
                        suku: ["ke", "lin", "ci"],
                        kosongIndex: 2,
                        warna: "green"
                    },
                    {
                        nama: "Burung",
                        gambar: "{{ asset('assets/images/kosakata/hewan/burung.png') }}",
                        suku: ["bu", "rung"],
                        kosongIndex: 1,
                        warna: "yellow"
                    },
                    {
                        nama: "Sapi",
                        gambar: "{{ asset('assets/images/kosakata/hewan/sapi.png') }}",
                        suku: ["sa", "pi"],
                        kosongIndex: 1,
                        warna: "purple"
                    },
                    {
                        nama: "Kambing",
                        gambar: "{{ asset('assets/images/kosakata/hewan/kambing.png') }}",
                        suku: ["kam", "bing"],
                        kosongIndex: 1,
                        warna: "green"
                    },
                    {
                        nama: "Singa",
                        gambar: "{{ asset('assets/images/kosakata/hewan/singa.png') }}",
                        suku: ["si", "nga"],
                        kosongIndex: 1,
                        warna: "yellow"
                    },
                    {
                        nama: "Anjing",
                        gambar: "{{ asset('assets/images/kosakata/hewan/anjing.png') }}",
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
                        gambar: "{{ asset('assets/images/kosakata/benda/bola.png') }}",
                        suku: ["bo", "la"],
                        kosongIndex: 1,
                        warna: "purple"
                    },
                    {
                        nama: "Buku",
                        gambar: "{{ asset('assets/images/kosakata/benda/buku.png') }}",
                        suku: ["bu", "ku"],
                        kosongIndex: 1,
                        warna: "green"
                    },
                    {
                        nama: "Kursi",
                        gambar: "{{ asset('assets/images/kosakata/benda/kursi.png') }}",
                        suku: ["kur", "si"],
                        kosongIndex: 1,
                        warna: "yellow"
                    },
                    {
                        nama: "Pintu",
                        gambar: "{{ asset('assets/images/kosakata/benda/pintu.png') }}",
                        suku: ["pin", "tu"],
                        kosongIndex: 1,
                        warna: "purple"
                    },
                    {
                        nama: "Piring",
                        gambar: "{{ asset('assets/images/kosakata/benda/piring.png') }}",
                        suku: ["pi", "ring"],
                        kosongIndex: 1,
                        warna: "green"
                    },
                    {
                        nama: "Meja",
                        gambar: "{{ asset('assets/images/kosakata/benda/meja.png') }}",
                        suku: ["me", "ja"],
                        kosongIndex: 1,
                        warna: "yellow"
                    },
                    {
                        nama: "Pensil",
                        gambar: "{{ asset('assets/images/kosakata/benda/pensil.png') }}",
                        suku: ["pen", "sil"],
                        kosongIndex: 1,
                        warna: "purple"
                    },
                    {
                        nama: "Sepatu",
                        gambar: "{{ asset('assets/images/kosakata/benda/sepatu.png') }}",
                        suku: ["se", "pa", "tu"],
                        kosongIndex: 2,
                        warna: "green"
                    },
                    {
                        nama: "Sendok",
                        gambar: "{{ asset('assets/images/kosakata/benda/sendok.png') }}",
                        suku: ["sen", "dok"],
                        kosongIndex: 1,
                        warna: "yellow"
                    },
                    {
                        nama: "Topi",
                        gambar: "{{ asset('assets/images/kosakata/benda/topi.png') }}",
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
                        gambar: "{{ asset('assets/images/kosakata/alam/bunga.png') }}",
                        suku: ["bu", "nga"],
                        kosongIndex: 1,
                        warna: "purple"
                    },
                    {
                        nama: "Pohon",
                        gambar: "{{ asset('assets/images/kosakata/alam/pohon.png') }}",
                        suku: ["po", "hon"],
                        kosongIndex: 1,
                        warna: "green"
                    },
                    {
                        nama: "Hujan",
                        gambar: "{{ asset('assets/images/kosakata/alam/hujan.png') }}",
                        suku: ["hu", "jan"],
                        kosongIndex: 1,
                        warna: "yellow"
                    },
                    {
                        nama: "Bulan",
                        gambar: "{{ asset('assets/images/kosakata/alam/bulan.png') }}",
                        suku: ["bu", "lan"],
                        kosongIndex: 1,
                        warna: "purple"
                    },
                    {
                        nama: "Bintang",
                        gambar: "{{ asset('assets/images/kosakata/alam/bintang.png') }}",
                        suku: ["bin", "tang"],
                        kosongIndex: 1,
                        warna: "green"
                    },
                    {
                        nama: "Matahari",
                        gambar: "{{ asset('assets/images/kosakata/alam/matahari.png') }}",
                        suku: ["ma", "ta", "ha", "ri"],
                        kosongIndex: 3,
                        warna: "yellow"
                    },
                    {
                        nama: "Awan",
                        gambar: "{{ asset('assets/images/kosakata/alam/awan.png') }}",
                        suku: ["a", "wan"],
                        kosongIndex: 1,
                        warna: "purple"
                    },
                    {
                        nama: "Gunung",
                        gambar: "{{ asset('assets/images/kosakata/alam/gunung.png') }}",
                        suku: ["gu", "nung"],
                        kosongIndex: 1,
                        warna: "green"
                    },
                    {
                        nama: "Laut",
                        gambar: "{{ asset('assets/images/kosakata/alam/laut.png') }}",
                        suku: ["la", "ut"],
                        kosongIndex: 1,
                        warna: "yellow"
                    },
                    {
                        nama: "Api",
                        gambar: "{{ asset('assets/images/kosakata/alam/api.png') }}",
                        suku: ["a", "pi"],
                        kosongIndex: 1,
                        warna: "purple"
                    }
                ]
            },
            pekerjaan: {
                label: "👩‍⚕️ Pekerjaan",
                pilihanSalah: ["mi", "ca", "no", "lu"],
                soal: [{
                        nama: "Dokter",
                        gambar: "{{ asset('assets/images/kosakata/pekerjaan/dokter.png') }}",
                        awal: "dok",
                        jawaban: "ter",
                        warna: "purple"
                    },
                    {
                        nama: "Guru",
                        gambar: "{{ asset('assets/images/kosakata/pekerjaan/guru.png') }}",
                        awal: "gu",
                        jawaban: "ru",
                        warna: "green"
                    },
                    {
                        nama: "Polisi",
                        gambar: "{{ asset('assets/images/kosakata/pekerjaan/polisi.png') }}",
                        awal: "po",
                        jawaban: "lisi",
                        warna: "yellow"
                    },
                    {
                        nama: "Koki",
                        gambar: "{{ asset('assets/images/kosakata/pekerjaan/koki.png') }}",
                        awal: "ko",
                        jawaban: "ki",
                        warna: "purple"
                    }
                ]
            },

            transportasi: {
                label: "🚗 Transportasi",
                pilihanSalah: ["ka", "do", "ni", "se"],
                soal: [{
                        nama: "Mobil",
                        gambar: "{{ asset('assets/images/kosakata/transportasi/mobil.png') }}",
                        awal: "mo",
                        jawaban: "bil",
                        warna: "purple"
                    },
                    {
                        nama: "Motor",
                        gambar: "{{ asset('assets/images/kosakata/transportasi/motor.png') }}",
                        awal: "mo",
                        jawaban: "tor",
                        warna: "green"
                    },
                    {
                        nama: "Kapal",
                        gambar: "{{ asset('assets/images/kosakata/transportasi/kapal.png') }}",
                        awal: "ka",
                        jawaban: "pal",
                        warna: "yellow"
                    },
                    {
                        nama: "Pesawat",
                        gambar: "{{ asset('assets/images/kosakata/transportasi/pesawat.png') }}",
                        awal: "pe",
                        jawaban: "sawat",
                        warna: "purple"
                    }
                ]
            },

            sayuran: {
                label: "🥦 Sayuran",
                pilihanSalah: ["si", "na", "po", "mu"],
                soal: [{
                        nama: "Wortel",
                        gambar: "{{ asset('assets/images/kosakata/sayuran/wortel.png') }}",
                        awal: "wor",
                        jawaban: "tel",
                        warna: "purple"
                    },
                    {
                        nama: "Tomat",
                        gambar: "{{ asset('assets/images/kosakata/sayuran/tomat.png') }}",
                        awal: "to",
                        jawaban: "mat",
                        warna: "green"
                    },
                    {
                        nama: "Jagung",
                        gambar: "{{ asset('assets/images/kosakata/sayuran/jagung.png') }}",
                        awal: "ja",
                        jawaban: "gung",
                        warna: "yellow"
                    },
                    {
                        nama: "Brokoli",
                        gambar: "{{ asset('assets/images/kosakata/sayuran/brokoli.png') }}",
                        awal: "bro",
                        jawaban: "koli",
                        warna: "purple"
                    }
                ]
            },

            warna: {
                label: "🎨 Warna",
                pilihanSalah: ["la", "co", "mi", "pa"],
                soal: [{
                        nama: "Merah",
                        gambar: "{{ asset('assets/images/kosakata/warna/merah.png') }}",
                        awal: "me",
                        jawaban: "rah",
                        warna: "purple"
                    },
                    {
                        nama: "Hijau",
                        gambar: "{{ asset('assets/images/kosakata/warna/hijau.png') }}",
                        awal: "hi",
                        jawaban: "jau",
                        warna: "green"
                    },
                    {
                        nama: "Biru",
                        gambar: "{{ asset('assets/images/kosakata/warna/biru.png') }}",
                        awal: "bi",
                        jawaban: "ru",
                        warna: "yellow"
                    },
                    {
                        nama: "Kuning",
                        gambar: "{{ asset('assets/images/kosakata/warna/kuning.png') }}",
                        awal: "ku",
                        jawaban: "ning",
                        warna: "purple"
                    }
                ]
            }
        };

        /* =========================================================
          UNTUK MATERI DATA
        ========================================================== */
        const MATERI_DATA = {
            buah: {
                title: "🍎 Buah",
                desc: "Buah adalah makanan sehat yang bersal dari tumbuhan. Ada buah yang rasanya manis, asam, dan segar.",
                items: [{
                        kata: "Jeruk",
                        suku: "je-ruk",
                        audio: "{{ asset('assets/audio/kosakata/buah/jeruk.mp3') }}"
                    },
                    {
                        kata: "Apel",
                        suku: "a-pel",
                        audio: "{{ asset('assets/audio/kosakata/buah/apel.mp4') }}"
                    },
                    {
                        kata: "Pisang",
                        suku: "pi-sang",
                        audio: "{{ asset('assets/audio/kosakata/buah/pisang.mp3') }}"
                    },
                    {
                        kata: "Semangka",
                        suku: "se-mang-ka",
                        audio: "{{ asset('assets/audio/kosakata/buah/semangka.mp3') }}"
                    },
                    {
                        kata: "Durian",
                        suku: "du-ri-an",
                        audio: "{{ asset('assets/audio/kosakata/buah/durian.mp3') }}"
                    },
                    {
                        kata: "Alpukat",
                        suku: "al-pu-kat",
                        audio: "{{ asset('assets/audio/kosakata/buah/alpukat.mp3') }}"
                    }
                ]
            },

            hewan: {
                title: "🐾 Hewan",
                desc: "Hewan adalah makhluk hidup yang ada di sekitar kita. Hewan dapat hidup di darat, air, atau udara.",
                items: [{
                        kata: "Kucing",
                        suku: "ku - cing"
                    },
                    {
                        kata: "Ayam",
                        suku: "a - yam"
                    },
                    {
                        kata: "Ikan",
                        suku: "i - kan"
                    },
                    {
                        kata: "Gajah",
                        suku: "ga - jah"
                    },
                    {
                        kata: "Kelinci",
                        suku: "ke - lin - ci"
                    },
                    {
                        kata: "Burung",
                        suku: "bu - rung"
                    }
                ]
            },

            benda: {
                title: "🏠 Benda",
                desc: "Benda adalah sesuatu yang dapat kita lihat dan gunakan dalam kehidupan sehari-hari.",
                items: [{
                        kata: "Bola",
                        suku: "bo - la"
                    },
                    {
                        kata: "Buku",
                        suku: "bu - ku"
                    },
                    {
                        kata: "Kursi",
                        suku: "kur - si"
                    },
                    {
                        kata: "Pintu",
                        suku: "pin - tu"
                    },
                    {
                        kata: "Piring",
                        suku: "pi - ring"
                    },
                    {
                        kata: "Pensil",
                        suku: "pen - sil"
                    }
                ]
            },

            alam: {
                title: "🌿 Alam",
                desc: "Alam adalah lingkungan di sekitar kita, seperti tumbuhan, langit, hujan, bulan, dan bintang.",
                items: [{
                        kata: "Bunga",
                        suku: "bu - nga"
                    },
                    {
                        kata: "Pohon",
                        suku: "po - hon"
                    },
                    {
                        kata: "Hujan",
                        suku: "hu - jan"
                    },
                    {
                        kata: "Bulan",
                        suku: "bu - lan"
                    },
                    {
                        kata: "Bintang",
                        suku: "bin - tang"
                    },
                    {
                        kata: "Matahari",
                        suku: "ma - ta - ha - ri"
                    }
                ]
            },

            pekerjaan: {
                title: "👩‍⚕️ Pekerjaan",
                desc: "Pekerjaan adalah kegiatan yang dilakukan seseorang. Setiap pekerjaan memiliki tugas yang berbeda.",
                items: [{
                        kata: "Dokter",
                        suku: "dok - ter"
                    },
                    {
                        kata: "Guru",
                        suku: "gu - ru"
                    },
                    {
                        kata: "Polisi",
                        suku: "po - li - si"
                    },
                    {
                        kata: "Petani",
                        suku: "pe - ta - ni"
                    },
                    {
                        kata: "Koki",
                        suku: "ko - ki"
                    },
                    {
                        kata: "Pilot",
                        suku: "pi - lot"
                    }
                ]
            },

            transportasi: {
                title: "🚗 Alat Transportasi",
                desc: "Alat transportasi digunakan untuk berpindah dari satu tempat ke tempat lain.",
                items: [{
                        kata: "Mobil",
                        suku: "mo - bil"
                    },
                    {
                        kata: "Motor",
                        suku: "mo - tor"
                    },
                    {
                        kata: "Kereta",
                        suku: "ke - re - ta"
                    },
                    {
                        kata: "Kapal",
                        suku: "ka - pal"
                    },
                    {
                        kata: "Pesawat",
                        suku: "pe - sa - wat"
                    },
                    {
                        kata: "Sepeda",
                        suku: "se - pe - da"
                    }
                ]
            },

            sayuran: {
                title: "🥦 Sayuran",
                desc: "Sayuran adalah makanan sehat yang berasal dari tumbuhan. Sayuran baik untuk tubuh.",
                items: [{
                        kata: "Wortel",
                        suku: "wor - tel"
                    },
                    {
                        kata: "Tomat",
                        suku: "to - mat"
                    },
                    {
                        kata: "Jagung",
                        suku: "ja - gung"
                    },
                    {
                        kata: "Brokoli",
                        suku: "bro - ko - li"
                    },
                    {
                        kata: "Bayam",
                        suku: "ba - yam"
                    },
                    {
                        kata: "Timun",
                        suku: "ti - mun"
                    }
                ]
            },

            warna: {
                title: "🎨 Warna",
                desc: "Warna membuat benda terlihat berbeda dan menarik. Kita dapat mengenal warna dari benda di sekitar.",
                items: [{
                        kata: "Merah",
                        suku: "me - rah"
                    },
                    {
                        kata: "Hijau",
                        suku: "hi - jau"
                    },
                    {
                        kata: "Biru",
                        suku: "bi - ru"
                    },
                    {
                        kata: "Kuning",
                        suku: "ku - ning"
                    },
                    {
                        kata: "Ungu",
                        suku: "u - ngu"
                    },
                    {
                        kata: "Hitam",
                        suku: "hi - tam"
                    }
                ]
            }
        };

        /* =========================================================
          2. STATE / VARIABEL UTAMA GAME
        ========================================================== */
        let currentCat = "buah";
        let selectedGameType = "suku";
        let wordList = [];
        let wordIndex = 0;
        let currentWord = null;
        let answerLetters = [];
        let blockUsed = [];
        let score = 0;
        let tries = 0;
        let totalStars = parseInt(localStorage.getItem("tt_kosa_stars") || "0");
        let sukuCurrentData = [];
        let selectedBlank = null;
        let sukuScoreValue = 0;
        let sukuCorrectValue = 0;
        let letterCurrentData = [];
        let letterIndex = 0;
        let letterScoreValue = 0;
        let letterCorrectValue = 0;
        let letterAnswerValue = [];
        let letterUsedIndexes = [];
        let currentLetterQuestion = null;

        /* =========================================================
          3. AMBIL ELEMEN HTML YANG SERING DIPAKAI
        ========================================================== */
        const restartBtn = document.getElementById("restartBtn");
        const headerRight = document.getElementById("headerRight");
        const answerTray = document.getElementById("answerTray");
        const trayPlaceholder = document.getElementById("trayPlaceholder");
        const blocksGrid = document.getElementById("blocksGrid");
        const feedbackEl = document.getElementById("feedback");
        const picEmoji = document.getElementById("picEmoji");
        const catBadge = document.getElementById("catBadge");
        const letterCount = document.getElementById("letterCount");
        const syllablesRow = document.getElementById("syllablesRow");
        const progFill = document.getElementById("progFill");
        const progLabel = document.getElementById("progLabel");
        const scOk = document.getElementById("scOk");
        const scTry = document.getElementById("scTry");
        const scQ = document.getElementById("scQ");
        const starsEl = document.getElementById("totalStars");

        starsEl.textContent = totalStars;
        headerRight.style.display = "none";

        const BLOCK_COLORS = [
            "bc0",
            "bc1",
            "bc2",
            "bc3",
            "bc4",
            "bc5",
            "bc6",
            "bc7",
            "bc8",
            "bc9",
        ];

        /* =========================================================
          4. FUNGSI NAVIGASI HALAMAN
        ========================================================== */
        function showMateri(categoryName, gameType) {
            currentCat = categoryName;
            selectedGameType = gameType;

            document.getElementById("category-screen").style.display = "none";
            document.getElementById("materi-screen").style.display = "block";
            document.getElementById("suku-game-screen").style.display = "none";
            document.getElementById("letter-game-screen").style.display = "none";
            document.getElementById("result-screen").style.display = "none";

            renderMateri(categoryName);
        }

        function renderMateri(categoryName) {
            const materi = MATERI_DATA[categoryName] || MATERI_DATA.buah;

            document.getElementById("materiTitle").textContent = materi.title;
            document.getElementById("materiDesc").textContent = materi.desc;

            const materiList = document.getElementById("materiList");
            materiList.innerHTML = "";

            materi.items.forEach((item) => {
                const div = document.createElement("div");
                div.className = "materi-item";

                div.innerHTML = `
                    <div class="materi-kata">🔊 ${item.kata}</div>
                    <span class="materi-suku">${item.suku}</span>
                `;

                div.onclick = function() {
                    playMateriAudio(item.audio);
                };

                materiList.appendChild(div);
            });
        }

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

            letterCurrentData = shuffle([...category.words]).slice(0, 6);
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

            letterImage.textContent = currentLetterQuestion.emoji;
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

        function goHome() {
            document.getElementById("category-screen").style.display = "flex";
            document.getElementById("materi-screen").style.display = "none";
            document.getElementById("suku-game-screen").style.display = "none";
            document.getElementById("letter-game-screen").style.display = "none";
            document.getElementById("result-screen").style.display = "none";

            headerRight.style.display = "none";

            score = 0;
            tries = 0;
            wordIndex = 0;
            totalStars = 0;

            starsEl.textContent = totalStars;
            localStorage.setItem("tt_kosa_stars", totalStars);
        }

        // TOMBOL BACK
        function handleBackButton() {
            const materiOpen =
                document.getElementById("materi-screen").style.display === "block";

            const sukuGameOpen =
                document.getElementById("suku-game-screen").style.display === "block";

            const letterGameOpen =
                document.getElementById("letter-game-screen").style.display ===
                "block";

            const resultOpen =
                document.getElementById("result-screen").style.display === "block";

            if (materiOpen || sukuGameOpen || letterGameOpen || resultOpen) {
                goHome();
            } else {
                window.location.href = "{{ route('kosa-kata') }}";
            }
        }

        /* =========================================================
          5. TOMBOL MULAI ULANG
        ========================================================== */
        function restartCurrentGame() {
            wordList = shuffle(DATA[currentCat].words.slice());
            wordIndex = 0;
            score = 0;
            tries = 0;
            totalStars = 0;

            starsEl.textContent = totalStars;
            localStorage.setItem("tt_kosa_stars", totalStars);

            updateScoreboard();
            loadWord();
        }

        restartBtn.addEventListener("click", function() {
            const confirmRestart = confirm("Mulai ulang latihan dari awal?");

            if (!confirmRestart) {
                return;
            }

            const sukuGameOpen =
                document.getElementById("suku-game-screen").style.display === "block";

            const resultOpen =
                document.getElementById("result-screen").style.display === "block";

            const letterGameOpen =
                document.getElementById("letter-game-screen").style.display ===
                "block";

            if (sukuGameOpen) {
                resetSukuGame();
            } else if (letterGameOpen) {
                resetLetterGame();
            } else if (resultOpen) {
                retryCurrentGame();
            }
        });

        /* =========================================================
          6. MENAMPILKAN SOAL / KATA BARU
        ========================================================== */
        function loadWord() {
            if (!wordList || wordList.length === 0) {
                console.error("Daftar kata kosong. Cek data kategori:", currentCat);
                return;
            }

            currentWord = wordList[wordIndex];

            if (!currentWord) {
                console.error(
                    "Kata tidak ditemukan. Index:",
                    wordIndex,
                    "Data:",
                    wordList,
                );
                return;
            }

            answerLetters = [];

            const letters = shuffle(currentWord.kata.split(""));
            blockUsed = new Array(letters.length).fill(false);

            picEmoji.textContent = currentWord.emoji;
            letterCount.textContent = currentWord.kata.length;
            catBadge.textContent = DATA[currentCat].label;
            catBadge.style.background = DATA[currentCat].color;
            catBadge.style.color = "white";

            syllablesRow.innerHTML = currentWord.suku
                .map((item) => ` < span class = "syllable-pill" > $ {
                                item
                            } < /span>`)
                .join("");

            animatePictureCard();
            renderLetterBlocks(letters);
            renderTray();
            clearFeedback();
            updateProgress();
            updateScoreboard();
        }

        function animatePictureCard() {
            const card = document.getElementById("picCard");
            card.style.animation = "none";
            void card.offsetWidth;
            card.style.animation = "card-drop .4s cubic-bezier(.34,1.56,.64,1)";
        }

        function renderLetterBlocks(letters) {
            blocksGrid.innerHTML = "";

            letters.forEach((letter, index) => {
                const block = document.createElement("div");
                block.className = `letter-block ${BLOCK_COLORS[index % BLOCK_COLORS.length]}`;
                block.id = `block-${index}`;
                block.textContent = letter;
                block.style.animationDelay = `${index * 0.05}s`;
                block.dataset.letter = letter;
                block.dataset.index = index;
                block.onclick = () => clickLetterBlock(index, letter);

                blocksGrid.appendChild(block);
            });
        }

        /* =========================================================
          7. MEMILIH HURUF DAN MEMASUKKAN KE JAWABAN
        ========================================================== */
        function clickLetterBlock(index, letter) {
            if (!currentWord) return;
            if (blockUsed[index]) return;
            if (answerLetters.length >= currentWord.kata.length) return;

            blockUsed[index] = true;

            const block = document.getElementById(`block-${index}`);
            if (block) {
                block.classList.add("used");
            }

            answerLetters.push({
                letter: letter,
                blockIndex: index,
            });

            renderTray();
            clearFeedback();

            if (answerLetters.length === currentWord.kata.length) {
                setTimeout(checkAnswer, 500);
            }
        }

        function renderTray() {
            trayPlaceholder.style.display = answerLetters.length ? "none" : "block";

            answerTray
                .querySelectorAll(".answer-slot")
                .forEach((slot) => slot.remove());
            answerTray.classList.toggle("has-letters", answerLetters.length > 0);

            answerLetters.forEach((item, index) => {
                const slot = document.createElement("div");
                slot.className = "answer-slot";
                slot.textContent = item.letter;
                slot.title = "Klik untuk menghapus huruf ini";
                slot.onclick = () => removeSlot(index);
                answerTray.appendChild(slot);
            });
        }

        function removeSlot(index) {
            const item = answerLetters[index];
            blockUsed[item.blockIndex] = false;

            const block = document.getElementById(`block-${item.blockIndex}`);
            if (block) {
                block.classList.remove("used");
            }

            answerLetters.splice(index, 1);
            renderTray();
            clearFeedback();
            answerTray.classList.remove("correct-flash", "wrong-flash");
        }

        function clearAnswer() {
            answerLetters.forEach((item) => {
                blockUsed[item.blockIndex] = false;
                const block = document.getElementById(`block-${item.blockIndex}`);
                if (block) {
                    block.classList.remove("used");
                }
            });

            answerLetters = [];
            renderTray();
            clearFeedback();
            answerTray.classList.remove("correct-flash", "wrong-flash");
        }

        /* =========================================================
          8. CEK JAWABAN USER
        ========================================================== */
        function checkAnswer() {
            if (!answerLetters.length) {
                setFeedback("Susun dulu huruf-hurufnya ya! 😊", "");
                return;
            }

            const userAnswer = answerLetters.map((item) => item.letter).join("");
            tries++;
            updateScoreboard();

            if (userAnswer === currentWord.kata) {
                score += 1;
                totalStars += 10;

                localStorage.setItem("tt_kosa_stars", totalStars);
                starsEl.textContent = totalStars;
                updateScoreboard();

                answerTray.classList.add("correct-flash");
                setFeedback("✅ Betul! Hebat sekali! +10 bintang 🎉", "ok");
                speakWord(currentWord.kata.toLowerCase());
                launchFireworks();
            } else {
                answerTray.classList.add("wrong-flash");
                setFeedback("Ups.. Belum tepat!", "err");
                speakWord("Ups, belum tepat");
            }

            setTimeout(() => {
                answerTray.classList.remove("correct-flash", "wrong-flash");
                wordIndex++;

                if (wordIndex >= wordList.length) {
                    showResult();
                } else {
                    loadWord();
                }
            }, 1200);
        }

        /* =========================================================
          9. UPDATE SKOR DAN PROGRESS
        ========================================================== */
        function updateProgress() {
            const totalWords = wordList.length || 1;
            const progressPercent = Math.round((wordIndex / totalWords) * 100);

            progFill.style.width = progressPercent + "%";
            progLabel.textContent = wordIndex + " / " + totalWords;
            scQ.textContent = wordIndex + 1 + " / " + totalWords;
        }

        function updateScoreboard() {
            scOk.textContent = score;
            scTry.textContent = tries;
        }

        function setFeedback(message, type) {
            feedbackEl.textContent = message;
            feedbackEl.className = "feedback-strip " + type;
        }

        function clearFeedback() {
            feedbackEl.textContent = "";
            feedbackEl.className = "feedback-strip";
        }

        /* =========================================================
          10. FITUR SUARA / SPEECH
        ========================================================== */
        function speakWord(text) {
            speechSynthesis.cancel();

            const utterance = new SpeechSynthesisUtterance(text);
            utterance.lang = "id-ID";
            utterance.rate = 0.72;
            utterance.pitch = 1.1;

            const indonesiaVoice = speechSynthesis
                .getVoices()
                .find((voice) => voice.lang.startsWith("id"));

            if (indonesiaVoice) {
                utterance.voice = indonesiaVoice;
            }

            speechSynthesis.speak(utterance);
        }

        speechSynthesis.onvoiceschanged = () => speechSynthesis.getVoices();

        function speakCurrentWord() {
            if (currentWord) {
                speakWord(currentWord.kata.toLowerCase());
            }
        }

        /* =========================================================
          11. HALAMAN HASIL AKHIR
        ========================================================== */
        function showResult() {
            document.getElementById("game-screen").style.display = "none";
            document.getElementById("result-screen").style.display = "block";

            const totalWords = wordList.length;
            const percentage = score / totalWords;

            let emoji = "💪";
            let title = "Terus Semangat!";
            let stars = "⭐";
            let message = "Kamu pasti bisa lebih baik!";

            if (percentage >= 1) {
                emoji = "🏆";
                title = "Sempurna! Luar Biasa!";
                stars = "⭐⭐⭐";
                message = "Kamu juara kosakata hari ini!";
            } else if (percentage >= 0.7) {
                emoji = "🎉";
                title = "Bagus Sekali!";
                stars = "⭐⭐";
                message = "Hampir sempurna, coba lagi ya!";
            } else if (percentage >= 0.4) {
                emoji = "😊";
                title = "Cukup Bagus!";
                stars = "⭐";
                message = "Latihan lagi untuk jadi lebih baik!";
            }

            document.getElementById("rEmoji").textContent = emoji;
            document.getElementById("rTitle").textContent = title;
            document.getElementById("rStars").textContent = stars;
            document.getElementById("rScore").textContent =
                score + " / " + totalWords;
            document.getElementById("rMsg").textContent = message;

            if (percentage >= 0.7) {
                launchFireworks();
            }
        }

        function retrySukuGame() {
            sukuScoreValue = 0;
            sukuCorrectValue = 0;
            selectedBlank = null;
            totalStars = 0;

            // wordIndex = 0;
            // wordList = shuffle(DATA[currentCat].words.slice());

            document.getElementById("sukuScore").textContent = sukuScoreValue;
            document.getElementById("sukuCorrect").textContent = sukuScoreValue;

            starsEl.textContent = totalStars;
            localStorage.setItem("tt_kosa_stars", totalStars);

            document.getElementById("result-screen").style.display = "none";
            document.getElementById("category-screen").style.display = "none";
            document.getElementById("letter-game-screen").style.display = "none";
            document.getElementById("suku-game-screen").style.display = "block";

            renderSukuGame();
        }

        function retryCurrentGame() {
            if (selectedGameType === "suku") {
                retrySukuGame();
            } else {
                document.getElementById("result-screen").style.display = "none";
                document.getElementById("category-screen").style.display = "none";
                document.getElementById("materi-screen").style.display = "none";
                document.getElementById("suku-game-screen").style.display = "none";
                document.getElementById("letter-game-screen").style.display = "block";

                resetLetterGame();
            }
        }
        /* =========================================================
          12. INPUT KEYBOARD
        ========================================================== */
        document.addEventListener("keydown", (event) => {
            if (document.getElementById("game-screen").style.display !== "block")
                return;

            if (event.key === "Backspace") {
                if (answerLetters.length) {
                    removeSlot(answerLetters.length - 1);
                }
                return;
            }

            if (event.key === "Enter") {
                checkAnswer();
                return;
            }

            if (event.key === "Escape") {
                clearAnswer();
                return;
            }

            const key = event.key.toUpperCase();
            if (!/^[A-Z]$/.test(key)) return;

            const unusedBlocks = Array.from(
                blocksGrid.querySelectorAll(".letter-block:not(.used)"),
            );
            const match = unusedBlocks.find(
                (block) => block.dataset.letter === key,
            );

            if (match) {
                const index = parseInt(match.dataset.index);
                clickLetterBlock(index, key);
            }
        });

        /* =========================================================
          13. ANIMASI FIREWORKS / KEMBANG API
        ========================================================== */
        const fwCanvas = document.getElementById("fwCanvas");
        const fwCtx = fwCanvas.getContext("2d");
        let particles = [];

        function resizeFireworksCanvas() {
            fwCanvas.width = innerWidth;
            fwCanvas.height = innerHeight;
        }

        resizeFireworksCanvas();
        window.addEventListener("resize", resizeFireworksCanvas);

        function launchFireworks() {
            for (let i = 0; i < 7; i++) {
                setTimeout(() => {
                    createFireworkBurst(
                        innerWidth * 0.1 + Math.random() * innerWidth * 0.8,
                        innerHeight * 0.1 + Math.random() * innerHeight * 0.5,
                    );
                }, i * 180);
            }
        }

        function createFireworkBurst(x, y) {
            const colors = [
                "#FF5252",
                "#FFD166",
                "#06D6A0",
                "#4B9EFF",
                "#7C4DFF",
                "#FF6EB4",
                "#FF8C42",
            ];

            for (let i = 0; i < 30; i++) {
                const angle = (Math.PI * 2 * i) / 30;
                const speed = 3 + Math.random() * 5;

                particles.push({
                    x,
                    y,
                    vx: Math.cos(angle) * speed,
                    vy: Math.sin(angle) * speed - 1.5,
                    color: colors[i % colors.length],
                    life: 1,
                    size: 4 + Math.random() * 5,
                });
            }
        }

        function animateFireworks() {
            requestAnimationFrame(animateFireworks);

            if (!particles.length) return;

            fwCtx.clearRect(0, 0, fwCanvas.width, fwCanvas.height);
            particles = particles.filter((particle) => particle.life > 0);

            particles.forEach((particle) => {
                particle.x += particle.vx;
                particle.y += particle.vy;
                particle.vy += 0.1;
                particle.vx *= 0.97;
                particle.life -= 0.022;

                fwCtx.globalAlpha = particle.life;
                fwCtx.fillStyle = particle.color;
                fwCtx.beginPath();
                fwCtx.arc(
                    particle.x,
                    particle.y,
                    particle.size * particle.life,
                    0,
                    Math.PI * 2,
                );
                fwCtx.fill();
            });

            fwCtx.globalAlpha = 1;
        }

        animateFireworks();

        /* =========================================================
          14. HELPER UMUM
        ========================================================== */
        function shuffle(array) {
            for (let i = array.length - 1; i > 0; i--) {
                const j = Math.floor(Math.random() * (i + 1));
                [array[i], array[j]] = [array[j], array[i]];
            }
            return array;
        }
    </script>
</body>

</html>
