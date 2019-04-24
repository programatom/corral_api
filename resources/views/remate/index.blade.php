@extends("layout")

@section("title","Remates")
@section("content")

<div class="row">
  <div class="col-12 col-lg-12">
    @if(session("success"))
    <div class="alert alert-success">
      {{session("success")}}
    </div>
    @endif
  </div>
</div>

<a href="/index" class="btn btn-primary btn-block"><h3>Volver</h3></a>
<a href="/remate/create" class="btn btn-primary btn-block"><h3>Cargar nuevo remate</h3></a>






<div class="row" style="width:80%;margin-left:10%">
  <div class="col-12 col-lg-12" style="margin-top:1em">
    <div class="card">
      <div class="card-header text-center">
        <h1>Remates cargados</h1>
      </div>
      @foreach($remates as $remate)
      <div class="card-body" style="text-align:center">
        <ul class="list-group">
          <li class="list-group-item">
            <h3><strong>Remate Nº</strong> {{$remate->id}}</h3> <br>
            <h3><strong>Fecha:</strong> {{$remate->dia}} {{$remate->fecha}} de {{$remate->mes}}</h3> <br>
            <h3><strong>Descripcion:</strong> {{$remate->subtitulo}}</h3> <br>
            <a href="/remate/{{$remate->id}}/edit" class="btn btn-primary btn-block"><h3>Editar</h3></a>
          </li>
        </ul>
      </div>
      @endforeach
    </div>
  </div>
</div>
@endsection
