<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<link rel="stylesheet" href="{{ asset('css/style_dashboard.css') }}">
<script src="{{ asset('js/script.js') }}"></script>
</head>

<div class="overlay" id="overlay"></div>

<div class="app">

    @include('partials.sidebar')
<div class="content-col">

    @include('partials.navbar')

    <main class="content-main">

        @yield('content')

    </main>

</div>

</div>

@include('partials.scripts')