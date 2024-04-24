<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjetController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AboutController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AcademicProjetController;
use App\Models\Projet;
use App\Models\AcademicProjet;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $projets = Projet::all();
    $academicProjects = AcademicProjet::all();
    return view('welcome', compact('projets', 'academicProjects'));
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard/ajouter-projet', [ProjetController::class, 'create'])->name('projets.create');
Route::post('/projets', [ProjetController::class, 'store'])->name('projets.store');
Route::get('/dashboard/ajouter-projet-academique', [AcademicProjetController::class, 'create'])->name('academic_projets.create');
Route::post('/academic_projets', [AcademicProjetController::class, 'store'])->name('academic_projets.store');
Route::get('/academic-projects', [AcademicProjetController::class, 'index'])->name('academic_projects.index');

Route::delete('/projets/{projet}', [ProjetController::class, 'destroy'])->name('projets.destroy');
Route::delete('/academic_projets/{academic_projet}', [AcademicProjetController::class, 'destroy'])->name('academic_projets.destroy');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/about', [App\Http\Controllers\AboutController::class, 'index'])->name('about');
Route::get('/contact', [App\Http\Controllers\ContactController::class, 'index'])->name('contact');
Route::post('/send-email', [ContactController::class, 'sendEmail'])->name('send-email');

require __DIR__ . '/auth.php';
