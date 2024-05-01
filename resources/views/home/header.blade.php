<style>
.header_section {
    white-space: nowrap;
}
</style>
<header class="header_section">
    <div class="container">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
            <a class="navbar-brand" href="{{ url('/') }}"><img width="170px"
                    src="https://www.vlu.edu.vn/_next/static/media/logo.8e5334db.svg" alt="#" /></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class=""> </span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ url('/redirect') }}">Trang chủ<span
                                class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button"
                            aria-haspopup="true" aria-expanded="true"> <span class="nav-label">Pages <span
                                    class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="about.html">About</a></li>
                            <li><a href="{{ url('review') }}">Đánh giá</a></li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('products') }}">Sản phẩm</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="contact.html">Liên hệ</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('show-cart') }}">Giỏ hàng</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('show-order') }}">Đơn hàng</a>
                    </li>

                    <form class="form-inline">
                        <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit">
                            <i class="fa fa-search" aria-hidden="true"></i>
                        </button>
                    </form>

                    @if (Route::has('login'))

                    @auth

                    <li class="nav-item">
                        <x-app-layout>

                        </x-app-layout>
                    </li>

                    @else

                    <li class="nav-item">
                        <a class="btn btn-primary" id="logincss" href="{{ route('login') }}">Login</a>
                    </li>

                    <li class="nav-item">
                        <a class="btn btn-success" href="{{ route('register') }}">Register</a>
                    </li>
                    @endauth
                    @endif

                </ul>
            </div>
        </nav>
    </div>
</header>