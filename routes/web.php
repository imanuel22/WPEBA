<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\{
    AdminController,
    AuthController,
    OrganizerController,
    PartisipanController,
};

Route::get('/',function ()  {
    return view('index');
});

Route::get('/event',function ()  {
    return view('admin.event');
});

Route::get('/tiket',function ()  {
    return view('admin.tiket');
});

Route::get('/dokumentasi',function ()  {
    return view('admin.dokumentasi');
});



Route::get('/login',[AuthController::class,'login']);
Route::post('/login',[AuthController::class,'dologin'])->name('login');

// admin
Route::prefix('/admin')->group(function(){
    Route::get('/',function(){
        redirect('/admin/dashboard');
    });
    
    Route::get('/dashboard',[AdminController::class,'dashboard']);
    Route::get('/event',[AdminController::class,'event']);
    Route::get('/tiket', [AdminController::class, 'tiket']);
    Route::get('/dokumentasi', [AdminController::class, 'dokumentasi']);
    Route::get('/feedbacks', [AdminController::class, 'feedbacks']);
    Route::get('/organizer_account', [AdminController::class, 'organizer_account']);
    Route::get('/participant_account', [AdminController::class, 'participant_account']);
    Route::get('/profile', [AdminController::class, 'manageProfile']);
    Route::get('/admins_account', [AdminController::class, 'admins_account']);
    Route::get('/categories', [AdminController::class, 'manageCategories'])->name('admin.categories');
    Route::post('/categories/add', [AdminController::class, 'addCategory'])->name('admin.addCategory');
    Route::get('/categories/edit/{id}', [AdminController::class, 'editCategory'])->name('admin.editCategory');
    Route::delete('/categories/delete/{id}', [AdminController::class, 'deleteCategory'])->name('admin.deleteCategory');

    // Routes untuk registrations
    Route::get('/registrations', [AdminController::class, 'manageRegistrations'])->name('admin.registrations');
    Route::get('/registrations/edit/{id}', [AdminController::class, 'editRegistration'])->name('admin.editRegistration');
    Route::delete('/registrations/delete/{id}', [AdminController::class, 'deleteRegistration'])->name('admin.deleteRegistration');
});

// organizer
Route::prefix('/organizer')->group(function(){
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

Route::prefix('/partisipan')->middleware(['role:partisipan'])->group(function(){
    Route::get('/',function(){
        redirect('/partisipan/dashboard');
    });
    Route::get('/dashboard',[PartisipanController::class,'dashboard']);
});

// Route::prefix('account')->middleware(['role:admin','role:organizer','role:partisipan'])->group(function(){
//     Route::get('/profile', function () {

//     });
//     Route::get('/reset-password', function () {

//     });
//     Route::get('/edit-profile', function () {

//     });

// });
