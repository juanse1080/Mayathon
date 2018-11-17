@extends('contenedores.principal')
@section('titulo','Pagina Principal')
@section('contenedor_principal')
		
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                 <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                  </ol>
                <div class="carousel-inner" role="listbox">
                <div class="carousel-item active">
                <img class="d-block img-fluid w-100" src="css/img/s1.jpg" alt="First slide">
                {{-- <div class="carousel-caption d-none d-md-block">
                    <div class="banner-text">
                        <h2>This is Heaven</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation</p>
                    </div>	
                </div> --}}
                </div>
                <div class="carousel-item">
                <img class="d-block img-fluid w-100" src="css/img/s2.jpg" alt="Second slide">
                {{-- <div class="carousel-caption d-none d-md-block">
                    <div class="banner-text">
                        <h2>This is Heaven</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation</p>
                    </div>	
                </div> --}}
                </div>
                <div class="carousel-item">
                    <img class="d-block img-fluid w-100" src="css/img/s3.jpg" alt="First slide">
                    {{-- <div class="carousel-caption d-none d-md-block">
                        <div class="banner-text">
                            <h2>This is Heaven</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation</p>
                        </div>	
                    </div> --}}
                </div>
                <div class="carousel-item">
                    <img class="d-block img-fluid w-100" src="css/img/s4.jpg" alt="First slide">
                    {{-- <div class="carousel-caption d-none d-md-block">
                        <div class="banner-text">
                            <h2>This is Heaven</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation</p>
                        </div>	
                    </div> --}}
                </div>




            </div>
            </div>

@endsection