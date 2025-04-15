<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;

class DashboardController extends Controller
{

         public function index(Request $request)
    {
        $search = $request->input('search', '');  

        $documents = Document::when($search, function ($query) use ($search) {
            return $query->where('full_number', 'like', '%' . $search . '%');
        })
        ->paginate(5);  
    

        return view('admin.documentsList', [
            'documents' => $documents, 
            'search' => $search
        ]);
    }
    }

