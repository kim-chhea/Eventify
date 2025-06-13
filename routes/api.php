<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\SocialMediaController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


//Route for user
Route::prefix('/auth')->group(function()
{
 Route::post('/login',[AuthController::class,'login']);
 Route::post('/register',[AuthController::class,'register']);
 Route::post('/logout',[AuthController::class,'logout']);
});

//Route to get user info
Route::prefix('/eventify')->group(function(){
    Route::apiResource('/user',UserController::class);
});

//Route for social media
Route::prefix('/eventify')->group(function(){
    Route::apiResource('/social',SocialMediaController::class);
    });
//Route for categories of events
Route::prefix('/eventify')->group(function()
    {
     Route::get('/categories',[CategoryController::class,'index']);
     Route::get('/categories/{id}',[CategoryController::class,'show']);
     Route::post('/categories',[CategoryController::class,'store']);
     Route::put('/categories/{id}',[CategoryController::class,'update']);
     Route::delete('/categories/{id}',[CategoryController::class,'destroy']);
    });    

//Route for locations of events
Route::prefix('/eventify')->group(function()
    {
     Route::get('/locations',[LocationController::class,'index']);
     Route::get('/locations/{id}',[LocationController::class,'show']);
     Route::post('/locations',[LocationController::class,'store']);
     Route::put('/locations/{id}',[LocationController::class,'update']);
     Route::delete('/locations/{id}',[LocationController::class,'destroy']);
    });   
 
//route for user event
Route::prefix('/eventify')->group(function(){
        Route::get('/event', [EventController::class, 'index']);
        Route::get('/event/{id}', [EventController::class, 'show']);
        Route::get('/user/event/{id}', [EventController::class, 'show_user_event']);
    
        Route::post('/event', [EventController::class, 'store']);
    
        Route::put('/event/{id}', [EventController::class, 'update']);
        // Route::put('/user/event/{id}', [EventController::class, 'update_user_event']); // fixed
    
        Route::delete('/event/{id}', [EventController::class, 'destroy']);
        // Route::delete('/user/event/{id}', [EventController::class, 'destroy_event_user']);

        Route::post('/user/{user_id}/event/{event_id}/register', [EventController::class, 'registerUserToEvent']);
        Route::get('/user/{id}/event/', [EventController::class, 'show_event_user']);
        Route::delete('/user/{user_id}/event/{event_id}/unregister', [EventController::class, 'unregisterUserFromEvent']);
    });