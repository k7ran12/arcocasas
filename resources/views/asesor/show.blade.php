@extends('adminlte::page')

@section('title', 'Arcocasas')

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Asesor</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('asesors.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $asesor->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Dni:</strong>
                            {{ $asesor->dni }}
                        </div>
                        <div class="form-group">
                            <strong>Direccion:</strong>
                            {{ $asesor->direccion }}
                        </div>
                        <div class="form-group">
                            <strong>Telefono:</strong>
                            {{ $asesor->telefono }}
                        </div>
                        <div class="form-group">
                            <strong>Email:</strong>
                            {{ $asesor->email }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
