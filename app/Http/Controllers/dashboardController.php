<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;

class DashboardController extends Controller
{

    public function index(){
        $Documents = Document::all();
        return view('admin.documentsList' , compact('Documents'));
    }

}