<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <!-- Agregar el enlace al CSS de Tailwind CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <!--favicon-->
    <!--estilo-->
</head>
<body class="bg-gray-100">
    <!--header-->
    <!--nav-->
    <div class="container mx-auto p-4">
        @yield('content')
    </div>

    <!--footer-->
    <!--script-->
    @stack('scripts') <!-- Agregar scripts en la sección 'scripts' -->
</body>
</html>
