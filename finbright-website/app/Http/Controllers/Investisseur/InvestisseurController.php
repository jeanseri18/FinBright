<?php

namespace App\Http\Controllers\Investisseur;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class InvestisseurController extends Controller
{
    public function profil()
    {
        Session::put('menu_actif', 'mon_compte');
        return view('back.investisseur.mon-profil');
    }
}