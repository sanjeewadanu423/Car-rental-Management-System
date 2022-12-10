<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontController extends Controller
{

    public function index(Request $request, $page = 1)
    {
        // dd($request);
        // $users = User::get();

        return view('lands.cars');
    }

    public function index1(Request $request, $page = 1)
    {
        // dd($request);
        // $users = User::get();

        return view('lands.cabs');
    }

    public function index2(Request $request, $page = 1)
    {
        // dd($request);
        // $users = User::get();

        return view('lands.vans');
    }
}
