
@extends('contenedores.home')
@section('titulo','Home')
@section('contenedor_home')
<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-10">
            <form enctype="multipart/form-data" action="{{ url('/usuarios') }}" method = "POST">
            @csrf
            <div class="card border-primary rounded-0" style="border-color:#66bb6a !important;">
                <div class="card-header p-0">
                    <div class="bg-info text-white text-center py-2" style="background-color:#66bb6a !important;">
                        <h3><i class="fas fa-user-tie"></i> Registro</h3>
                    </div>
                </div>
                <div class="card-body p-3">
                    <div class="row">
                        {{-- Persona Juridica - Natural --}}
                        <div class="col-md-6">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <span class= "input-group-text">
                                        <i class="fas fa-user-cog"></i>
                                    </span>
                                </div>
                                
                                <select class="custom-select custom-select-sm" name="empresa" id="empresa" onchange="desactivar(this)">
                                    <option @select('role', '0') @endselect value="0">Persona Natural</option>
                                    <option @select('role', '1') @endselect value="1">Persona Juridica</option>
                                </select>
                            </div>
                        </div>

                        {{-- cedula --}}
                        <div class="col-md-6">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <span class= "input-group-text">
                                        <i class="fas fa-id-card"></i>
                                    </span>
                                </div>
                                <input type="number" class="form-control form-control-sm"  id="cedula" name="cedula" placeholder="Cedula" value="@eachError('cedula', $errors) @endeachError">
                            </div>
                        </div>

                        
                    </div>
                    <div class="row">
                        {{-- nombre --}}
                        <div class="col-md-6">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user-circle"></i></span>
                                </div>
                                <input type="text" id="nombre" name="nombre" placeholder="Nombres" class="form-control form-control-sm" value="@eachError('nombre', $errors)@endeachError">
                            </div>
                        </div>
                        {{-- apellido --}}
                        <div class="col-md-6">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user-circle"></i></span>
                                </div>
                                <input type="text" id="apellido" name="apellido" placeholder="Apellidos" class="form-control form-control-sm" value="@eachError('apellido', $errors)@endeachError" >
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        {{-- correo --}}
                        <div class="col-md-6">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-at"></i></span>
                                </div>
                                <input type="email" id="correo" name="correo" placeholder="E-mail" class="form-control form-control-sm" value="@eachError('correo', $errors)@endeachError">
                            </div>
                        </div>
                        {{-- fecha de nacimiento/creacion --}}
                        <div class="col-md-6">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="far fa-calendar-alt"></i>  <i id="titlefecha" style="padding-left:7px;font-size:0.7rem !important;"> Fecha nacimiento</i>
                                    </span>
                                </div>
                                <input type="date" name="fecha_nacimiento" placeholder="dd/mm/yyyy" class="form-control form-control-sm" value="@eachError('fecha_nacimiento', $errors)@endeachError">
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <input type="submit" name="action" value="Enviar" class=" btn btn-info btn-block rounded-0 py-2 " style="background-color: #66bb6a !important; border-color: #66bb6a !important;">
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
<br>
<script>
        function desactivar(s1){
            var cedula = document.getElementById("cedula");
            var nombre = document.getElementById("nombre");
            var apellido = document.getElementById("apellido");
            var fecha = document.getElementById("titlefecha");
            if(s1.value=='1'){
                cedula.placeholder="Nit";
                nombre.placeholder="Nombre de la empresa";
                apellido.disabled=true;
                fecha.innerHTML="Fecha de creacion";
                
            }else{
                cedula.placeholder="Cedula";
                nombre.placeholder="Nombres";
                apellido.disabled=false;
                fecha.innerHTML="Fecha nacimiento";
            }
        }
    </script>
@endsection
