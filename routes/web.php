<?php

use App\Validationchange;
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
    $changements = Validationchange::all();

    return view('calendrier',compact('changements'));
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

Route::resource('user', 'UserController');

// Ressources Info

Route::resource('info', 'InfoController')->middleware('admin');

// Ressources About

Route::resource('about', 'AboutController')->middleware('admin');

// Ressources Testimonial

Route::resource('testimonial', 'TestimonialController');
Route::post('testimonial/{id}/store','TestimonialController@store')->name('testimonial.store');




//afficher le tableau de ce qui est dans la corbeille
Route::get('formTrashed', 'FormController@trash')->name('form.trash')->middleware('admin');

// delete et donc mettre dans la corbeille
// Route::delete('form/{form}/destroy', 'FormController@destroy')->name('form.destroy');

//pour delete definitivement
Route::delete('form/{id}/force', 'FormController@forceDestroy')->name('form.forceDestroy')->middleware('admin');

// pour restaurer 
Route::put('form/{id}/restore', 'FormController@restore')->name('form.restore')->middleware('admin');



Route::resource('validationchange', 'ValidationchangeController');
Route::post('validationchange/{id}/store','ValidationchangeController@store')->name('validationchange.store');

//messagerie
Route::post('messagerie/{id}/store','MessagerieController@store')->name('messagerie.store');


// Ressources Slide

Route::resource('slide', 'SlideController')->middleware('admin');