<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body>
    <div class="w-full">
        <div class=" relative">
            @include('guest.partials.navbar')
        </div>
        <div class="bg-LightBlue w-screen">
            <div class="s">
                @yield('main')
            </div>
        </div>
        <div class="sticky top-100vh">
            @include('guest.partials.footer')
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
</body>

</html>

