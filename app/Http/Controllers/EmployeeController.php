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
        //verificar si ha seleccionado un rol para el empleado
        $role_type = $request->input('role_type');
        if(!$role_type){

            return redirect()->back()->withErrors(['role_type' => 'Debe seleccionar un rol para el empleado.'])
            ->withInput();;
        }
        //verificar si el email ya existe
        $email = $request->input('email');
        $user = User::where('email', $email)->first();
        if($user){
            return redirect()->back()->withErrors(['email' => 'El email ya esta asociado al empleado : '.$user->name.'<br>Cargo: '.$user->role->name])
            ->withInput();
        
        }
        //verificar si las contraseñas coinciden
        $password = $request->input('password');
        $password_confirmation = $request->input('Cpassword');
        if($password != $password_confirmation){
            return redirect()->back()->withErrors(['password' => 'Las contraseñas no coinciden'])
            ->withInput();
        }

        //crear el empleado
        $user= User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role_id' => $role_type,]); 

            return $user;
    }

    
    public function show($id)
    {
        return view('empleados.show');
    }

    
    public function edit($id)
    {   $Empleado= User::find($id);
        $roles= Role::all();
        return view('ManageEmployees.editEmployee',['user' => Auth::user(), 'empleado' => $Empleado ,'roles' => $roles]);
    }

    
    public function update(Request $request, $id)
    {
        $empleado =User::find($id);
        
    }

    
    public function destroy($id)
    {
        //
    }
}
