<!DOCTYPE html>
<html lang="km">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ចូលប្រើប្រាស់ — Sandech Preah Mahasangharajah Bour Kry University</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,500;0,600;1,500&family=Noto+Serif+Khmer:wght@400;500;600;700&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="{{ asset('js/script.js') }}"></script>
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>
<body>

<div class="stage">

    <section class="panel">

        <div class="rays"></div>
        <div class="flame-border"></div>

        <div class="panel-inner">

            <div class="seal-halo">
                <img src="{{ asset('assets/logo.png') }}" alt="University Logo">
            </div>

            <p class="uni-name-km">
                សាកលវិទ្យាល័យ សម្ដេចព្រះមហាសង្ឃរាជ ប៊ួរគ្រី
            </p>

            <p class="uni-name-en">
                Sandech Preah Mahasangharajah Bour Kry University
            </p>

            <div class="motto">
                សុភាព · ស្មារតី · ប្រាជ្ញា
                <span>Kindness · Consciousness · Intelligence</span>
            </div>

        </div>

    </section>

    <section class="form-side">

        <p class="form-eyebrow">
            Student & Staff Portal
        </p>

        <h1>Sign in</h1>

        <p class="khmer-sub">
            ចូលប្រើប្រាស់គណនីរបស់អ្នក
        </p>

        <form method="POST" action="{{ route('login.post') }}" autocomplete="off">

            @csrf

            <div class="field">

                <label>
                    Username
                    <span class="km">ឈ្មោះអ្នកប្រើប្រាស់</span>
                </label>

                <div class="input-wrap">

                    <svg viewBox="0 0 24 24" fill="none" stroke-width="1.8">
                        <path d="M20 21a8 8 0 0 0-16 0"/>
                        <circle cx="12" cy="7" r="4"/>
                    </svg>

                    <input
                        type="text"
                        name="username"
                        value="{{ old('username') }}"
                        placeholder="Username"
                        required
                    >

                </div>

            </div>

            <div class="field">

                <label>
                    Password
                    <span class="km">ពាក្យសម្ងាត់</span>
                </label>

                <div class="input-wrap">

                    <svg viewBox="0 0 24 24" fill="none" stroke-width="1.8">
                        <rect x="4" y="10" width="16" height="10" rx="2"/>
                        <path d="M8 10V7a4 4 0 0 1 8 0v3"/>
                    </svg>

                    <input
                        id="password"
                        type="password"
                        name="password"
                        placeholder="Password"
                        required
                    >

                    <button
                        type="button"
                        class="toggle-pass"
                        id="togglePass">
                        SHOW
                    </button>

                </div>

            </div>

            <div class="row-between">

                <label class="remember">
                    <input type="checkbox" name="remember">
                    Remember me
                </label>

                <a href="#" class="forgot">
                    Forgot password?
                </a>

            </div>

            <button type="submit" class="btn-signin">

                Sign in

                <svg viewBox="0 0 24 24"
                     fill="none"
                     stroke="currentColor"
                     stroke-width="2">

                    <path d="M5 12h14"/>
                    <path d="m13 5 7 7-7 7"/>

                </svg>

            </button>

        </form>

        <p class="helper">
            New here?
            <a href="#">
                Request an account
            </a>
        </p>

        <p class="foot-note">
            © {{ date('Y') }} Sandech Preah Mahasangharajah Bour Kry University
        </p>

    </section>

</div>

@if(session('success'))
<script>
Swal.fire({
    icon: 'success',
    title: 'Login Successful',
    text: '{{ session("success") }}',
    timer: 2000,
    showConfirmButton: false
});
</script>
@endif


@if(session('success'))
<script>
Swal.fire({
    icon:'success',
    title:'Success',
    text:'{{ session("success") }}',
    confirmButtonColor:'#7b1e1e'
});
</script>
@endif

@if(session('error'))
<script>
Swal.fire({
    icon:'error',
    title:'Login Failed',
    text:'{{ session("error") }}',
    confirmButtonColor:'#7b1e1e'
});
</script>
@endif

@if($errors->any())
<script>
Swal.fire({
    icon:'error',
    title:'Validation Error',
    text:'{{ $errors->first() }}',
    confirmButtonColor:'#7b1e1e'
});
</script>
@endif

<script>
const toggle = document.getElementById('togglePass');
const pass = document.getElementById('password');

toggle.addEventListener('click', function () {

    if(pass.type === 'password'){
        pass.type='text';
        toggle.innerHTML='HIDE';
    }else{
        pass.type='password';
        toggle.innerHTML='SHOW';
    }

});
</script>

</body>
</html>