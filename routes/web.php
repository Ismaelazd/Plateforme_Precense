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

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/calendrier', function() {
    return view('calendrier');
})->name('calendrier');
 

Route::resource('event', 'EventController');
Route::resource('classe', 'ClasseController');
Route::resource('presence', 'PresenceController');
Route::post('presence/{event}', 'PresenceController@store')->name('presence.add');
Route::get('presence/download/{id}', 'PresenceController@download')->name('presence.download');
Route::resource('user', 'UserController');


// Ressource MYPROFIL

Route::resource('myProfil', 'MyProfilController');

// Ressources Formulaire

Route::resource('form', 'FormController');

// Ressources NEWSLETTER

Route::resource('newsletter', 'NewsletterController');




//afficher le tableau de ce qui est dans la corbeille
Route::get('formTrashed', 'FormController@trash')->name('form.trash');

// delete et donc mettre dans la corbeille
// Route::delete('form/{form}/destroy', 'ServiceController@destroy')->name('form.destroy');

//pour delete definitivement
Route::delete('form/{id }/force', 'FormController@forceDestroy')->name('form.forceDestroy');

// pour restaurer 
Route::put('form/{id}/restore', 'FormController@restore')->name('form.restore');