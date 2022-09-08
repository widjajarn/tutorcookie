<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class ControllerSaya extends Controller
{
    function index() {
        return view('viewindex');
    }

    // json_encode --> melakukan konversi dari data array  menjadi data string 
    // json_decode --> melakukan konversi dari data string menjadi data array
    // yang bisa disimpan di cookie harus data string bukan data array 

    function simpanmhs(Request $req) {
        if($req->b3) {
            $nrp    = $req->t1; 
            $nama   = $req->t2; 
            $arr    = json_decode(Cookie::get('datamhs')) ?? [];    // get cookie

            $databaru = [
                "nrp"   => $nrp, 
                "nama"  => $nama
            ];

            array_push($arr, $databaru); 
            Cookie::queue(Cookie::make("datamhs", json_encode($arr), 6000));    // create cookie
            // return view('viewindex'); 
            return redirect('/');   // routing get yg di web.php
        }
        else if($req->b4) {
            Cookie::queue(Cookie::make("datamhs", "", -6000));      // clear cookie
            // return view('viewindex'); 
            return redirect('/'); 
        }
    }

    function hapusdata($idx) {
        $arr    = json_decode(Cookie::get('datamhs')) ?? [];    // get cookie

        array_splice($arr, $idx, 1);    // hapus array pada posisi idx sebanyak 1 record

        Cookie::queue(Cookie::make("datamhs", json_encode($arr), 6000));    // create cookie

        // return view('viewindex'); 
        return redirect('/'); 
    }
}
