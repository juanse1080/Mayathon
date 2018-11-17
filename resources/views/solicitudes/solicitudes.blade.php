@extends('contenedores.home')
@section('titulo','Home')
@section('contenedor_home')
    <br>
    <div class="container">
        <br><h2 class="text-center">Sus Solicitudes</h2> <br>  
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
                        @endphp
                        @if (strlen($item->descripcion) < $n)
                            @php
                                $n = strlen($item->descripcion);
                                $des = '';
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
@endsection

{{-- {{asset($solicitudes->)}} --}}