<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsuarioStoreController extends FormRequest{

    public function authorize(){
        return true;
    }

    public function rules(){
        return [
            // 'cedula' => 'required|numeric|unique:empleado',
            // 'nombre' => 'required|string|max:50',
            // 'apellido' => 'required|string|max:50',
            // 'correo' => 'required|email|max:50',
            // 'direccion' => 'required|string|max:255',
            // 'titulo' => 'required|string|max:50',
            // 'fk_curso' => 'numeric',
            // 'role' => 'required|string|max:1',
            // 'foto' => 'image|mimes:jpeg,bmp,png,jpg'
        ];
    }

}