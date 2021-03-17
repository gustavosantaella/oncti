<?php

use App\Http\Controllers as controlador;
use Illuminate\Support\Facades\Route;
/*error_reporting(E_ALL);
ini_set("display_errors", 1);*/
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
})->name('welcome')->middleware('auth');

Route::group(['prefix'=>'Noticia','middleware'=>'auth'],function(){

	Route::get('crear',[controlador\NoticiaController::class,'create'])->name('noticia.crear');
	Route::post('crear',[controlador\NoticiaController::class,'store'])->name('noticia.guardar');
	Route::get('listar',[controlador\NoticiaController::class,'list'])->name('noticias.listar');
	Route::get('ver/{id}',[controlador\NoticiaController::class,'show'])->name('ver.noticia');
	Route::get('ver/edit/{id}',[controlador\NoticiaController::class,'edit'])->name('ver.edit');
	Route::put('actualizar/{id}',[controlador\NoticiaController::class,'update'])->name('noticia.editar');
	Route::put('actualizar/foto/{id}',[controlador\NoticiaController::class,'updatePhoto'])->name('noticia.editarFoto');
	Route::delete('eliminar/{id}',[controlador\NoticiaController::class,'destroy'])->name('noticia.eliminar');
});

/*Route admin*/
Route::group(['prefix'=>'Admin','middleware'=>'auth'],function(){

	/*rol*/
	Route::get('crear/rol',[controlador\RolController::class,'create'])->name('crear.rol');
	Route::get('rol/crear',[controlador\RolController::class,'index'])->name('insertar.rol');
	Route::post('crear',[controlador\RolController::class,'store'])->name('guardar.rol');
	Route::get('eliminar/rol/{id}',[controlador\RolController::class,'destroy'])->name('eliminar.rol');
	Route::get('editar/rol/{role}',[controlador\RolController::class,'show'])->name('editar.rol');
	Route::put('editar/rol/{id}',[controlador\RolController::class,'update'])->name('update.rol');
	Route::get('ver/rol/{role}',[controlador\RolController::class,'ver'])->name('ver.rol');

	/*end rol*/

	/*permissions*/
	Route::get('crear/permiso',[controlador\PermissionController::class,'create'])->name('crear.permisos');
	Route::post('crear/permiso',[controlador\PermissionController::class,'store'])->name('guardar.permiso');
	Route::get('eliminar/permiso/{id}',[controlador\PermissionController::class,'destroy'])->name('eliminar.permiso');
	/*end permissions*/

	/*users*/
	Route::get('crear/usuario',[controlador\UserController::class,'create'])->name('crear.user');
	Route::post('crear/usuario',[controlador\UserController::class,'store'])->name('guardar.user');
	Route::get('listar/usuarios',[controlador\UserController::class,'index'])->name('listar.users');
	Route::get('eliminar/usuario/{user}',[controlador\UserController::class,'destroy'])->name('eliminar.user');
	Route::get('editar/usuario/{user}',[controlador\UserController::class,'edit'])->name('editar.user');
	Route::put('actualizar/usuario/{user}',[controlador\UserController::class,'update'])->name('actualizar.user');
	/*end users*/

});

/*end route admin*/

Route::get('login',[controlador\UserController::class,'login'])->name('login')->middleware('guest');
Route::get('logout',[controlador\UserController::class,'logout'])->name('logout')->middleware('auth');
Route::post('login',[controlador\UserController::class,'signIn'])->name('signIn')->middleware('guest');
