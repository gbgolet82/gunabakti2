<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DataUsahaController extends Controller
{
    public function index(){
        $active_page = "DATA USAHA";
        return view('contents.usaha', compact('active_page'));
    }
}
