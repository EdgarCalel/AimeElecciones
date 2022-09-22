@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    
    @if ($userLogueado->changePassword==0)
        <a href="#" class="btn btn-default" id="openBtn" hidden>Open modal</a>
        <div id="modal-content" class="modal fade" tabindex="-1" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalToggleLabel2">Modal 2</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="row g-3" action="/auth/{{$userLogueado->id}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="col-md-12">
                                <label for="inputEmail4" class="form-label">Usuario:</label><br>
                                <label class="form-label" style="font-size: 1rem; font-weight:100">{{$userLogueado->name}} {{$userLogueado->lastname}}</label>
                            </div>
                            <div class="col-md-12">
                                <label  class="form-label">Contraseña</label>
                                <input id="contraseñaUser" name="contraseñaUser" type="password" class="form-control" >
                            </div>

                            <div class="mt-3 centered">
                                <a href="/" class="btn btn-secondary">Cancelar</a>
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @else
        Pagina principal despues de cmabio de contraseña
    @endif




@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        $('#modal-content').on('shown.bs.modal', function() {
            $("#txtname").focus();
        });

        // show the modal onload
        $('#modal-content').modal({
            show: true
        });

        // everytime the button is pushed, open the modal, and trigger the shown.bs.modal event
        $('#openBtn').click(function() {
            $('#modal-content').modal({
                show: true
            });
        });
    </script>
@stop
