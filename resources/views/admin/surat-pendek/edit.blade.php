<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Surat Pendek - TinyThink Admin</title>

    <link rel="stylesheet" href="{{ asset('assets/css/admin.css') }}">
</head>
<body>

@include('admin.partials.sidebar')

<div class="main">

    <div class="topbar">

        <div>
            <h1>✏️ Edit Surat Pendek</h1>
            <p>Perbarui data surat pendek TinyThink.</p>
        </div>

        <a href="{{ route('admin.surat-pendek.index') }}" class="btn">
            ← Kembali
        </a>

    </div>

    <div class="panel">

        <form
            action="{{ route('admin.surat-pendek.update', $suratPendek->id) }}"
            method="POST"
            enctype="multipart/form-data"
            class="form-admin"
        >

            @csrf
            @method('PUT')

            <label>Nama Surat</label>
            <input
                type="text"
                name="title"
                value="{{ $suratPendek->title }}"
                required
            >

            <label>Nama Arab</label>
            <input
                type="text"
                name="arab_title"
                value="{{ $suratPendek->arab_title }}"
            >

            <label>Jumlah Ayat</label>
            <input
                type="number"
                name="jumlah_ayat"
                value="{{ $suratPendek->jumlah_ayat }}"
            >

            <label>Emoji / Icon</label>
            <input
                type="text"
                name="emoji"
                value="{{ $suratPendek->emoji }}"
            >

            <label>Thumbnail Sekarang</label>

            @if($suratPendek->thumbnail)
                <img
                    src="{{ asset('storage/' . $suratPendek->thumbnail) }}"
                    width="140"
                    style="
                        border-radius:16px;
                        margin-bottom:16px;
                        display:block;
                    "
                >
            @endif

            <label>Ganti Thumbnail</label>
            <input type="file" name="thumbnail">

            <label>Deskripsi Surat</label>
            <textarea
                name="description"
            >{{ $suratPendek->description }}</textarea>

            <button type="submit" class="btn save-btn">
                💾 Update Surat Pendek
            </button>

        </form>

    </div>

</div>

</body>
</html>