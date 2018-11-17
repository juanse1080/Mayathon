@extends('contenedores.home')
@section('titulo','Datos requeridos')
@section('contenedor_home')
@include('error.error')
<br>
<div class="container">
        <br><h2 class="text-center">Sus inversiones</h2> <br>            
        <table class="table table-striped">
          <thead>
            <tr>
              <th>Titulo solicitud</th>
              <th>Estado solicitud</th>
              <th>Monto invertido</th>
              <th class="text-center">Acciones</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($inversiones as $i)
                <tr onclick="location.href='/solicitudes/{{$i->fk_solicitud}}';">
                    <td> {{$i->titulo}} </td>
                    <td> {{$i->estado2}} </td>
                    <td> {{$i->monto}} </td>
                    <td class="text-center"><a href="/solicitudes/{{$i->fk_solicitud}}"><i class="fas fa-plus"></i></a></td>
                </tr>
              @endforeach
            
          </tbody>
        </table>
      </div>
<br>
@endsection