<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
  public function login()
  {
    return view('content.authentication.auth-login-basi');
  }
}
