<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Surat Pendek - TinyThink Admin</title>

    <link rel="stylesheet" href="{{ asset('assets/css/admin.css') }}">
</head>
<body>

@include('admin.partials.sidebar')

<div class="main">

    <div class="topbar">

        <div>
            <h1>➕ Tambah Surat Pendek</h1>
            <p>Tambahkan surat pendek baru untuk TinyThink.</p>
        </div>

        <a href="{{ route('admin.surat-pendek.index') }}" class="btn">
            ← Kembali
        </a>

    </div>

    <div class="panel">

        <form
            action="{{ route('admin.surat-pendek.store') }}"
            method="POST"
            enctype="multipart/form-data"
            class="form-admin"
        >

            @csrf

            <label>Nama Surat</label>
            <input
                type="text"
                name="title"
                placeholder="Contoh: Al-Fatihah"
                required
            >

            <label>Nama Arab</label>
            <input
                type="text"
                name="arab_title"
                placeholder="الفاتحة"
            >

            <label>Jumlah Ayat</label>
            <input
                type="number"
                name="jumlah_ayat"
                placeholder="7"
            >

            <label>Emoji / Icon</label>
            <input
                type="text"
                name="emoji"
                placeholder="📖"
            >

            <label>Upload Thumbnail</label>
            <input
                type="file"
                name="thumbnail"
            >

            <label>Deskripsi Surat</label>
            <textarea
                name="description"
                placeholder="Penjelasan singkat mengenai surat..."
            ></textarea>

            <button type="submit" class="btn save-btn">
                💾 Simpan Surat Pendek
            </button>

        </form>

    </div>

</div>

</body>
</html>