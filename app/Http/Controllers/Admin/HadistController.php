<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hadist;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class HadistController extends Controller
{
    public function index()
    {
        $hadists = Hadist::latest()->get();

        return view('admin.hadist.index', compact('hadists'));
    }

    public function create()
    {
        return view('admin.hadist.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'video' => 'nullable|mimes:mp4,mov,avi|max:50000',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5000',
        ]);

        $videoPath = null;
        $imagePath = null;

        if ($request->hasFile('video')) {
            $videoPath = $request->file('video')
                ->store('hadist-videos', 'public');
        }

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')
                ->store('hadist-images', 'public');
        }

        Hadist::create([
            'title' => $request->title,
            'key' => Str::slug($request->title),
            'emoji' => $request->emoji,
            'video' => $videoPath,
            'image' => $imagePath,
            'arab' => $request->arab,
            'latin' => $request->latin,
            'arti' => $request->arti,
        ]);

        return redirect()->route('admin.hadist.index');
    }

    public function edit(Hadist $hadist)
    {
        return view('admin.hadist.edit', compact('hadist'));
    }

    public function update(Request $request, Hadist $hadist)
    {
        $request->validate([
            'title' => 'required',
            'video' => 'nullable|mimes:mp4,mov,avi|max:50000',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5000',
        ]);

        $videoPath = $hadist->video;
        $imagePath = $hadist->image;

        if ($request->hasFile('video')) {
            $videoPath = $request->file('video')
                ->store('hadist-videos', 'public');
        }

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')
                ->store('hadist-images', 'public');
        }

        $hadist->update([
            'title' => $request->title,
            'key' => Str::slug($request->title),
            'emoji' => $request->emoji,
            'video' => $videoPath,
            'image' => $imagePath,
            'arab' => $request->arab,
            'latin' => $request->latin,
            'arti' => $request->arti,
        ]);

        return redirect()->route('admin.hadist.index');
    }

    public function destroy(Hadist $hadist)
    {
        $hadist->delete();

        return redirect()->route('admin.hadist.index');
    }
}