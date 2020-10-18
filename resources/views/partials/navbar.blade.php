<nav id="navbar" class="navbar fixed-top navbar-expand-lg">        
    <div class="navbar-brand abs">
        <a href="{{'/'}}" style="color:#777" data-target="0">
            <img class="brand-logo" src="{{ asset('img/logo.png') }}" alt="Logo"/>
        </a>
    </div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsingNavbar">
        <i class="fas fa-bars"></i>
    </button>
    <div class="navbar-collapse collapse" id="collapsingNavbar">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('/')? 'active' : ''}}" href="/">INICIO</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('/#training')? 'active' : ''}}" href="/#training">ENTRENAMIENTO</a>
            </li>   
            <li class="nav-item">
                <a class="nav-link {{ Request::is('/#corporate')? 'active' : ''}}" href="/#corporate">SERVICIOS CORPORATE</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('/#weare')? 'active' : ''}}" href="/#weare">SOMOS</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('/entrenamientos/*')? 'active' : ''}}" href="{{route('training')}}">SERVICIOS ONLINE</a>
            </li>            
            <li class="nav-item">
                <a class="nav-link {{ Request::is('/#contact')? 'active' : ''}}" href="/#contact">CONTACTO</a>
            </li>
        </ul>
    </div>
</nav>
