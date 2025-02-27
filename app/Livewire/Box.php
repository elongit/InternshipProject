<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Validate;
use App\Models\Shelf;
class Box extends Component
{
    #[Validate('required|string|max:25')]
    public $box_label;

    #[Validate('required|integer')]
    public $box_number;

    #[Validate('required|exists:shelves,id')]
    public $shelf_id;

    public function render()
    {
        $Shelves = Shelf::all();
        return view('livewire.box' , compact('Shelves'));
    }

    public function store()
    {
        $this->validate();
        
        \App\Models\Box::create([
            'box_name' => $this->box_label,
            'box_number' => $this->box_number,
            'shelf_id' => $this->shelf_id
        ]);

        return redirect('/document')->with('success', 'تم إنشاء اعلبة بنجاح!');
    }
}
