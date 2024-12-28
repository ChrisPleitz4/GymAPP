<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

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

    //recuperar la fecha de creacion de una membresia
    public function fechaCreacion()
    {
        // Retornar solo la fecha de creación sin la hora, en formato 'Y-m-d'
        return Carbon::parse($this->created_at)->format('Y-m-d');
    }

    //estado de la membresia si esta activa o no
    public function status()
    {
        // Si la fecha de finalización es mayor o igual a la fecha actual
        if (Carbon::parse($this->pivot->end_date)->gte(Carbon::now())) {
            return 'Activa';
        }

        return 'Inactiva';
    }
}
