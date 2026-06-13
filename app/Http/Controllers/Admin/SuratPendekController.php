<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SuratPendek;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SuratPendekController extends Controller
{
    public function index()
    {
        $surats = SuratPendek::latest()->get();

        return view('admin.surat-pendek.index', compact('surats'));
    }

    public function create()
    {
        return view('admin.surat-pendek.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'arab_title' => 'nullable|string|max:255',
            'jumlah_ayat' => 'nullable|integer',
            'emoji' => 'nullable|string|max:50',
            'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'description' => 'nullable|string',

            'ayat' => 'nullable|array',
            'ayat.*.no_ayat' => 'nullable|integer',
            'ayat.*.audio' => 'nullable|file|mimes:mp3,wav,ogg,m4a,mp4|max:10240',
            'ayat.*.arab' => 'nullable|string',
            'ayat.*.latin' => 'nullable|string',
            'ayat.*.arti' => 'nullable|string',
        ]);

        $thumbnailPath = null;

        if ($request->hasFile('thumbnail')) {
            $thumbnailPath = $request->file('thumbnail')
                ->store('surat-pendek-thumbnails', 'public');
        }

        $suratPendek = SuratPendek::create([
            'title' => $request->title,
            'arab_title' => $request->arab_title,
            'jumlah_ayat' => $request->jumlah_ayat,
            'emoji' => $request->emoji,
            'thumbnail' => $thumbnailPath,
            'description' => $request->description,
        ]);

        if ($request->has('ayat')) {
            foreach ($request->ayat as $ayat) {

                $audioPath = null;

                if (isset($ayat['audio'])) {
                    $audioPath = $ayat['audio']->store('surat-pendek-audio', 'public');
                }

                $suratPendek->ayats()->create([
                    'no_ayat' => $ayat['no_ayat'] ?? null,
                    'audio' => $audioPath,
                    'arab' => $ayat['arab'] ?? null,
                    'latin' => $ayat['latin'] ?? null,
                    'arti' => $ayat['arti'] ?? null,
                ]);
            }
        }

        return redirect()
            ->route('admin.surat-pendek.index')
            ->with('success', 'Surat pendek berhasil ditambahkan.');
    }
    public function edit(SuratPendek $surat_pendek)
    {
        return view('admin.surat-pendek.edit', [
            'suratPendek' => $surat_pendek
        ]);
    }

    public function update(Request $request, $id)
    {
        $suratPendek = SuratPendek::findOrFail($id);

        $data = $request->validate([
            'title' => 'required|string|max:255',
            'arab_title' => 'nullable|string|max:255',
            'jumlah_ayat' => 'nullable|integer',
            'emoji' => 'nullable|string|max:50',
            'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'description' => 'nullable|string',

            'ayat' => 'nullable|array',
            'ayat.*.no_ayat' => 'nullable|integer',
            'ayat.*.audio' => 'nullable|file|mimes:mp3,wav,ogg,m4a,mp4|max:10240',
            'ayat.*.arab' => 'nullable|string',
            'ayat.*.latin' => 'nullable|string',
            'ayat.*.arti' => 'nullable|string',
            'ayat.*.old_audio' => 'nullable|string',
        ]);

        if ($request->hasFile('thumbnail')) {
            $data['thumbnail'] = $request->file('thumbnail')
                ->store('surat-pendek-thumbnails', 'public');
        }

        $suratPendek->update([
            'title' => $data['title'],
            'arab_title' => $data['arab_title'] ?? null,
            'jumlah_ayat' => $data['jumlah_ayat'] ?? null,
            'emoji' => $data['emoji'] ?? null,
            'thumbnail' => $data['thumbnail'] ?? $suratPendek->thumbnail,
            'description' => $data['description'] ?? null,
        ]);

        // Hapus data ayat lama, lalu simpan ulang dari form
        $suratPendek->ayats()->delete();

        if ($request->has('ayat')) {
            foreach ($request->ayat as $ayat) {

                $audioPath = $ayat['old_audio'] ?? null;

                if (isset($ayat['audio']) && $ayat['audio'] instanceof \Illuminate\Http\UploadedFile) {
                    $audioPath = $ayat['audio']->store('surat-pendek-audio', 'public');
                }

                $suratPendek->ayats()->create([
                    'no_ayat' => $ayat['no_ayat'] ?? null,
                    'audio' => $audioPath,
                    'arab' => $ayat['arab'] ?? null,
                    'latin' => $ayat['latin'] ?? null,
                    'arti' => $ayat['arti'] ?? null,
                ]);
            }
        }

        return redirect()
            ->route('admin.surat-pendek.index')
            ->with('success', 'Data surat pendek berhasil diperbarui.');
    }

    public function destroy(SuratPendek $surat_pendek)
    {
        $surat_pendek->delete();

        return redirect()->route('admin.surat-pendek.index');
    }
}