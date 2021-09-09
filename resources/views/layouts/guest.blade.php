<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body>
        <div class="font-sans text-gray-900 antialiased">
            {{ $slot }}
        </div>
        <hr>
        <div style="border-radius:4px;">
            <h3>Admin</h3>
            <h3>Username : admin@a.com</h3>
            <h3>Password : aaaa1111</h3>
            <hr>
            <h3>Branch</h3>
            <h3>Username : branch@b.com</h3>
            <h3>Password:  bbbb1111</h3>
            <hr>
            <h3>Student</h3>
            <h3>Username : student@s.com</h3>
            <h3>Password:  ssss1111</h3>
            <hr>
            <h3>Guest</h3>
            <h3>Username : guest@guest.com</h3>
            <h3>Password:  gggg1111</h3>
        </div>
    </body>
</html>
