<?php

namespace App\Http\Controllers;

use App\Sancion;
use App\Persona;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

class SancionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $sanciones = Sancion::get();
        return view('sancion.index', ['sanciones' => $sanciones]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($idPersona)
    {
        return view('sancion.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $message = $request->daterange;
        $start = (strpos($message, '-') + 1);
        $fechaInicio = substr($message, 0, $start - 2);
        $fechaFin = substr($message, $start + 2);
        $dias = (strtotime($fechaInicio) - strtotime($fechaFin)) / 86400;
        $dias = abs($dias);
        $dias = floor($dias);
        $idPersona = $request->input('persona-id');

        $sancion =  new Sancion();
        $sancion->fechaInicio= Carbon::createFromFormat('d/m/Y', $fechaInicio)->format('d/m/Y');
        $sancion->fechaFin= Carbon::createFromFormat('d/m/Y', $fechaFin)->format('d/m/Y');
        $sancion->cantidadDias= $dias;
        $sancion->estado= 'activo';
        $sancion->justificacion= $request->input('justificacion');
        $sancion->idPersona=$idPersona;
        $sancion->save();

        $persona= new Persona();
        $persona= Persona::findOrFail($idPersona);
        $persona->sancion='activo';
        $persona->update();
        $request->session()->flash('alert-danger', 'Sancion registrada');
        return redirect()->route('empleado.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\sancion  $sancion
     * @return \Illuminate\Http\Response
     */
    public function show(sancion $sancion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\sancion  $sancion
     * @return \Illuminate\Http\Response
     */
    public function edit(sancion $sancion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\sancion  $sancion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, sancion $sancion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\sancion  $sancion
     * @return \Illuminate\Http\Response
     */
    public function destroy(sancion $sancion)
    {
        //
    }
}
