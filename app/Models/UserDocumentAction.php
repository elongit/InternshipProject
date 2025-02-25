<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDocumentAction extends Model
{
    /** @use HasFactory<\Database\Factories\UsedDocumentActionFactory> */
    use HasFactory;
    protected $guarded = [];

    public function document()
    {
        return $this->belongsTo(Document::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function division()
    {
        return $this->belongsTo(Division::class );
    }
    
}
