<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        if (Auth::user()->hasRole('user')) {
            return view('nasabah.dashboard');
        } elseif (Auth::user()->hasRole('admin')) {
            return view('admin.dashboard_admin');
        }
    }
}
