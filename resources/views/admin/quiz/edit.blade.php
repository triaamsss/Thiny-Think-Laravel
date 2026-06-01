<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Quiz - TinyThink Admin</title>
    <link rel="stylesheet" href="{{ asset('assets/css/admin.css') }}">
</head>
<body>

    @include('admin.partials.sidebar')
    
    <div class="main">
        <div class="topbar">
            <div>
                <h1>✏️ Edit Quiz</h1>
                <p>Perbarui pertanyaan kuis hadist.</p>
            </div>
            <a href="{{ route('admin.quiz.index') }}" class="btn">← Kembali</a>
        </div>
    
        <div class="panel">
            <form action="{{ route('admin.quiz.update', $quiz->id) }}" method="POST" enctype="multipart/form-data" class="form-admin">
                @csrf
                @method('PUT')
                <ul>
                    <li>
                        <label>Pertanyaan</label>
                        <textarea name="question" required>{{ $quiz->question }}</textarea>
                    </li>
    
                    <li>
                        <label>Audio Saat Ini</label>
                        @if($quiz->audio)
                            <audio controls>
                                <source src="{{ asset('storage/' . $quiz->audio) }}">
                            </audio>
                        @endif
                        <label>Ganti Audio</label>
                        <input type="file" name="audio">
                    </li>
    
                    <li>
                        <label>Jawaban A</label>
                        <input type="text" name="option_a" value="{{ $quiz->option_a }}" required>
                        @if($quiz->option_a_image)
                            <img src="{{ asset('storage/' . $quiz->option_a_image) }}" alt="Jawaban A">
                        @endif
                        <input type="file" name="option_a_image">
                    </li>
    
                    <li>
                        <label>Jawaban B</label>
                        <input type="text" name="option_b" value="{{ $quiz->option_b }}" required>
                        @if($quiz->option_b_image)
                            <img src="{{ asset('storage/' . $quiz->option_b_image) }}" alt="Jawaban B">
                        @endif
                        <input type="file" name="option_b_image">
                    </li>
    
                    <li>
                        <label>Jawaban C</label>
                        <input type="text" name="option_c" value="{{ $quiz->option_c }}" required>
                        @if($quiz->option_c_image)
                            <img src="{{ asset('storage/' . $quiz->option_c_image) }}" alt="Jawaban C">
                        @endif
                        <input type="file" name="option_c_image">
                    </li>
    
                    <li>
                        <label>Jawaban Benar</label>
                        <select name="correct_answer" required>
                            <option value="A" {{ $quiz->correct_answer == 'A' ? 'selected' : '' }}>Jawaban A</option>
                            <option value="B" {{ $quiz->correct_answer == 'B' ? 'selected' : '' }}>Jawaban B</option>
                            <option value="C" {{ $quiz->correct_answer == 'C' ? 'selected' : '' }}>Jawaban C</option>
                        </select>
                    </li>
    
                    <li>
                        <button type="submit" class="save-btn">💾 Update Quiz</button>
                    </li>
                </ul>
            </form>
        </div>
    </div>
    
    </body>
</html>
