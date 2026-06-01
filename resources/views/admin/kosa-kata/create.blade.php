<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Kosa Kata</title>
    <link rel="stylesheet" href="{{ asset('assets/css/admin.css') }}">
    <style>
        * {
            box-sizing: border-box;
        }
    
        body {
            margin: 0;
            font-family: "Inter", "Segoe UI", Arial, sans-serif;
            background: #f4f7fb;
            color: #1f2937;
        }
    
        .main {
            margin-left: 260px;
            padding: 32px;
            min-height: 100vh;
        }
    
        .page-header {
            background: linear-gradient(135deg, #2563eb, #14b8a6);
            border-radius: 24px;
            padding: 28px 32px;
            margin-bottom: 26px;
            color: #ffffff;
            box-shadow: 0 14px 35px rgba(37, 99, 235, 0.22);
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
        }
    
        .page-header h1 {
            margin: 0;
            font-size: 30px;
            font-weight: 800;
            letter-spacing: -0.5px;
        }
    
        .page-header p {
            margin: 8px 0 0;
            font-size: 15px;
            color: rgba(255, 255, 255, 0.86);
        }
    
        .header-action {
            flex-shrink: 0;
        }
    
        .content-card {
            background: #ffffff;
            border-radius: 24px;
            padding: 30px;
            max-width: 980px;
            box-shadow: 0 14px 35px rgba(15, 23, 42, 0.08);
            border: 1px solid #e5e7eb;
        }
    
        .form-title {
            margin-bottom: 24px;
            padding-bottom: 18px;
            border-bottom: 1px solid #e5e7eb;
        }
    
        .form-title h2 {
            margin: 0;
            font-size: 22px;
            font-weight: 800;
            color: #111827;
        }
    
        .form-title p {
            margin: 6px 0 0;
            font-size: 14px;
            color: #6b7280;
        }
    
        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 22px;
        }
    
        .form-group {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }
    
        .form-group.full {
            grid-column: 1 / -1;
        }
    
        .form-group label {
            font-size: 14px;
            font-weight: 700;
            color: #374151;
        }
    
        .required {
            color: #ef4444;
        }
    
        .form-control,
        .form-select {
            width: 100%;
            min-height: 48px;
            border: 1px solid #d1d5db;
            border-radius: 14px;
            padding: 12px 14px;
            font-size: 15px;
            color: #111827;
            background: #ffffff;
            outline: none;
            transition: all 0.2s ease;
        }
    
        .form-control:focus,
        .form-select:focus {
            border-color: #2563eb;
            box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.12);
        }
    
        .form-control::placeholder {
            color: #9ca3af;
        }
    
        .file-input {
            padding: 11px;
            background: #f9fafb;
            cursor: pointer;
        }
    
        .help-text {
            font-size: 13px;
            line-height: 1.45;
            color: #6b7280;
        }
    
        .info-box {
            grid-column: 1 / -1;
            display: flex;
            gap: 12px;
            align-items: flex-start;
            background: #eff6ff;
            border: 1px solid #bfdbfe;
            color: #1e40af;
            padding: 15px 16px;
            border-radius: 16px;
            font-size: 14px;
            line-height: 1.5;
        }
    
        .info-icon {
            width: 28px;
            height: 28px;
            border-radius: 50%;
            background: #2563eb;
            color: #ffffff;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-weight: 800;
            flex-shrink: 0;
        }
    
        .error-box {
            grid-column: 1 / -1;
            background: #fef2f2;
            border: 1px solid #fecaca;
            color: #991b1b;
            padding: 15px 16px;
            border-radius: 16px;
            font-size: 14px;
            line-height: 1.5;
        }
    
        .audio-preview {
            margin-top: 8px;
            padding: 14px;
            border-radius: 16px;
            background: #f9fafb;
            border: 1px dashed #cbd5e1;
        }
    
        .audio-preview audio {
            width: 100%;
            max-width: 360px;
        }
    
        .form-actions {
            grid-column: 1 / -1;
            display: flex;
            justify-content: flex-end;
            align-items: center;
            gap: 12px;
            margin-top: 8px;
            padding-top: 24px;
            border-top: 1px solid #e5e7eb;
        }
    
        .btn {
            min-height: 46px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            border: none;
            border-radius: 14px;
            padding: 0 20px;
            font-size: 14px;
            font-weight: 800;
            text-decoration: none;
            cursor: pointer;
            transition: all 0.2s ease;
        }
    
        .btn:hover {
            transform: translateY(-1px);
        }
    
        .btn-primary {
            background: #16a34a;
            color: #ffffff;
            box-shadow: 0 8px 18px rgba(22, 163, 74, 0.25);
        }
    
        .btn-primary:hover {
            background: #15803d;
        }
    
        .btn-secondary {
            background: #eef2f7;
            color: #334155;
        }
    
        .btn-secondary:hover {
            background: #e2e8f0;
        }
    
        .btn-light {
            background: rgba(255, 255, 255, 0.18);
            color: #ffffff;
            border: 1px solid rgba(255, 255, 255, 0.35);
        }
    
        .btn-light:hover {
            background: rgba(255, 255, 255, 0.28);
        }
    
        @media (max-width: 1024px) {
            .main {
                margin-left: 0;
                padding: 24px;
            }
        }
    
        @media (max-width: 768px) {
            .page-header {
                flex-direction: column;
                align-items: flex-start;
                padding: 24px;
            }
    
            .content-card {
                padding: 22px;
            }
    
            .form-grid {
                grid-template-columns: 1fr;
            }
    
            .form-actions {
                flex-direction: column-reverse;
                align-items: stretch;
            }
    
            .btn {
                width: 100%;
            }
        }
    </style>
