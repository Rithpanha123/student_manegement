<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Font Awesome 6 (free) -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<!-- Tailwind CSS (CDN build) -->
<script src="https://cdn.tailwindcss.com"></script>
@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

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

@endsection