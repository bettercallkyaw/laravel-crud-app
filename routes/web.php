<?php

use App\Http\Controllers\PersonController;
use App\Models\Person;
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

// Route::get('/', function () {
//     return view('welcome');
// });

//list all persons
Route::get('/',([PersonController::class,'index']))->name('mainhome');

//validate route person
Route::get('/person/create',([PersonController::class,'create']))->name('person.create');
Route::post('/person/create',([PersonController::class,'store']))->name('person.store');

//edit route person
Route::get('/person/{id}/edit',([PersonController::class,'edit']))->name('person.edit');
Route::post('/person/{id}/edit',([PersonController::class,'update']))->name('person.update');

//delete route person
Route::get('/person/{id}/delete',([PersonController::class,'delete']))->name('person.delete');