<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController; 
use App\Http\Controllers\ProfileController; 
use App\Http\Controllers\AboutmeController; 
use App\Http\Controllers\JourneyController; 
use App\Http\Controllers\MySkillsController; 
use App\Http\Controllers\ShowContactController; 
use App\Http\Controllers\frontend\FrontController;
use App\Http\Controllers\frontend\FrontContactController;
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


// frontcontroller
Route::get('/',[FrontController::class,'index']);
Route::post('contact',[FrontContactController::class,'contact'])->name('frontend.contact');

// admin controller
Route::get('admin',[AdminController::class,'index']);
Route::post('admin/auth',[AdminController::class,'auth'])->name('admin.auth');

Route::get('admin/updatepassword',[AdminController::class,'updatepassword']);

Route::group(['middleware'=>'admin_auth'],function(){
Route::get('admin/dashboard',[AdminController::class,'dashboard']);

// ProfileRoute
Route::get('admin/profile',[ProfileController ::class,'index']);
Route::get('admin/profile/manage_profile',[ProfileController ::class,'manage_profile']);
Route::get('admin/profile/manage_profile/{id}',[ProfileController ::class,'manage_profile']);
Route::post('admin/profile/manage_profile_process',[ProfileController::class,'manage_profile_process'])->name('profile.manage_profile_process');
Route::get('admin/profile/delete/{id}',[ProfileController::class,'delete']);
Route::get('admin/profile/status/{status}/{id}',[ProfileController::class,'status']);

// About-Me Route
Route::get('admin/aboutme',[AboutmeController ::class,'index']);
Route::get('admin/aboutme/manage_aboutme',[AboutmeController ::class,'manage_aboutme']);
Route::get('admin/aboutme/manage_aboutme/{id}',[AboutmeController ::class,'manage_aboutme']);
Route::post('admin/aboutme/manage_aboutme_process',[AboutmeController::class,'manage_aboutme_process'])->name('aboutme.manage_aboutme_process');
Route::get('admin/aboutme/delete/{id}',[AboutmeController::class,'delete']);
Route::get('admin/aboutme/status/{status}/{id}',[AboutmeController::class,'status']);

// Journey Route
Route::get('admin/journey',[JourneyController ::class,'index']);
Route::get('admin/journey/manage_journey',[JourneyController ::class,'manage_journey']);
Route::get('admin/journey/manage_journey/{id}',[JourneyController ::class,'manage_journey']);
Route::post('admin/journey/manage_journey_process',[JourneyController::class,'manage_journey_process'])->name('journey.manage_journey_process');
Route::get('admin/journey/delete/{id}',[JourneyController::class,'delete']);
Route::get('admin/journey/status/{status}/{id}',[JourneyController::class,'status']);

// Skills Route
Route::get('admin/skills',[MySkillsController::class,'index']);
Route::get('admin/skills/manage_skills',[MySkillsController::class,'manage_skills']);
Route::get('admin/skills/manage_skills/{id}',[MySkillsController::class,'manage_skills']);
Route::post('admin/skills/manage_skills_process',[MySkillsController::class,'manage_skills_process'])->name('skills.manage_skills_process');
Route::get('admin/skills/delete/{id}',[MySkillsController::class,'delete']);
Route::get('admin/skills/status/{status}/{id}',[MySkillsController::class,'status']);

// Contact Route

Route::get('admin/contact',[ShowContactController::class,'index']);


    Route::get('admin/logout', function () {
        session()->forget('ADMIN_LOGIN');
        session()->forget('ADMIN_ID');
        session()->flash('error','Logout sucessfully');
        return redirect('admin');
    });
});