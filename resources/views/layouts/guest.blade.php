<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

</head>
<body class="bg-serre2 bg-no-repeat bg-cover bg-center w-full h-full">
<div class="font-sans text-gray-900 antialiased">
    {{ $slot }}
</div>
<div class="h-12">
    &ensp;
</div>
</body>
</html>

