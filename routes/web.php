<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Medecin\MedecinController;
use App\Http\Controllers\Patient\PatientController;
use App\Http\Controllers\Pharmacien\PharmacienController;
use App\Http\Controllers\Fournisseur\FournisseurController;
use App\Http\Controllers\LigneCommandeController;
use App\Http\Controllers\OrdonnanceController;
use App\Http\Controllers\MedicamentController;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\CommandeFournisseurController;
use App\Http\Controllers\StockMedicamentController;
use App\Http\Controllers\DashboardPharmacienController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard/medecin/profile', 'App\Http\Controllers\Medecin\MedecinController@profile')->name('profile');
Route::get('/dashboard/medecin/edit', 'App\Http\Controllers\Medecin\MedecinController@edit')->name('edit');
Route::put('/dashboard/medecin/', 'App\Http\Controllers\Medecin\MedecinController@update')->name('medecin.update-profile');
Route::get('/medicament/listMed', 'App\Http\Controllers\MedicamentController@listMed')->name('listMed');

Route::get('/ordonnance/listOrd', 'App\Http\Controllers\OrdonnanceController@listOrd')->name('listOrd');
Route::get('/patient/listPatient', 'App\Http\Controllers\Patient\PatientController@listPatient')->name('listPatient');
Route::get('/ordonnance/listOrdPharma', 'App\Http\Controllers\OrdonnanceController@listOrdPharma')->name('listOrdPharma');


Route::resource('medicament', MedicamentController::class);

Route::resource('ordonnance', OrdonnanceController::class);
Route::resource('stock', StockMedicamentController::class);
Route::resource('commande', CommandeController::class);
Route::resource('ligneCommande', LigneCommandeController::class);
Route::resource('patient', PatientController::class);




Auth::routes();


Route::prefix('medecin')->name('medecin.')->group(function(){

    Route::middleware(['guest:medecin'])->group(function(){
         Route::view('/login','dashboard.medecin.login')->name('login');
         Route::view('/register','dashboard.medecin.register')->name('register');
         Route::post('/create',[MedecinController::class,'create'])->name('create');
         Route::post('/check',[MedecinController::class,'check'])->name('check');
    });

    Route::middleware(['auth:medecin'])->group(function(){
         Route::view('/home','dashboard.medecin.home')->name('home');
         Route::post('logout',[MedecinController::class,'logout'])->name('logout');
    });

});


Route::prefix('pharmacien')->name('pharmacien.')->group(function(){

    Route::middleware(['guest:pharmacien'])->group(function(){
         Route::view('/login','dashboard.pharmacien.login')->name('login');
         Route::view('/register','dashboard.pharmacien.register')->name('register');
         Route::post('/create',[PharmacienController::class,'create'])->name('create');
         Route::post('/check',[PharmacienController::class,'check'])->name('check');

    });  

    Route::middleware(['auth:pharmacien'])->group(function(){
         Route::view('/home','dashboard.pharmacien.home')->name('home');
        
         Route::get('pharmacien/profile','PharmacienController@edit')->name('pharmacien.edit-profile');
         Route::post('logout',[PharmacienController::class,'logout'])->name('logout');
    });

});



Route::prefix('fournisseur')->name('fournisseur.')->group(function(){

    Route::middleware(['guest:fournisseur'])->group(function(){
         Route::view('/login','dashboard.fournisseur.login')->name('login');
         Route::view('/register','dashboard.fournisseur.register')->name('register');
         Route::post('/create',[FournisseurController::class,'create'])->name('create');
         Route::post('/check',[FournisseurController::class,'check'])->name('check');
    });

    Route::middleware(['auth:fournisseur'])->group(function(){
         Route::view('/home','dashboard.fournisseur.home')->name('home');
         Route::post('logout',[FournisseurController::class,'logout'])->name('logout');
    });


});



route::post('search-med','App\Http\Controllers\MedicamentController@search');
route::post('search-ord','App\Http\Controllers\OrdonnanceController@search');
route::post('search-stock','App\Http\Controllers\StockMedicamentController@search');
route::post('searchOrdPharma','App\Http\Controllers\OrdonnanceController@searchOrdPharma');

route::post('search-list-med','App\Http\Controllers\MedicamentController@searchListMed');



Route::get('pharmacien.home',[StockMedicamentController::class,'operation']);



Route::get('/listPharmacien', 'App\Http\Controllers\Fournisseur\FournisseurController@listPharmacien')->name('listPharmacien');
Route::get('/listCom', 'App\Http\Controllers\CommandeController@listCom')->name('listCom');
Route::get('/listComFournisseur', 'App\Http\Controllers\CommandeController@listComFournisseur');

Route::resource('CommandeFournisseur', CommandeFournisseurController::class);


 Route::get('/NbChaqueMed', 'App\Http\Controllers\StockMedicamentController@NbChaqueMed')->name('NbChaqueMed');