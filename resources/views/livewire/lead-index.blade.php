<div>
    <table class="w-full table-auto">
        <tr>
            <th class="border px-4 py-2 text-left">Name</th>
            <th class="border px-4 py-2 text-left">Email</th>
            <th class="border px-4 py-2 text-left">Phone</th>
            <th class="border px-4 py-2">Registered</th>
            <th class="border px-4 py-2">Actions</th>
        </tr>
        @foreach($leads as $lead)
            <tr>
                <td class="border px-4 py-2">{{$lead->name}}</td>
                <td class="border px-4 py-2">{{$lead->email}}</td>
                <td class="border px-4 py-2">{{$lead->phone}}</td>
                <td class="border px-4 py-2 text-center">{{date('F j, Y', strtotime($lead->created_at))}}</td>
                <td class="border px-4 py-2 text-center">
                    <div class="flex justify-center items-center">
                        <a class="lms-view-button" href="{{route('lead.show', $lead->id)}}">
                            @include('components.icons.eye')
                        </a>
                        <a class="lms-edit-button mx-2" href="{{route('lead.edit', $lead->id)}}">
                            @include('components.icons.edit')
                        </a>
                        <form onsubmit="confirm('Are you sure you want to delete this items')" wire:submit.prevent="leadDelete({{$lead->id}})">
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
        {{$leads->links()}}
    </div>
</div>
