<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="bg-slate-300">
    @include('organizer.partials.navbar')
    @include('organizer.partials.sidebar')
    <div class="p-4 sm:ml-64 ">
        <div class="p-4 mt-14 ">
            @yield('main')
        </div>
    </div>
    @include('organizer.partials.footer')

</body>

</html>
