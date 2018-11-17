@extends('contenedores.home')
@section('titulo','Home')
@section('contenedor_home')
    <br>
    <div class="container">
        @foreach ($solicitudes as $key => $item)
            @if ($key%3 == 0)
                <div class="card-deck" >
            @endif
            <div class="card">
                @if ($item->)
                    
                @endif
                <img class="card-img-top" src="" alt="Card image" style="width:100%">
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
                    <a href="{{route('solicitudes.show',$item->pk_solicitud)}}" class="btn btn-primary">See Profile</a>
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