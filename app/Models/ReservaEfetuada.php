<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ReservaEfetuada extends Model
{
    use HasFactory;

    protected $table = 'reservas';

    public function tentativaDeReservarNoDomingo(string $dia): bool
    {
        $d = new Carbon($dia);
        $d = $d->format('l');

        return ($d == 'Sunday');
    }

    public function dataValidaParaReservaFutura(string $dia): bool
    {
        $d = new Carbon($dia);  
        $t = Carbon::today();

        return $d->timestamp >= $t->timestamp; // evita que datas já passadas sejam escolhidas
    }

    public function horarioAbertoParaReservar(string $hora): bool
    {
        return false;
    }

    public function mesaEstaDisponivel(int $mesa, string $dia, string $hora): bool
    {
        $query = DB::table('reservas');
        $query->where('numero_da_mesa', $mesa);
        $query->where('dia', $dia);
        $query->where('horario', $hora);

        return $query->doesntExist();
    }

    public function listaDeReservas(): array
    {
        return DB::table('reservas')->get()->map(function($item){

            $item->usuario = User::where('id', $item->id_usuario)->first();
            return $item;

        })->toArray();
    }
}
