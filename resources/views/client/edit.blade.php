@extends('layouts.main')

@section('title', $person->fullName)
@section('type', 'profile-page sidebar-collapse')

@section('content')
    <div class="page-header header-filter" data-parallax="true" style=" background-image: url('{{ asset('assets/img/kit/cita.jpg') }}'); "></div>
    <div class="main main-raised">
        <div class="profile-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 ml-auto mr-auto">
                        <div class="profile">
                            <div class="avatar">
                                <img id="photo" src="http://148.202.89.11/spec/Fotos/{{ strtoupper($person->fullName) }}.jpg"
                                     onerror="this.src='{{ asset('assets/img/blank_user.png') }}';"
                                     class="img-raised rounded-circle img-fluid"
                                     style="object-fit: cover; object-position: center; height: 160px; width: 160px">
                            </div>
                            <div class="name">
                                <h3 class="title">{{ $person->fullName }}</h3>
                                <h6>{{ $person->personalData->career->carrera }}</h6>
                                @foreach ($errors->all() as $error)
                                    <div>{{ $error }}</div>
                                @endforeach
                                <div class="col-md-10 ml-auto mr-auto">
                                    <form id="busqueda_form" class="form-horizontal" name="form_busqueda"
                                          method="post" action="{{ route('student.update', $person->codigo) }}">
                                        {{ csrf_field() }}
                                        {{ method_field('PATCH') }}
                                        <div class="row text-left">
                                            <div class="col-sm-4">
                                                <div class="form-group {!! $errors->first('nombre','has-danger') !!}">
                                                    <label for="nombre" class="bmd-label-floating">Nombre(s)</label>
                                                    <input type="text" class="form-control" id="nombre" name="nombre"
                                                           value="@if(count($errors)){{ old('nombre') }}@else{{ $person->nombre }}@endif">
                                                    <span class="form-control-feedback"><i class="material-icons">clear</i></span>
                                                    <small class="bmd-label">{!!$errors->first('nombre') !!}</small>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group {!!$errors->first('apaterno','has-danger') !!}">
                                                    <label for="apaterno" class="bmd-label-floating">Apellido paterno</label>
                                                    <input type="text" class="form-control" id="apaterno" name="apaterno"
                                                           value="@if(count($errors)){{ old('apaterno') }}@else{{ $person->apaterno }}@endif">
                                                    <span class="form-control-feedback"><i class="material-icons">clear</i></span>
                                                    <small class="bmd-label">{!!$errors->first('apaterno') !!}</small>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group {!!$errors->first('amaterno','has-danger') !!}">
                                                    <label for="amaterno" class="bmd-label-floating">Apellido materno</label>
                                                    <input type="text" class="form-control" id="amaterno" name="amaterno"
                                                           value="@if(count($errors)){{old('amaterno') }}@else{{ $person->amaterno }}@endif">
                                                    <span class="form-control-feedback"><i class="material-icons">clear</i></span>
                                                    <small class="bmd-label">{!!$errors->first('amaterno') !!}</small>
                                                </div>
                                            </div>
                                            @php
                                                if (count($errors)) {
                                                    $sexo = old('sexo');
                                                    $tipo = old('tipo');
                                                    $edo_civil = old('estado_civil');
                                                } else {
                                                    $sexo = $person->sexo;
                                                    $tipo = $person->tipo;
                                                    $edo_civil = $person->personalData->estado_civil;
                                                }
                                            @endphp
                                            <div class="col-sm-3">
                                                <div class="form-group {!! $errors->first('fec_nac','has-danger') !!}">
                                                    <label for="fec_nac" class="bmd-label-floating">Fecha de nacimiento</label>
                                                    <input type="text" class="form-control datetimepicker" id="fec_nac" name="fec_nac">
                                                    <span class="form-control-feedback"><i class="material-icons">clear</i></span>
                                                    <small id="passlHelp" class="bmd-label">{!! $errors->first('fec_nac') !!}</small>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group {!! $errors->first('tipo','has-danger') !!}">
                                                    <label for="tipo" class="bmd-label-floating">Tipo</label>
                                                    {{ Form::select('tipo', $person->getTipos(), $tipo, ['class' => 'form-control']) }}
                                                    <span class="form-control-feedback"><i class="material-icons">clear</i></span>
                                                    <small class="bmd-label">{!! $errors->first('tipo') !!}</small>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group {!! $errors->first('sexo','has-danger') !!}">
                                                    <label for="estado_civil" class="bmd-label-floating">Sexo</label>
                                                    {{ Form::select('sexo', $person->getSexos(), $sexo, ['class' => 'form-control']) }}
                                                    <span class="form-control-feedback"><i class="material-icons">clear</i></span>
                                                    <small id="passlHelp" class="bmd-label">{!! $errors->first('sexo') !!}</small>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group {!! $errors->first('estado_civil','has-danger') !!}">
                                                    <label for="estado_civil" class="bmd-label-floating">Estado civil</label>
                                                    {{ Form::select('estado_civil', $person->personalData->getEstadosCiviles(),
                                                    $edo_civil, ['class' => 'form-control']) }}
                                                    <span class="form-control-feedback"><i class="material-icons">clear</i></span>
                                                    <small id="passlHelp" class="bmd-label">{!! $errors->first('estado_civil') !!}</small>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group {!! $errors->first('religion','has-danger') !!}">
                                                    <label for="religion" class="bmd-label-floating">Religión</label>
                                                    <input type="text" class="form-control" id="religion" name="religion"
                                                           value="@if(count($errors)){{ old('religion') }}@else{{ $person->personalData->religion }}@endif">
                                                    <span class="form-control-feedback"><i class="material-icons">clear</i></span>
                                                    <small class="bmd-label">{!!$errors->first('religion') !!}</small>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group {!! $errors->first('email','has-danger') !!}">
                                                    <label for="email" class="bmd-label-floating">Correo eléctronico</label>
                                                    <input type="text" class="form-control" id="email" name="email"
                                                           value="@if(count($errors)){{ old('email') }}@else{{ $person->personalData->email }}@endif">
                                                    <span class="form-control-feedback"><i class="material-icons">clear</i></span>
                                                    <small class="bmd-label">{!!$errors->first('email') !!}</small>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group {!! $errors->first('telefono','has-danger') !!}">
                                                    <label for="telefono" class="bmd-label-floating">Teléfono</label>
                                                    <input type="text" class="form-control" id="telefono" name="telefono"
                                                           value="@if(count($errors)){{ old('telefono') }}@else{{ $person->personalData->telefono }}@endif">
                                                    <span class="form-control-feedback"><i class="material-icons">clear</i></span>
                                                    <small class="bmd-label">{!!$errors->first('telefono') !!}</small>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group {!! $errors->first('escolaridad','has-danger') !!}">
                                                    <label for="escolaridad" class="bmd-label-floating">Escolaridad</label>
                                                    {{ Form::select('escolaridad', $person->personalData->getEscolaridades(),
                                                    $person->personalData->escolaridad, ['class' => 'form-control']) }}
                                                    <span class="form-control-feedback"><i class="material-icons">clear</i></span>
                                                    <small id="passlHelp" class="bmd-label">{!! $errors->first('escolaridad') !!}</small>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group {!! $errors->first('carrera_id','has-danger') !!}">
                                                    <label for="estado_civil" class="bmd-label-floating">Programa educativo</label>
                                                    {{ Form::select('carrera_id', [''=>'Seleccione una opción']+
                                                    \App\Career::all()->pluck('carrera', 'id')->toArray(),
                                                    $person->personalData->carrera_id, ['class' => 'form-control']) }}
                                                    <span class="form-control-feedback"><i class="material-icons">clear</i></span>
                                                    <small id="passlHelp" class="bmd-label">{!! $errors->first('carrera_id') !!}</small>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group {!! $errors->first('domicilio','has-danger') !!}">
                                                    <label for="domicilio" class="bmd-label-floating">Domicilio</label>
                                                    <input type="text" class="form-control" id="domicilio" name="domicilio"
                                                           value="@if(count($errors)){{ old('domicilio') }}@else{{ $person->personalData->domicilio }}@endif">
                                                    <span class="form-control-feedback"><i class="material-icons">clear</i></span>
                                                    <small class="bmd-label">{!!$errors->first('domicilio') !!}</small>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group {!! $errors->first('actividad_economica','has-danger') !!}">
                                                    <label for="estado_civil" class="bmd-label-floating">Actividad económica</label>
                                                    {{ Form::select('actividad_economica', $person->personalData->getActividadesEconomicas(),
                                                    $person->personalData->actividad_economica, ['class' => 'form-control']) }}
                                                    <span class="form-control-feedback"><i class="material-icons">clear</i></span>
                                                    <small id="passlHelp" class="bmd-label">{!! $errors->first('actividad_economica') !!}</small>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group {!! $errors->first('lug_nac','has-danger') !!}">
                                                    <label for="lug_nac" class="bmd-label-floating">Lugar de nacimiento</label>
                                                    <input type="text" class="form-control" id="lug_nac" name="lug_nac"
                                                           value="@if(count($errors)){{ old('lug_nac') }}@else{{ $person->personalData->lug_nac }}@endif">
                                                    <span class="form-control-feedback"><i class="material-icons">clear</i></span>
                                                    <small class="bmd-label">{!!$errors->first('lug_nac') !!}</small>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group {!! $errors->first('lug_res','has-danger') !!}">
                                                    <label for="lug_res" class="bmd-label-floating">Lugar de residencia</label>
                                                    <input type="text" class="form-control" id="lug_res" name="lug_res"
                                                           value="@if(count($errors)) {{ old('lug_res') }}@else{{ $person->personalData->lug_res }}@endif">
                                                    <span class="form-control-feedback"><i class="material-icons">clear</i></span>
                                                    <small class="bmd-label">{!!$errors->first('lug_res') !!}</small>
                                                </div>
                                            </div>
                                        </div>
                                        <br/>
                                        <div>
                                            <input type="submit" class="btn btn-primary" value="Guardar cambios">
                                        </div>
                                    </form>
                                    <br/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>

        $('#fec_nac').datetimepicker({
            format: 'MM/DD/YYYY',
            defaultDate: "@if(count($errors)){{ old('fec_nac') }}@else{{ $person->fec_nac }}@endif",
            icons: {
                time: 'fa fa-clock-o',
                date: 'fa fa-calendar',
                up: 'fa fa-chevron-up',
                down: 'fa fa-chevron-down',
                previous: 'fa fa-chevron-left',
                next: 'fa fa-chevron-right',
                today: 'fa fa-screenshot',
                clear: 'fa fa-trash',
                close: 'fa fa-remove'
            }
        });
    </script>
@stop