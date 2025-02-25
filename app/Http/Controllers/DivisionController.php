<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Division;

class DivisionController extends Controller
{
    public function create(){
         return view('admin.division');

    }

    public function store(Request $request){
        $request->validate([
            'division_name' => 'required|string|max:50',
            'division_location' => 'required|string|max:100',
        ]);

        Division::create([
            'division_name' => $request->division_name,
            'division_location' => $request->division_location,
        ]);

        return redirect('/documents')->with('success', 'تم إنشاء القسم بنجاح!');
        

   }
}
