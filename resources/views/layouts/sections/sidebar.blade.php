<div class="sidebar-collapse">
    <ul class="nav metismenu" id="side-menu">
        <li class="nav-header">
            <div class="dropdown profile-element">
                <span>
                    <img alt="image" class="img-circle img-md" src="{{ asset(auth()->user()->avatar) }}" />
                </span>
                <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                    <span class="clear">
                        <span class="block m-t-xs">
                            <strong class="font-bold">{{ auth()->user()->full_name }}</strong>
                        </span>
                        <span class="text-muted text-xs block">Art Director <b class="caret"></b></span>
                    </span>
                </a>
                <ul class="dropdown-menu animated fadeInRight m-t-xs">
                    <li><a href="{{ route('users.edit', auth()->id()) }}">Editar Perfil</a></li>
                </ul>
            </div>
            <div class="logo-element">
                <img alt="Corner-Studio" style="width: 20px; height: 15px;" class="img-circle" src="{{ asset('img/logo.png') }}" />
            </div>
        </li>
        <li class="{{ Request::is('/') ? 'active' : '' }}">
            <a href="{{ route('home') }}">
                <i class="mdi mdi-home" aria-hidden="true"></i> <span class="nav-label">Inicio</span>
            </a>
        </li>
        <li class="{{ Request::is('clients') ? 'active' : '' }}">
            <a href="{{ route('clients.index') }}">
                <i class="mdi mdi-account-multiple" aria-hidden="true"></i> <span class="nav-label">Clientes</span>
            </a>
        </li>
        <li class="{{ Request::is('professionals') ? 'active' : '' }}">
            <a href="{{ route('professionals.index') }}">
                <i class="mdi mdi-human-greeting" aria-hidden="true"></i> <span class="nav-label">Profesionales</span>
            </a>
        </li>
        <li class="{{ (Request::is('assistances') ? 'active' : '') }}">
            <a href="{{ url('/assistances') }}">
                <i class="fa fa-pencil-square-o" aria-hidden="true"></i> <span class="nav-label">Registro de Asistencia</span>
            </a>
        </li>
        <li class="{{ Request::is('activities') ? 'active' : '' }}">
            <a href="{{ route('activities.index') }}">
                <i class="mdi mdi-bike" aria-hidden="true"></i> <span class="nav-label">Actividades</span>
            </a>
        </li>
        <li class="{{ Request::is('subscriptions') ? 'active' : '' }}">
            <a href="{{ route('subscriptions.index') }}">
                <i class="mdi mdi-wallet-membership" aria-hidden="true"></i> <span class="nav-label">Suscripciones</span>
            </a>
        </li>
        <li class="{{ Request::is('schedules') ? 'active' : '' }}">
            <a href="{{ route('schedules.index') }}">
                <i class="mdi mdi-calendar-text" aria-hidden="true"></i> <span class="nav-label">Calendario</span>
            </a>
        </li>
        <li class="{{ Request::is('incomes') ? 'active' : '' }}">
            <a href="{{ route('incomes') }}">
                <i class="mdi mdi-chart-areaspline" aria-hidden="true"></i> <span class="nav-label">Ingresos</span>
            </a>
        </li>
        <li class="{{ Request::is('users') ? 'active' : '' }}">
            <a href="{{ route('users.index') }}">
                <i class="mdi mdi-face" aria-hidden="true"></i> <span class="nav-label">Usuarios</span>
            </a>
        </li>
        @if (auth()->user()->is_admin)
            <li class="{{ (Request::is('biometries') ? 'active' : '') }}">
                <a href="{{ url('/biometries') }}">
                    <i class="fa fa-tablet" aria-hidden="true"></i> <span class="nav-label">Biometry</span>
                </a>
            </li>
        @endif
    </ul>
</div>