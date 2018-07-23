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
                        <div class="col-md-10 ml-auto mr-auto text-center">
                            <form id="busqueda_form" class="form-horizontal" name="form_busqueda"
                                  method="post" action="{{ route('client.update', $client->id) }}">
                                {{ csrf_field() }}
                                {{ method_field('PATCH') }}
                                <div class="row text-left">
                                    <div class="col-sm-6">
                                        <div class="form-group {!! $errors->first('name', 'has-danger') !!}">
                                            <label for="name" class="bmd-label-floating">Nombre</label>
                                            <input type="text" class="form-control" id="name" name="name" value="{{ $client->name }}">
                                            <span class="form-control-feedback"><i class="material-icons">clear</i></span>
                                            <small id="namelHelp" class="bmd-label">{!!$errors->first('name') !!}</small>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group {!! $errors->first('redirect', 'has-danger') !!}">
                                            <label for="redirect" class="bmd-label-floating">Redirecciona a</label>
                                            <input type="text" class="form-control" id="redirect" name="redirect" value="{{ $client->redirect }}">
                                            <span class="form-control-feedback"><i class="material-icons">clear</i></span>
                                            <small id="namelHelp" class="bmd-label">{!! $errors->first('name') !!}</small>
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
@stop