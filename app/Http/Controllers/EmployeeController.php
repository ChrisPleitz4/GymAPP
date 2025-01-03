<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Role;
use App\Models\User;

class EmployeeController extends Controller
{
    
    public function index(){
      
        $Employees= user::orderBy('id', 'asc')->paginate(5);
        return view('ManageEmployees.indexEmployee',['user' => Auth::user(), 'Employees' => $Employees]);
    }

    
    public function create()
    {   
        $roles = Role::all();
        return view('ManageEmployees.createEmployee',['user' => Auth::user(), 'roles' => $roles]);
    }

    
    public function store(Request $request)
    {
        //
    }

    
    public function show($id)
    {
        return view('empleados.show');
    }

    
    public function edit($id)
    {
        return view('empleados.edit');
    }

    
    public function update(Request $request, $id)
    {
        //
    }

    
    public function destroy($id)
    {
        //
    }
}
