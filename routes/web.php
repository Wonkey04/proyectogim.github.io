<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProfesorController;
use App\Http\Controllers\PagosController;
use App\Http\Controllers\PlanesController;  
use App\Http\Controllers\TestController;
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

Route::get('/', function () {
    return view('welcome');
});




//Ve todos los planes de sus alumnos
Route::get('/planes', [PlanesController::class,'view'])->name('planes');
/*Route::get('/planes', function () {
    return view('planes.planes');
})->middleware(['auth', 'verified','checkgroup'])->name('planes');
*/
//Ve plan de un alumno
Route::get('/planes/{id_usuario}/{id_plan}', [PlanesController::class,'show'])->name('planes.planusuario');

//Crea plan de un alumno
Route::get('/planes/crear', [PlanesController::class,'crearView'])->name('planes.crearplan');




//Asigna los profesores
Route::get('/profes', [ProfesorController::class,'vistaProfes'])->middleware(['auth', 'verified','checkgroup'])->name('profes');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



//Aceptar Profesor
Route::post('/aceptarSolicitud/{id}',[ProfesorController::class,'actualizarVerificacion'])->name('aceptar.solicitud');
//Rechazar Profesor
Route::post('/rechazar-solicitud/{id}', [ProfesorController::class,'anularVerificacion'])->name('rechazar.solicitud');

Route::get('/test', function () {
    return view('test.test');
})->middleware(['auth', 'verified'])->name('test');

Route::post('/dashboard', [RegisteredUserController::class, 'store'])->name('register');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/buscar-tests', [TestController::class, 'searchTest'])->name('test.search');

//Vista para pagar mes app
Route::get('/pagarapp', [PagosController::class,'vistaPagarApp'])->middleware(['auth', 'verified','checkgroup'])->name('pagarapp');














require __DIR__.'/auth.php';
