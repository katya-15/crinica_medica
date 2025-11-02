<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Servicio;

class HomeController extends Controller
{
    
    public function index(){
        $servicio = Servicio::where('status', '1')->get();
        return view('welcome', compact('servicio'));
    }
}
