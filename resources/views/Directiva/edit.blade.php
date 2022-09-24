@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Acerca de mi</h1>
@stop

@section('content')
    
<form action="/directiva/{{$directiva->id}}"  method="post">

    @csrf
    @method('PUT')
    <div class="container p-5">
    <div class="row row-cols-1 row-cols-xs-2 row-cols-sm-2 row-cols-lg-4 g-3">
            
            <div class="col">
                <div class="card h-100 shadow-sm">
                    <div class="text-center">
                        <div class="img-hover-zoom img-hover-zoom--colorize">
                            <img class="shadow" src="/imagen/estudiante/{{$directiva->foto_perfil}}" width="60%">
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="clearfix mb-3">
                        </div>
                        <div class="my-2 text-center">
                           <h1>{{$directiva->nombre}} </h1>
                
                        </div>
                        <div class="box">
                          <h2>{{$directiva->apellidos}}</h2>
                        </div>
                        <button class="btn btn-success">Votar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

<a href="/directiva" class="btn btn-secondary" tabindex="6">Cancelar</a>

</form>
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('css/createUsers.css') }}">
@stop


