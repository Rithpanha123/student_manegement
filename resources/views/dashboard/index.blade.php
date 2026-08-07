<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

<h1>Dashboard1Dashboard1Dashboard1Dashboard1Dashboard1Dashboard1</h1>

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