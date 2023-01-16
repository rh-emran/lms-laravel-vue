<div>
    <h2 class="font-bold mb-2">Questions:</h2>
    <ul class="mb-2">
        @php $i = 1; foreach ($quiz->questions as $question): @endphp
            <li class="flex">
                <span class="w-14 text-center border border-gray-200 p-2">{{ $i }}</span>
                <span class="w-full border border-gray-200 p-2">{{ $question->name }}</span>
                <button class="max-w-min border border-gray-200 p-2 font-bold text-red-500 cursor-pointer"
                    wire:click="questionDelete({{ $question->id }})"
                    onclick="confirm('Are you sure you want to delete this item?') || event.stopImmediatePropagation()"
                    type="button">X</button>
            </li>
        @php $i++; endforeach @endphp
    </ul>
    <!-- list -->

    @if(count($questions) > 0)
    <h2 class="font-bold mb-2">Add a question</h2>
    <form wire:submit.prevent="addQuestion" class="mb-6">
        <div class="mb-4">
            <label for="question_id" class="lms-label">Question</label>
            <select wire:model.lazy="question_id" id="question_id" class="lms-input" required >
                <option value="">Select a question</option>
                @foreach ($questions as $question)
                    <option value="{{ $question->id }}">{{ $question->name }}</option>
                @endforeach
            </select>
            @error('question_id') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        @include('components.wire-loading-btn', [
            'for' => 'addQuestion',
            'text' => 'submit',
        ])
    </form>
    @else
    <p class="text-red-400 font-bold">No more questions available.</p>
    @endif


</div>
