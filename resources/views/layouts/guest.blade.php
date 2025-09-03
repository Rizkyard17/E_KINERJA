{{-- resources/views/layouts/guest.blade.php --}}
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>@yield('title') - Aplikasi</title>

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    <div class="container">
        @yield('content')
    </div>

    <script src="{{ asset('js/login.js') }}"></script>
</body>
</html>