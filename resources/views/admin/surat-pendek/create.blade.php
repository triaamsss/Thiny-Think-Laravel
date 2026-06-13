<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Surat Pendek - TinyThink Admin</title>

    <link rel="stylesheet" href="{{ asset('assets/css/admin.css') }}">

    <style>
        .ayat-box {
            border: 1px solid #ddd;
            padding: 18px;
            border-radius: 16px;
            margin-bottom: 18px;
            background: #fff;
        }

        .ayat-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 14px;
        }

        .ayat-header h3 {
            margin: 0;
            color: #1c2c6b;
        }

        .remove-ayat {
            background: #ff4d4d;
            color: white;
            border: none;
            padding: 8px 12px;
            border-radius: 10px;
            cursor: pointer;
        }

        .add-ayat-btn {
            margin-bottom: 20px;
            background: #2f80ed;
            color: white;
            border: none;
            padding: 12px 18px;
            border-radius: 12px;
            cursor: pointer;
            font-weight: bold;
        }

        .arab-text {
            direction: rtl;
            text-align: right;
            font-size: 24px;
            line-height: 2;
        }

        .section-title {
            margin-top: 30px;
            margin-bottom: 8px;
            color: #1c2c6b;
        }

        .section-desc {
            margin-bottom: 20px;
            color: #666;
        }
    </style>
</head>
<body>

@include('admin.partials.sidebar')

<div class="main surat-pendek-page">    

    <div class="topbar">

        <div>
            <h1>➕ Tambah Surat Pendek</h1>
            <p>Tambahkan surat pendek baru untuk TinyThink.</p>
        </div>

        <a href="{{ route('admin.surat-pendek.index') }}" class="btn">
            ← Kembali
        </a>

    </div>

    <div class="panel">

        <form
            action="{{ route('admin.surat-pendek.store') }}"
            method="POST"
            enctype="multipart/form-data"
            class="form-admin"
        >

            @csrf

            <label>Nama Surat</label>
            <input
                type="text"
                name="title"
                placeholder="Contoh: Al-Fatihah"
                value="{{ old('title') }}"
                required
            >

            <label>Nama Arab</label>
            <input
                type="text"
                name="arab_title"
                placeholder="الفاتحة"
                value="{{ old('arab_title') }}"
            >

            <label>Arti Nama Surat</label>
            <input
                type="text"
                name="artiSurat"
                placeholder="Pembukaan"
                value="{{ old('artiSurat') }}"
            >

            <label>Jumlah Ayat</label>
            <input
                type="number"
                name="jumlah_ayat"
                placeholder="7"
                value="{{ old('jumlah_ayat') }}"
            >

            <label>Emoji / Icon</label>
            <input
                type="text"
                name="emoji"
                placeholder="📖"
                value="{{ old('emoji') }}"
            >

            <label>Upload Thumbnail</label>
            <input
                type="file"
                name="thumbnail"
                accept="image/*"
            >

            {{-- BAGIAN MATERI SURAT PENDEK --}}
            <hr style="margin: 30px 0;">

            <h2 class="section-title">📖 Materi Surat Pendek</h2>
            <p class="section-desc">
                Masukkan materi surat pendek seperti nomor ayat, audio, teks Arab, bacaan latin, dan arti bahasa Indonesia.
            </p>

            <div id="ayat-wrapper">

                <div class="ayat-box">

                    <div class="ayat-header">
                        <h3>Ayat / Bacaan 1</h3>

                        <button type="button" class="remove-ayat" onclick="hapusAyat(this)">
                            Hapus
                        </button>
                    </div>

                    <label>Nomor Ayat</label>
                    <input
                        type="number"
                        name="ayat[0][no_ayat]"
                        placeholder="Contoh: 1"
                    >

                    <label>Upload Audio Ayat</label>
                    <input
                        type="file"
                        name="ayat[0][audio]"
                        accept="audio/*,.mp3,.wav,.ogg,.m4a,.mp4"
                    >

                    <label>Teks Arab</label>
                    <textarea
                        name="ayat[0][arab]"
                        class="arab-text"
                        placeholder="Contoh: بِسْمِ اللَّهِ الرَّحْمَٰنِ الرَّحِيمِ"
                    ></textarea>

                    <label>Bacaan Latin</label>
                    <textarea
                        name="ayat[0][latin]"
                        placeholder="Contoh: Bismillahirrahmanirrahim"
                    ></textarea>

                    <label>Arti Bahasa Indonesia</label>
                    <textarea
                        name="ayat[0][arti]"
                        placeholder="Contoh: Dengan nama Allah Yang Maha Pengasih, Maha Penyayang"
                    ></textarea>

                </div>

            </div>

            <button type="button" class="add-ayat-btn" onclick="tambahAyat()">
                + Tambah Ayat
            </button>

            <button type="submit" class="btn save-btn">
                💾 Simpan Surat Pendek
            </button>

        </form>

    </div>

</div>

<script>
    let ayatIndex = 1;

    function tambahAyat() {
        const wrapper = document.getElementById('ayat-wrapper');

        const html = `
            <div class="ayat-box">

                <div class="ayat-header">
                    <h3>Ayat / Bacaan ${ayatIndex + 1}</h3>

                    <button type="button" class="remove-ayat" onclick="hapusAyat(this)">
                        Hapus
                    </button>
                </div>

                <label>Nomor Ayat</label>
                <input
                    type="number"
                    name="ayat[${ayatIndex}][no_ayat]"
                    placeholder="Contoh: ${ayatIndex + 1}"
                >

                <label>Upload Audio Ayat</label>
                <input
                    type="file"
                    name="ayat[${ayatIndex}][audio]"
                    accept="audio/*,.mp3,.wav,.ogg,.m4a,.mp4"
                >

                <label>Teks Arab</label>
                <textarea
                    name="ayat[${ayatIndex}][arab]"
                    class="arab-text"
                    placeholder="Masukkan teks Arab"
                ></textarea>

                <label>Bacaan Latin</label>
                <textarea
                    name="ayat[${ayatIndex}][latin]"
                    placeholder="Masukkan bacaan latin"
                ></textarea>

                <label>Arti Bahasa Indonesia</label>
                <textarea
                    name="ayat[${ayatIndex}][arti]"
                    placeholder="Masukkan arti bahasa Indonesia"
                ></textarea>

            </div>
        `;

        wrapper.insertAdjacentHTML('beforeend', html);
        ayatIndex++;
    }

    function hapusAyat(button) {
        const totalAyat = document.querySelectorAll('.ayat-box').length;

        if (totalAyat <= 1) {
            alert('Minimal harus ada 1 input ayat.');
            return;
        }

        button.closest('.ayat-box').remove();
    }
</script>

</body>
</html>