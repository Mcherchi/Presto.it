<?php

use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\PagesController;
use App\Models\Announcement;
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

Route::get('/', [PagesController::class, 'index'])->name('homepage');

Route::get('/crea/annuncio', [AnnouncementController::class, 'createAnnouncement'])->middleware('auth')->name('announcements.create');
Route::get('categoria/{category}', [PagesController::class, 'categoryShow'])->name('categoryShow');

Route::get('/dettaglio/annuncio/{announcement}',[AnnouncementController::class, 'showAnnouncement'])->name('announcements.show');

Route::get('/annunci', [AnnouncementController::class, 'indexAnnouncements'])->name('announcements.index');