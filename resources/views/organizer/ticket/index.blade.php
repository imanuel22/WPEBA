@extends('organizer.partials.main')

@section('main')
    @if (empty($ticket[0]))
        <div class="">
            <a href="">Add Ticket</a>
        </div>
    @endif

    <div class="">
        <table id="ticket-table">
            <thead>
                <tr>
                    <th>
                        <span class="flex items-center">
                            Name
                        </span>
                    </th>
                    <th>
                        <span class="flex items-center">
                            price
                        </span>
                    </th>
                    <th>
                        <span class="flex items-center">
                            quantity
                        </span>
                    </th>
                    <th>
                        <span class="flex items-center">
                            image
                        </span>
                    </th>

                    <th>
                        <span class="flex items-center">

                        </span>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($ticket as $row)
                    <tr>
                        <td>{{ $row['name'] ?? '-' }}</td>
                        <td>{{ $row['price'] ?? '-' }}</td>
                        <td>{{ $row['quantity'] ?? '-' }}</td>
                        <td>{{ $row['image'] ?? '-' }}</td>
                        <td class="flex items-center justify-center">
                            <a href=""
                                class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:focus:ring-yellow-900">Edit</a>
                            <a href=""
                                class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Delete</a>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@9.0.3"></script>
    <script>
        if (document.getElementById("ticket-table") && typeof simpleDatatables.DataTable !== 'undefined') {
            const dataTable = new simpleDatatables.DataTable("#ticket-table", {
                searchable: true,
                sortable: false
            });
        }
    </script>
@endsection
