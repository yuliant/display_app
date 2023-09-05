<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContohController extends Controller
{
    public function index(){
        $data['pesan'] = 'Halo, ini contoh interaksi antara Controller dan View!';
        return view('contoh',$data);
    }
    public function download(){
        $data['pesan'] = 'Halo, ini contoh interaksi antara Controller dan View!';
        return view('contoh',$data);
    }
    public function admin(Request $request)
    {
        $data['pesan'] = 'Halo, ini contoh interaksi antara Controller dan View!';
        return view('contoh',$data);
    }  
}
