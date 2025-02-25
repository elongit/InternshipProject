<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shelf extends Model
{
    /** @use HasFactory<\Database\Factories\ShelfFactory> */
    use HasFactory;


    protected $fillable = ['shelf_name', 'shelf_number', 'shelf_location', 'treasury_id'];
    protected $table = 'shelves';


    public function treasury()
    {
        return $this->belongsTo(Treasury::class );
    }

    public function boxes(){
      return  $this->hasMany(Box::class);
    }
}
