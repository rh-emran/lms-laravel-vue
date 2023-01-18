<div>
    <div class="flex justify-between mb-4 bg-gray-200 p-4">
        <h2 class="font-bold text-blue-600">Total Questions: {{ $total_question }}</h2>
        <h2 class="font-bold text-green-600">Correct Answers: {{ $correct_answers }}</h2>
        <h2 class="font-bold text-red-600">Wrong Answers: {{ $wrong_answers }}</h2>
        <h2 class="font-bold text-orange-600">Not Answered: {{ $not_answered }}</h2>
    </div>
    <span class="bg-green-100"></span>
    <span class="bg-red-100"></span>
    @php
        $i = 1;
        foreach ($quiz->questions as $question):
        @endphp
            <div class="mb-4 border border-gray-200 p-4 @if (array_key_exists($question->id, $answered))
                bg-{{ $answered[$question->id] ? 'green' : 'red' }}-100
            @endif ">
                <h4 class="font-bold">{{ $i }}. {{ $question->name }}</h4>
                <div class="flex">
                    @foreach ($question_seris as $item)
                        <div class="mr-2">
                            <input wire:model="answer.{{ $question->id }}" name="answer_{{ $question->id }}" value="{{ $item }},{{ $question->id }}" wire:change.prevent="check({{ $question->id }})" id="answer_{{ $item }}-{{ $question->id }}"
                                type="radio" @if (array_key_exists($question->id, $answered)) @disabled(true) @endif>
                            <label
                                for="answer_{{ $item }}-{{ $question->id }}">{{ $question->{'answer_' . $item} }}</label>
                        </div>
                    @endforeach
                </div>
            </div>
        @php
        $i++;
        endforeach
    @endphp
</div>
