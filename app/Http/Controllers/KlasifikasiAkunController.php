<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KlasifikasiAkunController extends Controller
{
    public function index(Request $request){
        $active_page = "AKUN";
        return view('contents.klasifikasi', compact('active_page'));
    }
}
