<?php

namespace App\Http\Controllers;

use App\Models\HeroSection;
use App\Models\About;
use App\Models\Certificate;
use App\Models\Skill;
use App\Models\Project;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {

        //Mengambil data dari dua model
        $heroSectionsCollection = HeroSection::all();
        $abouts = About::all();
        $skills = Skill::all();
        $projects = Project::all();
        $certificates = Certificate::all();


        return view('home', compact('heroSectionsCollection', 'abouts', 'skills', 'projects', 'certificates'));
    }
}
