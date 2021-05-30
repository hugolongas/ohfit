<nav id="navbar" class="navbar fixed-top navbar-expand-lg">
    <div class="navbar-brand abs">
        <a href="{{ '/' }}" style="color:#777" data-target="0">
            <img class="brand-logo" src="{{ asset('img/logo.png') }}" alt="Logo" />
        </a>
    </div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsingNavbar">
        <i class="fas fa-bars"></i>
    </button>
    <div class="navbar-collapse collapse" id="collapsingNavbar">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="/">Inicio</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('servicios') ? 'active' : '' }}"
                    href="{{ route('services') }}">Servicios</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('metodo') ? 'active' : '' }}"
                    href="{{ route('method') }}">Método</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('equipo') ? 'active' : '' }}"
                    href="{{ route('team') }}">Equipo</a>
            </li>            
            <li class="nav-item">
                <a class="nav-link {{ Request::is('empresas') || Request::is('empresas') ? 'active' : '' }}"
                    href="{{ route('enterprise') }}">Wellness Empresas</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('planes') || Request::is('planes/*') ? 'active' : '' }}"
                    href="{{ route('training') }}">Planes</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('#contact') ? 'active' : '' }}" href="#contact">Contacto</a>
            </li>
        </ul>
        <div class="rrss-links">
            <a href="https://www.instagram.com/ohfitbarcelona/" class="link">
                <img src="{{ asset('img/insta_link.png') }}" />
            </a>
            <a href="https://es.linkedin.com/company/ohfitbarcelona" class="link">
                <img src="{{ asset('img/in_link.png') }}" />
            </a>
        </div>
    </div>
</nav>
