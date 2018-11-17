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
        $solicitudes = Solicitud::where('solicitud.fk_usuario',session('datos')['pk_usuario'])->get();
        $fotos = [];
        foreach ($solicitudes as $key => $value) {
            $fotos[$key] = [];
        }
        foreach ($solicitudes as $key => $value) {
            $multimedia = Multimedia::where('fk_solicitud',$value->pk_solicitud)->where('tipo','foto')->get();
            if (!empty($multimedia[0])) {
                array_push($fotos[$key],$multimedia[0]);
            }
        }
        return view('solicitudes.solicitudes', ['solicitudes' => $solicitudes, 'num' => count($solicitudes),'fotos' => $fotos]);
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
            $tipo=0;
            if($edad>1){
                if($edad>3){
                    $tiempo=0;
                }else{
                    $tiempo=1;
                }
            }else{
                $tiempo=1;
            }
        }else{
            $tipo=1;
            if($edad>30 & $edad<60){
                $tiempo=0;
            }else{
                $tiempo=1;
            }
            
        }
        if(session('datos')["activos"]>$request->monto_requerido){
            $act=0;
        }else{
            if(session('datos')["activos"]< $request->monto_requerido/2){
                $act=1;
            }else{
                $act=0;
            }
            
        }
        switch ($request->categoria) {
            case "educacion":
                $cat=1;
                break;
            case "investigacion":
                $cat=0;
                break;
            case "arte":
                $cat=1;
                break;
            case "empresa":
                $cat=0;
                break;
            case "personal":
                $cat=1;
                break;
        }


        if(session('datos')["pasivos"] == 0 or session('datos')["activos"]==0){
            $pa=1;
        }else{
            $pa=0;
        }
        if(strlen($request->descripcion)>180){
            $des=0;
        }else{
            $des=1;
        }
        if($request->foto==null){
            $fot=1;
        }else{
            $fot=0;
        }
        if($request->video==null){
            $vid=1;
        }else{
            $vid=0;
        }
        switch (session('datos')["nivel"]) {
            case "Ninguno":
                $niv=3;
                break;
            case "Primaria":
                $niv=3;
                break;
            case "Bachiller":
                $niv=2;
                break;
            case "Tecnico":
                $niv=1;
                break;
            case "Tecnologo":
                $niv=1;
                break;
            case "Universitario":
                $niv=0;
                break;
            case "Maestria":
                $niv=0;
                break;
            case "Doctorado":
                $niv=0;
                break;
            default:
                $niv=0;
        }

        if($request->monto_requerido>1000000){
            if($request->monto_requerido>100000000){
                $mon=2;
            }else{
                $mon=1;
            }
        }else{
            $mon=0;
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
        $solicitud = Solicitud::where('solicitud.fk_usuario',session('datos')['pk_usuario'])->where('solicitud.pk_solicitud',$id)->get();
        if (count($solicitud) == 1) {
            $fotos = Multimedia::where('fk_solicitud',$solicitud[0]->pk_solicitud)->get();
            return view("solicitudes.verSolicitud", ['solicitud' => $solicitud[0], 'fotos' => $fotos]);
        }else{
            return back();
        }
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
        $pesos=[3,3,2,3,2,2,1,1,3,2,3,2];
        $total=27;
        $i;
        $riesgo = 0.0;
        for ($i = 0; $i < 11; $i++) { 
            $riesgo = $riesgo + $pesos[$i]*$variables[$i];
        }
        $riesgo=($riesgo/$total);
        return $riesgo;
    }
}
