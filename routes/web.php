<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\VoyageController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\LivreController;
use App\Http\Controllers\InscriptionController;
use App\Http\Controllers\ConnexionController;
use App\Http\Controllers\OffreController;


/*
|--------------------------------------------------------------------------
| ROUTE ACCUEIL (Racine)
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return 'Mandeha ny Laravel 🚀';
});

/*
|--------------------------------------------------------------------------
| PROFIL
|--------------------------------------------------------------------------
*/
Route::get('/profils', [ProfilController::class, 'index'])->name('profils.index');
Route::get('/profils/create', [ProfilController::class, 'create'])->name('profils.create');
Route::post('/profils/store', [ProfilController::class, 'store'])->name('profils.store');
Route::get('/profils/edit/{id}', [ProfilController::class, 'edit'])->name('profils.edit');
Route::post('/profils/update/{id}', [ProfilController::class, 'update'])->name('profils.update');

/*
|--------------------------------------------------------------------------
| VOYAGES
|--------------------------------------------------------------------------
*/
Route::get('/voyages', [VoyageController::class, 'index'])->name('voyages.index');
Route::post('/voyages', [VoyageController::class, 'store'])->name('voyages.store');
Route::get('/voyages/edit/{id}', [VoyageController::class, 'edit'])->name('voyages.edit');
Route::post('/voyages/update/{id}', [VoyageController::class, 'update'])->name('voyages.update');
Route::post('/voyages/delete/{id}', [VoyageController::class, 'destroy'])->name('voyages.destroy');

/*
|--------------------------------------------------------------------------
| HOTELS
|--------------------------------------------------------------------------
*/
Route::get('/hotels', [HotelController::class, 'index'])->name('hotels.index');
Route::post('/hotels', [HotelController::class, 'store'])->name('hotels.store');
Route::get('/hotels/edit/{id}', [HotelController::class, 'edit'])->name('hotels.edit');
Route::post('/hotels/update/{id}', [HotelController::class, 'update'])->name('hotels.update');
Route::post('/hotels/delete/{id}', [HotelController::class, 'destroy'])->name('hotels.destroy');

/*
|--------------------------------------------------------------------------
| LIVRES
|--------------------------------------------------------------------------
*/
Route::get('/livres', [LivreController::class, 'index'])->name('livres.index');

/*
|--------------------------------------------------------------------------
| INSCRIPTION & CONNEXION
|--------------------------------------------------------------------------
*/
Route::get('/inscription', fn() => view('inscription'));
Route::post('/inscription', [InscriptionController::class, 'store']);

Route::get('/connexion', fn() => view('connexion'));
Route::post('/connexion', [ConnexionController::class, 'login']);



// PAGE BIENVENUE (view)
Route::get('/bienvenue', function () {
    return view('bienvenue');
});

// PAGE TONGASOA (view)
Route::get('/tongasoa', function () {
    return view('tongasoa');
});

// PAGE OFFRES (controller)
// Route::get('/offres', [OffreController::class, 'index'])->name('offres.index');



// Route::get('/offres', [OffreController::class, 'index'])->name('offres.index');


// use App\Http\Controllers\OffreController;

// Route::get('/offres', [OffreController::class, 'indexWeb']);
Route::get('/offres', [OffreController::class, 'indexWeb'])->name('offres.index');
Route::get('/offres/create', [OffreController::class, 'create'])->name('offres.create');
Route::post('/offres', [OffreController::class, 'storeWeb'])->name('offres.store');
Route::get('/offres/{id}/edit', [OffreController::class, 'edit'])->name('offres.edit');
Route::put('/offres/{id}', [OffreController::class, 'updateWeb'])->name('offres.update');
Route::delete('/offres/{id}', [OffreController::class, 'destroyWeb'])->name('offres.destroy');


use App\Http\Controllers\MaterielController;

Route::get('/', fn() => redirect()->route('materiels.index'));

Route::get('/materiels', [MaterielController::class, 'index'])->name('materiels.index');
Route::get('/materiels/create', [MaterielController::class, 'create'])->name('materiels.create');
Route::post('/materiels', [MaterielController::class, 'store'])->name('materiels.store');
Route::get('/materiels/{id}/edit', [MaterielController::class, 'edit'])->name('materiels.edit');
Route::post('/materiels/{id}/update', [MaterielController::class, 'update'])->name('materiels.update');
Route::post('/materiels/{id}/delete', [MaterielController::class, 'destroy'])->name('materiels.destroy');


use App\Http\Controllers\ConfirmationController;

Route::get('/confirmations', [ConfirmationController::class,'index'])->name('confirmations.index');
Route::get('/confirmations/create', [ConfirmationController::class,'create'])->name('confirmations.create');
Route::post('/confirmations', [ConfirmationController::class,'store'])->name('confirmations.store');
Route::get('/confirmations/{id}/edit', [ConfirmationController::class,'edit'])->name('confirmations.edit');
Route::put('/confirmations/{id}', [ConfirmationController::class,'update'])->name('confirmations.update');
Route::delete('/confirmations/{id}', [ConfirmationController::class,'destroy'])->name('confirmations.destroy');


