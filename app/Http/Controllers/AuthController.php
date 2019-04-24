<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AuthController extends Controller
{
  public function login(Request $request){

    $email = $request->email;
    $password_sent = $request->password;
    $registered_user = User::where("email", $email)->get()->first();

    if(count($registered_user) < 1){
      return back()->withFail("No se encontró al usuario");
    }

    $password = $registered_user->password;
    if($password == $password_sent){
      $token = Str::random(32);
      $registered_user->remember_token = $token;
      $registered_user->save();
      return view("/index");
    }else{
      return back()->withFail("Contraseña incorrecta");
    }
  }

}
