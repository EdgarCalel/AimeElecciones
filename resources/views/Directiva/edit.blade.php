@extends('layouts.plantillabase')

@section('contenido')
<h2>editar registros</h2>
<form action="/directiva/{{$directiva->id}}"  method="post">

    @csrf
    @method('PUT')
<div class="mb-3">
    <label class="form-label">Nombres</label>
    <input type="text" class="form-control" id="nombres" name="nombres" tabindex="1" value="{{$directiva->nombres}}">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Apellidos</label>
    <input type="text" class="form-control" id="apellidos" name="apellidos" tabindex="2" value="{{$directiva->apellidos}}">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">votos</label>
    <input type="number" class="form-control" id="votos" name="votos" tabindex="3" value="{{$directiva->votos}}">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Grado</label>
    <input type="text" class="form-control" id="grado" name="Grado" tabindex="4" value="{{$directiva->Grado}}">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Seccion</label>
    <input type="text" class="form-control" id="seccion" name="seccion" tabindex="5" value="{{$directiva->seccion}}">
  </div>
<a href="/directiva" class="btn btn-secondary" tabindex="6">Cancelar</a>
  <button type="submit" class="btn btn-primary" tabindex="7">Submit</button>
</form>
@endsection
