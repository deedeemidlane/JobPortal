@extends('admin.layouts.app')

@section('auth')

@include('admin.layouts.navbars.auth.sidebar')
<main class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
    @include('admin.layouts.navbars.auth.nav')
    <div class="container-fluid py-4">
        @yield('content')
    </div>
</main>

@endsection