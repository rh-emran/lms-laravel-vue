<?php

namespace App\Http\Livewire;

use App\Models\Question;
use Livewire\Component;

class QuizShow extends Component
{
    public $quiz;
    public $answer = [];
    public $question_seris = ['a', 'b', 'c', 'd'];
    public $answered = [];
    public $total_question;
    public $correct_answers = 0;
    public $wrong_answers = 0;
    public $not_answered;

    public function mount() {
        $this->total_question = count($this->quiz->questions);
        $this->not_answered = count($this->quiz->questions);
    }

    public function render()
    {
        return view('livewire.quiz-show');
    }

    public function check($id) {
        $current_answer = $this->answer[$id];

        $question_id = explode(',', $current_answer)[1];
        $question = Question::findOrFail($question_id);

        if($question->correct_answer === explode(',', $current_answer)[0]) {
            flash()->addSuccess('Correct Answer.');
            $correct = true;
            $this->correct_answers++;
            $this->not_answered--;
        } else {
            flash()->addError('Wrong answer.');
            $correct = false;
            $this->wrong_answers++;
            $this->not_answered--;
        }

        $this->answered[$question_id] = $correct;
    }
}
