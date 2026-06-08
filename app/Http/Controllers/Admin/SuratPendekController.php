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
        $audioPath = null;

        if ($request->hasFile('audio')) {
            $audioPath = $request->file('audio')
                ->store('surat-pendek-audios', 'public');
        }

        SuratPendek::create([
            'title' => $request->title,
            'key' => Str::slug($request->title),
            'emoji' => $request->emoji,
            'audio' => $audioPath ? 'storage/' . $audioPath : null,
            'arab' => $request->arab,
            'latin' => $request->latin,
            'arti' => $request->arti,
        ]);

        return redirect()->route('admin.surat-pendek.index');
    }

    public function edit(SuratPendek $surat_pendek)
    {
        return view('admin.surat-pendek.edit', [
            'suratPendek' => $surat_pendek
        ]);
    }

    public function update(Request $request, SuratPendek $surat_pendek)
    {
        $audioPath = $surat_pendek->audio;

        if ($request->hasFile('audio')) {
            $newAudio = $request->file('audio')
                ->store('surat-pendek-audios', 'public');

            $audioPath = 'storage/' . $newAudio;
        }

        $surat_pendek->update([
            'title' => $request->title,
            'key' => Str::slug($request->title),
            'emoji' => $request->emoji,
            'audio' => $audioPath,
            'arab' => $request->arab,
            'latin' => $request->latin,
            'arti' => $request->arti,
        ]);

        return redirect()->route('admin.surat-pendek.index');
    }

    public function destroy(SuratPendek $surat_pendek)
    {
        $surat_pendek->delete();

        return redirect()->route('admin.surat-pendek.index');
    }
}