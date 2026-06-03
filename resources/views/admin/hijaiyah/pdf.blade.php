<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>{{ $title }}</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'DejaVu Sans', Arial, sans-serif;
            font-size: 11px;
            color: #1f2937;
            background: #ffffff;
        }

        /* ── Page header ── */
        .header {
            background: linear-gradient(135deg, #0f766e 0%, #059669 100%);
            color: #ffffff;
            padding: 20px 24px 16px;
            margin-bottom: 20px;
            border-radius: 8px;
        }
        .header-top {
            display: flex;
            align-items: center;
            margin-bottom: 6px;
        }
        .header h1 {
            font-size: 17px;
            font-weight: 700;
            letter-spacing: .3px;
        }
        .header .sub {
            font-size: 10px;
            opacity: .8;
            margin-top: 2px;
        }
        .header .meta {
            font-size: 9.5px;
            opacity: .7;
            margin-top: 8px;
            border-top: 1px solid rgba(255,255,255,.25);
            padding-top: 8px;
        }

        /* ── Summary chips ── */
        .summary {
            margin-bottom: 16px;
            display: flex;
            gap: 10px;
        }
        .chip {
            background: #f0fdfa;
            border: 1px solid #99f6e4;
            color: #0f766e;
            padding: 6px 14px;
            border-radius: 20px;
            font-size: 10px;
            font-weight: 700;
        }
        .chip span {
            font-size: 14px;
            font-weight: 800;
            display: block;
            line-height: 1.2;
        }

        /* ── Table ── */
        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 10.5px;
        }
        thead tr {
            background: #0f766e;
            color: #ffffff;
        }
        thead th {
            padding: 9px 10px;
            text-align: left;
            font-weight: 700;
            font-size: 9.5px;
            text-transform: uppercase;
            letter-spacing: .5px;
        }
        thead th.center { text-align: center; }

        tbody tr:nth-child(even) { background: #f0fdfa; }
        tbody tr:nth-child(odd)  { background: #ffffff; }

        tbody td {
            padding: 8px 10px;
            border-bottom: 1px solid #e5e7eb;
            vertical-align: middle;
        }
        tbody td.center { text-align: center; }

        .name { font-weight: 700; color: #111827; }

        .badge-pass {
            background: #d1fae5;
            color: #065f46;
            border: 1px solid #6ee7b7;
            padding: 2px 8px;
            border-radius: 12px;
            font-weight: 800;
            font-size: 10px;
        }
        .badge-fail {
            background: #fef3c7;
            color: #92400e;
            border: 1px solid #fcd34d;
            padding: 2px 8px;
            border-radius: 12px;
            font-weight: 800;
            font-size: 10px;
        }
        .badge-none {
            color: #d1d5db;
            font-size: 10px;
        }

        .no {
            width: 28px;
            color: #9ca3af;
            font-size: 9.5px;
            text-align: center;
        }

        /* ── Footer ── */
        .footer {
            margin-top: 18px;
            text-align: right;
            font-size: 9px;
            color: #9ca3af;
            border-top: 1px solid #e5e7eb;
            padding-top: 8px;
        }

        /* ── Empty state ── */
        .empty {
            text-align: center;
            padding: 30px;
            color: #9ca3af;
            font-size: 11px;
        }
    </style>
</head>
<body>

    {{-- Header --}}
    <div class="header">
        <div class="header-top">
            <div>
                <h1>Laporan Nilai Siswa — Belajar Hijaiyah</h1>
                <p class="sub">{{ $title }}</p>
            </div>
        </div>
        <p class="meta">
            Dicetak: {{ now()->locale('id')->isoFormat('dddd, D MMMM YYYY, HH:mm') }}
            &nbsp;·&nbsp;
            Total: {{ count($players) }} siswa
        </p>
    </div>

    {{-- Summary chips --}}
    @php
        $passedBasic    = $players->filter(fn($p) => optional($p->quizScores->firstWhere('quiz_type','basic'))->score    >= 70)->count();
        $passedAdvanced = $players->filter(fn($p) => optional($p->quizScores->firstWhere('quiz_type','advanced'))->score >= 70)->count();
        $doneBasic      = $players->filter(fn($p) => $p->quizScores->firstWhere('quiz_type','basic'))->count();
        $doneAdvanced   = $players->filter(fn($p) => $p->quizScores->firstWhere('quiz_type','advanced'))->count();
    @endphp
    <div class="summary">
        <div class="chip">
            <span>{{ count($players) }}</span>
            Siswa
        </div>
        <div class="chip">
            <span>{{ $doneBasic }}</span>
            Selesai Kuis Dasar
        </div>
        <div class="chip">
            <span>{{ $passedBasic }}</span>
            Lulus Kuis Dasar (≥70%)
        </div>
        <div class="chip">
            <span>{{ $doneAdvanced }}</span>
            Selesai Pencocokkan Huruf
        </div>
        <div class="chip">
            <span>{{ $passedAdvanced }}</span>
            Lulus Pencocokkan Huruf (≥70%)
        </div>
    </div>

    {{-- Table --}}
    @if(count($players))
    <table>
        <thead>
            <tr>
                <th class="no">#</th>
                <th>Nama Siswa</th>
                <th class="center">Kuis Dasar</th>
                <th class="center">Pencocokkan Huruf</th>
                <th>Bergabung</th>
            </tr>
        </thead>
        <tbody>
            @foreach($players as $i => $player)
                @php
                    $basic    = $player->quizScores->firstWhere('quiz_type', 'basic');
                    $advanced = $player->quizScores->firstWhere('quiz_type', 'advanced');
                @endphp
                <tr>
                    <td class="no center">{{ $i + 1 }}</td>
                    <td class="name">{{ $player->name }}</td>
                    <td class="center">
                        @if($basic)
                            <span class="{{ $basic->score >= 70 ? 'badge-pass' : 'badge-fail' }}">
                                {{ $basic->score }}%
                            </span>
                            <span style="font-size:9px;color:#9ca3af;display:block;margin-top:2px;">
                                {{ $basic->correct_answers }}/{{ $basic->total_questions }}
                            </span>
                        @else
                            <span class="badge-none">Belum</span>
                        @endif
                    </td>
                    <td class="center">
                        @if($advanced)
                            <span class="{{ $advanced->score >= 70 ? 'badge-pass' : 'badge-fail' }}">
                                {{ $advanced->score }}%
                            </span>
                            <span style="font-size:9px;color:#9ca3af;display:block;margin-top:2px;">
                                {{ $advanced->correct_answers }}/{{ $advanced->total_questions }}
                            </span>
                        @else
                            <span class="badge-none">Belum</span>
                        @endif
                    </td>
                    <td style="color:#6b7280;font-size:10px;">{{ $player->created_at->format('d/m/Y') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @else
        <p class="empty">Tidak ada data siswa untuk diekspor.</p>
    @endif

    <div class="footer">
        Belajar Hijaiyah &copy; {{ date('Y') }} &nbsp;·&nbsp; Halaman ini dibuat otomatis
    </div>

</body>
</html>