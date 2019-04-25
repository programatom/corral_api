@extends("layout")

@section("title","Nuevo toro")
@section("content")
<div class="row mt-3 mb-3">
  <div class="col-12 col-lg-12">
    <a href="/toros" class="btn btn-primary btn-block"> <h3>Volver</h3></a>
  </div>
</div>

<div class="row">
  <div class="col-12 col-lg-12" style="text-align:center">
    <h3 class="jumbotron">Nuevo toro</h3>
  </div>
</div>
<form class="" action="/toros" method="POST">
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
          <div>
            <div class="form-group">
              <label>nombre</label>
              <input type="text" name="nombre" class="form-control" value="{{ old('nombre') }}"></input>
            </div>
            <div class="form-group">
              <label>raza</label>
              <input type="text" name="raza" value="{{old('raza')}}" class="form-control"></input>
            </div>
            <div class="form-group">
              <label>descripcion</label>
              <textarea type="text" name="descripcion" class="form-control textarea" aria-aria-describedby="descripcion">{{old('descripcion')}}</textarea>
              <small id="descripcion" class="form-text text-muted">Ingresar un ≈ para separar titulo de texto</small>
            </div>
            <div class="form-group">
              <label>padre</label>
              <input type="text" name="padre" value="{{old('padre')}}" class="form-control"></input>
            </div>
            <div class="form-group">
              <label>madre</label>
              <input type="text" name="madre" value="{{old('madre')}}" class="form-control"></input>
            </div>
            <div class="form-group">
              <label>abuela paterna</label>
              <input type="text" name="abuela_paterna" value="{{old('abuela_paterna')}}" class="form-control"></input>
            </div>
            <div class="form-group">
              <label>abuelo materno</label>
              <input type="text" name="abuelo_materno" value="{{old('abuelo_materno')}}" class="form-control"></input>
            </div>
            <div class="form-group">
              <label>abuela materna</label>
              <input type="text" name="abuela_materna" value="{{old('abuela_materna')}}" class="form-control"></input>
            </div>
            <div class="form-group">
              <label>abuela materna</label>
              <input type="text" name="abuela_materna" value="{{old('abuela_materna')}}" class="form-control"></input>
            </div>
          </div>
        </div>
      </div>

    </div>
    <div class="col-12 col-lg-4">
      <div class="card">
        <div class="card-body">
          <h3 class="jumbotron">Datos técnicos toro 1</h3>
          <div>
            <div class="form-group">
              <label>pn_prc</label>
              <input type="text" name="pn_prc" value="{{old('pn_prc')}}" class="form-control"></input>
            </div>
            <div class="form-group">
              <label>pd_prc</label>
              <input type="text" name="pd_prc" value="{{old('pd_prc')}}" class="form-control"></input>
            </div>
            <div class="form-group">
              <label>am_prc</label>
              <input type="text" name="am_prc" value="{{old('am_prc')}}" class="form-control"></input>
            </div>
            <div class="form-group">
              <label>lyc_prc</label>
              <input type="text" name="lyc_prc" value="{{old('lyc_prc')}}" class="form-control"></input>
            </div>
            <div class="form-group">
              <label>pf_prc</label>
              <input type="text" name="pf_prc" value="{{old('pf_prc')}}" class="form-control"></input>
            </div>
            <div class="form-group">
              <label>ce_prc</label>
              <input type="text" name="ce_prc" value="{{old('ce_prc')}}" class="form-control"></input>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-12 col-lg-4">
      <div class="card">
        <div class="card-body">
          <h3 class="jumbotron">Datos técnicos toro 2</h3>
          <div>
            <div class="form-group">
              <label>pn_dep</label>
              <input type="text" name="pn_dep" value="{{old('pn_dep')}}" class="form-control"></input>
            </div>
            <div class="form-group">
              <label>pd_dep</label>
              <input type="text" name="pd_dep" value="{{old('pd_dep')}}" class="form-control"></input>
            </div>
            <div class="form-group">
              <label>am_dep</label>
              <input type="text" name="am_dep" value="{{old('am_dep')}}" class="form-control"></input>
            </div>
            <div class="form-group">
              <label>lyc_dep</label>
              <input type="text" name="lyc_dep" value="{{old('lyc_dep')}}" class="form-control"></input>
            </div>
            <div class="form-group">
              <label>pf_dep</label>
              <input type="text" name="pf_dep" value="{{old('pf_dep')}}" class="form-control"></input>
            </div>
            <div class="form-group">
              <label>ce_dep</label>
              <input type="text" name="ce_dep" value="{{old('ce_dep')}}" class="form-control"></input>
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
          <div>
            <div class="form-group">
              <label>ficha_rp</label>
              <input type="text" name="ficha_rp" value="{{old('ficha_rp')}}" class="form-control"></input>
            </div>
            <div class="form-group">
              <label>ficha_hba</label>
              <input type="text" name="ficha_hba" value="{{old('ficha_hba')}}" class="form-control"></input>
            </div>
            <div class="form-group">
              <label>ficha_registro</label>
              <input type="text" name="ficha_registro" value="{{old('ficha_registro')}}" class="form-control"></input>
            </div>
            <div class="form-group">
              <label>ficha_fn</label>
              <input type="text" name="ficha_fn" value="{{old('ficha_fn')}}" class="form-control"></input>
            </div>
            <div class="form-group">
              <label>ficha_ts</label>
              <input type="text" name="ficha_ts" value="{{old('ficha_ts')}}" class="form-control"></input>
            </div>
            <div class="form-group">
              <label>ficha_adn</label>
              <input type="text" name="ficha_adn" value="{{old('ficha_adn')}}" class="form-control"></input>
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="col-12 col-lg-4">
      <div class="card">
        <div class="card-body">
          <h3 class="jumbotron">Datos técnicos toro 4</h3>
          <div>
            <div class="form-group">
              <label>carc_ce</label>
              <input type="text" name="carc_ce" value="{{old('carc_ce')}}" class="form-control"></input>
            </div>
            <div class="form-group">
              <label>carc_peso</label>
              <input type="text" name="carc_peso" value="{{old('carc_peso')}}" class="form-control"></input>
            </div>
            <div class="form-group">
              <label>carc_largog</label>
              <input type="text" name="carc_largog" value="{{old('carc_largog')}}" class="form-control"></input>
            </div>
            <div class="form-group">
              <label>carc_anchog</label>
              <input type="text" name="carc_anchog" value="{{old('carc_anchog')}}" class="form-control"></input>
            </div>
            <div class="form-group">
              <label>carc_altog</label>
              <input type="text" name="carc_altog" value="{{old('carc_altog')}}" class="form-control"></input>
            </div>
            <div class="form-group">
              <label>carc_largo</label>
              <input type="text" name="carc_largo" value="{{old('carc_largo')}}" class="form-control"></input>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-12 col-lg-4">
      <div class="card">
        <div class="card-body">
          <h3 class="jumbotron">Datos técnicos toro 5</h3>
          <div>
            <div class="form-group">
              <label>ranking_estructura</label>
              <input type="text" name="ranking_estructura" value="{{old('ranking_estructura')}}" class="form-control"></input>
            </div>
            <div class="form-group">
              <label>ranking_musculatura</label>
              <input type="text" name="ranking_musculatura" value="{{old('ranking_musculatura')}}" class="form-control"></input>
            </div>
            <div class="form-group">
              <label>ranking_profundidad</label>
              <input type="text" name="ranking_profundidad" value="{{old('ranking_profundidad')}}" class="form-control"></input>
            </div>
            <div class="form-group">
              <label>ranking_precocidad</label>
              <input type="text" name="ranking_precocidad" value="{{old('ranking_precocidad')}}" class="form-control"></input>
            </div>
            <div class="form-group">
              <label>ranking_prepucio</label>
              <input type="text" name="ranking_prepucio" value="{{old('ranking_prepucio')}}" class="form-control"></input>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <br><br>
  <div class="row">
    <div class="col-12 col-lg-12">
      <button type="submit" class="btn btn-primary btn-block"> <h3>Crear toro</h3></button>
    </div>
  </div>
</form>

@endsection
