<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmprunteurController extends Controller
{
    public function index()
    {
        return view('emprunteur.dashboard');
    }
}