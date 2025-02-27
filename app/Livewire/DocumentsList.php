<?php

namespace App\Livewire;

use App\Models\Document;
use Livewire\Component;

class DocumentsList extends Component
{
    public $search;
    public $DocumentList = [];

    public function mount()
    {
        $this->DocumentList = Document::all();
    }

    public function render()
    {
        return view('livewire.documents-list', [
            'Documents' => $this->DocumentList
        ]);
    }

    public function store()
    {
        if (empty($this->search)) {
            $this->DocumentList = Document::all();
        } else {
            $this->DocumentList = Document::where('full_number', 'like', '%' . $this->search . '%')->get();
        }
    }
}
