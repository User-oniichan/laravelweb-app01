<?php

use App\Http\Controllers\PagesController;
use Illuminate\Contracts\Pagination\Paginator;
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
//Portada
Route::get('/', [PagesController::class, 'fnIndex']) -> name('xInicio');

//Read
Route::get('/detalle/{id}', [PagesController::class, 'fnEstDetalle']) -> name('Estudiante.xDetalle');

//Create
Route::post('/', [PagesController::class, 'fnRegistrar']) -> name('Estudiante.xRegistrar');

//Update
Route::get('/actualizar/{id}', [PagesController::class, 'fnEstActualizar']) -> name('Estudiante.xActualizar');
Route::put('/actualizar/{id}', [PagesController::class, 'fnUpdate']) -> name('Estudiante.xUpdate');

//Delete
Route::delete('/eliminar/{id}', [PagesController::class, 'fnEliminar']) -> name('Estudiante.xEliminar');

Route::get('/galeria/{numero?}', [PagesController::class, 'fnGaleria']) -> where('numero', '[0-9]+') -> name('xGaleria');

//Read
Route::get('/lista', [PagesController::class, 'fnLista']) -> name('xLista');

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


Route::get('/', function(){
    return view('Welcome');
}) -> name('xInicio');


/*
Route::get('/saludo', function() {
    return "Hello world... of the laravel";
});

Route::get('/galeria/{numero}', function($numero) {
    return view('Este es el codigo de la foto: '.$numero);
}) -> where('numero', '[0-9]+');

Route::view('/galeria', 'pagGaleria', ['valor' => 21]) -> name('xGaleria');

Route::get('/lista', function() {
    return view('pagLista');
}) -> name('xLista');
*/