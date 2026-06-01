<!doctype html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Buat Kata Seru! - TinyThink</title>

    <link
        href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@400;500;600;700;800;900&family=Nunito:wght@700;800;900&display=swap"
        rel="stylesheet" />

    <style>
        /* --- Base & Root Colors --- */
        * { box-sizing: border-box; margin:0; padding:0; }
        :root {
            --cream: #fff8ee; --warm: #fff0d6; --paper: #fffbf4;
            --dark: #2b2040; --ink: #3d3260; --red: #ff5252;
            --orange: #ff8c42; --yellow: #ffd166; --green: #06d6a0;
            --teal: #26c6da; --blue: #4b9eff; --purple: #7c4dff;
            --pink: #ff6eb4;
        }
        body { font-family:"Nunito",sans-serif; background:var(--cream); min-height:100vh; overflow-x:hidden; }
        body::before {
            content:""; position:fixed; inset:0; z-index:0;
            background-image: radial-gradient(circle, rgba(255,209,102,0.18) 2px, transparent 2px),
                              radial-gradient(circle, rgba(255,82,82,0.1) 2px, transparent 2px);
            background-size: 40px 40px, 60px 60px;
            background-position: 0 0, 20px 20px; pointer-events:none;
        }
        .page { position:relative; z-index:1; min-height:100vh; padding-bottom:60px; }

        /* --- Header --- */
        .header { background:var(--dark); padding:10px 28px; min-height:75px; display:flex; align-items:center; justify-content:space-between; border-bottom:5px solid var(--yellow); position:sticky; top:0; z-index:200; }
        .logo-container { display:flex; flex-direction:column; align-items:flex-start; gap:2px; text-decoration:none; }
        .main-logo { max-height:38px; width:auto; display:block; }
        .logo-sub-text { font-family:"Baloo 2",cursive; font-size:12px; font-weight:700; color:rgba(255,255,255,0.6); letter-spacing:0.5px; margin-left:2px; }
        .header-right { display:flex; align-items:center; gap:12px; }
        .restart-btn { height:42px; background:var(--yellow); color:var(--dark); border:3px solid rgba(255,255,255,0.25); border-radius:999px; display:inline-flex; align-items:center; justify-content:center; gap:6px; padding:0 14px; font-family:"Baloo 2",cursive; font-size:15px; font-weight:900; cursor:pointer; box-shadow:0 4px 0 #ff8c42; }
        .restart-btn:hover { background:#ff8c42; color:white; }
        .star-counter { background: rgba(255,255,255,0.1); border:2px solid rgba(255,255,255,0.25); border-radius:99px; padding:6px 16px; font-family:"Baloo 2",cursive; font-size:16px; font-weight:700; color:white; display:flex; align-items:center; gap:6px; }

        .circle-back-btn { position:fixed; left:30px; top:100px; width:46px; height:46px; background:var(--yellow); color:var(--dark); border:3px solid var(--dark); border-radius:50%; display:inline-flex; align-items:center; justify-content:center; font-size:28px; font-weight:900; box-shadow:0 5px 0 #ff8c42; z-index:300; cursor:pointer; }

        /* --- Screens --- */
        section { display:none; padding:20px; }
        #category-screen { display:flex; align-items:center; justify-content:center; min-height:calc(100vh - 90px); }
        .category-card { max-width:760px; background:var(--paper); border-radius:32px; padding:42px 30px; text-align:center; box-shadow:8px 8px 0 var(--dark); }
        .hero-badge { display:inline-flex; align-items:center; gap:8px; background:var(--yellow); color:var(--dark); border-radius:99px; padding:7px 22px; font-family:"Baloo 2",cursive; font-size:15px; font-weight:800; border:3px solid var(--dark); box-shadow:3px 3px 0 var(--dark); margin-bottom:20px; }
        .category-title { font-family:"Baloo 2",cursive; font-size:clamp(34px,6vw,56px); font-weight:900; color:var(--dark); line-height:1.1; margin:16px 0 10px; }
        .category-desc { font-size:17px; color:#666; font-weight:800; margin-bottom:28px; }
        .category-menu { display:grid; grid-template-columns:repeat(2, minmax(180px,1fr)); gap:16px; }
        .category-choice { border:4px solid var(--dark); border-radius:22px; padding:22px 16px; font-family:"Baloo 2",cursive; font-size:22px; font-weight:900; color:white; cursor:pointer; box-shadow:5px 5px 0 var(--dark); transition: transform 0.15s ease, box-shadow 0.15s ease; }
        .category-choice:hover { transform: translate(-2px,-3px); box-shadow:7px 8px 0 var(--dark); }
        .buah-choice { background:var(--orange); }
        .hewan-choice { background:var(--green); }
        .benda-choice { background:var(--blue); }
        .alam-choice { background:var(--teal); }
        .pekerjaan-choice { background:var(--yellow); color:var(--dark); }
        .transportasi-choice { background:var(--red); }
        .sayuran-choice { background:var(--pink); }
        .warna-choice { background:var(--purple); }

        .empty-kosakata-box { grid-column:1/-1; background:#fff0d6; border:3px solid #2b2040; border-radius:18px; padding:24px; font-family:"Baloo 2",cursive; font-size:22px; font-weight:900; color:#2b2040; box-shadow:4px 4px 0 #2b2040; }
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
                <div class="action-row">
                    <button class="action-btn btn-clear" onclick="goHome()">← Kembali</button>
                    <button class="action-btn btn-next" onclick="startQuizFromMateri()">Mulai Kuis →</button>
                </div>
            </div>
        </section>
    </div>

    <script>
        // --- Data dari backend Laravel ---
        const DATA = @json($data);

        // State
        let currentCat = null;
        let currentGameType = "suku";

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
                    suku: Array.isArray(item.suku) ? item.suku.join(" - ").toLowerCase() : item.suku,
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
                else target.style.display = "block";
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
                div.innerHTML = `<div>${item.emoji} ${item.kata}</div><span class="materi-suku">${item.suku}</span>`;
                materiList.appendChild(div);
            });
        }

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