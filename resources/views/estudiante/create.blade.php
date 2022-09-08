@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Crear</h1>
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
            <form class="row g-3" action="/estudiante" method="POST" enctype="multipart/form-data">
                @csrf
              
                <div class="col-md-6">
                    <label for="inputEmail4" class="form-label">Nombre</label>
                    <input id="nombre" name="nombre" type="text" class="form-control" ">
                    </div>
                    <div class="col-md-6">
                        <label for="inputPassword4" class="form-label">Apellido</label>
                        <input id="apellido" name="apellido" type="text" class="form-control" >
                    </div>

                    <div class="col-md-4">
                        <label for="inputPassword4" class="form-label">Escolaridad</label>
                        <select name="escolaridad" class=" form-control form-select form-select-sm col-md-12">
                            <option selected>Selecciona escolaridad</option>
                            <option value="Secundaria">Secundaria</option>
                            <option value="Diversificado">Diversificado</option>
                         </select>
                    </div>
                    <div class="col-md-4">
                        <label for="inputPassword4" class="form-label">grado</label>
                        <select name="grado" class="form-control form-select-md col-md-12">
                            <option selected>Selecciona escolaridad</option>
                             @foreach ($gradoSel as $item)
                    <option  value="{{ $item->id }}">{{ $item->nombre_grado }} {{ $item->seccion }}</option>
                    
                    @endforeach
                    </select>
                </div>
                    <div class="col-md-4">
                        <label for="inputPassword4" class="form-label">Codigo votacion</label>
                        <input id="codigo_votacion" name="codigo_votacion" type="text" class="form-control" value="{{ $codRandom }}" disabled >
                    </div>
<div class="justify-content-center align-item-center col-md-12">

    <div id="formColors" class="mt-3 col-md-12 ">
        
                    <label class="file">
                        <input type="file" name="imagen" id="imagen" class="hidden mb-3 custom-file-inputs"
                            aria-label="File browser example">
                        <span id="file-custom"></span>
                    </label>
                </div>
                <div class="registerDirectiva2 col-md-12 mt-3 justify-content-center align-item-center ">
                    <div class="justify-content-center align-center">
                  <img class="img-responsive" id="imagenSeleccionada" src="https://monstar-lab.com/global/wp-content/uploads/sites/11/2019/04/male-placeholder-image.jpeg" style="width: 300px" >
                </div>
                    </div>

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
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
       $(document).ready(function (e){
        $('#imagen').change(function() {
            let reader = new FileReader();
            reader.onload = (e)=>{
                $('#imagenSeleccionada').attr('src', e.target.result)
            }
            reader.readAsDataURL(this.files[0]);
        })
    })
    </script>
@stop
