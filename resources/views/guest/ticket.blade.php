@extends('guest.partials.main')

@section('main')
    <div class="relative mb-10 bg-LightBlue">
        <div class="relative w-full">

            <img src="{{ env('APP_API_IMG_URL') }}/event/{{ $event['images'][0]['filename'] }}"
                class="object-cover w-full max-w-full h-md md:h-[calc(100vh-200px)]" alt="">
            {{-- <div class="absolute top-0 flex items-center justify-center h-full p-4 py-10 space-y-4 xl:mx-56 xl:px-0 ">
                <h1 class="text-6xl font-bold text-center text-SkyBlue">{{ $event['title'] }}</h1>
            </div> --}}
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
                        @if ($event['status'] === 'upcoming')
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
                                                    <svg class="w-3 h-3" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 14 14">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2"
                                                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                    </svg>
                                                    <span class="sr-only">Close modal</span>
                                                </button>
                                            </div>
                                            <!-- Modal body -->
                                            <div class="p-4 md:p-5">
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
                                                        <input type="text" id="disabled-input"
                                                            aria-label="disabled input"
                                                            class="mb-6 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                            value="{{ $event['tickets'][0]['price'] }}" name="price"
                                                            disabled>
                                                    </div>
                                                    <div>
                                                        <label for="name"
                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Quantity</label>
                                                        <input type="text" id="disabled-input"
                                                            aria-label="disabled input"
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
                        @endif

                    </div>
                @endif
            </div>
        </div>

        <div class="flex flex-col m-20">
            <div class="my-10">
                <p class="text-2xl font-bold">Event Review</p>
            </div>
            <div class="ml-10">
                <form class="max-w-sm ">
                    <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                        message</label>
                    <textarea id="message" rows="4"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Leave a comment..."></textarea>
                    <div class="rating">
                        <input type="radio" name="rating-2" class="bg-orange-400 mask mask-star-2" />
                        <input type="radio" name="rating-2" class="bg-orange-400 mask mask-star-2" />
                        <input type="radio" name="rating-2" class="bg-orange-400 mask mask-star-2" />
                        <input type="radio" name="rating-2" class="bg-orange-400 mask mask-star-2" />
                        <input type="radio" name="rating-2" class="bg-orange-400 mask mask-star-2" />
                    </div>

                    <input type="submit">
                </form>
            </div>
            <div class="p-11">
                <article>
                    <div class="flex items-center mb-4">
                        <img class="w-10 h-10 rounded-full me-4" src="/docs/images/people/profile-picture-5.jpg"
                            alt="">
                        <div class="font-medium dark:text-white">
                            <p>Jese Leos <time datetime="2014-08-16 19:00"
                                    class="block text-sm text-gray-500 dark:text-gray-400">Joined on August 2014</time></p>
                        </div>
                    </div>
                    <div class="flex items-center mb-1 space-x-1 rtl:space-x-reverse">
                        <svg class="w-4 h-4 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 22 20">
                            <path
                                d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                        </svg>
                        <svg class="w-4 h-4 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 22 20">
                            <path
                                d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                        </svg>
                        <svg class="w-4 h-4 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 22 20">
                            <path
                                d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                        </svg>
                        <svg class="w-4 h-4 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 22 20">
                            <path
                                d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                        </svg>
                        <svg class="w-4 h-4 text-gray-300 dark:text-gray-500" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                            <path
                                d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                        </svg>
                        <h3 class="text-sm font-semibold text-gray-900 ms-2 dark:text-white">Thinking to buy another one!
                        </h3>
                    </div>
                    <footer class="mb-5 text-sm text-gray-500 dark:text-gray-400">
                        <p>Reviewed in the United Kingdom on <time datetime="2017-03-03 19:00">March 3, 2017</time></p>
                    </footer>
                    <p class="mb-2 text-gray-500 dark:text-gray-400">This is my third Invicta Pro Diver. They are just
                        fantastic value for money. This one arrived yesterday and the first thing I did was set the time,
                        popped on an identical strap from another Invicta and went in the shower with it to test the
                        waterproofing.... No problems.</p>
                    <p class="mb-3 text-gray-500 dark:text-gray-400">It is obviously not the same build quality as those
                        very expensive watches. But that is like comparing a Citroën to a Ferrari. This watch was well under
                        £100! An absolute bargain.</p>
                    <a href="#"
                        class="block mb-5 text-sm font-medium text-blue-600 hover:underline dark:text-blue-500">Read
                        more</a>
                    <aside>
                        <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">19 people found this helpful</p>
                        <div class="flex items-center mt-3">
                            <a href="#"
                                class="px-2 py-1.5 text-xs font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Helpful</a>
                            <a href="#"
                                class="text-sm font-medium text-blue-600 border-gray-200 ps-4 hover:underline dark:text-blue-500 ms-4 border-s md:mb-0 dark:border-gray-600">Report
                                abuse</a>
                        </div>
                    </aside>
                </article>
            </div>
        </div>

    </div>
@endsection
