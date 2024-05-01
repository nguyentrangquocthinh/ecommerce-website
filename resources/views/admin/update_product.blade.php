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
    }

    label {
        display: inline-block;
        width: 200px;
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
        <!-- Sidebar -->
        @include('admin.sidebar')

        <!-- Header -->
        @include('admin.header')

        <div class="main-panel">
            <div class="content-wrapper">
                @if(session()->has('message'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                    {{session()->get('message')}}
                </div>
                @endif

                <div class="div_center">
                    <h1 class="h1_font">Cập nhật sản phẩm</h1>

                    <form action="{{ url('update-product_confirm', $product->id) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="div_design">
                            <label for="title">Tên sản phẩm:</label>
                            <input class="text_color" type="text" name="title" value="{{$product->title}}"
                                placeholder="Nhập tên sản phẩm" required>
                        </div>

                        <div class="div_center">
                            <label for="category">Danh mục sản phẩm:</label>
                            <select class="text_color" name="category" id="">
                                <option value="{{$product->category}}" selected>{{$product->category}}</option>
                                @foreach($category as $category)
                                <option value="{{ $category->category_name }}">{{ $category->category_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="div_center">
                            <label for="price">Giá sản phẩm:</label>
                            <input value="{{$product->price}}" class="text_color" type="number" name="price"
                                placeholder="Nhập giá" required>
                        </div>

                        <div class="div_center">
                            <label for="quantity">Số lượng sản phẩm:</label>
                            <input class="text_color" value="{{$product->quantity}}" type="number" name="quantity"
                                min="0" placeholder="Nhập số lượng" required>
                        </div>

                        <div class="div_center">
                            <label for="description">Mô tả sản phẩm:</label>
                            <textarea rows="5" class="text_color" value="{{$product->description}}" id="description"
                                name="description" required></textarea>
                        </div>

                        <div>
                            <label for="image">Ảnh hiện tại:</label>
                            <img style="margin:auto;" height="200" width="200" src="/product/{{ $product->image }}">
                            <br>
                        </div>

                        <div>
                            <label for="image">Hình ảnh sản phẩm</label>
                            <input width="100" height="100" type="file" name="image" onchange="loadFile(event)">
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
                            <input type="submit" value="Cập nhật sản phẩm" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- container-scroller -->
        <!-- Plugins JS -->
        @include('admin.script')
        <!-- End custom JS for this page -->
</body>

</html>