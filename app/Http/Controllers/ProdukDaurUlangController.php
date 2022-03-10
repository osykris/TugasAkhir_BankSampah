<?php

namespace App\Http\Controllers;

use App\Models\ProdukDaurUlang;
use Illuminate\Http\Request;

class ProdukDaurUlangController extends Controller
{
    public function cari(Request $request){
        $name = $request->nama;
        $products = ProdukDaurUlang::where('nama','like',"%".$name."%")->paginate(2);
        return view('product', [
            'products' => $products,
        ]);

    }
    public function render()
    {
        $products = ProdukDaurUlang::all();
        return view('product', [
            'products' => $products,
        ]);
       
    }
}
