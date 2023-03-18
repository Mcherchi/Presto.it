<?php

use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\AuthSocialController;
use App\Http\Controllers\InfoMailController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RevisorController;
use App\Models\Announcement;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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


//Gestione Pagine 
Route::get('/', [PagesController::class, 'index'])->name('homepage');
Route::get('/categoria/{category}', [PagesController::class, 'categoryShow'])->name('categoryShow');
Route::get('/welcome',[PagesController::class, 'welcome'])->middleware('auth');
Route::get('/chisiamo', [PagesController::class, 'aboutUs'])->name('aboutUs');

//Annunci 
Route::get('/dettaglio/annuncio/{announcement}',[AnnouncementController::class, 'showAnnouncement'])->name('announcements.show');
Route::get('/crea/annuncio', [AnnouncementController::class, 'createAnnouncement'])->middleware('auth')->name('announcements.create');
Route::get('/annunci', [AnnouncementController::class, 'indexAnnouncements'])->name('announcements.index');


//Gestione annunci Revisori
Route::get('/revisor/home', [RevisorController::class, 'index'])->middleware('isRevisor')->name('revisor.index');
Route ::get('/revisore/dettaglio/annuncio{announcement}', [RevisorController::class, 'showDetails'])->middleware('isRevisor')->name('revisor.details');

Route::patch('/accetta/annuncio/{announcement}',[RevisorController::class,'acceptAnnouncement'])->middleware('isRevisor')->name('revisor.accept_announcement');
Route::patch('/rifiuta/annuncio/{announcement}',[RevisorController::class,'rejectAnnouncement'])->middleware('isRevisor')->name('revisor.reject_announcement');

//Chiedi di diventare revisore 

Route::get('/richiesta/revisore',[RevisorController::class, 'becomeRevisor'])->middleware('auth')->name('become.revisor');
Route::get('/rendi/revisore{user}',[RevisorController::class, 'makeRevisor'])->middleware('auth')->name('make.revisor');

//ricerca annuncio

Route::get('/ricerca/annuncio', [PagesController::class, 'searchAnnouncements'])->name('announcements.search');


//Autenticazione social

Route::get('/auth/{provider}/redirect', [AuthSocialController::class, 'providerRedirect'])->where('provider', 'github|google');
Route::get('/auth/{provider}/callback', [AuthSocialController::class, 'providerCallback'])->where('provider', 'github|google');


// Profile

Route::get('/profilo', [ProfileController::class, 'showEditProfile'])->name('profile.edit');
Route::put('/modifica/profilo', [ProfileController::class, 'updateProfile'])->name('update.profile');
Route::get('/profilo/venditore/{user}', [ProfileController::class, 'showProfile'])->name('show.profile');

// Cambio lingua

Route::post('/lingua/{lang}', [PagesController::class, 'setLanguage'])->name('set_language_locale');

//Richiesta informazioni

Route::post('/richiesta/info',[InfoMailController::class, 'infoSend'])->name('infoSend');