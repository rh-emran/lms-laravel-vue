<table class="w-full table-auto">
    <tr class="bg-green-600 text-white">
        <th class="border px-4 py-2">ID#</th>
        <th class="border px-4 py-2 text-left">Quiz Name</th>
        <th class="border px-4 py-2">Total Questions</th>
        <th class="border px-4 py-2">Actions</th>
    </tr>
    @foreach ($quizzes as $quiz)
        <tr>
            <td class="border px-4 py-2 text-center">{{ $quiz->id }}</td>
            <td class="border px-4 py-2">{{ $quiz->name }}</td>
            <td class="border px-4 py-2 text-center">{{ count($quiz->questions) }}</td>
            <td class="border px-4 py-2 text-center">
                <div class="flex justify-center items-center">
                    <a class="lms-view-button" href="{{ route('quiz.show', $quiz->id) }}">
                        @include('components.icons.eye')
                    </a>

                    <a class="lms-edit-button mx-2" href="{{ route('quiz.edit', $quiz->id) }}">
                        @include('components.icons.edit')
                    </a>

                    <button wire:click="quizDelete({{ $quiz->id }})"
                        onclick="confirm('Are you sure you want to delete this item?') || event.stopImmediatePropagation()"
                        type="button" class="lms-delete-button">
                        @include('components.icons.trash')
                    </button>
                </div>
            </td>
        </tr>
    @endforeach
</table>
