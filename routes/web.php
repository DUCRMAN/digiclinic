<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\PersonnelController;
use App\Http\Controllers\DepartementController;
use App\Http\Controllers\Auth\RegisteredController;
use App\Http\Controllers\MedecinGeneralistController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\PriseEnChargeController;
use App\Http\Controllers\ConsultationController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\RayonController;
use App\Http\Controllers\SrayonController;


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

//  Route::get('/', function () {
//      return view('admin/index');
// });
// Route::get('signup', [AdminController::class,('create')])->name('users.showform');
// Route::post('signup', [AdminController::class,('store')])->name('users.storeform');

//Backend routes......................................................
Route::get('/', [AuthenticatedSessionController::class,('create')]);
Route::post('login', [AuthenticatedSessionController::class,('store')]);
Route::get('register', [RegisteredController::class, 'create']);
Route::post('register', [RegisteredController::class, 'store']);
Route::get('dashboard', [AdminController::class, 'index']);
Route::get('/logout', [AuthenticatedSessionController::class, 'destroy']);

//Prise en charge
Route::get('/prises-en-charges', [PriseEnChargeController::class,('index')]);
Route::get('/enregistrer-prise-en-charge', [PriseEnChargeController::class,('record_prisenc')]);
Route::post('/save-prisenc', [PriseEnChargeController::class,('save_prisenc')]);
Route::get('/caisse-consultations', [PriseEnChargeController::class,('caisse_conslt')]);
Route::post('/pay-consult', [PriseEnChargeController::class,('pay_consult')]);
Route::get('/caisse-hospitalisations', [PriseEnChargeController::class,('caisse_hospt')]);
Route::get('/caisse-analyses', [PriseEnChargeController::class,('caisse_analyses')]);
Route::get('get-analyse/{id}',[PriseEnChargeController::class, 'get_analyse']);
Route::post('/save-analyse', [PriseEnChargeController::class,('save_analyse')]);


//Chambre
Route::post('save-chambre', [PriseEnChargeController::class,('save_chambre')]);
Route::post('hospitaliser', [PriseEnChargeController::class,('hospitaliser')]);




//Consultation
Route::post('send-consult', [ConsultationController::class,('send_consult')]);
Route::get('consultations', [ConsultationController::class,('consultation')]);
Route::get('traitement-patient/{id_consultation}/{patient_id}', [ConsultationController::class,('traitement_patient')]);
Route::post('save-traitement', [ConsultationController::class,('save_traitement')]);

//Analyses
Route::get('gestion-analyses', [ConsultationController::class,('gestion_analyses')]);













//Pharmacie
Route::get('/all-category',[CategoryController::class, 'all_category']);
Route::post('/save-category',[CategoryController::class, 'save_category']);
Route::post('/save-rayon',[RayonController::class, 'save_rayon']);
Route::post('/save-srayon',[SrayonController::class, 'save_srayon']);
Route::post('/save-product',[ProductController::class, 'save_product']);




Route::get('/rayon-par-entite/{id}',[CategoryController::class, 'rayon_by_entite']);
Route::get('/sous-rayon-par-rayon-entite/{id}',[CategoryController::class, 'srayon_by_entite']);
Route::get('/produit-sous-rayon/{id}',[ProductController::class, 'produit_srayon']);

//Gestion vente stock approvisionnement
Route::get('/les-ventes',[AdminController::class, 'all_sales']);
Route::get('/choix-client',[SalesController::class, 'index_sale']);
Route::post('enregistrer-vente',[SalesController::class, 'index']);
Route::get('get-detail/{id}',[SalesController::class, 'get_detail']);
Route::get('get-panier/{guest_id}', [SalesController::class, 'get_panier']);
Route::post('/store-tabpanier',[SalesController::class, 'store_tabpanier']);
Route::get('delete-tabpanier/{id}',[SalesController::class, 'delete_tabpanier']);
Route::post('/make-caisse',[SalesController::class, 'make_caisse']);
Route::get('/make-facture/{order_id}',[SalesController::class, 'make_facture']);
Route::get('/etat-caisse/',[SalesController::class, 'etat_caisse']);
Route::get('/etat-stock/',[SalesController::class, 'etat_stock']);
Route::get('approvisionnement/',[SalesController::class, 'all_provision']);
Route::get('faire-appro/',[SalesController::class, 'faire_appro']);
Route::post('/post-appro/',[SalesController::class, 'post_caisse']);








Route::get('/logout', [AuthenticatedSessionController::class, 'destroy']);
Route::middleware(['auth','medecin_generaliste'])->group(function () {
    //  Route::get('/generaliste/dashboard', [MedecinGeneralistController::class, 'index'])->name('medecin.generaliste.dashboard');
    //  Route::get('/generaliste/profile', [MedecinGeneralistController::class, 'profil'])->name('generaliste.profil');
    //  Route::get('/generaliste/patient/liste', [MedecinGeneralistController::class, 'ListePatient'])->name('generaliste.patient.liste');
    //  Route::get('/generaliste/patient/details', [MedecinGeneralistController::class, 'patient'])->name('generaliste.patient.details');
    //  Route::get('/generaliste/patient/waiting', [MedecinGeneralistController::class, 'WaitingPatient'])->name('generaliste.patient.waiting');

    Route::resource('admin',AdminController::class);
    Route::resource('services',ServiceController::class);
    Route::resource('departement',DepartementController::class);
    Route::resource('personnel', PersonnelController::class);
});
//  Route::middleware(['auth','medecin_generaliste'])->group(function () {
//      Route::get('/medecin/specialiste/dashboard', [AdminController::class, 'index'])->name('medecin.specialiste.dashboard');
//    });
//  Route::middleware(['auth','caisse'])->group(function () {
//      Route::get('/caisse/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
//    });
//  Route::middleware(['auth','acceuil'])->group(function () {
//      Route::get('/accueil/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
//    });