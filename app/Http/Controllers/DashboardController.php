<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $active_page = "DASHBOARD";
        return view('contents.dashboard', compact('active_page'));
    }
}
