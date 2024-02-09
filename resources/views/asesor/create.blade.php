@extends('adminlte::page')

@section('title', 'Arcocasas')

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Create') }} Asesor</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('asesors.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('asesor.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
