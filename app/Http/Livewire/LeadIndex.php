<?php

namespace App\Http\Livewire;

use App\Models\Lead;
use Livewire\Component;
use Livewire\WithPagination;

class LeadIndex extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.lead-index', [
            'leads' => Lead::paginate(10),
        ]);
    }
    public function leadDelete($id)
    {
        $lead = Lead::findOrFail($id);
        $lead->delete();

        flash()->addSuccess('Lead deleted successfully!');

    }
}
