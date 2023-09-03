<?php

use App\Models\ArticleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\RevisorController;
use App\Http\Controllers\AnnouncementController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Home/Welcome
Route::get('/',[FrontController::class,'welcome'])->name('welcome');
// Show Category
Route::get('/categoria/{category}', [FrontController::class, 'categoryShow'])->name('categoryShow');

// Annunci
Route::get('/nuovo/annuncio', [AnnouncementController::class, 'createAnnouncement'])->middleware('auth')->name('announcements.create');
// Dettaglio annuncio

Route::get('/dettaglio/annuncio/{announcement}', [AnnouncementController::class, 'showAnnouncement'])->name('announcements.show');

// Index articoli

Route::get('tutti/annunci',[AnnouncementController::class,'indexAnnouncement'])->name('announcements.index');

// REVISOR INDEX

Route::get('/revisor/home', [RevisorController::class, 'index'])->middleware('isRevisor')->name('revisor.index');

// ACCETTA ANNUNCIO 

Route::patch('/accetta/annuncio/{announcement}', [RevisorController::class, 'acceptAnnouncement'])->middleware('isRevisor')->name('revisor.accept_announcement');

// RIFIUTA ANNUNNCIO 

Route::patch('/rifiuta/annuncio/{announcement}', [RevisorController::class, 'rejectAnnouncement'])->middleware('isRevisor')->name('revisor.reject_announcement');

// RICHIEDI REVISOR

Route::get('/richiesta/revisore', [RevisorController::class, 'becomeRevisor'])->middleware('auth')->name('become.revisor');

// CREA REVISOR

Route::get('/rendi/revisore/{user}', [RevisorController::class, 'makeRevisor'])->name('make.revisor');

// RICERCA ARTICOLI

Route::get('/ricerca/annuncio', [FrontController::class, 'searchAnnouncements'])->name('announcements.search');

// CAMBIO LINGUA

Route::post('/lingua/{lang}', [FrontController::class, 'setLanguage'])->name('set_language_locale');

//tabela

Route::get('/tabela/annuncio', [RevisorController::class, 'tabelaAnnouncements'])->middleware('isRevisor')->name('announcements.table');

// accete tabela

Route::patch('/accetta/tabela/{announcement}', [RevisorController::class, 'acceptTabela'])->middleware('isRevisor')->name('revisorAccept.tabela');

// rifiuta tabela

Route::patch('/rifiuta/tabela/{announcement}', [RevisorController::class, 'rejectTabela'])->middleware('isRevisor')->name('revisorReject.tabela');

