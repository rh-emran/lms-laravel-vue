<div>
    <table class="w-full table-auto">
        <tr>
            <th class="border px-4 py-2 text-left">Name</th>
            <th class="border px-4 py-2 text-left">Permissions</th>
            <th class="border px-4 py-2">Actions</th>
        </tr>
        @foreach ($roles as $role)
            <tr>
                <td class="border px-4 py-2">{{ $role->name }}</td>
                <td class="border px-4 py-2">
                    @foreach ($role->permissions as $permission)
                        <span class="px-2 py-2 bg-blue-400 text-white rounded text-sm">{{ $permission->name }}</span>
                    @endforeach
                </td>
                <td class="border px-4 py-2 text-center">
                    <div class="flex justify-center items-center">
                        <a class="lms-edit-button mx-2" href="{{ route('role.edit', $role->id) }}">
                            @include('components.icons.edit')
                        </a>
                        <form onsubmit="confirm('Are you sure you want to delete this items')"
                            wire:submit.prevent="roleDelete({{ $role->id }})">
                            <button type="submit" class="lms-delete-button mt-[3px]">
                                @include('components.icons.trash')
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
    </table>

    {{-- <div class="mt-4">
        {{ $role->links() }}
    </div> --}}
</div>
