<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('Cliente') }}
            {{ Form::select('id_clientes', $clientes, $proforma->id_clientes, ['class' => 'form-control' . ($errors->has('id_clientes') ? ' is-invalid' : ''), 'placeholder' => 'Clientes']) }}
            {!! $errors->first('id_clientes', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Asesor') }}
            {{ Form::select('id_asesors', $asesors, $proforma->id_asesors, ['class' => 'form-control' . ($errors->has('id_asesors') ? ' is-invalid' : ''), 'placeholder' => 'Asesors']) }}
            {!! $errors->first('id_asesors', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Proyecto') }}
            {{ Form::select('id_proyectos', $proyectos, $proforma->id_proyectos, ['class' => 'form-control' . ($errors->has('id_proyectos') ? ' is-invalid' : ''), 'placeholder' => 'Proyectos']) }}
            {!! $errors->first('id_proyectos', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Descripción') }}
            {{ Form::text('nombre', $proforma->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Descripción']) }}
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Área m2') }}
            {{ Form::number('area', $proforma->area, ['class' => 'form-control' . ($errors->has('area') ? ' is-invalid' : ''), 'placeholder' => 'area', 'step' => '0.01']) }}
            {!! $errors->first('area', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Bono S/.') }}
            {{ Form::number('bono', $proforma->bono, ['class' => 'form-control' . ($errors->has('bono') ? ' is-invalid' : ''), 'placeholder' => 'bono', 'step' => '0.01']) }}
            {!! $errors->first('bono', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Precio S/.') }}
            {{ Form::number('precio', $proforma->precio, ['class' => 'form-control' . ($errors->has('precio') ? ' is-invalid' : ''), 'placeholder' => 'Precio', 'step' => '0.01']) }}
            {!! $errors->first('precio', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Incial S/.') }}
            {{ Form::number('inicial', $proforma->inicial, ['class' => 'form-control' . ($errors->has('inicial') ? ' is-invalid' : ''), 'placeholder' => 'Inicial', 'step' => '0.01']) }}
            {!! $errors->first('inicial', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Plazo en meses') }}
            {{ Form::number('plazo', $proforma->plazo, ['class' => 'form-control' . ($errors->has('plazo') ? ' is-invalid' : ''), 'placeholder' => 'Plazo']) }}
            {!! $errors->first('plazo', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Interes %') }}
            {{ Form::number('interes', $proforma->interes, ['class' => 'form-control' . ($errors->has('interes') ? ' is-invalid' : ''), 'placeholder' => 'Interes']) }}
            {!! $errors->first('interes', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        {{-- <div class="form-group">
    {{ Form::label('cuota_men') }}
    {{ Form::number('cuota_men', $proforma->cuota_men, ['class' => 'form-control' . ($errors->has('cuota_men') ? ' is-invalid' : ''), 'placeholder' => 'Cuota Men']) }}
    {!! $errors->first('cuota_men', '<div class="invalid-feedback">:message</div>') !!}
</div> --}}

{{-- <div class="form-group">
    {{ Form::label('saldo_fin') }}
    {{ Form::number('saldo_fin', $proforma->saldo_fin, ['class' => 'form-control' . ($errors->has('saldo_fin') ? ' is-invalid' : ''), 'placeholder' => 'Saldo Fin']) }}
    {!! $errors->first('saldo_fin', '<div class="invalid-feedback">:message</div>') !!}
</div> --}}

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>