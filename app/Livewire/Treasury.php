<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Validation\Rule;

class Treasury extends Component
{
    public $treasury_name;
    public $treasury_number;
    public $treasury_location;

    // The rules for validation
    protected $rules = [
        'treasury_name' => 'required|string|max:25',
        'treasury_number' => 'required|integer',
        'treasury_location' => 'required|string|max:50',
    ];

    // Custom validation messages (optional)
    protected $messages = [
        'treasury_name.required' => 'اسم الخزانة مطلوب.',
        'treasury_name.string' => 'اسم الخزانة يجب أن يكون نص.',
        'treasury_name.max' => 'اسم الخزانة يجب ألا يتجاوز 25 حرفًا.',
        'treasury_number.required' => 'رقم الخزانة مطلوب.',
        'treasury_number.integer' => 'رقم الخزانة يجب أن يكون رقمًا صحيحًا.',
        'treasury_location.required' => 'موقع الخزانة مطلوب.',
        'treasury_location.string' => 'موقع الخزانة يجب أن يكون نص.',
        'treasury_location.max' => 'موقع الخزانة يجب ألا يتجاوز 50 حرفًا.',
    ];

    public function render()
    {
        return view('livewire.treasury');
    }

    public function store()
    {
        $this->validate();

        try {
            \App\Models\Treasury::create([
                'treasury_name' => $this->treasury_name,
                'treasury_number' => $this->treasury_number,
                'treasury_location' => $this->treasury_location,
            ]);

            return redirect()->route('shelf')->with('success', 'تم إنشاء الخزانة بنجاح!');
        } catch (\Exception $e) {
            return session()->flash('error', 'حدث خطأ أثناء إنشاء الخزانة.');
        }
    }
}
