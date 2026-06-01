<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Lessons - TinyThink Admin</title>

    <style>
        *{
            box-sizing:border-box;
            font-family:Arial,sans-serif;
        }

        body{
            margin:0;
            background:#f5f7fb;
            color:#111827;
        }

        .sidebar{
            width:250px;
            height:100vh;
            background:#111827;
            color:white;
            position:fixed;
            padding:24px;
        }

        .logo{
            font-size:26px;
            font-weight:bold;
            margin-bottom:40px;
        }

        .menu-title{
            font-size:12px;
            color:#9ca3af;
            margin:25px 0 10px;
        }

        .sidebar a{
            display:block;
            color:#e5e7eb;
            text-decoration:none;
            padding:13px 15px;
            border-radius:10px;
            margin-bottom:8px;
        }

        .sidebar a.active,
        .sidebar a:hover{
            background:#6c5ce7;
            color:white;
        }

        .main{
            margin-left:250px;
            padding:35px;
        }

        .topbar{
            background:white;
            padding:22px 25px;
            border-radius:16px;
            margin-bottom:25px;
            display:flex;
            justify-content:space-between;
            align-items:center;
        }

        .panel{
            background:white;
            border-radius:16px;
            padding:25px;
        }

        .btn{
            background:#6c5ce7;
            color:white;
            padding:12px 18px;
            border-radius:10px;
            text-decoration:none;
        }

        table{
            width:100%;
            border-collapse:collapse;
            margin-top:20px;
        }

        th,td{
            text-align:left;
            padding:15px;
            border-bottom:1px solid #e5e7eb;
        }

        .badge{
            background:#ede9fe;
            color:#6c5ce7;
            padding:6px 12px;
            border-radius:20px;
            font-size:13px;
        }
    </style>
</head>
<body>

<div class="sidebar">

    <div class="logo">🧠 TinyThink</div>

    <div class="menu-title">CONTENT</div>

    <a href="/admin/modules">Modules</a>

    <a href="/admin/lessons" class="active">
        Lessons
    </a>

</div>

<div class="main">

    <div class="topbar">

        <div>
            <h1>Lessons</h1>
            <p>Kelola materi pembelajaran TinyThink.</p>
        </div>

        <a href="{{ route('admin.lessons.create') }}"
           class="btn">
            + Tambah Lesson
        </a>

    </div>

    <div class="panel">

        <h2>Daftar Lessons</h2>

        <table>

            <thead>
                <tr>
                    <th>No</th>
                    <th>Lesson</th>
                    <th>Module</th>
                    <th>Slug</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>

            @foreach($lessons as $lesson)

                <tr>
                    <td>
                        <a href="{{ route('admin.lessons.edit', $lesson->id) }}">Edit</a>
                    
                        <form action="{{ route('admin.lessons.destroy', $lesson->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                    
                            <button onclick="return confirm('Hapus lesson ini?')">
                                Delete
                            </button>
                        </form>
                    </td>

                    <td>{{ $loop->iteration }}</td>

                    <td>
                        <strong>{{ $lesson->title }}</strong>
                    </td>

                    <td>
                        {{ $lesson->module->title }}
                    </td>

                    <td>
                        <span class="badge">
                            {{ $lesson->slug }}
                        </span>
                    </td>

                </tr>

            @endforeach

            </tbody>

        </table>

    </div>

</div>

</body>
</html>