<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Quiz;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    // Tampilkan daftar quiz
    public function index()
    {
        $quizzes = Quiz::where('category', 'hadist')->latest()->get();
        return view('admin.quiz.index', compact('quizzes'));
    }

    // Tampilkan form tambah quiz
    public function create()
    {
        return view('admin.quiz.create');
    }

    // Simpan quiz baru
    public function store(Request $request)
    {
        $audioPath = null;
        $optionAImage = null;
        $optionBImage = null;
        $optionCImage = null;

        if ($request->hasFile('audio')) {
            $audioPath = $request->file('audio')->store('quiz-audios', 'public');
        }
        if ($request->hasFile('option_a_image')) {
            $optionAImage = $request->file('option_a_image')->store('quiz-images', 'public');
        }
        if ($request->hasFile('option_b_image')) {
            $optionBImage = $request->file('option_b_image')->store('quiz-images', 'public');
        }
        if ($request->hasFile('option_c_image')) {
            $optionCImage = $request->file('option_c_image')->store('quiz-images', 'public');
        }

        Quiz::create([
            'category' => 'hadist',
            'question' => $request->question,
            'audio' => $audioPath,
            'option_a' => $request->option_a,
            'option_a_image' => $optionAImage,
            'option_b' => $request->option_b,
            'option_b_image' => $optionBImage,
            'option_c' => $request->option_c,
            'option_c_image' => $optionCImage,
            'correct_answer' => $request->correct_answer,
        ]);

        return redirect()->route('admin.quiz.index');
    }

    // Tampilkan form edit quiz
    public function edit($id)
    {
        $quiz = Quiz::findOrFail($id);
        return view('admin.quiz.edit', compact('quiz'));
    }

    // Update quiz
    public function update(Request $request, $id)
    {
        $quiz = Quiz::findOrFail($id);

        if ($request->hasFile('audio')) {
            $quiz->audio = $request->file('audio')->store('quiz-audios', 'public');
        }
        if ($request->hasFile('option_a_image')) {
            $quiz->option_a_image = $request->file('option_a_image')->store('quiz-images', 'public');
        }
        if ($request->hasFile('option_b_image')) {
            $quiz->option_b_image = $request->file('option_b_image')->store('quiz-images', 'public');
        }
        if ($request->hasFile('option_c_image')) {
            $quiz->option_c_image = $request->file('option_c_image')->store('quiz-images', 'public');
        }

        $quiz->update([
            'question' => $request->question,
            'option_a' => $request->option_a,
            'option_b' => $request->option_b,
            'option_c' => $request->option_c,
            'correct_answer' => $request->correct_answer,
        ]);

        return redirect()->route('admin.quiz.index')->with('success', 'Quiz berhasil diupdate');
    }

    // Hapus quiz
    public function destroy($id)
    {
        $quiz = Quiz::findOrFail($id);
        $quiz->delete();

        return redirect()->route('admin.quiz.index')->with('success', 'Quiz berhasil dihapus');
    }
}
