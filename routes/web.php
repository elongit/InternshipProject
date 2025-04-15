<?php

use App\Http\Controllers\AddUser;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SessionController;
use App\Http\Middleware\AdminAuth;
use App\Http\Controllers\TreasuryController;
use App\Http\Controllers\ShelfController;
use App\Http\Controllers\BoxController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\DivisionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TrackedEmployeesController;
use App\Http\Controllers\UserRequest;
use App\Http\Controllers\UsersList;

//-------------------------------------

Route::get('/', function () {
    return view('home');
})->name('/');
//-------------------------------------

Route::middleware(['auth' , 'AdminAuth'])->group( function(){


    Route::controller(TrackedEmployeesController::class)->group(function(){
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
        Route::get('/AddDocument' , 'create')->name('AddDocument');
    });
    
    
    Route::controller(DivisionController::class)->group(function(){
        Route::get('/division' , 'create')->name('division');
    
    });

    Route::controller(AddUser::class)->group(function(){
        Route::get('/addUser' , 'create')->name('addUser');
        Route::post('/addUser' , 'store')->name('addUser.store');

    
    });

    Route::controller(UsersList::class)->group(function(){
        Route::get('/users' , 'create')->name('users');
        Route::get('/users/{user}' , 'edit')->name('user.edit');
        Route::put('/users/{user}' , 'update')->name('user.update');
        Route::delete('/users/{user}' , 'destroy')->name('user.delete');
    
    });


});

Route::get('/documents', [DashboardController::class , 'index'])->name('documents')->middleware('auth');


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







