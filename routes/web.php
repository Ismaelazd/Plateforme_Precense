<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

// Ressources Welcome
Route::get('/','WelcomeController@index')->name('Welcome');
Route::resource('welcome', 'WelcomeController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('admin');


Route::get('/calendrier', function() {
    return view('calendrier');
})->name('calendrier')->middleware('connected','notMember');
 

Route::resource('event', 'EventController')->middleware(['connected','notMember']);
Route::resource('classe', 'ClasseController')->middleware(['connected','notMember']);
Route::resource('presence', 'PresenceController')->middleware(['connected','notMember']);
Route::post('presence/{event}', 'PresenceController@store')->name('presence.add')->middleware(['connected','notMember']);
Route::get('presence/download/{id}', 'PresenceController@download')->name('presence.download')->middleware(['connected','notMember']);
Route::resource('user', 'UserController')->middleware('admin');
Route::get('/visiteurs','UserController@visiteur')->name('visiteurs')->middleware('admin');

// Ressource MYPROFIL

Route::resource('myProfil', 'MyProfilController')->middleware('connected');

// Ressources Formulaire

Route::resource('form', 'FormController')->middleware('admin');

// Ressources NEWSLETTER

Route::resource('newsletter', 'NewsletterController')->middleware('admin');
// Ressources User

Route::resource('user', 'UserController')->middleware('admin');




//afficher le tableau de ce qui est dans la corbeille
Route::get('formTrashed', 'FormController@trash')->name('form.trash')->middleware('admin');

// delete et donc mettre dans la corbeille
// Route::delete('form/{form}/destroy', 'ServiceController@destroy')->name('form.destroy');

//pour delete definitivement
Route::delete('form/{id}/force', 'FormController@forceDestroy')->name('form.forceDestroy')->middleware('admin');

// pour restaurer 
Route::put('form/{id}/restore', 'FormController@restore')->name('form.restore')->middleware('admin');