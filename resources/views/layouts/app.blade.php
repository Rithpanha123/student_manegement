<!DOCTYPE html>
<html lang="km">
<head>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,500;0,600;1,500&family=Noto+Serif+Khmer:wght@400;500;600;700&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<link rel="stylesheet" href="{{ asset('css/style_dashboard.css') }}">

</head>
<body>

<div class="overlay" id="overlay"></div>

<div class="app">

    @include('partials.sidebar')

    <div class="content-col">

        @include('partials.navbar')

        <main class="main">

            @yield('content')

        </main>

    </div>

</div>

@include('partials.scripts')

</body>
</html>