<nav class="main-header navbar navbar-expand navbar-dark text-sm" style="background-color: goldenrod !important;"> {{-- navbar-blue --}}

    <ul class="navbar-nav">

        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>

    </ul>
    
    <ul class="navbar-nav ml-auto">
        
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
    
        <li class="nav-item">
            <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                <i class="fas fa-th-large"></i>
            </a>
        </li>
    
        @canany(['Administrador do Sistema'])
            <x-Atendimento.Agendamento.Notificacoes />
        @endcanany

        <li class="nav-item dropdown user-menu">
            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" id="nav-link-menu-user" role="button" aria-expanded="false">
                <img src="{{ auth()->user()->src_foto ?? null }}" class="user-image img-circle elevation-2">
            </a>
            <ul class="dropdown-menu-lg dropdown-menu dropdown-menu-end" aria-labelledby="nav-link-menu-user">
                <li class="user-header">
                    <img src="{{ auth()->user()->src_foto ?? null }}" class="img-circle elevation-2 d-inline">
                    <p class="">{{ auth()->user()->apelido ?? "NULO"}}<small>{{ auth()->user()->nome ?? "NULO" }}</small></p>
                </li>
                <li class="user-footer">
                    <a href="{{ route('profile.show') }}" class="btn btn-default btn-flat"><i class="fas fa-user"></i> Perfil</a>
                    <a class="btn btn-default btn-flat float-right " href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-fw fa-power-off"></i>Sair</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
                </li>
            </ul>
        </li>

    </ul>

</nav>