</head>
<body>

@include('admin.partials.sidebar')


<div class="main">
    <div class="page-header">
        <div>
            <h1>Tambah Kosa Kata</h1>
            <p>Tambahkan materi kosakata baru untuk halaman belajar anak.</p>
        </div>

        <div class="header-action">
            <a href="{{ route('admin.kosa-kata.index') }}" class="btn btn-light">
                ← Kembali
            </a>
        </div>
    </div>

    <div class="content-card">
        <div class="form-title">
            <h2>Form Materi Kosa Kata</h2>
            <p>Lengkapi data kategori, kata, suku kata, emoji, audio, dan tipe game.</p>
        </div>

        <form action="{{ route('admin.kosa-kata.store') }}" method="POST" enctype="multipart/form-data" class="form-grid">
            @csrf

            @if ($errors->any())
                <div class="error-box">
                    <strong>Data belum lengkap.</strong><br>
                    {{ $errors->first() }}
                </div>
            @endif

            <div class="info-box">
                <span class="info-icon">i</span>
                <div>
                    Isi suku kata menggunakan tanda koma. Contoh: <strong>SE, MANG, KA</strong>.
                    Audio bersifat opsional, tetapi disarankan agar materi lebih interaktif.
                </div>
            </div>

            <div class="form-group">
                <label>Kategori <span class="required">*</span></label>
                <select name="kategori" class="form-select" required>
                    <option value="">-- Pilih Kategori --</option>
                    <option value="buah">Buah</option>
                    <option value="hewan">Hewan</option>
                    <option value="benda">Benda</option>
                    <option value="alam">Alam</option>
                    <option value="pekerjaan">Pekerjaan</option>
                    <option value="transportasi">Transportasi</option>
                    <option value="sayuran">Sayuran</option>
                    <option value="warna">Warna</option>
                </select>
            </div>

            <div class="form-group">
                <label>Label</label>
                <input type="text" name="label" class="form-control" placeholder="Contoh: 🍎 Buah">
                <small class="help-text">Label akan tampil sebagai nama kategori di halaman public.</small>
            </div>

            <div class="form-group">
                <label>Kata <span class="required">*</span></label>
                <input type="text" name="kata" class="form-control" placeholder="Contoh: APEL" required>
            </div>

            <div class="form-group">
                <label>Suku Kata <span class="required">*</span></label>
                <input type="text" name="suku" class="form-control" placeholder="Contoh: A, PEL" required>
                <small class="help-text">Gunakan koma. Contoh: SE, MANG, KA</small>
            </div>

            <div class="form-group">
                <label>Emoji</label>
                <input type="text" name="emoji" class="form-control" placeholder="Contoh: 🍎">
            </div>

            <div class="form-group">
                <label>Audio</label>
                <input type="file" name="audio" class="form-control file-input" accept="audio/*">
                <small class="help-text">Format: mp3, wav, ogg, m4a, atau mp4. Maksimal 10MB.</small>
            </div>

            <div class="form-group full">
                <label>Tipe Game <span class="required">*</span></label>
                <select name="tipe_game" class="form-select" required>
                    <option value="suku">Suku Kata</option>
                    <option value="letter">Susun Huruf</option>
                </select>
            </div>

            <div class="form-actions">
                <a href="{{ route('admin.kosa-kata.index') }}" class="btn btn-secondary">
                    Batal
                </a>

                <button type="submit" class="btn btn-primary">
                    Simpan Kosa Kata
                </button>
            </div>
        </form>
    </div>
</div>

</body>
</html>