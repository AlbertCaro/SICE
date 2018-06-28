@extends('layouts.main')

@section('title', 'Registros importados')
@section('type', 'profile-page sidebar-collapse')

@section('content')
    <script type="text/javascript">
        let table = '{{ route('student.table') }}';
        let search = '/person/search/';
    </script>
    <div id="top" class="page-header header-filter" data-parallax="true" style=" background-image: url({{ asset('assets/img/kit/cita2.jpg') }}); ">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h1 class="title">Registros importados</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="main main-raised">
        <div class="container">
            <div class="section text-center">
                <input type="hidden" name="search" id="search">
                <div id="content">
                    <h5><strong>Resultado de la importación:</strong></h5>
                    @if($error_exist !== 0)
                    <p>{{ "{$error_exist} registro(s) repetidos." }}</p>
                    @endif
                    @if($error_codigo !== 0)
                    <p>{{ "{$error_codigo} registro(s) con código vacío." }}</p>
                    @endif
                    @if($error_carrera !== 0)
                    <p>{{ "{$people->total()} registro(s) sin carrera." }}</p>
                    @endif
                    <p>{{ "{$people->total()} registro(s) importados correctamente." }}</p>
                    <br/>
                    @if($people->total() !== 0)
                        @include('person.table')
                    @endif
                </div>
                <div>
                    <a class="btn btn-primary" href="{{ route('student.index') }}">
                        <i class="material-icons">list</i> Ir a consulta de alumnos
                    </a>
                </div>
            </div>
        </div>
    </div>
@stop