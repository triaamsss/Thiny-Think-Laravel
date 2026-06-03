<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Hadist Admin</title>
    <link rel="stylesheet" href="{{ asset('assets/css/admin.css') }}">
</head>
<body>

@include('admin.partials.sidebar')

<div class="main">

    <div class="topbar">
        <div>
            <h1>Hadist</h1>
            <p>Kelola semua hadist TinyThink.</p>
        </div>

        <div class="action-buttons">
            <a href="{{ route('admin.hadist.create') }}" class="btn">+ Tambah Hadist</a>
            <a href="{{ route('admin.quiz.index') }}" class="btn secondary-btn">🧠 Kelola Quiz</a>
        </div>
    </div>

    <div class="panel">
        <h2>Daftar Hadist</h2>

        @if($hadists->count() > 0)
        <table style="width:100%;border-collapse:collapse;margin-top:20px;">
            <thead>
                <tr style="background:#f3f4f6;">
                    <th style="padding:14px;text-align:left;">No</th>
                    <th style="padding:14px;text-align:left;">Emoji</th>
                    <th style="padding:14px;text-align:left;">Judul</th>
                    <th style="padding:14px;text-align:left;">Arti</th>
                    <th style="padding:14px;text-align:left;">Video</th>
                    <th style="padding:14px;text-align:left;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($hadists as $hadist)
                <tr style="border-bottom:1px solid #e5e7eb;">
                    <td style="padding:14px;">{{ $loop->iteration }}</td>
                    <td style="padding:14px;font-size:28px;">{{ $hadist->emoji }}</td>
                    <td style="padding:14px;">
                        <strong>{{ $hadist->title }}</strong><br>
                        <small>{{ $hadist->key }}</small>
                    </td>
                    <td style="padding:14px;">{{ $hadist->arti }}</td>
                    <td style="padding:14px;">
                        @if($hadist->video)
                            <video controls style="width:180px;border-radius:10px;">
                                <source src="{{ asset('storage/' . $hadist->video) }}" type="video/mp4">
                            </video>
                        @else
                            Tidak ada video
                        @endif
                    </td>
                    <td>
                        <div class="action-btns">
                            <a href="{{ route('admin.hadist.edit', $hadist->id) }}" class="btn-edit">Edit</a>
                            <form action="{{ route('admin.hadist.destroy', $hadist->id) }}" method="POST" onsubmit="return confirm('Hapus hadist ini?')" style="display:inline-block;">
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
            <div class="empty">Belum ada hadist.</div>
        @endif
    </div>

</div>

</body>
</html>