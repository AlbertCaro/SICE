@extends('layouts.main')

@section('title', 'Editar usuario')
@section('type', 'profile-page sidebar-collapse')

@section('content')
    <div class="page-header header-filter" data-parallax="true" style=" background-image: url('../../assets/img/kit/cita.jpg'); "></div>
    <div class="main main-raised">
        <div class="profile-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 ml-auto mr-auto">
                        <div class="profile">
                            <div class="avatar">
                                <img id="photo" src="http://www.cuvalles.udg.mx/spec/Fotos/{{ $user->name }}.jpg"
                                     onerror="this.src='{{ asset('assets/img/blank_user.png') }}';"
                                     class="img-raised rounded-circle img-fluid"
                                     style="object-fit: cover; object-position: center; height: 160px; width: 160px">
                            </div>
                            <div class="name">
                                <h3 class="title">{{ $user->name }}</h3>
                                <h6>{{ $user->email }}</h6>
                                <div class="col-md-10 ml-auto mr-auto">
                                    <form id="busqueda_form" class="form-horizontal" name="form_busqueda"
                                          method="post" action="{{ route('user.update', $user->id) }}">
                                        {{ csrf_field() }}
                                        {{ method_field('PATCH') }}
                                        <div class="row text-left">
                                            <div class="col-sm-6">
                                                <div class="form-group {!! $errors->first('name','has-danger') !!}">
                                                    <label for="name" class="bmd-label-floating">Nombre</label>
                                                    <input type="text" class="form-control" id="name" name="name"
                                                           value="@if(old('name')){{ old('name') }}@else{{ $user->name }}@endif">
                                                    <span class="form-control-feedback"><i class="material-icons">clear</i></span>
                                                    <small id="namelHelp" class="bmd-label">{!!$errors->first('name') !!}</small>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group {!!$errors->first('email','has-danger') !!}">
                                                    <label for="email" class="bmd-label-floating">Correo eléctronico</label>
                                                    <input type="text" class="form-control" id="email" name="email"
                                                           value="@if(old('email')) {{ old('email') }} @else{{ $user->email }}@endif">
                                                    <span class="form-control-feedback"><i class="material-icons">clear</i></span>
                                                    <small id="emailHelp" class="bmd-label">{!!$errors->first('email') !!}</small>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group {!! $errors->first('password','has-danger') !!}">
                                                    <label for="password" class="bmd-label-floating">Contraseña</label>
                                                    <input type="password" class="form-control" id="password" name="password">
                                                    <span class="form-control-feedback"><i class="material-icons">clear</i></span>
                                                    <small id="passlHelp" class="bmd-label">{!! $errors->first('password') !!}</small>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group {!! $errors->first('password','has-danger') !!}">
                                                    <label for="password-confirm" class="bmd-label-floating">Confirmar contraseña</label>
                                                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                                                    <span class="form-control-feedback"><i class="material-icons">clear</i></span>
                                                    <small id="pass_conflHelp" class="bmd-label">{!!$errors->first('password') !!}</small>
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
@stop