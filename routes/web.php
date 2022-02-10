<?php

use App\Http\Controllers\PostController;
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

Route::redirect('/', '/en');
Route::redirect('/dashboard', '/en/dashboard');
Route::redirect('/posts', '/en/posts');

Route::group([
    'prefix' => '{locale}',
    'where' => ['locale' => '[a-zA-Z]{2}'],
    'middleware' => 'setlocale'], function () {


    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['auth'])->name('dashboard');

    // Ruta resource con breeze aplicado
    Route::resource('posts', PostController::class)->middleware(['auth']);

    //Si la ruta no existe puedo indicar qué vista mostrar
    Route::fallback(function () {
        return view('dashboard');
    });


});

require __DIR__ . '/auth.php';
