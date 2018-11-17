@extends('contenedores.home')
@section('titulo','Solicitud')
@section('contenedor_home')
@include('error.error')


<style>
    /* Make the image fully responsive */
    .carousel-inner img {
        width: 100%;
        /* height: 100%; */
    }
</style> 

@if (count($fotos)>0)
    <div id="demo" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ul class="carousel-indicators">
            @for ($i = 0; $i < count($fotos); $i++)
                <li data-target="#demo" data-slide-to="$i" {{($i==0)?"class='active'":""}}></li>
            @endfor
        </ul>

        <!-- The slideshow -->
        <div class="carousel-inner">
            @foreach ( $fotos as $i=>$m )
            <div class=" carousel-item {{($i==0)?'active':''}}">
                <img src="{{asset($m->url)}}" alt=""  height="500">
                <div class="carousel-caption " style="padding-left:15px;background-color:black;opacity: 0.5;border-radius:10px;">
                    Descripción: {{$m->descripcion}}
                </div>

            </div>
            @endforeach
        </div>
        
        <!-- Left and right controls -->
        <a class="carousel-control-prev" href="#demo" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#demo" data-slide="next">
            <span class="carousel-control-next-icon"></span>
        </a>

    </div>
@endif
<br>
<div class="container">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
                <br><h2 class="text-center">Solicitud "{{$solicitud->titulo}}"</h2> <br>
                <div class="card mx-auto border-dark bg-light" style=" border-color:#66bb6a !important;">
                    <div class="card-header" style="background-color:#66ba6a7d !important;">
                        <div class="row">
                            <div class="col-md-8 bottom-aligned">
                                    <h5>Monto recaudado</h5>
                            </div>
                            <div class="col-md-4">
                                    <form enctype="multipart/form-data" action="{{ url('/inversiones/crear') }}" method = "POST">
                                        @csrf
                                        @method("GET")
                                        <div class="card border-primary rounded-0" style="border-color:#66bb6a !important;">
                                        <input type="number" name="fk_solicitud" id="fk_solicitud" value="{{$solicitud->pk_solicitud}}" hidden>
                                            <div class="text-center">
                                                <input type="submit" id="submitbtn" name="action" value="Invertir" class=" btn btn-info btn-block rounded-0 py-2 " style="background-color: #2c652f !important; border-color: #66bb6a !important;">
                                            </div>
                                        </div>
                                    </form>
                            </div>
                        </div>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item" style="border-top-color: #66bb6a !important; border-bottom-color: #66bb6a !important;">
                            Barra de progreso:
                            <h5 class="card-title text-center">
                                <div class="progress">
                                    <div class="progress-bar" style="width:{{($solicitud->monto_juntado/$solicitud->monto_requerido)*100}}%">{{($solicitud->monto_juntado/$solicitud->monto_requerido)*100}}%</div>
                                </div>
                            </h5>
                            <small>
                                Recaudado: {{$solicitud->monto_juntado}} <br>
                                Requerido: {{$solicitud->monto_requerido}} 
                            </small><br>
                        </li>
                        <li class="list-group-item" style="border-top-color: #66bb6a !important; border-bottom-color: #66bb6a !important;">
                            
                            <b>Cierre de recaudacion:</b> {{$solicitud->tiempo_recaudacion}} 
                            <br>
                            <b>Riesgo:</b> {{$solicitud->riesgo}}%
                            <br>
                            <b>Interes de devolucion:</b> {{$solicitud->interes}}%
                            <br>
                            <b>Tiempo aproximado de devolucion:</b> {{$solicitud->tiempo_devolucion}} Meses
                            <br>
                            <b>Categoria:</b> {{ucwords($solicitud->categoria)}}
                            <br>
                            <b>Descripción:</b>
                            {{$solicitud->descripcion}}
                            <br>
                            @if (count($videos)>0)
                                <b>Videos explicativos:</b><br>
                                @foreach ($videos as $m)
                                    {{$m->descripcion}} 
                                    <iframe  id="videoSalida" width="642" height="361" src="https://www.youtube.com/embed/{{$m->url}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe><br>
                                @endforeach
                            @endif
                        </li>
                    </ul>
                </div>
                <br>
                
        </div>
    </div>
</div>
<br>
@endsection
