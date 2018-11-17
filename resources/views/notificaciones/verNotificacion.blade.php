@extends('contenedores.home')
@section('titulo','Notificaciones')
@section('contenedor_home')
@include('error.error')
{{-- {{$notificaciones}}
{{$num}} --}}
<div class="container mt-3">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <br><h2 class="text-center">Sus Notificaciones</h2> <br>  
            @if (!empty($notificaciones))
                @foreach ($notificaciones as $i => $noti)
                    @if ($noti->estado==0)
                        <div class="card mt-3">
                            <div class="card-header">
                                Notificacion #{{$noti->pk_notificacion}}
                                <button form="estado" type="button" class="close" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                </button>
                                
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">{{$noti->titulo}}</h5>
                                <p class="card-text">{{$noti->descripcion}}</p>
                                <a href="{{$noti->url}}" class="btn btn-primary">Continuar</a>
                            </div>
                        </div>
                    @endif
                @endforeach
            @else
            <div class="card">
                    <div class="card-header">
                      Información
                    </div>
                    <div class="card-body">
                      <blockquote class="blockquote mb-0">
                        <p>Lo sentimos, actualmente no tienes notificaciones nuevas</p>
                        <footer class="blockquote-footer">CEIS_UIS</footer>
                      </blockquote>
                    </div>
                  </div>
            @endif
            
            </div>
    </div>
</div>
@endsection