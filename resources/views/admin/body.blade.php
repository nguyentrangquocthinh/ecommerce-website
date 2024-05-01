<style>
.card-body {
    padding: 15px;
}

.icon-box-success,
.icon-box-danger {
    background-color: #28a745;
    color: #fff;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-right: 10px;
}

.d-flex {
    display: flex;
}

.align-items-center {
    align-items: center;
}

.align-self-start {
    align-self: flex-start;
}

.mb-2 {
    margin-bottom: 20px;
}

.text-muted {
    font-weight: bold;
    color: #fff;
}

.font-weight-normal {
    font-weight: normal;
}

.card {
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    border: none;
    border-radius: 8px;
    transition: 0.3s;
}

.card:hover {
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
    transform: translateY(-5px);
}

.icon-item {
    color: #fff;
}

.gradient-corona-img {
    max-width: 100%;
}

.gradient-corona-img {
    max-width: 100%;
}

.col-9 {
    flex: 0 0 75%;
    max-width: 75%;
}

.col-3 {
    flex: 0 0 25%;
    max-width: 25%;
}
</style>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card corona-gradient-card">
                    <div class="card-body py-0 px-0 px-sm-3">
                        <div class="row align-items-center">
                            <div class="col-4 col-sm-3 col-xl-2">
                                <img src="assets/images/dashboard/Group126@2x.png" class="gradient-corona-img img-fluid"
                                    alt="">
                            </div>
                            <div class="col-8 text-center">
                                <h4 style="font-weight: bold; font-size: 30px" class="mx-auto">Trang chủ Admin</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Block 1 -->
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <div class="icon-box-success">
                                <span class="mdi mdi-arrow-top-right icon-item"></span>
                            </div>
                            <h6 class="text-muted font-weight-normal">Tổng sản phẩm</h6>
                        </div>
                        <div class="d-flex align-items-center align-self-start">
                            <h3 class="mb-0">{{ $total_product }}</h3>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Block 2 -->
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <div class="icon-box-success">
                                <span class="mdi mdi-arrow-top-right icon-item"></span>
                            </div>
                            <h6 class="text-muted font-weight-normal">Tổng đơn hàng</h6>
                        </div>
                        <div class="d-flex align-items-center align-self-start">
                            <h3 class="mb-0">{{ $total_order }}</h3>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Block 3 -->
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <div class="icon-box-danger">
                                <span class="mdi mdi-arrow-bottom-left icon-item"></span>
                            </div>
                            <h6 class="text-muted font-weight-normal">Người dùng</h6>
                        </div>
                        <div class="d-flex align-items-center align-self-start">
                            <h3 class="mb-0">{{ $total_user }}</h3>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Block 4 -->
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <div class="icon-box-success">
                                <span class="mdi mdi-arrow-top-right icon-item"></span>
                            </div>
                            <h6 class="text-muted font-weight-normal">Doanh thu</h6>
                        </div>
                        <div class="d-flex align-items-center align-self-start">
                            <h3 class="mb-0">{{ number_format($total_revenue, 0, ',', '.') }} VNĐ</h3>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Block 5 -->
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <div class="icon-box-danger">
                                <span class="mdi mdi-arrow-top-right icon-item"></span>
                            </div>
                            <h6 class="text-muted font-weight-normal">Đã giao</h6>
                        </div>
                        <div class="d-flex align-items-center align-self-start">
                            <h3 class="mb-0">{{$total_delivered}}</h3>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Block 6 -->
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <div class="icon-box-danger">
                                <span class="mdi mdi-arrow-bottom-left icon-item"></span>
                            </div>
                            <h6 class="text-muted font-weight-normal">Đang xử lý</h6>
                        </div>
                        <div class="d-flex align-items-center align-self-start">
                            <h3 class="mb-0">{{$total_processing}}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <!-- content-wrapper ends -->
    <!-- partial:partials/_footer.html -->
    <footer class="footer">
        <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © by CemeTeam
                2023</span>
        </div>
    </footer>
    <!-- partial -->
</div>
<!-- main-panel ends -->
</div>
<!-- page-body-wrapper ends -->
</div>