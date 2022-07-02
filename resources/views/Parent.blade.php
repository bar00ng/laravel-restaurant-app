<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ env('APP_NAME') }}</title>
    <!-- Tailwindcss CDN Links -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- JQuery CDN Links -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    
    <!-- Font Awesome CDN Links -->
    <script src="https://kit.fontawesome.com/0458c5e007.js" crossorigin="anonymous"></script>

    <!-- Google Fonts Link -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Urbanist:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- Preconfigured/Base Style -->
    <style type="text/tailwindcss">
        @layer utilities {
            * {
                font-family: 'Urbanist', sans-serif;
            }
        }
    </style>
</head>
<body>
    <header class="bg-{{ env('APP_THEME') }}-700 w-screen p-2.5 flex items-center justify-between">
        <div>&nbsp</div>
        
        <h1 class="text-4xl text-white" style="font-family: 'Pacifico', cursive;">{{ env('APP_NAME') }}</h1>

        @if (Route::currentRouteName() == 'cart')
            <div>&nbsp</div>
        @else
            <!-- Active jika user -->
            <div class="relative cursor-pointer mr-2">
                <a href="{{ route('cart') }}">
                    <i class="fa-solid fa-cart-shopping text-xl text-white"></i>
                </a>
                <span class="absolute top-[-5px] right-[-7px] bg-red-500 text-white rounded-full w-3.5 h-3.5 flex items-center justify-center text-sm p-2">{{ count((array) session('cart')) }}</span>
            </div>

            <!-- Active jika admin -->
            <a href="{{route('listOrder')}}" class="text-white font-semibold">ORDERS</a>
        @endif
    </header>

    <main class="p-5">
      @yield('content')
    </main>

    @yield('scripts')
</body>
</html>
