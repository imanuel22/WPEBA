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


// admin
Route::prefix('/admin')->group(function(){
    // Route::get('/',);
    Route::get('/dashboard',[AdminController::class,'dashboard']);
    Route::get('/events',[AdminController::class,'events']);
    // Event Management
    Route::post('/admin/events', [AdminController::class, 'storeEvent'])->name('admin.events.store');
    Route::put('/admin/events/{id}', [AdminController::class, 'updateEvent'])->name('admin.events.update');
    Route::delete('/admin/events/{id}', [AdminController::class, 'deleteEvent'])->name('admin.events.delete');

    // Ticket Management
    Route::get('/admin/tickets', [AdminController::class, 'manageTickets'])->name('admin.tickets');
    Route::delete('/admin/tickets/{id}', [AdminController::class, 'deleteTicket'])->name('admin.tickets.delete');

    // Feedback Management
    Route::get('/admin/feedback', [AdminController::class, 'manageFeedback'])->name('admin.feedback');
    Route::delete('/admin/feedback/{id}', [AdminController::class, 'deleteFeedback'])->name('admin.feedback.delete');

    // User Management
    Route::get('/admin/users', [AdminController::class, 'manageUsers'])->name('admin.users');
    Route::delete('/admin/users/{id}', [AdminController::class, 'deleteUser'])->name('admin.users.delete');
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