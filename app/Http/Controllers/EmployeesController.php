<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\UserDocumentAction;

class EmployeesController extends Controller
{
    public function create(){
        $documentInfo = UserDocumentAction::all();
        return view('admin.employees' , compact('documentInfo'));
    }
}
