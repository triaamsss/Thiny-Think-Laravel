<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Kosa Kata</title>
    <link rel="stylesheet" href="{{ asset('assets/css/admin.css') }}">
</head>
<body>

@include('admin.partials.sidebar')

<div class="main">
    <div class="topbar">
        <div>
            <h1>Edit Kosa Kata</h1>
            <p>Perbarui materi kosakata.</p>
        </div>

        <a href="{{ route('admin.kosa-kata.index') }}" class="btn">
            Kembali
        </a>
    </div>

    <div class="panel">
        <form action="{{ route('admin.kosa-kata.update', $kosaKata->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <label>Kategori</label>
            <select name="kategori" required>
                @foreach(['buah', 'hewan', 'benda', 'alam', 'pekerjaan', 'transportasi', 'sayuran', 'warna'] as $kategori)
                    <option value="{{ $kategori }}" {{ $kosaKata->kategori == $kategori ? 'selected' : '' }}>
                        {{ ucfirst($kategori) }}
                    </option>
                @endforeach
            </select>

            <label>Label</label>
            <input type="text" name="label" value="{{ old('label', $kosaKata->label) }}">

            <label>Kata</label>
            <input type="text" name="kata" value="{{ old('kata', $kosaKata->kata) }}" required>

            <label>Suku Kata</label>
            <input type="text"
                   name="suku"
                   value="{{ old('suku', is_array($kosaKata->suku) ? implode(', ', $kosaKata->suku) : $kosaKata->suku) }}"
                   required>
            <small>Gunakan koma. Contoh: SE, MANG, KA</small>

            <label>Emoji</label>
            <input type="text" name="emoji" value="{{ old('emoji', $kosaKata->emoji) }}">

            <label>Audio</label>

                @if($kosaKata->audio)
                    <div style="margin-bottom: 10px;">
                        <audio controls>
                            <source src="{{ asset('storage/' . $kosaKata->audio) }}">
                            Browser tidak mendukung audio.
                        </audio>
                    </div>
                @endif

                <input type="file" name="audio" accept="audio/*">
                <small>Kosongkan jika tidak ingin mengganti audio.</small>

            <label>Tipe Game</label>
            <select name="tipe_game" required>
                <option value="suku" {{ $kosaKata->tipe_game == 'suku' ? 'selected' : '' }}>
                    Suku Kata
                </option>
                <option value="letter" {{ $kosaKata->tipe_game == 'letter' ? 'selected' : '' }}>
                    Susun Huruf
                </option>
            </select>

            <button type="submit" class="btn">
                Update
            </button>
        </form>
    </div>
</div>

</body>
</html>