<?php

namespace App\Http\Controllers;

use App\Colis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

         return view('home', [
            'created' => Colis::where(['fournisseur_id' => Auth::user()->id, 'etat' => 'crée'])->count(),
            'undergoing' => Colis::where(['fournisseur_id' => Auth::user()->id, 'etat' => 'encour'])->count(),
            'livred' => Colis::where(['fournisseur_id' => Auth::user()->id, 'etat' => 'livré'])->count(),
            'payed' => Colis::where(['fournisseur_id' => Auth::user()->id, 'etat' => 'payé'])->count(),
            'prepreturn' => Colis::where(['fournisseur_id' => Auth::user()->id, 'etat' => 'preretour'])->count(),
            'returned' => Colis::where(['fournisseur_id' => Auth::user()->id, 'etat' => 'retourné'])->count(),
            'colis' => Colis::where('fournisseur_id' , Auth::user()->id)->get(),
            'allcolis'=>Colis::where('fournisseur_id' , Auth::user()->id)->count()
         ]);
    }
}
