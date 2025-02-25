<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shelf;
use App\Models\Box;

class BoxController extends Controller
{
    public function create()
    {
        $Shelves = Shelf::all();
        return view('admin.box', compact('Shelves'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'box_label' => 'required|string|max:50',
            'box_number' => 'required|integer',
            'shelf_id' => 'required|exists:shelves,id'
        ]);
        
        Box::create([
            'box_name' => $request->box_label,
            'box_number' => $request->box_number,
            'shelf_id' => $request->shelf_id
        ]);

        return redirect('/document')->with('success', 'تم إنشاء اعلبة بنجاح!');
    }
}
