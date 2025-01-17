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

            return redirect()->route('empleados.index')->with('success', '¡El empleado ha sido creado con éxito!');
    }

    
    public function show(User $Empleado)
    {
        return view('ManageEmployees.showEmployee',['user' => Auth::user(), 'empleado' => $Empleado]);
    }

    
    public function edit($id)
    {   $Empleado= User::find($id);
        $roles= Role::all();
        return view('ManageEmployees.editEmployee',['user' => Auth::user(), 'empleado' => $Empleado ,'roles' => $roles]);
    }

    
    public function update(Request $request,  User $Empleado)
    {   $name = $request->name;
        $role_type = $request->input('role_type');
        //verificar que se haya seleccionado un rol
        if(!$role_type){
            return redirect()->back()->withErrors(['role_type' => 'Debe seleccionar un rol para el empleado.'])
            ->withInput();;
        }

        //verificar si el email nuevo  ya pertenece a otro usuario 
        $email =$request->email;

        $exists = User::where('email', $email)
        ->where('id', '!=', $Empleado->id) // Excluyendo el usuario actual
        ->exists();

        if($exists){
            return redirect()->back()->withErrors(['email' => 'Este email ya esta asociado a un usuario '])
            ->withInput();;
        }

        //verificar si se desea modificar las contraseñás
        $newPassword=$request->password;
        $confirmNewPassword=$request->Cpassword;
        //vacios entonces no se modifica contraseñá
        if(empty($newPassword) && empty($confirmNewPassword)){
            $Empleado->update([
                'name' => $request->name,
                'email' => $request->email,
                'role_id' => $role_type,]);
            $Empleado->save();
            
        }else{// si no estan vacios entonces la contraseña se desea cambiar 
                //comprobar si la constraseña y la confirmacion son iguales 
            if($newPassword == $confirmNewPassword){
                $Empleado->update([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password'=> bcrypt($newPassword),
                    'role_id' => $role_type,]);
                $Empleado->save();
            }else{
            return redirect()->back()->withErrors(['password' => 'Las contraseñas no coinciden...'])
            ->withInput();;
            }
        }
        session()->flash('success', 'Empleado actualizado correctamente.');
        return view('ManageEmployees.showEmployee', ['user' => Auth::user(), 'empleado' => $Empleado]);

    }

    
    public function destroy($id)
    {
        //buscar el empleado 
        $Empleado= User::find($id);
        $Empleado->delete();
        return redirect()->route('empleados.index')->with('success', '¡El empleado ha sido eliminado con éxito!');
    }
}
