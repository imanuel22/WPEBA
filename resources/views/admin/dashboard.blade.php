
@extends('admin.partials.main')

@section('content')
<div class="container">
    <h1>Admin Dashboard</h1>

    <!-- Events Section -->
    <h2>Events</h2>
    <table>
        <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Date</th>
                <th>Location</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($events as $event)
                <tr>
                    <td>{{ $event->title }}</td>
                    <td>{{ $event->description }}</td>
                    <td>{{ $event->date }}</td>
                    <td>{{ $event->location }}</td>
                    <td>
                        <form action="{{ route('admin.events.delete', $event->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Tickets Section -->
    <h2>Tickets</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Event</th>
                <th>Participant</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tickets as $ticket)
                <tr>
                    <td>{{ $ticket->id }}</td>
                    <td>{{ $ticket->event->title }}</td>
                    <td>{{ $ticket->participant->name }}</td>
                    <td>
                        <form action="{{ route('admin.tickets.delete', $ticket->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Feedback Section -->
    <h2>Feedback</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Feedback</th>
                <th>User</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($feedbacks as $feedback)
                <tr>
                    <td>{{ $feedback->id }}</td>
                    <td>{{ $feedback->message }}</td>
                    <td>{{ $feedback->user->name }}</td>
                    <td>
                        <form action="{{ route('admin.feedback.delete', $feedback->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Users Section -->
    <h2>Users</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <form action="{{ route('admin.users.delete', $user->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
