<?php

namespace App\Http\Controllers;

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
        return view('shop',  ['name' => $name, 'kelas' => $kelas,]);
    }

    public function index(){
        
    }

    public function create(){
        
    }
}
