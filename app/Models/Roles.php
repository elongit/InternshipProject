<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Roles extends Model
{
    use HasFactory;
    protected $fillable = ['role_name'];

    // Define the many-to-many relationship with the User model
    public function users()
    {
        return $this->belongsToMany(User::class, 'user_roles', 'roles_id', 'user_id');
    }
}
