<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(){
        $active_page = "LOGIN";
        return view('auth.login',compact('active_page'));
    }
}
