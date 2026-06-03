<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Lesson - TinyThink Admin</title>
    <style>
        * { box-sizing: border-box; font-family: Arial, sans-serif; }
        body { margin: 0; background: #f5f7fb; color: #111827; }
        .sidebar { width: 250px; height: 100vh; background: #111827; color: white; position: fixed; padding: 24px; }
        .logo { font-size: 26px; font-weight: bold; margin-bottom: 40px; }
        .menu-title { font-size: 12px; color: #9ca3af; margin: 25px 0 10px; }
        .sidebar a { display: block; color: #e5e7eb; text-decoration: none; padding: 13px 15px; border-radius: 10px; margin-bottom: 8px; }
        .sidebar a.active, .sidebar a:hover { background: #6c5ce7; color: white; }
        .main { margin-left: 250px; padding: 35px; }
        .topbar, .panel { background: white; border-radius: 16px; padding: 25px; }
        .topbar { margin-bottom: 25px; display: flex; justify-content: space-between; align-items: center; }
        .btn { background: #6c5ce7; color: white; padding: 12px 18px; border-radius: 10px; text-decoration: none; border: none; cursor: pointer; }
        .btn-secondary { background: #e5e7eb; color: #111827; }
        label { font-weight: bold; display: block; margin-bottom: 8px; }
        input, select, textarea {
            width: 100%;
            padding: 14px;
            border: 1px solid #d1d5db;
            border-radius: 10px;
            margin-bottom: 18px;
            font-size: 15px;
        }
        textarea { height: 220px; resize: vertical; }
        .actions { display: flex; gap: 10px; }
    </style>
</head>
<body>

<div class="sidebar">
    <div class="logo">🧠 TinyThink</div>

    <div class="menu-title">CONTENT</div>
    <a href="/admin/modules">Modules</a>
    <a href="/admin/lessons" class="active">Lessons</a>
</div>

<div class="main">
    <div class="topbar">
        <div>
            <h1>Tambah Lesson</h1>
            <p>Buat materi pembelajaran baru berdasarkan module.</p>
        </div>

        <a href="{{ route('admin.lessons.index') }}" class="btn btn-secondary">Kembali</a>
    </div>

    <div class="panel">
        <form action="{{ route('admin.lessons.store') }}" method="POST">
            @csrf

            <label>Pilih Module</label>
            <select name="module_id" required>
                <option value="">-- Pilih Module --</option>
                @foreach($modules as $module)
                    <option value="{{ $module->id }}">{{ $module->title }}</option>
                @endforeach
            </select>

            <label>Judul Lesson</label>
            <input type="text" name="title" placeholder="Contoh: Pengertian Cognitive Bias" required>

            <label>Isi Materi</label>
            <textarea name="content" placeholder="Tulis isi materi di sini..."></textarea>

            <div class="actions">
                <button type="submit" class="btn">Simpan Lesson</button>
                <a href="{{ route('admin.lessons.index') }}" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>

</body>
</html>