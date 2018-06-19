@extends('layouts.main')

@section('title', $person)
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
                                <img src="{{ asset('assets/img/kit/faces/avatar.jpg') }}" alt="Circle Image" class="img-raised rounded-circle img-fluid">
                            </div>
                            <div class="name">
                                <h3 class="title">{{ $user->name }}</h3>
                                <h6>{{ $user->email }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="description text-center">
                    <p>
                        Usuario creado el: {{ \Carbon\Carbon::parse($user->created_at)->format('d/m/Y \a \l\a\s h:m:s a') }} <br/>
                        Última modificación el: {{ \Carbon\Carbon::parse($user->updated_at)->format('d/m/Y \a \l\a\s h:m:s a') }} <br/><br/>
                        <a href="{{ route('user.edit', $user->id) }}">
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