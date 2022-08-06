@extends('layouts.plantillabase');

@section('contenido')
<a href="directiva/create" class="btn btn-primary">Crear miembros de junta directiva</a>

<table class="table table-striped table-dark mt-4">
<thead>
    <tr>
        <th scope="col">Id</th>
        <th scope="col">Nombres</th>
        <th scope="col">Apellidos</th>
        <th scope="col">Grado</th>
        <th scope="col">Seccion</th>
        <th scope="col">Puesto</th>
        <th scope="col">opciones</th>

    </tr>
</thead>
<tbody>
    @foreach($directivas as $directiva)
    <tr>
        <td>{{$directiva->id}}</td>
        <td>{{$directiva->nombres}}</td>
        <td>{{$directiva->apellidos}}</td>
        <td>{{$directiva->Grado}}</td>
        <td>{{$directiva->seccion}}</td>
        <td>{{$directiva->Puesto}}</td>
        <td>
            <form action="{{ route ('directiva.destroy', $directiva->id) }}" method="POST">
                <a class="btn btn-info" href="directiva/{{$directiva->id}}/edit">editar</a>
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">eliminar</button>
            </form>
        </td>

    </tr>
    @endforeach
</tbody>
</table>
@endsection
