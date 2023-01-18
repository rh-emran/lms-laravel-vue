<?php

namespace App\Http\Livewire;

use App\Models\Invoice;
use App\Models\InvoiceItem;
use Livewire\Component;

class InvoiceShow extends Component
{
    public $invoice_id;
    public $invoice;
    public $enableAddForm = false;
    public $enableEditForm = false;
    public $name;
    public $price;
    public $quantity;

    public $edit_item_id;
    public $edit_name;
    public $edit_price;
    public $edit_quantity;

    public function mount() {
       $this->invoice = Invoice::findOrFail($this->invoice_id);
    }

    public function render()
    {
        return view('livewire.invoice-show');
    }

    public function showAddForm() {
            $this->enableAddForm = !$this->enableAddForm;
    }

    public function showEditForm() {
            $this->enableEditForm = !$this->enableEditForm;
    }

    public function saveNewItem() {
        $this->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
            'invoice_id' => 'required|integer',
        ]);

        InvoiceItem::create([
            'name' => $this->name,
            'price' => $this->price,
            'quantity' => $this->quantity,
            'invoice_id' => $this->invoice_id,
        ]);

        $this->name = '';
        $this->price = '';
        $this->quantity = '';
        $this->showAddForm();

        flash()->addSuccess('Invoice item added successfully.');

        return redirect(route('invoice.show', $this->invoice_id));
    }

    public function invoiceItemEdit($id) {
        $invoice_item = InvoiceItem::findOrFail($id);

        $this->edit_item_id = $id;
        $this->edit_name = $invoice_item->name;
        $this->edit_price = $invoice_item->price;
        $this->edit_quantity = $invoice_item->quantity;

        $this->enableEditForm = true;
    }

    public function saveEditItem() {
        $this->validate([
            'edit_name' => 'required',
            'edit_price' => 'required|numeric',
            'edit_quantity' => 'required|integer',
            'edit_item_id' => 'required|integer',
        ]);

        $invoice_item = InvoiceItem::findOrFail($this->edit_item_id);

        $invoice_item->name = $this->edit_name;
        $invoice_item->price = $this->edit_price;
        $invoice_item->quantity = $this->edit_quantity;

        $invoice_item->save();

        $this->edit_item_id = '';
        $this->edit_name = '';
        $this->edit_price = '';
        $this->edit_quantity = '';
        $this->showEditForm();

        flash()->addSuccess('Invoice item edited successfully.');

        return redirect(route('invoice.show', $this->invoice_id));
    }

    public function invoiceItemDelete($id) {
        $invoice_item = InvoiceItem::findOrFail($id);
        $invoice_item->delete();

        flash()->addSuccess('Invoice item deleted successfully.');

        return redirect(route('invoice.show', $this->invoice_id));
    }
}
