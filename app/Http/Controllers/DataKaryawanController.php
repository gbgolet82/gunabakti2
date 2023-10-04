<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DataKaryawanController extends Controller
{
    public function index(){
        $active_page = "DATA KARYAWAN";
        return view('contents.karyawan', compact('active_page'));
    }
}
