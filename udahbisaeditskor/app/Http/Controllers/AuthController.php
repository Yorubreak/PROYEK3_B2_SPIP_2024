<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

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


  public function create(Request $request)
  {
      $validator = Validator::make($request->all(), [
          'username' => 'required',
          'email' => 'required',
          'password' => 'required',
      ]);

      if ($validator->fails()) {
          return redirect()->back()->withInput()->withErrors($validator);
      }

      $data['username'] = $request->username;
      $data['email'] = $request->email;
      $data['password'] = Hash::make($request->password);

      User::create($data);

      return redirect()->route('auth-login')->with('success', 'Registration successful! Please login.');
  }
}
