<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http; 
class CrearJuegoController extends Controller
{
    //
    public function index()
    {
        return view("/crearJuego/index");
    }

    public function getPendiente($id){ 
       $response = Http::get("http://127.0.0.1:8000/api/juegoPendiente/{$id}");
       $data = $response->json();
        return view('/crearJuego/pendiente',["data"=>$data]);
    }


    public function getDataJuego()
    {    $email = auth()->user()->email;
         $response = Http::get("http://127.0.0.1:8000/api/juegos/getJuego/{$email}");
         $data= $response->json();  
        return view('homeP', ['data' => $data]);
    }
    
    public function store(Request $request)
    {
    $cadenaJSON = $request->input('lista_objetos');
    $listaObjetos = json_decode($cadenaJSON, true);
    $datos = [
        'usuario' => $request->input('usuario'),
        'nombre' => $request->input('nombre'),
        'monto' => $request->input('monto'),
        'periodo' => $request->input('periodo'),
        'fecha_inicio' => $request->input('fecha_inicio'),
        'descripcion' => $request->input('descripcion'),
        'estado_juego' => 'pendiente',
        'listaObjetos' => $listaObjetos
    ];

     $response = Http::post('http://127.0.0.1:8000/api/juegos/store/email', $datos);

     $data = $response->json();

    $email = auth()->user()->email;
    $response = Http::get("http://127.0.0.1:8000/api/juegos/getJuego/{$email}");
    $data= $response->json();
    return view('homeP', ['data' => $data]);
   }
   

   public function editFechaInicioJuego(Request $request, $id)
{  
    //$datos = ["id"=>$id,"fechaInicio"=>$request->input('fecha')];   
     $response = Http::put("http://127.0.0.1:8000/api/editFechaJuego/$id",["fecha"=>$request->input('fecha')]);
     dd($response->json());
}


}



