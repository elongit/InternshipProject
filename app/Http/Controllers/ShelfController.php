<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Treasury;
use App\Models\Shelf;

class ShelfController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function create()
    {
        $Treasuries = Treasury::all();
    return view('admin.shelf', compact('Treasuries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function store(Request $request)
    {
        $request->validate([
            'shelf_name' => 'required|string|max:50',
            'shelf_number' => 'required|integer',
            'shelf_location' => 'required|string|max:100',
            'treasury_id' => 'required|exists:treasuries,id'
        ]);
        
        Shelf::create([
            'shelf_name' => $request->shelf_name,
            'shelf_number' => $request->shelf_number,
            'shelf_location' => $request->shelf_location,
            'treasury_id' => $request->treasury_id
        ]);
        

        return redirect('/box')->with('success', 'تم إنشاء الرف بنجاح!');

      
    }

 

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
