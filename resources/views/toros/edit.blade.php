@extends("layout")

@section("title","Toro")
@section("content")

<div class="row mt-3 mb-3">
  <div class="col-12 col-lg-12">
    <a href="/toros" class="btn btn-primary btn-block"> <h3>Volver</h3></a>
  </div>
</div>

@if (session('success'))
<div class="row">
  <div class="col-12 col-lg-12">
    <div class="alert alert-success">
      {{ session('success') }}
    </div>
  </div>
</div>
@endif

<div class="row">
  <div class="col-12 col-lg-12" style="text-align:center">
    <h3 class="jumbotron">{{$toro->nombre}}</h3>
  </div>
</div>
<form class="" action="/toros/{{ $toro->id }}" method="POST">
  {{ method_field("PATCH")}}
  {{ csrf_field ()}}

  <div class="row">
    <div class="col-12 col-lg-12">
      @if ($errors->any())
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
      @endif
    </div>
  </div>

  <div class="row">
    <div class="col-12 col-lg-4">
      <div class="card">
        <div class="card-body">
          <h3 class="jumbotron">Datos toro</h3>
          <div class="null">
            <div class="form-group">
              <label>nombre</label>
              <input type="text" name="nombre" value="{{ $toro->nombre }}" class="form-control"></input>
            </div>
            <div class="form-group">
              <label>raza</label>
              <input type="text" name="raza" value="{{ $toro->raza }}" class="form-control"></input>
            </div>
            <div class="form-group">
              <label>descripcion</label>
              <textarea type="text" name="descripcion" class="form-control textarea" aria-aria-describedby="descripcion">{{ $toro->descripcion }}</textarea>
              <small id="descripcion" class="form-text text-muted">Ingresar un ≈ para separar titulo de texto</small>
            </div>
            <div class="form-group">
              <label>padre</label>
              <input type="text" name="padre" value="{{ $toro->padre }}" class="form-control"></input>
            </div>
            <div class="form-group">
              <label>madre</label>
              <input type="text" name="madre" value="{{ $toro->madre }}" class="form-control"></input>
            </div>
            <div class="form-group">
              <label>abuela paterna</label>
              <input type="text" name="abuela_paterna" value="{{ $toro->abuela_paterna }}" class="form-control"></input>
            </div>
            <div class="form-group">
              <label>abuelo materno</label>
              <input type="text" name="abuelo_materno" value="{{ $toro->abuelo_materno }}" class="form-control"></input>
            </div>
            <div class="form-group">
              <label>abuela materna</label>
              <input type="text" name="abuela_materna" value="{{ $toro->abuela_materna }}" class="form-control"></input>
            </div>
            <div class="form-group">
              <label>abuela materna</label>
              <input type="text" name="abuela_materna" value="{{ $toro->abuela_materna }}" class="form-control"></input>
            </div>
          </div>
        </div>
      </div>

    </div>
    <div class="col-12 col-lg-4">
      <div class="card">
        <div class="card-body">
          <h3 class="jumbotron">Datos técnicos toro 1</h3>
          <div class="null">
            <div class="form-group">
              <label>pn_prc</label>
              <input type="text" name="pn_prc" value="{{ $toro->pn_prc }}" class="form-control"></input>
            </div>
            <div class="form-group">
              <label>pd_prc</label>
              <input type="text" name="pd_prc" value="{{ $toro->pd_prc }}" class="form-control"></input>
            </div>
            <div class="form-group">
              <label>am_prc</label>
              <input type="text" name="am_prc" value="{{ $toro->am_prc }}" class="form-control"></input>
            </div>
            <div class="form-group">
              <label>lyc_prc</label>
              <input type="text" name="lyc_prc" value="{{ $toro->lyc_prc }}" class="form-control"></input>
            </div>
            <div class="form-group">
              <label>pf_prc</label>
              <input type="text" name="pf_prc" value="{{ $toro->pf_prc }}" class="form-control"></input>
            </div>
            <div class="form-group">
              <label>ce_prc</label>
              <input type="text" name="ce_prc" value="{{ $toro->ce_prc }}" class="form-control"></input>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-12 col-lg-4">
      <div class="card">
        <div class="card-body">
          <h3 class="jumbotron">Datos técnicos toro 2</h3>
          <div class="null">
            <div class="form-group">
              <label>pn_dep</label>
              <input type="text" name="pn_dep" value="{{ $toro->pn_dep }}" class="form-control"></input>
            </div>
            <div class="form-group">
              <label>pd_dep</label>
              <input type="text" name="pd_dep" value="{{ $toro->pd_dep }}" class="form-control"></input>
            </div>
            <div class="form-group">
              <label>am_dep</label>
              <input type="text" name="am_dep" value="{{ $toro->am_dep }}" class="form-control"></input>
            </div>
            <div class="form-group">
              <label>lyc_dep</label>
              <input type="text" name="lyc_dep" value="{{ $toro->lyc_dep }}" class="form-control"></input>
            </div>
            <div class="form-group">
              <label>pf_dep</label>
              <input type="text" name="pf_dep" value="{{ $toro->pf_dep }}" class="form-control"></input>
            </div>
            <div class="form-group">
              <label>ce_dep</label>
              <input type="text" name="ce_dep" value="{{ $toro->ce_dep }}" class="form-control"></input>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-12 col-lg-4">
      <div class="card">
        <div class="card-body">
          <h3 class="jumbotron">Datos técnicos toro 3</h3>
          <div class="null">
            <div class="form-group">
              <label>ficha_rp</label>
              <input type="text" name="ficha_rp" value="{{ $toro->ficha_rp }}" class="form-control"></input>
            </div>
            <div class="form-group">
              <label>ficha_hba</label>
              <input type="text" name="ficha_hba" value="{{ $toro->ficha_hba }}" class="form-control"></input>
            </div>
            <div class="form-group">
              <label>ficha_registro</label>
              <input type="text" name="ficha_registro" value="{{ $toro->ficha_registro }}" class="form-control"></input>
            </div>
            <div class="form-group">
              <label>ficha_fn</label>
              <input type="text" name="ficha_fn" value="{{ $toro->ficha_fn }}" class="form-control"></input>
            </div>
            <div class="form-group">
              <label>ficha_ts</label>
              <input type="text" name="ficha_ts" value="{{ $toro->ficha_ts }}" class="form-control"></input>
            </div>
            <div class="form-group">
              <label>ficha_adn</label>
              <input type="text" name="ficha_adn" value="{{ $toro->ficha_adn }}" class="form-control"></input>
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="col-12 col-lg-4">
      <div class="card">
        <div class="card-body">
          <h3 class="jumbotron">Datos técnicos toro 4</h3>
          <div class="null">
            <div class="form-group">
              <label>carc_ce</label>
              <input type="text" name="carc_ce" value="{{ $toro->carc_ce }}" class="form-control"></input>
            </div>
            <div class="form-group">
              <label>carc_peso</label>
              <input type="text" name="carc_peso" value="{{ $toro->carc_peso }}" class="form-control"></input>
            </div>
            <div class="form-group">
              <label>carc_largog</label>
              <input type="text" name="carc_largog" value="{{ $toro->carc_largog }}" class="form-control"></input>
            </div>
            <div class="form-group">
              <label>carc_anchog</label>
              <input type="text" name="carc_anchog" value="{{ $toro->carc_anchog }}" class="form-control"></input>
            </div>
            <div class="form-group">
              <label>carc_altog</label>
              <input type="text" name="carc_altog" value="{{ $toro->carc_altog }}" class="form-control"></input>
            </div>
            <div class="form-group">
              <label>carc_largo</label>
              <input type="text" name="carc_largo" value="{{ $toro->carc_largo }}" class="form-control"></input>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-12 col-lg-4">
      <div class="card">
        <div class="card-body">
          <h3 class="jumbotron">Datos técnicos toro 5</h3>
          <div class="null">
            <div class="form-group">
              <label>ranking_estructura</label>
              <input type="text" name="ranking_estructura" value="{{ $toro->ranking_estructura }}" class="form-control"></input>
            </div>
            <div class="form-group">
              <label>ranking_musculatura</label>
              <input type="text" name="ranking_musculatura" value="{{ $toro->ranking_musculatura }}" class="form-control"></input>
            </div>
            <div class="form-group">
              <label>ranking_profundidad</label>
              <input type="text" name="ranking_profundidad" value="{{ $toro->ranking_profundidad }}" class="form-control"></input>
            </div>
            <div class="form-group">
              <label>ranking_precocidad</label>
              <input type="text" name="ranking_precocidad" value="{{ $toro->ranking_precocidad }}" class="form-control"></input>
            </div>
            <div class="form-group">
              <label>ranking_prepucio</label>
              <input type="text" name="ranking_prepucio" value="{{ $toro->ranking_prepucio }}" class="form-control"></input>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <br><br>
  <div class="row">
    <div class="col-12 col-lg-12">
      <button type="submit" class="btn btn-primary btn-block"> <h3>Guardar toro</h3></button>
    </div>
  </div>
