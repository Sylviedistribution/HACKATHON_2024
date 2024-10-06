<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\QuizController;
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

Route::get('/index', function () {
    return view('index');
})->name("index");

Route::get('/', function () {
    return view('index');
})->name("index");

Route::get('/data', function () {
    return view('data');
})->name('data');

Route::get('/resource', function () {
    return view('resource');
})->name('resource');;
// Routes pour le quiz
Route::prefix('/quiz')->controller(QuizController::class)->group(function () {
    Route::get('/index',  'index')->name('quiz.index'); // Page de démarrage du quiz
    Route::post('/start', 'start')->name('quiz.start'); // Démarrer le quiz
    Route::post('/answer', 'answer')->name('quiz.answer'); // Soumettre une réponse
    Route::get('/results', 'results')->name('quiz.results'); // Afficher les résultats
});

// AUTHENTIFICATION
Route::controller(AuthController::class)->group(function () {
    Route::middleware('guest2')->group(function () {
        Route::post('/loginAction', 'loginAction')->name('login.action');
        Route::post('/registerSave', 'registerSave')->name('register.save');
        Route::get('/login', 'login')->name('login');
        Route::get('/register', 'register')->name('register');
        Route::get('/forgotPassword', 'forgotPassword')->name('forgotPassword');
    });
    Route::get('/logout', 'logout')->name('logout')->middleware('auth');
});
