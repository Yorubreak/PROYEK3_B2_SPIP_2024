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
          'login' => 'required', // Mengganti 'email' menjadi 'login'
          'password' => 'required',
      ]);

      // Cek apakah input merupakan email atau username
      $fieldType = filter_var($request->login, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

      $data = [
          $fieldType => $request->login,
          'password' => $request->password,
      ];

      if (Auth::attempt($data)) {
          return redirect()->route('admin.admin')->with('success', 'Login successful!');
      } else {
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

  public function edit($id)
  {
      $user = User::findOrFail($id);
      return view('content.pages.pages-account-settings-account', compact('user'));
  }

  public function logout()
  {
      Auth::logout();
      return redirect()->route('front-pages-landing')->with('success', 'Logout successful!');
  }
}
