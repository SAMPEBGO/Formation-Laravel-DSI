<?php

use App\Models\User;
use App\Models\Produit;
use App\Mail\NouveauProduitAjouter;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProduitController;
use App\Notifications\NouveauProduitNotification;

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

Route::get('/',                             [MainController::class, 'afficheAccueil'])->name('accueil');

Route::get('procedure/{param}',             [MainController::class, 'afficheProcedure'])->name('procedure');

Route::get('ajout',                         [MainController::class, 'ajoutProduit'])->name('a.produit');

Route::get('ajoutEncore',                   [MainController::class, 'ajoutProduitEncore'])->name('a.p');

//appel de la liste des produits
Route::get('listeProduit',                   [MainController::class, 'getList'])->name('a.l');

//modifier un produit  
Route::get('modifierProduit/{id}',                   [MainController::class, 'modifierProduit']);

//supprimer un produit
Route::get('supprimerProduit/{id}',                   [MainController::class, 'supprimerProduits'])->name('delete');

//Ajouter commande
Route::get('ajoutCommande/{id}',                   [MainController::class, 'ajouterCommande'])->name('ajouterCommandes');

//supprimer une commande
Route::get('supprimerCommande/{id}',                   [MainController::class, 'supprimerCommande'])->name('deletecommande');

//route pour la liste des produits a afficher sur la page
Route::get('produits/liste',                   [MainController::class, 'getList'])->name('produits.liste');

//
Route::get('produits/ajouter',                   [MainController::class, 'ajouterProduit'])->name('produit.ajout');


//route pour enregistrer le produit avec post
Route::post('produits/enregistrer', [MainController::class, "enregistrerProduit"])->name('produits.eregistrer');


// Route::get('produits/modifier/{id}', [MainController::class, "editProduit"])->name('produits.edit');

//route en utilisant dle controleur de ressource
Route::get('produits/modifier/{produit}', [ProduitController::class, "edit"])->name('produits.edits');

Route::put('produits/update/{id}', [MainController::class, "updateProduit"])->name('produits.updates');


// utiliser cette commande ,   on efface les [] par defaut
Route::resource('produits', ProduitController::class);

//
Route::get('export-excel', [MainController::class, "excelExport"])->name('export');

Route::get('test-mail', function (){
    //dd('ok');
   // $user = User::first();
    $produit = Produit::first();
   return new NouveauProduitAjouter($produit);
});

Route::get('test-notification', function () {
    $user = User::first();
    $produit = Produit::first();
    $user->notify(new NouveauProduitNotification($produit));
    
    
});