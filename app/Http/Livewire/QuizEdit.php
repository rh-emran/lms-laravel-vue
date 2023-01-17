<?php

namespace App\Http\Livewire;

use App\Models\Question;
use Livewire\Component;

class QuizEdit extends Component
{
    public $quiz;
    public $question_id;

    // protected $rules = [
    //     'question_id' => 'required',
    // ];

    public function render()
    {
        // dd($this->quiz->questions->pluck('id')->toArray());
        $questions = Question::select(['id', 'name'])->whereNotIn('id', $this->quiz->questions->pluck('id')->toArray())->get();

        return view('livewire.quiz-edit', [
            'questions' => $questions,
        ]);
    }

    public function addQuestion() {
        // $this->validation();
        $this->validate([
            'question_id' => 'required',
        ]);

        $this->quiz->questions()->attach($this->question_id);
        $this->question_id = '';

        flash()->addSuccess('Question added successfully.');

        return redirect(route('quiz.edit', $this->quiz->id));
    }

    public function questionDelete($id) {
        $this->quiz->questions()->detach($id);

        flash()->addSuccess('Quiz question deleted successfully.');

        return redirect(route('quiz.edit', $this->quiz->id));
    }
}
