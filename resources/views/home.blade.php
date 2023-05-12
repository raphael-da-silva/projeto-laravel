@extends('layouts.app')

@section('content')
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <hr>

                    Você está logado <span class="fw-bold">{{ Auth::user()->name }}</span>

                    <hr>

                    <div class="bg-success p-2 text-white">
                        O máximo de mesas do restaurante são 15.
                    </div>

                    <div class="bg-warning p-2">
                        Já estão reservadas [] mesas
                    </div>

                    <hr>

                    <a href="/reserva" class="btn btn-lg btn-primary">Fazer uma reserva</a>
                </div>
            </div>
@endsection
