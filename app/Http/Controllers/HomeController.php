<?php

namespace App\Http\Controllers;

use App\Models\HeroSection;
use App\Models\About;
use App\Models\Skill;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {

        //Mengambil data dari dua model
        $heroSectionsCollection = HeroSection::all();
        $abouts = About::all();
        $skills = Skill::all();


        return view('home', compact('heroSectionsCollection', 'abouts', 'skills'));
    }
}
