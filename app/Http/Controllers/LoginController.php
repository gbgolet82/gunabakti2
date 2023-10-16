<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index(){
        $active_page = "LOGIN";
        return view('auth.login',compact('active_page'));
    }

    public function login(Request $request)
    {
        // Validate the login request, e.g., using the 'validate' method.
        // dd('baba');
        $phone = $request->input('nohp');
        $password = $request->input('password');

        // Check the database to authenticate the user based on phone and password.
        $karyawan = Karyawan::where('nohp', $phone)->first();
        // dd($karyawan);

        if (!$karyawan || !Hash::check($password, $karyawan->password)) {
            // Authentication failed, return an error.
            return redirect()->back()->withErrors(['error' => 'Invalid phone number or password']);
        }

        // Check the user's roles.
        $roles = ['kasir', 'manajer', 'owner'];
        $karyawanRoles = collect($roles)->filter(function ($role) use ($karyawan) {
            return $karyawan->$role == 1;
        });
        session(['karyawanRoles' => $karyawanRoles]);
        session()->save(); // Simpan data sesi

        // Set session berdasarkan data pengguna
        session(['nama' => $karyawan->nama, 'nohp' => $karyawan->nohp]);
        session()->save();


        if ($karyawanRoles->count() == 1) {
            // User has a single role, redirect to the dashboard corresponding to the role.
            $role = $karyawanRoles->first();
            // session(['selectedRole' => $role]);
            // dd($role);
            return redirect()->route('dashboard');
            // return redirect()->route($role . '.dashboard');
        }



        // User has multiple roles, show the 'rangkap' view.
        return view('auth.login2', ['karyawanRoles' => $karyawanRoles]);
    }

    
    public function logout(Request $request)
    {
        session()->forget('selectedRole'); // Menghapus session yang dipilih
        session()->flush(); // Menghapus semua session
        
        return redirect()->route('login'); // Redirect pengguna ke halaman login atau halaman lain yang sesuai.
    }


}
