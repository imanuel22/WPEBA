@extends('guest.partials.main')

@section('main')
    <div class="bg-slate-300 relative mb-auto">
        <div class="relative w-full">
            <img src="{{ asset('storage/img/1.jpg') }}" class="object-cover w-full max-w-full h-md md:h-[calc(100vh-200px)]"
                alt="">
            <div class="absolute top-0 flex xl:mx-56 p-4 xl:px-0 flex-col justify-center h-full  py-10 text-white space-y-4 ">
                <h1 class="text-6xl text-lime-400">EVENT ORGANIZER </h1>
                <h1 class="text-6xl">POLITEKNIK NEGERI BALI </h1>
                <div class=" flex justify-end 2xl:-mr-28">
                </div>
            </div>
        </div>
        <div class="flex ">
            <div class="ml-28 my-10">
                <figure class="relative max-w-sm transition-all duration-300 cursor-pointer filter grayscale hover:grayscale-0">
                    <a href="/tickets">
                    <img class="rounded-lg" src="storage/img/3.jpeg" alt="image description">
                    </a>
                    <figcaption class="absolute px-4 text-lg text-lime-500 bottom-6">
                        <p>JUDUL EVENT NYAA/ DETAIL EVENT</p>
                    </figcaption>
                </figure>
            </div>
            <div class="mx-10 my-10">
                <figure class="relative max-w-sm transition-all duration-300 cursor-pointer filter grayscale hover:grayscale-0">
                    <a href="/tickets">
                    <img class="rounded-lg" src="storage/img/3.jpeg" alt="image description">
                    </a>
                    <figcaption class="absolute px-4 text-lg text-lime-500 bottom-6">
                        <p>JUDUL EVENT NYAA/ DETAIL EVENT</p>

                    </figcaption>
                </figure>
            </div>
            <div class="mr-10 my-10">
                <figure class="relative max-w-sm transition-all duration-300 cursor-pointer filter grayscale hover:grayscale-0">
                    <a href="/tickets">
                    <img class="rounded-lg" src="storage/img/3.jpeg" alt="image description">
                    </a>
                    <figcaption class="absolute px-4 text-lg text-lime-500 bottom-6">
                        <p>JUDUL EVENT NYAA/ DETAIL EVENT</p>

                    </figcaption>
                </figure>
            </div>
            <div class=" my-10">
                <figure class="relative max-w-sm transition-all duration-300 cursor-pointer filter grayscale hover:grayscale-0">
                    <a href="#">
                    <img class="rounded-lg" src="storage/img/3.jpeg" alt="image description">
                    </a>
                    <figcaption class="absolute px-4 text-lg text-lime-500 bottom-6">
                        <p>JUDUL EVENT NYAA/ DETAIL EVENT</p>
                    </figcaption>
                </figure>
            </div>
        </div>
        
            
  
    </div>
@endsection
