<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Quiz Hadist - TinyThink Admin</title>
    <link rel="stylesheet" href="{{ asset('assets/css/admin.css') }}">
</head>
<body>

@include('admin.partials.sidebar')

<div class="main">

    <div class="topbar">
        <div>
            <h1>🧠 Quiz Hadist</h1>
            <p>Kelola pertanyaan kuis hadist.</p>
        </div>

        <a href="{{ route('admin.quiz.create') }}" class="btn">+ Tambah Quiz</a>
    </div>

    <div class="panel">
        <h2>Daftar Quiz Hadist</h2>

        @if($quizzes->count() > 0)
            <table style="width:100%;border-collapse:collapse;margin-top:20px;">
                <thead>
                    <tr style="background:#f3f4f6;">
                        <th style="padding:14px;text-align:left;">No</th>
                        <th style="padding:14px;text-align:left;">Pertanyaan</th>
                        <th style="padding:14px;text-align:left;">Jawaban Benar</th>
                        <th style="padding:14px;text-align:left;">Audio</th>
                        <th style="padding:14px;text-align:left;">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($quizzes as $quiz)
                        <tr style="border-bottom:1px solid #e5e7eb;">
                            <td style="padding:14px;">{{ $loop->iteration }}</td>
                            <td style="padding:14px;">{{ $quiz->question }}</td>
                            <td style="padding:14px;">{{ $quiz->correct_answer }}</td>
                            <td style="padding:14px;">
                                @if($quiz->audio)
                                    <audio controls style="width:180px;">
                                        <source src="{{ asset('storage/' . $quiz->audio) }}">
                                    </audio>
                                @else
                                    Tidak ada audio
                                @endif
                            </td>
                            <td>
                                <div class="action-btns">
                                    <a href="{{ route('admin.quiz.edit', $quiz->id) }}" class="btn-edit">Edit</a>
                                    <form action="{{ route('admin.quiz.destroy', $quiz->id) }}" method="POST" onsubmit="return confirm('Hapus quiz ini?')" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-delete">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <div class="empty">Belum ada quiz hadist.</div>
        @endif
    </div>

</div>

</body>
</html>