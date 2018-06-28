@extends('layouts.main')

@section('title', $user->name)
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
                                <img id="photo" src="http://www.cuvalles.udg.mx/spec/Fotos/{{ $user->name }}.jpg"
                                     onerror="this.src='{{ asset('assets/img/blank_user.png') }}';"
                                     class="img-raised rounded-circle img-fluid"
                                     style="object-fit: cover; object-position: center; height: 160px; width: 160px">
                            </div>
                            <div class="name">
                                <h3 class="title">{{ $user->name }}</h3>
                                <h6>{{ $user->email }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="content">
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
                </div>
                <br>
            </div>
        </div>
    </div>
@stop