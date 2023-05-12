<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;

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
        dump($request->input('horario'), $request->input('mesa'));
    }
}
