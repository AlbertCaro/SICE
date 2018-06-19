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
                                <div class="col-md-7 ml-auto mr-auto">
                                    <form id="registrar_form" class="form" method="POST" action="{{ route('register') }}">
                                        {{ csrf_field() }}
                                        <div class="form-group @if($errors->has('name')){{ "has-danger" }}@endif text-lg-left">
                                            <label for="name" class="bmd-label-floating">Nombre</label>
                                            <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" >
                                            @if ($errors->has('name'))
                                                <span class="form-control-feedback">
                                                    <i class="material-icons">clear</i>
                                                </span>
                                                <span class="bmd-label">Ha dejado el campo vacío</span>
                                            @endif
                                        </div>

                                        <div class="form-group @if($errors->has('email')){{ "has-danger" }}@endif text-lg-left">
                                            <label for="email" class="bmd-label-floating">E-mail</label>
                                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">
                                            @if ($errors->has('email'))
                                                <span class="form-control-feedback">
                                                    <i class="material-icons">clear</i>
                                                </span>
                                                <span class="bmd-label">Ha dejado el campo vacío</span>
                                            @endif
                                        </div>

                                        <div class="form-group @if($errors->has('password')){{ "has-danger" }}@endif text-lg-left">
                                            <label for="password" class="bmd-label-floating">Contraseña</label>
                                            <input id="password" type="password" class="form-control" name="password">
                                            @if ($errors->has('password'))
                                                <span class="form-control-feedback">
                                                    <i class="material-icons">clear</i>
                                                </span>
                                                <span class="bmd-label">Ha dejado el campo vacío</span>
                                            @endif
                                        </div>
                                        <div class="form-group text-lg-left">
                                            <label for="password-confirm" class="bmd-label-floating">Confirmar contraseña</label>
                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                                        </div>

                                        <div>
                                            <!--label>
                                                <a href="#">Terminos y condiciones</a>
                                            </label-->
                                            <br/>
                                        </div>
                                        <div class="text-center">
                                            <input data-toggle="tooltip" data-placement="top" title="Al registrarme acepto los terminos y condiciones" type="submit" value="Registrarme" class="btn btn-primary btn-round">
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