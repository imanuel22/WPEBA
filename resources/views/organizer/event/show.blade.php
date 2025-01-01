@extends('organizer.partials.main')

@section('main')
    <div class="mb-5">
        <a href="/organizer/event"
            class="text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-1 mb-2 dark:bg-gray-600 dark:hover:bg-gray-700 focus:outline-none dark:focus:ring-gray-800">back</a>
        <a href="/organizer/event/{{ request()->route('event_id') }}/edit"
            class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 me-1 mb-2 dark:focus:ring-yellow-900">edit</a>
        <a href=""
            class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-1 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">delete</a>
    </div>
    <div class="max-w-screen-xl px-4 mx-auto 2xl:px-0">
        <div class="max-w-5xl mx-auto">
            <h1 class="text-xl font-semibold text-gray-900 dark:text-white sm:text-2xl">Title</h1>
            <div class="my-8 xl:mb-16 xl:mt-12">
                <div id="gallery" class="relative w-full" data-carousel="slide">
                    <!-- Carousel wrapper -->
                    <div class="relative overflow-hidden h-96">
                        <!-- Item 1 -->
                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                            <img src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-1.jpg"
                                class="absolute block h-auto max-w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                alt="">
                        </div>
                        <!-- Item 2 -->
                        <div class="hidden duration-700 ease-in-out" data-carousel-item="active">
                            <img src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-2.jpg"
                                class="absolute block h-auto max-w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                alt="">
                        </div>
                        <!-- Item 3 -->
                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                            <img src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-3.jpg"
                                class="absolute block h-auto max-w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                alt="">
                        </div>
                        <!-- Item 4 -->
                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                            <img src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-4.jpg"
                                class="absolute block h-auto max-w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                alt="">
                        </div>
                        <!-- Item 5 -->
                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                            <img src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-5.jpg"
                                class="absolute block h-auto max-w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                alt="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="max-w-2xl mx-auto space-y-6">
                <p class="text-base font-normal text-gray-500 dark:text-gray-400">
                    description
                </p>
                <p></p>

            </div>
        </div>
    </div>
@endsection
