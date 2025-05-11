<?php

use App\Http\Controllers\ButtonController;
use App\Livewire\Products\ProductCreate;
use App\Livewire\Products\ProductEdit;
use App\Livewire\Products\ProductIndex;
use App\Livewire\Products\ProductShow;
use App\Livewire\Users\UserCreate;
use App\Livewire\Users\UserEdit;
use App\Livewire\Users\UserIndex;
use App\Livewire\Users\UserShow;
use Illuminate\Support\Facades\Route;
Route::get('/', function () {
    return view('welcome');
});

// Route::get('/user', function () {
//     return view('user');
// // // });
//  Route::get('/user',[ButtonController::class,'index'])->name('user.index');
//  Route::post('/button-clicked', [ButtonController::class, 'buttonClicked'])->name('button.clicked');
//  Route::get('/reception',[ButtonController::class,'reception'])->name('reception');


 // spatie
 Route::get('/user',UserIndex::class)->name('user.index');
 Route::get('/user/create',UserCreate::class)->name('user.create');
Route::get('/user/edit/{id}',UserEdit::class)->name('user.edit');
Route::get('/user/show/{id}',UserShow::class)->name('user.show');

Route::get('products',ProductIndex::class)->name('products.index');
Route::get('/products/create',ProductCreate::class)->name('products.create');
Route::get('/products/edit/{id}',ProductEdit::class)->name('products.edit');
Route::get('/products/show/{id}',ProductShow::class)->name('products.show');
