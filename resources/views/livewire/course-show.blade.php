<div class="mx-auto p-4 text-gray-800">
    <h1 class="font-bold mb-2 underline">{{ $course->name }}</h1>
    <p class="mb-4 italic">Price: ${{ $course->price }}</p>
    <p class="pb-6 text-justify">{{ $course->description }}</p>


    <h2 class="font-bold mb-2">Classes</h2>
    <table class="w-full table-auto">
        <tr>
            <th class="border px-4 py-2 text-left">Name</th>
            <th class="border px-4 py-2">Date</th>
            <th class="border px-4 py-2">Day</th>
            <th class="border px-4 py-2">Time</th>
            <th class="border px-4 py-2">Actions</th>
        </tr>

        @foreach ($course->curriculums as $class)
            <tr>
                <td class="border px-4 py-2">{{ $class->name }}</td>
                <td class="border px-4 py-2 text-center">{{ date('F j, Y', strtotime($class->class_date)) }}</td>
                <td class="border px-4 py-2 text-center">{{ $class->week_day }}</td>
                <td class="border px-4 py-2 text-center">{{ $class->class_time }}</td>
                <td class="border px-4 py-2">
                    <div class="flex items-center justify-center">
                        <a class="lms-view-button" href="{{ route('class.show', $class->id) }}">
                            @include('components.icons.eye')
                        </a>

                        <a class="lms-edit-button mx-2" href="{{-- route('class.edit',$class->id) --}}">
                            @include('components.icons.edit')
                        </a>

                        <form wire:submit.prevent="curriculamDelete({{ $class->id }})">
                            <button onclick="return confirm('Are you sure you want to delete this items')"
                                type="submit" class="lms-delete-button mt-[3px]">
                                @include('components.icons.trash')
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
    </table>
</div>
