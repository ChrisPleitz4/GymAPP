<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'PhoneNumber'];

    //recuperar todas las membresias de un cliente
    public function memberships()
    {
        return $this->belongsToMany(Membership::class);
    }
}
