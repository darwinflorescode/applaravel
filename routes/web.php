<?php

use App\Http\Controllers\AppiController;

use Illuminate\Support\Facades\Auth;
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

/*START PAGINA PRINCIPAL DE MI WEB */

Route::get('/', [AppiController::class, 'index'])->name('web.home');
Route::get('/cursos', [AppiController::class, 'cursos'])->name('web.cursos');
Route::get('/temas', [AppiController::class, 'temas'])->name('web.temas');
Route::get('/cursos/{slug}', [AppiController::class, 'buscarCursos'])->name('web.buscarcursos');
Route::get('/temas/{id}', [AppiController::class, 'buscarTemas'])->name('web.buscartemas');
Route::get('/search/buscarcourses', [AppiController::class, 'buscarCursosInput'])->name('web.buscarview');

Route::get('/search/buscartopics', [AppiController::class, 'buscarTopicsInput'])->name('web.topicsviewssearch');

/*END PAGINA PRINCIPAL DE MI WEB */

require __DIR__.'/adminproyect.php';
require __DIR__.'/auth.php';



