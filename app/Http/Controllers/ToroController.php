<?php

namespace App\Http\Controllers;

use App\Toro;
use Illuminate\Http\Request;
use App\Rules\Raza;
use App\Http\Controllers\FileBrowserController;

class ToroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("toros.index", [
          "toros" => Toro::all()
        ]);
    }

    public function get_where(Request $request)
    {
        $type = $request->type;
        $toros = Toro::where("raza", $type)->get();
        foreach($toros as $toro){
          $path = "/toros/".$toro->id.'/';
          $sub_dir_array = array(
            "imagen_principal",
            "imagenes_secundarias",
            "video"
          );
          $files = FileBrowserController::browse($path, $sub_dir_array);
          $toro->media = $files;
        }
        return response()->json([
          "status" => "success",
          "data" => $toros
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view("toros.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $is_valid = $this->is_valid_toro($request);
        if(!$is_valid["is_valid"]){
          return back()->withErrors([
            "msg" => [
              $is_valid["msg"]
            ]
          ]);
        }

        $request = $request->all();
        $request["slug"] = $is_valid["slug"];

        unset($request["_token"]);
        Toro::create($request);
        return redirect("toros")->with("success" , "Se creo un nuevo toro con éxito, en la pantalla de edición podrá agregar las imagenes y los videos");
    }

    public function is_valid_toro($request, $name_ignore = false){
      $unwanted_array = array(    'Š'=>'S', 'š'=>'s', 'Ž'=>'Z', 'ž'=>'z', 'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A', 'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E',
                          'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I', 'Ï'=>'I', 'Ñ'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O', 'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U',
                          'Ú'=>'U', 'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'Ss', 'à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a', 'å'=>'a', 'æ'=>'a', 'ç'=>'c',
                          'è'=>'e', 'é'=>'e', 'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i', 'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o', 'ô'=>'o', 'õ'=>'o',
                          'ö'=>'o', 'ø'=>'o', 'ù'=>'u', 'ú'=>'u', 'û'=>'u', 'ý'=>'y', 'þ'=>'b', 'ÿ'=>'y' );

        $messages = [
          "required" => "El campo :attribute es requerido",
          "unique" => "Ya existe un toro con este nombre, los nombres deben ser únicos!"
        ];

        if(!$name_ignore){
          $request->validate([
            "nombre" => "required|unique:toros",
          ],$messages);
        }

        $request->validate([
          "raza" => new Raza
        ],$messages);

        $nombre = $request["nombre"];
        $nombre = strtr( $nombre, $unwanted_array );
        $slug = strtolower($nombre);

        return [
          "is_valid" => true,
          "slug" => $slug
        ];
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Toro  $toro
     * @return \Illuminate\Http\Response
     */
    public function show(Toro $toro)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Toro  $toro
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $toro = Toro::findOrFail($id);

        // Acá debería buscar todos los archivos del toro
        $file_browser = new FileBrowserController;
        $path = "toros/".$id.'/';
        $sub_dir_array = array(
          "imagenes_secundarias"
        );
        $response_obj = $file_browser->browse($path, $sub_dir_array);
        return view("toros.edit", [
          "toro" => $toro,
          "fotos_toro" => $response_obj->imagenes_secundarias
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Toro  $toro
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $toro = Toro::findOrFail($id);
        $ignore_nombre = false;
        if($toro->nombre == request()->nombre){
          $ignore_nombre = true;
        }

        $is_valid = $this->is_valid_toro(request(), $ignore_nombre);
        if(!$is_valid["is_valid"]){
          return [
            "errors" => [
              $is_valid["msg"]
            ]
          ];
        }

        $request = request()->all();
        unset($request["_method"]);
        unset($request["_token"]);
        $toro->update($request);
        return back()->with("success" , "Se actualizó ".$toro->nombre." con éxito");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Toro  $toro
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $toro = Toro::findOrFail($id);
       $nombre = $toro->nombre;
       $toro->delete();
       return redirect("toros")->with("success" , "Se eliminó ".$nombre." con éxito");
    }
}
