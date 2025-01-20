@extends('guest.partials.main')

@section('main')
    <div class="relative mb-auto bg-LightBlue">
        <div class="relative w-full">
            <img src="{{ asset('storage/img/1.jpg') }}" class="object-cover w-full max-w-full h-md md:h-[calc(100vh-200px)]"
                alt="">
            <div class="absolute top-0 flex flex-col justify-center h-full p-4 py-10 space-y-4 text-white xl:mx-56 xl:px-0 ">
                <h1 class="text-6xl text-SkyBlue">EVENT ORGANIZER </h1>
                <h1 class="text-6xl text-LightBlue">POLITEKNIK NEGERI BALI </h1>
                <div class="flex justify-end 2xl:-mr-28">
                </div>
            </div>
        </div>

        <div class="flex justify-center mt-5">
            <a class="text-4xl font-bold text-charcoal">EVENTS</a>
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
                                <p class="text-SkyBlue">JUDUL EVENT NYAA/ DETAIL EVENT</p>
                                <p class="bg-red-600 text-white rounded-2xl w-fit text-center p-2 ">ONGOING</p>
                            </figcaption>
                        </figure>
                    </div>
                    <div class="mx-10 my-10">
                        <figure class="relative max-w-sm transition-all duration-300 cursor-pointer filter">
                            <a href="/tickets" class="">
                            <img class="rounded-lg w-96 h-96 object-cover" src="{{ asset('storage/img/1.jpg') }}"  alt="image description">
                            </a>
                            <figcaption class="absolute px-4 text-lg text-lime-500 bottom-6">
                                <p class="text-SkyBlue">JUDUL EVENT NYAA/ DETAIL EVENT</p>
                                <p class="bg-SkyBlue text-white  rounded-2xl w-fit text-center p-2 ">UPCOMING</p>
                            </figcaption>
                        </figure>
                    </div>
                    <div class="mr-10 my-10">
                        <figure class="relative max-w-sm transition-all duration-300 cursor-pointer filter">
                            <a href="/tickets" class="">
                            <img class="rounded-lg w-96 h-96 object-cover" src="{{ asset('storage/img/1.jpg') }}"  alt="image description">
                            </a>
                            <figcaption class="absolute px-4 text-lg text-lime-500 bottom-6">
                                <p class="text-SkyBlue">JUDUL EVENT NYAA/ DETAIL EVENT</p>
                                <p class="bg-SkyBlue text-white rounded-2xl w-fit text-center p-2 ">UPCOMING</p>

                            </figcaption>
                        </figure>
                    </div>
                    <div class="mr-10 my-10">
                        <figure class="relative max-w-sm transition-all duration-300 cursor-pointer filter">
                            <a href="/tickets" class="">
                            <img class="rounded-lg w-96 h-96 object-cover" src="{{ asset('storage/img/1.jpg') }}"  alt="image description">
                            </a>
                            <figcaption class="absolute px-4 text-lg text-lime-500 bottom-6">
                                <p class="text-SkyBlue">JUDUL EVENT NYAA/ DETAIL EVENT</p>
                                <p class="bg-grayishGreen text-white rounded-2xl w-fit text-center p-2 ">COMPLETED</p>

                            </figcaption>
                        </figure>
                    </div>
                    <div class="mr-10 my-10">
                        <figure class="relative max-w-sm transition-all duration-300 cursor-pointer filter">
                            <a href="/tickets" class="">
                            <img class="rounded-lg w-96 h-96 object-cover" src="{{ asset('storage/img/3.jpeg') }}"  alt="image description">
                            </a>
                            <figcaption class="absolute px-4 text-lg text-lime-500 bottom-6">
                                <p class="text-SkyBlue">JUDUL EVENT NYAA/ DETAIL EVENT</p>
                                <p class="bg-grayishGreen text-white rounded-2xl w-fit text-center p-2 ">COMPLETED</p>

                            </figcaption>
                        </figure>
                    </div>
                    <div class="mr-10 my-10">
                        <figure class="relative max-w-sm transition-all duration-300 cursor-pointer filter">
                            <a href="/tickets" class="">
                            <img class="rounded-lg w-96 h-96 object-cover" src="{{ asset('storage/img/1.jpeg') }}"  alt="image description">
                            </a>
                            <figcaption class="absolute px-4 text-lg text-lime-500 bottom-6">
                                <p class="text-SkyBlue">JUDUL EVENT NYAA/ DETAIL EVENT</p>
                                <p class="bg-SkyBlue text-white  rounded-2xl w-fit text-center p-2 ">UPCOMING</p>

                            </figcaption>
                        </figure>
                    </div>
                    <div class="mr-10 my-10">
                        <figure class="relative max-w-sm transition-all duration-300 cursor-pointer filter">
                            <a href="/tickets" class="">
                            <img class="rounded-lg w-96 h-96 object-cover" src="{{ asset('storage/img/4.jpeg') }}"  alt="image description">
                            </a>
                            <figcaption class="absolute px-4 text-lg text-lime-500 bottom-6">
                                <p class="text-SkyBlue">JUDUL EVENT NYAA/ DETAIL EVENT</p>
                                <p class="bg-FireBrick text-white rounded-2xl w-fit text-center p-2 ">ONGOING</p>

                            </figcaption>
                        </figure>
                    </div>
                    <div class=" my-10">
                        <figure class="relative max-w-sm transition-all duration-300 cursor-pointer filter">
                            <a href="/tickets" class="">
                            <img class="rounded-lg w-96 h-96 object-cover" src="{{ asset('storage/img/2.jpeg') }}"  alt="image description">
                            </a>
                            <figcaption class="absolute px-4 text-lg text-lime-500 bottom-6">
                                <p class="text-SkyBlue">JUDUL EVENT NYAA/ DETAIL EVENT</p>
                                <p class="bg-grayishGreen text-white rounded-2xl w-fit text-center p-2 ">COMPLETED</p>

                            </figcaption>
                        </figure>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex justify-center py-20 w-full px-96">
            <div class="flex justify-center text-center">
                <p class="text-dimGray">This website is the official platform of the Event Organizer at Politeknik Negeri Bali, designed to simplify event management and provide information about events held on campus. It offers access to students, lecturers, and the general public to quickly and easily find detailed information about campus events.</p>
            </div>
        </div>
</div>
@endsection
