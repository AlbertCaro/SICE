@extends('layouts.main')

@section('title', 'Registrarme')
@section('type', 'signup-page')

@section('content')
    <div class="page-header header-filter" filter-color="purple" style="background-image: url({{URL::asset('assets/img/kit/cita2.jpg')}}); background-size: cover; background-position: top center;">
        <div class="container">
            <div class="row">
                <div class="col-md-10 ml-auto mr-auto">
                    <div class="card card-signup">
                        <h2 class="card-title text-center">Registrarme</h2>
                        <div class="card-body text-center">
                            <div class="row">
                                <div class="col-md-8 ml-auto mr-auto">
                                    <form id="registrar_form" class="form" method="POST" action="{{ url('register') }}">
                                        {{ csrf_field() }}
                                        <div class="row text-left">
                                            <div class="col-sm-6">
                                                <div class="form-group {!! $errors->first('name','has-danger') !!}">
                                                    <label for="name" class="bmd-label-floating">Nombre</label>
                                                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                                                    <span class="form-control-feedback"><i class="material-icons">clear</i></span>
                                                    <small id="namelHelp" class="bmd-label">{!!$errors->first('name') !!}</small>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group {!!$errors->first('email','has-danger') !!}">
                                                    <label for="email" class="bmd-label-floating">Correo eléctronico</label>
                                                    <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}">
                                                    <span class="form-control-feedback"><i class="material-icons">clear</i></span>
                                                    <small id="emailHelp" class="bmd-label">{!!$errors->first('email') !!}</small>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group {!! $errors->first('password','has-danger') !!}">
                                                    <label for="password" class="bmd-label-floating">Contraseña</label>
                                                    <input type="password" class="form-control" id="password" name="password" value="{{ old('password') }}">
                                                    <span class="form-control-feedback"><i class="material-icons">clear</i></span>
                                                    <small id="passlHelp" class="bmd-label">{!!$errors->first('password') !!}</small>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group {!! $errors->first('password','has-danger') !!}">
                                                    <label for="password-confirm" class="bmd-label-floating">Confirmar contraseña</label>
                                                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" value="{{ old('password_confirmation') }}">
                                                    <span class="form-control-feedback"><i class="material-icons">clear</i></span>
                                                    <small id="pass_conflHelp" class="bmd-label">{!!$errors->first('password') !!}</small>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="text-center">
                                            <input data-toggle="tooltip" data-placement="top" title="Al registrarme acepto los terminos y condiciones"
                                                   type="submit" value="Registrarme" class="btn btn-primary">
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