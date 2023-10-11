<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        $active_page = "LOGIN";
        return view('auth.login',compact('active_page'));
    }

    public function login(Request $request)
    {
        $credentials = $request->only('nohp', 'password');
        // dd($request->role);
    
        if (Auth::attempt($credentials)) {
            // dd('baba');
            $karyawan = Karyawan::where('nohp', $request->input('nohp'))->first();
            if ($karyawan) {
            $request->session()->put('selected_role', $request->role);
            if ($request->role == 'owner') {
                // Check the 'owner' column in the 'karyawan' table
                

                if ($karyawan->owner == 1) {
                    // Redirect to the owner dashboard
                    return redirect()->route('dashboard')->with('success', 'Anda berhasil login');
                } else {
                    // User is not an owner (owner !== 1)
                    return back()->with('error', 'Invalid role or access denied.');
                }
            } elseif ($request->role == 'manajer') {
                // Check the 'manajer' column in the 'karyawan' table
                $karyawan = Karyawan::where('nohp', $request->input('nohp'))->first();

                if ($karyawan->manajer == 1) {
                    // Redirect to the manager dashboard
                    return redirect()->route('dashboard.manajer');
                } else {
                    // User is not a manager (manajer !== 1)
                    return back()->with('error', 'Invalid role or access denied.');
                }
            } elseif ($request->role == 'kasir') {
                // Check the 'kasir' column in the 'karyawan' table
                $karyawan = Karyawan::where('nohp', $request->input('nohp'))->first();

                if ($karyawan->kasir == 1) {
                    // Redirect to the cashier dashboard
                    return redirect()->route('dashboard.kasir');
                } else {
                    // User is not a cashier (kasir !== 1)
                    return back()->with('error', 'Invalid role or access denied.');
                }
            } else {
                // User has an invalid role or other conditions are not met
                return back()->with('error', 'Invalid role or access denied.');
            }
        }
        }
    
        return back()->withErrors(['nohp' => 'Invalid login credentials']);
    }
    
    public function logout(Request $request)
    {
        // dd(Auth::user());
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();
        return redirect('/');
    }


}
