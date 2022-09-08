@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Modificar estudiante</h1>
@stop

@section('content')


<div class="card">

    <div class="card-body">
 
        <form class="row g-3" action="/estudiante/{{$user->id}}" method="POST">
            @csrf    
            @method('PUT')
                <div class="col-md-6">
              <label for="inputEmail4" class="form-label">Nombre</label>
              <input id="nombre" name="nombre" type="text" class="form-control" value="{{$user->nombre}}">
            </div>
            <div class="col-md-6">
              <label for="inputPassword4" class="form-label">Apellido</label>
              <input id="apellido" name="apellido" type="text" class="form-control" value="{{$user->apellido}}">
            </div>
            <div class="col-md-6">
                <label for="inputEmail4" class="form-label">Escolaridad</label>
                <input id="escolaridad" name="escolaridad" type="text" class="form-control" value="{{$user->escolaridad}}">
              </div>
              <div class="justify-content-center align-item-center col-md-12">

                <div id="formColors" class="mt-3 col-md-12 ">
                    
                                <label class="file">
                                    <input type="file" name="foto_perfil" id="foto_perfil" class="hidden mb-3 custom-file-inputs"
                                        aria-label="File browser example">
                                    <span id="file-custom"></span>
                                </label>
                            </div>
                            <div class="registerDirectiva2 col-md-12 mt-3 justify-content-center align-item-center ">
                                <div class="justify-content-center align-center">
                              <img src={{$user->foto_perfil}} class="img-responsive" id="imagenSeleccionada" src="https://monstar-lab.com/global/wp-content/uploads/sites/11/2019/04/male-placeholder-image.jpeg" style="width: 300px" >
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
        $('#foto_perfil').change(function() {
            let reader = new FileReader();
            reader.onload = (e)=>{
                $('#imagenSeleccionada').attr('src', e.target.result)
            }
            reader.readAsDataURL(this.files[0]);
        })
    })
    </script>
@stop