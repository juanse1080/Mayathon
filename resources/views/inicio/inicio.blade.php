@extends('contenedores.principal')
@section('titulo','Pagina Principal')
@section('contenedor_principal')
		
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                 <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                  </ol>
                <div class="carousel-inner" role="listbox">
                <div class="carousel-item active">
                    <i class="op text-center">Plataforma de CrowdLending</i>
                    <img class="d-block img-fluid mx-auto mt-3" src="css/img/s1.png" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block img-fluid w-100" src="css/img/s1.png" alt="Second slide">

                </div>
                </div>

            </div>
            </div>

@endsection