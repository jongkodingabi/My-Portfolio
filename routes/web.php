<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\SkillsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\CertificateController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\HeroSectionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\FormContactController;
use App\Http\Controllers\UserController;
use App\Models\FormContact;
use App\Models\Skill;
use Illuminate\Support\Facades\Route;

Route::get('/defaultroot', function () {
    return view('home');
});

Route::get('/home', function () {
    return view('home');
})->middleware(['auth', 'verified'])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

    Route::get('/admin/dashboard', [AdminController::class, 'index'])->middleware('auth', 'admin');
    Route::get('/home', [UserController::class, 'index'])->middleware('auth', 'user')->name('home');

    // Pengiriman jumlah data ke dashboard
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');


//ROUTE HERO HOME

//ROUTE Admin Hero
Route::resource('/admin/heroes', HeroSectionController::class);

//ROUTE Admin Project
Route::resource('projects', ProjectController::class)->names([
    'index' => 'admin.projects.projectIndex',
    'show' => 'admin.projects.projectShow',
    'edit' => 'admin.projects.projectEdit',
    'getProjects' => 'projects.getProjects'
]);

//Route Admin Skill
Route::resource('skills', SkillsController::class)->names([
    'index' => 'admin.skills.skillsIndex',
    'show' => 'admin.skills.skillsShow',
    'edit' => 'admin.skills.skillsEdit'
]);

//Route Admin Contact
// Route::resource('contacts', ContactController::class)->names([
//     'index' => 'admin.contact.index',
//     'show' => 'admin.contact.show',
//     'edit' => 'admin.contact.edit'
// ]);


//Route Admin About

//ROUTE HOME ABOUT
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::resource('/admin/abouts', AboutController::class);


//Route Admin Certificate
Route::resource('certificates', CertificateController::class)->names([
    'index' => 'admin.certificates.certificatesIndex',
    'show' => 'admin.certificates.certificatesShow',
    'edit' => 'admin.certificates.certificatesEdit',
    'getCertificates' => 'certificates.getCertificates'
]);

Route::resource('contact', FormContactController::class);


require __DIR__.'/auth.php';
