@extends('recruiter.layouts.app')

@section('guest')
@if(\Request::is('login/forgot-password'))
@include('recruiter.layouts.navbars.guest.nav')
@yield('content')
@else
<div class="container position-sticky z-index-sticky top-0">
    <div class="row">
        <div class="col-12">
            @include('recruiter.layouts.navbars.guest.nav')
        </div>
    </div>
</div>
@yield('content')
@include('recruiter.layouts.footers.guest.footer')
@endif
@endsection