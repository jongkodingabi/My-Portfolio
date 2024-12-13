<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Certificate;
use App\Models\FormContact;
use App\Models\Skill;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index() {
        $contacts = FormContact::count();
        $contact = FormContact::all();
        $skills = Skill::count();
        $certificates = Certificate::count();

        return view('admin.dashboard', compact('contacts', 'skills', 'certificates', 'contact'));
    }
}
