<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    @include('admin.css')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
        integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer">
    </script>
    <style>
    .div_center {
        text-align: center;
        padding-top: 40px;
    }

    .h2_font {
        font-size: 40px;
        padding-bottom: 40px;
    }

    .text_color {
        color: #000;
    }

    .center {
        margin: auto;
        width: 50%;
        text-align: center;
        margin-top: 30px;
        color: black;
        border: 2px solid #ddd;
        padding: 30px;

    }

    .header_color {
        font-family: Arial, Helvetica, sans-serif;
        font-weight: bold;
        background-color: #FECE7A;
    }

    .data_color {
        background-color: whitesmoke;
    }

    .design {
        padding: 10px;
    }

    #design {
        padding: 15px;
    }
    </style>
</head>

<body>
    <div class="container-scroller">
        <!-- sidebar -->
        @include('admin.sidebar')
        <!-- header -->
        @include('admin.header')
        <!-- body -->
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="div_center">

                    @if(session()->has('message'))
                    <div class="alert alert-success">

                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                        {{session()->get('message')}}

                    </div>

                    @endif

                    <h2 class="h2_font">Thêm danh mục</h2>

                    <form action="{{ url('/add-category') }}" method="post">
                        @csrf

                        <input class="text_color" type="text" name="category" placeholder="Tên danh mục">

                        <input type="submit" class="btn btn-primary" name="submit" value="Thêm danh mục">
                    </form>
                </div>

                <table class="center">
                    <tr class="header_color">
                        <td id="design">Tên danh mục</td>
                        <td id="design" colspan="2">Hành động</td>
                    </tr>

                    @foreach($data as $data)

                    <tr class="data_color">

                        <td class="design">{{ $data->category_name }}</td>
                        <td class="design"><a onclick="confirmation(event)" class="btn btn-danger"
                                href="{{ url('delete-category', $data->id) }}">
                                Xóa</a></td>
                        <td class="design"><a href="{{ url('edit-category', $data->id) }}" class="btn btn-primary">Sửa

                            </a></td>

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
                    title: "Bạn có muốn xóa danh mục?",
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