<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PartnerController;
use App\Models\User;
use App\Models\Partner;
use App\Models\Project;

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

//Load HomePage and check Login via the PartnerController
Route::get('/', [PartnerController::class, 'index']);

Route::resource('partner', PartnerController::class);


Route::get('/dashboard', function () {
    return view('dashboard');
    //test
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
