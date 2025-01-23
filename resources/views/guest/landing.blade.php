@extends('guest.partials.main')

@section('main')
    <div class="relative mb-auto bg-LightBlue">
        <div class="relative w-full">
            <img src="{{ asset('storage/img/1.jpg') }}" class="object-cover w-full max-w-full h-md md:h-[calc(100vh-200px)]"
                alt="">
            <div class="absolute top-0 flex flex-col justify-center h-full p-4 py-10 space-y-4 text-white xl:mx-56 xl:px-0 ">
                <h1 class="text-6xl text-SkyBlue font-bold ">EVENT ORGANIZER </h1>
                <h1 class="text-6xl text-LightBlue font-bold">POLITEKNIK NEGERI BALI </h1>
                <div class="flex justify-end 2xl:-mr-28">
                </div>
            </div>
        </div>

        <div class="flex justify-center mt-5">
            <a class="text-4xl font-bold text-charcoal">EVENTS</a>
        </div>
        <div class="flex">
            <div class="w-screen mx-10 overflow-x-auto">
                <div class="flex overflow-hidden min-w-max">
                    @foreach ($events as $row)
                        <div class="mx-10 my-10">
                            <figure class="relative max-w-sm transition-all duration-300 cursor-pointer filter">
                                <a href="/event/{{ $row['id'] }}" class="">
                                    <img class="object-cover rounded-lg w-96 h-96"
                                        src="{{ env('APP_API_IMG_URL') }}/event/{{ $row['images'][0]['filename'] }}"
                                        alt="image description">
                                </a>
                                <figcaption class="absolute px-4 text-lg text-lime-500 bottom-6">
                                    <?php
                                    if ($row['status'] == 'upcoming'){ 
                                    ?>
                                        <p class=" font-bold text-charcoal ">{{ ucfirst($row['title']) }}</p>
                                        <p class="p-2 text-center text-white bg-SkyBlue rounded-2xl w-fit ">UPCOMING</p>
                                    <?php
                                    }elseif ($row['status'] == 'completed'){
                                    ?>
                                        <p class=" font-bold text-charcoal">{{ ucfirst($row['title']) }}</p>
                                        <p class="p-2 text-center text-white bg-FireBrick rounded-2xl w-fit ">COMPLETED</p>
                                    <?php
                                    }else{
                                        ?>
                                        <p class=" font-bold text-charcoal">{{ ucfirst($row['title']) }}</p>
                                        <p class="p-2 text-center text-white bg-dimGray rounded-2xl w-fit ">IN PROGRESS</p>
                                    <?php
                                    }
                                    ?>
                                </figcaption>
                            </figure>
                        </div>
                    @endforeach


                </div>
            </div>
        </div>
        <div class="flex justify-center w-full py-20 px-96">
            <div class="flex justify-center text-center">
                <p class="text-dimGray">This website is the official platform of the Event Organizer at Politeknik Negeri
                    Bali, designed to simplify event management and provide information about events held on campus. It
                    offers access to students, lecturers, and the general public to quickly and easily find detailed
                    information about campus events.</p>
            </div>
        </div>
    </div>
@endsection
