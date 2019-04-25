<?php

namespace App\Http\Controllers;

use App\Remate;
use App\RemateToro;
use App\RemateHembra;
use App\Http\Controllers\FileBrowserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RemateController extends Controller
{
    public function active_remate(){

      $remate = Remate::where("activo", 1)->get()->first();
      if($remate){

        $hembras = $remate->hembras()->get();
        $toros = $remate->toros()->get();
        $remate->toros = $toros;
        $remate->hembras = $hembras;
      }

      return response()->json([
        "status" => "success",
        "data" => $remate
      ]);
    }

    public function index(){
      return view("remate.index",[
        "remates" => Remate::all()
      ]);
    }

    public function create(){
      return view("remate.create");
    }

    public function deactivate_all(){
      $remates = Remate::all();
      foreach($remates as $remate){
        $remate->activo = 0;
        $remate->save();
      }
      return;
    }

    public function store(Request $request){
      $this->validate($request, [
        "dia" => ['required'],
        "fecha" => ['required'],
        "mes" => ['required'],
        "ubicacion" => ['required'],
        "subtitulo" => ['required'],
        "hora_almuerzo" => ['required'],
        "hora_ventas" => ['required'],
        "mensaje_adicional" => ['required'],
        "rematador" => ['required'],
      ],[
        "required" => "El campo :attribute es requerido"
      ]);
      $request = $request->all();
      unset($request["_token"]);

      if(isset($request["activo"])){
        $this->deactivate_all();
        $request["activo"] = 1;
      }
      Remate::create($request);
      return redirect("remate")->with("success" , "Se creo un nuevo remate con éxito, en la pantalla de edición podrá agregar las imagenes, los videos y mas detalles sobre el remate");
    }

    public function update($id){
      $remate = Remate::findOrFail($id);
      request()->validate([
        "dia" => ['required'],
        "fecha" => ['required'],
        "mes" => ['required'],
        "ubicacion" => ['required'],
        "subtitulo" => ['required'],
        "hora_almuerzo" => ['required'],
        "hora_ventas" => ['required'],
        "mensaje_adicional" => ['required'],
        "rematador" => ['required'],
      ],[
        "required" => "El campo :attribute es requerido"
      ]);

      $request = request()->all();
      unset($request["_method"]);
      unset($request["_token"]);
      if(isset($request["activo"])){
        $this->deactivate_all();
        $request["activo"] = 1;
      }
      $remate->update($request);
      return back()->with("remate_guardado" , "Se actualizó el remate Nº ".$remate->id." con éxito");

    }

    public function edit($id){
      $remate = Remate::findOrFail($id);

      $hembras_toros = $this->fetch_hembras_toros($id);

      // Acá debería buscar las fotos que tengo, pero lo podría hacer con el file browser.
      $file_browser = new FileBrowserController;
      $path = "remates/remate_".$id.'/';
      $sub_dir_array = array(
        "fotos_toros",
        "fotos_hembras",
        "video"
      );
      $response_obj = $file_browser->browse($path, $sub_dir_array);
      // Debería poner una opcion de editar
      return view("remate.edit", [
        "remate" => $remate,
        "remate_toros" => $hembras_toros["toros"],
        "remate_hembras" => $hembras_toros["hembras"],
        "fotos_toros" => $response_obj->fotos_toros,
        "fotos_hembras" => $response_obj->fotos_hembras,
      ]);
    }

    public function fetch_hembras_toros($id){
      return [
        "hembras" => RemateHembra::where("remate_id", $id)->get(),
        "toros" => RemateToro::where("remate_id", $id)->get(),
      ];
    }

    public function new_remate_extension_store(Request $request){
      $tipo = $request->tipo;
      if( $tipo  == "hembra"){
        RemateHembra::create([
          "cantidad" => $request->cantidad,
          "nombre" => $request->nombre,
          "remate_id" => $request->remate_id
        ]);
      }else{
        RemateToro::create([
          "cantidad" => $request->cantidad,
          "nombre" => $request->nombre,
          "remate_id" => $request->remate_id
        ]);
      }

      return redirect(url()->previous().'#extension');
    }

    public function remate_extension_update(Request $request){
      if($request->tipo == "hembra"){
        RemateHembra::where("id", $request->extension_id)->update([
          "cantidad" => $request->cantidad,
          "nombre" => $request->nombre,
        ]);
      }else{
        RemateToro::where("id", $request->extension_id)->update([
          "cantidad" => $request->cantidad,
          "nombre" => $request->nombre,
        ]);
      }

      return redirect(url()->previous().'#extension');
    }

    public function remate_extension_delete(Request $request){
      if($request->tipo == "hembra"){
        RemateHembra::where("id", $request->extension_id)->delete([
          "cantidad" => $request->cantidad,
          "nombre" => $request->nombre,
        ]);
      }else{
        RemateToro::where("id", $request->extension_id)->delete([
          "cantidad" => $request->cantidad,
          "nombre" => $request->nombre,
        ]);
      }

      return redirect(url()->previous().'#extension');
    }

    public function destroy($id){
      Remate::where("id", $id)->delete();
      return redirect( "/remate" )->with("success", "Se borró el remate con éxito");
    }



    public function checkLastRemateID(){
      $remate = Remate::all()->first();
      if(count($remate) == 0){
        return 0;
      }else{
        return $remate->id;
      }
    }


}
