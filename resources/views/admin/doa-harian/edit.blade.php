<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Doa Harian</title>
    <style>
        * { box-sizing: border-box; font-family: Arial, sans-serif; }
        body { margin: 0; background: #f5f7fb; }
        .main {
            max-width: 900px;
            margin: 40px auto;
            background: white;
            padding: 30px;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,.08);
        }
        label { display: block; margin-bottom: 8px; font-weight: bold; }
        input[type=text], input[type=file], textarea {
            width: 100%;
            padding: 14px;
            border-radius: 12px;
            border: 1px solid #d1d5db;
            margin-bottom: 20px;
        }
        textarea { min-height: 120px; }
        button, .btn {
            background: #6c5ce7;
            color: white;
            border: none;
            padding: 14px 20px;
            border-radius: 12px;
            cursor: pointer;
            font-weight: bold;
            text-decoration: none;
            display: inline-block;
        }
        .preview {
            background: #f9fafb;
            padding: 15px;
            border-radius: 12px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

<div class="main">
    <h1>Edit Doa Harian</h1>

    <form action="{{ route('admin.doa-harian.update', $doaHarian->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label>Judul Doa</label>
        <input type="text" name="title" value="{{ $doaHarian->title }}" required>

        <label>Tag</label>
        <input type="text" name="tag" value="{{ $doaHarian->tag }}">

        <label>Gambar Sekarang</label>
        <div class="preview">
            @if($doaHarian->image)
                <img src="{{ asset('storage/' . $doaHarian->image) }}" width="120">
            @else
                <p>Belum ada gambar</p>
            @endif
        </div>

        <label>Ganti Gambar</label>
        <input type="file" name="image">

        <label>Gambar Kuis Sekarang</label>
        <div class="preview">
            @if($doaHarian->quiz_image)
                <img src="{{ asset('storage/' . $doaHarian->quiz_image) }}" width="120">
            @else
                <p>Belum ada gambar kuis</p>
            @endif
        </div>

        <label>Ganti Gambar Kuis</label>
        <input type="file" name="quiz_image">

        <label>Audio Sekarang</label>
        <div class="preview">
            @if($doaHarian->audio)
                <audio controls>
                    <source src="{{ asset('storage/' . $doaHarian->audio) }}">
                </audio>
            @else
                <p>Belum ada audio</p>
            @endif
        </div>

        <label>Ganti Audio MP3</label>
        <input type="file" name="audio">

        <label>Audio Kuis Sekarang</label>
        <div class="preview">
            @if($doaHarian->quiz_audio)
                <audio controls>
                    <source src="{{ asset('storage/' . $doaHarian->quiz_audio) }}">
                </audio>
            @else
                <p>Belum ada audio kuis</p>
            @endif
        </div>
        <label>Ganti Audio Kuis</label>
        <input type="file" name="quiz_audio">

        <label>Arab</label>
        <textarea name="arab">{{ $doaHarian->arab }}</textarea>

        <label>Latin</label>
        <textarea name="latin">{{ $doaHarian->latin }}</textarea>

        <label>Arti</label>
        <textarea name="arti">{{ $doaHarian->arti }}</textarea>

        <button type="submit">Update Doa</button>
        <a href="{{ route('admin.doa-harian.index') }}" class="btn">Kembali</a>
    </form>
</div>

</body>
</html>