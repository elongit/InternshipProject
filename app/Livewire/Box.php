<?php

namespace App\Livewire;

use App\Models\Box as ModelsBox;
use Livewire\Component;
use App\Models\Shelf;

class Box extends Component
{
    public $box_label;
    public $box_number;
    public $shelf_id = '';

    protected $rules = [
        'box_label' => 'required|string|max:25',
        'box_number' => 'required|integer',
        'shelf_id' => 'required|exists:shelves,id',
    ];

    protected $messages = [
        'box_label.required' => 'اسم العلبة مطلوب.',
        'box_label.string' => 'اسم العلبة يجب أن يكون نصًا.',
        'box_label.max' => 'اسم العلبة يجب ألا يتجاوز 25 حرفًا.',
        'box_number.required' => 'رقم العلبة مطلوب.',
        'box_number.integer' => 'رقم العلبة يجب أن يكون رقمًا صحيحًا.',
        'shelf_id.required' => 'يجب اختيار الرف.',
        'shelf_id.exists' => 'الرف المحدد غير موجود.',
    ];

    public function render()
    {
        $Shelves = Shelf::all();
        $boxes = ModelsBox::all();
        return view('livewire.box', compact('Shelves' , 'boxes'));
    }

    public function store()
    {
        $this->validate();

        \App\Models\Box::create([
            'box_name' => $this->box_label,
            'box_number' => $this->box_number,
            'shelf_id' => $this->shelf_id,
        ]);

        $this->reset();

        return redirect()->back()->with('success_box', 'تم إنشاء العلبة بنجاح!');
    }
}
