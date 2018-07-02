@extends('layouts.main')

@section('title', 'Clientes')
@section('type', 'profile-page sidebar-collapse')

@section('content')
    <script type="text/javascript">
        let table = '{{ route('client.table') }}';
        let search = '{{ url('client/search') }}';
    </script>
    <div id="top" class="page-header header-filter" data-parallax="true" style=" background-image: url({{URL::asset('assets/img/kit/cita2.jpg')}}); ">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h1 class="title">Clientes</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="main main-raised">
        <div class="container">
            <div class="section text-center">
                @include('layouts.search')
                <div id="content">
                    @include('client.table')
                </div>
            </div>
        </div>
    </div>
@stop