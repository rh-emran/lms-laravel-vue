<div>
    <table class="w-full table-auto">
        <tr>
            <th class="border px-4 py-2">ID</th>
            <th class="border px-4 py-2 text-left">Name</th>
            <th class="border px-4 py-2 text-left">Roles</th>
            <th class="border px-4 py-2 text-left">Email</th>
            <th class="border px-4 py-2">Actions</th>
        </tr>
        @foreach ($users as $user)
            <tr>
                <td class="border px-4 py-2 text-center">{{ $user->id }}</td>
                <td class="border px-4 py-2">{{ $user->name }}</td>
                <td class="border px-4 py-2">
                    @foreach ($user->getRoleNames() as $role)
                        <span class="px-2 py-2 bg-blue-400 text-white rounded text-sm">{{ $role }}</span>
                    @endforeach
                </td>
                <td class="border px-4 py-2">{{ $user->email }}</td>
                <td class="border px-4 py-2 text-center">
                    <div class="flex justify-center items-center">
                        <a class="lms-edit-button mx-2" href="{{ route('user.edit', $user->id) }}">
                            @include('components.icons.edit')
                        </a>
                        <form onsubmit="confirm('Are you sure you want to delete this items')"
                            wire:submit.prevent="userDelete({{ $user->id }})">
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
        {{ $users->links() }}
    </div>
</div>
