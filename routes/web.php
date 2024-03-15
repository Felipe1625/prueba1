<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\benficiosController;
use Illuminate\Support\Facades\Crypt;
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
    return view('welcome');
});

Route::post('/guardar', [benficiosController::class,'guardarBeneficios'])->name('guardar');
Route::post('/buscarBeneficio/{id}', [benficiosController::class,'buscarBeneficior'])->name('buscarBeneficio');
Route::post('/modificarBeneficios/{id}/{nombre}', [benficiosController::class,'modificarBeneficios'])->name('modificarBeneficios');
Route::post('/mostrarBeneficiosNombre/{nombre}', [benficiosController::class,'mostrarBeneficiosNombre'])->name('mostrarBeneficiosNombre');
Route::get('/mostrar', function () {
    $token = csrf_token();
    return response()->json(['csrf_token' => $token]);
});
Route::get('/listarBeneficios', [benficiosController::class,'mostrarBeneficios'])->name('listarBeneficios');
Route::get('/pruebaCarbon', [benficiosController::class,'pruebaCarbon'])->name('pruebaCarbon');