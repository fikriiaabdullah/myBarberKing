<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\File; 

class UserController extends Controller
{
    public function Login()
    {
        return view('login');
    }
    public function ProcessLogin(Request $request)
    {
        $credentials = $request->only('email', 'password');
        Log::info("Logging in");

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if ($user->role == 'admin') {
                return redirect()->route('dashboard-admin');
            } else if ($user->role == 'barberman' || $user->role == 'karyawan') {
                return redirect()->route('dashboard-barberman');
            } else {
                // Handle other roles as needed, for example redirecting to a general dashboard
                return redirect()->route('dashboard-barberman');
            }
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'phone' => 'nullable|string|max:100',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'role' => 'karyawan', // default role
        ]);

        $user->photo_path = 'img/default_profile.png';
        $user->save();

        return redirect()->route('login')->with('status', 'Registrasi berhasil. Silahkan masuk.');
    }
    public function edit($id)
    {
        Log::info("Editing ".$id);
        // Ambil data user berdasarkan ID
        $user = User::find($id);

        // Cek apakah user ditemukan
        if (!$user) {
            abort(404); // Tampilkan halaman 404 jika user tidak ditemukan
        }

        // Tampilkan view untuk form edit profil dengan data user
        return view('edit', compact('user'));
    }

    // Metode untuk menyimpan perubahan pada profil
    public function update(Request $request, $id)
    {
        // Validasi input form edit profil
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'phone' => 'nullable|string|max:100',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // max 2MB
            // Tambahkan validasi lainnya sesuai kebutuhan
        ]);

        // Simpan perubahan data user ke dalam database
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;

        // Proses file foto jika ada yang diunggah
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            // Ambil nama file dan simpan ke database
            
            $fileName = time() . '_' . $photo->getClientOriginalName();
            File::delete('assets/img/profilePicture' . $user->photo_path);
            $photo->move(public_path('assets/img/profilePicture'), $fileName);

            $user->photo_path = 'img/profilePicture/'.$fileName;
        }

        $user->save();

        // Redirect user kembali ke halaman profil atau halaman lainnya
        return redirect()->route('users.edit', $id)->with('success', 'Profile updated successfully.');
    }

    public function logout(Request $request)
    {
        Log::info("Logging out");

        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('welcome');
    }
}
