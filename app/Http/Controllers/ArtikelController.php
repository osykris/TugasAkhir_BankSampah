<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use Illuminate\Http\Request;

class ArtikelController extends Controller
{
    public function index(){
        $artikels = Artikel::all();
        return view('artikel', compact('artikels'));
    }

    public function detail($id){
        $detail_artikels = Artikel::where('id', $id)->get();
        return view('artikel-detail', compact('detail_artikels'));
    }
}
