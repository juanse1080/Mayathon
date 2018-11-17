@extends('contenedores.home')
@section('titulo','Home')
@section('contenedor_home')
    <br>
    <div class="container">
        <br><h2 class="text-center">Sus Solicitudes</h2> <br>  
        <div class="row">
            @csrf
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
                        <a class="btn btn-success" href="{{url('/solicitudes/crear') }}" role="button">Nueva Solicitud</a>
                        
                    
          </div><br>
          <div class="contenidobusqueda" id="myTable">
        @foreach ($solicitudes as $key => $item)
            @if ($key%3 == 0)
                <div class="card-deck" >
            @endif
            <div class="card">
                @if (!isset($fotos[$key][0]))
                    @php
                        $url = asset('/storage/default.jpeg');
                    @endphp
                @else
                    @php
                        $url = asset($fotos[$key][0]->url)
                    @endphp
                @endif
                <img class="card-img-top" src="{{$url}}" alt="Card image" style="width:100%">
                <div class="card-body">
                    <h4 class="card-title">{{$item->titulo}}</h4>
                    <p class="card-text">
                        @php
                          $n = 40;
                          $des = '';
                        @endphp
                        @if (strlen($item->descripcion) < $n)
                            @php
                                $n = strlen($item->descripcion);
                            @endphp
                        @endif
                        @for ($i = 0; $i < $n; $i++)
                            @php
                                $des .= $item->descripcion[$i]
                            @endphp
                        @endfor
                        {{$des}}
                    </p>
                    <a href="{{route('solicitudes.show',$item->pk_solicitud)}}" class="btn btn-primary">ver mas</a>
                    @if ($item->estado=='e')
                        <button type="button" identificador="{{$item->pk_solicitud}}" id="g{{$item->pk_solicitud}}" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
                            Responder
                          </button>
                    @endif
                    
                          
                          <!-- Modal -->
                          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Información Importante!</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  Lo sentimos pero su solicitud ha completado con el tiempo requerido ({{$item->tiempo_recaudacion}}) sin alcanzar
                                  el monto deseado, pero no te preocupes si deseas aceptar ${{$item->monto_juntado}},
                                  solo tienes que dar clic el boton aceptar de lo contrario, rechazalos.
                                </div>
                                <div class="modal-footer">
                                  <button type="button" respuesta ="r" class="clos btn btn-secondary" data-dismiss="modal">Rechazarlos</button>
                                  <button type="button" identificador="{{$item->pk_solicitud}}" respuesta ="a" class="clos btn btn-primary" data-dismiss="modal">Aceptarlos</button>
                                </div>
                              </div>
                            </div>
                          </div>
                </div>
            </div>
            @if (($key+1)%3 == 0 OR ($key+1) == $num)
                </div>
                <br>
            @endif
        @endforeach
    </div>
</div>
<script>
    $(document).ready(function(){
        $('.btn-danger').click(function(){
            var id = $(this).attr('identificador');
            var h = $(this);
            $('.clos').click(function(){
                var respuesta = $(this).attr('respuesta');
                update('aceptar', id, respuesta, h);
            });
        });
    });
</script>
@endsection

{{-- {{asset($solicitudes->)}} --}}