<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FtpController;
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
//Route::get('/','UserController@index');
//Route::post('/dashboard', [UserController::class, 'check']);
//Route::post('/login', [UserController::class, 'logout']);
//Route::get('/login', 'UserController@index')->name('index');
//Route::get('',[UserController::class, 'index']);
//Route::get('/login',[UserController::class, 'index']);
Route::get('/', [UserController::class, 'index']);


//Route::get('/','UserController@index');


Route::post('/check',[UserController::class,'check'])->name('login.check');


Route::post('/login', [UserController::class, 'logout'])->name('user.logout');


Route::get('/login', [UserController::class ,'index'])->name('student.login');
Route::get('/dashbord', [UserController::class, 'index2'])->name('dashboard');
Route::get('/espace-employe', [UserController::class, 'index3'])->name('espaceemploye');
Route::get('/espace-client', [UserController::class, 'index4'])->name('espaceclient');






Route::get('/employe', [EmployeController::class, 'listeEmploye']);
Route::get('/ajouterEmploye', [EmployeController::class, 'ajouterEmploye']);
Route::post('/ajouterEmploye/traitement', [EmployeController::class, 'ajouterEmploye_traitement']);
Route::get('/UpdateEmploye/{id}', [EmployeController::class, 'update_employe']);
Route::post('/UpdateEmploye/traitement', [EmployeController::class, 'UpdateEmploye_traitement']);
Route::get('/DeleteEmploye/{id}', [EmployeController::class, 'delete_employe']);






Route::get('/client', [ClientController::class, 'listeClient']);
Route::get('/ajouterClient', [ClientController::class, 'ajouterClient']);
Route::post('/ajouterClient/traitement', [ClientController::class, 'ajouterClient_traitement']);
Route::get('/UpdateClient/{id}', [ClientController::class, 'update_client']);
Route::post('/UpdateClient/traitement', [ClientController::class, 'UpdateClient_traitement']);
Route::get('/DeleteClient/{id}', [ClientController::class, 'delete_client']);


Route::get('/ftp-files', [FtpController::class, 'listFiles'])->name('ftp.list'); 
Route::post('/upload', [FtpController::class, 'uploadFile'])->name('ftp.upload'); 
Route::get('/download/{filename}', [FtpController::class, 'downloadFile'])->name('ftp.download');


Route::get('/RedigerEmail/{id}', [EmployeController::class, 'redigerEmail'])->name('employe.redigerEmail');
Route::post('/EnvoyerEmail', [EmployeController::class, 'envoyerEmail'])->name('employe.envoyerEmail');
