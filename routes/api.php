<?php

Route::post("browsePath", "FileBrowserController@file_browser");
Route::get("activeRemate", "RemateController@active_remate");
Route::post("toros", "ToroController@get_where");
