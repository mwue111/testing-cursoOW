<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TDD con Laravel</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>

    <div class="max-w-md mx-auto px-4">
        <h1 class="text-2xl text-center my-8">Administración de productos</h1>
        <!-- <a href="{{ route('products.index') }}">Productos</a> -->

        @yield('content')
    </div>

</body>
</html>
