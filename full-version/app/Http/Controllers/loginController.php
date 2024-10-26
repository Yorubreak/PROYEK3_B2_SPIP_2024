<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class loginController extends Controller
{
    public function index(){
      return view('content.authentications.auth-login');
    }

    public function showLoginForm() {
      $configData = [
          'style' => 'light' // atau 'dark', sesuai kebutuhan
      ];
      return view('content.authentications.auth-login', compact('configData'));
  }

  // public function register()
  // {
  //   return view('content.authentications.auth-register');
  // }

}
