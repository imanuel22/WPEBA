@extends('layouts.admin')

@section('content')
    <h1>Admin Dashboard</h1>
    
    <div class="dashboard-summary">
        <div class="summary-item">
            <h2>Total Events</h2>
            <p>{{ $totalEvents }}</p>
        </div>
        <div class="summary-item">
            <h2>Total Tickets Sold</h2>
            <p>{{ $totalTickets }}</p>
        </div>
        <div class="summary-item">
            <h2>Total Participants</h2>
            <p>{{ $totalParticipants }}</p>
        </div>
        <div class="summary-item">
            <h2>Feedback Received</h2>
            <p>{{ $totalFeedbacks }}</p>
        </div>
    </div>

    <div class="recent-activities">
        <h2>Recent Activities</h2>
        <ul>
            @foreach ($recentActivities as $activity)
                <li>{{ $activity }}</li>
            @endforeach
        </ul>
    </div>
@endsection
