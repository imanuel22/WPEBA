<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\OrganizerController;
use App\Http\Controllers\PartisipanController;

//guest
Route::get('/',[GuestController::class,'landing']);

Route::get('/events',[GuestController::class,'events']);
Route::get('/event/{id}',[GuestController::class,'tickets']);

//auth
Route::get('/login',[AuthController::class,'login']);
Route::middleware('throttle:10,1')->post('/login',[AuthController::class,'dologin'])->name('login');
Route::get('/register',[AuthController::class,'register']);
Route::post('/register',[AuthController::class,'doregister']);
Route::delete('/logout',[AuthController::class,'logout']);

//partisipan
Route::middleware(['role:partisipan'])->group(function(){
    Route::prefix('/partisipan')->group(function(){
        Route::get('/',function(){
            redirect('/partisipan/dashboard');
        });
        Route::get('/dashboard',[PartisipanController::class,'dashboard']);
    });
});
Route::post('/buyticket',[PartisipanController::class,'buyTicket']);



// admin
Route::prefix('/admin')->middleware(['role:admin'])->group(function(){
    Route::get('/',function(){
        redirect('/admin/dashboard');
    });

    Route::get('/dashboard',[AdminController::class,'dashboard']);
    //event
    Route::get('/event',[AdminController::class,'eventIndex']);
    Route::delete('/event/{id}',[AdminController::class,'eventDelete']);

    //accounts
    Route::get('/account/{role}',[AdminController::class,'userIndex']);
    Route::patch('/account/{id}',[AdminController::class,'userUpdate']);
    Route::delete('/account/{id}',[AdminController::class,'userDelete']);
    Route::post('/account',[AdminController::class,'userStore']);

    //feedback
    Route::get('/feedbacks', [AdminController::class, 'feedbackIndex']);
    Route::delete('/feedbacks/{id}', [AdminController::class, 'feedbackDelete']);
    //ticket
    Route::get('/ticket', [AdminController::class, 'ticketIndex']);
    Route::delete('/ticket/{id}', [AdminController::class, 'ticketDelete']);

    //dokumentasi
    Route::get('/documentations', [AdminController::class, 'documentationIndex']);
    Route::delete('/documentations/{id}', [AdminController::class, 'documentationDelete']);

    //category
    Route::get('/category', [AdminController::class, 'categoryIndex']);
    Route::post('/category', [AdminController::class, 'categoryStore']);
    Route::put('/category/{id}', [AdminController::class, 'categoryUpdate']);
    Route::delete('/category/{id}', [AdminController::class, 'categoryDelete']);



});

// organizer
Route::middleware(['role:organizer','check.token'])->prefix('/organizer')->group(function(){
    Route::get('/',function(){
        return redirect('/organizer/dashboard');
    });
    Route::get('/dashboard',[OrganizerController::class,'dashboard']);
    Route::get('/event',[OrganizerController::class,'eventIndex']);
    Route::post('/event/create',[OrganizerController::class,'eventStore']);
    Route::get('/event/create',[OrganizerController::class,'eventCreate']);
    Route::prefix('/event/{event_id}')->group(function(){
        //event
        Route::get('/',[OrganizerController::class,'eventShow']);
        Route::delete('/',[OrganizerController::class,'eventDelete']);
        Route::get('/edit',[OrganizerController::class,'eventEdit']);
        Route::put('/edit',[OrganizerController::class,'eventUpdate']);

        //information
        Route::get('/information',[OrganizerController::class,'informationIndex']);
        Route::delete('/information/{id}',[OrganizerController::class,'informationDelete']);
        Route::post('/information',[OrganizerController::class,'informationStore']);
        Route::put('/information/{id}',[OrganizerController::class,'informationUpdate']);
        //ticket
        Route::get('/ticket',[OrganizerController::class,'ticketIndex']);
        Route::delete('/ticket/{id}',[OrganizerController::class,'ticketDelete']);
        Route::post('/ticket',[OrganizerController::class,'ticketStore']);
        Route::put('/ticket/{id}',[OrganizerController::class,'ticketUpdate']);
        //feedback
        Route::get('/feedback',[OrganizerController::class,'feedbackIndex']);

        //documentation
        Route::get('/documentations',[OrganizerController::class,'documentationsIndex']);
        Route::delete('/documentations/{id}',[OrganizerController::class,'documentationsDelete']);
        Route::post('/documentations',[OrganizerController::class,'documentationsStore']);
        Route::put('/documentations/{id}',[OrganizerController::class,'documentationsUpdate']);
        //registration
        Route::get('/registrations',[OrganizerController::class,'registrationsIndex']);
        Route::patch('/registrations/verification/{id}',[OrganizerController::class,'registrationsVerification']);
    });
});



// Route::prefix('account')->middleware(['role:admin','role:organizer','role:partisipan'])->group(function(){
//     Route::get('/profile', function () {

//     });
//     Route::get('/reset-password', function () {

//     });
//     Route::get('/edit-profile', function () {

//     });

// });

