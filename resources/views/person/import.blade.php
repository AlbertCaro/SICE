@extends('layouts.main')

@section('title', 'Importar')
@section('type', 'signup-page')

@section('content')
    <div class="page-header header-filter" filter-color="purple" style="background-image: url({{ asset('assets/img/kit/cita2.jpg') }}); background-size: cover; background-position: top center;">
        <div class="container">
            <div class="row">
                <div class="col-md-11 ml-auto mr-auto">
                    <div class="card card-signup">
                        <h2 class="card-title text-center">Importar por archivo</h2>
                        <div class="card-body text-center">
                            <div class="row">
                                <div class="col-md-8 ml-auto mr-auto">
                                    <form id="busqueda_form" class="form-horizontal" name="form_busqueda" enctype="multipart/form-data"
                                          method="post" action="{{ route('student.importing') }}">
                                        {{ csrf_field() }}
                                        {{ method_field('POST') }}
                                        <div class="form-group form-file-upload form-file-multiple text-left {!! $errors->first('file','has-danger') !!}">
                                            <input type="file" id="file" name="file" class="inputFileHidden">
                                            <div class="input-group">
                                                <input type="text" id="name" name="name" class="form-control inputFileVisible"
                                                       placeholder="Seleccione el archivo...">

                                                <span class="input-group-btn">
                                                    <button type="button" class="btn btn-fab btn-round btn-primary">
                                                        <i class="material-icons">attach_file</i>
                                                    </button>
                                                    <br>
                                                </span>
                                            </div>
                                            <small class="bmd-label">{!!$errors->first('file') !!}</small>
                                        </div>
                                        <br/>
                                        <div>
                                            <input type="submit" class="btn btn-primary" value="Importar">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection