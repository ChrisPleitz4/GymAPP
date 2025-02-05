<?php

namespace App\Http\Controllers;

use App\Models\Membership;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MembershipController
{
    public function index(){
      
        $Memberships= Membership::orderBy('id', 'asc')->paginate(5);
        return view('ManageMemberships.indexMembership',['user' => Auth::user(), 'Memberships' => $Memberships]);
    }

    public function edit($id)
    {   $Membresia= Membership::find($id);
        return view('ManageMemberships.editMembership',['user' => Auth::user(), 'Membresia' => $Membresia ]);
    }

    public function update(Request $request,  Membership $Membresia)
    {   
        $name=$request->name;
        $price=$request->price;
        $duration=$request->duration;
        $description=$request->description;
        $Membresia->update([
            'name' => $name,
            'price' => $price,
            'duration' => $duration,
            'description'=> $description,
        ]);
        session()->flash('success', '¡La membresia ha sido actualizada con éxito!');
        return view('ManageMemberships.showMemberships',['user' => Auth::user(), 'Membership' => $Membresia]);
    }

    public function show( $id)
    {   $Membership= Membership::find($id);
        
        return view('ManageMemberships.showMemberships',['user' => Auth::user(), 'Membership' => $Membership]);
    }

    public function create()
    {   
        return view('ManageMemberships.createMembership',['user' => Auth::user()]);
    }


    public function store(Request $request)
    {
        //verificar si la descripcion esta vacia
        $description = $request->input('description');
        if(!$description){

            return redirect()->back()->withErrors(['description' => 'Debe ingresar una descripción para la membresia.'])
            ->withInput();;
        }

        //crear la membresia
        $Membership= Membership::create([
            'name' => $request->name,
            'duration' => $request->duration,
            'price' => $request->price,
            'description' =>  $description]); 

            session()->flash('success', '¡La membresia ha sido creada con éxito!');
        return view('ManageMemberships.showMemberships',['user' => Auth::user(), 'Membership' => $Membership]);
    }
}
