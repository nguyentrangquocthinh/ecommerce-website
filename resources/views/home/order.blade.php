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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
        integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer">
    </script>
    <style>
    .h1_font {
        text-align: center;
        font-size: 25px;
        font-weight: bold;
    }

    .table_des {
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

    .table_des th,
    .table_des td {
        padding: 12px 15px;
        text-align: center;
        border-bottom: 1px solid #ddd;
        color: black;
        background-color: #ddd;
        white-space: nowrap;
    }

    .table_des th {
        background-color: #FECE7A;
        font-weight: bold;
        font-size: 20px;
        text-align: center;
    }

    .table_des img {
        max-width: 150px;
        max-height: 150px;
        border-radius: 8px;
    }
    </style>

</head>

<body>
    <div class="hero_area">
        <!-- header section strats -->
        @include('home.header')
        <!-- end header section -->

        <div>
            <table class="table_des">
                <tr>
                    <th>Tên sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Giá</th>
                    <th>Trạng thái thanh toán</th>
                    <th>Giao hàng</th>
                    <th>Ảnh</th>
                    <th>Hủy giao hàng</th>
                </tr>

                @foreach($order as $order)
                <tr>

                    <td>{{ $order->product_title }}</td>

                    <td>{{ $order->quantity }}</td>

                    <td>
                        @php
                        $formattedPrice = number_format($order->price);
                        $name = str_replace(" ", "&nbsp;", $order->price);
                        $id = $order->id;
                        @endphp
                        {{ $formattedPrice }} VNĐ
                    </td>

                    <td>{{ $order->payment_status }}</td>

                    <td>{{ $order->delivery_status }}</td>

                    <td>
                        <img src="{{ asset('product/'.$order->image) }}" alt="">
                    </td>

                    <td>

                        @if($order->delivery_status == 'Đang xử lý')
                        <a onclick="confirmation(event)" type="submit" href="{{ url('cancel-order', $order->id) }}"
                            class="btn btn-outline-danger">Hủy</a>

                        @else
                        <p style="color: blue; font-weight: bold">Đơn hàng đã được hủy</p>
                        @endif

                    </td>

                </tr>

                @endforeach
            </table>

        </div>

    </div>

</body>


<!-- footer start -->
@include('home.footer')
<!-- footer end -->

<div class="cpy_">
    <p class="mx-auto">© 2023 All Rights Reserved By <a href="https://www.facebook.com/hadonghung">Ceme Team</a><br>
    </p>
</div>
<script>
function confirmation(ev) {
    ev.preventDefault();
    var urlToRedirect = ev.currentTarget.getAttribute('href');
    console.log(urlToRedirect);
    swal({
            title: "Bạn có muốn hủy đơn?",
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