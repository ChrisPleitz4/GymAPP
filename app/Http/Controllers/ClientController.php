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
        $Clients = Client::orderBy('id', 'asc')->paginate(5);
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
        $membresias = Membership::all();
        return view('Clients_Membership.createClientMembership', ['membresias' => $membresias , 'client' => $client])->with('success', 'Cliente registrado correctamente');
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

    public function search(Request $request)
    {
        $search = $request->input('search');
    
        // Filtramos los clientes por ID o nombre
        $clients = Client::when($search, function($query, $search) {
            return $query->where('id', 'like', "%{$search}%")
                         ->orWhere('name', 'like', "%{$search}%");
        })->paginate(5);
    
        // Regresamos la vista con los resultados de la búsqueda
        return view('ManageClients.indexClients', compact('clients'));
    }
    
    
}
