<?php

namespace App\Http\Controllers;

use App\Models\ReservaEfetuada;
use Illuminate\Contracts\Support\Renderable;

class HomeController extends Controller
{
    public function index(): Renderable
    {
        $lista = new ReservaEfetuada;

        return view('home', [
            'total' => count($lista->listaDeReservas())
        ]);
    }
}
