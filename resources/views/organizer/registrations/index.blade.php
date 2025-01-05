@extends('organizer.partials.main')

@section('main')
    <div class="mb-5 border-b-4 border-slate-700 ">

        <h3 class="text-3xl">Registrations</h3>
    </div>
    <div class="flex items-baseline mb-5">
        <p class="p-3">Status Filter:</p>
        <form class="max-w-sm" method="GET">
            <select id="status" name="status" onchange="this.form.submit()"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option value="pending" {{ request('status') === 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="confirmed" {{ request('status') === 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                <option value="cancelled" {{ request('status') === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
            </select>
        </form>


    </div>
    <div class="p-4 text-gray-200 rounded-lg bg-slate-700">
        <table id="registrations-table">
            <thead>
                <tr>
                    <th class="text-black bg-slate-300">
                        <span class="flex items-center">
                            Name
                        </span>
                    </th>
                    <th class="text-black bg-slate-300">
                        <span class="flex items-center">
                            registration_date
                        </span>
                    </th>
                    <th class="text-black bg-slate-300">
                        <span class="flex items-center">
                            status
                        </span>
                    </th>
                    <th class="text-black bg-slate-300">
                        <span class="flex items-center">
                            total_price
                        </span>
                    </th>
                    <th class="text-black bg-slate-300">
                        <span class="flex items-center">
                            image_payment
                        </span>
                    </th>
                    <th class="text-black bg-slate-300">
                        <span class="flex items-center">
                            verification
                        </span>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($registrations as $row)
                    <tr class="text-black bg-white ">
                        <td>{{ $row['user']['name'] ?? '-' }}</td>
                        <td>{{ $row['registration_date'] ?? '-' }}</td>
                        <td>{{ $row['status'] ?? '-' }}</td>
                        <td>{{ $row['total_price'] ?? '-' }}</td>
                        <td>
                            <button data-modal-target="image_payment-{{ $row['id'] }}"
                                data-modal-toggle="image_payment-{{ $row['id'] }}"
                                class="block w-full md:w-auto text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                type="button">
                                image_payment view
                            </button>
                        </td>
                        <td class="flex items-center justify-center">
                            @if ($row['status'] == 'pending')
                                <form
                                    action="/organizer/event/{{ request()->route('event_id') }}/registrations/verification/{{ $row['id'] }}"
                                    method="POST">
                                    @method('patch')
                                    @csrf
                                    <button type="submit" name="status" value="confirmed"
                                        onclick="return confirm('Are you sure?')"
                                        class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:focus:ring-yellow-900">confirmed</button>
                                    <button type="submit" name="status" value="cancelled"
                                        onclick="return confirm('Are you sure?')"
                                        class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">cancelled</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                    <!-- Default Modal -->
                    <div id="image_payment-{{ $row['id'] }}" tabindex="-1"
                        class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative w-full max-w-lg max-h-full">
                            <!-- Modal content -->
                            <div class="relative rounded-lg shadow bg-slate-700 dark:bg-gray-700">
                                <!-- Modal header -->
                                <div
                                    class="flex items-center justify-between p-4 border-b rounded-t md:p-5 dark:border-gray-600">
                                    <h3 class="text-xl font-medium text-gray-200">
                                        Payment
                                    </h3>
                                    <button type="button"
                                        class="inline-flex items-center justify-center w-8 h-8 text-sm text-gray-400 bg-transparent rounded-lg hover:bg-gray-200 hover:text-gray-900 ms-auto dark:hover:bg-gray-600 dark:hover:text-white"
                                        data-modal-hide="image_payment-{{ $row['id'] }}">
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                </div>
                                <!-- Modal body -->
                                <div class="p-4 space-y-4 md:p-5">
                                    <div class="flex items-center justify-center">
                                        <img class="w-full h-auto max-w-xl"
                                            src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTHvIzoXdEJJU5cxiZxagdF50ypCObJ_nowqw&s"
                                            alt="">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                @endforeach

            </tbody>
        </table>

    </div>
    <style>
        .datatable-wrapper .datatable-top .datatable-dropdown {
            color: #fff
        }

        .datatable-wrapper .datatable-bottom .datatable-info {
            color: #fff
        }

        .datatable-wrapper .datatable-table .datatable-empty {
            background: #fff;
            color: #000
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@9.0.3"></script>
    <script>
        if (document.getElementById("registrations-table") && typeof simpleDatatables.DataTable !== 'undefined') {
            const dataTable = new simpleDatatables.DataTable("#registrations-table", {
                searchable: true,
                sortable: false
            });
        }
    </script>
@endsection
