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
                        <div class="col-md-12">
                            <div class="info">
                                <div class="icon icon-info text-center">
                                    <i class="material-icons">code</i>
                                </div>
                                <h4 class="info-title text-center">Información del cliente:</h4>
                                <h6>ID: </h6>
                                <p>
                                    {{ $client->id }}
                                </p>
                                <h6>Usuario: </h6>
                                <p>
                                    @if(empty($client->user->name))
                                        {{ 'N/A' }}
                                    @else
                                        {{ $client->user->name }}
                                    @endif
                                </p>
                                <h6>Redirecciona a:</h6>
                                <p>
                                    {{ $client->redirect }}
                                </p>
                                <h6>Clave secreta:</h6>
                                <p>
                                    {{ $client->secret }}
                                </p>
                                <h6>Estatus de acceso:</h6>
                                <p>
                                    {{ $client->status }}
                                </p>
                                <h6>Creado el:</h6>
                                <p>
                                    {{ $client->created_at }}
                                </p>
                                <h6>Última modificación el:</h6>
                                <p>
                                    {{ $client->updated_at }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="description text-center">
                    <p>
                        <a href="{{ route('client.revoke', $client) }}">
                            <button type="button" data-toggle="tooltip" data-placement="top" class="btn btn-warning"
                                    title="@if($client->revoked === 0) {{ 'Activado' }} @else {{ 'Revocado' }} @endif">
                                <i class="material-icons">@if($client->revoked === 0) {{ 'power' }} @else {{ 'power_off' }} @endif</i>
                            </button>
                        </a>
                        <a href="{{ route('client.edit', $client) }}">
                            <button type="button" data-toggle="tooltip" data-placement="top" class="btn btn-success" title="Editar">
                                <i class="material-icons">edit</i>
                            </button>
                        </a>
                        <a href="#" onclick="deleteInShow(event, '{{ $client->name }}', '{{ route('client.destroy', $client) }}', '{{ route('client.index') }}')">
                            <button type="button" class="btn btn-danger" title="Eliminar">
                                <i class="material-icons">delete_forever</i>
                            </button>
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
@stop