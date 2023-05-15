<?php

namespace App\Http\Controllers;

use App\Models\ReservaEfetuada;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservaDeMesaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(): Renderable
    {
        return view('reserva');
    }

    public function submit(Request $request)
    {
        $reserva = new ReservaEfetuada;
        $horario = $request->input('horario');
        $mesa    = $request->input('mesa');
        $dia     = $request->input('dia');

        $usuario = Auth::user()->id;
        
        if($reserva->mesaEstaDisponivel()){
            $reserva->save([
                'horario' => '',
                'mesa'    => '',
                'dia'     => '',
                'id_usuario' => $usuario
            ]);
        }

        dump($horario, $dia, $mesa);
    }
}
