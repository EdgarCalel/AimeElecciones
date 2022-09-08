@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Profesores</h1>
    <a class="btn btn-success" href="profesor/create">Crear</a>
@stop

@section('content')

<div>
    <div class="card">
        <div class="card-header">
            <input wire:model="search" class="form-control"  placeholder="Ingrese nombre del alumno o email">
        </div>
        @if ($profesor->count())
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                   
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Grado</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($profesor as $prof)
                        <tr>
                        
                            <td>{{$prof -> name}}</td>
                            <td>{{$prof -> email}}</td>
                            <td>{{$prof -> id_grado}}</td>
                            <td width="10px">
                                
                                <a class="btn btn-primary" href="profesor/{{$prof->id}}/edit">Editar</a>
                                <form action="{{route ('profesor.destroy', $prof->id)}}" method="POST">
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