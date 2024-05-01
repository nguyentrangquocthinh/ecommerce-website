<!DOCTYPE html>
<html lang="en">

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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
        integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <style>
    h1 {
        text-align: center;
        font-size: 25px;
    }

    .center {
        margin: auto;
        width: 80%;
        text-align: center;
        font-family: Arial, Helvetica, sans-serif;
        overflow-x: auto;
    }

    .img_size {
        max-width: 150px;
        max-height: 150px;
        display: block;
        border-radius: 8px;
        margin: 0 auto;
    }

    table {
        font-family: Arial, Helvetica, sans-serif;
        width: 80%;
        margin: 25px auto;
        border-collapse: collapse;
        font-size: 0.9em;
        min-width: 400px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
        border: 1px solid white;
        padding: 30px;
    }

    th,
    td {
        border: 1px solid black;
        padding: 10px;
        text-align: center;
        white-space: nowrap;
    }

    .design {
        background-color: #FECE7A;
        font-size: 18px;
        padding: 10px;
        color: black;
    }

    .total-row {
        font-weight: bold;
    }

    .payment-options {
        display: flex;
        justify-content: space-between;
    }

    .payment-options button {
        margin-bottom: 10px;
    }

    .cpy_ {
        margin-top: 20px;
        text-align: center;
    }
    </style>
</head>

<body>
    <div class="hero_area">
        <!-- Header section -->
        @include('home.header')
        <!-- End header section -->

        @if(session()->has('message'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
            {{session()->get('message')}}
        </div>
        @endif

        <div class="center">
            <table>
                <tr>
                    <th class="design">Sản phẩm</th>
                    <th class="design">Ảnh</th>
                    <th class="design">Số lượng</th>
                    <th class="design">Giá</th>
                    <th class="design">Điều chỉnh</th>
                </tr>

                <?php $totalPrice = 0; ?>

                @foreach ($cart as $item)
                <tr>
                    <td>{{ $item->product_title }}</td>
                    <td><img class="img_size" src="/product/{{ $item->image }}" alt=""></td>
                    <td>{{ $item->quantity }}</td>
                    <td>
                        @php
                        $formattedPrice = number_format($item->price, 0, ',', '.');
                        $name = str_replace(" ", "&nbsp;", $item->title);
                        $id = $item->id;
                        @endphp
                        {{ $formattedPrice }} VND
                    </td>
                    <td><a class="btn btn-danger" onclick="confirmation(event)"
                            href="{{ url('remove-cart',$item->id) }}">Xóa sản phẩm</a></td>
                </tr>

                <?php $totalPrice += $item->price; ?>
                @endforeach

                <?php $formattedTotalPrice = number_format($totalPrice, 0, ',', '.'); ?>

                <tr class="total-row">
                    <td colspan="3">Tổng cộng</td>
                    <td colspan="2">{{ $formattedTotalPrice }} VND</td>
                </tr>

                <tr>
                    <th colspan="3"> Thanh toán </th>
                    <td colspan="2"> <a href="{{ url('cash-order') }}"><button class="btn btn-outline-success">Cash on
                                Delivery</button></a> <a href="{{ url('stripe', $formattedTotalPrice) }}"><button
                                class="btn btn-outline-success">Trả bằng thẻ</button></a> </td>
                </tr>
            </table>
        </div>

        <div class="cpy_">
            <p class="mx-auto">© 2023 All Rights Reserved By <a href="https://www.facebook.com/hadonghung">Ceme
                    Team</a><br></p>
        </div>

        <script>
        function confirmation(ev) {
            ev.preventDefault();
            var urlToRedirect = ev.currentTarget.getAttribute('href');
            console.log(urlToRedirect);
            swal({
                    title: "Bạn có muốn xóa khỏi giỏ hàng?",
                    text: "Không thể hoàn tác!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willCancel) => {
                    if (willCancel) {

                        window.location.href = urlToRedirect;
                    }
                });
        }
        </script>
        <!-- jQuery -->
        <script src="home/js/jquery-3.4.1.min.js"></script>
        <!-- Popper.js -->
        <script src="home/js/popper.min.js"></script>
        <!-- Bootstrap.js -->
        <script src="home/js/bootstrap.js"></script>
        <!-- Custom.js -->
        <script src="home/js/custom.js"></script>
</body>

</html>