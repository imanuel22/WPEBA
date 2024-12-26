@extends('organizer.partials.main')

@section('main')
    <div class="">
        <table id="information-table">
            <thead>
                <tr>
                    <th>
                        <span class="flex items-center">
                            User
                        </span>
                    </th>
                    <th>
                        <span class="flex items-center">
                            feedback_text
                        </span>
                    </th>
                    <th>
                        <span class="flex items-center">
                            rating
                        </span>
                    </th>

                </tr>
            </thead>
            <tbody>
                @foreach ($feedback as $row)
                    <tr>
                        <td>
                            <div class="flex justify-center">
                                <img class="rounded-full" src="https://flowbite.com/docs/images/people/profile-picture-5.jpg"
                                    alt="">
                            </div>
                            <h1 class="text-lg text-center">{{ $row['user']['name'] ?? '-' }}</h1>
                        </td>
                        <td>{{ $row['feedback_text'] ?? '-' }}</td>
                        <td>{{ $row['rating'] ?? '-' }}</td>
                    </tr>
                @endforeach

            </tbody>
        </table>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@9.0.3"></script>
    <script>
        if (document.getElementById("information-table") && typeof simpleDatatables.DataTable !== 'undefined') {
            const dataTable = new simpleDatatables.DataTable("#information-table", {
                searchable: true,
                sortable: false
            });
        }
    </script>
@endsection
