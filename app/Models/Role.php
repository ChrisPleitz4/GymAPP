<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    //recuperar los usuarios con un rol en especifico
    public function users()
    {
        return $this->hasmany(User::class);
    }
}
