<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Membership;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{   
    //metodo index para mostrar los clientes
    public function index()
    {
        $Clients = Client::orderBy('id', 'asc')->paginate(10);
        return view('ManageClients.indexClients', ['user' => Auth::user(), 'clients' => $Clients]);
    }

    //metodos create y store para crear un nuevo cliente
    public function create()
    {   
        $memberships = Membership::all();
        return view('ManageClients.createClients',['user' => Auth::user(), 'memberships' => $memberships]);
    }

    public function store(Request $request)
    {   $client =Client::create(
        [
            'name' => $request->name,
            'PhoneNumber' => $request->PhoneNumber,
        ]);
       return redirect()->route('clientes.show', $client)->with('success', 'Atleta creado correctamente');
    }

    //metod edit y update para editar un cliente
    
    public function edit(Client $client)
    {
        return view('ManageClients.editClients',['user' => Auth::user()], compact('client'));
    }

    public function update(Request $request, Client $client)
    {
        $client->update($request->all());
        return redirect()->route('clientes.edit', $client)->with('success', 'Guardado correctamente');
    } 
    
    //metodo show para mostrar un cliente en especifico
    public function show(Client $client)
    {
        // Obtén las membresías asociadas al cliente con paginación
        $memberships = $client->memberships()->paginate(3); // Cambia 10 por el número de membresías por página
    
        // Envía tanto el cliente como las membresías paginadas a la vista
        return view('ManageClients.showClients', [
            'user' => Auth::user(),
            'client' => $client,
            'memberships' => $memberships,
        ]);
    }
    
    
}
