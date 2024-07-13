<?php

use App\Http\Controllers\addstudentcontroller;
use Illuminate\Support\Facades\Route;
// use App\http\controllers\indexcontroller;
// use App\http\controllers\addstudentcontroller;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DeviceChangeRequestController;
use App\Models\studenttable;

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

Route::get('/', function () {
    return view('login');
});
Route::view('index','index');
Route::get('index',[addstudentcontroller::class,'studenttable']);

// Route::view('login','login');
// Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login');
// logout 
Route::get('/logout', function () {
    if(session()->has('user'))
    {
        session()->pull('user',null);
    }
    return redirect('/login');
});
Route::get('/login', function () {
    if(session()->has('user'))
    {
        return redirect('/addstudent');
    }
    return view('login',);
});
// studenttable route
Route::view('addstudent' ,'addstudent');
// Route::get('addstudent',[addstudentcontroller::class,'adminone']);
Route::POST('/addstudent',[addstudentcontroller::class,'addstudent']);
Route::get('del/{id}',[addstudentcontroller::class,'delete']);
// Route::view('/editstudent','editstudent');
Route::get('/editstudent',[addstudentcontroller::class,'show']);
Route::get('editstudent/{id}',[addstudentcontroller::class,'edit']);
Route::put('todo_update/{id}',[addstudentcontroller::class,'update'])->name('todo.update');

// pdf generatePDF
// Route::get('/studentpdf', [addstudentcontroller::class, 'generatePDF']);
Route::get('/studentpdf/{id}', [addstudentcontroller::class, 'generatePDF'])->name('generatePDF');

Route::get('/alldatapdf', [addstudentcontroller::class, 'allgeneratePDF']);
