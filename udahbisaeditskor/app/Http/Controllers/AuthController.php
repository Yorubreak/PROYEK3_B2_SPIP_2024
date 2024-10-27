<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
  public function index()
  {
    return view('content.auth.auth-login-basic');
  }

  public function register()
  {
    return view('content.auth.auth-register-basic');
  }

  public function create(Request $request){

  }
}
