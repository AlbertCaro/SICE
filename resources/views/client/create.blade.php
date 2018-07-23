@extends('layouts.main')

@section('title', 'Registrar cliente')
@section('type', 'signup-page')

@section('content')
    <div class="page-header header-filter" filter-color="purple" style="background-image: url({{ asset('assets/img/kit/cita2.jpg') }}); background-size: cover; background-position: top center;">
        <div class="container">
            <div class="row">
                <div class="col-md-11 ml-auto mr-auto">
                    <div class="card card-signup">
                        <h2 class="card-title text-center">Registrar alumno</h2>
                        <div class="card-body text-center">
                            <div class="row">
                                <div class="col-md-10 ml-auto mr-auto">
                                    <form id="busqueda_form" class="form-horizontal" name="form_busqueda"
                                          method="post" action="{{ url('oauth/clients') }}">
                                        {{ csrf_field() }}
                                        {{ method_field('POST') }}
                                        <div class="row text-left">
                                            <div class="col-sm-6">
                                                <div class="form-group {!! $errors->first('name', 'has-danger') !!}">
                                                    <label for="name" class="bmd-label-floating">Nombre</label>
                                                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                                                    <span class="form-control-feedback"><i class="material-icons">clear</i></span>
                                                    <small id="namelHelp" class="bmd-label">{!! $errors->first('name') !!}</small>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group {!! $errors->first('redirect', 'has-danger') !!}">
                                                    <label for="redirect" class="bmd-label-floating">Redirecciona a</label>
                                                    <input type="text" class="form-control" id="redirect" name="redirect" value="{{ old('redirect') }}">
                                                    <span class="form-control-feedback"><i class="material-icons">clear</i></span>
                                                    <small id="namelHelp" class="bmd-label">{!! $errors->first('redirect') !!}</small>
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
@endsection