<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Hadist - TinyThink Admin</title>

    <link rel="stylesheet" href="{{ asset('assets/css/admin.css') }}">
</head>
<body>

@include('admin.partials.sidebar')

<div class="main">

    <div class="topbar">

        <div>
            <h1>➕ Tambah Hadist</h1>
            <p>Tambahkan hadist baru untuk TinyThink.</p>
        </div>

        <a href="{{ route('admin.hadist.index') }}" class="btn">
            ← Kembali
        </a>

    </div>

    <div class="panel">

        <form
            action="{{ route('admin.hadist.store') }}"
            method="POST"
            enctype="multipart/form-data"
            class="form-admin"
        >

            @csrf

            <label>Judul Hadist</label>
            <input
                type="text"
                name="title"
                placeholder="Contoh: Menuntut Ilmu"
                required
            >

            <label>Emoji</label>
            <input
                type="text"
                name="emoji"
                placeholder="📚"
            >

            <label>Upload Video</label>
            <input
                type="file"
                name="video"
            >

            <label>Teks Arab</label>
            <textarea
                name="arab"
                class="arab-input"
                placeholder="اُطْلُبُوا الْعِلْمَ..."
            ></textarea>

            <label>Latin</label>
            <textarea
                name="latin"
                placeholder="Uthlubul ilma..."
            ></textarea>

            <label>Arti</label>
            <textarea
                name="arti"
                placeholder="Tuntutlah ilmu..."
            ></textarea>


            <button type="submit" class="btn save-btn">
                💾 Simpan Hadist
            </button>

        </form>

    </div>

</div>

</body>
</html>