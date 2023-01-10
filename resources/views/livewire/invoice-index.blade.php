<div>
    <table class="w-full table-auto">
        <tr>
            <th class="border px-4 py-2">ID</th>
            <th class="border px-4 py-2 text-left">User</th>
            <th class="border px-4 py-2">Due date</th>
            <th class="border px-4 py-2">Amount</th>
            <th class="border px-4 py-2">Paid</th>
            <th class="border px-4 py-2">Due</th>
            <th class="border px-4 py-2">Actions</th>
        </tr>
        @foreach ($invoices as $invoice)
            <tr>
                <td class="border px-4 py-2 text-center">{{ $invoice->id }}</td>
                <td class="border px-4 py-2">{{ $invoice->user->name }}</td>
                <td class="border px-4 py-2 text-center">{{ date('F j, Y', strtotime($invoice->due_date)) }}</td>
                <td class="border px-4 py-2 text-center">{{ $invoice->amount()['total'] }}</td>
                <td class="border px-4 py-2 text-center">{{ $invoice->amount()['paid'] }}</td>
                <td class="border px-4 py-2 text-center">{{ $invoice->amount()['due'] }}</td>
                <td class="border px-4 py-2 text-center">
                    <div class="flex justify-center items-center">
                        <a class="lms-view-button" href="{{ route('invoice-show', $invoice->id) }}">
                            @include('components.icons.eye')
                        </a>
                        <a class="lms-edit-button mx-2" href="">
                            @include('components.icons.edit')
                        </a>
                        <form onsubmit="confirm('Are you sure you want to delete this items')"
                            wire:submit.prevent="invoiceDelete({{ $invoice->id }})">
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
        {{ $invoice->links() }}
    </div> --}}
</div>
