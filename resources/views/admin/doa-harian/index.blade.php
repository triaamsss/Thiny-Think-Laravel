<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Doa Harian - TinyThink Admin</title>
    <link rel="stylesheet" href="{{ asset('assets/css/admin.css') }}">
</head>
<body>

    @include('admin.partials.sidebar')

<div class="main">
    <div class="topbar">
        <div>
            <h1>Doa Harian</h1>
            <p>Kelola doa harian untuk website TinyThink.</p>
        </div>

        <a href="{{ route('admin.doa-harian.create') }}" class="btn">
            + Tambah Doa
        </a>
    </div>

    <div class="panel">
        <h2>Daftar Doa Harian</h2>

        @if($doaHarians->count() > 0)
        <table style="width:100%;border-collapse:collapse;margin-top:20px;">

            <thead>
                <tr style="background:#f3f4f6;">
                    <th style="padding:14px;text-align:left;">No</th>
                    <th style="padding:14px;text-align:left;">Gambar</th>
                    <th style="padding:14px;text-align:left;">Judul</th>
                    <th style="padding:14px;text-align:left;">Tag</th>
                    <th style="padding:14px;text-align:left;">Audio</th>
                    <th style="padding:14px;text-align:left;">Aksi</th>
                </tr>
            </thead>
        
            <tbody>
        
            @foreach($doaHarians as $doaHarian)
        
                <tr style="border-bottom:1px solid #e5e7eb;">
        
                    <td style="padding:14px;">
                        {{ $loop->iteration }}
                    </td>
        
                    <td style="padding:14px;">
        
                        @if($doaHarian->image)
                            <img
                                src="{{ asset('storage/' . $doaHarian->image) }}"
                                width="70"
                                style="border-radius:10px;"
                            >
                        @endif
        
                    </td>
        
                    <td style="padding:14px;">
                        <strong>{{ $doaHarian->title }}</strong>
                    </td>
        
                    <td style="padding:14px;">
                        {{ $doaHarian->tag }}
                    </td>
        
                    <td style="padding:14px;">
        
                        @if($doaHarian->audio)
                            <audio controls style="width:180px;">
                                <source src="{{ asset('storage/' . $doaHarian->audio) }}">
                            </audio>
                        @endif
        
                    </td>
        
                    <td style="padding:14px;">
        
                        <a
                            href="{{ route('admin.doa-harian.edit', $doaHarian->id) }}"
                            class="btn"
                        >
                            Edit
                        </a>
        
                        <form
                            action="{{ route('admin.doa-harian.destroy', $doaHarian->id) }}"
                            method="POST"
                            style="display:inline;"
                        >
                            @csrf
                            @method('DELETE')
        
                            <button
                                class="btn"
                                style="background:red;"
                                onclick="return confirm('Hapus doa ini?')"
                            >
                                Delete
                            </button>
        
                        </form>
        
                    </td>
        
                </tr>
        
            @endforeach
        
            </tbody>
        
        </table>
        @else
            <div class="empty">
                Belum ada doa harian. Klik tombol <strong>Tambah Doa</strong>.
            </div>
        @endif
    </div>
</div>

</body>
</html>