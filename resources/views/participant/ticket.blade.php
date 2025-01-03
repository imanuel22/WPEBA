@extends('participant.partials.main')

@section('main')
    <div class="bg-slate-300 relative mb-auto">
        <div class="relative w-full">
            <img src="{{ asset('storage/img/1.jpg') }}" class="object-cover w-full max-w-full h-md md:h-[calc(100vh-200px)]"
                alt="">
            <div class="absolute top-0 flex xl:mx-56 p-4 xl:px-0 flex-col justify-center h-full  py-10 text-white space-y-4 ">
                <h1 class="text-6xl text-lime-400">NAMA</h1>
                <h1 class="text-6xl">EVENTNYA </h1>
                <div class=" flex justify-end 2xl:-mr-28">
                </div>
            </div>
        </div>
        <div class="mx-28 my-10">
            <div class="">
                <a class="text-gray-900 font-bold text-3xl ">NAMA EVENT</a>
            </div>
            <div class="">
                <a class="text-gray-400 font-thin text-1xl ">Lokasi Event / Kategori Event</a>
            </div>
            <div class="">
                <a class="text-gray-900 font-normal text-1xl ">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ab saepe quos molestiae aspernatur ducimus laudantium exercitationem quis itaque veniam eveniet quod officiis ad rem esse, voluptates quia nulla sed praesentium quas, delectus nobis. Aut deserunt alias quisquam expedita rerum doloremque sint ducimus magnam? Fugiat ullam sit, tempore minima commodi esse!</a>
            </div>
        </div>

        <div class="flex">
            <div id="detailed-pricing" class="mx-28 w-2/4 overflow-x-auto">
                <div class="overflow-hidden min-w-max flex">
                    <div class="ml-10 my-10">
                        <figure class="relative max-w-sm transition-all duration-300 cursor-pointer filter grayscale hover:grayscale-0">
                            <a href="#">
                            <img class="rounded-lg" src="{{ asset('storage/img/3.jpeg') }}" alt="image description">
                            </a>
                            <figcaption class="absolute px-4 text-lg text-lime-500 bottom-6">
                                <p>JUDUL EVENT NYAA/ DETAIL EVENT</p>
                            </figcaption>
                        </figure>
                    </div>
                    <div class="mx-10 my-10">
                        <figure class="relative max-w-sm transition-all duration-300 cursor-pointer filter grayscale hover:grayscale-0">
                            <a href="#">
                            <img class="rounded-lg" src="{{ asset('storage/img/3.jpeg') }}" alt="image description">
                            </a>
                            <figcaption class="absolute px-4 text-lg text-lime-500 bottom-6">
                                <p>JUDUL EVENT NYAA/ DETAIL EVENT</p>
        
                            </figcaption>
                        </figure>
                    </div>
                    <div class="mr-10 my-10">
                        <figure class="relative max-w-sm transition-all duration-300 cursor-pointer filter grayscale hover:grayscale-0">
                            <a href="#">
                            <img class="rounded-lg" src="{{ asset('storage/img/3.jpeg') }}" alt="image description">
                            </a>
                            <figcaption class="absolute px-4 text-lg text-lime-500 bottom-6">
                                <p>JUDUL EVENT NYAA/ DETAIL EVENT</p>
        
                            </figcaption>
                        </figure>
                    </div>
                    <div class="my-10">
                        <figure class="relative max-w-sm transition-all duration-300 cursor-pointer filter grayscale hover:grayscale-0">
                            <a href="#">
                            <img class="rounded-lg" src="{{ asset('storage/img/3.jpeg') }}" alt="image description">
                            </a>
                            <figcaption class="absolute px-4 text-lg text-lime-500 bottom-6">
                                <p>JUDUL EVENT NYAA/ DETAIL EVENT</p>
                            </figcaption>
                        </figure>
                    </div>
                </div>
            </div>
            <div class=" w-2/4">
                <a class="flex justify-center text-gray-900 font-bold text-2xl ">EVENT INFO</a>
                <div class="relative overflow-x-auto">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-900 ">    
                        <tbody>
                            <tr class="bg-transparent border-b border-gray-700">
                                <th scope="row" class="w-1/2 px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                    Date
                                </th>
                                <td class="px-6 py-4">
                                    1 January 2024
                                </td>
                                
                            </tr>
                            <tr class="bg-transparent border-b border-gray-700">
                                <th scope="row" class="w-1/2 px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                    Duration
                                </th>
                                <td class="px-6 py-4">
                                    8.00 Am - 16.00 Pm
                                </td>
                                
                            </tr>
                            <tr class="bg-transparent border-b border-gray-700">
                                <th scope="row" class="w-1/2 px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                    Location
                                </th>
                                <td class="px-6 py-4">
                                    Widya Padma Politeknik Negeri Bali
                                </td> 
                            </tr>
                            <tr class="bg-transparent">
                                <th scope="row" class="w-1/2 px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                    Statues
                                </th>
                                <td class="px-6 py-4">
                                    On Going?
                                </td> 
                            </tr>
                        </tbody>
                    </table>
                </div>

                <a class="flex justify-center text-gray-900 font-bold text-2xl mt-10">TICKET</a>
                <div class="relative overflow-x-auto">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-900 ">    
                        <tbody>
                            <tr class="bg-transparent border-b border-gray-700">
                                <th scope="row" class="w-1/2 px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                    Price
                                </th>
                                <td class="px-6 py-4">
                                    200.000
                                </td>
                                
                            </tr>
                            <tr class="bg-transparent border-b border-gray-700">
                                <th scope="row" class="w-1/2 px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                    Quantity
                                </th>
                                <td class="px-6 py-4">
                                    1 Pcs
                                </td>  
                            </tr>
                        </tbody>
                    </table>
                    <div class="flex justify-center mt-5"> 
                        <button type="button" class="text-white w-60 bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">Buy Now</button>
                    </div>
                </div>
                    
                    
                     

                
            </div>
        </div>
        



        {{-- <div class="flex ">
            <div class="ml-28 my-10">
                <figure class="relative max-w-sm transition-all duration-300 cursor-pointer filter grayscale hover:grayscale-0">
                    <a href="#">
                    <img class="rounded-lg" src="{{ asset('storage/img/3.jpeg') }}" alt="image description">
                    </a>
                    <figcaption class="absolute px-4 text-lg text-lime-500 bottom-6">
                        <p>JUDUL EVENT NYAA/ DETAIL EVENT</p>
                    </figcaption>
                </figure>
            </div>
            <div class="mx-10 my-10">
                <figure class="relative max-w-sm transition-all duration-300 cursor-pointer filter grayscale hover:grayscale-0">
                    <a href="#">
                    <img class="rounded-lg" src="{{ asset('storage/img/3.jpeg') }}" alt="image description">
                    </a>
                    <figcaption class="absolute px-4 text-lg text-lime-500 bottom-6">
                        <p>JUDUL EVENT NYAA/ DETAIL EVENT</p>

                    </figcaption>
                </figure>
            </div>
            <div class="mr-10 my-10">
                <figure class="relative max-w-sm transition-all duration-300 cursor-pointer filter grayscale hover:grayscale-0">
                    <a href="#">
                    <img class="rounded-lg" src="{{ asset('storage/img/3.jpeg') }}" alt="image description">
                    </a>
                    <figcaption class="absolute px-4 text-lg text-lime-500 bottom-6">
                        <p>JUDUL EVENT NYAA/ DETAIL EVENT</p>

                    </figcaption>
                </figure>
            </div>
            <div class=" my-10">
                <figure class="relative max-w-sm transition-all duration-300 cursor-pointer filter grayscale hover:grayscale-0">
                    <a href="#">
                    <img class="rounded-lg" src="{{ asset('storage/img/3.jpeg') }}" alt="image description">
                    </a>
                    <figcaption class="absolute px-4 text-lg text-lime-500 bottom-6">
                        <p>JUDUL EVENT NYAA/ DETAIL EVENT</p>
                    </figcaption>
                </figure>
            </div>
        </div> --}}
        
            

    </div>
@endsection