<?php

namespace App\Http\Livewire;

use App\Models\Question;
use Livewire\Component;

class QuestionEdit extends Component
{
    public $question_id;
    public $answers = ['a', 'b', 'c', 'd'];
    public $name;
    public $answer_a;
    public $answer_b;
    public $answer_c;
    public $answer_d;
    public $correct_answer;

    protected $rules = [
        'name' => 'required',
        'answer_a' => 'required',
        'answer_b' => 'required',
        'answer_c' => 'required',
        'answer_d' => 'required',
        'correct_answer' => 'required',
    ];

    public function mount() {
        $question = Question::findOrFail($this->question_id);
        // $this->question_id = $question->id;
        $this->name = $question->name;
        $this->answer_a = $question->answer_a;
        $this->answer_b = $question->answer_b;
        $this->answer_c = $question->answer_c;
        $this->answer_d = $question->answer_d;
        $this->correct_answer = $question->correct_answer;
    }

    public function render()
    {
        return view('livewire.question-edit');
    }

    public function submitForm() {
        $this->validate();

        $question = Question::findOrFail($this->question_id);
        $question->name = $this->name;
        $question->answer_a = $this->answer_a;
        $question->answer_b = $this->answer_b;
        $question->answer_c = $this->answer_c;
        $question->answer_d = $this->answer_d;
        $question->correct_answer = $this->correct_answer;
        $question->save();

        flash()->addSuccess('Question updated successfully.');

        return redirect()->route('question.index');
    }
}
