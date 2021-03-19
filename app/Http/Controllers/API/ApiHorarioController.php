<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Horario;

class ApiHorarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        
        $horarios = $request->json("horarios");
        $idPersona = $request->json("idPersona");
        foreach ($horarios as $horario) {
            $nuevo = new Horario();
            $nuevo->idPersona = $idPersona;
            $nuevo->idOficio = $horario["idOficio"];
            $nuevo->dias = $horario["dias"];
            $nuevo->horaInicio = $horario["horaInicio"];
            $nuevo->horaFin = $horario["horaFin"];
            $nuevo->save();
        }
        return response()->json(array("exito"=>true));
        //return response()->json($request);
        //return response()->json(array("id"=>$idPersona,"horarios"=>$horarios));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
