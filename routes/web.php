<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\MainPagesController;
use App\Http\Controllers\ServicePagesController;
use App\Http\Controllers\PortfolioPagesController;
use App\Http\Controllers\AboutPagesController;
use App\Http\Controllers\ContactFormController;

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
Route::get('/',[PagesController::class,'index'])->name('home');
Route::prefix('admin')->group(function(){
    
    Route::get('/dashboard',[PagesController::class,'dashboard'])->name('admin.home');
    Route::get('/main',[MainPagesController::class,'index'])->name('admin.main');
    Route::put('/main',[MainPagesController::class,'update'])->name('admin.main.update');


    Route::get('/services/create',[ServicePagesController::class,'create'])->name('admin.services.create');
    Route::post('/services/store',[ServicePagesController::class,'store'])->name('admin.services.store');
    Route::get('/services/list',[ServicePagesController::class,'index'])->name('admin.services.list');
    Route::get('/services/edit/{id}',[ServicePagesController::class,'edit'])->name('admin.services.edit');
    Route::post('/services/edit/{id}',[ServicePagesController::class,'update'])->name('admin.services.update');
    Route::delete('/services/destroy/{id}',[ServicePagesController::class,'destroy'])->name('admin.services.destroy');

    Route::get('/portfolios/create',[PortfolioPagesController::class,'create'])->name('admin.portfolios.create');
    Route::put('/portfolios/store',[PortfolioPagesController::class,'store'])->name('admin.portfolios.store');
    Route::get('/portfolios/list',[PortfolioPagesController::class,'index'])->name('admin.portfolios.list');
    Route::get('/portfolios/edit/{id}',[PortfolioPagesController::class,'edit'])->name('admin.portfolios.edit');
    Route::put('/portfolios/edit/{id}',[PortfolioPagesController::class,'update'])->name('admin.portfolios.update');
    Route::delete('/portfolios/destroy/{id}',[PortfolioPagesController::class,'destroy'])->name('admin.portfolios.destroy');

    Route::get('/abouts/create',[AboutPagesController::class,'create'])->name('admin.abouts.create');
    Route::put('/abouts/store',[AboutPagesController::class,'store'])->name('admin.abouts.store');
    Route::get('/abouts/list',[AboutPagesController::class,'index'])->name('admin.abouts.list');
    Route::get('/abouts/edit/{id}',[AboutPagesController::class,'edit'])->name('admin.abouts.edit');
    Route::put('/abouts/edit/{id}',[AboutPagesController::class,'update'])->name('admin.abouts.update');
    Route::delete('/abouts/destroy/{id}',[AboutPagesController::class,'destroy'])->name('admin.abouts.destroy');
});

Route::post('/contact',[ContactFormController::class,'store'])->name('contact.store');
 
Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
