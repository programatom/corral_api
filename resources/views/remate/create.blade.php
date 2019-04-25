@extends("layout")
@section("title", "Remate")

@section("content")

<a href="/remate" class="btn btn-primary btn-block mb-3 mt-3"><h3>Volver</h3></a>
<div class="row">
  <div class="col-12 col-lg-12" style="text-align:center">
    <div class="card" style="display:inline-block">
      <div class="card-header">
        <h1>Nuevo remate</h1>
      </div>
      <div class="card-body">
        <form method="POST" action="/remate">
          {{ csrf_field() }}
          <div class="row">

            <div class="col-6 col-lg-6 col-md-6">

              <div class="form-group">
                <label for="dia">Dia</label>
                <input type="text" class="form-control" id="dia" aria-describedby="diaHelp" name="dia">
                <small id="diaHelp" class="form-text text-muted">ej. Lunes</small>
              </div>
              <div class="form-group">
                <label for="fecha1">Fecha</label>
                <input type="text" class="form-control" id="fecha1" aria-describedby="fechaHelp" name="fecha">
                <small id="fechaHelp" class="form-text text-muted">ej. 07</small>
              </div>
              <div class="form-group">
                <label for="mes1">Mes</label>
                <input type="text" class="form-control" name="mes">
              </div>
              <div class="form-group">
                <label for="ubicacion1">Año</label>
                <input type="text" class="form-control" name="anno">
              </div>
              <div class="form-group">
                <label for="ubicacion1">Ubicacion</label>
                <input type="text" class="form-control" name="ubicacion">
              </div>
            </div>
            <div class="col-6 col-lg-6 col-md-6">
              <div class="form-group">
                <label for="ubicacion1">Subtitulo</label>
                <textarea type="text" class="form-control" name="subtitulo"></textarea>

              </div>
              <div class="form-group">
                <label for="ubicacion1">Hora Almuerzo</label>
                <input type="text" class="form-control" aria-describedby="almuerzoHelp" name="hora_almuerzo">
                <small id="almuerzoHelp" class="form-text text-muted">ej. 15</small>
              </div>
              <div class="form-group">
                <label for="ubicacion1">Hora Ventas</label>
                <input type="text" class="form-control" name="hora_ventas">
              </div>
              <div class="form-group">
                <label for="ubicacion1">Mensaje Adicional</label>
                <input type="text" class="form-control" name="mensaje_adicional">
              </div>
              <div class="form-group">
                <label for="ubicacion1">Rematador</label>
                <input type="text" class="form-control" name="rematador">
              </div>
              <div class="form-check">
               <input type="checkbox" class="form-check-input" id="exampleCheck1" name="activo">
               <label class="form-check-label" for="exampleCheck1">Activo</label>
             </div>
            </div>
          </div>
          <button type ="submit" class="btn btn-success btn-block">
            <h4>Crear remate</h4>
          </button>
        </form>
      </div>
    </div>
  </div>
@endsection
