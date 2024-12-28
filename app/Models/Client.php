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
        return $this->belongsToMany(Membership::class, 'client_membership')
                ->withPivot('start_date', 'end_date')->withTimestamps();  // Si quieres mantener los timestamps
    }

    //recuperar la ultima membresia de un cliente
    public function lastClientMembership()
    {
        return $this->memberships()->orderBy('start_date', 'desc')->first();
    }

    //recuperar si la membresia esta activa o no
    public function status()
    {
        // Si la fecha de finalización de la última membresía es mayor o igual a la fecha actual
        if ($this->lastClientMembership() && $this->lastClientMembership()->pivot->end_date >= now()) {
            return 'Activa';
        }

        return 'Inactiva';
    }

    //recuperar el tipo de membresia de un cliente
    public function membershipType()
    {   
        if($this->lastClientMembership()){
            $name =$this->lastClientMembership()->name;
            if($name!=null){
                return $name;
            }   
        }
        return 'No hay membresia asociada';
    }

    //recuperar la fecha de inicio de la ultima membresia
    public function startDate()
    {
        if($this->lastClientMembership()){
            return $this->lastClientMembership()->pivot->start_date;
        }
        return 'No hay membresia asociada';
    }

    //recuperar la fecha de finalizacion de la ultima membresia

    public function endDate()
    {
        if($this->lastClientMembership()){
            return $this->lastClientMembership()->pivot->end_date;
        }
        return 'No hay membresia asociada';
    }

    //recuperar la descripcion de la ultima membresia
    public function description()
    {
        if($this->lastClientMembership()){
            return $this->lastClientMembership()->description;
        }
        return 'No hay membresia asociada';
    }

    
}
