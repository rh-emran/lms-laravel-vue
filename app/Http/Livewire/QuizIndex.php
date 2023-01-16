<?php

namespace App\Http\Livewire;

use App\Models\Quiz;
use Livewire\Component;

class QuizIndex extends Component
{
    public function render()
    {
        $quizzes = Quiz::all();
        return view('livewire.quiz-index', [
            'quizzes' => $quizzes,
        ]);
    }

    public function quizDelete($id) {
        $quiz = Quiz::findOrFail($id);
        $quiz->questions()->detach();
        $quiz->delete();

        flash()->addSuccess('Quiz deleted successfully.');
    }
}
