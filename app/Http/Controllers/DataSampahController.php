<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\DataSampah;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class DataSampahController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(Request $request)
    {
        if (Auth::user()->hasRole('user')) {
            $sampahs = DataSampah::all();
            return view('nasabah.data-sampah.index', compact('sampahs'));
        }
    }
}
