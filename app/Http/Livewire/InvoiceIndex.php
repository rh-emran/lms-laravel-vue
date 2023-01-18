<?php

namespace App\Http\Livewire;

use App\Models\Invoice;
use Livewire\Component;
use Livewire\WithPagination;

class InvoiceIndex extends Component
{
    use WithPagination;
    public function render()
    {
        $invoices = Invoice::paginate(20);
        return view('livewire.invoice-index', [
            'invoices' => $invoices,
        ]);
    }
}
