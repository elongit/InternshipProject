<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\UserDocumentAction;

class TrackedEmployeesController extends Controller
{
    public function create(){
        $documentInfo = UserDocumentAction::paginate(6);
        return view('admin.tracked_employees' , compact('documentInfo'));
    }
}
