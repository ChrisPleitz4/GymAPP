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
    {   if (Auth::check()) {
        $user = Auth::user();
        $roleId = $user->role->id;
        switch ($roleId) {
            case 1:
                return view('admin.index',['userName' => $user->name]);
                break;
            case 2:
                return view('empleado.index');
                break;
            default:
                return view('welcome');
                break;
        }
        }
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
                    return view('admin.index',['userName' => $user->name]);
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
    return redirect()->route('welcome')->with('error', 'Credenciales incorrectas.')->withInput();;
    }

    /**
     * Cerrar sesión.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout()
    {
        Auth::logout(); // Cierra sesión del usuario actual
        session()->invalidate(); // Invalida la sesión activa
        session()->regenerateToken(); // Regenera el token CSRF para evitar vulnerabilidades
    
        return redirect()->route('welcome');
    }

/**
 * Validar Acceso a Rutas del Admin.
 *
 * @param string $ruta
 * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
 */
public function Admin($ruta)
{
    // Verificar si el usuario está autenticado y si tiene permisos de administrador
    if (!Auth::check() || Auth::user()->role->id !== 1) {
        // Si no está autenticado O no es administrador, redirigir
        return redirect()->route('welcome')->with('error', 'Debes iniciar sesión como administrador para acceder a esta página.');
    }
    // Obtener al usuario autenticado
    $user = Auth::user();

    // Validar la ruta solicitada y devolver la vista correspondiente
    switch ($ruta) {
        case 'dashboard':
            return response()
                ->view('admin.dashboard', ['userName' => $user->name])
                ->header('Cache-Control', 'no-cache, no-store, must-revalidate')
                ->header('Pragma', 'no-cache')
                ->header('Expires', '0');
        case 'settings':
            return response()
                ->view('admin.settings', ['userName' => $user->name])
                ->header('Cache-Control', 'no-cache, no-store, must-revalidate')
                ->header('Pragma', 'no-cache')
                ->header('Expires', '0');
        default:
            return redirect()->route('welcome')->with('error', 'Página no encontrada.');
    }
}

}
