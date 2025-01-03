@extends('guest.partials.mainLogin')

@section('mainLogin')
    <div class="relative mb-auto bg-slate-300">
        <div class="relative w-full">

            <img src="{{ env('APP_API_IMG_URL') }}/event/{{ $event['images'][0]['filename'] }}"
                class="object-cover w-full max-w-full h-md md:h-[calc(100vh-200px)]" alt="">
            <div class="absolute top-0 flex flex-col justify-center h-full p-4 py-10 space-y-4 text-white xl:mx-56 xl:px-0 ">
                <h1 class="text-6xl text-lime-400">NAMA</h1>
                <h1 class="text-6xl">EVENTNYA </h1>
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
                                    <img class="rounded-lg w-96 h-96 object-cover"
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
                            <tr class="bg-transparent">
                                <th scope="row" class="w-1/2 px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                    Statues
                                </th>
                                <td class="px-6 py-4">
                                    {{ $event['status'] }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

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
                                    Quantity
                                </th>
                                <td class="px-6 py-4">
                                    {{ $event['tickets'][0]['quantity'] }} Pcs
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="flex justify-center mt-5">
                        <a href="/login" type="button"
                            class="text-center text-white w-60 bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">Buy
                            Now</a>
                    </div>
                </div>





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
