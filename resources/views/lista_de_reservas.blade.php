@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header bg-warning">
        <h4>Mesas já reservadas</h4>
        <hr>
        Total: {{ count($lista) }}
    </div>

    <div class="card-body">
        <table class="table table-bordered">
            <thead class="">
                <tr>
                    <th>Número da mesa</th>
                    <th>Horário</th>
                    <th>Dia</th>
                    <th>Quem foi que reservou</th>
                </tr>
            </thead>

            @forelse ($lista as $reserva)
                <tr>
                    <td>Mesa {{ $reserva->numero_da_mesa }}</td>
                    <td>{{ $reserva->horario }}</td>
                    <td>{{ Carbon\Carbon::createFromFormat('Y-m-d', $reserva->dia)->format('d/m/Y') }}</td>
                    <td>{{ $reserva->usuario->name }} / {{ $reserva->usuario->email }}</td>
                </tr>
            @empty
                <div class="alert alert-danger">
                    Nenhuma reserva efetuada.
                </div>
            @endforelse
        </table>
    </div>
</div>

@endsection