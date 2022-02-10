<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\LanguageController;
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

    /* Rutas language
    Route::get('set_language/{lang}', function ($language) {
        if (array_key_exists($language, config('languages'))) {
            session()->put('applocale', $language);
        }
        return back();
    })->name('set_language');
    //Route::get('view', [LanguageController::class, 'view'])->name('view');
    //Route::get('language-change', [LanguageController::class, 'changeLanguage'])->name('changeLanguage');*/


    // Ruta resource con breeze aplicado
    Route::resource('cars', CarController::class)->middleware(['auth']);

    //Si la ruta no existe puedo indicar qué vista mostrar
    Route::fallback(function () {
        return view('/dashboard');
    });


    require __DIR__ . '/auth.php';
});
