<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function show(Request $request)
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $valid = $request->validate([
            'username' => 'required|string',
            'password' => 'required',
        ]);
        $valid['username'] = strtolower($valid['username']);
        if (Auth::attempt($valid)) {
            $user = Auth::user();
            if ($user->status === 1) {
                return redirect(route('Auth.dashboard'))
                    ->with('success', 'Welcome back')
                    ->with(compact('user'));
            }
            Auth::logout();
            return redirect(route('login'))
                ->with('auth', 'Tu cuenta esta inactiva. Contacta al administrador...');
        }

        return redirect(route('login'))
            ->with(['auth' => 'Credenciales incorrectas. Intente de nuevo...']);
    }
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect(route('login'))
            ->with('success', 'Has cerrado sesión correctamente.');
    }

    public function dashboard()
    {
        return view('dashboard');
    }
}
