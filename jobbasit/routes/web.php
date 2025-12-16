<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;

Route::get('/', [PagesController::class, 'welcome'])->name('welcome');
Route::get('/about',[pagesController::class,'about'])->name('about');
Route::get('/contact',[pagesController::class,'contact'])->name('contact');
Route::get('/services',[pagesController::class,'services'])->name('services');
Route::get('/companies',[pagesController::class,'companies'])->name('companies');
Route::get('/available-jobs',[pagesController::class,'jobs'])->name('jobs');
Route::get('/job',[pagesController::class,'show'])->name('show');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
