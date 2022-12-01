<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Escritorio - Start Bootstrap Theme</title>
        <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:500,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Muli:400,400i,800,800i" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet" />
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">
            <a class="navbar-brand js-scroll-trigger" href="#page-top">
                <span class="d-block d-lg-none">Clarence Taylor</span>
                <span class="d-none d-lg-block"><img class="img-fluid img-profile rounded-circle mx-auto mb-2" src="assets/img/profile.jpg" alt="..." /></span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                @if(Auth::user())
                    <ul class="navbar-nav">
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#perfil">{{ Auth()->user()->name }}</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#productos">Productos</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#compras">Compras</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#facturas">Facturas</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link js-scroll-trigger" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                Cerrar Sesión
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                @else
                    <ul class="navbar-nav">
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#about">Acerca de</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#experience">Experiencia</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#education">Educación</a></li>
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="#login">Iniciar Sesión</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="#register">Registrar</a>
                            </li>
                        @endif
                    </ul>
                @endif
            </div>
        </nav>
        <main class="py-4">
            @yield('content')
        </main>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="{{ asset('assets/js/scripts.js') }}"></script>
    </body>
</html>
