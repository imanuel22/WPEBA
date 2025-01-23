<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body>
    @include('participant.partials.navbarProfile')
    @include('participant.partials.sidebarProfile')
    <div class="p-4 sm:ml-64">
        <div class="p-4 mt-14">
            @yield('mainProfile')
        </div>
    </div>
    @include('participant.partials.footerProfile')

</body>

</html>

