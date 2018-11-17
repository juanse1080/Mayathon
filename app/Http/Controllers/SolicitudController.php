<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SolicitudStoreController;
use App\Http\Controllers\SupraController;
use App\Http\Controllers\UsuarioController;
use App\Solicitud;
use App\Multimedia;

class SolicitudController extends Controller {

    public function index(){
        $solicitudes = Solicitud::where('solicitud.fk_usuario',session('datos')['pk_usuario'])->where('multimedia.tipo','foto')->leftjoin('multimedia','multimedia.fk_solicitud','=','solicitud.pk_solicitud')->get();
        dd($solicitudes);
        // dd(count($solicitudes));
        return view('solicitudes.solicitudes', ['solicitudes' => $solicitudes, 'num' => count($solicitudes)]);
    }

    public function create(){
        $r=UsuarioController::editSolicitante();
        if($r==null){
            return view('solicitudes.crearSolicitud');
        }else{
            return $r;
        }
        
    }

    public function store(SolicitudStoreController $request){
        $solicitud = (new Solicitud)->fill($request->all());
        $solicitud->fk_usuario= session('datos')["pk_usuario"];
        function CalculaEdad( $fecha ) {
            list($Y,$m,$d) = explode("-",$fecha);
            return( date("md") < $m.$d ? date("Y")-$Y-1 : date("Y")-$Y );
        }
        $edad=CalculaEdad(session('datos')["fecha_nacimiento"]);
        if(session('datos')["empresa"]){
            $tipo=2;
            if($edad>1){
                if($edad>3){
                    $tiempo=1;
                }else{
                    $tiempo=2;
                }
            }else{
                $tiempo=3;
            }
        }else{
            $tipo=3;
            if($edad>30 & $edad<60){
                $tiempo=1;
            }else{
                $tiempo=2;
            }
            
        }
        if(session('datos')["activos"]>$request->monto_requerido){
            $act=0;
        }else{
            if(session('datos')["activos"]< $request->monto_requerido/2){
                $act=2;
            }else{
                $act=1;
            }
            
        }
        switch ($request->categoria) {
            case "educacion":
                $cat=1;
                break;
            case "investigacion":
                $cat=1;
                break;
            case "arte":
                $cat=2;
                break;
            case "empresa":
                $cat=0;
                break;
            case "personal":
                $cat=2;
                break;
        }


        if(session('datos')["pasivos"] == 0 or session('datos')["activos"]==0){
            $pa=2;
        }else{
            $pa=1;
        }
        if(strlen($request->descripcion)>180){
            $des=1;
        }else{
            $des=2;
        }
        if($request->foto==null){
            $fot=2;
        }else{
            $fot=1;
        }
        if($request->video==null){
            $vid=2;
        }else{
            $vid=1;
        }
        switch (session('datos')["nivel"]) {
            case "Ninguno":
                $niv=6;
                break;
            case "Primaria":
                $niv=5;
                break;
            case "Bachiller":
                $niv=5;
                break;
            case "Tecnico":
                $niv=4;
                break;
            case "Tecnologo":
                $niv=3;
                break;
            case "Universitario":
                $niv=3;
                break;
            case "Maestria":
                $niv=2;
                break;
            case "Doctorado":
                $niv=1;
                break;
            default:
                $niv=0;
        }

        if($request->monto_requerido>1000000){
            if($request->monto_requerido>100000000){
                $mon=4;
            }else{
                $mon=1;
            }
        }else{
            $mon=2;
        }
        $variables = [$tiempo,$tipo,$act,$pa,$pa,$cat,$des,$fot,$vid,$niv,$mon];
        // dd($variables);
        $solicitud->riesgo=$this->calcular_var($variables);
        // dd($solicitud);
        $solicitud->save();
        Multimedia::create([
            'fk_solicitud' => $solicitud->pk_solicitud,
            'tipo' => 'foto',
            'descripcion' => $request->descripcion_foto,
            'url' => SupraController::subirArchivo($request,'solicitud'.$solicitud->pk_solicitud,'foto'),
        ]);
        Multimedia::create([
            'fk_solicitud' => $solicitud->pk_solicitud,
            'tipo' => 'video',
            'descripcion' => $request->descripcion_video,
            'url' => $request->video,
        ]);        

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view("solicitudes.verSolicitud_prueba"); //Paola
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

    public function calcular_var($variables){
        $pesos=[3,5,3,3,5,3,1,1,5,5,5,5];
        $total=39;
        $i;
        $riesgo = 0.0;
        for ($i = 0; $i < 11; $i++) { 
            $riesgo = $riesgo + $pesos[$i]*$variables[$i];
        }
        $riesgo=($riesgo/$total)*10;
        return $riesgo;
    }
}
