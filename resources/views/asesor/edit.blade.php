@extends('adminlte::page')

@section('title', 'Arcocasas')

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Update') }} Asesor</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('asesors.update', $asesor->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('asesor.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
