<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    @include('admin.css')
    <style>
    .div_center {
        text-align: center;
        padding-top: 40px;
    }

    .h1_font {
        font-size: 40px;
        padding-bottom: 40px;
    }

    .text_color {
        color: #000000;
        /* padding-bottom: 20px; */
    }

    label {
        display: inline-block;
        width: 200px;
        justify-content: center;
    }


    textarea {
        font-family: 'Times New Roman', Times, serif;
        font-size: 18px;
        width: 90%;
        margin: 5px;
        padding: 5px;
    }

    .div_design {
        padding-bottom: 15px;
    }
    </style>
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_sidebar.html -->
        @include('admin.sidebar')
        <!-- partial -->
        @include('sweetalert::alert')
        @include('admin.header')
        <!-- partial -->
        <div class="main-panel">

            <div class="content-wrapper">
                @if(session()->has('message'))
                <div class="alert alert-success">

                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                    {{session()->get('message')}}

                </div>

                @endif

                <div class="div_center">

                    <h1 class="h1_font">Thêm sản phẩm</h1>

                    <form action="{{ url('add-product') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="div_design">
                            <label for="title">Tên sản phẩm: </label>
                            <input class="text_color" type="text" name="title" placeholder="Nhập tên sản phẩm" required>
                        </div>

                        <div class="div_center">
                            <label for="category">Danh mục sản phẩm: </label>
                            <select class="text_color" name="category" id="">
                                <option value="" selected>Thêm danh mục</option>
                                @foreach($category as $category)

                                <option value="{{ $category->category_name }}">{{ $category->category_name }}</option>

                                @endforeach
                            </select>
                        </div>

                        <div class="div_center">
                            <label for="price">Giá sản phẩm: </label>
                            <input class="text_color" type="number" name="price" placeholder="Nhập giá" required>
                        </div>

                        <div class="div_center">
                            <label for="quantity">Số lượng sản phẩm: </label>
                            <input class="text_color" type="number" name="quantity" min="0" placeholder="Nhập số lượng"
                                required>
                        </div>

                        <div class="div_center">
                            <label for="description">Mô tả sản phẩm: </label>
                            <!-- <input class="text_color" type="text" name="description" placeholder="Nhập mô tả" required> -->
                            <textarea rows="4" class="text_color" id="description" name="description" required>
                                </textarea>
                        </div>

                        <div>
                            <label for="image">Hình ảnh sản phẩm</label>
                            <input width="100" height="100" type="file" name="image" onchange="loadFile(event)"
                                required>
                            <img id="pic_output" style="max-width: 150px; max-height: 150px; display: none;">
                            <script>
                            var loadFile = function(event) {
                                var output = document.getElementById('pic_output');
                                output.src = URL.createObjectURL(event.target.files[0]);
                                output.onload = function() {
                                    URL.revokeObjectURL(output.src) // free memory
                                }
                                output.style.display = "inline";
                            };
                            </script>

                        </div>

                        <div class="div_center">
                            <input type="submit" value="Thêm sản phẩm" class="btn btn-primary">
                        </div>
                    </form>

                </div>

            </div>

        </div>

        <!-- container-scroller -->
        <!-- plugins:js -->
        @include('admin.script')
        <!-- End custom js for this page -->
</body>

</html>