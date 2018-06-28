<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Favicons -->
    <link rel="apple-touch-icon" href="{{ asset('../img/kit/free/apple-icon.png') }}">
    <link rel="icon" href="{{ asset('../img/kit/free/favicon.png') }}">
    <title>
        @yield('title') &#45; SICE CUValles
    </title>
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <link rel="stylesheet" href="{{ asset('assets/css/material-kit.css?v=2.0.2') }}">
    <script src="{{ asset("assets/js/core/jquery.min.js") }}"></script>
    <script src="{{ asset("assets/js/plugins/moment.min.js") }}"></script>
    <script src="{{ asset("assets/js/plugins/transition.js") }}"></script>
    <script src="{{ asset("assets/js/plugins/collapse.js") }}"></script>
    <script src="{{ asset("assets/js/plugins/nouislider.min.js") }}"></script>
    <script src="{{ asset("assets/js/plugins/bootstrap-datetimepicker.min.js") }}"></script>
    <script src="https://unpkg.com/sweetalert2@7.22.2/dist/sweetalert2.all.js"></script>
    <script src="{{ asset('assets/js/messages.js') }}"></script>
</head>

<body class="@yield('type') ">
<nav class="navbar navbar-color-on-scroll navbar-transparent fixed-top navbar-expand-lg bg-dark" color-on-scroll="100" id="sectionsNav">
    <div class="container">
        <div class="navbar-translate">
            <a class="navbar-brand" href="{{ route('index') }}">SICE CUValles </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                <span class="navbar-toggler-icon"></span>
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ml-auto">
                @if(auth()->guest())
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">
                        <i class="material-icons">input</i> Ingresar
                    </a>
                </li>
                @else
                <li class="dropdown nav-item">
                    <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                        <i class="material-icons">supervisor_account</i> Alumnos
                    </a>
                    <div class="dropdown-menu dropdown-with-icons">
                        <a href="{{ route('student.create') }}" class="dropdown-item">
                            <i class="material-icons">person_add</i> Registrar
                        </a>
                        <a href="{{ route('student.import') }}" class="dropdown-item">
                            <i class="material-icons">cloud_upload</i> Importar
                        </a>
                        <a href="{{ route('student.index') }}" class="dropdown-item">
                            <i class="material-icons">list</i> Consultar
                        </a>
                    </div>
                </li>
                <li class="dropdown nav-item">
                    <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                        <i class="material-icons">supervised_user_circle</i> Usuarios
                    </a>
                    <div class="dropdown-menu dropdown-with-icons">
                        <a href="{{ route('register') }}" class="dropdown-item">
                            <i class="material-icons">person_add</i> Registrar
                        </a>
                        <a href="{{ route('user.index') }}" class="dropdown-item">
                            <i class="material-icons">list</i> Consultar
                        </a>
                    </div>
                </li>
                <li class="dropdown nav-item">
                    <a href="#pablo" class="profile-photo dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false">
                        <div class="profile-photo-small">
                            <img src="http://www.cuvalles.udg.mx/spec/Fotos/{{ auth()->user()->name }}.jpg"
                                 onerror="this.src='{{ asset('assets/img/blank_user.png') }}';"
                                 style="object-fit: cover; object-position: center; height: 40px; width: 40px"
                                 alt="Circle Image" class="rounded-circle img-fluid">
                        </div>
                        <div class="ripple-container">

                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <h6 class="dropdown-header">{{ auth()->user()->name }}</h6>
                        <a href="{{ route('user.show', auth()->id()) }}" class="dropdown-item">Mi perfil</a>
                        <a href="{{ route('logout') }}" class="dropdown-item">Cerrar sesión</a>
                    </div>
                </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
@yield('content')
<footer class="footer ">
    <div class="container">
        <nav class="pull-left">
            <ul>
                <li>
                    <a href="https://www.creative-tim.com">
                        Creative Tim
                    </a>
                </li>
                <li>
                    <a href="http://presentation.creative-tim.com">
                        About Us
                    </a>
                </li>
                <li>
                    <a href="http://blog.creative-tim.com">
                        Blog
                    </a>
                </li>
                <li>
                    <a href="https://www.creative-tim.com/license">
                        Licenses
                    </a>
                </li>
            </ul>
        </nav>
        <div class="copyright pull-right">
            &copy; {{ \Carbon\Carbon::make(\Carbon\Carbon::now())->format('Y') }} Universidad de Guadalajara. Todos los derechos reservados.
        </div>
    </div>
</footer>
@include('sweetalert::alert')
<!--   Core JS Files   -->
<script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap-material-design.js') }}"></script>
<!--  Plugin for Date Time Picker and Full Calendar Plugin  -->
<script src="{{ asset('assets/js/plugins/moment.min.js') }}"></script>
<!--	Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
<script src="{{ asset('assets/js/plugins/bootstrap-datetimepicker.min.js') }}"></script>
<!--	Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
<script src="{{ asset('assets/js/plugins/nouislider.min.js') }}"></script>
<!-- Material Kit Core initialisations of plugins and Bootstrap Material Design Library -->
<script src="{{ asset('assets/js/material-kit.js?v=2.0.2')}} "></script>
</body>
</html>