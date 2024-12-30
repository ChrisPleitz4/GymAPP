<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Membership;
use App\Models\Client;

class ClientMembershipController extends Controller
{
    public function create( $id)
    {   $client = Client::find($id);
        $membresias = Membership::all();
        return view('Clients_Membership.createClientMembership', ['membresias' => $membresias , 'client' => $client]);
    }
    
    public function store(Request $request)
    {
        // Recuperar el cliente
        $client = Client::find($request->client_id);
        
        // Recuperar el tipo de membresía utilizando el ID enviado desde el formulario
        $membershipTypeId = $request->input('membership_type'); // Cambiar a membership_type
        
        // Verificar que se haya seleccionado una membresía
        if (!$membershipTypeId) {
            return redirect()->back()->with('error', 'Debe seleccionar una membresía');
        }
    
        // Encontrar la membresía seleccionada
        $membership = Membership::find($membershipTypeId);
        
        // Verificar si la membresía existe
        if (!$membership) {
            return redirect()->back()->with('error', 'Membresía no encontrada');
        }
        //verificar si el cliente ya tiene una membresia activa
        if($client->status() == 'Activa'){
            return redirect()->back()->with('error', 'El cliente ya tiene una membresia activa');
        }
        // Asociar la membresía al cliente
        $client->memberships()->attach($membership->id, [
            'start_date' => now(),
            'end_date' => now()->addDays($membership->duration),
        ]);
        
        // Redirigir con un mensaje de éxito
        return redirect()->route('clientes.show', $client)->with('success', 'Membresía creada correctamente');
    }
    
}
