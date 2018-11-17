@extends('contenedores.home')
@section('titulo','Datos requeridos')
@section('contenedor_home')
@include('error.error')
<br>
<div class="container">
        <br><h2 class="text-center">Sus Inversiones</h2> <br>            
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
              @if (empty($inversiones[0]))
                <tr>
                    <td colspan="4">
                        <br>
                        <h4 class="text-center">No hay inversiones</h4>
                        <br>
                    </td>   
                </tr>
              @else
                @foreach ($inversiones as $i)
                    <tr onclick="location.href='/solicitudes/{{$i->fk_solicitud}}';">
                        <td> {{$i->titulo}} </td>
                        <td> {{$i->estado2}} </td>
                        <td> {{$i->monto}} </td>
                        <td class="text-center"><a href="/solicitudes/{{$i->fk_solicitud}}"><i class="fas fa-plus"></i></a></td>
                    </tr>
                @endforeach
              @endif
              
            
          </tbody>
        </table>
      </div>
<br>
@endsection
