<section class="product_section layout_padding">
    <div class="container">
        <div class="heading_container heading_center">
            <h2>
                <span>Sản phẩm</span> của chúng tôi
            </h2>
        </div>

        @if(session()->has('message'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
            {{session()->get('message')}}
        </div>
        @endif

        <div class="row">
            @foreach($product as $products)

            <div class="col-sm-6 col-md-4 col-lg-4">
                <div class="box">
                    <div class="option_container">
                        <div class="options">
                            <a href="{{ url('product-details', $products->id) }}" class="option1">
                                Chi tiết
                            </a>
                            <form action="{{ url('cart', $products->id) }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-md-4">
                                        <input type="number" value="1" name="quantity"
                                            style="width: 100px; margin-top: 3px;" min="1">
                                    </div>
                                    <div class="col-md-4">
                                        <input type="submit" class="option2" value="Giỏ hàng">
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="img-box">
                        <img src="product/{{ $products->image }}" alt="">
                    </div>
                    <div class="detail-box">
                        <h5>
                            {{ $products->title }}
                        </h5>

                        <h6 style="color: blue;">
                            @php
                            $formattedPrice = number_format($products->price);
                            $name = str_replace(" ", "&nbsp;", $products->title);
                            $id = $products->id;
                            @endphp
                            Giá <br>
                            {{ $formattedPrice }}₫
                        </h6>
                    </div>
                </div>
            </div>

            @endforeach
            <span style="padding-top: 20px;">
                {!! $product->withQueryString()->links('pagination::bootstrap-5') !!}
            </span>
        </div>
</section>