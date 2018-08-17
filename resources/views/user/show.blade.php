@extends('layouts.main')

@section('title', $user->name)
@section('type', 'profile-page sidebar-collapse')

@section('content')
    <script type="text/javascript">
        let table = '{{ route('client.table') }}';
        let search = '{{ url('client/search') }}';
    </script>
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
                <div>
                    <div class="description text-center">
                        <h6 style="color: #3C4858;">Creado el:</h6>
                        <p>
                            {{ $user->created_at }}
                        </p>
                        <h6 style="color: #3C4858;">Última modificación el:</h6>
                        <p>
                            {{ $user->updated_at }}
                        </p>
                        <a href="{{ route('user.edit', $user->id) }}">
                            <button type="button" data-toggle="tooltip" data-placement="top" class="btn btn-success" title="Editar">
                                <i class="material-icons">edit</i>
                            </button>
                        </a>
                        <a onclick="deleteInShow(event, '{{ $user->name }}', '{{ route('user.destroy', $user->id) }}', '{{ route('user.index') }}');">
                            <button type="button" data-toggle="tooltip" data-placement="top" class="btn btn-danger" title="Eliminar">
                                <i class="material-icons">delete</i>
                            </button>
                        </a>
                    </div>

                </div>
                <div id="content" class="info" align="center">
                @if(count($clients) == 0)
                    <h4>Este usuario no tiene cliente oauth.</h4>
                @else
                    <div class="icon icon-info text-center">
                        <i class="material-icons">code</i>
                    </div>
                    <h4 class="info-title text-center">Clientes:</h4>
                    @include('client.table')
                @endif
                </div>
                <br>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/js/pagination.js') }}"></script>
@stop