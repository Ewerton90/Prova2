<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TurmaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AlunoController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\TurmaPublicController;
use App\Http\Controllers\notaController;

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

Route::resources([
	"turma" => TurmaController::Class,
	"user" => UserController::Class,
	"login" => LoginController::Class,
	"aluno" => AlunoController::Class,
	"nota" => NotaController::Class,
]);

Route::get('/',[TurmaPublicController::Class, "index"]);
Route::get('/',[TurmaController::Class, "index"]);
Route::get('/',[UserController::Class, "index"]);
Route::get('/',[UsuarioController::Class, "index"]);
Route::get('/',[LoginController::Class, "index"]);
Route::get('/',[AlunoController::Class, "index"]);
Route::get('/',[NotaController::Class, "index"]);

Route::get("/logout", [LoginController::Class, "logout"]);
Route::get("/login", [LoginController::Class, "index"])->name('login');
Route::post("/login", [LoginController::Class, "store"]);
?>