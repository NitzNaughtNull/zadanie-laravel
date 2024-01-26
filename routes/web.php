<?php

use App\Http\Controllers\PeopleController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
 */

// route group with static prefix
Route::group(["prefix" => "/kielbasa/54902"], function () {
    // assigning all given routes to single controller
    Route::controller(PeopleController::class)->group(function () {
        // route for creating people model entries
        Route::post('people/create', 'create');

        // retriving all people from db
        Route::get('people/all', 'readAll');

        // reading single people model entry
        Route::get('people/{id}', 'read');

        // updating single people model entry
        Route::patch('people/{id}/update', 'update');

        // removing single people model entry from database
        Route::delete('people/{id}/delete', 'delete');
    });
});
