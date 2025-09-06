<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('content.dashboard');
    }

    public function laporan()
    {
        return view('content.laporan');
    }

    public function team()
    {
        return view('content.team');
    }
    
    public function mapping()
    {
        return view('content.mapping');
    }
}
