<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inversion;
use App\Solicitud;

class InversionController extends Controller {

    public function index(){
        $solicitudes = new Solicitud;
        $solicitudes = $solicitudes->where('estado', true)->get();
        dd($solicitudes);
        // $inversiones = new Inversion;
        // $inversiones = $inversiones->where('fk_usuario',session('datos')['pk_usuario'])->get();
        // dd($inversiones);
    }

    public function create(Request $request){
        dd($request);
    }

    public function store(Request $request,$fk){
        //
    }

    public function show($id){
        //
    }

    public function edit($id){
        //
    }

    public function update(Request $request, $id){
        //
    }
}
