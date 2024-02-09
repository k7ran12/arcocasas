<?php

namespace App\Http\Controllers;

use App\Models\Asesor;
use Illuminate\Http\Request;

/**
 * Class AsesorController
 * @package App\Http\Controllers
 */
class AsesorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $asesors = Asesor::paginate();

        return view('asesor.index', compact('asesors'))
            ->with('i', (request()->input('page', 1) - 1) * $asesors->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $asesor = new Asesor();
        return view('asesor.create', compact('asesor'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Asesor::$rules);

        $asesor = Asesor::create($request->all());

        return redirect()->route('asesors.index')
            ->with('success', 'Asesor created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $asesor = Asesor::find($id);

        return view('asesor.show', compact('asesor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $asesor = Asesor::find($id);

        return view('asesor.edit', compact('asesor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Asesor $asesor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Asesor $asesor)
    {
        request()->validate(Asesor::$rules);

        $asesor->update($request->all());

        return redirect()->route('asesors.index')
            ->with('success', 'Asesor updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $asesor = Asesor::find($id)->delete();

        return redirect()->route('asesors.index')
            ->with('success', 'Asesor deleted successfully');
    }
}
