<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ReservaEfetuada extends Model
{
    use HasFactory;

    public function horarioEstaDisponivel
    {

    }

    public function mesaEstaDisponivel(int $mesa, string $dia, int $hora, int $idUsuario): bool
    {
        return false;
    }

    public function listaDeReservas(): array
    {
        return DB::table('reservas')->get();
    }
}
