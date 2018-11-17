@extends('contenedores.home')
@section('titulo','Datos requeridos')
@section('contenedor_home')
@include('error.error')
<br>
<div class="container">
        <br><h2 class="text-center">Sus Inversiones</h2> <br>   
        <div class="row">
						{{-- filtro --}}
						<div class="col-md-4"></div>
                        <div class="col-md-4">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <span class= "input-group-text">
                                        <i class="fas fa-filter"></i>
                                    </span>
                                </div>
                                <input type="text" class="form-control form-control-sm"  id="entradafilter" name="titulo" placeholder="Filtrar Resultados" >
                            </div>
						</div>
          </div>      
          <br>
        <table class="table table-striped">
          <thead>
            <tr>
              <th>Titulo solicitud</th>
              <th>Estado solicitud</th>
              <th>Monto invertido</th>
              <th class="text-center">Acciones</th>
            </tr>
          </thead>
          <tbody class="contenidobusqueda" id="myTable">
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
