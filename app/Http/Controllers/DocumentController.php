<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Treasury;
use App\Models\Box;
use App\Models\File;
use App\Models\Document;
use App\Models\Division;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DocumentController extends Controller  
{

    public function create()
    {
        $Treasuries = Treasury::all();
        $Boxes = Box::all();
        $Divisions = Division::all();
        return view('admin.document', compact('Treasuries',  'Boxes', 'Divisions'));
    }


    
}
