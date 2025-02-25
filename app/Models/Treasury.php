<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Shelf;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Treasury extends Model
{
    /** @use HasFactory<\Database\Factories\TreasuryFactory> */
    use HasFactory;

    protected $fillable = [
        'treasury_name',
        'treasury_location',
        'treasury_number'

    ];

    protected $table = 'treasuries';

    public function shelves(): HasMany
    {
        return $this->hasMany(Shelf::class, 'treasury_id'); 
    }
    
}
