@extends("layout")
@section("title", "Login")

@section("content")
<div class="card" style="width:30%; margin:0 auto">
  <div class="card-header text-center">
    Iniciar sesión
  </div>
  <div class="card-body">
    <div class="row">
      <div class="col-12 col-lg-12">
        @if(session("success"))
        <div class="alert alert-success" role="alert">
          {{session("success")}}
        </div>
        @endif
      </div>
    </div>
    <div class="row">
      <div class="col-12 col-lg-12">
        @if(session("fail"))
        <div class="alert alert-danger" role="alert">
          {{session("fail")}}
        </div>
        @endif
      </div>
    </div>
    <form action="{{url('login')}}" method="post">
      @csrf
      <div class="form-group">
        <label for="usuario">Usuario</label>
        <input type="text" class="form-control" id="usuario" name="email">
      </div>
      <div class="form-group">
        <label for="contrasenna">Contraseña</label>
        <input type="password" class="form-control" id="contrasenna" name="password">
      </div>
      <button type="submit" class="btn btn-primary">Iniciar sesión</button>
    </form>
  </div>
  <div class="card-footer text-muted">
    Corral de guardia
  </div>
</div>
@endsection
