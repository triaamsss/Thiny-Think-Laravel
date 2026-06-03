<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Modules - TinyThink Admin</title>
    <link rel="stylesheet" href="{{ asset('assets/css/admin.css') }}">
</head>
<body>

    @include('admin.partials.sidebar')

<div class="main">
    <div class="topbar">
        <div>
            <h1>Huruf Abjad</h1>
                <p>Kelola konten huruf abjad TinyThink.</p>
        </div>

        <a href="{{ route('admin.modules.create') }}" class="btn">+ Tambah Huruf</a>
    </div>

    <div class="panel">
        <h2>Daftar Modules</h2>

        @if($modules->count() > 0)
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul Module</th>
                        <th>Slug</th>
                        <th>Deskripsi</th>
                        <th>Dibuat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($modules as $module)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td><strong>{{ $module->title }}</strong></td>
                            <td><span class="badge">{{ $module->slug }}</span></td>
                            <td>{{ $module->description }}</td>
                            <td>{{ $module->created_at->format('d M Y') }}</td>
                            <td>
                                <a href="{{ route('admin.modules.edit', $module->id) }}">
                                    Edit
                                </a>
                                <form action="{{ route('admin.modules.destroy', $module->id) }}"
                                      method="POST"
                                      style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('Hapus module ini?')">
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
                Belum ada module. Klik tombol <strong>Tambah Module</strong> untuk membuat konten pertama.
            </div>
        @endif
    </div>
</div>

</body>
</html>