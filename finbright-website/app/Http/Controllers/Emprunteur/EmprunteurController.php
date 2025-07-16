<?php

namespace App\Http\Controllers\Emprunteur;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EmprunteurController extends Controller
{
    public function index()
    {
        return view('back.emprunteur.dashboard');
    }
}