<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Treasury;

class Shelf extends Component
{
    // Public properties
    public $shelf_name;
    public $shelf_number;
    public $shelf_location;
    public $treasury_id;

    protected $rules = [
        'shelf_name' => 'required|string|max:25',
        'shelf_number' => 'required|integer',
        'shelf_location' => 'required|string|max:100',
        'treasury_id' => 'required|exists:treasuries,id',
    ];

    protected $messages = [
        'shelf_name.required' => 'اسم الرف مطلوب.',
        'shelf_name.string' => 'اسم الرف يجب أن يكون نصًا.',
        'shelf_name.max' => 'اسم الرف يجب ألا يتجاوز 25 حرفًا.',
        'shelf_number.required' => 'رقم الرف مطلوب.',
        'shelf_number.integer' => 'رقم الرف يجب أن يكون رقمًا صحيحًا.',
        'shelf_location.required' => 'موقع الرف مطلوب.',
        'shelf_location.string' => 'موقع الرف يجب أن يكون نصًا.',
        'shelf_location.max' => 'موقع الرف يجب ألا يتجاوز 100 حرفًا.',
        'treasury_id.required' => 'يجب اختيار الخزانة.',
        'treasury_id.exists' => 'الخزانة المحددة غير موجودة.',
    ];

    public function render()
    {
        $Treasuries = Treasury::all();
        return view('livewire.shelf', compact('Treasuries'));
    }

    public function store()
    {
        $this->validate();

        \App\Models\Shelf::create([
            'shelf_name' => $this->shelf_name,
            'shelf_number' => $this->shelf_number,
            'shelf_location' => $this->shelf_location,
            'treasury_id' => $this->treasury_id,
        ]);

        return redirect('/box')->with('success', 'تم إنشاء الرف بنجاح!');
    }
}
