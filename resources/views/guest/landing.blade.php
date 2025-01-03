@extends('guest.partials.main')

@section('main')
    <div class="relative mb-auto bg-slate-300">
        <div class="relative w-full">
            <img src="{{ asset('storage/img/1.jpg') }}" class="object-cover w-full max-w-full h-md md:h-[calc(100vh-200px)]"
                alt="">
            <div class="absolute top-0 flex flex-col justify-center h-full p-4 py-10 space-y-4 text-white xl:mx-56 xl:px-0 ">
                <h1 class="text-6xl text-lime-400">EVENT ORGANIZER </h1>
                <h1 class="text-6xl">POLITEKNIK NEGERI BALI </h1>
                <div class="flex justify-end 2xl:-mr-28">
                </div>
            </div>
        </div>
        <div class="flex justify-center mt-5">
            <a class="text-4xl font-bold text-lime-400">ONGOING EVENT</a>
        </div>
        <div class="flex">
            <div  class="mx-10 w-screen overflow-x-auto">
                <div class="overflow-hidden min-w-max flex">
                    <div class="ml-10 my-10">
                        <figure class="relative max-w-sm transition-all duration-300 cursor-pointer filter">
                            <a href="/tickets" class="object-cover">
                            <img class="rounded-lg w-96 h-96 object-cover" src="{{ asset('storage/img/3.jpeg') }}"  alt="image description">
                            </a>
                            <figcaption class="absolute px-4 text-lg text-lime-500 bottom-6">
                                <p>JUDUL EVENT NYAA/ DETAIL EVENT</p>
                            </figcaption>
                        </figure>
                    </div>
                    <div class="mx-10 my-10">
                        <figure class="relative max-w-sm transition-all duration-300 cursor-pointer filter">
                            <a href="/tickets" class="">
                            <img class="rounded-lg w-96 h-96 object-cover" src="{{ asset('storage/img/1.jpg') }}"  alt="image description">
                            </a>
                            <figcaption class="absolute px-4 text-lg text-lime-500 bottom-6">
                                <p>JUDUL EVENT NYAA/ DETAIL EVENT</p>
                            </figcaption>
                        </figure>
                    </div>
                    <div class="mr-10 my-10">
                        <figure class="relative max-w-sm transition-all duration-300 cursor-pointer filter">
                            <a href="/tickets" class="">
                            <img class="rounded-lg w-96 h-96 object-cover" src="{{ asset('storage/img/1.jpg') }}"  alt="image description">
                            </a>
                            <figcaption class="absolute px-4 text-lg text-lime-500 bottom-6">
                                <p>JUDUL EVENT NYAA/ DETAIL EVENT</p>
                            </figcaption>
                        </figure>
                    </div>
                    <div class="mr-10 my-10">
                        <figure class="relative max-w-sm transition-all duration-300 cursor-pointer filter">
                            <a href="/tickets" class="">
                            <img class="rounded-lg w-96 h-96 object-cover" src="{{ asset('storage/img/1.jpg') }}"  alt="image description">
                            </a>
                            <figcaption class="absolute px-4 text-lg text-lime-500 bottom-6">
                                <p>JUDUL EVENT NYAA/ DETAIL EVENT</p>
                            </figcaption>
                        </figure>
                    </div>
                    <div class="mr-10 my-10">
                        <figure class="relative max-w-sm transition-all duration-300 cursor-pointer filter">
                            <a href="/tickets" class="">
                            <img class="rounded-lg w-96 h-96 object-cover" src="{{ asset('storage/img/3.jpeg') }}"  alt="image description">
                            </a>
                            <figcaption class="absolute px-4 text-lg text-lime-500 bottom-6">
                                <p>JUDUL EVENT NYAA/ DETAIL EVENT</p>
                            </figcaption>
                        </figure>
                    </div>
                    <div class="mr-10 my-10">
                        <figure class="relative max-w-sm transition-all duration-300 cursor-pointer filter">
                            <a href="/tickets" class="">
                            <img class="rounded-lg w-96 h-96 object-cover" src="{{ asset('storage/img/1.jpeg') }}"  alt="image description">
                            </a>
                            <figcaption class="absolute px-4 text-lg text-lime-500 bottom-6">
                                <p>JUDUL EVENT NYAA/ DETAIL EVENT</p>
                            </figcaption>
                        </figure>
                    </div>
                    <div class="mr-10 my-10">
                        <figure class="relative max-w-sm transition-all duration-300 cursor-pointer filter">
                            <a href="/tickets" class="">
                            <img class="rounded-lg w-96 h-96 object-cover" src="{{ asset('storage/img/4.jpeg') }}"  alt="image description">
                            </a>
                            <figcaption class="absolute px-4 text-lg text-lime-500 bottom-6">
                                <p>JUDUL EVENT NYAA/ DETAIL EVENT</p>
                            </figcaption>
                        </figure>
                    </div>
                    <div class=" my-10">
                        <figure class="relative max-w-sm transition-all duration-300 cursor-pointer filter">
                            <a href="/tickets" class="">
                            <img class="rounded-lg w-96 h-96 object-cover" src="{{ asset('storage/img/2.jpeg') }}"  alt="image description">
                            </a>
                            <figcaption class="absolute px-4 text-lg text-lime-500 bottom-6">
                                <p>JUDUL EVENT NYAA/ DETAIL EVENT</p>
                            </figcaption>
                        </figure>
                    </div>
                </div>
            </div>
        </div>



    </div>
@endsection
