<?php

namespace App\Http\Controllers;

use App\Models\PasswordResetToken;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Mail\ResetPasswordMail;

class AuthController extends Controller
{
    public function index()
    {
        return view('content.auth.auth-login-basic');
    }

    public function loginproc(Request $request)
    {
        // Validasi input dengan pesan error kustom untuk field 'login' dan 'password'
        $request->validate([
            'login' => 'required', // Mengganti 'email' menjadi 'login'
            'password' => 'required',
        ], [
            // Pesan error khusus untuk 'login' dan 'password'
            'login.required' => 'The email or username field is required.',
            'password.required' => 'The password field is required.'
        ]);

        // Cek apakah input merupakan email atau username
        $fieldType = filter_var($request->login, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        // Cek apakah username atau email sudah terdaftar
        $userExists = User::where($fieldType, $request->login)->exists();

        if (!$userExists) {
            // Jika username atau email tidak terdaftar
            return redirect()->route('auth-login')->with('error', 'The ' . $fieldType . ' is not registered.');
        }

        // Jika username atau email terdaftar, lanjutkan ke proses autentikasi
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

    public function forgotpassword()
    {
        return view('content.auth.auth-forgot-password-basic');
    }

    public function forgotpassword_action(Request $request)
    {
        $validatedData =$request->validate([
            'email' => 'required|email|exists:users,email',
        ],
        [
            'email.required' => 'Email is required.',
            'email.email' => 'Please enter a valid email address.',
            'email.exists' => 'The email address is not registered.',
        ]);


        // dd($request->all());

        $token = Str::random(60);

        PasswordResetToken:: updateOrCreate(
          ['email' => $request->email,
        ],
          [
              'email' => $request->email,
              'token' => $token,
              'created_at' => now(),
          ]
      );

        try {Mail::to($request->email)->send(new ResetPasswordMail($token));
        } catch (\Exception $e) {
          return redirect()->route('forgot-password')->with('error', 'Failed to send email. Please try again later.');
        }

        return redirect()->route('forgot-password')->with('success', 'Please check your email for password reset instructions.');
    }


    public function register()
    {
        return view('content.auth.auth-register-basic');
    }

    public function create(Request $request)
    {
        // Validasi input termasuk cek unik pada username dan email dengan pesan khusus
        $validator = Validator::make($request->all(), [
            'firstname' => 'required|string|max:255',
            'lastname' => 'nullable|string|max:255',
            'username' => 'required|string|max:255|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
        ], [
            // Pesan error khusus
            'username.unique' => 'Username sudah terdaftar, silakan pilih username lain.',
            'email.unique' => 'Email sudah terdaftar, silakan gunakan email lain.'
        ]);

        // Jika validasi gagal, kembalikan ke halaman sebelumnya dengan pesan error
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        // Simpan data pengguna ke database
        User::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Redirect ke halaman login dengan pesan sukses
        return redirect()->route('auth-login')->with('success', 'Registrasi berhasil! Silakan login.');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('content.pages.pages-account-settings-account', compact('user'));
    }

    public function update(Request $request, $id)
    {
        // Validasi data
        $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // validasi untuk image
        ]);

        // Dapatkan user berdasarkan ID
        $user = User::findOrFail($id);

        // Update fields
        $user->firstname = $request->input('firstname');
        $user->lastname = $request->input('lastname');

        // Jika ada file image yang diupload, update image
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($user->image) {
                Storage::disk('public')->delete($user->image);
            }
            // Simpan gambar baru
            $path = $request->file('image')->store('profile', 'public');
            $user->image = $path;
        }

        // Simpan perubahan
        $user->save();

        // Redirect ke halaman profil dengan pesan sukses
        return redirect()->route('admin.pages-account-settings-account', ['id' => $user->id])->with('success', 'Profile updated successfully.');
    }

    public function editpas($id)
    {
        $user = User::findOrFail($id);
        return view('content.pages.pages-account-settings-security', compact('user'));
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('front-pages-landing')->with('success', 'Logout successful!');
    }

    public function resetImage($id)
    {
        $user = User::findOrFail($id);

        // Hapus gambar dari penyimpanan jika ada
        if ($user->image) {
            Storage::disk('public')->delete($user->image);
        }

        // Set kolom image menjadi null atau default
        $user->image = null;
        $user->save();

        return response()->json(['success' => true, 'message' => 'Profile image reset to default.']);
    }
}
