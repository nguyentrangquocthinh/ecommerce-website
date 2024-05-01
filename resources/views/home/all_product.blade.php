<!DOCTYPE html>
<html>

<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="https://www.vlu.edu.vn/icons/favicon_logo.png" type="">
    <title>Ceme Store</title>
    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('home/css/bootstrap.css')}}" />
    <!-- font awesome style -->
    <link href="{{ asset('home/css/font-awesome.min.css')}}" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="{{ asset('home/css/style.css') }}" rel="stylesheet" />
    <!-- responsive style -->
    <link href="{{ asset('home/css/responsive.css') }}" rel="stylesheet" />
    <style>
    .slider_bg_box img {
        width: 50%;
        height: auto;
        float: right;
        margin-left: 20px;
    }
    </style>

</head>

<body>
    @include('sweetalert::alert')

    <div class="hero_area">
        <!-- header section strats -->
        @include('home.header')
        <!-- end header section -->

        <!-- product section -->
        @include('home.product_view')
        <!-- end product section -->

        @include('home.subscribe')
        @include('home.client')




        <!-- footer start -->
        @include('home.footer')
        <!-- footer end -->

        <div class="cpy_">
            <p class="mx-auto">© 2023 All Rights Reserved By <a href="https://www.facebook.com/hadonghung">Ceme
                    Team</a><br>
            </p>
        </div>
        <!-- jQery -->
        <script src="home/js/jquery-3.4.1.min.js"></script>
        <!-- popper js -->
        <script src="home/js/popper.min.js"></script>
        <!-- bootstrap js -->
        <script src="home/js/bootstrap.js"></script>
        <!-- custom js -->
        <script src="home/js/custom.js"></script>
</body>

</html>