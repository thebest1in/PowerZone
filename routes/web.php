<?php

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\PowerZone;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\directeurController;
use App\Http\Controllers\gestionnaireController;

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

Route::get('/', [PowerZone::class,"index"]);
Route::get('/abonnements/{n?}', [PowerZone::class,"indexAbonnement"]);
Route::get('/emploiG/{n?}', [PowerZone::class,"emploiG"]);
Route::get('/emploiM/{n?}', [PowerZone::class,"emploiM"]);
Route::get('/formulaire',function (){return view('formulaire');});
Route::post('/demander', [PowerZone::class,"demander"]);

Route::get('/login',function (){return view('login');});
Route::post('/verify', [PowerZone::class,"verify"]);
Route::get('/logout', [PowerZone::class,"logout"]);

Route::get('/admin', function (){
    session_start();
    if(!empty($_SESSION["id"])){
        $rs=DB::select("select * from users where id = ?",[$_SESSION["id"]]);
        return view('admin.admin',["admin"=>$rs]);
    }else{
        return redirect('/login');
    }
    
});
Route::get('/gestionnaire', function (){
    session_start();
    if(!empty($_SESSION["id"])){
        $rs=DB::select("select * from users where id = ?",[$_SESSION["id"]]);
        return view('gestionnaire.gestionnaire',["gestionnaire"=>$rs]);
    }else{
        return redirect('/login');
    }
});
Route::get('/directeur', function (){
    session_start();
    if(!empty($_SESSION["id"])){
        $rs=DB::select("select * from users where id = ?",[$_SESSION["id"]]);
        return view('directeur.directeur',["directeur"=>$rs]);
    }else{
        return redirect('/login');
    }
});


// had xi 3la hsab admin

Route::get('/admin/utilisateur', [adminController::class,"utilisateur"]);
Route::get('/ajouterUtilisateur', function (){
    return view('admin.utilisateur.ajouterU');
});
Route::post('/ajouterU',[adminController::class,"ajouterUtilisateur"]);
Route::get('/deleteUtilisateur/{n}',[adminController::class,"deleteUtilisateur"]);

Route::get('/admin/compte', [adminController::class,"compteAdmin"]);
Route::post('/updateAdmin', [adminController::class,"updateAdmin"]);







// // had xi 3la hsab gestionnaire

Route::get('/gestionnaire/adherents/{n}', [gestionnaireController::class,"adherents"]);
Route::get('/gestionnaire/groupes', [gestionnaireController::class,"Groupes"]);
Route::get('/ajouterGroupes', function (){
    return view('gestionnaire.groupes.ajouterG');
});
Route::post('/ajouterG',[gestionnaireController::class,"ajouterGroupes"]);
Route::get('/updateGroupes/{n}',[gestionnaireController::class,"getGroupes"]);
Route::post('/modifierGroupes',[gestionnaireController::class,"updateGroupes"]);
Route::get('/deleteGroupes/{n}',[gestionnaireController::class,"deleteGroupes"]);
Route::get('/ajouterAdherents/{n}', function ($n){
    $rs=DB::select("select * from typeAbonnements");
    return view('gestionnaire.groupes.ajouterAd',['rs'=>$rs,'groupe'=>$n]);
});
Route::post('/ajouterAd',[gestionnaireController::class,"ajouterAdherents"]);
Route::get('/updateAdherents/{n}',[gestionnaireController::class,"getAdherents"]);
Route::post('/modifierAdherents',[gestionnaireController::class,"updateAdherents"]);
Route::get('/deleteAdherents/{n}',[gestionnaireController::class,"deleteAdherents"]);

Route::get('/gestionnaire/suivie', [gestionnaireController::class,"paiement"]);
Route::get('/effectue/{n}', [gestionnaireController::class,"effectue"]);
Route::get('/pdf/{n}', [PdfController::class, 'index']);




Route::get('/gestionnaire/moniteur', [gestionnaireController::class,"Moniteur"]);
Route::get('/ajouterMoniteur', function (){
    return view('gestionnaire.moniteur.ajouterM');
});
Route::post('/ajouterM',[gestionnaireController::class,"ajouterMoniteur"]);
Route::get('/updateMoniteur/{n}',[gestionnaireController::class,"getMoniteur"]);
Route::post('/modifierMoniteur',[gestionnaireController::class,"updateMoniteur"]);
Route::get('/deleteMoniteur/{n}',[gestionnaireController::class,"deleteMoniteur"]);

Route::get('/gestionnaire/activites', [gestionnaireController::class,"Activites"]);
Route::get('/ajouterActivites', function (){
    return view('gestionnaire.activites.ajouterA');
});
Route::post('/ajouterA',[gestionnaireController::class,"ajouterActivites"]);
Route::get('/updateActivites/{n}',[gestionnaireController::class,"getActivite"]);
Route::post('/modifierActivites',[gestionnaireController::class,"updateActivite"]);
Route::get('/deleteActivites/{n}',[gestionnaireController::class,"deleteActivite"]);

Route::get('/gestionnaire/abonnements', [gestionnaireController::class,"Abonnements"]);
Route::get('/ajouterAbonnements', [gestionnaireController::class,"viewAjouter"]);
Route::post('/ajouterAb',[gestionnaireController::class,"ajouterAbonnements"]);
Route::get('/updateAbonnements/{n}',[gestionnaireController::class,"getAbonnements"]);
Route::post('/modifierAbonnements',[gestionnaireController::class,"updateAbonnements"]);
Route::get('/deleteAbonnements/{n}',[gestionnaireController::class,"deleteAbonnements"]);

Route::get('/gestionnaire/demandes', [gestionnaireController::class,"demandes"]);
Route::get('/deleteD/{n}',[gestionnaireController::class,"deleteD"]);

Route::get('/gestionnaire/compte', [gestionnaireController::class,"compteGestionnaire"]);
Route::post('/updateGestionnaire', [gestionnaireController::class,"updateGestionnaire"]);

Route::get('/gestionnaire/annonces', [gestionnaireController::class,"annonces"]);
Route::get('/ajouterAnnonces', function (){
    $rs=DB::select('select * from activites');
    return view('gestionnaire.annonces.ajouterA',["activites"=>$rs]);
});
Route::post('/ajouterAn',[gestionnaireController::class,"ajouterAnnonces"]);
Route::get('/updateAnnonces/{n}',[gestionnaireController::class,"getAnnonces"]);
Route::post('/modifierAnnonces',[gestionnaireController::class,"updateAnnonces"]);
Route::get('/deleteAnnonces/{n}',[gestionnaireController::class,"deleteAnnonces"]);


Route::get('/gestionnaire/emploi', [gestionnaireController::class,"Emploi"]);
Route::get('/ajouterSence', [gestionnaireController::class,"viewAjouterSence"]);
Route::post('/ajouterS',[gestionnaireController::class,"ajouterSence"]);
Route::get('/updateSence/{n}',[gestionnaireController::class,"getSence"]);
Route::post('/modifierSence',[gestionnaireController::class,"updateSence"]);
Route::get('/deleteSence/{n}',[gestionnaireController::class,"deleteSence"]);





// had xi 3la 7sab directeur
Route::get('/directeur/statistique', [directeurController::class,"statistique"]);
Route::get('/directeur/revenu', function (){return view('directeur.revenu.revenu');});
Route::post('/directeur/revenu/recherche', [directeurController::class,"revenu"]);

Route::get('/directeur/compte', [directeurController::class,"compteDirecteur"]);
Route::post('/updateDirecteur', [directeurController::class,"updateDirecteur"]);