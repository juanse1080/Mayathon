<!-- Menu principal para el usuario-->
<nav class="navbar navbar-expand-lg navbar-dark  lead" style="background-color: #1e88e5;">
        <a class="navbar-brand" href="{{ url('/') }}">
            <i class="pacifico">My Lend</i>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item @if (Request::path()=="home") active @endif ">
                    <a class="nav-link " href="{{ url('/home') }}"> <i class="fas fa-handshake"></i> Dashboard</a>
                </li>
                <li class="nav-item @if (Request::path()=="solicitudes") active @endif"><a class="nav-link" href="{{ url('/solicitudes') }}"><i class="fas fa-hand-holding-usd"></i> Mis Solicitudes</a></li>
                <li class="nav-item @if (Request::path()=="inversiones") active @endif"><a class="nav-link" href="{{ url('/inversiones') }}"><i class="fas fa-money-bill-wave"></i> Mis Inversiones</a></li>

                <li class="nav-item"><a class="nav-link" href="#"><i class="fas fa-bell"></i> Notificaciones </a></li>
                
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/logout') }}"> <i class="fas fa-sign-out-alt"></i> Salir </a>
                </li>
            </ul>
        </div>
</nav>
