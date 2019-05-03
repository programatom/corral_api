@extends("layout")
@section("title", "Editar remate")

@section("content")

  @if (count($errors) > 0)
   <div class="alert alert-danger">
     <strong>Error</strong> Ocurrió algun problema con la descarga.<br><br>
     <ul>
       @foreach ($errors->all() as $error)
           <li>{{ $error }}</li>
       @endforeach
     </ul>
   </div>
   @endif

   @if(session('remate_guardado'))
   <div class="alert alert-success">
     {{session('remate_guardado')}}
   </div>
   @endif

   <div class="row" style="margin-bottom:1em">
     <div class="col-12 col-lg-12">
       <a href="/remate" class="btn btn-primary btn-block"><h3>Volver</h3></a>
     </div>
   </div>

   <div class="row">
     <div class="col-12 col-lg-12">
       <h3 class="jumbotron">Remate Nº {{$remate->id}}</h3>
     </div>
   </div>

   <div class="row">
     <div class="col-12 col-lg-12">
       <div class="card">
         <div class="card-body">
           <h3 class="jumbotron">Datos del remate</h3>
           <form method="POST" action="/remate/{{ $remate->id }}" >
             {{ method_field("PATCH")}}
             {{ csrf_field ()}}
             <div class="row">

               <div class="col-6 col-lg-6 col-md-6">

                 <div class="form-group">
                   <label for="dia">Dia</label>
                   <input type="text" class="form-control" id="dia" aria-describedby="diaHelp" name="dia" value="{{$remate->dia}}">
                   <small id="diaHelp" class="form-text text-muted">ej. Lunes</small>
                 </div>
                 <div class="form-group">
                   <label for="fecha1">Fecha</label>
                   <input type="text" class="form-control" id="fecha1" aria-describedby="fechaHelp" name="fecha" value="{{$remate->fecha}}">
                   <small id="fechaHelp" class="form-text text-muted">ej. 07</small>
                 </div>
                 <div class="form-group">
                   <label for="mes1">Mes</label>
                   <input type="text" class="form-control" name="mes" value="{{$remate->mes}}">
                 </div>
                 <div class="form-group">
                   <label for="ubicacion1">Año</label>
                   <input type="text" class="form-control" name="anno" value="{{$remate->anno}}">
                 </div>
                 <div class="form-group">
                   <label for="ubicacion1">Ubicacion</label>
                   <input type="text" class="form-control" name="ubicacion" value="{{$remate->ubicacion}}">
                 </div>
               </div>
               <div class="col-6 col-lg-6 col-md-6">
                 <div class="form-group">
                   <label for="ubicacion1">Subtitulo</label>
                   <textarea type="text" class="form-control" name="subtitulo">{{$remate->subtitulo}}</textarea>

                 </div>
                 <div class="form-group">
                   <label for="ubicacion1">Hora Almuerzo</label>
                   <input type="text" class="form-control" aria-describedby="almuerzoHelp" name="hora_almuerzo" value="{{$remate->hora_almuerzo}}">
                   <small id="almuerzoHelp" class="form-text text-muted">ej. 15</small>
                 </div>
                 <div class="form-group">
                   <label for="ubicacion1">Hora Ventas</label>
                   <input type="text" class="form-control" name="hora_ventas" value="{{$remate->hora_ventas}}">
                 </div>
                 <div class="form-group">
                   <label for="ubicacion1">Mensaje Adicional</label>
                   <input type="text" class="form-control" name="mensaje_adicional" value="{{$remate->mensaje_adicional}}">
                 </div>
                 <div class="form-group">
                   <label for="ubicacion1">Rematador</label>
                   <input type="text" class="form-control" name="rematador" value="{{$remate->rematador}}">
                 </div>
                 <div class="form-check">
                  <input type="checkbox" class="form-check-input" id="exampleCheck1" name="activo" {{$remate->activo == '1'? 'checked':null}}>
                  <label class="form-check-label" for="exampleCheck1">Activo</label>
                </div>
               </div>
               <button type="submit" class="btn btn-success btn-block">
                 <h4>Guardar remate</h4>
               </button>
             </div>
           </form>
         </div>
       </div>
     </div>
     <div class="col-12 col-lg-12">
       <div class="row">
         <div class="col-12 col-lg-12">
           <div class="card">
             <div class="card-body">
               <a name="fotos_toros" style="visibility: hidden"></a>
                @if(session('fotos_toros'))
                  <div class="alert alert-success">
                     {{ session('fotos_toros') }}
                  </div>
                @endif
               <h3 class="jumbotron">Fotos toros</h3>
               <form method="post" action="{{url('upload_photo')}}" enctype="multipart/form-data" class="mb-3">
                 {{csrf_field()}}
                 <input type="hidden" name="path" value="{{'remates/'.'remate_'.$remate->id.'/fotos_toros'}}">

                 <input type="hidden" name="session" value="fotos_toros">

                 <input type="hidden" name="session_msg" value="Se cargó la imagen del toro con éxito!">

                 <div class="input-group control-group increment2" >
                   <input type="file" name="filename[]" class="form-control">
                 </div>
                 <button type="submit" class="btn btn-primary" style="margin-top:10px">Cargar imagen</button>
               </form>
               <ul class="list-group">
                 @foreach($fotos_toros as $foto)

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
                          <input type="hidden" name="session_key" value="fotos_toros">

                          <button type="submit" class="btn btn-danger btn-block">Eliminar</button>
                        </form>
                   </div>
                 </div>
                 @endforeach
               </ul>
             </div>
           </div>
         </div>
         <div class="col-12 col-lg-12">
           <div class="card">
             <div class="card-body">
               <a name="fotos_hembras" style="visibility: hidden"></a>
               @if(session('fotos_hembras'))
               <div class="alert alert-success">
                 {{ session('fotos_hembras') }}
               </div>
               @endif
               <h3 class="jumbotron">Fotos hembras</h3>
               <form method="post" action="{{url('upload_photo')}}" enctype="multipart/form-data" class="mb-3">
                 {{csrf_field()}}
                 <input type="hidden" name="path" value="{{'remates/'.'remate_'.$remate->id.'/fotos_hembras'}}">

                 <input type="hidden" name="session" value="fotos_hembras">

                 <input type="hidden" name="session_msg" value="Se cargó la imagen de la hembra con éxito!">

                 <div class="input-group control-group increment2" >
                   <input type="file" name="filename[]" class="form-control">
                 </div>
                 <button type="submit" class="btn btn-primary" style="margin-top:10px">Cargar imagen</button>
               </form>
               <ul class="list-group">
                 @foreach($fotos_hembras as $foto)

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
                          <input type="hidden" name="session_key" value="fotos_hembras">
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
     </div>



 </div>


 <a name="extension" style="visibility: hidden">Subscribe</a>

  <div class="row">

    <div class="col-12 col-lg-6">
      <div class="card">
        <div class="card-body">
          <h3 class="jumbotron">Toros a rematar</h3>

          <form action="{{url('new_remate_extension_store')}}" method="POST">
            {{ csrf_field() }}
            <input type="hidden" name="tipo" value="toro">
            <input type="hidden" name="remate_id" value="{{$remate->id}}">
            <div class="input-group control-group">
              <div class="row">
                <div class="col-6 col-lg-6">
                  <label for="input_toro_number">Nº Toros</label>
                  <input id="input_toro_number" type="number" name="cantidad" class="form-control">
                </div>
                <div class="col-6 col-lg-6">
                  <label for="toro_titulo">Nombre toros</label>
                  <input id="toro_titulo" type="text" name="nombre" class="form-control">
                </div>
              </div>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Crear</button>
          </form>

          @foreach($remate_toros as $remate_toro)
          <form action="{{url('remate_extension_update')}}" method="POST">
            {{ csrf_field() }}
            <input type="hidden" name="tipo" value="toro">
            <input type="hidden" name="extension_id" value="{{$remate_toro->id}}">
            <div class="input-group control-group">
              <div class="row">
                <div class="col-6 col-lg-6">
                  <label for="input_toro_number">Nº Toros</label>
                  <input id="input_toro_number" type="number" name="cantidad" value="{{$remate_toro->cantidad}}" class="form-control">
                </div>
                <div class="col-6 col-lg-6">
                  <label for="toro_titulo">Nombre toros</label>
                  <input id="toro_titulo" type="text" name="nombre" value="{{$remate_toro->nombre}}" class="form-control">
                </div>
              </div>
            </div>
            <button type="submit" class="btn btn-success btn-block">Guardar</button>
          </form>
          <form action="{{url('remate_extension_delete')}}" method="POST">
            @csrf
            <input type="hidden" name="tipo" value="toro">
            <input type="hidden" name="extension_id" value="{{$remate_toro->id}}">
            <button type="submit" class="btn btn-danger btn-block">Eliminar</button>
          </form>
          @endforeach

        </div>
      </div>
    </div>
    <div class="col-12 col-lg-6">
      <div class="card">
        <div class="card-body">
          <h3 class="jumbotron">Hembras a rematar</h3>

          <form action="{{url('new_remate_extension_store')}}" method="POST">
            {{ csrf_field() }}
            <input type="hidden" name="tipo" value="hembra">
            <input type="hidden" name="remate_id" value="{{$remate->id}}">
            <div class="input-group control-group">
              <div class="row">
                <div class="col-6 col-lg-6">
                  <label for="input_hembra_number">Nº Hembras</label>
                  <input id="input_hembra_number" type="number" name="cantidad" class="form-control">
                </div>
                <div class="col-6 col-lg-6">
                  <label for="hembra_titulo">Nombre hembras</label>
                  <input id="hembra_titulo" type="text" name="nombre" class="form-control">
                </div>
              </div>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Crear</button>
          </form>

          @foreach($remate_hembras as $remate_hembra)
          <form action="{{url('remate_extension_update')}}" method="POST">
            {{ csrf_field() }}
            <input type="hidden" name="tipo" value="hembra">
            <input type="hidden" name="extension_id" value="{{$remate_hembra->id}}">
            <div class="input-group control-group">
              <div class="row">
                <div class="col-6 col-lg-6">
                  <label for="input_hembra_number">Nº Hembras</label>
                  <input id="input_hembra_number" type="number" name="cantidad" value="{{$remate_hembra->cantidad}}" class="form-control">
                </div>
                <div class="col-6 col-lg-6">
                  <label for="hembra_titulo">Nombre hembras</label>
                  <input id="hembra_titulo" type="text" name="nombre" value="{{$remate_hembra->nombre}}" class="form-control">
                </div>
              </div>
            </div>
            <button type="submit" class="btn btn-success btn-block">Guardar</button>
          </form>
          <form action="{{url('remate_extension_delete')}}" method="POST">
            @csrf
            <input type="hidden" name="tipo" value="hembra">
            <input type="hidden" name="extension_id" value="{{$remate_hembra->id}}">
            <button type="submit" class="btn btn-danger btn-block">Eliminar</button>
          </form>
          @endforeach

        </div>
      </div>
    </div>


  </div>
  <a name="video" style="visibility: hidden"></a>

  <div class="row">
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

          <form method="post" action="{{url('upload_photo')}}" enctype="multipart/form-data">
            {{csrf_field()}}
            <input type="hidden" name="session" value="video">
            <input type="hidden" name="session_msg" value="Se cargó el video con éxito">
            <input type="hidden" name="path" value="{{'remates/'.'remate_'.$remate->id.'/video'}}">
            <input type="hidden" name="clean_dir" value="1">
            
            <div class="input-group control-group" >
              <input type="file" name="filename[]" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary" style="margin-top:10px">Cargar video</button>
            @if(session("video"))
            {{session("video")}}
            @endif
          </form>
        </div>
      </div>
    </div>
  </div>

  <form class="delete" action="/remate/{{$remate->id}}" method="POST">
    @csrf
    {{ method_field("DELETE")}}

    <div class="row">
      <div class="col-12 col-lg-12">
        <button class="btn btn-block btn-danger" name="button">
          <h3>Eliminar remate</h3>
        </button>
      </div>
    </div>
  </form>

  <script>
      $(".delete").on("submit", function(){
          return confirm("Seguro desea eliminar este remate?");
      });
  </script>

@endsection
