<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function portofolio(){
        $name = "Farrel Dava";
        $kelas = "Informatics Student at BINUS University(Malang)";
        return view('portofolio',  ['name' => $name, 'kelas' => $kelas,]);
    }

    public function shop(){
        $name = "Farrel Dava";
        $kelas = "Informatics Student in BINUS University(Malang)";
        $product = Product::all();
        return view('shop',  ['name' => $name, 'kelas' => $kelas, 'product'=> $product]);
    }

    public function droneshop(){
        $product = Product::all();
        return view('droneshop',  ['product'=> $product]);
    }

    public function dronedashboard(){
        return view('dronedashboard');
    }

    public function dronedetail($id){
        $product = Product::find($id);
        return view('dronedetail',  ['product'=> $product]);
    }

    public function index(){

    }

    public function create(){

    }
}
