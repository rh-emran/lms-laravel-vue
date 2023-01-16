<div>
    <table class="w-full table-auto">
        <tr class="bg-blue-500 text-white">
            <th class="border px-4 py-2">ID#</th>
            <th class="border px-4 py-2 text-left">Question</th>
            <th class="border px-4 py-2 text-left">A</th>
            <th class="border px-4 py-2 text-left">B</th>
            <th class="border px-4 py-2 text-left">C</th>
            <th class="border px-4 py-2 text-left">D</th>
            <th class="border px-4 py-2">Answer</th>
            <th class="border px-4 py-2">Actions</th>
        </tr>
        @foreach ($questions as $question)
            <tr>
                <td class="border px-4 py-2 text-center">{{ $question->id }}</td>
                <td class="border px-4 py-2">{{ $question->name }}</td>
                <td class="border px-4 py-2">{{ $question->answer_a }}</td>
                <td class="border px-4 py-2">{{ $question->answer_b }}</td>
                <td class="border px-4 py-2">{{ $question->answer_c }}</td>
                <td class="border px-4 py-2">{{ $question->answer_d }}</td>
                <td class="border px-4 py-2 text-center"><span
                        class="px-2 py-1 rounded-full bg-green-500 text-white font-bold">{{ Str::ucfirst($question->correct_answer) }}</span>
                </td>
                <td class="border px-4 py-2 text-center">
                    <div class="flex justify-center items-center">
                        <a class="lms-edit-button mx-2" href="{{ route('question.edit', $question->id) }}">
                            @include('components.icons.edit')
                        </a>

                        <button wire:click="questionDelete({{ $question->id }})"
                            onclick="confirm('Are you sure you want to delete this item?') || event.stopImmediatePropagation()"
                            type="button" class="lms-delete-button">
                            @include('components.icons.trash')
                        </button>
                    </div>
                </td>
            </tr>
        @endforeach
    </table>

    <div class="mt-4">
        {{ $questions->links() }}
    </div>
</div>
