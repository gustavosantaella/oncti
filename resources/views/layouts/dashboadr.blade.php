<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Panel de control - ONCTI</title>
    <link href="{{ asset('css/css-template-bootstrap/style.css') }}" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    @yield('css')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
</head>
<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand" href="{{route('welcome')}}">Panel de control </a>
        <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
               <!-- <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
                    </div>
                </div>-->
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="#">{{ Auth::user()->username }}</a>

                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('logout') }}">Cerrar sesión</a>
                    </div>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="{{ route('welcome') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Interfaces</div>

                            @if (Auth::user()->can('crear noticia')  ||
                             Auth::user()->can('listar noticias')    ||
                             Auth::user()->can('eliminar noticia')  || 
                             Auth::user()->can('modificar noticia') || 
                             Auth::user()->can('ver noticia'))
                             <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#noticias" aria-expanded="false" aria-controls="noticias">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Noticias oncti
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="noticias" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                   @can('crear noticia')
                                   <a class="nav-link" href="{{ route('noticia.crear') }}">Agregar noticias</a>

                                   @endcan
                                   @if (
                                    Auth::user()->can('listar noticias')   ||
                                    Auth::user()->can('eliminar noticia')  || 
                                    Auth::user()->can('modificar noticia') || 
                                    Auth::user()->can('ver noticia'))
                                    <a class="nav-link" href="{{ route('noticias.listar') }}">Listar noticias</a>
                                    @endif
                                </nav>
                            </div>
                            @endif


                            @role('TIC')
                            <a class="nav-link collapsed"  href="{{ route('crear.permisos') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Permisos

                            </a>
                            @endrole

                            @if (
                                Auth::user()->can('crear rol')   ||
                                Auth::user()->can('eliminar rol')  || 
                                Auth::user()->can('modificar rol') || 
                                Auth::user()->can('ver rol')
                                )
                                <a class="nav-link collapsed"  href="{{ route('crear.rol') }}">
                                    <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                    Roles

                                </a>
                                @endif


                                @if (
                                    Auth::user()->can('crear usuario')   ||
                                    Auth::user()->can('eliminar usuario')  || 
                                    Auth::user()->can('modificar usuario') || 
                                    Auth::user()->can('listar usuarios')
                                    )
                                    <a class="nav-link collapsed"  href="{{ route('listar.users') }}">
                                        <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                                        Usuarios

                                    </a>

                                    @endif
                            {{-- <div class="sb-sidenav-menu-heading">Addons</div>
                            <a class="nav-link" href="charts.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Charts
                            </a>
                            <a class="nav-link" href="tables.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Tables
                            </a> --}}
                        </div>
                    </div>
                    
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid p-3">
                        @yield('content')
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Panel de control - Oncti {{ date('Y') }}</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="{{ asset('js/js-template-bootstrap/scripts.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
   <!--     <script src="{{ asset('js/js-template-bootstrap/charts/chart-area-demo.js') }}"></script>
    <script src="{{ asset('js/js-template-bootstrap/charts/chart-bar-demo.js') }}"></script>-->
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    
    @yield('scripts')
</body>
</html>
