<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<link rel="stylesheet" href="{{ asset('css/style_dashboard.css') }}">
<script src="{{ asset('js/script.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,400;14..32,500;14..32,600;14..32,700&display=swap" rel="stylesheet">
<style>
    @font-face {
        font-family: 'Kh Battambang';
        src: url('{{ asset('fonts/Kh-Battambang.ttf') }}') format('truetype');
        font-weight: normal;
        font-style: normal;
        font-display: swap;
    }

    * { font-family: 'Kh Battambang', 'Inter', sans-serif; }
    body { background-color: #f8fafc; }
    ::-webkit-scrollbar { height: 8px; width: 8px; }
    ::-webkit-scrollbar-thumb { background-color: #cbd5e1; border-radius: 9999px; }

    @media (prefers-reduced-motion: reduce) {
        * { animation: none !important; transition: none !important; }
    }
</style>
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
<script>
    // Confirm delete with a quick fade-out on the row before submitting
    document.querySelectorAll('.delete-form').forEach(function (form) {
        form.addEventListener('submit', function (e) {
            e.preventDefault();
            if (!confirm('Are you sure you want to delete this user?')) return;

            var row = form.closest('tr');
            if (row) {
                row.style.transition = 'opacity 0.25s ease, transform 0.25s ease';
                row.style.opacity = '0';
                row.style.transform = 'translateX(8px)';
                setTimeout(function () { form.submit(); }, 220);
            } else {
                form.submit();
            }
        });
    });
</script>


@include('partials.scripts')