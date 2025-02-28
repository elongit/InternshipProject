<?php
namespace App\Http\Controllers;

use App\Models\Division;
use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UserDocumentAction;
use Illuminate\Support\Facades\Storage;
use Mpdf\Mpdf;


class UserRequest extends Controller
{
    public function create(){
        $divisions = Division::all();
        $user = Auth::user();

        return view('user.request', [
            'divisions' => $divisions,
            'user_id'   => $user->id,
            'user_name' => $user->first_name,
        ]);
    }

    public function store(Request $request){
        $request->validate([
            'request_reference' => 'required|string|max:255',
            'operation_topic'   => 'required|string|max:255',
            'division_id'       => 'required|exists:divisions,id',
            'operation_type'    => 'required|in:download,print',
            'return_date'       => 'nullable|date',
        ]);

        $document_reference = Document::where('full_number', $request->request_reference)->first();


        if(!$document_reference){
            return redirect()->back()->withErrors(['request_reference' => 'لا يوجد ملف بهذا المرجع المحدد']);
        }

       $requestDocument =  UserDocumentAction::create([
            'user_id'         => Auth::id(),
            'document_id'     => $document_reference->id,
            'division_id' => $request->division_id,
            'operation_topic' => $request->operation_topic,
            'operation_type'  => $request->operation_type,
            'return_date'     => $request->return_date,
        ]);

        if ($request->operation_type == 'download') {
            $filePath = $requestDocument->document->files->pluck('file_path')->first(); 
        
            if ($filePath) {
                session()->flash('success', 'تم تنزيل الملف بنجاح.');
                return response()->download(storage_path("app/public/{$filePath}"));
            }
            return redirect('/')->with('success', 'file not found');
        }
    

        if ($request->operation_type == 'print') {
            $data = [
                [
                    'full_name' => Auth::user()->first_name . ' '. Auth::user()->last_name ,
                    'division' => Division::where('id', $request->division_id)->value('division_name'),
                    'topic' => $request->operation_topic,
                    'reference' =>  $request->request_reference,
                    'delivery_time' => $requestDocument->created_at,
                    'return_time' => $request->return_date,
                ]
            ];

            if(!$request->return_date){
                return redirect()->back()->withErrors(['return_date' => 'تاريخ ارجاع الملف عند طباعة مطلوب']);
            }
    
            $treasury = $document_reference->treasury->treasury_number;
            $shelf = $document_reference->box->shelf->shelf_number;
            $box = $document_reference->box->box_number;
    
            // Generate the HTML content for the PDF
            $html = view('user.generatedPdf', compact('data', 'treasury', 'shelf', 'box'))->render();
    
            $mpdf = new Mpdf([
                'mode' => 'utf-8',
                'format' => 'A4',
                'orientation' => 'P', // Portrait
                'default_font' => 'Amiri', // Arabic font
                'default_font_size' => 10
            ]);
    
            // Set the Content-Type header to application/pdf
            header('Content-Type: application/pdf');
            header('Content-Disposition: inline; filename="document.pdf"'); // 'inline' opens it in the browser
    
            // Write the HTML content to the PDF
            $mpdf->WriteHTML($html);
    
            // Output the PDF
            $mpdf->Output('document.pdf', 'I');
        }

        return redirect()->back()->with('success', 'تم تسجيل الإجراء بنجاح.');
    }
}
