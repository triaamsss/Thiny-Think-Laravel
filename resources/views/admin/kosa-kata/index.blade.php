<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Admin Kosa Kata</title>
    <link rel="stylesheet" href="{{ asset('assets/css/admin.css') }}">
</head>
<body>

@include('admin.partials.sidebar')

<div class="main">
    <div class="topbar">
        <div>
            <h1>Kosa Kata</h1>
            <p>Kelola materi kosakata TinyThink dari halaman ini.</p>
        </div>

        <a href="{{ route('admin.kosa-kata.create') }}" class="btn">
            + Tambah Kosa Kata
        </a>
    </div>

    <div class="panel">
        @if(session('success'))
            <div style="padding: 12px; background: #d1fae5; color: #065f46; border-radius: 10px; margin-bottom: 16px;">
                {{ session('success') }}
            </div>
        @endif

        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kategori</th>
                    <th>Label</th>
                    <th>Kata</th>
                    <th>Suku Kata</th>
                    <th>Emoji</th>
                    <th>Tipe Game</th>
                    <th>Audio</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse($kosaKatas as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ ucfirst($item->kategori) }}</td>
                        <td>{{ $item->label }}</td>
                        <td><strong>{{ $item->kata }}</strong></td>
                        <td>
                            @if(is_array($item->suku))
                                {{ implode(' - ', $item->suku) }}
                            @else
                                {{ $item->suku }}
                            @endif
                        </td>
                        <td>{{ $item->emoji }}</td>
                        <td>{{ $item->tipe_game }}</td>
                        <td>
                            @if($item->audio)
                                <audio controls style="width: 160px;">
                                    <source src="{{ asset('storage/' . $item->audio) }}">
                                </audio>
                            @else
                                -
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.kosa-kata.edit', $item->id) }}">
                                Edit
                            </a>

                            <form action="{{ route('admin.kosa-kata.destroy', $item->id) }}"
                                  method="POST"
                                  style="display:inline;">
                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        onclick="return confirm('Yakin ingin menghapus materi ini?')">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8">Belum ada data kosa kata.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

</body>
</html>