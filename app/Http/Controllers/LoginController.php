<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            $request->session()->regenerate();
            if (\auth()->user()->rol === 'admin') {
                return redirect()->intended('destinos.admin');
            }
            if (\auth()->user()->rol === 'estudiante') {
                return redirect()->intended('estudiante');
            }
            if (\auth()->user()->rol === 'profesor') {
                return redirect()->intended('profesor');
            }

        }
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->withErrors([
                'email' => 'El usuario no existe en nuestra base de datos.',
            ]);

        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}

