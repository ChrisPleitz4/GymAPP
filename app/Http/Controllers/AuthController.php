<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    /**
     * Mostrar el formulario de inicio de sesión.
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('welcome');
    }

    /**
     * Iniciar sesión un usuario.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
    {
        // Validar las credenciales
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Verificar si las credenciales son correctas
        $user = User::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            // Si las credenciales son correctas, autenticar al usuario
            Auth::login($user);

            // Redirigir al dashboard o cualquier otra vista
            //return redirect()->route('admin.index');
            $roleId = $user->role->id;
            switch ($roleId) {
                case 1:
                    return view('admin.index');
                    break;
                case 2:
                    return view('empleado.index');
                    break;
                default:
                    return view('login');
                    break;
            }
        }

        // Si las credenciales no son correctas, redirigir con un error
        return view('welcome');
    }

    /**
     * Cerrar sesión.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
