@extends('organizer.partials.main')

@section('main')
    <div class="flex items-baseline mb-5">
        <div class="">
            <a href="/organizer/event"
                class="text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-1 mb-2 dark:bg-gray-600 dark:hover:bg-gray-700 focus:outline-none dark:focus:ring-gray-800">back</a>
        </div>
        <div class="">
            <a href="/organizer/event/{{ request()->route('event_id') }}/edit"
                class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 me-1 mb-2 dark:focus:ring-yellow-900">edit</a>
        </div>
        <div class="">
            <form action="/organizer/event/{{ request()->route('event_id') }}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('kamu yakin?')"
                    class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-1 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                    delete
                </button>
            </form>
        </div>

    </div>
    @if (session()->has('message'))
        <div id="alert-3"
            class="flex items-center p-4 mb-4 text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
            role="alert">
            <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                viewBox="0 0 20 20">
                <path
                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
            </svg>
            <span class="sr-only">Info</span>
            <div class="text-sm font-medium ms-3">
                {{ session('message') }}
            </div>
            <button type="button"
                class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700"
                data-dismiss-target="#alert-3" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
            </button>
        </div>
    @endif

    <div class="p-4 mb-8 bg-white rounded">
        <h1 class="mb-4 text-xl font-semibold text-center text-gray-900 capitalize dark:text-white sm:text-4xl">
            {{ $event['title'] }}</h1>
        <div id="gallery" class="relative w-full mb-6" data-carousel="slide">
            <!-- Carousel wrapper -->
            <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
                @foreach ($event['images'] as $image)
                    <!-- Item -->
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="{{ config('services.api.img') }}/event/{{ $image['filename'] }}"
                            class="absolute block h-auto max-w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                            alt="">
                    </div>
                @endforeach
            </div>
            <!-- Slider controls -->
            <button type="button"
                class="absolute top-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer start-0 group focus:outline-none"
                data-carousel-prev>
                <span
                    class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 1 1 5l4 4" />
                    </svg>
                    <span class="sr-only">Previous</span>
                </span>
            </button>
            <button type="button"
                class="absolute top-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer end-0 group focus:outline-none"
                data-carousel-next>
                <span
                    class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 9 4-4-4-4" />
                    </svg>
                    <span class="sr-only">Next</span>
                </span>
            </button>
        </div>
        <div class="grid grid-cols-2 gap-3">
            <div class="p-4">
                <p class="font-normal text-justify text-gray-500 dark:text-gray-400">
                    {{ $event['description'] }}
                </p>
            </div>
            <div class="">
                <h1 class="flex justify-center text-2xl font-bold text-gray-900 ">EVENT INFO</h1>

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
        </div>
    </div>
    {{-- <div class="flex gap-3">
        <div class="max-w-md p-4 bg-white rounded-xl">
            <h1 class="text-2xl font-bold text-center text-gray-900">Documentations</h1>
            <div class="grid gap-4">
                <div>
                    @if (!empty($event['documentations']) && isset($event['documentations'][0]))
                        <img class="h-auto max-w-full rounded-lg"
                            src="{{ config('services.api.img') }}/documentations/{{ $event['documentations'][0]['image'] }}"
                            alt="">
                    @endif
                </div>
                <div class="grid grid-cols-4 gap-4">
                    @foreach (collect($event['documentations'])->skip(1) as $image)
                        <div>
                            <img class="h-auto max-w-full rounded-lg"
                                src="{{ config('services.api.img') }}/documentations/{{ $image['image'] }}"
                                alt="">
                        </div>
                    @endforeach
                </div>
            </div>



            <div class="">

            </div>
        </div>
        <div class="">
            <div class="max-w-sm p-4 bg-white rounded-xl">
                <h1 class="text-2xl font-bold text-center text-gray-900">Information</h1>
                <div class="relative overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-900 rtl:text-right ">
                        <tr class="border-b border-black">
                            <td class="w-1/2 px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">whatapps</td>
                            <td class="px-6 py-4">{{ $event['information']['whatapps'] ?? '' }}</td>
                        </tr>
                        <tr class="border-b border-black">
                            <td class="w-1/2 px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">telephone</td>
                            <td class="px-6 py-4">{{ $event['information']['telephone'] ?? '' }}</td>
                        </tr>
                        <tr class="border-b border-black">
                            <td class="w-1/2 px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">facebook</td>
                            <td class="px-6 py-4">{{ $event['information']['facebook'] ?? '' }}</td>
                        </tr>
                        <tr class="border-b border-black">
                            <td class="w-1/2 px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">instagram</td>
                            <td class="px-6 py-4">{{ $event['information']['instagram'] ?? '' }}</td>
                        </tr>
                        <tr class="border-b border-black">
                            <td class="w-1/2 px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">email</td>
                            <td class="px-6 py-4">{{ $event['information']['email'] ?? '' }}</td>
                        </tr>
                        <tr class="">
                            <td class="w-1/2 px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">website</td>
                            <td class="px-6 py-4">{{ $event['information']['website'] ?? '' }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="">
            feedback
        </div>
        <div class="">
            ticket
        </div>
        <div class="">
            total registarion
            total yang belum di confirm
        </div>
    </div> --}}

    <div class="max-w-screen-xl px-4 mx-auto 2xl:px-0">
        <div class="max-w-5xl mx-auto">

            <div class="max-w-2xl mx-auto space-y-6">

                <p></p>

            </div>
        </div>
    </div>
@endsection
