<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use App\Models\User;

class ListaDeReservas
{
    private $table = 'reservas';

    public function obterLista(): array
    {
        return DB::table($this->table)->get()->map(function($item){

            $item->usuario = User::where('id', $item->id_usuario)->first();
            return $item;

        })->toArray();
    }
}