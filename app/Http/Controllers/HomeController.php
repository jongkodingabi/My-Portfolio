<?php

namespace App\Http\Controllers;

use App\Models\HeroSection;
use App\Models\About;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {

        //Mengambil data dari dua model
        $heroSectionsCollection = HeroSection::all();
        $abouts = About::all();


        return view('home', compact('heroSectionsCollection', 'abouts'));
    }
}
