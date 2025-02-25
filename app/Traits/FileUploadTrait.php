<?php

namespace App\Traits; 
use Illuminate\Http\Request;
use App\Models\File;

trait FileUploadTrait
{
    /**
     * Handle the uploaded file and save it to storage.
     * 
     * @param $component Livewire\Component - The Livewire component
     * @param string $fieldName - The name of the file input field
     * @param File $fileModel - The model to store file details
     * @param int $documentId - The document ID to associate the file with
     * 
     * @return File - The stored file record
     */
    public function handleUploadedFile($component, $fieldName, $fileModel, $documentId)
    {
        try {
            $file = $component->{$fieldName};
            if (!$file) {
                throw new \Exception('No file was uploaded.');
            }

            $file_name = $file->hashName();
            $file_path = $file->store('uploads', 'public');
            
            // Store the file details in the database
            $storedFile = $fileModel->create([
                'file_name'      => $file_name,
                'file_path'      => $file_path,
                'original_name'  => $file->getClientOriginalName(),
                'document_id'    => $documentId,  
            ]);

            return $storedFile;  // Return the file record for further use
        } catch (\Exception $e) {
           
            throw new \Exception('Error uploading file: ' . $e->getMessage());
        }
    }
}
