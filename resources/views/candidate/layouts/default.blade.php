<!DOCTYPE html>
<html lang="en">

@include('candidate.includes.head')

<body>
    <div class="container-xxl bg-white p-0">
        <!-- header -->
        @include('candidate.includes.header')
        <!-- // header -->


        <!-- contents -->
        @yield('content')
        <!-- // contents -->


        <!-- footer -->
        @include('candidate.includes.footer')
        <!-- // footer -->
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/candidate/lib/wow/wow.min.js"></script>
    <script src="/assets/candidate/lib/easing/easing.min.js"></script>
    <script src="/assets/candidate/lib/waypoints/waypoints.min.js"></script>
    <script src="/assets/candidate/lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="/assets/candidate/js/main.js"></script>

</body>

</html>