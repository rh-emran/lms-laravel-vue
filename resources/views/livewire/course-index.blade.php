<div>
    <table class="w-full table-auto">
        <tr>
            <th class="border px-4 py-2">ID</th>
            <th class="border px-4 py-2 text-left">Name</th>
            <th class="border px-4 py-2 text-left">Teacher</th>
            <th class="border px-4 py-2">Price</th>
            <th class="border px-4 py-2">Image</th>
            <th class="border px-4 py-2">Actions</th>
        </tr>
        @foreach ($courses as $course)
            <tr>
                <td class="border px-4 py-2 text-center">{{ $course->id }}</td>
                <td class="border px-4 py-2">{{ $course->name }}</td>
                <td class="border px-4 py-2">{{ $course->teacher->name }}</td>
                <td class="border px-4 py-2 text-center">{{ $course->price }}</td>
                <td class="border px-4 py-2 text-center">
                    <img class="w-14 mx-auto" src="{{ $course->image }}" alt="{{ $course->name }}">
                </td>
                <td class="border px-4 py-2 text-center">
                    <div class="flex justify-center items-center">
                        <a class="lms-view-button" href="">
                            @include('components.icons.eye')
                        </a>
                        <a class="lms-edit-button mx-2" href="">
                            @include('components.icons.edit')
                        </a>
                        <form onsubmit="confirm('Are you sure you want to delete this items')"
                            wire:submit.prevent="courseDelete({{ $course->id }})">
                            <button type="submit" class="lms-delete-button mt-[3px]">
                                @include('components.icons.trash')
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
    </table>

    <div class="mt-4">
        {{ $courses->links() }}
    </div>
</div>

{{-- <div>
    <div class="table w-full p-2">
        <table class="w-full border">
            <thead>
                <tr class="bg-gray-50 border-b">
                    <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                        <div class="flex items-center justify-center">
                            Id
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                            </svg>
                        </div>
                    </th>
                    <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                        <div class="flex items-center justify-center">
                            Image
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                            </svg>
                        </div>
                    </th>
                    <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                        <div class="flex items-center justify-center">
                            Name
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                            </svg>
                        </div>
                    </th>
                    <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                        <div class="flex items-center justify-center">
                            price
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                            </svg>
                        </div>
                    </th>
                    <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                        <div class="flex items-center justify-center">
                            Teachers
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                            </svg>
                        </div>
                    </th>
                    <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                        <div class="flex items-center justify-center">
                            Action
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                            </svg>
                        </div>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($courses as $course)
                    <tr class="bg-gray-100 text-center border-b text-sm text-gray-600">
                        <td class="p-2 border-r text-left px-4">{{ $course->id }}</td>
                        <td class="p-2 border-r text-center px-4">
                            <img class="w-32 mx-auto" src="{{ asset($course->image) }}" alt="">
                        </td>
                        <td class="p-2 border-r text-left px-4">{{ $course->name }}</td>
                        <td class="p-2 border-r text-left px-4">${{ $course->price }}</td>
                        <td class="p-2 border-r text-left px-4">
                            <div class="flex flex-wrap gap-4">
                                @foreach ($course->teachers as $teacher)
                                    <p class="text-sm bg-green-500 text-white font-medium py-1 px-2 rounded">
                                        {{ $teacher->name }}</p>
                                @endforeach
                            </div>
                        </td>
                        <td class="p-2 border-r text-left px-4">
                            <div class="flex">
                                <a href="{{ route('course.edit', $course->id) }}"
                                    class="bg-blue-500 p-2 inline-block text-white hover:shadow-lg text-xs font-thin">@include('components.icons.edit')</a>
                                <a href="{{ route('course.show', $course->id) }}"
                                    class="bg-green-500 p-2 mx-3 inline-block text-white hover:shadow-lg text-xs font-thin">@include('components.icons.eye')</a>
                                <form wire:submit.prevent="courseDelete({{ $course->id }})"
                                    class="bg-red-500 p-2 inline-block text-white hover:shadow-lg text-xs font-thin">
                                    <button onclick="return confirm('you are sure to delete!')"
                                        type="submit">@include('components.icons.trash')</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-4">
            {{ $courses->links() }}
        </div>
    </div>
</div> --}}
