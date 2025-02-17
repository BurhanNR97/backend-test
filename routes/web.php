<?php

use App\Http\Controllers\Api\KaryawanController;
use Illuminate\Support\Facades\File;
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

Route::get('/{any}', function () {
    $indexPath = public_path('index.html');
    if (File::exists($indexPath)) {
        return File::get($indexPath);
    }
    abort(404);
})->where('any', '.*');

Route::get('/karyawan', [KaryawanController::class, 'index']);
Route::post('/karyawan', [KaryawanController::class, 'store']);
Route::put('/karyawan/{id}', [KaryawanController::class, 'update']);
Route::delete('/karyawan/{id}', [KaryawanController::class, 'destroy']);
