<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Validate;

class Treasury extends Component
{

    #[Validate('required|string|max:25')]
    public $treasury_name;

    #[Validate('required|integer')]
    public $treasury_number;

    #[Validate('required|string|max:50')]
    public $treasury_location;



    public function render()
    {
 
        return view('livewire.treasury');
    }

    public function store(){
        $this->validate();

        \App\Models\Treasury::create([
            'treasury_name' => $this->treasury_name,
            'treasury_number' => $this->treasury_number,
            'treasury_location' =>  $this->treasury_location, 
        ]);
        return redirect('/shelf')->with('success', 'تم إنشاء الخزانة بنجاح!');

        
    }
}
