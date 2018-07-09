@extends('layouts.main')

@section('title', $client->name)
@section('type', 'profile-page sidebar-collapse')

@section('content')
    <div id="top" class="page-header header-filter" data-parallax="true" style=" background-image: url({{URL::asset('assets/img/kit/cita2.jpg')}}); ">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h1 class="title">{{ $client->name }}</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="main main-raised">
        <div class="container">
            <div class="section text-center">
                <div class="features">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="info">
                                <div class="icon icon-info text-center">
                                    <i class="material-icons">code</i>
                                </div>
                                <h4 class="info-title text-center">Información del alumno:</h4>
                                <h6>Fecha de nacimiento:</h6>
                                <p>
                                    {{ $client->redirect }}
                                </p>
                                <h6>Estado civil:</h6>
                                <p>
                                    {{ $client->secret }}
                                </p>
                                <h6>Actividad económica:</h6>
                                <p>

                                </p>
                                <h6>Sexo:</h6>
                                <p>

                                </p>
                                <h6>Religión:</h6>
                                <p>

                                </p>
                                <h6>Escolaridad:</h6>
                                <p>

                                </p>
                                <h6>Tipo:</h6>
                                <p>

                                </p>
                            </div>
                        </div>
                        <!--div class="col-md-4">
                            <div class="info">
                                <div class="icon icon-success text-center">
                                    <i class="material-icons">location_city</i>
                                </div>
                                <h4 class="info-title text-center">Localicación y contacto</h4>
                                <h6>Lugar de nacimiento:</h6>
                                <p>

                                </p>
                                <h6>Lugar de nacimiento:</h6>
                                <p>

                                </p>
                                <h6>Domicilio:</h6>
                                <p>

                                </p>
                                <h6>Teléfono:</h6>
                                <p>

                                </p>
                                <h6>Correo eléctronico:</h6>
                                <p>

                                </p>
                            </div>
                        </div-->
                    </div>
                </div>
                <div class="description text-center">
                    <p>
                        <a href="{{ route('student.edit', $client->id) }}">
                            <button type="button" data-toggle="tooltip" data-placement="top" class="btn btn-success" title="Editar">
                                <i class="material-icons">edit</i>
                            </button>
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
@stop