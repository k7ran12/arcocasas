@extends('adminlte::page')

@section('title', 'Arcocasas')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Proforma') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('proformas.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Clientes</th>
										<th>Asesors</th>
										<th>Proyectos</th>
										<th>Descripción</th>
                                        <th>Área m2</th>
                                        <th>Bono S/.</th> 
										<th>Precio</th>
										<th>Inicial</th>
										<th>Plazo</th>
										<th>Interes</th>
										<th>Cuota Men</th>
										<th>Saldo Fin</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($proformas as $proforma)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $proforma->cliente->nombre }}</td>
											<td>{{ $proforma->asesor->nombre }}</td>
											<td>{{ $proforma->proyecto->nombre }}</td>
											<td>{{ $proforma->nombre }}</td>
                                            <td>{{ $proforma->area }}m2</td>
                                            <td>s/.{{ $proforma->bono }}</td> 
											<td>s/.{{ $proforma->precio }}</td>
											<td>s/.{{ $proforma->inicial }}</td>
											<td>{{ $proforma->plazo }}meses</td>
											<td>{{ $proforma->interes }}%</td>
											<td>s/.{{ $proforma->cuota_men }}</td>
											<td>s/.{{ $proforma->saldo_fin }}</td>

                                            <td>
                                                <form action="{{ route('proformas.destroy',$proforma->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('proformas.show',$proforma->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('proformas.edit',$proforma->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    <a target="_blank" class="btn btn-sm btn btn-info" href="{{ route('proformas.documento',$proforma->id) }}"><i class="fa fa-fw fa-print"></i> {{ __('PDF') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $proformas->links() !!}
            </div>
        </div>
    </div>
@endsection
