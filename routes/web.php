<?php

use App\Models\Doctor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


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

Route::get('/', function () {

    if(Auth::id()){
        return back();
    } 
    else {
        $doctors= Doctor::all();
    return view('welcome' ,compact('doctors'));
    }
    
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Route::get('/dashboard', [App\Http\Controllers\AdminController::class, 'dashboard'])->name('dashboard');
Route::get('/add-doctor',  [App\Http\Controllers\AdminController::class, 'addDoctor'])->name('doctor');
Route::post('/add-doctor', [App\Http\Controllers\AdminController::class, 'store'])->name('addDoctor');
Route::get('/alldoctor',   [App\Http\Controllers\AdminController::class, 'doctor'])->name('alldoctors');
Route::get('/delete-doctor/{id}', [App\Http\Controllers\AdminController::class, 'deleteDoctor'])->name('doctor-delete');
Route::get('/update-doctor/{id}', [App\Http\Controllers\AdminController::class, 'editdoctor'])->name('update');
Route::post('/updated-doctor/{id}', [App\Http\Controllers\AdminController::class, 'updateDoctor'])->name('updated');



Route::get('/appointment', [App\Http\Controllers\AdminController::class, 'show'])->name('allAppointment');
Route::get('/delete/{id}', [App\Http\Controllers\AdminController::class, 'deleteAppointment'])->name('delete');
Route::get('/approve/{id}',[App\Http\Controllers\AdminController::class, 'approved'])->name('approve');
Route::get('/mail/{id}', [App\Http\Controllers\AdminController::class, 'sendMail'])->name('mail');
Route::post('/notification/{id}', [App\Http\Controllers\AdminController::class, 'mailNotification'])->name('mailnotification');


Route::get('/alluser',     [App\Http\Controllers\AdminController::class, 'user'])->name('allusers');
Route::get('/delete-user/{id}', [App\Http\Controllers\AdminController::class, 'deleteuser'])->name('user-delete');



Route::get('/doctors', [App\Http\Controllers\DoctorController::class, 'allDoctor'])->name('allDoctor');
Route::get('/search', [App\Http\Controllers\DoctorController::class, 'search'])->name('searchDoctor');
Route::get('/main', [App\Http\Controllers\DoctorController::class, 'main'])->name('back');
Route::post('/appointment', [App\Http\Controllers\DoctorController::class, 'appointment'])->name('appointment');
Route::get('/my-appointment', [App\Http\Controllers\DoctorController::class, 'myAppointment'])->name('myAppointment');
Route::get('/cancel/{id}', [App\Http\Controllers\DoctorController::class, 'cancelAppointment'])->name('cancel');
