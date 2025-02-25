<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Division;
use App\Models\Box;
use App\Models\Treasury;
use App\Models\Document;
use App\Models\File;
use Livewire\Attributes\Validate;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Traits\FileUploadTrait;
use Livewire\WithFileUploads;
class DocumentForm extends Component
{

    use WithFileUploads, FileUploadTrait;
    #[Validate('required|string|max:25')]
    public $document_title;

    #[Validate('required|date')]
    public $date_archived;

    #[Validate('required|string|max:50')]
    public $document_type;

    #[Validate('required|integer')]
    public $document_code;

    #[Validate('required|file|mimes:pdf|max:2048')]
    public $uploaded_document;

    #[Validate('required|exists:divisions,id')]
    public $division_id;

    #[Validate('required|exists:treasuries,id')]
    public $treasury_id;

    #[Validate('required|exists:boxes,id')]
    public $box_id;

    public function render()
    {
        $Boxes = Box::all();
        $Treasuries = Treasury::all();
        $Divisions = Division::all();
        return view('livewire.document-form' , compact('Boxes' , 'Treasuries' , 'Divisions'));
    }


    public function store()
    {
        $this->validate();
    
        $choosedTreasury = Treasury::find($this->treasury_id);
    
        // Check if the selected box belongs to the given treasury.
        $shelf = $choosedTreasury->shelves()->find($this->box_id);
        if (!$shelf) {
            return redirect()->back()->withErrors(['treasury_id' => 'علبة المحددة لا ينتمي إلى الخزانة المحددة.']);
        }
    
        // Get current year and document code for building full document number.
        $currentYear = Carbon::now()->format('Y');
        $docCode = $this->document_code;
    
        DB::transaction(function () use ($currentYear, $docCode) {
            // Create the document first.
            $document = Document::create([
                'document_title' => $this->document_title,
                'date_archived'  => $this->date_archived,
                'document_type'  => $this->document_type,
                'document_code'  => $this->document_code,
                'division_id'    => $this->division_id,
                'treasury_id'    => $this->treasury_id,
                'box_id'         => $this->box_id,
            ]);
    
            // Build full document number using the actual document id.
            $fullDocumentNumber = "{$document->id}/{$docCode}/{$currentYear}";
            $document->update(['full_number' => $fullDocumentNumber]);
    
            // Now handle the file upload with the actual document id.
            $this->handleUploadedFile($this, 'uploaded_document', new File(), $document->id);
        });
    
        return redirect('/documents')->with('message', 'تمت إضافة الملف بنجاح');
    }
}
