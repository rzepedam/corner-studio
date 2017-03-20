<div class="sidebar-collapse">
    <ul class="nav metismenu" id="side-menu">
        <li class="nav-header">
            <div class="dropdown profile-element">
                <span>
                    <img alt="image" class="img-circle" src="{{ asset('img/profile_small.jpg') }}" />
                </span>
                <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                    <span class="clear">
                        <span class="block m-t-xs">
                            <strong class="font-bold">David Williams</strong>
                        </span>
                        <span class="text-muted text-xs block">Art Director <b class="caret"></b></span>
                    </span>
                </a>
                <ul class="dropdown-menu animated fadeInRight m-t-xs">
                    <li><a href="javascript:void(0)">Editar Perfil</a></li>
                    <li><a href="javascript:void(0)">Cerrar Sesión</a></li>
                </ul>
            </div>
            <div class="logo-element">
                CS+
            </div>
        </li>
        <li class="{{ Request::is('clients') ? 'active' : '' }}">
            <a href="{{ route('clients.index') }}">
                <i class="mdi mdi-account-multiple" aria-hidden="true"></i> <span class="nav-label">Clientes</span>
            </a>
        </li>
        <li class="{{ Request::is('professionals') ? 'active' : '' }}">
            <a href="javascript:void(0)">
                <i class="mdi mdi-worker" aria-hidden="true"></i> <span class="nav-label">Profesionales</span>
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
        <li class="{{ Request::is('incomes') ? 'active' : '' }}">
            <a href="javascript:void(0)">
                <i class="mdi mdi-chart-areaspline" aria-hidden="true"></i> <span class="nav-label">Ingresos</span>
            </a>
        </li>
    </ul>
</div>