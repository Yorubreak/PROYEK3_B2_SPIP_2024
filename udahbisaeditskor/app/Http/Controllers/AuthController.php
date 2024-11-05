<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
  public function index()
  {
    return view('content.auth.auth-login-basic');
  }

  public function loginproc(Request $request)
  {
    $request->validate([
      'email' => 'required',
      'password' => 'required',
    ]);

    $data = [
      'email' => $request->email,
      'password' => $request->password
    ];

    Auth::attempt($data);

    if(Auth::attempt($data)) {
      return redirect()->route('admin.admin-page')->with('success', 'Login successful!');
    }else{
      return redirect()->route('auth-login')->with('error', 'Login failed! Please try again.');
    }

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

  public function logout(){
    Auth::logout();
    return redirect()->route('/')->with('success','Logout successful!');
  }
}
