<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

Route::get('/', function () {return view('HOME'); })->name('HOME');
Route::get('/inscription', function () {return view('inscription'); });
Route::get('/firstConnection',function(){ return view('validation'); });
Route::get('/connection',function(){ return view('connection'); });
Route::get('/connection/espaceEtudiant',function(){  return view('espaceEtudiant'); });
// return la vue de candidature
Route::get('/espaceEtudiant/candidature','etudiantController@vueCandidature');
// permet de sauvegarder la candidature dans la BD
Route::post('/candidater', 'etudiantController@candidate');
Route::get('/espaceEtudiant/contact','groupeController@index');
Route::post('etudiantController', 'etudiantController@sauvegarder');
Route::post('/resutat', 'etudiantController@show');
Route::post('validationController', 'validationController@create');
Route::resource('validation','validationController');
// Message
Route::post('validation/contact','validationController@store');
Route::post('groupe/contact', 'groupeController@create');
Route::post('user/connection', 'etudiantController@store');
Route::resource('user', 'etudiantController');
Route::resource('groupe','groupeController');
Route::resource('consulter','enseignantController');
Route::resource('candidature','CandidatureController');
// Connection admin
Route::post('/login', 'UserController@store');
Route::resource('admin','UserController');
// Ajouter un enseignant
Route::get('/ajouterPage','UserController@ajouterPage');
Route::post('/enseignant','groupeController@store');
// Téchargement des pièces
Route::get('download/formulaire/{id}','downloadController@form')->name('form');
Route::get('download/ent/{id}','downloadController@ent')->name('ent');
Route::get('download/note/{id}','downloadController@note')->name('note');
Route::get('download/lettre/{id}','downloadController@lettre')->name('lettre');
Route::get('download/cv/{id}','downloadController@cv')->name('cv');

