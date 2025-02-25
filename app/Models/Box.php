<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Box extends Model
{
    /** @use HasFactory<\Database\Factories\BoxFactory> */
    use HasFactory;

    protected $fillable = ['box_name', 'box_number', 'shelf_id'];

    public function shelf()
    {
        return $this->belongsTo(Shelf::class);
    }
}
