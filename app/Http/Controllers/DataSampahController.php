<?php

namespace App\Http\Controllers;

use App\Models\DataSampah;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class DataSampahController extends Controller
{
    public function index(Request $request)
    {
        $sampahs = DataSampah::latest()->get();

        if ($request->ajax()) {
            $data = DataSampah::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->make(true);
        }

        return view('nasabah.data-sampah.index', compact('sampahs'));
    }

    public function __construct()
    {
        $this->middleware('auth');
    }
}
