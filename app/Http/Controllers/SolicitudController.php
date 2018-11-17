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
        $hoy = date('Y-m-d');
        $anos = $hoy->diff(session('datos')["fecha_nacimiento"]);
        $edad=$annos->y;
        if(session('datos')["empresa"]){
            $tipo=3;
            if($edad>1){
                if($edad>3){
                    $tiempo=2;
                }else{
                    $tiempo=4;
                }
            }else{
                $tiempo=5;
            }
        }else{
            $tipo=6;
        }
        if(session('datos')["activos"]>$request->monto_requerido){
            $act=0;
        }else{
            if(session('datos')["activos"]< $request->monto_requerido/2){
                $act=8;
            }else{
                $act=4;
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
                $cat=6;
                break;
            case "empresa":
                $cat=1;
                break;
            case "personal":
                $cat=5;
                break;
        }


        if(session('datos')["pasivos"] == 0 or session('datos')["activos"]==0){
            $pa=8;
        }else{
            $pa=2;
        }
        if(strlen($request->descripcion)>180){
            $des=4;
        }else{
            $des=8;
        }
        if($request->foto==null){
            $fot=5;
        }else{
            $fot=1;
        }
        if($request->video==null){
            $vid=5;
        }else{
            $vid=1;
        }
        switch (session('datos')["nivel"]) {
            case "ninguno":
                $niv=10;
                break;
            case "primaria":
                $niv=9;
                break;
            case "bachiller":
                $niv=8;
                break;
            case "tecnico":
                $niv=7;
                break;
            case "tecnologo":
                $niv=6;
                break;
            case "universitario":
                $niv=5;
                break;
            case "maestria":
                $niv=4;
                break;
            case "doctorado":
                $niv=3;
                break;
        }

        if($request->monto_requerido>1000000){
            if($request->monto_requerido>100000000){
                $mon=8;
            }else{
                $mon=4;
            }
        }else{
            $mon=2;
        }
        $variables = [$tiempo,$tipo,$act,$pa,$pa,$cat,$des,$fot,$vid,$niv,$mon];
        $solicitud->riesgo=calcular_var($variables);
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

    private function calcular_var($variables){
        $pesos=[3,5,3,3,5,3,1,1,5,5,5];
        $total=39;
        $i;
        $riesgo = 0.0;
        for ($i = 0; $i < 10; $i++) { 
            $riesgo = $riesgo + $pesos[$i]*$valores[$i];
        }
        $riesgo=($riesgo/$total)*10;
        return $riesgo;
    }
}
