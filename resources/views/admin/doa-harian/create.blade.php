<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Doa Harian - TinyThink Admin</title>

    <link rel="stylesheet" href="{{ asset('assets/css/admin.css') }}">
</head>
<body>

@include('admin.partials.sidebar')

<div class="main">

    <div class="topbar">

        <div>
            <h1>➕ Tambah Doa Harian</h1>
            <p>Tambahkan doa harian baru untuk TinyThink.</p>
        </div>

    </div>

    <div class="panel">

        <form
            action="{{ route('admin.doa-harian.store') }}"
            method="POST"
            enctype="multipart/form-data"
            class="form-admin"
        >
            @csrf

            <label>Judul Doa</label>
            <input
                type="text"
                name="title"
                placeholder="Contoh: Doa Sebelum Tidur"
                required
            >

            <label>Tag</label>
            <input
                type="text"
                name="tag"
                placeholder="Contoh: Tidur"
            >

            <label>Upload Gambar</label>
            <input
                type="file"
                name="image"
            >

            <label>Upload Audio</label>
            <input
                type="file"
                name="audio"
            >

            <label>Upload Audio Kuis</label>
            <input
                type="file"
                name="quiz_audio"
            >

            <label>Upload Gambar Kuis</label>
            <input
                type="file"
                name="quiz_image"
            >

            <label>Teks Arab</label>
            <textarea
                name="arab"
                placeholder="Tulis teks arab..."
            ></textarea>

            <label>Latin</label>
            <textarea
                name="latin"
                placeholder="Tulis latin..."
            ></textarea>

            <label>Arti</label>
            <textarea
                name="arti"
                placeholder="Tulis arti..."
            ></textarea>

            <button type="submit" class="btn">
                💾 Simpan Doa Harian
            </button>

        </form>

    </div>

</div>

</body>
</html>