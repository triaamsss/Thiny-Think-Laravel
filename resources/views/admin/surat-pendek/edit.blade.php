<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Surat Pendek - TinyThink Admin</title>

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

        .audio-info {
            font-size: 13px;
            color: #666;
            margin-bottom: 10px;
        }

        textarea.arab-text {
            direction: rtl;
            text-align: right;
            font-size: 24px;
            line-height: 2;
        }
    </style>
</head>
<body>

@include('admin.partials.sidebar')

<div class="main surat-pendek-page">

    <div class="topbar">

        <div>
            <h1>✏️ Edit Surat Pendek</h1>
            <p>Perbarui data surat pendek dan materi ayat TinyThink.</p>
        </div>

        <a href="{{ route('admin.surat-pendek.index') }}" class="btn">
            ← Kembali
        </a>

    </div>

    <div class="panel">

        <form
            action="{{ route('admin.surat-pendek.update', $suratPendek->id) }}"
            method="POST"
            enctype="multipart/form-data"
            class="form-admin"
        >

            @csrf
            @method('PUT')

            <label>Nama Surat</label>
            <input
                type="text"
                name="title"
                value="{{ old('title', $suratPendek->title) }}"
                required
            >

            <label>Nama Arab</label>
            <input
                type="text"
                name="arab_title"
                value="{{ old('arab_title', $suratPendek->arab_title) }}"
            >

            <label>Jumlah Ayat</label>
            <input
                type="number"
                name="jumlah_ayat"
                value="{{ old('jumlah_ayat', $suratPendek->jumlah_ayat) }}"
            >

            <label>Arti Surat</label>
            <textarea name="artiSurat">{{ old('artiSurat', $suratPendek->artiSurat) }}</textarea>

            <label>Emoji / Icon</label>
            <input
                type="text"
                name="emoji"
                value="{{ old('emoji', $suratPendek->emoji) }}"
            >

            <label>Thumbnail Sekarang</label>

            @if($suratPendek->thumbnail)
                <img
                    src="{{ asset('storage/' . $suratPendek->thumbnail) }}"
                    width="140"
                    style="
                        border-radius:16px;
                        margin-bottom:16px;
                        display:block;
                    "
                >
            @else
                <p>Belum ada thumbnail.</p>
            @endif

            <label>Ganti Thumbnail</label>
            <input type="file" name="thumbnail" accept="image/*">

            {{-- BAGIAN MATERI AYAT --}}
            <hr style="margin: 30px 0;">

            <h2>📖 Materi Surat Pendek</h2>
            <p style="margin-bottom: 20px;">
                Masukkan audio, teks Arab, latin, dan arti bahasa Indonesia untuk setiap ayat.
            </p>

            <div id="ayat-wrapper">

                @php
                    $ayatList = old('ayat', $suratPendek->ayats ?? []);
                @endphp

                @forelse($ayatList as $index => $ayat)
                    <div class="ayat-box">

                        <div class="ayat-header">
                            <h3>Ayat / Bacaan {{ $index + 1 }}</h3>

                            <button type="button" class="remove-ayat" onclick="hapusAyat(this)">
                                Hapus
                            </button>
                        </div>

                        <input
                            type="hidden"
                            name="ayat[{{ $index }}][id]"
                            value="{{ $ayat->id ?? $ayat['id'] ?? '' }}"
                        >

                        <input
                            type="hidden"
                            name="ayat[{{ $index }}][old_audio]"
                            value="{{ $ayat->audio ?? $ayat['audio'] ?? '' }}"
                        >

                        <label>Nomor Ayat</label>
                        <input
                            type="number"
                            name="ayat[{{ $index }}][no_ayat]"
                            value="{{ $ayat->no_ayat ?? $ayat['no_ayat'] ?? $ayat->no ?? $ayat['no'] ?? '' }}"
                            placeholder="Contoh: 1"
                        >

                        <label>Audio Sekarang</label>

                        @if(!empty($ayat->audio ?? $ayat['audio'] ?? ''))
                            <div class="audio-info">
                                Audio saat ini:
                                {{ $ayat->audio ?? $ayat['audio'] }}
                            </div>

                            <audio controls style="width: 100%; margin-bottom: 12px;">
                                <source src="{{ asset('storage/' . ($ayat->audio ?? $ayat['audio'])) }}">
                                Browser tidak mendukung audio.
                            </audio>
                        @else
                            <p class="audio-info">Belum ada audio.</p>
                        @endif

                        <label>Upload / Ganti Audio</label>
                        <input
                            type="file"
                            name="ayat[{{ $index }}][audio]"
                            accept="audio/*"
                        >

                        <label>Teks Arab</label>
                        <textarea
                            name="ayat[{{ $index }}][arab]"
                            class="arab-text"
                            placeholder="Masukkan teks Arab"
                        >{{ $ayat->arab ?? $ayat['arab'] ?? '' }}</textarea>

                        <label>Latin</label>
                        <textarea
                            name="ayat[{{ $index }}][latin]"
                            placeholder="Masukkan bacaan latin"
                        >{{ $ayat->latin ?? $ayat['latin'] ?? '' }}</textarea>

                        <label>Arti Bahasa Indonesia</label>
                        <textarea
                            name="ayat[{{ $index }}][arti]"
                            placeholder="Masukkan arti bahasa Indonesia"
                        >{{ $ayat->arti ?? $ayat['arti'] ?? '' }}</textarea>

                    </div>
                @empty
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

                        <label>Upload Audio</label>
                        <input
                            type="file"
                            name="ayat[0][audio]"
                            accept="audio/*"
                        >

                        <label>Teks Arab</label>
                        <textarea
                            name="ayat[0][arab]"
                            class="arab-text"
                            placeholder="Masukkan teks Arab"
                        ></textarea>

                        <label>Latin</label>
                        <textarea
                            name="ayat[0][latin]"
                            placeholder="Masukkan bacaan latin"
                        ></textarea>

                        <label>Arti Bahasa Indonesia</label>
                        <textarea
                            name="ayat[0][arti]"
                            placeholder="Masukkan arti bahasa Indonesia"
                        ></textarea>

                    </div>
                @endforelse

            </div>

            <button type="button" class="add-ayat-btn" onclick="tambahAyat()">
                + Tambah Ayat
            </button>

            <button type="submit" class="btn save-btn">
                💾 Update Surat Pendek
            </button>

        </form>

    </div>

</div>

<script>
    let ayatIndex = document.querySelectorAll('.ayat-box').length;

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
                    placeholder="Contoh: 1"
                >

                <label>Upload Audio</label>
                <input
                    type="file"
                    name="ayat[${ayatIndex}][audio]"
                    accept="audio/*"
                >

                <label>Teks Arab</label>
                <textarea
                    name="ayat[${ayatIndex}][arab]"
                    class="arab-text"
                    placeholder="Masukkan teks Arab"
                ></textarea>

                <label>Latin</label>
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
        button.closest('.ayat-box').remove();
    }
</script>

</body>
</html>