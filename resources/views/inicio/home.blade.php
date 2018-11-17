@extends('contenedores.home')
@section('titulo','Home')
@section('contenedor_home')
	
<br>
<div class="container">
    <br><h2 class="text-center">Inversiones Disponibles</h2><br>
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
    @php
        $sol=[];
    @endphp
    <div class="contenidobusqueda" id="myTable">
    @foreach ($solicitudes as $i)
        @if ($i->fk_usuario!=session('datos')['pk_usuario'])
            @php
                array_push($sol,$i);
            @endphp
        @endif
    @endforeach
    @foreach ($sol as $key => $item)
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
            </div>
        </div>
        @if (($key+1)%3 == 0 OR ($key+1) == $num)
            </div>
            <br>
        @endif
    @endforeach
</div>
</div>
</div>
<br>
@endsection