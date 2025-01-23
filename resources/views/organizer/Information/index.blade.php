@extends('organizer.partials.main')

@section('main')
    <div class="mb-5 border-b-4 border-slate-700 ">

        <h3 class="text-3xl">Information</h3>
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
    @error('delete')
        <div id="alert-2"
            class="flex items-center p-4 mb-4 text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
            role="alert">
            <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                viewBox="0 0 20 20">
                <path
                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
            </svg>
            <span class="sr-only">Info</span>
            <div class="text-sm font-medium ms-3">
                {{ $message }}
            </div>
            <button type="button"
                class="ms-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700"
                data-dismiss-target="#alert-2" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
            </button>
        </div>
    @enderror
    @if ($errors->has('error'))
        <div id="alert-2"
            class="flex items-center p-4 mb-4 text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
            role="alert">
            <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                viewBox="0 0 20 20">
                <path
                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
            </svg>
            <span class="sr-only">Info</span>
            <div class="text-sm font-medium ms-3">
                {{ $errors->first('error') }}
                @if ($errors->has('details'))
                    <ul class="mt-2 list-disc list-inside">
                        @foreach (explode(' ', $errors->first('details')) as $detail)
                            <li>{{ $detail }}</li>
                        @endforeach
                    </ul>
                @endif
            </div>
            <button type="button"
                class="ms-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700"
                data-dismiss-target="#alert-2" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
            </button>
        </div>
    @endif
    @if (empty($information[0]))
        <div class="mb-4">
            <!-- Modal toggle -->
            <button data-modal-target="crud-modal" data-modal-toggle="crud-modal"
                class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                type="button">
                Add Information
            </button>
        </div>
    @endif

    <div class="p-4 text-gray-200 rounded-lg bg-slate-700">
        <table id="information-table">
            <thead>
                <tr class="">
                    <th class="text-black bg-slate-300">
                        <span class="flex items-center">
                            whatapps
                        </span>
                    </th>
                    <th class="text-black bg-slate-300">
                        <span class="flex items-center">
                            telephone
                        </span>
                    </th>
                    <th class="text-black bg-slate-300">
                        <span class="flex items-center">
                            facebook
                        </span>
                    </th>
                    <th class="text-black bg-slate-300">
                        <span class="flex items-center">
                            instagram
                        </span>
                    </th>
                    <th class="text-black bg-slate-300">
                        <span class="flex items-center">
                            email
                        </span>
                    </th>
                    <th class="text-black bg-slate-300">
                        <span class="flex items-center">
                            website
                        </span>
                    </th>
                    <th class="text-black bg-slate-300">
                        <span class="flex items-center">

                        </span>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($information as $row)
                    <tr class="text-black bg-white ">
                        <td>{{ $row['whatapps'] ?? '-' }}</td>
                        <td>{{ $row['telephone'] ?? '-' }}</td>
                        <td>{{ $row['facebook'] ?? '-' }}</td>
                        <td>{{ $row['instagram'] ?? '-' }}</td>
                        <td>{{ $row['email'] ?? '-' }}</td>
                        <td>{{ $row['website'] ?? '-' }}</td>
                        <td class="flex items-center justify-center">
                            <!-- Modal toggle -->
                            <button data-modal-target="crud-modal-{{ $row['id'] }}"
                                data-modal-toggle="crud-modal-{{ $row['id'] }}"
                                class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:focus:ring-yellow-900"
                                type="button">
                                Edit
                            </button>

                            <form
                                action="/organizer/event/{{ request()->route('event_id') }}/information/{{ $row['id'] }}"
                                method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('yakin')"
                                    class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Delete</button>
                            </form>
                        </td>
                    </tr>
                    <!-- Main modal -->
                    <div id="crud-modal-{{ $row['id'] }}" tabindex="-1" aria-hidden="true"
                        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative w-full max-w-md max-h-full p-4">
                            <!-- Modal content -->
                            <div class="relative rounded-lg shadow bg-slate-700 dark:bg-gray-700">
                                <!-- Modal header -->
                                <div
                                    class="flex items-center justify-between p-4 border-b rounded-t md:p-5 dark:border-gray-600">
                                    <h3 class="text-lg font-semibold text-gray-200">
                                        Update Information
                                    </h3>
                                    <button type="button"
                                        class="inline-flex items-center justify-center w-8 h-8 text-sm text-gray-400 bg-transparent rounded-lg hover:bg-gray-200 hover:text-gray-900 ms-auto dark:hover:bg-gray-600 dark:hover:text-white"
                                        data-modal-toggle="crud-modal-{{ $row['id'] }}">
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                </div>
                                <!-- Modal body -->
                                <div class="p-4 md:p-5">

                                    <form class=""
                                        action="/organizer/event/{{ request()->route('event_id') }}/information/{{ $row['id'] }}"
                                        method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="grid grid-cols-2 gap-4 mb-4">
                                            <div class="col-span-2 sm:col-span-1">
                                                <label for="telephone"
                                                    class="block mb-2 text-sm font-medium text-gray-200">telephone</label>
                                                <input type="text" name="telephone" id="telephone"
                                                    value="{{ $row['telephone'] }}"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                    placeholder="08XX">
                                                @error('telephone')
                                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}
                                                    </p>
                                                @enderror
                                            </div>
                                            <div class="col-span-2 sm:col-span-1">
                                                <label for="whatapps"
                                                    class="block mb-2 text-sm font-medium text-gray-200">whatapps</label>
                                                <input type="text" name="whatapps" id="whatapps"
                                                    value="{{ $row['whatapps'] }}"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                    placeholder="08XX">
                                                @error('telephone')
                                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}
                                                    </p>
                                                @enderror
                                            </div>
                                            <div class="col-span-2 sm:col-span-1">
                                                <label for="facebook"
                                                    class="block mb-2 text-sm font-medium text-gray-200">facebook</label>
                                                <input type="text" name="facebook" id="facebook"
                                                    value="{{ $row['facebook'] }}"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                    placeholder="facebook">
                                                @error('telephone')
                                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}
                                                    </p>
                                                @enderror
                                            </div>
                                            <div class="col-span-2 sm:col-span-1">
                                                <label for="instagram"
                                                    class="block mb-2 text-sm font-medium text-gray-200">instagram</label>
                                                <input type="text" name="instagram"
                                                    id="instagram"value="{{ $row['instagram'] }}"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                    placeholder="instagram">
                                                @error('telephone')
                                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}
                                                    </p>
                                                @enderror
                                            </div>
                                            <div class="col-span-2 sm:col-span-1">
                                                <label for="email"
                                                    class="block mb-2 text-sm font-medium text-gray-200">email</label>
                                                <input type="text" name="email"
                                                    id="email"value="{{ $row['email'] }}"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                    placeholder="email">
                                                @error('telephone')
                                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}
                                                    </p>
                                                @enderror
                                            </div>
                                            <div class="col-span-2 sm:col-span-1">
                                                <label for="website"
                                                    class="block mb-2 text-sm font-medium text-gray-200">website</label>
                                                <input type="text" name="website"
                                                    id="website"value="{{ $row['website'] }}"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                    placeholder="website">
                                                @error('telephone')
                                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}
                                                    </p>
                                                @enderror
                                            </div>
                                        </div>
                                        <button type="submit"
                                            class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                            <svg class="w-5 h-5 me-1 -ms-1" fill="currentColor" viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                            Update Information
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </tbody>
        </table>

    </div>

    <!-- Main modal -->
    <div id="crud-modal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-md max-h-full p-4">
            <!-- Modal content -->
            <div class="relative rounded-lg shadow bg-slate-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 border-b rounded-t md:p-5 dark:border-gray-600">
                    <h3 class="text-lg font-semibold text-gray-200 dark:text-white">
                        Create New Information
                    </h3>
                    <button type="button"
                        class="inline-flex items-center justify-center w-8 h-8 text-sm text-gray-200 bg-transparent rounded-lg hover:bg-slate-300 hover:text-gray-800 ms-auto dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-toggle="crud-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <form class="p-4 md:p-5 " action="/organizer/event/{{ request()->route('event_id') }}/information"
                    method="POST">
                    @csrf
                    <div class="grid grid-cols-2 gap-4 mb-4">
                        <div class="col-span-2 sm:col-span-1">
                            <label for="telephone" class="block mb-2 text-sm font-medium text-gray-200">telephone</label>
                            <input type="text" name="telephone" id="telephone"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="08XXXXX" value="{{ old('telephone') }}">
                            @error('telephone')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="whatapps" class="block mb-2 text-sm font-medium text-gray-200">whatapps</label>
                            <input type="text" name="whatapps" id="whatapps"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="08XXXXX" value="{{ old('whatapps') }}">
                            @error('whatapps')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="facebook" class="block mb-2 text-sm font-medium text-gray-200">facebook</label>
                            <input type="text" name="facebook" id="facebook"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="@facebook" value="{{ old('facebook') }}">
                            @error('facebook')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="instagram" class="block mb-2 text-sm font-medium text-gray-200">instagram</label>
                            <input type="text" name="instagram" id="instagram"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="@instagram" value="{{ old('instagram') }}">
                            @error('instagram')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-200">email</label>
                            <input type="text" name="email" id="email"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="xxxx@gmail.com" value="{{ old('email') }}">
                            @error('email')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="website" class="block mb-2 text-sm font-medium text-gray-200">website</label>
                            <input type="text" name="website" id="website"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="website" value="{{ old('website') }}">
                            @error('website')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <button type="submit"
                        class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <svg class="w-5 h-5 me-1 -ms-1" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                clip-rule="evenodd"></path>
                        </svg>
                        Add new Information
                    </button>
                </form>
            </div>
        </div>
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
        if (document.getElementById("information-table") && typeof simpleDatatables.DataTable !== 'undefined') {
            const dataTable = new simpleDatatables.DataTable("#information-table", {
                searchable: true,
                sortable: false
            });
        }
    </script>
@endsection
