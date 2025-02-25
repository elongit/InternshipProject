<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Treasury; 

class TreasuryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function create()
    {
        return view('admin.treasury');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function index()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
            $request->validate([
                'treasury_name' => 'required|string|max:50',
                'treasury_number' => 'required|integer',
                'treasury_location' => 'required|string|max:100',

            ]);

            Treasury::create([
                'treasury_name' => $request->treasury_name,
                'treasury_number' => $request->treasury_number,
                'treasury_location' =>  $request->treasury_location, 
            ]);
            
            return redirect('/shelf')->with('success', 'تم إنشاء الخزانة بنجاح!');

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
