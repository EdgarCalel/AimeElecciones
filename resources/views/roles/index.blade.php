@extends('layouts.plantillabase');

@section('contenido')
<h1>roles</h1>
@foreach($roles as $roles)

<h1>{{$roles->name}}</h1>
<h1>{{$roles->id}}</h1>

@endforeach
@endsection