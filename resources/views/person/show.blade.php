@extends('layouts.main')

@section('title', $person->fullName)
@section('type', 'profile-page sidebar-collapse')

@section('content')
    <div class="page-header header-filter" data-parallax="true" style=" background-image: url('../assets/img/kit/cita.jpg'); "></div>
    <div class="main main-raised">
        <div class="profile-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 ml-auto mr-auto">
                        <div class="profile">
                            <div class="avatar">
                                <img id="photo" src="http://148.202.89.11/spec/Fotos/{{ $person->fullName }}.jpg"
                                     onerror="this.src='{{ asset('assets/img/blank_user.png') }}';"
                                     class="img-raised rounded-circle img-fluid"
                                     style="object-fit: cover; object-position: center; height: 160px; width: 160px">
                            </div>
                            <div class="name">
                                <h3 class="title">{{ $person->fullName }}</h3>
                                <h6>{{ $person->personalData->career->carrera }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="features">
                    <div class="row">
                        <div class="col-md-7">
                            <div class="info">
                                <div class="icon icon-info text-center">
                                    <i class="material-icons">person</i>
                                </div>
                                <h4 class="info-title text-center">Información del alumno:</h4>
                                <h6>Fecha de nacimiento:</h6>
                                <p>
                                    {{ $person->fec_nac }}
                                </p>
                                <h6>Estado civil:</h6>
                                <p>
                                    {{ $person->personalData->estado_civil }}
                                </p>
                                <h6>Actividad económica:</h6>
                                <p>
                                    {{ $person->personalData->actividad_economica }}
                                </p>
                                <h6>Sexo:</h6>
                                <p>
                                    {{ $person->sexo }}
                                </p>
                                <h6>Religión:</h6>
                                <p>
                                    {{ $person->personalData->religion }}
                                </p>
                                <h6>Escolaridad:</h6>
                                <p>
                                    {{ $person->personalData->escolaridad }}
                                </p>
                                <h6>Tipo:</h6>
                                <p>
                                    {{ $person->getTipoName() }}
                                </p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="info">
                                <div class="icon icon-success text-center">
                                    <i class="material-icons">location_city</i>
                                </div>
                                <h4 class="info-title text-center">Localicación y contacto</h4>
                                <h6>Lugar de nacimiento:</h6>
                                <p>
                                    {{ $person->personalData->lug_nac }}
                                </p>
                                <h6>Lugar de nacimiento:</h6>
                                <p>
                                    {{ $person->personalData->lug_res }}
                                </p>
                                <h6>Domicilio:</h6>
                                <p>
                                    {{ $person->personalData->domicilio }}
                                </p>
                                <h6>Teléfono:</h6>
                                <p>
                                    {{ $person->personalData->telefono }}
                                </p>
                                <h6>Correo eléctronico:</h6>
                                <p>
                                    {{ $person->personalData->email }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="description text-center">
                    <p>
                        <a href="{{ route('student.edit', $person->codigo) }}">
                            <button type="button" data-toggle="tooltip" data-placement="top" class="btn btn-success" title="Editar">
                                <i class="material-icons">edit</i>
                            </button>
                        </a>
                    </p>
                </div>
                <br>
            </div>
        </div>
    </div>
@stop