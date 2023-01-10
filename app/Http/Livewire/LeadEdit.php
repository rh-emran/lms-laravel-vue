<?php

namespace App\Http\Livewire;

use App\Models\Lead;
use Livewire\Component;
use PHPUnit\Framework\Test;
use App\Models\Note;

class LeadEdit extends Component
{
    public $lead_id;
    public $name;
    public $email;
    public $phone;

    public $note;

    public function mount(){
        $lead = Lead::findOrFail($this->lead_id);
        $this->lead_id = $lead->id;
        $this->name = $lead->name;
        $this->email = $lead->email;
        $this->phone = $lead->phone;
    }

    public function render()
    {
        $lead = Lead::findOrFail($this->lead_id);

        return view('livewire.lead-edit', [
            'notes' => $lead->notes,
        ]);
    }

    // protected $rules = [
    //     'email' => 'email',
    //     'phone' => 'required',
    // ];

    public function submitForm() {
        // sleep(5);

        $lead = Lead::findOrFail($this->lead_id);

        // $this->validate();

        $this->validate([
            'email' => 'email',
            'phone' => 'required',
        ]);

        $lead->name = $this->name;
        $lead->email = $this->email;
        $lead->phone = $this->phone;
        $lead->save();

        flash()->addSuccess('Lead updated successfully!');
    }

    public function addNote(){
        $noteData = new Note();

        $this->validate([
            'note' => 'required',
        ]);

        $noteData->description = $this->note;
        $noteData->lead_id = $this->lead_id;
        $noteData->save();

        $this->note = '';

        flash()->addSuccess('Note added successfully!');
    }
}
