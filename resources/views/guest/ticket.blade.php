@extends('guest.partials.mainLogin')

@section('mainLogin')
    <div class="relative mb-auto bg-slate-300">
        <div class="relative w-full">

            <img src="{{ env('APP_API_IMG_URL') }}/event/{{ $event['images'][0]['filename'] }}"
                class="object-cover w-full max-w-full h-md md:h-[calc(100vh-200px)]" alt="">
            <div class="absolute top-0 flex flex-col justify-center h-full p-4 py-10 space-y-4 text-white xl:mx-56 xl:px-0 ">
                <h1 class="text-6xl text-SkyBlue">NAMA</h1>
                <h1 class="text-6xl text-LightBlue">EVENTNYA </h1>
                <div class="flex justify-end 2xl:-mr-28">
                </div>
            </div>
        </div>
        <div class="my-10 mx-28">
            <div class="">
                <a class="text-3xl font-bold text-gray-900 ">{{ $event['title'] }}</a>
            </div>
            <div class="">
                <a class="font-thin text-gray-400 text-1xl ">{{ $event['location'] }} / Kategori Event</a>
            </div>
            <div class="">
                <a class="font-normal text-gray-900 text-1xl ">{{ $event['description'] }}</a>
            </div>
        </div>

        <div class="flex">
            <div id="detailed-pricing" class="w-2/4 overflow-x-auto mx-28">
                <div class="flex overflow-hidden min-w-max">
                    @foreach ($event['documentations'] as $documentations)
                        <div class="my-10 ml-10">
                            <figure
                                class="relative max-w-sm transition-all duration-300 cursor-pointer filter grayscale hover:grayscale-0">
                                <div>
                                    <img class="object-cover rounded-lg w-96 h-96"
                                        src="{{ env('APP_API_IMG_URL') }}/documentations/{{ $documentations['image'] }}"
                                        alt="image description">
                                </div>
                                <figcaption class="absolute px-4 text-lg text-lime-500 bottom-6">
                                    <p>{{ $documentations['description'] }}</p>
                                </figcaption>
                            </figure>
                        </div>
                    @endforeach

                </div>
            </div>
            <div class="w-2/4 ">
                <a class="flex justify-center text-2xl font-bold text-gray-900 ">EVENT INFO</a>
                <div class="relative overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-900 rtl:text-right ">
                        <tbody>
                            <tr class="bg-transparent border-b border-gray-700">
                                <th scope="row" class="w-1/2 px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                    Date
                                </th>
                                <td class="px-6 py-4">
                                    {{ $event['start_datetime'] }}

                                </td>

                            </tr>
                            <tr class="bg-transparent border-b border-gray-700">
                                <th scope="row" class="w-1/2 px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                    Duration
                                </th>
                                <td class="px-6 py-4">
                                    {{ $event['duration'] }}
                                </td>

                            </tr>
                            <tr class="bg-transparent border-b border-gray-700">
                                <th scope="row" class="w-1/2 px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                    Location
                                </th>
                                <td class="px-6 py-4">
                                    {{ $event['location'] }}
                                </td>
                            </tr>
                            <tr class="bg-transparent border-b border-gray-700">
                                <th scope="row" class="w-1/2 px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                    Statues
                                </th>
                                <td class="px-6 py-4">
                                    {{ $event['status'] }}
                                </td>
                            </tr>
                            <tr class="bg-transparent">
                                <th scope="row" class="w-1/2 px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                    Category
                                </th>
                                <td class="flex flex-wrap gap-3 px-6 py-4">
                                    @foreach ($event['categories'] as $category)
                                        <p class="p-2 text-center text-white bg-red-600 rounded-2xl w-fit ">
                                            {{ $category['name'] }}
                                        </p>
                                    @endforeach

                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                @if ($event['tickets'])
                    <a class="flex justify-center mt-10 text-2xl font-bold text-gray-900">TICKET</a>
                    <div class="relative overflow-x-auto">
                        <table class="w-full text-sm text-left text-gray-900 rtl:text-right ">
                            <tbody>
                                <tr class="bg-transparent border-b border-gray-700">
                                    <th scope="row" class="w-1/2 px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                        Price
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $event['tickets'][0]['price'] }}
                                    </td>

                                </tr>
                                <tr class="bg-transparent border-b border-gray-700">
                                    <th scope="row" class="w-1/2 px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                        Ticket Left
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $event['tickets'][0]['quantity'] }} Pcs
                                    </td>
                                </tr>
                                <tr class="bg-transparent border-b border-gray-700">
                                    <th scope="row" class="w-1/2 px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                        Payment
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $event['tickets'][0]['payment_method'] }}
                                        {{ $event['tickets'][0]['payment_number'] }}
                                        {{ $event['tickets'][0]['payment_name'] }}
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                        @if (!session('id'))
                            <div class="flex justify-center mt-5">
                                <a href="/login" type="button"
                                    class="text-center text-white w-60 bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">Buy
                                    Now</a>
                            </div>
                        @else
                            {{-- Start Modal buy --}}
                            <div id="buy" tabindex="-1" aria-hidden="true"
                                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                <div class="relative w-full max-w-md max-h-full p-4">
                                    <!-- Modal content -->
                                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                        <!-- Modal header -->
                                        <div
                                            class="flex items-center justify-between p-4 border-b rounded-t md:p-5 dark:border-gray-600">
                                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                                Buy Ticket
                                            </h3>
                                            <button type="button"
                                                class="end-2.5 text-yellow-400 bg-transparent hover:bg-yellow-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                data-modal-hide="buy">
                                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                    fill="none" viewBox="0 0 14 14">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2"
                                                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                </svg>
                                                <span class="sr-only">Close modal</span>
                                            </button>
                                        </div>
                                        <!-- Modal body -->
                                        <div class="p-4 md:p-5">
                                            {{-- <form class="space-y-4" action="#">
                                            <div>
                                                <label for="name"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price/Pcs</label>
                                                <input type="text" id="disabled-input" aria-label="disabled input"
                                                    class="mb-6 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    value="{{ $event['tickets'][0]['price'] }}" disabled>
                                            </div>
                                            <div>
                                                <label for="email"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Quantity</label>
                                                <input type="number" name="Quantity" id="Quantity"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                                    placeholder="Number of Quantity" required />
                                            </div>
                                            <div class="">
                                                <button
                                                    class="text-white inline-flex w-full justify-center bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                    cek out
                                                </button>
                                            </div>
                                            <div class="">
                                                <label for="name"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Total
                                                    Price</label>
                                                <input type="text" id="disabled-input" aria-label="disabled input"
                                                    class="mb-6 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    value="200.000" disabled>
                                            </div>
                                            <div class="">
                                                <label for="name"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Payment</label>
                                                <input type="text" id="disabled-input" aria-label="disabled input"
                                                    class="mb-6 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    value="{{ $event['tickets'][0]['payment_method'] }} {{ $event['tickets'][0]['payment_number'] }} {{ $event['tickets'][0]['payment_name'] }}"
                                                    disabled>
                                            </div>
                                            <div>
                                                <label for="profile"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                                    for="file_input">Payment Prof</label>
                                                <input
                                                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                                    id="file_input" type="file">
                                            </div>

                                            <button
                                                class="text-white inline-flex w-full justify-center bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                Verify
                                            </button>
                                        </form> --}}
                                            <form method="POST" action="/buyticket" enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" name="price"
                                                    value="{{ $event['tickets'][0]['price'] }}">
                                                <input type="hidden" name="ticket_id"
                                                    value="{{ $event['tickets'][0]['id'] }}">
                                                <input type="hidden" name="event_id" value="{{ $event['id'] }}">
                                                <div>
                                                    <label for="name"
                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price/Pcs</label>
                                                    <input type="text" id="disabled-input" aria-label="disabled input"
                                                        class="mb-6 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                        value="{{ $event['tickets'][0]['price'] }}" name="price"
                                                        disabled>
                                                </div>
                                                <div>
                                                    <label for="name"
                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Quantity</label>
                                                    <input type="text" id="disabled-input" aria-label="disabled input"
                                                        class="mb-6 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                        value="1" disabled>
                                                </div>
                                                <div class="mb-6">
                                                    <label for="profile"
                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                                        for="file_input">Payment Prof</label>
                                                    <input name="image_payment"
                                                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                                        id="file_input" type="file">
                                                </div>
                                                <button
                                                    class="text-white inline-flex w-full justify-center bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                    Verify
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- End Modal Edit --}}
                            <div class="flex justify-center mt-5">
                                <button type="button" data-modal-target="buy" data-modal-toggle="buy"
                                    class="text-center text-white w-60 bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700"">
                                    Buy Now
                                </button>
                            </div>
                        @endif

                    </div>
                @endif
            </div>
        </div>




        {{-- <div class="flex ">
            <div class="my-10 ml-28">
                <figure class="relative max-w-sm transition-all duration-300 cursor-pointer filter grayscale hover:grayscale-0">
                    <a href="#">
                    <img class="rounded-lg" src="storage/img/3.jpeg" alt="image description">
                    </a>
                    <figcaption class="absolute px-4 text-lg text-lime-500 bottom-6">
                        <p>JUDUL EVENT NYAA/ DETAIL EVENT</p>
                    </figcaption>
                </figure>
            </div>
            <div class="mx-10 my-10">
                <figure class="relative max-w-sm transition-all duration-300 cursor-pointer filter grayscale hover:grayscale-0">
                    <a href="#">
                    <img class="rounded-lg" src="storage/img/3.jpeg" alt="image description">
                    </a>
                    <figcaption class="absolute px-4 text-lg text-lime-500 bottom-6">
                        <p>JUDUL EVENT NYAA/ DETAIL EVENT</p>

                    </figcaption>
                </figure>
            </div>
            <div class="my-10 mr-10">
                <figure class="relative max-w-sm transition-all duration-300 cursor-pointer filter grayscale hover:grayscale-0">
                    <a href="#">
                    <img class="rounded-lg" src="storage/img/3.jpeg" alt="image description">
                    </a>
                    <figcaption class="absolute px-4 text-lg text-lime-500 bottom-6">
                        <p>JUDUL EVENT NYAA/ DETAIL EVENT</p>

                    </figcaption>
                </figure>
            </div>
            <div class="my-10 ">
                <figure class="relative max-w-sm transition-all duration-300 cursor-pointer filter grayscale hover:grayscale-0">
                    <a href="#">
                    <img class="rounded-lg" src="storage/img/3.jpeg" alt="image description">
                    </a>
                    <figcaption class="absolute px-4 text-lg text-lime-500 bottom-6">
                        <p>JUDUL EVENT NYAA/ DETAIL EVENT</p>
                    </figcaption>
                </figure>
            </div>
        </div> --}}



    </div>
@endsection
