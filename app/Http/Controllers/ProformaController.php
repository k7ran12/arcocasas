<?php

namespace App\Http\Controllers;

use App\Models\Proforma;
use App\Models\Cliente;
use App\Models\Asesor;
use App\Models\Proyecto;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

/**
 * Class ProformaController
 * @package App\Http\Controllers
 */
class ProformaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proformas = Proforma::paginate();

        return view('proforma.index', compact('proformas'))
            ->with('i', (request()->input('page', 1) - 1) * $proformas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $proforma = new Proforma();
        $clientes = Cliente::pluck('nombre', 'id');
        $asesors = Asesor::pluck('nombre', 'id');
        $proyectos = Proyecto::pluck('nombre', 'id');
        return view('proforma.create', compact('proforma', 'clientes', 'asesors', 'proyectos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */

    private function calcularSaldoYCuota($precio, $inicial, $plazo, $interes, $bono)
    {
        // Calcula el saldo fin
        $saldoFin = (($precio - $inicial - $bono) * ($interes / 100)) + ($precio - $inicial - $bono);
        // Calcula la cuota mensual
        $cuotaMen = ($saldoFin / $plazo);

        return [
            'saldo_fin' => $saldoFin,
            'cuota_men' => $cuotaMen,
        ];
    }

    public function store(Request $request)
    /*{
        request()->validate(Proforma::$rules);

        $proforma = Proforma::create($request->all());

        return redirect()->route('proformas.index')
            ->with('success', 'Proforma created successfully.');
        

    }*/
    /*{
        $validatedData = $request->validate(Proforma::$rules);

        // Calcula el saldo fin
        $saldoFin = (($request->precio - $request->inicial) * ($request->interes / 100))+($request->precio - $request->inicial);
        $cuotaMen = ($saldoFin / $request->plazo);
        // Crea un nuevo objeto Proforma con los datos validados y el saldo fin calculado
        $proforma = new Proforma($validatedData);
        $proforma->saldo_fin = $saldoFin;
        $proforma->cuota_men = $cuotaMen;

        // Guarda la nueva proforma en la base de datos
        $proforma->save();

        return redirect()->route('proformas.index')->with('success', 'Proforma created successfully.');
    }*/
    {
        $validatedData = $request->validate(Proforma::$rules);

        // Calcula el saldo fin y la cuota mensual
        $calculos = $this->calcularSaldoYCuota(
            $request->precio,
            $request->inicial,
            $request->plazo,
            $request->interes,
            $request->bono
        );

        // Crea un nuevo objeto Proforma con los datos validados y los cálculos
        $proforma = new Proforma(array_merge($validatedData, $calculos));

        // Guarda la nueva proforma en la base de datos
        $proforma->save();

        return redirect()->route('proformas.index')->with('success', 'Proforma created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $proforma = Proforma::findOrFail($id);
        $cuotas = $proforma->cuotas; // Obtener todas las cuotas asociadas a esta proforma
        return view('proforma.show', compact('proforma', 'cuotas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $proforma = Proforma::find($id);
        $clientes = Cliente::pluck('nombre', 'id');
        $asesors = Asesor::pluck('nombre', 'id');
        $proyectos = Proyecto::pluck('nombre', 'id');
        return view('proforma.edit', compact('proforma', 'clientes', 'asesors', 'proyectos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Proforma $proforma
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Proforma $proforma)
    /*{
        request()->validate(Proforma::$rules);

        $proforma->update($request->all());

        return redirect()->route('proformas.index')
            ->with('success', 'Proforma updated successfully');
    }*/
    /*{
        $validatedData = $request->validate(Proforma::$rules);

        // Calcula el saldo fin
        $saldoFin = (($request->precio - $request->inicial) * ($request->interes / 100))+($request->precio - $request->inicial);
        $cuotaMen = ($saldoFin / $request->plazo);
        // Actualiza los datos de la proforma con los datos validados y el saldo fin calculado
        $proforma->update(array_merge($validatedData, ['saldo_fin' => $saldoFin, 'cuota_men' => $cuotaMen]));

        return redirect()->route('proformas.index')->with('success', 'Proforma updated successfully');
    }*/
    {
        $validatedData = $request->validate(Proforma::$rules);

        // Calcula el saldo fin y la cuota mensual
        $calculos = $this->calcularSaldoYCuota(
            $request->precio,
            $request->inicial,
            $request->plazo,
            $request->interes,
            $request->bono
        );

        // Actualiza los datos de la proforma con los datos validados y los cálculos
        $proforma->update(array_merge($validatedData, $calculos));

        return redirect()->route('proformas.index')->with('success', 'Proforma updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $proforma = Proforma::find($id)->delete();

        return redirect()->route('proformas.index')
            ->with('success', 'Proforma deleted successfully');
    }
    //pdf
    /*public function generatePDF($id)
    {
        //$proforma = Proforma::find($id)->toArray();
        $proforma = Proforma::where('id', $id)->with(['cliente', 'asesor', 'proyecto'])->first()->toArray();
        //$asesor = Proforma::where('id', $id)->with('asesor')->first()->toArray();
        //dd($proforma);
        return PDF::loadView('proforma.documento', $proforma)
        ->stream('archivo.pdf');
    }*/
    public function generatePDF($id)
{
    // Obtener los datos del proyecto y otros modelos necesarios
    $proforma = Proforma::find($id);
    $cliente = $proforma->cliente;
    $asesor = $proforma->asesor;
    $proyecto = $proforma->proyecto;

    // Calcular las cuotas
    $plazo = $proforma->plazo;
    $saldoFin = $proforma->saldo_fin;
    $interes = $proforma->interes;
    $cuotaMensual = $saldoFin / $plazo;

    // Crear un array para almacenar la información de las cuotas
    $cuotas = [];
    $fechaInicio = now(); // Fecha de inicio
    for ($i = 1; $i <= $plazo; $i++) {
        // Clonar la fecha de inicio para evitar modificarla
        $fechaVencimiento = clone $fechaInicio;
        // Agregar meses a la fecha clonada
        $fechaVencimiento->addMonths($i);

        $cuotas[] = [
            'numero' => $i,
            'monto' => $cuotaMensual,
            'fecha_vencimiento' => $fechaVencimiento->format('Y-m-d'),
        ];
    }

    // Pasar los datos a la vista y generar el PDF
    $data = [
        'cliente' => $cliente,
        'asesor' => $asesor,
        'proyecto' => $proyecto,
        'nombre' => $proforma->nombre,
        'area' => $proforma->area,
        'bono' => $proforma->bono,
        'precio' => $proforma->precio,
        'inicial' => $proforma->inicial,
        'plazo' => $proforma->plazo,
        'interes' => $proforma->interes,
        'cuota_men' => $cuotaMensual,
        'saldo_fin' => $saldoFin,
        'cuotas' => $cuotas,
    ];

    return PDF::loadView('proforma.documento', $data)->stream('archivo.pdf');
}

    


}
