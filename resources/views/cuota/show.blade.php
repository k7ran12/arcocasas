@extends('layouts.app')

@section('template_title')
    {{ $cuota->name ?? "{{ __('Show') Cuota" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Cuota</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('cuotas.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Id Proforma:</strong>
                            {{ $cuota->id_proforma }}
                        </div>
                        <div class="form-group">
                            <strong>Numero:</strong>
                            {{ $cuota->numero }}
                        </div>
                        <div class="form-group">
                            <strong>Monto:</strong>
                            {{ $cuota->monto }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
