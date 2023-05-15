<?php

namespace App\Http\Controllers;

use App\Models\ReservaEfetuada;
use Illuminate\Http\Request;
use Illuminate\Contracts\Support\Renderable;

class ListaDasMesasReservadasController extends Controller
{
    public function index(): Renderable
    {
        $reservas = new ReservaEfetuada();

        return view('lista_de_reservas', [
            'lista' => $reservas->listaDeReservas()
        ]);
    }
}
