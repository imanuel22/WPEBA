@extends('organizer.partials.main')

@section('main')
    <div class="mb-5">
        <a href="/organizer/event"
            class="text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-1 mb-2 dark:bg-gray-600 dark:hover:bg-gray-700 focus:outline-none dark:focus:ring-gray-800">back</a>
        <a href=""
            class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 me-1 mb-2 dark:focus:ring-yellow-900">edit</a>
        <a href=""
            class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-1 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">delete</a>
    </div>
    <div class="max-w-screen-xl px-4 mx-auto 2xl:px-0">
        <div class="max-w-5xl mx-auto">
            <h1 class="text-xl font-semibold text-gray-900 dark:text-white sm:text-2xl">Title</h1>
            <div class="my-8 xl:mb-16 xl:mt-12">
                <img class="w-full" src="https://miro.medium.com/v2/resize:fit:1400/1*ydhn1QPAKsrbt6UWfn3YnA.jpeg"
                    alt="">
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
