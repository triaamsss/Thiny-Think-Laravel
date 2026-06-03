<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Huruf Hijaiyah - TinyThink</title>
    <link rel="stylesheet" href="{{ asset('assets/css/admin.css') }}">
    <style>
        .stat-grid { display:grid; grid-template-columns:repeat(3,1fr); gap:16px; margin-bottom:20px; }
        .stat-card { background:#fff; border-radius:16px; padding:20px; box-shadow:0 1px 4px rgba(0,0,0,.06); display:flex; align-items:center; gap:16px; }
        .stat-icon { width:48px; height:48px; border-radius:14px; display:flex; align-items:center; justify-content:center; flex-shrink:0; }
        .stat-icon svg { width:24px; height:24px; color:#fff; }
        .stat-value { font-size:28px; font-weight:900; color:#111827; line-height:1; }
        .stat-label { font-size:12px; font-weight:700; color:#6b7280; margin-top:4px; }

        .avg-grid { display:grid; grid-template-columns:repeat(2,1fr); gap:16px; margin-bottom:20px; }
        .avg-card { background:#fff; border-radius:16px; padding:20px; box-shadow:0 1px 4px rgba(0,0,0,.06); }
        .avg-head { display:flex; align-items:center; gap:10px; margin-bottom:12px; }
        .avg-icon { width:32px; height:32px; border-radius:10px; display:flex; align-items:center; justify-content:center; }
        .avg-icon svg { width:16px; height:16px; }
        .avg-label { font-size:13px; font-weight:700; color:#6b7280; }
        .avg-value { font-size:40px; font-weight:900; line-height:1; }
        .avg-value span { font-size:20px; font-weight:700; }
        .avg-bar-bg { height:8px; border-radius:99px; overflow:hidden; margin-top:12px; }
        .avg-bar-fill { height:100%; border-radius:99px; transition:width .3s; }
        .avg-meta { margin-top:10px; font-size:12px; color:#6b7280; display:flex; gap:8px; }
        .avg-meta strong { font-weight:800; }

        .table-card { background:#fff; border-radius:16px; box-shadow:0 1px 4px rgba(0,0,0,.06); overflow:hidden; }
        .table-head { padding:16px 20px; border-bottom:1px solid #f0fdfa; display:flex; align-items:center; justify-content:space-between; }
        .table-head-left { display:flex; align-items:center; gap:10px; }
        .table-head-icon { width:28px; height:28px; border-radius:8px; background:#ccfbf1; display:flex; align-items:center; justify-content:center; }
        .table-head-icon svg { width:16px; height:16px; color:#0f766e; }
        .table-head h3 { font-size:15px; font-weight:900; color:#111827; }
        .link-all { font-size:12px; font-weight:700; color:#0d9488; text-decoration:none; display:flex; align-items:center; gap:4px; }
        .link-all:hover { color:#0f766e; }
        table { width:100%; border-collapse:collapse; font-size:13px; }
        thead tr { background:#f0fdfa; }
        thead th { padding:10px 16px; text-align:left; font-size:11px; font-weight:800; color:#0f766e; text-transform:uppercase; letter-spacing:.05em; }
        thead th.center { text-align:center; }
        tbody tr { border-bottom:1px solid #f3f4f6; transition:background .15s; }
        tbody tr:hover { background:#f9fafb; }
        tbody td { padding:12px 16px; color:#374151; }
        tbody td.center { text-align:center; }
        .score-pass { display:inline-block; padding:2px 10px; border-radius:99px; background:#d1fae5; color:#065f46; font-weight:800; font-size:12px; }
        .score-fail { display:inline-block; padding:2px 10px; border-radius:99px; background:#fef3c7; color:#92400e; font-weight:800; font-size:12px; }
        .score-none { font-size:12px; color:#d1d5db; font-weight:600; }
    </style>
</head>
<body>

@include('admin.partials.sidebar')

<div class="main">

    <div class="topbar">
        <div>
            <h1>Huruf Hijaiyah</h1>
            <p>Ringkasan statistik belajar dan nilai siswa.</p>
        </div>
    </div>

    {{-- Stat Cards --}}
    <div class="stat-grid">
        <div class="stat-card">
            <div class="stat-icon" style="background:linear-gradient(135deg,#0d9488,#059669);">
                <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>
                </svg>
            </div>
            <div>
                <div class="stat-value">{{ number_format($stats['total_players']) }}</div>
                <div class="stat-label">Total Siswa</div>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon" style="background:linear-gradient(135deg,#0ea5e9,#0284c7);">
                <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>
                </svg>
            </div>
            <div>
                <div class="stat-value">{{ number_format($stats['basic_completed']) }}</div>
                <div class="stat-label">Selesai Kuis Dasar</div>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon" style="background:linear-gradient(135deg,#06b6d4,#0891b2);">
                <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/>
                </svg>
            </div>
            <div>
                <div class="stat-value">{{ number_format($stats['advanced_completed']) }}</div>
                <div class="stat-label">Selesai Pencocokkan Huruf</div>
            </div>
        </div>
    </div>

    {{-- Rata-rata --}}
    <div class="avg-grid">
        <div class="avg-card">
            <div class="avg-head">
                <div class="avg-icon" style="background:#ccfbf1;">
                    <svg viewBox="0 0 20 20" fill="#0f766e"><path d="M9 4.804A7.968 7.968 0 005.5 4c-1.255 0-2.443.29-3.5.804v10A7.969 7.969 0 015.5 14c1.669 0 3.218.51 4.5 1.385A7.962 7.962 0 0114.5 14c1.255 0 2.443.29 3.5.804v-10A7.968 7.968 0 0014.5 4c-1.255 0-2.443.29-3.5.804V12a1 1 0 11-2 0V4.804z"/></svg>
                </div>
                <span class="avg-label">Rata-rata Kuis Dasar</span>
            </div>
            <div class="avg-value" style="color:#0d9488;">
                {{ $stats['avg_basic_score'] }}<span style="color:#5eead4;">%</span>
            </div>
            <div class="avg-bar-bg" style="background:#ccfbf1;">
                <div class="avg-bar-fill" style="width:{{ $stats['avg_basic_score'] }}%;background:linear-gradient(90deg,#0d9488,#34d399);"></div>
            </div>
            <div class="avg-meta">
                <strong style="color:#059669;">✓ {{ $stats['passed_basic'] }} lulus</strong>
                <span>·</span>
                <span>dari {{ $stats['basic_completed'] }} siswa</span>
            </div>
        </div>
        <div class="avg-card">
            <div class="avg-head">
                <div class="avg-icon" style="background:#e0f2fe;">
                    <svg viewBox="0 0 20 20" fill="#0284c7"><path d="M9 4.804A7.968 7.968 0 005.5 4c-1.255 0-2.443.29-3.5.804v10A7.969 7.969 0 015.5 14c1.669 0 3.218.51 4.5 1.385A7.962 7.962 0 0114.5 14c1.255 0 2.443.29 3.5.804v-10A7.968 7.968 0 0014.5 4c-1.255 0-2.443.29-3.5.804V12a1 1 0 11-2 0V4.804z"/></svg>
                </div>
                <span class="avg-label">Rata-rata Pencocokkan Huruf</span>
            </div>
            <div class="avg-value" style="color:#0ea5e9;">
                {{ $stats['avg_advanced_score'] }}<span style="color:#7dd3fc;">%</span>
            </div>
            <div class="avg-bar-bg" style="background:#e0f2fe;">
                <div class="avg-bar-fill" style="width:{{ $stats['avg_advanced_score'] }}%;background:linear-gradient(90deg,#0ea5e9,#22d3ee);"></div>
            </div>
            <div class="avg-meta">
                <strong style="color:#0284c7;">✓ {{ $stats['passed_advanced'] }} lulus</strong>
                <span>·</span>
                <span>dari {{ $stats['advanced_completed'] }} siswa</span>
            </div>
        </div>
    </div>

    {{-- Siswa Terbaru --}}
    <div class="table-card">
        <div class="table-head">
            <div class="table-head-left">
                <div class="table-head-icon">
                    <svg viewBox="0 0 20 20" fill="currentColor"><path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"/></svg>
                </div>
                <h3>Siswa Terbaru</h3>
            </div>
            <a href="{{ route('admin.hijaiyah.scores') }}" class="link-all">
                Lihat Semua Nilai
                <svg width="14" height="14" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/></svg>
            </a>
        </div>
        <table>
            <thead>
                <tr>
                    <th>Nama Siswa</th>
                    <th class="center">Kuis Dasar</th>
                    <th class="center">Pencocokkan Huruf</th>
                    <th>Bergabung</th>
                </tr>
            </thead>
            <tbody>
                @forelse($recentPlayers as $player)
                    @php
                        $basic    = $player->quizScores->firstWhere('quiz_type', 'basic');
                        $advanced = $player->quizScores->firstWhere('quiz_type', 'advanced');
                    @endphp
                    <tr>
                        <td style="font-weight:700;color:#111827;">{{ $player->name }}</td>
                        <td class="center">
                            @if($basic)
                                <span class="{{ $basic->score >= 70 ? 'score-pass' : 'score-fail' }}">{{ $basic->score }}%</span>
                            @else
                                <span class="score-none">Belum</span>
                            @endif
                        </td>
                        <td class="center">
                            @if($advanced)
                                <span class="{{ $advanced->score >= 70 ? 'score-pass' : 'score-fail' }}">{{ $advanced->score }}%</span>
                            @else
                                <span class="score-none">Belum</span>
                            @endif
                        </td>
                        <td style="color:#9ca3af;font-size:12px;">{{ $player->created_at->diffForHumans() }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" style="padding:40px;text-align:center;color:#9ca3af;font-weight:600;">
                            Belum ada siswa yang bergabung.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>
</body>
</html>