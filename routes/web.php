<?php

use App\Models\ArticleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\RevisorController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\ReviewsController;

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
Route::get('/', [FrontController::class, 'welcome'])->name('welcome');
// Show Category
Route::get('/categoria/{category}', [FrontController::class, 'categoryShow'])->name('categoryShow');

// CAMBIO LINGUA
Route::post('/lingua/{lang}', [FrontController::class, 'setLanguage'])->name('set_language_locale');

Route::prefix('announcement')->group(function () {
    // Index articoli
    Route::get('/index', [AnnouncementController::class, 'indexAnnouncement'])->name('announcements.index');
    // Dettaglio annuncio
    Route::get('/show/{announcement}', [AnnouncementController::class, 'showAnnouncement'])->name('announcements.show');
    // RICERCA ARTICOLI
    Route::get('/search', [FrontController::class, 'searchAnnouncements'])->name('announcements.search');
});

Route::middleware(['auth'])->groupgroup(function () {

    // Annunci
    Route::get('/nuovo/annuncio', [AnnouncementController::class, 'createAnnouncement'])->name('announcements.create');


    Route::prefix('revisor')->group(function () {
        // RICHIEDI REVISOR
        Route::get('/request', [RevisorController::class, 'becomeRevisor'])->name('become.revisor');
        // CREA REVISOR
        Route::get('/create/{user}', [RevisorController::class, 'makeRevisor'])->name('make.revisor');
        // REVISOR INDEX
        Route::get('/index', [RevisorController::class, 'index'])->middleware('isRevisor')->name('revisor.index');
    });
    
    Route::prefix('review')->group(function () {
        
        Route::get('/index', [ReviewsController::class, 'index'])->name('review.index');
        Route::get('/store', [ReviewsController::class, 'store']);
        Route::get('/delete/{id}', [ReviewsController::class, 'delete']);
        Route::get('/show/{id}', [ReviewsController::class, 'show']);
    });

    // ACCETTA ANNUNCIO 
    Route::patch('/accept/announcement/{announcement}', [RevisorController::class, 'acceptAnnouncement'])->middleware('isRevisor')->name('revisor.accept_announcement');
    // RIFIUTA ANNUNNCIO 
    Route::patch('/rejects/announcement/{announcement}', [RevisorController::class, 'rejectAnnouncement'])->middleware('isRevisor')->name('revisor.reject_announcement');


    Route::patch('/accept/table/{announcement}', [RevisorController::class, 'acceptTabela'])->middleware('isRevisor')->name('revisorAccept.tabela');
    Route::patch('/reject/table/{announcement}', [RevisorController::class, 'rejectTabela'])->middleware('isRevisor')->name('revisorReject.tabela');
    Route::get('/table/announcement', [RevisorController::class, 'tabelaAnnouncements'])->middleware('isRevisor')->name('announcements.table');
});
