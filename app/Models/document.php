<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    /** @use HasFactory<\Database\Factories\DocumentFactory> */
    use HasFactory;
    protected $guarded = [];

    public function treasury()
    {
        return $this->belongsTo(Treasury::class );
    }

    public function shelf()
    {
        return $this->belongsTo(Shelf::class );
    }

    public function box()
    {
        return $this->belongsTo(Box::class );
    }

    public function division()
    {
        return $this->belongsTo(Division::class );
    }
    
    public function files (){
        return $this->hasMany(File::class);
    }

  
}
