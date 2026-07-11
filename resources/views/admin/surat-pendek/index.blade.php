<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Surat Pendek Admin - TinyThink</title>
    <link rel="stylesheet" href="{{ asset('assets/css/admin.css') }}">
</head>
<body>

@include('admin.partials.sidebar')

<div class="main surat-pendek-page">

    <div class="topbar">
        <div>
            <h1>📖 Surat Pendek</h1>
            <p>Kelola semua surat pendek TinyThink.</p>
        </div>

        <div class="action-buttons">
            <a href="{{ route('admin.surat-pendek.create') }}" class="btn">+ Tambah Surat</a>
        </div>
    </div>

    <div class="panel">
        <h2>Daftar Surat Pendek</h2>

        @if($surats->count() > 0)
            <table style="width:100%;border-collapse:collapse;margin-top:20px;">
                <thead>
                    <tr style="background:#f3f4f6;">
                        <th style="padding:14px;text-align:left;">No</th>
                        <th style="padding:14px;text-align:left;">Emoji</th>
                        <th style="padding:14px;text-align:left;">Judul</th>
                        <th style="padding:14px;text-align:left;">Key</th>
                        <th style="padding:14px;text-align:left;">Arti</th>
                        <th style="padding:14px;text-align:left;">Audio</th>
                        <th style="padding:14px;text-align:left;">Aksi</th>
                    </tr>
                </thead>

                <tbody>
    @foreach($surats as $surat)
        <tr style="border-bottom:1px solid #e5e7eb;">
            <td style="padding:14px;">{{ $loop->iteration }}</td>

            <td style="padding:14px;font-size:28px;">
                {{ $surat->emoji ?? '📖' }}
            </td>

            <td style="padding:14px;">
                <strong>{{ $surat->title }}</strong> <br>
                <small style="color: #6b7280;">{{ $surat->arab_title }}</small>
            </td>

            <td style="padding:14px;">
                <small>{{ $surat->ayats->first()->no_ayat ?? '-' }}</small>
            </td>

            <td style="padding:14px;">
                {{ $surat->ayats->first()->arti ?? '-' }}
            </td>

            <td style="padding:14px;">
                @if($surat->ayats->first() && $surat->ayats->first()->audio)
                    <audio controls style="width:180px;border-radius:10px;">
                        <source src="{{ asset('storage/' . $surat->ayats->first()->audio) }}" type="audio/mpeg">
                        Browser kamu tidak mendukung audio player.
                    </audio>
                @else
                    <span style="color: #9ca3af; font-style: italic;">Tidak ada audio</span>
                @endif
            </td>

            <td style="padding:14px;">
                <div class="action-btns">
                    <a href="{{ route('admin.surat-pendek.edit', $surat->id) }}" class="btn-edit">
                        Edit
                    </a>

                    <form
                        action="{{ route('admin.surat-pendek.destroy', $surat->id) }}"
                        method="POST"
                        onsubmit="return confirm('Hapus surat ini?')"
                        style="display:inline-block;"
                    >
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn-delete">
                            Delete
                        </button>
                    </form>
                </div>
            </td>
        </tr>
    @endforeach
</tbody>
            </table>
        @else
            <div class="empty">Belum ada surat</div>
        @endif
    </div>

</div>

</body>
</html>