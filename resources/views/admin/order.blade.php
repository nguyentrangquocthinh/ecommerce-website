<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
        integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer">
    </script>
    @include('admin.css')
    <style>
    .h1_font {
        text-align: center;
        font-size: 25px;
        font-weight: bold;
    }

    .table_des {
        font-family: Arial, Helvetica, sans-serif;
        width: 100%;
        border-collapse: collapse;
        margin: 25px 0;
        font-size: 0.9em;
        min-width: 400px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
        border: 1px solid white;
    }

    .table_des th,
    .table_des td {
        padding: 12px 15px;
        text-align: center;
        border-bottom: 1px solid #ddd;
        color: black;
        background-color: #ddd;

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
    <div class="container-scroller">
        <!-- partial:partials/_sidebar.html -->
        @include('admin.sidebar')
        <!-- partial -->
        @include('admin.header')
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">

                <h1 class="h1_font">Tất cả đơn hàng</h1>

                <table class="table_des">
                    <tr>
                        <th>Tên</th>
                        <th>Email</th>
                        <th>Địa chỉ</th>
                        <th>SĐT</th>
                        <th>Sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Giá</th>
                        <th>Trạng thái thanh toán</th>
                        <th>Giao hàng</th>
                        <th>Ảnh</th>
                        <th>Đã giao</th>
                    </tr>

                    <tr>
                        @foreach ($order as $order)
                        <td>{{ $order->name }}</td>
                        <td>{{ $order->email }}</td>
                        <td>{{ $order->address }}</td>
                        <td>{{ $order->phone }}</td>
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
                            <img src="{{ asset('product/' . $order->image) }}" alt="">
                        </td>

                        <td>
                            @if ($order->delivery_status == 'Đang xử lý')

                            <a href="{{ url('delivered', $order->id) }}" onclick="confirmation(event)"
                                class="btn btn-success">Đã giao</a>
                        </td>
                        @else
                        <p style="color: green; font-weight: bold">Đã giao</p>
                        @endif
                    </tr>


                    @endforeach
                </table>
            </div>
        </div>

        <script>
        function confirmation(ev) {
            ev.preventDefault();
            var urlToRedirect = ev.currentTarget.getAttribute('href');
            console.log(urlToRedirect);
            swal({
                    title: "Bạn có chắc đơn hàng đã được giao?",
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
        <!-- plugins:js -->
        @include('admin.script')
        <!-- End custom js for this page -->
</body>

</html>