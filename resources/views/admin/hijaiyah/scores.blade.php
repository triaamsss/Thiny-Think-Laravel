<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Nilai Siswa Hijaiyah - TinyThink</title>
    <link rel="stylesheet" href="{{ asset('assets/css/admin.css') }}">
    <style>
        .filter-bar { background:#fff; border-radius:12px; padding:20px; margin-bottom:20px; box-shadow:0 1px 4px rgba(0,0,0,.06); display:flex; flex-wrap:wrap; gap:12px; align-items:flex-end; }
        .filter-bar label { display:block; font-size:11px; font-weight:700; color:#6b7280; margin-bottom:5px; text-transform:uppercase; letter-spacing:.04em; }
        .filter-bar input[type=text], .filter-bar select { padding:8px 12px; border:2px solid #e5e7eb; border-radius:8px; font-size:13px; color:#374151; font-weight:600; }
        .filter-bar input[type=text]:focus, .filter-bar select:focus { outline:none; border-color:#0d9488; }
        .cb-group { display:flex; align-items:center; gap:6px; padding-bottom:2px; }
        .cb-group input { width:16px; height:16px; accent-color:#0d9488; cursor:pointer; }
        .cb-group label { font-size:13px; color:#374151; font-weight:600; cursor:pointer; margin:0; }
        .btn-filter { padding:8px 18px; background:linear-gradient(135deg,#0d9488,#059669); color:#fff; border:none; border-radius:8px; font-weight:700; font-size:13px; cursor:pointer; }
        .btn-reset { font-size:13px; color:#9ca3af; font-weight:600; text-decoration:none; padding:8px 10px; }
        .btn-export { display:inline-flex; align-items:center; gap:6px; padding:8px 16px; border-radius:8px; font-weight:700; font-size:13px; text-decoration:none; transition:opacity .2s; }
        .btn-csv  { background:#059669; color:#fff; }
        .btn-pdf  { background:#dc2626; color:#fff; }
        .btn-export:hover { opacity:.88; }
        .ml-auto { margin-left:auto; display:flex; gap:8px; }

        .bulk-bar { display:none; background:#f0fdfa; border:1.5px solid #99f6e4; border-radius:12px; padding:12px 18px; margin-bottom:16px; align-items:center; gap:10px; flex-wrap:wrap; }
        .bulk-bar span { font-size:13px; font-weight:800; color:#0f766e; }

        .table-wrap { background:#fff; border-radius:12px; box-shadow:0 1px 4px rgba(0,0,0,.06); overflow:hidden; }
        table { width:100%; border-collapse:collapse; font-size:13px; }
        thead tr { background:#f0fdfa; }
        thead th { padding:12px 16px; text-align:left; font-size:11px; font-weight:800; color:#0f766e; text-transform:uppercase; letter-spacing:.05em; }
        tbody tr { border-bottom:1px solid #f3f4f6; transition:background .15s; }
        tbody tr:hover { background:#f9fafb; }
        tbody td { padding:12px 16px; color:#374151; }
        .score-pass { font-weight:800; color:#059669; }
        .score-fail { font-weight:800; color:#d97706; }
        .score-none { font-size:12px; color:#d1d5db; font-weight:600; }
        .score-detail { font-size:11px; color:#9ca3af; }
        .pagination-wrap { padding:14px 16px; border-top:1px solid #f3f4f6; }
    </style>
</head>
<body>

@include('admin.partials.sidebar')

<div class="main">

    <div class="topbar">
        <div>
            <h1>Nilai Siswa Hijaiyah</h1>
            <p>Rekap nilai kuis dan pencocokkan huruf semua siswa.</p>
        </div>
    </div>

    @if(session('success'))
        <div style="background:#d1fae5;border:1px solid #6ee7b7;color:#065f46;padding:12px 18px;border-radius:10px;margin-bottom:16px;font-weight:600;">
            ✅ {{ session('success') }}
        </div>
    @endif

    {{-- Filter --}}
    <form method="GET" action="{{ route('admin.hijaiyah.scores') }}">
        <div class="filter-bar">
            <div>
                <label>Nama Siswa</label>
                <input type="text" name="name" value="{{ request('name') }}" placeholder="Cari nama...">
            </div>
            <div class="cb-group">
                <input type="checkbox" name="has_basic" id="has_basic" value="1" {{ request('has_basic') ? 'checked' : '' }}>
                <label for="has_basic">Ada Kuis Dasar</label>
            </div>
            <div class="cb-group">
                <input type="checkbox" name="has_advanced" id="has_advanced" value="1" {{ request('has_advanced') ? 'checked' : '' }}>
                <label for="has_advanced">Ada Pencocokkan Huruf</label>
            </div>
            <div style="display:flex;align-items:center;gap:8px;">
                <button type="submit" class="btn-filter">Filter</button>
                <a href="{{ route('admin.hijaiyah.scores') }}" class="btn-reset">Reset</a>
            </div>
            <div class="ml-auto">
                <a href="{{ route('admin.hijaiyah.export-csv') . '?' . request()->getQueryString() }}" class="btn-export btn-csv">
                    ↓ CSV
                </a>
                <a href="{{ route('admin.hijaiyah.export-pdf') . '?' . request()->getQueryString() }}" class="btn-export btn-pdf">
                    ↓ PDF
                </a>
            </div>
        </div>
    </form>

    {{-- Bulk action bar --}}
    <div id="bulk-bar" class="bulk-bar">
        <span id="bulk-count"></span>
        <button type="button" onclick="submitBulk('export-csv')" class="btn-export btn-csv" style="font-size:12px;padding:6px 14px;">CSV Terpilih</button>
        <button type="button" onclick="submitBulk('export-pdf')" class="btn-export btn-pdf" style="font-size:12px;padding:6px 14px;">PDF Terpilih</button>
        <button type="button" onclick="confirmDelete()" class="btn-export btn-pdf" style="font-size:12px;padding:6px 14px;">🗑 Hapus Terpilih</button>
        <button type="button" onclick="clearSelection()" style="margin-left:auto;font-size:12px;color:#9ca3af;font-weight:600;background:none;border:none;cursor:pointer;">Batalkan</button>
    </div>

    {{-- Table --}}
    <form id="bulk-form" method="POST" action="">
        @csrf
        <input type="hidden" id="bulk-action-input" name="_bulk_action" value="">

        <div class="table-wrap">
            <table>
                <thead>
                    <tr>
                        <th style="width:36px;">
                            <input type="checkbox" id="select-all" style="width:15px;height:15px;accent-color:#0d9488;cursor:pointer;">
                        </th>
                        <th>Nama Siswa</th>
                        <th>Kuis Dasar</th>
                        <th>Pencocokkan Huruf</th>
                        <th>Bergabung</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($players as $player)
                        @php
                            $basic    = $player->quizScores->firstWhere('quiz_type', 'basic');
                            $advanced = $player->quizScores->firstWhere('quiz_type', 'advanced');
                        @endphp
                        <tr>
                            <td>
                                <input type="checkbox" name="ids[]" value="{{ $player->id }}"
                                       class="row-check" style="width:15px;height:15px;accent-color:#0d9488;cursor:pointer;">
                            </td>
                            <td style="font-weight:700;color:#111827;">{{ $player->name }}</td>
                            <td>
                                @if($basic)
                                    <span class="{{ $basic->score >= 70 ? 'score-pass' : 'score-fail' }}">{{ $basic->score }}%</span>
                                    <span class="score-detail"> ({{ $basic->correct_answers }}/{{ $basic->total_questions }})</span>
                                @else
                                    <span class="score-none">Belum</span>
                                @endif
                            </td>
                            <td>
                                @if($advanced)
                                    <span class="{{ $advanced->score >= 70 ? 'score-pass' : 'score-fail' }}">{{ $advanced->score }}%</span>
                                    <span class="score-detail"> ({{ $advanced->correct_answers }}/{{ $advanced->total_questions }})</span>
                                @else
                                    <span class="score-none">Belum</span>
                                @endif
                            </td>
                            <td style="color:#9ca3af;font-size:12px;">{{ $player->created_at->format('d/m/Y H:i') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" style="padding:40px;text-align:center;color:#9ca3af;font-weight:600;">
                                Tidak ada data yang cocok.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="pagination-wrap">
                {{ $players->links() }}
            </div>
        </div>
    </form>

</div>

<script>
    const selectAll = document.getElementById('select-all');
    const bulkBar   = document.getElementById('bulk-bar');
    const bulkCount = document.getElementById('bulk-count');
    const bulkForm  = document.getElementById('bulk-form');

    selectAll.addEventListener('change', function () {
        document.querySelectorAll('.row-check').forEach(cb => cb.checked = this.checked);
        updateBulkBar();
    });

    document.querySelectorAll('.row-check').forEach(cb => {
        cb.addEventListener('change', function () {
            if (!this.checked) selectAll.checked = false;
            updateBulkBar();
        });
    });

    function updateBulkBar() {
        const checked = document.querySelectorAll('.row-check:checked');
        bulkBar.style.display = checked.length > 0 ? 'flex' : 'none';
        bulkCount.textContent = checked.length + ' data dipilih';
    }

    function clearSelection() {
        document.querySelectorAll('.row-check').forEach(cb => cb.checked = false);
        selectAll.checked = false;
        bulkBar.style.display = 'none';
    }

    function submitBulk(action) {
        const routes = {
            'export-csv': '{{ route("admin.hijaiyah.export-selected-csv") }}',
            'export-pdf': '{{ route("admin.hijaiyah.export-selected-pdf") }}',
            'delete':     '{{ route("admin.hijaiyah.bulk-destroy") }}',
        };
        bulkForm.action = routes[action];
        bulkForm.submit();
    }

    function confirmDelete() {
        const count = document.querySelectorAll('.row-check:checked').length;
        if (confirm(count + ' data siswa akan dihapus permanen. Lanjutkan?')) {
            submitBulk('delete');
        }
    }
</script>

</body>
</html>