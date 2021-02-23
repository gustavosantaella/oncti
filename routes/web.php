<?php

use App\Http\Controllers as controlador;
use Illuminate\Support\Facades\Route;
error_reporting(E_ALL);
ini_set("display_errors", 1);
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
})->name('welcome');

Route::group(['prefix'=>'Noticia'],function(){

	Route::get('crear',[controlador\NoticiaController::class,'create'])->name('noticia.crear');
	Route::post('crear',[controlador\NoticiaController::class,'store'])->name('noticia.guardar');
	Route::get('listar',[controlador\NoticiaController::class,'list'])->name('noticias.listar');
	Route::get('ver/{id}',[controlador\NoticiaController::class,'show'])->name('ver.noticia');
	Route::put('actualizar/{id}',[controlador\NoticiaController::class,'update'])->name('noticia.editar');
	Route::delete('eliminar/{id}',[controlador\NoticiaController::class,'destroy'])->name('noticia.eliminar');
});