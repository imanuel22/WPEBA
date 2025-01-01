@extends('layouts.admin')

@section('content')
    <h1>Manage Event Registrations</h1>

    <!-- Daftar registrasi peserta -->
    <div class="registration-list">
        <h2>Registrations</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Event</th>
                    <th>Participant</th>
                    <th>Registration Date</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($registrations as $registration)
                    <tr>
                        <td>{{ $registration->id }}</td>
                        <td>{{ $registration->event->name }}</td>
                        <td>{{ $registration->participant->name }}</td>
                        <td>{{ $registration->created_at }}</td>
                        <td>{{ $registration->status }}</td>
                        <td>
                            <a href="{{ route('admin.editRegistration', $registration->id) }}">Edit</a> |
                            <a href="{{ route('admin.deleteRegistration', $registration->id) }}">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
