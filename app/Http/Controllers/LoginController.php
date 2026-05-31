<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function store(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        $credentials['role'] = 'admin';

        if (Auth::guard('web')->attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended(route('dashboard'));
        }

        return back()
            ->withInput($request->only('email'))
            ->with('error', 'Credenciales incorrectas o usuario no administrador.');
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('logout', 'Has cerrado sesión correctamente.');
    }
}
