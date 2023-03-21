<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }}</title>
        <link rel="icon" type="image/x-icon" href="{{asset('assets/images/paviconfpbs.ico')}}">

        <!-- Fonts -->
        @stack('scripts')
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body >
        <div class="w-full h-full object-cover md:bg-top font-[Poppins]"
            style="background-image: url('{{asset('assets/images/bg-image-min.png')}}')">

            <header class="bg-white">
                @include('guest.layouts.navigation')
            </header>

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>

            @include('guest.layouts.footer')
        </div>
        <script>
            const navLinks = document.querySelector('.nav-links')
            function onToggleMenu(e){
                e.name = e.name === 'menu' ? 'close' : 'menu'
                navLinks.classList.toggle('top-[9%]')
            }
        </script>
    </body>
</html>
