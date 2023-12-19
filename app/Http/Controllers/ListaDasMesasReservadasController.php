<?php

namespace App\Http\Controllers;

use App\Models\ListaDeReservas;
use App\Models\ReservaEfetuada;
use Illuminate\Contracts\Support\Renderable;

class ListaDasMesasReservadasController extends Controller
{
    private $listaDeReservas;

    public function __construct(ListaDeReservas $listaDeReservas)
    {
        $this->listaDeReservas = $listaDeReservas;
    }

    public function index(): Renderable
    {
        $reservas = new ReservaEfetuada();

        return view('lista_de_reservas', [
            'lista' => $this->listaDeReservas->obterLista()
        ]);
    }
}
