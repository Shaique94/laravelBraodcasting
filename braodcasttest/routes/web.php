<?php

use App\Http\Controllers\ButtonController;
use Illuminate\Support\Facades\Route;
Route::get('/', function () {
    return view('welcome');
});

// Route::get('/user', function () {
//     return view('user');
// // });
 Route::get('/user',[ButtonController::class,'index'])->name('user.index');
 Route::post('/button-clicked', [ButtonController::class, 'buttonClicked'])->name('button.clicked');
 Route::get('/reception',[ButtonController::class,'reception'])->name('reception');

