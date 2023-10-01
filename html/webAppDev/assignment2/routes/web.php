<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PartnerController;
use App\Models\User;
use App\Models\Partner;

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

Route::get('/', [PartnerController::class, 'index']);

Route::get('/project_list', [ProjectsController::class, 'index']);

Route::get('partner/{partner_name}', function($partner_name){ //replace partnername with id??
    $user = User::find($partner_name);
    $projects = $user->projects;
    return view('details_page')->with('projects', $projects);
});


Route::get('/test', function(){
    $user = User::find(1);
    $prods = $user->products;
    dd($prods);
});

Route::resource('product', ProductController::class);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
