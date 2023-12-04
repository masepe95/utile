<?php

use Illuminate\Support\Facades\Route;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\APIProxyController;
use App\Http\Controllers\TyfonLeadController;

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

Route::get('/adesioni-tdg', function () {
    return view('form-adesione');
});
Route::get('/insert-lead', function () {
    return view('insert-lead');
});


Route::get('/api-proxy', [APIProxyController::class, 'proxyRequest']);
Route::get('/api-proxy2', [APIProxyController::class, 'proxyRequest2']);
Route::post('/leads/store', [TyfonLeadController::class, 'store']);
