<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InvestisseurController extends Controller
{
    public function index()
    {
        return view('incestisseur.dashboard');
    }
}
