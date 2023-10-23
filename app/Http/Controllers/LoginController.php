<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use App\Models\Usaha;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index(){
        $active_page = "LOGIN";
        return view('auth.login',compact('active_page'));
    }

    public function login2($userId) {
        

        $user = Karyawan::find($userId);
        // dd($user);
    
        if (!$user) {
            return redirect()->route('login'); 
        }
    
        // Retrieve the user's roles here.
        $roles = ['kasir', 'manajer', 'owner'];
        $karyawanRoles = collect($roles)->filter(function ($role) use ($user) {
            return $user->$role == 1;
        });

        
    
        return view('auth.login2', ['karyawanRoles' => $karyawanRoles]);
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
        $roles = ['manajer', 'kasir', 'owner'];
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
            // dd($role);
            return redirect()->route('dashboard');
            // return redirect()->route($role . '.dashboard');
        }



        // User has multiple roles, show the 'rangkap' view.
        return view('auth.login2', ['karyawanRoles' => $karyawanRoles]);
    }

    
    public function logout(Request $request)
{
    session()->forget('selectedRole'); // Remove the 'selectedRole' session
    $karyawanRoles = session('karyawanRoles', collect());
    
    // Ambil id_karyawan dari sesi yang sedang berlangsung
    $id_karyawan = session('id_karyawan');
    
    if ($karyawanRoles->count() == 1) {
        return redirect()->route('login');
    } elseif ($karyawanRoles->count() > 1) {
        return redirect()->route('login2', ['userId' => $id_karyawan]);
    } else {
        return redirect()->route('login');
    }
}

    

    


}
