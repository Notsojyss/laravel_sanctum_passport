<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\AnnouncementController;
use Laravel\Passport\Http\Middleware\EnsureClientIsResourceOwner;

//Route::get('/user', function (Request $request) {
//    return $request->user();
//})->middleware('auth:api');


Route::middleware(EnsureClientIsResourceOwner::class)->group(function () {
    Route::get('/user/getAll', [UserController::class, 'fetchUsers']);
    Route::get('/event/getAll', [EventController::class, 'fetchEvents']);
    Route::get('/announcement/getAll', [AnnouncementController::class, 'fetchAnnouncements']);

});





Route::post('/user/login', [AuthController::class, 'loginUser']);
Route::post('/event/create', [EventController::class, 'createEvent']);
Route::post('/announcement/create', [AnnouncementController::class, 'createAnnouncement']);

