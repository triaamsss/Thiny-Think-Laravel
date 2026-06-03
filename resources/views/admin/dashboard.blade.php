<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
     <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Dashboard Admin - TinyThink</title>
    <link rel="stylesheet" href="{{ asset('assets/css/admin.css') }}">
</head>
<body>

    @include('admin.partials.sidebar')

<div class="main">
    <div class="topbar">
        <div>
            <h1>Dashboard Admin</h1>
            <p>Kelola semua konten pembelajaran TinyThink dari sini.</p>
        </div>

        <div style="display:flex;align-items:center;gap:12px;">
            <div class="admin-badge">Admin TinyThink</div>

            <form method="POST" action="{{ route('admin.logout') }}" style="margin:0;">
                @csrf
                <button type="submit" style="
                    padding:8px 18px;
                    background:#ef4444;
                    color:#fff;
                    border:none;
                    border-radius:8px;
                    font-size:13px;
                    font-weight:700;
                    cursor:pointer;
                    transition:background .2s;
                " onmouseover="this.style.background='#dc2626'"
                onmouseout="this.style.background='#ef4444'">
                    Logout
                </button>
            </form>
        </div>
    </div>

    <div class="cards">
        <div class="card">
            <div class="icon">🔤</div>
            <h3>Huruf Abjad</h3>
            <div class="number">0</div>
        </div>

        <div class="card">
            <div class="icon">🕌</div>
            <h3>Doa Harian</h3>
            <div class="number">0</div>
        </div>

        <div class="card">
            <div class="icon">📚</div>
            <h3>Hadist</h3>
            <div class="number">0</div>
        </div>

        <div class="card">
            <div class="icon">📖</div>
            <h3>Surat Pendek</h3>
            <div class="number">0</div>
        </div>
    </div>

    <div class="grid">
        <div class="panel">
            <h2>Aksi Cepat</h2>

            <div class="quick-grid">
                <a href="/admin/modules/create" class="quick">+ Tambah Huruf Abjad</a>
                <a href="/admin/doa-harian/create" class="quick">+ Tambah Doa Harian</a>
                <a href="/admin/hadist/create" class="quick">+ Tambah Hadist</a>
                <a href="/admin/surat-pendek/create" class="quick">+ Tambah Surat Pendek</a>
            </div>
        </div>

        <div class="panel">
            <h2>Status Admin</h2>

            <div class="activity">
                <strong>Dashboard aktif</strong>
                <span>Panel admin TinyThink berjalan normal.</span>
            </div>

            <div class="activity">
                <strong>Database aktif</strong>
                <span>Konten tersimpan melalui MySQL.</span>
            </div>

            <div class="activity">
                <strong>Storage aktif</strong>
                <span>Upload gambar, audio, dan video tersedia.</span>
            </div>
        </div>
    </div>
</div>

</body>
</html>