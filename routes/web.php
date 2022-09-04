<?php

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

// controller admin route
use App\Http\Controllers\AdminCtrl;
use App\Http\Controllers\LoginCtrl;






Route::get('/', [AdminCtrl::class,'index']);

// Login
Route::get('/login', [LoginCtrl::class,'index']);
Route::post('/login/cek', [LoginCtrl::class,'cek_login']);

Route::get('/logout', [LoginCtrl::class,'logout']);



// daftar balita
Route::get('/dashboard/balita/data', [AdminCtrl::class,'balita']);
Route::get('/dashboard/balita/add', [AdminCtrl::class,'balita_add']);
Route::post('/dashboard/balita/act', [AdminCtrl::class,'balita_act']);

Route::get('/dashboard/balita/edit/{id}', [AdminCtrl::class,'balita_edit']);
Route::post('/dashboard/balita/update', [AdminCtrl::class,'balita_update']);
Route::get('/dashboard/balita/delete/{id}', [AdminCtrl::class,'balita_delete']);

// indikator
Route::get('/dashboard/indikator/data', [AdminCtrl::class,'indikator']);
Route::get('/dashboard/indikator/add', [AdminCtrl::class,'indikator_add']);
Route::post('/dashboard/indikator/act', [AdminCtrl::class,'indikator_act']);

Route::get('/dashboard/indikator/edit/{id}', [AdminCtrl::class,'indikator_edit']);
Route::post('/dashboard/indikator/update', [AdminCtrl::class,'indikator_update']);
Route::get('/dashboard/indikator/delete/{id}', [AdminCtrl::class,'indikator_delete']);





// role 
Route::get('/dashboard/role/data', [AdminCtrl::class,'role']);
Route::post('/dashboard/role/act', [AdminCtrl::class,'role_act']);

Route::get('/dashboard/role/edit/{id}', [AdminCtrl::class,'role_edit']);
Route::post('/dashboard/role/update', [AdminCtrl::class,'role_update']);
Route::get('/dashboard/role/delete/{id}', [AdminCtrl::class,'role_delete']);

// profile ubah password
Route::get('/dashboard/pengaturan/data', [AdminCtrl::class,'pengaturan']);
Route::post('/dashboard/pengaturan/update', [AdminCtrl::class,'pengaturan_update']);


Route::get('/kapus/pengaturan/data', [KapusCtrl::class,'pengaturan']);
Route::post('/kapus/pengaturan/update', [KapusCtrl::class,'pengaturan_update']);


