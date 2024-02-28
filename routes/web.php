<?php

use App\Livewire\AboutPage;
use App\Livewire\ContactPage;
use App\Livewire\EmployeeForm;
use App\Livewire\HomePage;
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

Auth::routes();

Route::get('/', HomePage::class)->name('homepage');
Route::get('/about', AboutPage::class)->name('about');
Route::get('/contact', function () {
    return view('contact-page');
})->name('contact');

Route::get('/employee', function () {
    return view('employee-page');
})->name('employee');
