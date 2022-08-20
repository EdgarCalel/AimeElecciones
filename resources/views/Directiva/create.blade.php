@extends('layouts.plantillabase');

@section('contenido')
<link rel="stylesheet" href="{{ asset('css/createUsers.css') }}">
    <div class="registerDirectiva">
      <div class="registerDirectiva1 col-8 ">
      <div class="form-wrapper">
    <div class="container form-page-center">
      <div class="row justify-content-center">
        <div class="col-lg-10">
          <h1 class="pb-5 text-center">crear registros</h1>
          <form action="/directiva"  method="post" enctype="multipart/form-data">
    @csrf
            <div class="row">
              <div class="col-md-6 mb-3">
                <div class="form-group">
                  <input type="text" class="form-control form-control-lg" placeholder="Nombres" id="nombres" name="nombres" tabindex="1" required>
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <div class="form-group">
                <input type="text" class="form-control form-control-lg" placeholder="Nombres" id="apellidos" name="apellidos" tabindex="1" required>
                </div>
              </div>
             
              <div class="col-md-4">
                <div class="form-group">
                <input type="text" class="form-control form-control-lg" placeholder="puesto" id="puesto" name="puesto" tabindex="1">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                <!-- <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
  <option selected>Grado</option>
  <option value="1">Primero</option>
  <option value="2">Segundo</option>
  <option value="3">Tercero</option>
</select> -->
                <input type="text" class="form-control form-control-lg" placeholder="Grado" id="grado" name="Grado" tabindex="1" required>
                </div>
              </div>
              <div class="col-md-4 mb-3">
                <div class="form-group">
                <input type="text" class="form-control form-control-lg" placeholder="Seccion" id="seccion" name="seccion" tabindex="1" required>
                </div>
              </div>
              <div>

              <label class="file">
  <input type="file" name="imagen" id="imagen" class="hidden mb-3 custom-file-input" aria-label="File browser example">
  <span class="file-custom"></span>
</label>

  </div>
  <div class="row ">
    <div class="col">
      <a href="/directiva" class="btn btn-primary" tabindex="6">Cancelar</a>
    </div>
    <div class="col">
      <button type="submit" class="btn btn-success" tabindex="7">Guardar</button>
    </div>
  </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
      </div>
      <div class="registerDirectiva2 col-4 ">
      <div>
    <img id="imagenSeleccionada" src="https://monstar-lab.com/global/wp-content/uploads/sites/11/2019/04/male-placeholder-image.jpeg" style="width: 300px" >
  </div>
      </div>
    </div>



@endsection

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
