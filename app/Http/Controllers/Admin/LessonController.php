<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lesson;
use App\Models\Module;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class LessonController extends Controller
{
    public function index()
    {
        $lessons = Lesson::with('module')->latest()->get();

        return view('admin.lessons.index', compact('lessons'));
    }

    public function create()
    {
        $modules = Module::all();

        return view('admin.lessons.create', compact('modules'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'module_id' => 'required',
            'title' => 'required',
        ]);

        Lesson::create([
            'module_id' => $request->module_id,
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'content' => $request->content,
        ]);

        return redirect()->route('admin.lessons.index');
    }
    public function edit(Lesson $lesson)
{
    $modules = Module::all();

    return view('admin.lessons.edit', compact('lesson', 'modules'));
}

public function update(Request $request, Lesson $lesson)
{
    $request->validate([
        'module_id' => 'required',
        'title' => 'required',
    ]);

    $lesson->update([
        'module_id' => $request->module_id,
        'title' => $request->title,
        'slug' => Str::slug($request->title),
        'content' => $request->content,
    ]);

    return redirect()->route('admin.lessons.index');
}

public function destroy(Lesson $lesson)
{
    $lesson->delete();

    return redirect()->route('admin.lessons.index');
}
}