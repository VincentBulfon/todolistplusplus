<?php

namespace App\Controllers;

class PagesController
{
    public function home()
    {
        //analyse une requete
        //construit les données
        //produit une réponse
        $nom = "Vincent";
        return view('home', compact('nom'));
    }

    public function about()
    {
        return view('about');
    }

    public function contact()
    {
        return view('contact');
    }
}