<?php

namespace App\Http\Controllers;

use App\Models\ListaDeReservas;
use Illuminate\Contracts\Support\Renderable;

class HomeController extends Controller
{
    private $listaDeReservas;

    public function __construct(ListaDeReservas $listaDeReservas)
    {
        $this->listaDeReservas = $listaDeReservas;
    }

    public function index(): Renderable
    {
        return view('home', [
            'total' => count($this->listaDeReservas->obterLista())
        ]);
    }
}
