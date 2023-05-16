@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header bg-primary text-white">
        Realizar reserva para <span class="text-warning">{{ Auth::user()->name }}</span>
    </div>

    <div class="card-body">
        <form action="/efetuar-reserva" method="post">
            {{ csrf_field() }}

            <div class="form-group">
                <label>Escolha a mesa que deseja reservar:</label>
                <select class="form-control" name="mesa">
                    @for ($i = 1; $i <= 15; $i++)
                        <option value="{{ $i }}">Mesa número {{ $i }}</option>
                    @endfor
                </select>
            </div>

            <hr>

            <div class="form-group">
                <label>Escolha a data/dia:</label>
                <input type="date" name="dia" required>
                <div class="badge text-danger fw-bold">Não é possivel reservar nos domingos.</div>
            </div>

            <hr>

            <div class="form-group">
                <label>Escolha um horário:</label>
                <div class="form-control bg-warning">
                    Apenas horários entre 18:00 até 23:59 são disponiveis - 
                    <input type="time" name="horario" min="18:00" max="23:59" required>
                </div>
            </div>

            <hr>

            <input type="submit" class="btn btn-primary btn-lg" value="efetuar reserva">
        </form>

        <hr>

        @if ($errors->any())
            <div class="alert bg-danger text-white">
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif
    </div>
</div>

@endsection