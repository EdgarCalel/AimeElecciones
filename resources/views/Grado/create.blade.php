@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>crear grado</h1>
@stop

@section('content')
@if (session('status'))
<div class="alert alert-success">
    <strong>{{session('status')}}</strong>

</div>

        
    @else
    <div class="alert alert-succes">
        <strong>{{session('status')}}</strong>
    
    </div>
@endif
    <div class="card">
        <div class="card-body">
            <form class="row g-3" action="/grado" method="POST">
                @csrf
              
                <div class="col-md-6">
                    <label for="inputEmail4" class="form-label">Nombre de grado</label>
                    <input id="nombreGrado" name="nombreGrado" type="text" class="form-control" ">
                    </div>
                    <div class="col-md-6">
                        <label for="inputPassword4" class="form-label">Seccion</label>
                        <input id="seccion" name="seccion" type="text" class="form-control" >
                    </div>

                <div class="mt-3 centered">
                    <a href="/estudiante" class="btn btn-secondary">Cancelar</a>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>


        </div>
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
