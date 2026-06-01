<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KosaKata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KosaKataController extends Controller
{
    public function index()
    {
        $kosaKatas = KosaKata::latest()->get();

        return view('admin.kosa-kata.index', compact('kosaKatas'));
    }

    public function create()
    {
        return view('admin.kosa-kata.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'kategori' => 'required',
        'kata' => 'required',
        'suku' => 'required',
        'tipe_game' => 'required',
        'audio' => 'nullable|file|mimes:mp3,wav,ogg,m4a,mp4|max:10240',
    ]);

    $audioPath = null;

    if ($request->hasFile('audio')) {
        $audioPath = $request->file('audio')->store('kosa-kata/audio', 'public');
    }

    KosaKata::create([
        'kategori' => $request->kategori,
        'label' => $request->label,
        'kata' => strtoupper($request->kata),
        'suku' => array_map('trim', explode(',', strtoupper($request->suku))),
        'emoji' => $request->emoji,
        'audio' => $audioPath,
        'tipe_game' => $request->tipe_game,
    ]);

    return redirect()->route('admin.kosa-kata.index')
        ->with('success', 'Data kosa kata berhasil ditambahkan.');
}

    public function edit(KosaKata $kosa_katum)
    {
        return view('admin.kosa-kata.edit', [
            'kosaKata' => $kosa_katum
        ]);
    }

    public function update(Request $request, KosaKata $kosa_katum)
{
    $request->validate([
        'kategori' => 'required',
        'kata' => 'required',
        'suku' => 'required',
        'tipe_game' => 'required',
        'audio' => 'nullable|file|mimes:mp3,wav,ogg,m4a,mp4|max:10240',
    ]);

    $audioPath = $kosa_katum->audio;

    if ($request->hasFile('audio')) {
        if ($kosa_katum->audio && Storage::disk('public')->exists($kosa_katum->audio)) {
            Storage::disk('public')->delete($kosa_katum->audio);
        }

        $audioPath = $request->file('audio')->store('kosa-kata/audio', 'public');
    }

    $kosa_katum->update([
        'kategori' => $request->kategori,
        'label' => $request->label,
        'kata' => strtoupper($request->kata),
        'suku' => array_map('trim', explode(',', strtoupper($request->suku))),
        'emoji' => $request->emoji,
        'audio' => $audioPath,
        'tipe_game' => $request->tipe_game,
    ]);

    return redirect()->route('admin.kosa-kata.index')
        ->with('success', 'Data kosa kata berhasil diperbarui.');
}

public function destroy(KosaKata $kosa_katum)
{
    if ($kosa_katum->audio && Storage::disk('public')->exists($kosa_katum->audio)) {
        Storage::disk('public')->delete($kosa_katum->audio);
    }

    $kosa_katum->delete();

    return redirect()->route('admin.kosa-kata.index')
        ->with('success', 'Data kosa kata berhasil dihapus.');
}
}