</form>

<div class="row">
  <div class="col-12 col-lg-12">
    <div class="card">
      <div class="card-body">
        <a name="imagenes_secundarias" style="visibility:hidden"></a>
        <h3 class="jumbotron">Imagenes secundarias</h3>
        @if (session('imagenes_secundarias'))
        <div class="row">
          <div class="col-12 col-lg-12">
            <div class="alert alert-success">
              {{ session('imagenes_secundarias') }}
            </div>
          </div>
        </div>
        @endif
        <form method="post" action="{{url('upload_photo')}}" enctype="multipart/form-data" class="mb-3">
          {{csrf_field()}}
          <input type="hidden" name="path" value="{{'toros/'.$toro->id.'/imagenes_secundarias'}}">

          <input type="hidden" name="session" value="imagenes_secundarias">

          <input type="hidden" name="session_msg" value="Se cargaron la imagenes secundarias con éxito">

          <div class="input-group control-group increment2" >
            <input type="file" name="filename[]" class="form-control">
          </div>
          <button type="submit" class="btn btn-primary" style="margin-top:10px">Cargar imagen</button>
        </form>
        <ul class="list-group">
          @foreach($fotos_toro as $foto)

          <div class="row">
            <div class="col-8">
              <li class="list-group-item">
                {{$foto}}
              </li>
            </div>
            <div class="col-4">
              <form action="{{url('delete_photo')}}" method="POST">
                   @csrf
                   <input type="hidden" name="path" value="{{storage_path('app/public').'/'.$foto}}">
                   <input type="hidden" name="session_key" value="imagenes_secundarias">

                   <button type="submit" class="btn btn-danger btn-block">Eliminar</button>
                 </form>
            </div>
          </div>
          @endforeach
        </ul>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-12 col-lg-12">
    <a name="imagen_principal" style="visibility:hidden;"></a>
    <a name="video" style="visibility:hidden;"></a>

    <div class="card">
      <div class="card-body" style="text-align:center">
        <h3 class="jumbotron">Imagen principal y video</h3>
        <div class="row">
          <div class="col-12 col-lg-6">
            <div class="card">
              <div class="card-body">
                <h3 class="jumbotron">Imagen principal</h3>
                @if (session('imagen_principal'))
                <div class="row">
                  <div class="col-12 col-lg-12">
                    <div class="alert alert-success">
                      {{ session('imagen_principal') }}
                    </div>
                  </div>
                </div>
                @endif
                <form method="POST" action="{{url('upload_photo')}}" enctype="multipart/form-data">
                  {{csrf_field()}}
                  <input type="hidden" name="path" value="{{'toros/'.$toro->id.'/imagen_principal'}}">

                  <input type="hidden" name="session" value="imagen_principal">

                  <input type="hidden" name="session_msg" value="Se cargó la imagen con principal éxito">
                  <input type="hidden" name="clean_dir" value="1">


                  <div class="form-group control-group" >
                    <input type="file" name="filename[]" class="form-control">
                  </div>

                  <button type="submit" class="btn btn-primary" style="margin-top:10px">Cargar imagen principal</button>
                </form>
              </div>
            </div>
          </div>

          <div class="col-12 col-lg-6">
            <div class="card">
              <div class="card-body">
                <h3 class="jumbotron">Video</h3>
                @if (session('video'))
                <div class="row">
                  <div class="col-12 col-lg-12">
                    <div class="alert alert-success">
                      {{ session('video') }}
                    </div>
                  </div>
                </div>
                @endif
                <form method="POST" action="{{url('upload_photo')}}" enctype="multipart/form-data">
                  {{csrf_field()}}
                  <input type="hidden" name="path" value="{{'toros/'.$toro->id.'/video'}}">

                  <input type="hidden" name="session" value="video">

                  <input type="hidden" name="session_msg" value="Se cargó el video con éxito">
                  <input type="hidden" name="clean_dir" value="1">

                  <div class="form-group control-group" >
                    <input type="file" name="filename[]" class="form-control">
                  </div>

                  <button type="submit" class="btn btn-primary" style="margin-top:10px">Cargar video</button>
                </form>
              </div>
            </div>
          </div>


        </div>
      </div>
    </div>
  </div>
</div>


<br><br>

<form class="delete" action="/toros/{{$toro->id}}" method="POST">
  {{ csrf_field() }}
  {{ method_field("DELETE")}}
  <div class="row">
    <div class="col-12 col-lg-12">
      <button type="submit" class="btn btn-danger btn-block" name="button"> <h3>Eliminar toro</h3> </button>
    </div>
  </div>
</form>

<script>
    $(".delete").on("submit", function(){
        return confirm("Seguro desea eliminar este toro?");
    });
</script>

@endsection
