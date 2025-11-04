<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Medico;
use Illuminate\Support\Facades\Hash;
use SebastianBergmann\CodeCoverage\Report\Xml\Report;

class UserController extends Controller
{
    public function show()
    {
        $user = User::where('status', '1')->orderBY('created_at', 'desc')->get();
        $user_inact = User::where('status', '2')->orderBY('created_at', 'desc')->get();

        return view('user.all-user', compact('user', 'user_inact'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'last_name' => 'required|string',
            'username' => 'required|string|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'rol' => 'required|string',
            'phone' => 'required|string',
            'dpi' => 'unique:users',
        ]);
        $date = $request->only([
            'name',
            'last_name',
            'username',
            'rol',
            'phone',
            'dpi',
        ]);
        $date['password'] = Hash::make($request->password);
        $dat['status'] = '1';
        User::create($date);
        return redirect(route('User.show'))->with('success', 'Usuario creado con exito');
    }

    public function specialty(Request $request)
    {
        $request->validate([
            'specialty' => 'required|string',
            'collegiate_num' => 'required|string',
            'experience' => 'required|boolean',
            'date_hire' => 'required|date',
            'cod_user' => 'required|exists:users,id',
        ]);
        $date = $request->only([
            'specialty',
            'collegiate_num',
            'experience',
            'date_hire',
            'cod_user',
        ]);
        Medico::create($date);
        return redirect(route('User.show'))->with('success', 'Especialidad creado con exito');
    }

    public function deactivate(User $user){
        $user->status = '2';
        $user->save();
        return redirect(route('User.show'))->with('success', 'Usuario eliminado');
    }

    public function restore(User $user){
        $user->status = '1';
        $user->save();
        return redirect(route('User.show'))->with('success', 'Usuario restaurado');
    }
}
