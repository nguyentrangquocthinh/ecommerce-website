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
    .product-detail-container {
        display: flex;
        height: 100vh;
    }
    </style>
</head>

<body>


    <div class="hero_area">
        <!-- header section strats -->
        @include('home.header')
        @if(session()->has('message'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
            {{session()->get('message')}}
        </div>
        @endif
        <div class="product-detail-container">
            <div class="col-md-2"
                style="margin: auto; width: 50%; padding: 30px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                <div class="detail-box">
                    <div class="img-box" style="padding: 20px;">
                        <img src="/product/{{ $product->image }}" alt="{{ $product->title }}"
                            style="max-width: 100%; max-height: 200px; object-fit: contain; border-radius: 8px;">
                    </div>
                    <div class="product_title">
                        <h5 style="margin-bottom: 10px;">{{ $product->title }}</h5>
                    </div>

                    <div class="product_category">
                        <h6 style="margin-bottom: 10px;"><strong>Danh mục: </strong>
                            {{$product->category}}
                        </h6>
                    </div>

                    <div class="product_quantity">
                        <h6 style="margin-bottom: 10px;"> <strong>Số lượng:</strong>
                            {{$product->quantity}}
                        </h6>
                    </div>

                    <div>
                        <h6 style="margin-bottom: 10px;"> <strong>Chi tiết sản phẩm:</strong> <br>
                            {{$product->description}}
                        </h6>
                    </div>

                    <div class="product_price">
                        <h6 style="color: blue; font-size: 1.1em; margin-bottom: 5px;">
                            @php $formattedPrice = number_format($product->price);
                            $name = str_replace(" ", "&nbsp;", $product->title);
                            $id = $product->id;
                            @endphp
                            Giá: {{ $formattedPrice }}₫
                        </h6>
                    </div>

                    <form action="{{ url('cart', $product->id) }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-3">
                                <input type="number" value="1" name="quantity" style="width: 60px; margin-top: 4px;"
                                    min="1">
                            </div>
                            <div class="col-md-3">
                                <input type="submit" class="option2" value="Giỏ hàng">
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>


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