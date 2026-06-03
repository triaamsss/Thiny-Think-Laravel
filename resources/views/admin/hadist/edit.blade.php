<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Hadist - TinyThink Admin</title>

    <link rel="stylesheet" href="{{ asset('assets/css/admin.css') }}">
</head>
<body>

@include('admin.partials.sidebar')

<div class="main">

    <div class="topbar">

        <div>
            <h1>✏️ Edit Hadist</h1>
            <p>Perbarui hadist TinyThink.</p>
        </div>

        <a href="{{ route('admin.hadist.index') }}" class="btn">
            ← Kembali
        </a>

    </div>

    <div class="panel">

        <form
            action="{{ route('admin.hadist.update', $hadist->id) }}"
            method="POST"
            enctype="multipart/form-data"
            class="form-admin"
        >

            @csrf
            @method('PUT')

            <label>Judul Hadist</label>
            <input
                type="text"
                name="title"
                value="{{ $hadist->title }}"
                required
            >

            <label>Emoji</label>
            <input
                type="text"
                name="emoji"
                value="{{ $hadist->emoji }}"
            >

            <label>Video Sekarang</label>

                @if($hadist->video)

                    <video
                        controls
                        style="
                            width:100%;
                            max-width:320px; /* Diperlebar sedikit agar lebih pas */
                            border-radius:16px;
                            margin-bottom:16px;
                            display:block;
                        "
                    >
                        <source src="{{ asset($hadist->video) }}" type="video/mp4">
                    </video>

                @endif

            <label>Ganti Video</label>
            <input type="file" name="video">

            @if($hadist->image)

                <img
                    src="{{ asset('storage/' . $hadist->image) }}"
                    width="140"
                    style="
                        border-radius:16px;
                        margin-bottom:16px;
                        display:block;
                    "
                >

            @endif
            <label>Teks Arab</label>
            <textarea
                name="arab"
                class="arab-input"
            >{{ $hadist->arab }}</textarea>

            <label>Latin</label>
            <textarea
                name="latin"
            >{{ $hadist->latin }}</textarea>

            <label>Arti</label>
            <textarea
                name="arti"
            >{{ $hadist->arti }}</textarea>

            <button type="submit" class="btn save-btn">
                💾 Update Hadist
            </button>

        </form>

    </div>

</div>

</body>
</html>