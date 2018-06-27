@extends('layouts.main')

@section('title', 'Registrar alumno')
@section('type', 'signup-page')

@section('content')
    <div class="page-header header-filter" filter-color="purple"
         style="background-image: url({{ asset('assets/img/kit/cita2.jpg') }}); background-size: cover; background-position: top center;">
        <div class="container">
            <div class="row">
                <div class="col-md-11 ml-auto mr-auto">
                    <div class="card card-signup">
                        <h2 class="card-title text-center">Registrar alumno</h2>
                        <div class="card-body text-center">
                            <div class="row">
                                <div class="col-md-10 ml-auto mr-auto">
                                    <form id="busqueda_form" class="form-horizontal" name="form_busqueda"
                                          method="post" action="{{ route('student.store') }}">
                                        {{ csrf_field() }}
                                        {{ method_field('POST') }}
                                        <div class="row text-left">
                                            <div class="col-sm-3">
                                                <div class="form-group {!! $errors->first('codigo','has-danger') !!}">
                                                    <label for="nombre" class="bmd-label-floating">Código</label>
                                                    <input type="text" class="form-control" id="codigo" name="codigo"
                                                    value="{{ old('codigo') }}">
                                                    <span class="form-control-feedback"><i class="material-icons">clear</i></span>
                                                    <small class="bmd-label">{!!$errors->first('codigo') !!}</small>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group {!! $errors->first('nombre','has-danger') !!}">
                                                    <label for="nombre" class="bmd-label-floating">Nombre(s)</label>
                                                    <input type="text" class="form-control" id="nombre" name="nombre"
                                                           value="{{ old('nombre') }}">
                                                    <span class="form-control-feedback"><i class="material-icons">clear</i></span>
                                                    <small class="bmd-label">{!!$errors->first('nombre') !!}</small>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group {!!$errors->first('apaterno','has-danger') !!}">
                                                    <label for="apaterno" class="bmd-label-floating">Apellido paterno</label>
                                                    <input type="text" class="form-control" id="apaterno" name="apaterno"
                                                           value="{{ old('apaterno') }}">
                                                    <span class="form-control-feedback"><i class="material-icons">clear</i></span>
                                                    <small class="bmd-label">{!!$errors->first('apaterno') !!}</small>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group {!!$errors->first('amaterno','has-danger') !!}">
                                                    <label for="amaterno" class="bmd-label-floating">Apellido materno</label>
                                                    <input type="text" class="form-control" id="amaterno" name="amaterno"
                                                           value="{{ old('amaterno') }}">
                                                    <span class="form-control-feedback"><i class="material-icons">clear</i></span>
                                                    <small class="bmd-label">{!!$errors->first('amaterno') !!}</small>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group {!! $errors->first('fec_nac','has-danger') !!}">
                                                    <label for="fec_nac" class="bmd-label-floating">Fecha de nacimiento</label>
                                                    <input type="text" class="form-control datetimepicker" id="fec_nac" name="fec_nac"
                                                           value="{{ old('fec_nac') }}">
                                                    <span class="form-control-feedback"><i class="material-icons">clear</i></span>
                                                    <small id="passlHelp" class="bmd-label">{!! $errors->first('fec_nac') !!}</small>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group {!! $errors->first('tipo','has-danger') !!}">
                                                    <label for="tipo" class="bmd-label-floating">Tipo</label>
                                                    {{ Form::select('tipo', \App\Person::getTipos(), old('tipo'), ['class' => 'form-control']) }}
                                                    <span class="form-control-feedback"><i class="material-icons">clear</i></span>
                                                    <small class="bmd-label">{!! $errors->first('tipo') !!}</small>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group {!! $errors->first('sexo','has-danger') !!}">
                                                    <label for="estado_civil" class="bmd-label-floating">Sexo</label>
                                                    {{ Form::select('sexo', \App\Person::getSexos(), old('sexo'), ['class' => 'form-control']) }}
                                                    <span class="form-control-feedback"><i class="material-icons">clear</i></span>
                                                    <small id="passlHelp" class="bmd-label">{!! $errors->first('sexo') !!}</small>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group {!! $errors->first('estado_civil','has-danger') !!}">
                                                    <label for="estado_civil" class="bmd-label-floating">Estado civil</label>
                                                    {{ Form::select('estado_civil', \App\PersonalData::getEstadosCiviles(),
                                                    old('estado_civil'), ['class' => 'form-control']) }}
                                                    <span class="form-control-feedback"><i class="material-icons">clear</i></span>
                                                    <small id="passlHelp" class="bmd-label">{!! $errors->first('estado_civil') !!}</small>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group {!! $errors->first('religion','has-danger') !!}">
                                                    <label for="religion" class="bmd-label-floating">Religión</label>
                                                    <input type="text" class="form-control" id="religion" name="religion"
                                                           value="{{ old('religion') }}">
                                                    <span class="form-control-feedback"><i class="material-icons">clear</i></span>
                                                    <small class="bmd-label">{!!$errors->first('religion') !!}</small>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group {!! $errors->first('email','has-danger') !!}">
                                                    <label for="email" class="bmd-label-floating">Correo eléctronico</label>
                                                    <input type="text" class="form-control" id="email" name="email"
                                                           value="{{ old('email') }}">
                                                    <span class="form-control-feedback"><i class="material-icons">clear</i></span>
                                                    <small class="bmd-label">{!!$errors->first('email') !!}</small>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group {!! $errors->first('telefono','has-danger') !!}">
                                                    <label for="telefono" class="bmd-label-floating">Teléfono</label>
                                                    <input type="text" class="form-control" id="telefono" name="telefono"
                                                           value="{{ old('telefono') }}">
                                                    <span class="form-control-feedback"><i class="material-icons">clear</i></span>
                                                    <small class="bmd-label">{!!$errors->first('telefono') !!}</small>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group {!! $errors->first('escolaridad','has-danger') !!}">
                                                    <label for="escolaridad" class="bmd-label-floating">Escolaridad</label>
                                                    {{ Form::select('escolaridad', \App\PersonalData::getEscolaridades(),
                                                    old('escolaridad'), ['class' => 'form-control']) }}
                                                    <span class="form-control-feedback"><i class="material-icons">clear</i></span>
                                                    <small id="passlHelp" class="bmd-label">{!! $errors->first('escolaridad') !!}</small>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group {!! $errors->first('carrera_id','has-danger') !!}">
                                                    <label for="estado_civil" class="bmd-label-floating">Programa educativo</label>
                                                    {{ Form::select('carrera_id', [''=>'Seleccione una opción']+
                                                    \App\Career::all()->pluck('carrera', 'id')->toArray(), old('carrera_id'), ['class' => 'form-control']) }}
                                                    <span class="form-control-feedback"><i class="material-icons">clear</i></span>
                                                    <small id="passlHelp" class="bmd-label">{!! $errors->first('carrera_id') !!}</small>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group {!! $errors->first('domicilio','has-danger') !!}">
                                                    <label for="domicilio" class="bmd-label-floating">Domicilio</label>
                                                    <input type="text" class="form-control" id="domicilio" name="domicilio"
                                                           value="{{ old('domicilio') }}">
                                                    <span class="form-control-feedback"><i class="material-icons">clear</i></span>
                                                    <small class="bmd-label">{!!$errors->first('domicilio') !!}</small>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group {!! $errors->first('actividad_economica','has-danger') !!}">
                                                    <label for="estado_civil" class="bmd-label-floating">Actividad económica</label>
                                                    {{ Form::select('actividad_economica', \App\PersonalData::getActividadesEconomicas(),
                                                    old('actividad_economica'), ['class' => 'form-control']) }}
                                                    <span class="form-control-feedback"><i class="material-icons">clear</i></span>
                                                    <small id="passlHelp" class="bmd-label">{!! $errors->first('actividad_economica') !!}</small>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group {!! $errors->first('lug_nac','has-danger') !!}">
                                                    <label for="lug_nac" class="bmd-label-floating">Lugar de nacimiento</label>
                                                    <input type="text" class="form-control" id="lug_nac" name="lug_nac"
                                                           value="{{ old('lug_nac') }}">
                                                    <span class="form-control-feedback"><i class="material-icons">clear</i></span>
                                                    <small class="bmd-label">{!!$errors->first('lug_nac') !!}</small>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group {!! $errors->first('lug_res','has-danger') !!}">
                                                    <label for="lug_res" class="bmd-label-floating">Lugar de residencia</label>
                                                    <input type="text" class="form-control" id="lug_res" name="lug_res"
                                                           value="{{ old('lug_res') }}">
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>

            $('.datetimepicker').datetimepicker({
                format: 'MM/DD/YYYY',
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
@endsection