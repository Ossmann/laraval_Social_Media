<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ApplicationController;

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
Route::get('/', [UserController::class, 'index'])->name('home');

// List all projects of a partner
Route::get('partner/{id}', [UserController::class, 'show']);

//List all details of a project
Route::get('partner/projects/{id}', [ProjectController::class, 'show']);

//Show all prjects to the teacher adminuser
Route::get('projectslist', [ProjectController::class, 'index']);

//Show all students to the teacher adminuser
Route::get('studentlist', [UserController::class, 'liststudents']);

//Profile Page of Student
Route::get('profile/{id}', [UserController::class, 'profile'])->name('profile');

//Get the form to Update Student Profile
Route::get('profile/update/{id}', [UserController::class, 'updateprofile']);

//Add the update of the student profile to the DB
Route::put('update_profile_action/{id}', [UserController::class, 'update']);

//CREATE PROJECT
//Get the form to Create a new project
Route::get('partner/create_project/{id}', [ProjectController::class, 'create']);

//Add the Create Project Form data to the DB
Route::put('create_project_action', [ProjectController::class, 'store']);

//Deleter project
Route::get('partner/projects/delete_project/{id}', [ProjectController::class, 'destroy']);

//APPLICATION TO PROJECT
//Student gets the form to apply to a project
Route::get('partner/projects/apply/{project_id}/{user_id}', [ProjectController::class, 'apply']);

//Add application to DB
Route::post('application_action/{id}', [ApplicationController::class, 'store']);

//Teacher approves a new Industry partner
Route::get('approve/{id}', [UserController::class, 'edit']);

Route::get('/dashboard', function () {
    return view('dashboard');
    //test
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
