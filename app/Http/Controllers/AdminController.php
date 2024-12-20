<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class AdminController extends Controller
{
    function dashboard() {
        return view('admin.dashboard');
    }
    function events() {
        $res = Http::get(env('APP_API_URL').'/events');
        if($res->successful()){
            $json = $res->json();
            $data=['events'=>$json['data']];
        };
        return view('admin.events.index',$data);
    }


   // 1. Manajemen Event
   public function storeEvent(Request $request)
   {
       $request->validate([
           'title' => 'required',
           'description' => 'required',
           'date' => 'required|date',
           'location' => 'required',
       ]);

       Event::create($request->all());

       return redirect()->back()->with('success', 'Event successfully created');
   }

   public function updateEvent(Request $request, $id)
   {
       $event = Event::findOrFail($id);

       $request->validate([
           'title' => 'required',
           'description' => 'required',
           'date' => 'required|date',
           'location' => 'required',
       ]);

       $event->update($request->all());

       return redirect()->back()->with('success', 'Event successfully updated');
   }

   public function deleteEvent($id)
   {
       $event = Event::findOrFail($id);
       $event->delete();

       return redirect()->back()->with('success', 'Event successfully deleted');
   }

   // 2. Manajemen Tiket
   public function manageTickets()
   {
       $tickets = Ticket::all();
       return view('admin.tickets', compact('tickets'));
   }

   public function deleteTicket($id)
   {
       $ticket = Ticket::findOrFail($id);
       $ticket->delete();

       return redirect()->back()->with('success', 'Ticket successfully deleted');
   }

   // 3. Manajemen Umpan Balik
   public function manageFeedback()
   {
       $feedbacks = Feedback::all();
       return view('admin.feedback', compact('feedbacks'));
   }

   public function deleteFeedback($id)
   {
       $feedback = Feedback::findOrFail($id);
       $feedback->delete();

       return redirect()->back()->with('success', 'Feedback successfully deleted');
   }

   // 4. Manajemen Pengguna
   public function manageUsers()
   {
       $users = User::all();
       return view('admin.users', compact('users'));
   }

   public function deleteUser($id)
   {
       $user = User::findOrFail($id);
       $user->delete();

       return redirect()->back()->with('success', 'User successfully deleted');
   }

}

