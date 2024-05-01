<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
        integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer">
    </script>
    <!-- Required meta tags -->
    @include('admin.css')
    <style>
    .h2_font {
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

                <h2 class="h2_font">Danh sách sản phẩm</h2>
                <table class="table_des">
                    <tr class="header_color">
                        <th class="design">Sản phẩm</th>
                        <th class="design">Danh mục</th>
                        <th class="design">Giá</th>
                        <th class="design">Số lượng</th>
                        <th class="design">Mô tả sản phẩm</th>
                        <th class="design">Ảnh sản phẩm</th>
                        <th class="design">Xoá</th>
                        <th class="design">Sửa</th>
                    </tr>

                    @foreach($product as $product)

                    <tr class="data_color">
                        <td>{{ $product->title }}</td>
                        <td>{{ $product->category }}</td>
                        <td>
                            @php $formattedPrice = number_format($product->price);
                            $name = str_replace(" ", "&nbsp;", $product->title);
                            $id = $product->id;
                            @endphp
                            {{ $formattedPrice }} VNĐ
                        </td>
                        <td>{{ $product->quantity }}</td>
                        <td>{{ $product->description }}</td>
                        <td>
                            <img class="img_size" src="/product/{{ $product->image }}" alt="">
                        </td>
                        <td>
                            <a class="btn btn-danger" onclick="confirmation(event)"
                                href="{{url('delete-product',$product->id)}}">Xóa</a>
                        </td>
                        <td>
                            <a class="btn btn-outline-success" href="{{url('update-product',$product->id)}}">Sửa</a>
                        </td>
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
                    title: "Bạn có muốn xóa sản phẩm?",
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
        <!-- container-scroller -->
        <!-- plugins:js -->
        @include('admin.script')
        <!-- End custom js for this page -->
</body>

</html>