<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http; 
class InvitacionFallidaController extends Controller
{
    //

    public function index(){
        return view('/crearJuego/invitacionFallida');
    }

    public function getDataFallido()
    {
         $response = Http::get('http://127.0.0.1:8000/api/juegos/getFallido');
         $data= $response->json();  
        return view('/crearJuego/invitacionFallida', ['data' => $data]);
    }
}
