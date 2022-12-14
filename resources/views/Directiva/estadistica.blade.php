@extends('layouts.plantillabase');

@section('contenido')
<link rel="stylesheet" href="{{ asset('css/createUsers.css') }}">
<a href="directiva/create" class="btn btn-primary">Crear miembros de junta directiva</a>
<a href="directiva/create" class="btn btn-primary">Votar</a>


<table class="table table-striped table-dark mt-4">
<thead>
    <tr>
        <th scope="col">Id</th>
        <th scope="col">Nombres</th>
        <th scope="col">Apellidos</th>
        <th scope="col">Grado</th>
        <th scope="col">Seccion</th>
        <th scope="col">Puesto</th>
        <th scope="col">votos</th>
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
        <td>{{$directiva->votos}}</td>
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
<hr>

<!-- <div class="container p-5">
    <div class="row row-cols-1 row-cols-xs-2 row-cols-sm-2 row-cols-lg-4 g-3">
            @foreach($directivas as $directiva)
            <div class="col">
                <div class="card h-100 shadow-sm">
                    <div class="text-center">
                        <div class="img-hover-zoom img-hover-zoom--colorize">
                            <img class="shadow" src="/imagen/{{$directiva->imagen}}" width="60%">
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="clearfix mb-3">
                        </div>
                        <div class="my-2 text-center">
                           <h1>{{$directiva->nombres}} </h1>
                        </div>
                        <div class="mb-3">
                            <h2 class="text-uppercase text-center role">{{$directiva->apellidos}}</h2>
                        </div>
                        <div class="box contentBoton">
                        
                        <a class="btn btn-danger" href="directiva/{{$directiva->id}}/edit">Votar</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    </div> -->
@endsection
