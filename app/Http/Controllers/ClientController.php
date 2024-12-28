<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Membership;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    public function index()
    {
        $Clients = Client::orderBy('id', 'asc')->paginate(10);
        return view('ManageClients.indexClients', ['user' => Auth::user(), 'clients' => $Clients]);
    }

    public function create()
    {
        return view('ManageClients.createClients',['user' => Auth::user()]);
    }

    public function edit(Client $client)
    {
        return view('ManageClients.editClients',['user' => Auth::user()], compact('client'));
    }
}
