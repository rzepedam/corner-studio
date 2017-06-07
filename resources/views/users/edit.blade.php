@extends('layouts.layout')

@section('title') Editar Usuario @stop

@section('css')
    <link rel="stylesheet" href="{{ mix('css/users/edit.css') }}">
@stop

@section('title-header') Editar Usuario @stop

@section('breadcrumb')
    <li><a href="{{ route('users.index') }}">Usuarios</a></li>
    <li class="active"><strong>Editar</strong></li>
@stop

@section('content')

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    @include('layouts.messages.error')

    <div class="section">
        <article class="message is-primary">
            <div class="message-header">&nbsp;</div>
            <div class="message-body">
                <div class="row">
                    <div class="col-md-6">
                        {{ Form::open(['route' => 'users.submitImage', 'files' => true]) }}

                            @include('users.partials.image')    

                        {{ Form::close() }}
                    </div>
                    <div class="col-md-6">
                        {{ Form::model($user, array('route' => array('users.update', $user), 'method' => 'PUT', 'id' => 'form-submit')) }}
                            
                            @include('users.partials.fields')

                        {{ Form::close() }}
                    </div>
                </div>
            </div>
            <div class="message-footer">&nbsp;</div>
        </article>
        <br />
        <div class="row">
            <div class="col-md-12">
                <a href="{{ route('users.index') }}">
                    <i class="fa fa-mail-reply"></i> Volver
                </a>
                <div id="spinner" class="sk-spinner sk-spinner-cube-grid hide pull-right">
                    <div class="sk-cube"></div>
                    <div class="sk-cube"></div>
                    <div class="sk-cube"></div>
                    <div class="sk-cube"></div>
                    <div class="sk-cube"></div>
                    <div class="sk-cube"></div>
                    <div class="sk-cube"></div>
                    <div class="sk-cube"></div>
                    <div class="sk-cube"></div>
                </div>
                <button id="btnSubmit" type="submit" class="btn btn-primary pull-right">
                    Actualizar
                </button>
            </div>
        </div>
    </div>

@stop

@section('scripts')
    <script type="text/javascript" src="{{ mix('js/create-edit-common.js') }}"></script>
    <script type="text/javascript" src="{{ mix('js/users/create-edit.js') }}"></script>
    <script type="text/javascript" src="{{ mix('js/users/edit.js') }}"></script>
    <script type="text/javascript">
        
        $(document).ready(function() {
            
            var $image = $(".image-crop > img");

            $($image).cropper({
                preview: ".img-preview",
                zoomable: false,
                crop: function(e) {
                    $('#x').val(e.x);
                    $('#y').val(e.y);
                    $('#w').val(e.width);
                    $('#h').val(e.height);
                }
            });

            var $inputImage = $("#inputImage");
            if (window.FileReader) {
                $inputImage.change(function() {
                    var fileReader = new FileReader(), files = this.files, file;
                    if (!files.length) {
                        return;
                    }
                    file = files[0];

                    if (/^image\/\w+$/.test(file.type)) {
                        fileReader.readAsDataURL(file);
                        fileReader.onload = function () {
                            $image.cropper("reset", true).cropper("replace", this.result);
                        };
                    } else {
                        showMessage("Please choose an image file.");
                    }
                });
            } else {
                $inputImage.addClass("hide");
            }
        });
    </script>

@stop
