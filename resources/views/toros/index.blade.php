@extends("layout")

@section("content")

@if (session('success'))
<div class="row">
  <div class="col-12 col-lg-12">
    <div class="alert alert-success">
      {{ session('success') }}
    </div>
  </div>
</div>
@endif

@if (session('error'))
<div class="row">
  <div class="col-12 col-lg-12">

    <div class="alert alert-error">
      {{ session('error') }}
    </div>
  </div>
</div>
@endif

<a href="/index" class="btn btn-primary btn-block mt-3" name="button"> <h3>Volver</h3> </a>
<a href="/toros/create" class="btn btn-primary btn-block mb-3" name="button"> <h3>Cargar nuevo toro</h3> </a>

<div class="row" style="width:60%;margin-left:20%">
  <div class="col-12 col-lg-12">
    <div class="card">
      <div class="card-header text-center">
        <h1>Toros cargados</h1>
      </div>
      @foreach($toros as $toro)
      <div class="card-body" style="text-align:center">
          <div class="row">
            <div class="col-12 col-lg-12">
              <ul class="list-group">
                <li class="list-group-item"><h3>{{$toro->nombre}}</h3></li>
                <div class="row">
                  <div class="col-12 col-lg-12">
                    <a href="/toros/{{$toro->id}}/edit"class="btn btn-primary btn-block" name="button"> <h3>Editar</h3> </a>
                  </div>
                </div>
              </ul>
            </div>
          </div>
      </div>
      @endforeach
    </div>
  </div>
</div>
@endsection
