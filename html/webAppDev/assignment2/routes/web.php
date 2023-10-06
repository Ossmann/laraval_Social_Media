<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\ProjectController;
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

// //Load HomePage and check Login via the PartnerController
// Route::get('/', [PartnerController::class, 'index']);

// //Call the Partner controller to access the show() function there to list all projects of a partner
// Route::resource('partner', PartnerController::class);


// //Load HomePage and check Login via the PartnerController
Route::get('/', [PartnerController::class, 'index']);


Route::get('partner/{id}', [PartnerController::class, 'show']);

Route::get('partner/projects/{id}', [ProjectController::class, 'show']);


Route::get('/dashboard', function () {
    return view('dashboard');
    //test
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
