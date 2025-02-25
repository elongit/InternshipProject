<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\RegisterUserController;
use App\Http\Middleware\AdminAuth;
use App\Http\Controllers\TreasuryController;
use App\Http\Controllers\ShelfController;
use App\Http\Controllers\BoxController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\DivisionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\UserRequest;

//-------------------------------------

Route::get('/', function () {
    return view('home');
})->name('/');
//-------------------------------------

Route::middleware('AdminAuth')->group( function(){

    Route::get('/documents', [DashboardController::class , 'index'])->name('documents');

    Route::controller(EmployeesController::class)->group(function(){
        Route::get('/employees' , 'create')->name('employees');
    });

    Route::controller(TreasuryController::class)->group(function(){
        Route::get('/treasury' , 'create')->name('treasury');
    });
    
    Route::controller(ShelfController::class)->group(function(){
        Route::get('/shelf' , 'create')->name('shelf');
    });
    
    Route::controller(BoxController::class)->group(function(){
        Route::get('/box' , 'create')->name('box');
    });


    Route::controller(DocumentController::class)->group(function(){
        Route::get('/document' , 'create')->name('document');
    });
    
    
    Route::controller(DivisionController::class)->group(function(){
        Route::get('/division' , 'create')->name('division');
    
    });


});

Route::get('/user', function () {
    return view('user.userAdmin');
})->middleware('auth')->name('userDashboard');


Route::controller(UserRequest::class)->group(function(){
    Route::get('/request' , 'create')->name('request');
    Route::post('/request' , 'store')->name('request.store');
});



Route::controller(SessionController::class)->group(function(){
    Route::get('/login' , 'create')->name('login');
    // Route::post('/login' , 'store')->name('login.store');
    Route::post('/logout' , 'destroy')->name('logout');

});

Route::controller(RegisterUserController::class)->group(function(){
    Route::get('/register' , 'create')->name('register');
    // Route::post('/register' , 'store')->name('register.store');

});






