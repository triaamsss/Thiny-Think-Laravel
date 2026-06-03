<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title }} - TinyThink Admin</title>
    <link rel="stylesheet" href="{{ asset('assets/css/admin.css') }}">
    <style>
        .coming-wrap {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 60vh;
            text-align: center;
            padding: 40px;
        }
        .coming-icon {
            font-size: 72px;
            margin-bottom: 24px;
            animation: float 3s ease-in-out infinite;
        }
        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50%       { transform: translateY(-10px); }
        }
        .coming-title {
            font-size: 28px;
            font-weight: 900;
            color: #111827;
            margin-bottom: 10px;
        }
        .coming-sub {
            font-size: 15px;
            color: #6b7280;
            margin-bottom: 32px;
            max-width: 400px;
            line-height: 1.6;
        }
        .coming-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: #fef3c7;
            border: 1.5px solid #fcd34d;
            color: #92400e;
            padding: 10px 22px;
            border-radius: 99px;
            font-size: 13px;
            font-weight: 800;
            margin-bottom: 32px;
        }
        .btn-back {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 10px 22px;
            background: linear-gradient(135deg, #0d9488, #059669);
            color: #fff;
            border-radius: 10px;
            font-size: 13px;
            font-weight: 700;
            text-decoration: none;
            transition: opacity .2s;
        }
        .btn-back:hover { opacity: .88; }
    </style>
</head>
<body>

@include('admin.partials.sidebar')

<div class="main">
    <div class="topbar">
        <div>
            <h1>{{ $title }}</h1>
            <p>Halaman pengelolaan konten {{ $title }}.</p>
        </div>
    </div>

    <div class="coming-wrap">
        <div class="coming-icon">🚧</div>
        <div class="coming-title">Sedang Dalam Pengembangan</div>
        <p class="coming-sub">
            Fitur <strong>{{ $title }}</strong> sedang kami kerjakan dan akan segera tersedia.
            Terima kasih atas kesabarannya!
        </p>
        <div class="coming-badge">
            🛠️ &nbsp; Coming Soon
        </div>
        <a href="{{ route('admin.dashboard') }}" class="btn-back">
            ← Kembali ke Dashboard
        </a>
    </div>
</div>

</body>
</html>