<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
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

// Route::get('/', function () {
//     return view('pages/main');
// });
Route::get('main', [AdminController::class, 'index']);
Route::get('add_disease', [AdminController::class, 'view_add_disease']);
Route::get('hospital', [AdminController::class, 'view_hospital']);
Route::get('add_medicine', [AdminController::class, 'view_add_medicine']);
Route::get('add_prescription', [AdminController::class, 'view_add_prescription']);
Route::post('diseases', [AdminController::class, 'add_disease']);
Route::post('medicines', [AdminController::class, 'add_medicine']);
Route::get('update_disease/{id}', [AdminController::class, 'update_disease']);
Route::post('disease_update', [AdminController::class, 'disease_update']);
Route::get('update_medicine/{id}', [AdminController::class, 'update_medicine']);
Route::post('medicine_update', [AdminController::class, 'medicine_update']);
Route::get('delete_disease/{id}', [AdminController::class, 'delete_disease']);
Route::get('delete_medicine/{id}', [AdminController::class, 'delete_medicine']);

Route::post('save_details', [AdminController::class, 'save_details']);
Route::post('save_prescription', [AdminController::class, 'save_prescription']);
Route::get('payment/{patient_id}', [AdminController::class, 'payment']);
Route::post('save_payment', [AdminController::class, 'save_payment']);
Route::get('print_prescription/{patient_id}', [AdminController::class, 'print_prescription']);
Route::post('update_details/{id}', [AdminController::class, 'update_details']);
Route::get('get_medical_history/{patient_name}', [AdminController::class, 'get_medical_history']);
Route::get('', [LoginController::class, 'view_login']);
Route::post('check_login', [LoginController::class, 'check_login']);
Route::get('check_profile', [LoginController::class, 'check_profile']);
Route::get('logout', [LoginController::class, 'logout']);

Route::get('search', [AdminController::class, 'search']);
Route::get('autocomplete', [AdminController::class, 'autocomplete'])->name('autocomplete');

Route::get('search2', [AdminController::class, 'search2']);
Route::get('autosearch', [AdminController::class, 'autosearch']);
