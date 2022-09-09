<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfilController extends Controller
{
    // function __construct()
    // {
    //     $this->middleware('permission:profil-menu');
    // }

    public function index()
    {
        return view('profil.index');
    }
}
