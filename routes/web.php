<?php

use App\Http\Controllers\CountryController;
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

    Route::get('/', function () {
        return redirect('dashboard');
    });

    Route::middleware(['auth'])->group(function () {
        Route::get(
            '/dashboard',
            function () {
                return redirect()->route('country.index');
            }
        )->name('dashboard');

        Route::resource('country', CountryController::class)->except('create', 'show', 'edit');
    });

    require __DIR__ . '/auth.php';


