<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Validate;

class Division extends Component
{
    #[Validate('required|string|max:25')]
    public $division_name;

    #[Validate('required|string|max:50')]
    public $division_location;

    public function render()
    {
        return view('livewire.division');
    }

    public function store(){
        $this->validate();
        
        Division::create([
            'division_name' => $this->division_name,
            'division_location' => $this->division_location,
        ]);

        return redirect('/documents')->with('success', 'تم إنشاء القسم بنجاح!');


    }
}
