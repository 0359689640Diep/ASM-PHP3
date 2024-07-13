<?php

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

// client
Route::group(['prefix' => '/'], function(){
    Route::get('/', function () {
        return view('client.index');
    })->name("client.home");
});

Route::group(['prefix' => '/admin'], function(){
    Route::get('/', function() {
        return view("admin.index");
    })->name("admin.home");

    // product
    Route::prefix('product')->group(function () {
        Route::get('/', function() {
            return view("admin.product.index");
        })->name("admin.product.list");
        Route::get('/create', function() {
            return view("admin.product.add");
        })->name("admin.product.add");
        Route::get('/update/{id}', function() {
            return view("admin.product.edit");
        })->name("admin.product.edit");
    });
});

