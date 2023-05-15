<?php

namespace App\Http\Controllers;

use App\Models\ReservaEfetuada;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservaDeMesaController extends Controller
{
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

        //dd($horario, $dia, $mesa, $usuario);
        
        //if($reserva->mesaEstaDisponivel()){
            $reserva->save([
                'horario' => $horario,
                'numero_da_mesa'    => (int) $mesa,
                'dia'     => $dia,
                'id_usuario' => $usuario
            ]);
        //}

        dump($horario, $dia, $mesa);
    }
}
