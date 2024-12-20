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
    // Route::get('/',);
    Route::get('/dashboard',[AdminController::class,'dashboard']);
    Route::get('/events',[AdminController::class,'events']);
    Route::get('/tickets', [AdminController::class, 'manageTickets']);
    Route::get('/documents', [AdminController::class, 'manageDocuments']);
    Route::get('/feedbacks', [AdminController::class, 'manageFeedbacks']);
    Route::get('/organizers', [AdminController::class, 'manageOrganizers']);
    Route::get('/participants', [AdminController::class, 'manageParticipants']);
    Route::get('/profile', [AdminController::class, 'manageProfile']);
    Route::get('/admins', [AdminController::class, 'manageAdmins']);
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
    // Route::get('/');
    Route::get('/dashboard',[OrganizerController::class,'dashboard']);
});

Route::prefix('/partisipan')->group(function(){
    // Route::get('/');
    Route::get('/dashboard',[PartisipanController::class,'dashboard']);
});