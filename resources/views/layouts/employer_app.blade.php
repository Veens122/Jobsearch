<!doctype html>
<html lang="en">

<!-- Mirrored from shreethemes.net/jobstock-landing-2.3/jobstock/employer-dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 05 May 2025 12:45:18 GMT -->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Job Stock - Responsive Job Portal Bootstrap Template | ThemezHub</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/favicon.png') }}">

    <!-- Custom CSS -->
    <link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet">



    <!-- Colors CSS -->
    <link href="{{ asset('assets/css/colors.css') }}" rel="stylesheet'">

</head>

<body class="green-theme">

    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div id="preloader">
        <div class="preloader"><span></span><span></span></div>
    </div>

    <!-- Header -->
    @include('snippets.employer_header')
    <!-- Header End -->
    <!-- Sidebar -->
    @include('snippets.employer_side_bar')
    <!-- Sidebar End -->

    @yield('content')

    <!-- Footer -->
    @include('snippets.employer_footer')
    <!-- Footer End -->


    <!-- Color Switcher -->
    <div class="style-switcher">
        <div class="css-trigger shadow"><a href="#"><i class="fa-solid fa-paintbrush"></i></a></div>
        <div>
            <ul id="themecolors" class="m-t-20">
                <li><a href="javascript:void(0)" data-skin="green-theme" class="green-theme">1</a></li>
                <li><a href="javascript:void(0)" data-skin="red-theme" class="red-theme">2</a></li>
                <li><a href="javascript:void(0)" data-skin="blue-theme" class="blue-theme">3</a></li>
                <li><a href="javascript:void(0)" data-skin="yellow-theme" class="yellow-theme">4</a></li>
                <li><a href="javascript:void(0)" data-skin="purple-theme" class="purple-theme">5</a></li>
                <li><a href="javascript:void(0)" data-skin="orange-theme" class="orange-theme">6</a></li>
                <li><a href="javascript:void(0)" data-skin="brown-theme" class="brown-theme">7</a></li>
                <li><a href="javascript:void(0)" data-skin="cadmium-theme" class="cadmium-theme">8</a></li>
            </ul>
        </div>
    </div>

    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/rangeslider.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('assets/js/slick.js') }}"></script>
    <script src="{{ asset('assets/js/counterup.min.js') }}"></script>


    <script src="{{ asset('assets/js/custom.js') }}"></script>
    <script src="{{ asset('assets/js/cl-switch.js') }}"></script>

    <!-- Morris.js charts -->
    <script src="{{ asset('assets/js/raphael/raphael.min.js') }}"></script>
    <script src="{{ asset('assets/js/morris.js/morris.min.js') }}"></script>
    <!-- Custom Chart JavaScript -->
    <script src="{{ asset('assets/js/custom/dashboard.js') }}"></script>
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->


    @if (session('message'))
    <script>
        swal("Successful!", "{{ session('message') }}", "success");
    </script>
    @endif

    @if (session('info'))
    <script>
        swal("Info", "{{ session('info') }}", "info");
    </script>
    @endif

    @if (Session::has('success'))
    <script>
        swal("Successful!", "{{ Session::get('success') }}", "success");
    </script>
    @endif

    @if (Session::has('error'))
    <script>
        swal("Error!", "{{ Session::get('error') }}", "warning");
    </script>
    @endif
</body>

<!-- Mirrored from shreethemes.net/jobstock-landing-2.3/jobstock/employer-dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 05 May 2025 12:45:24 GMT -->

</html>