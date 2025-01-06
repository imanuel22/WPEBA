@extends('organizer.partials.main')

@section('main')
    <div class="min-h-screen p-6 rounded-3xl bg-slate-700">
        <!-- Header -->
        <div class="mb-6 text-3xl font-bold text-gray-200">Organizer Dashboard</div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 gap-6 md:grid-cols-3">
            <!-- Total Events -->
            <div class="p-6 text-center bg-white rounded-lg shadow-md">
                <h3 class="text-xl font-semibold">Total Events</h3>
                <p class="text-4xl font-bold text-blue-500">{{ $total_events }}</p>
            </div>

            <!-- Upcoming Events -->
            <div class="p-6 text-center bg-white rounded-lg shadow-md">
                <h3 class="text-xl font-semibold">Upcoming Events</h3>
                <p class="text-4xl font-bold text-yellow-500">{{ $upcoming_events }}</p>
            </div>

            <!-- In Progress Events -->
            <div class="p-6 text-center bg-white rounded-lg shadow-md">
                <h3 class="text-xl font-semibold">In Progress Events</h3>
                <p class="text-4xl font-bold text-purple-500">{{ $in_progress_events }}</p>
            </div>

            <!-- Completed Events -->
            <div class="p-6 text-center bg-white rounded-lg shadow-md">
                <h3 class="text-xl font-semibold">Completed Events</h3>
                <p class="text-4xl font-bold text-green-500">{{ $completed_events }}</p>
            </div>
        </div>

        <!-- Recent Events Table -->
        <div class="p-6 mt-8 bg-white rounded-lg shadow-md ">
            <h3 class="mb-4 text-2xl font-semibold">Recent Events</h3>
            <table class="w-full border border-collapse border-gray-200 table-auto">
                <thead>
                    <tr class="text-gray-200 bg-slate-700">
                        <th class="p-3 border">Event</th>
                        <th class="p-3 border">Created At</th>
                        <th class="p-3 border">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($events as $event)
                        <tr>
                            <td class="p-3 border">{{ $event['title'] }}</td>
                            <td class="p-3 border">{{ date('d M Y', strtotime($event['created_at'])) }}</td>
                            <td class="p-3 border">{{ ucfirst($event['status']) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
