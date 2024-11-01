@extends('admin.layouts.app')

@section('guest')
<div class="container position-sticky z-index-sticky top-0">
    <div class="row">
        <div class="col-12">
            @include('admin.layouts.navbars.guest.nav')
        </div>
    </div>
</div>
@yield('content')
@include('admin.layouts.footers.guest.footer')
@endsection