<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\afterlogin\jobsController;
use App\Http\Controllers\afterlogin\pagesController as afterloginController;

Route::get('/', [PagesController::class, 'welcome'])->name('welcome');
Route::get('/about',[pagesController::class,'about'])->name('about');
Route::get('/contact',[pagesController::class,'contact'])->name('contact');
Route::get('/services',[pagesController::class,'services'])->name('services');
Route::get('/companies',[pagesController::class,'companies'])->name('companies');
Route::get('/available-jobs',[pagesController::class,'jobs'])->name('jobs');
Route::get('/job',[pagesController::class,'show'])->name('show');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// afterlogin ....
Route::middleware('auth')->group(function () {
Route::get('/dashboard',[afterloginController::class,'dashboard'])->name('user.dashboard');
Route::get('/profile',[afterloginController::class,'profile'])->name('user.profile');
Route::get('/settings', [afterloginController::class,'settings'])->name('user.settings');
Route::get('/your-applied-jobs',[afterloginController::class,'yaj'])->name('user.yaj');
Route::resource('/jobs',jobsController::class);
Route::post('/jobs', [jobsController::class, 'store'])->name('jobs.store');
Route::get('/jobs', [jobsController::class, 'index'])->name('jobs.index');
Route::post('/create-company',[jobsController::class,'create_company'])->name('create.company');
Route::get('/company/{company}/edit', [jobsController::class, 'edit'])->name('company.edit');
Route::put('/company/{company}', [jobsController::class, 'update'])->name('company.update');
});