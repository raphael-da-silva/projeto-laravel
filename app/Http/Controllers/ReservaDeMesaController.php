<?php

namespace App\Http\Controllers;

use App\Models\ReservaEfetuada;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservaDeMesaController extends Controller
{
    public function index(): Renderable
    {
        return view('reserva');
    }

    public function submit(Request $request): RedirectResponse
    {
        $reserva = new ReservaEfetuada;
        $horario = $request->input('horario');
        $mesa    = $request->input('mesa');
        $dia     = $request->input('dia');
        $usuario = Auth::user()->id;

        if(!$reserva->dataValidaParaReservaFutura($dia)){
            return redirect('/reserva')->withErrors([
                'A data que você escolheu já passou, logo não é valida para reserva.'
            ]); 
        }

        // if($reserva->horarioAbertoParaReservar($horario)){
        //     return redirect('/reserva')->withErrors([
        //         'Apenas disponíveis horários de 18:00 até 23:59'
        //     ]);
        // }

        if($reserva->tentativaDeReservarNoDomingo($dia)){
            return redirect('/reserva')->withErrors([
                'Você não pode reservar mesa no domingo'
            ]);
        }

        if(!$reserva->mesaEstaDisponivel($mesa, $dia, $horario)){
            return redirect('/reserva')->withErrors([
                'Essa mesa não está disponivel no dia e horario que você escolheu'
            ]);
        }

        $reserva->horario = $horario;
        $reserva->numero_da_mesa = $mesa;
        $reserva->dia = $dia;
        $reserva->id_usuario = $usuario;
        $reserva->save();

        return redirect('/lista')->with('success', 'Reserva efetuada com sucesso.');
    }
}
