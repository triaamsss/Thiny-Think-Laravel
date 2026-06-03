<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DoaHarian;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DoaHarianController extends Controller
{
    public function index()
    {
        $doaHarians = DoaHarian::latest()->get();

        return view('admin.doa-harian.index', compact('doaHarians'));
    }

    public function create()
    {
        return view('admin.doa-harian.create');
    }

    public function store(Request $request)
    {
        $imagePath = null;
        $quizImagePath = null;

        $audioPath = null;
        $quizAudioPath = null;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')
                ->store('doa-images', 'public');
        }

        if ($request->hasFile('quiz_image')) {
            $quizImagePath = $request->file('quiz_image')
                ->store('doa-quiz-images', 'public');
        }

        if ($request->hasFile('audio')) {
            $audioPath = $request->file('audio')
                ->store('doa-audios', 'public');
        }

        if ($request->hasFile('quiz_audio')) {
            $quizAudioPath = $request->file('quiz_audio')
                ->store('doa-quiz-audios', 'public');
        }

        DoaHarian::create([
            'title' => $request->title,
            'key' => Str::slug($request->title),
            'tag' => $request->tag,
            'image' => $imagePath,
            'quiz_image' => $quizImagePath,
            'audio' => $audioPath,
            'quiz_audio' => $quizAudioPath,
            'arab' => $request->arab,
            'latin' => $request->latin,
            'arti' => $request->arti,
        ]);

        return redirect()->route('admin.doa-harian.index');
    }

    public function edit(DoaHarian $doa_harian)
    {
        return view('admin.doa-harian.edit', [
            'doaHarian' => $doa_harian
        ]);
    }

    public function update(Request $request, DoaHarian $doa_harian)
    {
        $imagePath = $doa_harian->image;
        $audioPath = $doa_harian->audio;

        $audioPath = $doa_harian->audio;
        $quizAudioPath = $doa_harian->quiz_audio;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')
                ->store('doa-images', 'public');
        }

        if ($request->hasFile('quiz_image')) {
            $quizImagePath = $request->file('quiz_image')
                ->store('doa-quiz-images', 'public');
        }
        
        if ($request->hasFile('audio')) {
            $audioPath = $request->file('audio')
                ->store('doa-audios', 'public');
        }

        if ($request->hasFile('quiz_audio')) {
            $quizAudioPath = $request->file('quiz_audio')
                ->store('doa-quiz-audios', 'public');
        }

        $doa_harian->update([
            'title' => $request->title,
            'key' => Str::slug($request->title),
            'tag' => $request->tag,
            'image' => $imagePath,
            'quiz_image' => $quizImagePath,
            'audio' => $audioPath,
            'quiz_audio' => $quizAudioPath,
            'arab' => $request->arab,
            'latin' => $request->latin,
            'arti' => $request->arti,
        ]);

        return redirect()->route('admin.doa-harian.index');
    }

    public function destroy(DoaHarian $doa_harian)
    {
        $doa_harian->delete();

        return redirect()->route('admin.doa-harian.index');
    }
}