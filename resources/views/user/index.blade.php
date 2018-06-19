@extends('layouts.main')

@section('title', 'Usuarios')
@section('type', 'profile-page sidebar-collapse')

@section('content')
    <script type="text/javascript">
        var table = '{{ route('user.table') }}';
        var search = '/user_search/';
    </script>
    <div class="page-header header-filter" data-parallax="true" style=" background-image: url({{URL::asset('assets/img/kit/cita2.jpg')}}); ">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h1 class="title">Usuarios</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="main main-raised">
        <div class="container">
            <div class="section text-center">
                @include('layouts.search')
                <div id="content">
                    @include('user.table')
                </div>
            </div>
        </div>
    </div>
@stop