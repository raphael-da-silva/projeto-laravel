<?php

namespace App\Http\Controllers;

use App\Models\ReservaEfetuada;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservaDeMesaController extends Controller
{
    private $reserva;

    public function __construct(ReservaEfetuada $reserva)
    {
        $this->reserva = $reserva;
    }

    public function index(): Renderable
    {
        return view('reserva');
    }

    private function redirecionarComErro(string $message): RedirectResponse
    {
        return redirect('/reserva')->withErrors([$message]);
    }

    public function submit(Request $request): RedirectResponse
    {
        $horario = $request->input('horario');
        $mesa    = $request->input('mesa');
        $dia     = $request->input('dia');

        if(!$this->reserva->dataValidaParaReservaFutura($dia)){
            return $this->redirecionarComErro('A data que você escolheu já passou, logo não é valida para reserva.');
        }

        if(!$this->reserva->horarioAbertoParaReservar($horario)){
            return $this->redirecionarComErro('Apenas disponíveis horários de 18:00 até 23:59');
        }

        if($this->reserva->tentativaDeReservarNoDomingo($dia)){
            return $this->redirecionarComErro('Você não pode reservar mesa no domingo');
        }

        if(!$this->reserva->mesaEstaDisponivel($mesa, $dia, $horario)){
            return $this->redirecionarComErro('Essa mesa não está disponivel no dia e horario que você escolheu');
        }

        $this->reserva->efetuar($horario, $mesa, $dia, Auth::user()->id);
        return redirect('/lista')->with('success', 'Reserva efetuada com sucesso.');
    }
}
