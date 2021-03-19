<?php

namespace App\Http\Controllers\API;

use App\Detalle;
use App\Horario;
use App\Http\Controllers\Controller;
use App\Oficio;
use App\Persona;
use App\Trabajo;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use \Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ApiEmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // echo json_encode("Hello server");
        $empleados = Persona::where('tipo', 'empleado')->get();
        return response()->json($empleados);
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

        $persona = new Persona();
        $persona->ci = $request->ci;
        $persona->nombre = $request->nombre;
        $persona->apellidoP = $request->apellidoP;
        $persona->apellidoM = $request->apellidoM;
        $persona->direccion = $request->direccion;
        $persona->telefono = $request->telefono;
        $persona->fechaNacimiento = $request->fechaNacimiento;
        $persona->fechaRegistro = Carbon::now();
        $persona->foto = $request->foto;
        $persona->longitud = $request->longitud;
        $persona->latitud = $request->latitud;
        $persona->calificacionPromedio = 0;
        $persona->tipo = 'empleado';
        $persona->estado = 'activo';
        $persona->sancion = 'inactivo';
        $persona->estadoRegistro = 'espera';
        $persona->fotoCi = $request->fotoCi;
        $persona->fotoAntecedentesPenales = $request->fotoAntecedentesPenales;
        $persona->fotoSelfieCi = $request->fotoSelfieCi;

        $persona->save();
        return response()->json($persona);
    }

    public function cargarFoto(Request $request)
    {
        $persona = new Persona();
        if ($request->hasFile('fotoCi')) {
            $persona->fotoCi = $this->setFoto($request->file('fotoCi'));
        }
        if ($request->hasFile('fotoAntecedentesPenales')) {
            $persona->fotoAntecedentesPenales = $this->setFoto($request->file('fotoAntecedentesPenales'));
        }
        if ($request->hasFile('fotoSelfieCi')) {
            $persona->fotoSelfieCi = $this->setFoto($request->file('fotoSelfieCi'));
        }
        $persona->ci = $request->ci;
        $persona->nombre = $request->nombre;
        $persona->apellidoP = $request->apellidoP;
        $persona->apellidoM = $request->apellidoM;
        $persona->direccion = $request->direccion;
        $persona->telefono = $request->telefono;
        $persona->fechaNacimiento = $request->fechaNacimiento;
        $persona->fechaRegistro = Carbon::now();
        $persona->calificacionPromedio = 0;
        $persona->tipo = 'empleado';
        $persona->estado = 'activo';
        $persona->sancion = 'inactivo';
        $persona->estadoRegistro = 'espera';
        $persona->token = $request->token;
        $persona->save();
        return response()->json(
            $persona->id,
        );
    }

    public function setFoto($file)
    {
        $filename = $file->getClientOriginalName();
        $filename = pathinfo($filename, PATHINFO_FILENAME);
        $name_file = str_replace(" ", "_", $filename);
        $extension = $file->getClientOriginalExtension();
        $picture = date('His') . '-' . $name_file . '.' . $extension;
        $file->move(public_path('Files/'), $picture);
        return $picture;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    // Schema::create('horarios', function (Blueprint $table) {
    //     $table->id();
    //     $table->unsignedBigInteger("idPersona");
    //     $table->unsignedBigInteger("idOficio");
    //     $table->string("dias");
    //     $table->string("horaInicio");
    //     $table->string("horaFin");
    //     $table->foreign('idPersona')->references('id')->on('personas');
    //     $table->foreign('idOficio')->references('id')->on('oficios');
    //     $table->timestamps();
    // });

    public function show($id)
    {
        $persona = Persona::findOrFail($id);
        $horarios = Horario::where('idPersona', $id)->get();
        $persona->horario = $horarios;
        $oficios = [];
        foreach ($horarios as $key => $value) {
            $temp = Oficio::where('id', $value->idOficio)->first();
            $oficios = Arr::add($oficios, $key, $temp);
        }
        $persona->oficio = $oficios;
        //return response()->file(public_path('Files/'.$persona->fotoAntecedentesPenales),);
        return response()->json(array($persona));
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

    //'aprobado', 'denegado','espera'
    public function aprobar($id)
    {
        $persona = Persona::findOrFail($id);
        $persona->estadoRegistro = 'aprobado';
        $persona->update();
        $rep=$this->sendNotification(
            $persona->token,
            "Tu registro ha sido aprobado",
            " ");
        return response()->json(true);
    }
    public function denegar($id)
    {
        $persona = Persona::findOrFail($id);
        $persona->estadoRegistro = 'denegado';
        $persona->update();
        $rep=$this->sendNotification(
            $persona->token,
            "Tu registro ha sido denegado",
            " ");
        return response()->json(true);
    }
    public function sendNotification($to,$tittle,$body){
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://fcm.googleapis.com/fcm/send',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS =>'{
                    "to": "'.$to.'",
                    "notification": {
                        "sound": "default",
                        "body": "'.$body.'",
                        "title": "'.$tittle.'",
                        "content_available": true,
                        "priority": "high"
                    },
                    "data": {
                        "sound": "default",
                        "body": "test body",
                        "title": "test title",
                        "content_available": true,
                        "priority": "high"
                    }
                }',
            CURLOPT_HTTPHEADER => array(
                'Authorization: key=AAAA8Wq8iBo:APA91bFVCnAppxmTPCnEDlhUXDAh90JstFzHznlBnY7OZTQSPMQjHBwYiexiC1ba77b7ofYdc_txJgDLUr3jA4ePUqXcQVS3gHtqfKwgvLqAAsgEPYaKv1dFmHv3SgtPgpb56UEd7d4S',
                'Content-Type: application/json'
            ),
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        return $response;
    }
    //$table->enum('tipo', ['empleador', 'empleado','administrador']);
    public function all()
    {
        $persona = new Persona();
        $persona = Persona::where('tipo','=','empleado')->get();
        return response()->json($persona);
    }

    public function oficioempleado($id)
    {
        $oficios = DB::table('horarios')->where('horarios.idPersona','=',$id)
                    ->leftJoin('oficios','horarios.idOficio','=','oficios.id')                    
                    ->get('oficios.*');
        return $oficios;

    }

    public function crearTrabajo(Request $request)
    {
        $detalles = $request->json("detalle");
        $idEmpleado = $request->json("idEmpleado");
        $idContratante = $request->json("idContratante");
        

        $trabajo = new Trabajo();
        $trabajo->direccion= $request->json("direccion");
        $trabajo->horario= $request->json("horario");
        $trabajo->idEmpleado=$idEmpleado;
        $trabajo->save();

        foreach ($detalles as $detalle) {
            $det = new Detalle();
            $det->nombredetalle = $detalle["nombredetalle"];
            $det->encargo = $detalle["encargo"];
            $det->idContratante = $idContratante;
            $det->idTrabajo = $trabajo->id;
            $det->save();
        }

        $persona= new Persona();
        $persona = Persona :: where('id',$idEmpleado)->first();
        $this->sendNotification(($persona->token),"Tienes una nueva solicitud de trabajo","detalle");
        return response()->json($persona);
    }

    public function login(Request $request)
    {   $id = $request->json("apellidoP");
        $password = $request->json("ci");
        $token = $request->json('token');
        $persona= new Persona();
        $persona = Persona::where("apellidoP",$id)
                    ->where("ci",$password)->first();
        $persona->token=$token;
        $persona->update();
        return response()->json($persona);
    }
}
