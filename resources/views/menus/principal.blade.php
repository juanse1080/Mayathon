
<nav class="navbar navbar-expand-lg navbar-dark  lead" style="background-color: #1e88e5;">
    <a class="navbar-brand" href="{{ url('/') }}">
        <i class="pacifico">My Lend</i>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item @if (Request::path()=="/") active @endif ">
          <a class="nav-link " href="{{ url('/') }}"> <i class="fas fa-home"></i> Inicio</a>
        </li>
        <li class="nav-item @if (Request::path()=="login") active @endif ">
          <a class="nav-link" href="
          @auth
            @switch(session('role'))
                @case('estudiante')
                    {{ url('/estudiantes/principal') }}" ><i class="fas fa-sign-in-alt"></i> {{ucwords(session('user')['nombre'])}}</a>
                    @break
            
                @case('administrador')
                    {{ url('/empleados/principal') }}" ><i class="fas fa-sign-in-alt"></i> {{ucwords(session('user')['nombre'])}}</a>
                    @break

                @case('profesor')
                    {{ url('/empleados/principal') }}" ><i class="fas fa-sign-in-alt"></i> {{ucwords(session('user')['nombre'])}}</a>
                    @break
                @default
                    {{ url('/login') }}"> <i class="fas fa-sign-in-alt"></i> Login </a>
                @endswitch
          @endauth
          @guest
            {{ url('/login') }}"> <i class="fas fa-sign-in-alt"></i> Login </a>
          @endguest
        </li>
      </ul>
    </div>
  </nav>
