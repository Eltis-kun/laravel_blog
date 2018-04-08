<?php

namespace App\Http\Controllers;

use App\Http\Controllers;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }
}
