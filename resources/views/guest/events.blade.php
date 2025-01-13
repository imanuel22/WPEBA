@extends('guest.partials.mainLogin')

@section('mainLogin')
    <div class="grid grid-cols-4 gap-10 py-10 mx-20 mt-20 md:grid-cols-4 ">
        @foreach ($events as $event)
            <div class="p-0">
                <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <a href="/event/{{$event['id']}}">
                        <img class="rounded-t-lg w-96 h-64 object-cover"
                            src="{{ env('APP_API_IMG_URL') }}/event/{{ $event['images'][0]['filename'] ?? '' }}"
                            alt="{{ $event['title'] }}" />
                    </a>
                    <div class="p-5">
                        <a href="/event/{{ $event['id']}} ">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                {{ $event['title'] }}</h5>
                        </a>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $event['description'] }}</p>
                        <a href="/event/{{$event['id']}}"
                            class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Read more
                            <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M1 5h12m0 0L9 1m4 4L9 9" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="flex justify-end pt-5 pb-20 mr-28">
        <nav aria-label="Page navigation example">
            @if ($pagination)
                <div class="inline-flex h-10 -space-x-px text-base pagination">
                    @if ($pagination['current_page'] > 1)
                        <a class="flex items-center justify-center h-10 px-4 leading-tight text-gray-500 bg-white border border-gray-300 ms-0 border-e-0 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
                            href="?page={{ $pagination['current_page'] - 1 }}">Previous</a>
                    @endif

                    @for ($i = 1; $i <= $pagination['last_page']; $i++)
                        <a class="flex items-center justify-center h-10 px-4 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
                            href="?page={{ $i }}"
                            class="{{ $i == $pagination['current_page'] ? 'active' : '' }}">
                            {{ $i }}
                        </a>
                    @endfor

                    @if ($pagination['current_page'] < $pagination['last_page'])
                        <a class="flex items-center justify-center h-10 px-4 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
                            href="?page={{ $pagination['current_page'] + 1 }}">Next</a>
                    @endif
                </div>
            @endif
        </nav>
    </div>
@endsection
