<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Module - TinyThink Admin</title>
    <style>
        * { box-sizing: border-box; font-family: Arial, sans-serif; }
        body { margin: 0; background: #f5f7fb; color: #111827; }
        .sidebar { width: 250px; height: 100vh; background: #111827; color: white; position: fixed; padding: 24px; }
        .logo { font-size: 26px; font-weight: bold; margin-bottom: 40px; }
        .menu-title { font-size: 12px; color: #9ca3af; margin: 25px 0 10px; }
        .sidebar a { display: block; color: #e5e7eb; text-decoration: none; padding: 13px 15px; border-radius: 10px; margin-bottom: 8px; }
        .sidebar a.active, .sidebar a:hover { background: #6c5ce7; color: white; }
        .main { margin-left: 250px; padding: 35px; }
        .topbar, .panel { background: white; border-radius: 16px; padding: 25px; box-shadow: 0 6px 20px rgba(0,0,0,0.05); }
        .topbar { margin-bottom: 25px; display: flex; justify-content: space-between; align-items: center; }
        .btn { background: #6c5ce7; color: white; padding: 12px 18px; border-radius: 10px; text-decoration: none; border: none; cursor: pointer; }
        .btn-secondary { background: #e5e7eb; color: #111827; }
        label { font-weight: bold; display: block; margin-bottom: 8px; }
        input, textarea {
            width: 100%;
            padding: 14px;
            border: 1px solid #d1d5db;
            border-radius: 10px;
            margin-bottom: 18px;
            font-size: 15px;
        }
        textarea { height: 150px; resize: vertical; }
        .actions { display: flex; gap: 10px; }
        .error { color: red; font-size: 14px; margin-bottom: 10px; }
    </style>
</head>
<body>

<div class="sidebar">
    <div class="logo">🧠 TinyThink</div>

    <div class="menu-title">MAIN</div>
    <a href="/admin">Dashboard</a>

    <div class="menu-title">CONTENT</div>
    <a href="/admin/modules" class="active">Modules</a>
    <a href="/admin/lessons">Lessons</a>
    <a href="/admin/quizzes">Quizzes</a>
    <a href="/admin/articles">Articles</a>
    <a href="/admin/categories">Categories</a>

    <div class="menu-title">USERS</div>
    <a href="/admin/users">Users</a>
    <a href="/admin/progress">Progress</a>

    <div class="menu-title">SETTINGS</div>
    <a href="/admin/settings">Settings</a>
    <a href="/">Lihat Website</a>
</div>

<div class="main">
    <div class="topbar">
        <div>
            <h1>Tambah Module</h1>
            <p>Buat module pembelajaran baru untuk TinyThink.</p>
        </div>

        <a href="{{ route('admin.modules.index') }}" class="btn btn-secondary">Kembali</a>
    </div>

    <div class="panel">
        <form action="{{ route('admin.modules.store') }}" method="POST">
            @csrf

            <label>Judul Module</label>
            @error('title')
                <div class="error">{{ $message }}</div>
            @enderror
            <input type="text" name="title" value="{{ old('title') }}" placeholder="Contoh: Cognitive Bias" required>

            <label>Deskripsi</label>
            <textarea name="description" placeholder="Tulis deskripsi module...">{{ old('description') }}</textarea>

            <div class="actions">
                <button type="submit" class="btn">Simpan Module</button>
                <a href="{{ route('admin.modules.index') }}" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>

</body>
</html>