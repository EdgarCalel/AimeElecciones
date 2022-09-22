@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Estudiante</h1>
    @can('estudiante.create')
                            
    <a class="btn btn-success" href="estudiante/create">Crear</a>
    @endcan
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
<div>
    <div class="card">
        <div class="card-header">
            <input wire:model="search" class="form-control"  placeholder="Ingrese nombre del alumno o email">
        </div>
        @if ($estudiante->count())
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Grado</th>
                        <th>Seccion</th>
                        <th>Escolaridad</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($estudiante as $st)
                        <tr>
                            <td>{{$st ->id}}</td>
                            <td>{{$st -> nombre}} {{$st -> apellido}}</td>
                            {{-- <td>{{$st -> nombre_grado}}</td>
                            <td>{{$st -> seccion}}</td> --}}
                            <td>{{$st -> escolaridad}}</td>
                            <td width="10px">
                                @can('estudiante.edit')
                                <a class="btn btn-primary" href="estudiante/{{$st->id}}/edit">Editar</a>
                                @endcan
                                <form action="{{route ('estudiante.destroy', $st->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Borrar</button>
                                    
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
        <div class="card-body">
            <strong>no hay registros</strong>
        </div>
        @endif
        <div class="card-footer">
            {{-- {{ $student -> links() }} --}}
        </div>
    </div>
</div>
  
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop


