<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
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

        <div class="admin-badge">
            Admin TinyThink
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