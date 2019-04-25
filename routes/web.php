<?php

/*

Route::post("uploadfile", "FileUploadController@upload_media");
Route::post('remate_fotos_toros','FileUploadController@remate_fotos_toros');
Route::post('remate_fotos_hembras','FileUploadController@remate_fotos_hembras');
Route::post("remate_video", "FileUploadController@remate_video");
Route::post("generar_array_objs_toros", "RemateController@generar_array_objs_toros");

Route::post("generar_array_objs_hembras", "RemateController@generar_array_objs_hembras");
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::post("upload_photo", "FileUploadController@upload_photo");
Route::post("delete_photo", "FileUploadController@delete_photo");




Route::get("index", function(){
  return view("index");
})->middleware('auth');
Route::resource("toros" ,"ToroController")->middleware('auth');
Route::resource("remate" ,"RemateController")->middleware('auth');

Route::post("new_remate_extension_store","RemateController@new_remate_extension_store");
Route::post("remate_extension_update","RemateController@remate_extension_update");
Route::post("remate_extension_delete","RemateController@remate_extension_delete");
Route::post("login","AuthController@login");


//NOTA ALTA REMOVER LA RUTA REGISTER DE ESTA CLASE
Auth::routes();
