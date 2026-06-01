<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Quiz Hadist</title>
    <link rel="stylesheet" href="{{ asset('assets/css/admin.css') }}">
</head>
<body>

@include('admin.partials.sidebar')

<div class="main">
    <div class="topbar">
        <div>
            <h1>➕ Tambah Quiz Hadist</h1>
            <p>Tambahkan soal kuis hadist.</p>
        </div>

        <a href="{{ route('admin.quiz.index') }}" class="btn">← Kembali</a>
    </div>

    <div class="panel">
        <form action="{{ route('admin.quiz.store') }}" method="POST" enctype="multipart/form-data" class="form-admin">
            @csrf

            <label>Pertanyaan</label>
            <textarea name="question" required></textarea>

            <label>Audio Pertanyaan</label>
            <input type="file" name="audio">

            <label>Jawaban A</label>
            <input type="text" name="option_a" required>

            <label>Gambar Jawaban A</label>
            <input type="file" name="option_a_image">

            <label>Jawaban B</label>
            <input type="text" name="option_b" required>

            <label>Gambar Jawaban B</label>
            <input type="file" name="option_b_image">

            <label>Jawaban C</label>
            <input type="text" name="option_c" required>

            <label>Gambar Jawaban C</label>
            <input type="file" name="option_c_image">

            <label>Jawaban Benar</label>
            <select name="correct_answer" required>
                <option value="">-- Pilih --</option>
                <option value="A">Jawaban A</option>
                <option value="B">Jawaban B</option>
                <option value="C">Jawaban C</option>
            </select>

            <br><br>

            <button type="submit" class="btn">
                💾 Simpan Quiz
            </button>
        </form>
    </div>
</div>

</body>
</html>
