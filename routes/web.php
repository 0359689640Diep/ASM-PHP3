<?php

use App\Http\Controllers\AuthController;
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
Route::prefix("/")->group(function() {
    Route::get('/', function () {
        return view('client.index');
    })->name("client.home"); 
    // đăng ký tài khoản
    Route::get('/register', function(){
        return view('client.register');
    });
    Route::post("/register", [AuthController::class, "register"])->name("register");
    Route::get('/verify', function(){
        return view("client.verify");
    })->name("client.verify");
    Route::post('/verify', [AuthController::class, 'verify'])->name('verify');

    // đăng nhập
    Route::get('/login', function(){
        return view('client.login')->name("login");
    });

    Route::group([
        'middleware' => "web",
        "prefix" => "auth"
    ], function($router){
        
    });
});

// admin
Route::group(['middleware' => "web",'prefix' => '/admin'], function(){
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

