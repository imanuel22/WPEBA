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

    <div class="max-w-screen-xl px-4 mx-auto 2xl:px-0">
        <div class="max-w-5xl mx-auto">
            <h1 class="text-xl font-semibold text-gray-900 dark:text-white sm:text-2xl">{{ $event['title'] }}</h1>
            <div class="flex my-8 xl:mb-16 xl:mt-12">
                <div id="custom-controls-gallery" class="relative w-full" data-carousel="slide">
                    <!-- Carousel wrapper -->
                    <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
                        @foreach ($event['images'] as $image)
                            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                <img src="{{ env('APP_API_IMG_URL') }}/event/{{ $image['filename'] }}"
                                    class="absolute block h-auto max-w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                    alt="">
                            </div>
                        @endforeach
                    </div>

                </div>
            </div>
            <div class="max-w-2xl mx-auto space-y-6">
                <p class="text-base font-normal text-gray-500 dark:text-gray-400">
                    {{ $event['description'] }}
                </p>
                <p></p>

            </div>
        </div>
    </div>
@endsection
