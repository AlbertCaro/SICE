@extends('layouts.main')

@section('title', 'Iniciar sesión')
@section('type', 'signup-page')

@section('content')
    <div class="page-header header-filter" filter-color="purple" style="background-image: url({{URL::asset('assets/img/kit/cita2.jpg')}}); background-size: cover; background-position: top center;">
        <div class="container">
            <div class="row">
                <div class="col-md-10 ml-auto mr-auto">
                    <div class="card card-signup">
                        <h2 class="card-title text-center">Iniciar sesión</h2>
                        <div class="card-body text-center">
                            <div class="row">
                                <div class="col-md-7 ml-auto mr-auto">
                                    <form class="form" method="POST" action="{{ route('login') }}">
                                        {{ csrf_field() }}
                                        <div class="form-group @if($errors->has('password')) {{ "has-danger" }} @endif text-lg-left">
                                            <label for="email" class="bmd-label-floating">Correo eléctronico</label>
                                            <input type="email" class="form-control" id="email" name="email">
                                            @if($errors->has('email'))
                                                <span class="form-control-feedback">
                                                    <i class="material-icons">clear</i>
                                                </span>
                                                <span class="bmd-label">Ha dejado el campo vacío</span>
                                            @else
                                                <span class="bmd-help">No compartiremos su email con nadie.</span>
                                            @endif
                                        </div>
                                        <div class="form-group @if($errors->has('password')) {{ "has-danger" }} @endif text-lg-left">
                                            <label for="password" class="bmd-label-floating">Contraseña</label>
                                            <input type="password" class="form-control" id="password" name="password">
                                            @if($errors->has('email'))
                                                <span class="form-control-feedback">
                                                    <i class="material-icons">clear</i>
                                                </span>
                                                <span class="bmd-label">Ha dejado el campo vacío</span>
                                            @else
                                            <!--span class="bmd-help">Contraseña 110% segura.</span-->
                                            @endif
                                        </div>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input" type="checkbox" {{ old('remember') ? 'checked' : '' }}>
                                                <span class="form-check-sign">
                                                    <span class="check"></span>
                                                </span>
                                                Recordar usuario
                                            </label>
                                        </div>
                                        <div class="text-center">
                                            <input type="submit" value="Ingresar" class="btn btn-primary btn-round">
                                        </div>
                                        <div>
                                        <!--label>
                                                <a href="{{ route('password.request') }}">Olvidé la contraseña.</a>
                                            </label-->
                                            <br/>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@stop
