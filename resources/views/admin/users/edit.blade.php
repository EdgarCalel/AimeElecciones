@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Asignar roles</h1>
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
        <p class="h5">Nombre:</p>
        <p class="form-control">{{$user->name}}</p>
        <p class="h5">Rol:</p>
        <h2 class="h5">listado de roles</h2>
        
             {!! Form::model($user, ['route'=>['usuarios.update', $user], 'method'=>'put']) !!}
             @foreach ($roles as $roles)
             <div>
                <label>
                    {!! Form::checkbox('roles[]', $roles->id, null, ['class'=>'mr-1']) !!}
                    {{$roles ->name}}
                </label>
             </div>
             @endforeach
             
                {!! Form::submit('asignar rol', ['class'=>'btn btn-primary mt-2']) !!}
             {!! Form::close() !!}
        
    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop