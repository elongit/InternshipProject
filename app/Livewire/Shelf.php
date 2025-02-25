<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Validate;
use App\Models\Treasury;
class Shelf extends Component
{

    #[Validate('required|string|max:25')]
    public  $shelf_name;

    #[Validate('required|integer')]
    public  $shelf_number;

    #[Validate('required|string|max:100')]
    public  $shelf_location;

    #[Validate('required|exists:treasuries,id')]
    public  $treasury_id;

    public function render()
    {
        $Treasuries = Treasury::all();
        return view('livewire.shelf' , compact('Treasuries'));
    }

    public function store()
    {
        $this->validate();
        
        \App\Models\Shelf::create([
            'shelf_name' => $this->shelf_name,
            'shelf_number' => $this->shelf_number,
            'shelf_location' => $this->shelf_location,
            'treasury_id' => $this->treasury_id
        ]);
        

        return redirect('/box')->with('success', 'تم إنشاء الرف بنجاح!');

      
    }
}
