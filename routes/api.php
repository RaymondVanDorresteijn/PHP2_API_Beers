<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\BeerController;
use App\Http\Controllers\Api\BrewerController;
use App\Http\Controllers\Api\ContactPersonsController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Beers
Route::get('/beers', 'App\Http\Controllers\Api\BeerController@getAllBeers');
Route::get('/brewerBeers/{id}', 'App\Http\Controllers\Api\BeerController@getBrewerBeers');
Route::get('/beers/{id}', 'App\Http\Controllers\Api\BeerController@getBeer');
Route::post('/beers', 'App\Http\Controllers\Api\BeerController@createBeer');
Route::put('/beers/{id}', 'App\Http\Controllers\Api\BeerController@updateBeer');
Route::delete('/beers/{id}','App\Http\Controllers\Api\BeerController@deleteBeer');

// Brewers
Route::get('/brewers', 'App\Http\Controllers\Api\BrewerController@getAllBrewers');
Route::get('/brewers/{id}', 'App\Http\Controllers\Api\BrewerController@getBrewer');
Route::post('/brewers', 'App\Http\Controllers\Api\BrewerController@createBrewer');
Route::put('/brewers/{id}', 'App\Http\Controllers\Api\BrewerController@updateBrewer');
Route::delete('/brewers/{id}','App\Http\Controllers\Api\BrewerController@deleteBrewer');

// Contact Persons
Route::get('/contactpersons', 'App\Http\Controllers\Api\ContactPersonsController@getAllContactPersons');
Route::get('/brewerContactPersons/{id}', 'App\Http\Controllers\Api\ContactPersonsController@getBrewerContactPersons');
Route::get('/contactpersons/{id}', 'App\Http\Controllers\Api\ContactPersonsController@getContactPerson');
Route::post('/contactpersons', 'App\Http\Controllers\Api\ContactPersonsController@createContactPerson');
Route::put('/contactpersons/{id}', 'App\Http\Controllers\Api\ContactPersonsController@updateContactPerson');
Route::delete('/contactpersons/{id}','App\Http\Controllers\Api\ContactPersonsController@deleteContactPerson');