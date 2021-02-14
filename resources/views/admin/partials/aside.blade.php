<ul class="nav flex-column sidebar-menu">
    @if(Auth::user()->checkRoles("admin"))
    <li class="nav-item {{ request()->is('/')? 'active' : ''}}">
        <a class="nav-link" href="{{url('')}}">            
            <div class="aside-item">General</div>
        </a>
    </li>    
    @endif
    @if(Auth::user()->checkRoles("admin"))
    <li class="nav-item {{ request()->is('entrenamientos')? 'active' : ''}}">        
        <a class="nav-link" href="{{url('entrenamientos')}}">            
            <div class="aside-item">Entrenamientos</div>
        </a>
    </li>
    @endif
    @if(Auth::user()->checkRoles("admin"))
    <li class="nav-item {{ request()->is('opiniones')? 'active' : ''}}">        
        <a class="nav-link" href="{{url('opiniones')}}">            
            <div class="aside-item">Opiniones</div>
        </a>
    </li>
    @endif
    @if(Auth::user()->checkRoles("admin"))
    <li class="nav-item {{ request()->is('colaboradores')? 'active' : ''}}">        
        <a class="nav-link" href="{{url('colaboradores')}}">            
            <div class="aside-item">Colaboradores</div>
        </a>
    </li>
    @endif
    @if(Auth::user()->checkRoles(array("vivagym","admin")))
    <li class="nav-item {{ request()->is('solicitudes')? 'active' : ''}}">        
        <a class="nav-link" href="{{url('solicitudes')}}">            
            <div class="aside-item">Solicitudes</div>
        </a>
    </li>
    @endif
</ul>