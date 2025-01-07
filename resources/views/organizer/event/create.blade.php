@extends('organizer.partials.main')

@section('main')
    <div class="mb-3">
        <h1 class="text-4xl text-center">Create Event</h1>
    </div>
    <div class="p-6 bg-slate-700 rounded-3xl">
        <form action="/organizer/event/create" method="POST" class="" enctype="multipart/form-data">
            @csrf
            <div class="mb-5">
                <label for="title" class="block mb-2 text-sm font-medium text-gray-200">Your title</label>
                <input name="title" type="text" id="title"
                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                    value="{{ old('title') }}" required />
            </div>

            <div class="mb-5">
                <label for="description" class="block mb-2 text-sm font-medium text-gray-200">Your
                    description</label>
                <textarea name="description" id="description" rows="4"
                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Leave a comment...">{{ old('description') }}</textarea>
            </div>

            <div class="mb-5">
                <label class="block mb-2 text-sm font-medium text-gray-200" for="images">Upload images
                    (Max 5)</label>
                <input
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                    id="images" type="file" name="images[]" accept="image/jpeg,image/png,image/jpg" multiple>
            </div>

            <div class="grid grid-cols-3 gap-4">

                <div class="mb-5">
                    <label for="start_datetime" class="block mb-2 text-sm font-medium text-gray-200">Start Date
                        and Time</label>
                    <input type="datetime-local" id="start_datetime" name="start_datetime"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                        value="{{ old('start_datetime') }}">
                </div>

                <div class="mb-5">
                    <label for="duration" class="block mb-2 text-sm font-medium text-gray-200">Duration (in
                        minutes)</label>
                    <input type="number" id="duration" name="duration"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                        value="{{ old('duration') }}">
                </div>
                <div class="mb-5">
                    <label for="location" class="block mb-2 text-sm font-medium text-gray-200">Location</label>
                    <input type="text" id="location" name="location"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                        value="{{ old('location') }}">
                </div>
            </div>


            <div class="mb-5 ">
                <label for="event_category_ids" class="block mb-2 text-sm font-medium text-gray-200">Categories</label>
                <div
                    class="grid items-baseline grid-cols-1 p-3 bg-white rounded-lg sm:grid-cols-3 lg:grid-cols-10 md:grid-cols-5">
                    @foreach ($categories as $category)
                        <div class="flex items-center mx-3 my-1">
                            <input id="category-{{ $category['id'] }}" type="checkbox" name="event_category_ids[]"
                                value="{{ $category['id'] }}"
                                class="items-baseline w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 dark:bg-gray-700 dark:border-gray-600"
                                {{ old('event_category_ids') ? 'checked' : '' }}>
                            <label for="category-{{ $category['id'] }}"
                                class="items-baseline ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                {{ $category['name'] }}
                            </label>
                        </div>
                    @endforeach
                </div>
            </div>

            <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Create
                Event</button>
            <a href="/organizer/event"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Back</a>
        </form>
    </div>
@endsection
