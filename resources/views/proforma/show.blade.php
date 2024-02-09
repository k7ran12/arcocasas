@extends('adminlte::page')

@section('title', 'Arcocasas')

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Proforma</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('proformas.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Cliente:</strong>
                            {{ $proforma->cliente->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Asesor:</strong>
                            {{ $proforma->asesor->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Proyecto:</strong>
                            {{ $proforma->proyecto->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $proforma->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Área:</strong>
                            {{ $proforma->area }}
                        </div>
                        <div class="form-group">
                            <strong>Bono:</strong>
                            {{ $proforma->bono }}
                        </div>
                        <div class="form-group">
                            <strong>Precio:</strong>
                            {{ $proforma->precio }}
                        </div>
                        <div class="form-group">
                            <strong>Inicial:</strong>
                            {{ $proforma->inicial }}
                        </div>
                        <div class="form-group">
                            <strong>Plazo:</strong>
                            {{ $proforma->plazo }}
                        </div>
                        <div class="form-group">
                            <strong>Interes:</strong>
                            {{ $proforma->interes }}
                        </div>
                        <div class="form-group">
                            <strong>Cuota Men:</strong>
                            {{ $proforma->cuota_men }}
                        </div>
                        <div class="form-group">
                            <strong>Saldo Fin:</strong>
                            {{ $proforma->saldo_fin }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
