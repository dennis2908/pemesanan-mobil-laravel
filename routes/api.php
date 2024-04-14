<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

use App\Http\Controllers\MroleController;

use App\Http\Controllers\MuserController;

use App\Http\Controllers\HobbyController;

use App\Http\Controllers\ManajemenMobilController;

use App\Http\Controllers\MinjamMobilController;

use App\Http\Controllers\KembaliMobilController;

Route::middleware(['cors'])->group(function () {

    Route::post('user/login', [MuserController::class, 'doLogin']);
    Route::post('user/register', [MuserController::class, 'store']);

    Route::get('user/cek_sim/{id}', [MuserController::class, 'cek_sim']);

    Route::group(['middleware' => ['jwt.verify']], function() {


        Route::resource('role', MroleController::class);
    
        Route::resource('manajemen', ManajemenMobilController::class);

        Route::resource('minjam', MinjamMobilController::class);

        Route::resource('kembali', KembaliMobilController::class);

        Route::get('manajemen/cekplat/{id}', [ManajemenMobilController::class, 'cekplat']);

        Route::post('manajemen/cariMobil', [ManajemenMobilController::class, 'cariMobil']);

        Route::post('minjam/cariMobil', [MinjamMobilController::class, 'cariMobil']);
        
        Route::post('kembali/cariMobil', [KembaliMobilController::class, 'cariMobil']);

        Route::post('minjam/cekavail', [MinjamMobilController::class, 'cekavail']);
    
        Route::put('role/assign/{id}', [MroleController::class, 'updateAssign']);
    
    });
    
});




