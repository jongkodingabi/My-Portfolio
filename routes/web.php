<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\SkillsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\CertificateController;
use App\Http\Controllers\Admin\HeroSectionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\UserController;
use App\Models\Certificate;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
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



//ROUTE Admin Hero
Route::get('home', [HeroSectionController::class, 'home'])->name('home');

Route::resource('heroSections', HeroSectionController::class)->names([
    'index' => 'admin.heroes.heroIndex',
    'index' => 'home',
    'edit' => 'admin.heroes.heroEdit',
    'show' => 'admin.heroes.heroShow',
]);

//ROUTE Admin Project
Route::resource('projects', ProjectController::class)->names([
    'index' => 'admin.projects.projectIndex',
    'show' => 'admin.projects.projectShow',
    'edit' => 'admin.projects.projectEdit',
]);

//Route Admin Skill
Route::resource('skills', SkillsController::class)->names([
    'index' => 'admin.skills.skillsIndex',
    'show' => 'admin.skills.skillsShow',
    'edit' => 'admin.skills.skillsEdit'
]);

//Route Admin Contact
Route::resource('contacts', ContactController::class)->names([
    'index' => 'admin.contact.index',
    'show' => 'admin.contact.show',
    'edit' => 'admin.contact.edit'
]);

//Route Admin About
Route::resource('abouts', AboutController::class)->names([
    'index' => 'admin.abouts.index',
    'show' => 'admin.abouts.show',
    'edit' => 'admin.abouts.edit'
]);

//Route Admin Certificate
Route::resource('certificates', CertificateController::class)->names([
    'index' => 'admin.certificates.certificatesIndex',
    'show' => 'admin.certificates.certificatesShow',
    'edit' => 'admin.certificates.certificatesEdit'
]);

require __DIR__.'/auth.php';
