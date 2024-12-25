<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{
    use HasFactory;

    protected $fillable =[
        'name',
        'duration',
        'price',
        'description'
    ];
    //recuperar todos los clientes de una membresia
    public function clients()
    {
        return $this->belongsToMany(Client::class);
    }
}
