<?php
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

/* Route pour authentification */

Auth::routes();

/***** DIRECTION & CONDUCTEUR DE TRAVEAUX *****/

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');


Route::get('/home/Dernier_Rapport', 'compte_rendu_rapportController@showData_dernier_rapport')->name('showData_dernier_rapport');
Route::get('/home/Dernières_observations', 'compte_rendu_rapportController@showData_dernières_observations')->name('showData_dernières_observations');


Route::get('/home/Historique_rapports', 'HistoriqueController@historique_rapports')->name('historique_rapports');
Route::post('/home/Historique/Rapport', 'compte_rendu_rapportController@showData_dernier_rapport')->name('showData_rapport');

Route::get('/home/Historique_observations', 'HistoriqueController@historique_observations')->name('historique_observations');
Route::post('/home/Historique/Observations', 'compte_rendu_rapportController@showData_dernières_observations')->name('showData_observations');


Route::get('/home/paramètres', 'ParamètresController@index')->name('paramètres');
Route::resource('user', 'ParamètresController');

Route::get('/home/contacts', 'ContactsController@index')->name('contacts');

Route::get('/home/formulaire', 'conducteur_travauxController@getView')->name('formulaire_conducteur');

Route::get('//home/Dernier_Rapport/Téléchargement', 'compte_rendu_rapportController@export')->name('export');;


/***** Responsables *****/

Route::post('/Resp_Consolidation_TBA', 'c_resp_conso_tbaController@sendData')->name('StoreData_conso_TBA');
Route::post('/Resp_Dégarnissage', 'c_resp_degarnissageController@sendData')->name('StoreData_degarnissage');
Route::post('/Resp_Finitions', 'c_resp_finitionsController@sendData')->name('StoreData_finitions');
Route::post('/Resp_Libération', 'c_resp_liberationController@sendData')->name('StoreData_liberation');
Route::post('/Resp_Nivellements_Complémentaires', 'c_resp_nivel_compleController@sendData')->name('StoreData_nivel_comple');
Route::post('/Resp_Pépa_Coupe', 'c_resp_prepa_coupeController@sendData')->name('StoreData_prepa_coupe');
Route::post('/Resp_Pépa_Deg', 'c_resp_prepa_degController@sendData')->name('StoreData_prepa_deg');
Route::post('/Resp_Relevage', 'c_resp_relevageController@sendData')->name('StoreData_relevage');
Route::post('/Resp_Substitution', 'c_resp_substitutionController@sendData')->name('StoreData_substitution');



Route::post('/Conducteur_travaux', 'conducteur_travauxController@sendData')->name('StoreData_conducteur');
