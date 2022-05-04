@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">@lang('models/dashboards.header.index')</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                    <span class="info-box-icon bg-info elevation-1">
                        <i class="fas fa-users"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Users</span>
                        <span class="info-box-number">
                            {{$dashboardInfo['user_count']}}
                        </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-danger elevation-1">
                        <i class="fas fa-user-shield"></i>
                    </span>
                    <div class="info-box-content">
                        <span class="info-box-text">Roles</span>
                        <span class="info-box-number">
                            {{$dashboardInfo['user_count']}}
                        </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->

            <!-- fix for small devices only -->
            <div class="clearfix hidden-md-up"></div>

            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-success elevation-1">
                        <i class="fas fa-shield-alt"></i>
                    </span>

                    <div class="info-box-content">
                        <span class="info-box-text">Perrmisons</span>
                        <span class="info-box-number">
                            {{$dashboardInfo['permission_count']}}
                        </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-warning elevation-1">
                        <i class="fas fa-signal"></i>
                    </span>

                    <div class="info-box-content">
                        <span class="info-box-text">Online</span>
                        <span class="info-box-number" id="user_online">{{$dashboardInfo['user_online']}}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
        </div>
        {{--  --}}
        {{-- ROW33 --}}
        <div class="carousel-inner">

            <div class="item active">
                <div class="row">

                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <a href="./reporting/reports_main.php?Class=1&amp;REP_ID=201" target="_blank">
                            <div class="small-box bg-red">
                                <div class="inner">
                                    <img src="https://img.icons8.com/color/2x/invoice.png" style="margin-top: 8px;margin-left:9px;float: left;" width="33px" height="33px">
                                    <p style="font-size: 18px;margin-left: 38px;">Total Payable   </p>
                                    <p style="font-size: 18px;margin-left: 38px;color: white;margin-top:-14px;"> 11,354,793</p>

                                </div>
                                <div style="text-align: right;" class="small-box-footer">Previous Month : 11,359,703 &nbsp;&nbsp;&nbsp;</div>
                                <!--                                <a href="./gl/inquiry/profit_loss.php?" class="small-box-footer">View Month Detail <i class="fa fa-arrow-circle-right"></i></a>-->
                                <div class="icon">
                                    <i class="ion ion-calculator"></i>
                                </div>

                            </div>
                        </a>
                    </div>

                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <a href="./gl/inquiry/profit_loss.php?" target="_blank">
                            <div class="small-box bg-red">
                                <div class="inner">
                                    <img src="https://img.icons8.com/color-glass/48/000000/refund-2.png" style="margin-top: 8px;margin-left:9px;float: left;" width="23px" height="33px">
                                    <p style="font-size: 18px;margin-left: 38px;">Current Month Expense   </p>

                                    <p style="font-size: 18px;margin-left: 38px;color: white;margin-top:-14px;"> 19,991,363</p>

                                </div>
                                <div style="text-align: right;" class="small-box-footer">Previous Month : 22,001,209 &nbsp;&nbsp;&nbsp;</div>
                                <!--                                <a href="./gl/inquiry/profit_loss.php?" class="small-box-footer">View Month Detail <i class="fa fa-arrow-circle-right"></i></a>-->
                                <div class="icon">
                                    <i class="ion ion-calculator"></i>
                                </div>

                            </div>
                        </a>
                    </div>

                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <a href="./gl/inquiry/profit_loss.php?" target="_blank">
                            <div class="small-box bg-yellow">
                                <div class="inner">
                                    <img src="https://img.icons8.com/color-glass/48/000000/debt.png" style="margin-top: 8px;margin-left:9px;float: left;" width="23px" height="33px"><p style="font-size: 18px;margin-left: 38px;">Net Loss </p>                                        <p style="font-size: 18px;color: white;margin-top:-14px; "> -20,037,521 / 43,411%</p>
                                </div>

                                <div style="text-align: right;" class="small-box-footer">Previous Month : -22,001,209 / 0% &nbsp;&nbsp;&nbsp;</div>
                                <!--                                <a href="./gl/inquiry/profit_loss.php?" class="small-box-footer">View Month Detail <i class="fa fa-arrow-circle-right"></i></a>-->
                                <div class="icon">
                                    <i style="" class="fa fa-line-chart"></i>

                                    <!--                                    <img src="./themes/premium/images/if_Stock Index Up_27881.png" height="60px" width="46px" style="margin-top: 30px;" >-->
                                    <!--                                      <i class="fa fa-arrow-circle-up" style="margin-top:15px;"></i>-->
                                </div>
                            </div>
                        </a>
                    </div>


                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <a href="./gl/inquiry/balance_sheet.php?" target="_blank">
                            <div class="small-box bg-green">
                                <div class="inner">
                                    <img src="https://img.icons8.com/color/48/000000/cash-in-hand.png" style="margin-top: 8px;margin-left:9px;float: left;" width="23px" height="33px"><p style="font-size:18px;">Capital</p>                                        <p style="font-size: 18px;color: white;margin-top:-14px;margin-left:8px; ">
                                        -7,630,071 / -324,467,008 </p>

                                    <p style="font-size:12px;">  </p>
                                </div>
                                <div style="text-align: right;" class="small-box-footer">Previous Month : -7,630,071 / -304,429,487 &nbsp;&nbsp;&nbsp;</div>
                                <!--                                <a href="./gl/inquiry/profit_loss.php?" class="small-box-footer">View Month Detail <i class="fa fa-arrow-circle-right"></i></a>-->
                                <div class="icon">
                                    <i style="" class="fa fa-percent"></i>
                                </div>
                            </div>
                        </a>
                    </div>
                </div><!--.row-->
            </div><!--.item-->



            </div><!--.carousel-inner-->
            <a data-slide="next" href="#Carousel" class="right carousel-control"><i class="fa fa-angle-right"></i></a>
            <a data-slide="prev" href="#Carousel" class="left carousel-control"><i class="fa  fa-angle-left"></i></a>
        </div>
        {{-- ROW33 --}}

        {{--  --}}
        <div class="cover-inner-content mt-lg-4">
            <div class="cover-top-pannel">
                <div class="row">
                    <div class="col-md-5">
                        <div class="card">
                            <div class="card-body">
                                <div class="section-title">
                                    <h5>Order Status</h5>
                                </div>
                                <div class="cover-chart">
                                    <div id="chart1"></div>
                                    <div class="cart-points-name">
                                        <ul>
                                            <li>Delivered</li>
                                            <li>Pending</li>
                                            <li>Cancel</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="admin-info">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <i class="uil uil-shopping-bag"></i>
                                            <h4 class="font-weight-600">50</h4>
                                            <p>Tody Order</p>
                                            <p><span class="success-text"><svg width="21" height="15" viewBox="0 0 21 15"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M0.999939 13.5C1.91791 12.4157 4.89722 9.22772 6.49994 7.5L12.4999 10.5L19.4999 1.5"
                                                            stroke="#2BC155" stroke-width="2"></path>
                                                        <path
                                                            d="M6.49994 7.5C4.89722 9.22772 1.91791 12.4157 0.999939 13.5H19.4999V1.5L12.4999 10.5L6.49994 7.5Z"
                                                            fill="url(#paint0_linear)"></path>
                                                        <defs>
                                                            <linearGradient id="paint0_linear" x1="10.2499" y1="3"
                                                                x2="10.9999" y2="13.5" gradientUnits="userSpaceOnUse">
                                                                <stop offset="0" stop-color="#2BC155" stop-opacity="0.73">
                                                                </stop>
                                                                <stop offset="1" stop-color="#2BC155" stop-opacity="0">
                                                                </stop>
                                                            </linearGradient>
                                                        </defs>
                                                    </svg> 2%</span> than last month</p>
                                            <!-- <ul>
                                                <li>
                                                    <a href="#">Read More</a>
                                                </li>
                                            </ul> -->
                                        </div>
                                    </div>
                                </div>
                                <!-- 2 -->
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <i class="uil uil-users-alt"></i>
                                            <div class="d-flex align-items-center">
                                                <h4 class="font-weight-600">3k </h4>
                                            </div>
                                            <p>Total Customer</p>
                                            <p><span class="text-danger"><svg width="21" height="15" viewBox="0 0 21 15"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M14.3514 7.5C15.9974 9.37169 19.0572 12.8253 20 14H1V1L8.18919 10.75L14.3514 7.5Z"
                                                            fill="url(#paint0_linear1)"></path>
                                                        <path
                                                            d="M19.5 13.5C18.582 12.4157 15.6027 9.22772 14 7.5L8 10.5L1 1.5"
                                                            stroke="#FF2E2E" stroke-width="2" stroke-linecap="round"></path>
                                                        <defs>
                                                            <linearGradient id="paint0_linear1" x1="10.5" y1="2.625"
                                                                x2="9.64345" y2="13.9935" gradientUnits="userSpaceOnUse">
                                                                <stop offset="0" stop-color="#FF2E2E"></stop>
                                                                <stop offset="1" stop-color="#FF2E2E" stop-opacity="0.03">
                                                                </stop>
                                                            </linearGradient>
                                                        </defs>
                                                    </svg> -0.5%</span> than last month</p>

                                            <!-- <ul>
                                                <li>
                                                    <a href="#">Read More</a>
                                                </li>
                                            </ul> -->
                                        </div>
                                    </div>
                                </div>
                                <!-- 3 -->
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <i class="uil uil-money-withdraw"></i>
                                            <div class="d-flex align-items-center">
                                                <h4 class="font-weight-600">20k </h4><span
                                                    class="ms-1"><small>RS</small></span>
                                            </div>
                                            <p>Total Revenue</p>
                                            <p><span class="success-text"><svg width="21" height="15" viewBox="0 0 21 15"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M0.999939 13.5C1.91791 12.4157 4.89722 9.22772 6.49994 7.5L12.4999 10.5L19.4999 1.5"
                                                            stroke="#2BC155" stroke-width="2"></path>
                                                        <path
                                                            d="M6.49994 7.5C4.89722 9.22772 1.91791 12.4157 0.999939 13.5H19.4999V1.5L12.4999 10.5L6.49994 7.5Z"
                                                            fill="url(#paint0_linear)"></path>
                                                        <defs>
                                                            <linearGradient id="paint0_linear" x1="10.2499" y1="3"
                                                                x2="10.9999" y2="13.5" gradientUnits="userSpaceOnUse">
                                                                <stop offset="0" stop-color="#2BC155" stop-opacity="0.73">
                                                                </stop>
                                                                <stop offset="1" stop-color="#2BC155" stop-opacity="0">
                                                                </stop>
                                                            </linearGradient>
                                                        </defs>
                                                    </svg> 5%</span> than last month</p>
                                            <!-- <ul>
                                                <li>
                                                    <a href="#">Read More</a>
                                                </li>
                                            </ul> -->
                                        </div>
                                    </div>
                                </div>
                                <!-- 4 -->
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <i class="uil uil-truck"></i>
                                            <div class="d-flex align-items-center">
                                                <h4 class="font-weight-600">2k </h4>
                                            </div>
                                            <p>Order Delivered</p>
                                            <p><span class="success-text"><svg width="21" height="15" viewBox="0 0 21 15"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M0.999939 13.5C1.91791 12.4157 4.89722 9.22772 6.49994 7.5L12.4999 10.5L19.4999 1.5"
                                                            stroke="#2BC155" stroke-width="2"></path>
                                                        <path
                                                            d="M6.49994 7.5C4.89722 9.22772 1.91791 12.4157 0.999939 13.5H19.4999V1.5L12.4999 10.5L6.49994 7.5Z"
                                                            fill="url(#paint0_linear)"></path>
                                                        <defs>
                                                            <linearGradient id="paint0_linear" x1="10.2499" y1="3"
                                                                x2="10.9999" y2="13.5" gradientUnits="userSpaceOnUse">
                                                                <stop offset="0" stop-color="#2BC155" stop-opacity="0.73">
                                                                </stop>
                                                                <stop offset="1" stop-color="#2BC155" stop-opacity="0">
                                                                </stop>
                                                            </linearGradient>
                                                        </defs>
                                                    </svg> 0.8%</span> than last month</p>
                                            <!-- <ul>
                                                <li>
                                                    <a href="#">Read More</a>
                                                </li>
                                            </ul> -->
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="section-title">
                                    <h5>Todays Orders</h5>
                                </div>
                                <div class="cover-datatable">
                                    <div class="cover-extra-elements">
                                        <div class="search-bar">
                                            <form action="">
                                                <div class="form-group position-relative mb-0 ">
                                                    <div class=" dataTables_filter">
                                                        <input type="search" class="form-control"
                                                            placeholder="Search Categories" id="custom-filter">
                                                        <i class="fa fa-search"></i>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="cover-table">
                                        <table id="custom_listing"
                                            class="table table-bordered dt-responsive table-align-middle"
                                            style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>Order ID</th>
                                                    <th>Address</th>
                                                    <th>Order Date</th>
                                                    <th>Delivery Date</th>

                                                    <th>Order Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>#1011</td>
                                                    <td>4567 West Drive Chicago illinois, 8908</td>
                                                    <td>Sep-12-2021</td>
                                                    <td>Sep-20-2021</td>
                                                    <td>
                                                        <div class="active-status">
                                                            <p>Delivered</p>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="cover-table-btn">
                                                            <ul>
                                                                <li class="dropdown position-relative">
                                                                    <a href="#" class="dropdown-toggle caret-none"
                                                                        data-bs-toggle="dropdown" role="button"
                                                                        id="navbarDropdown" aria-expanded="false"><i
                                                                            class="bi bi-three-dots"></i></a>
                                                                    <ul class="dropdown-menu dropdown-menu-end"
                                                                        aria-labelledby="navbarDropdown">
                                                                        <li>
                                                                            <a href="order-detail.php"
                                                                                class="dropdown-item">Details</a>
                                                                        </li>

                                                                        <!-- <li>
                                                                    <a href="#" class="dropdown-item delete">Delete</a>
                                                                </li> -->

                                                                    </ul>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>#1011</td>
                                                    <td>4567 West Drive Chicago illinois, 8908</td>
                                                    <td>Sep-12-2021</td>
                                                    <td>Sep-20-2021</td>
                                                    <td>
                                                        <div class="active-status">
                                                            <p>Delivered</p>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="cover-table-btn">
                                                            <ul>
                                                                <li class="dropdown position-relative">
                                                                    <a href="#" class="dropdown-toggle caret-none"
                                                                        data-bs-toggle="dropdown" role="button"
                                                                        id="navbarDropdown" aria-expanded="false"><i
                                                                            class="bi bi-three-dots"></i></a>
                                                                    <ul class="dropdown-menu dropdown-menu-end"
                                                                        aria-labelledby="navbarDropdown">
                                                                        <li>
                                                                            <a href="order-detail.php"
                                                                                class="dropdown-item">Details</a>
                                                                        </li>

                                                                        <!-- <li>
                                                                    <a href="#" class="dropdown-item delete">Delete</a>
                                                                </li> -->

                                                                    </ul>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>#1011</td>
                                                    <td>4567 West Drive Chicago illinois, 8908</td>
                                                    <td>Sep-12-2021</td>
                                                    <td>Sep-20-2021</td>
                                                    <td>
                                                        <div class="pending-status">
                                                            <p>Pending</p>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="cover-table-btn">
                                                            <ul>
                                                                <li class="dropdown position-relative">
                                                                    <a href="#" class="dropdown-toggle caret-none"
                                                                        data-bs-toggle="dropdown" role="button"
                                                                        id="navbarDropdown" aria-expanded="false"><i
                                                                            class="bi bi-three-dots"></i></a>
                                                                    <ul class="dropdown-menu dropdown-menu-end"
                                                                        aria-labelledby="navbarDropdown">
                                                                        <li>
                                                                            <a href="order-detail.php"
                                                                                class="dropdown-item">Details</a>
                                                                        </li>

                                                                        <!-- <li>
                                                                    <a href="#" class="dropdown-item delete">Delete</a>
                                                                </li> -->

                                                                    </ul>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{--  --}}

        <!-- /.row -->

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">User checkin/out</h5>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <div class="btn-group">
                                <button type="button" class="btn btn-tool dropdown-toggle" data-toggle="dropdown">
                                    <i class="fas fa-wrench"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right" role="menu">
                                    <a href="#" class="dropdown-item">Action</a>
                                    <a href="#" class="dropdown-item">Another action</a>
                                    <a href="#" class="dropdown-item">Something else here</a>
                                    <a class="dropdown-divider"></a>
                                    <a href="#" class="dropdown-item">Separated link</a>
                                </div>
                            </div>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <canvas id="userCheckinChart" height="315" style="height: 180px; display: block; width: 462px;" width="808" class="chartjs-render-monitor"></canvas>
                        <!-- /.row -->
                    </div>
                    <!-- ./card-body -->
                    <div class="card-footer">
                    </div>
                    <!-- /.card-footer -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!--/. container-fluid -->
</section>

<!-- /.content -->
@endsection

@push('third_party_scripts')
<!-- ChartJS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.0/chart.min.js" integrity="sha512-asxKqQghC1oBShyhiBwA+YgotaSYKxGP1rcSYTDrB0U6DxwlJjU59B67U8+5/++uFjcuVM8Hh5cokLjZlhm3Vg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endpush
@push('page_scripts')

<script>
var userCheckinChart = new Chart(document.getElementById('userCheckinChart').getContext('2d'), @json($chartUserCheckin));
</script>
<script>
    window.Promise ||
        document.write(
            '<script src="https://cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.min.js"><\/script>'
        )
    window.Promise ||
        document.write(
            '<script src="https://cdn.jsdelivr.net/npm/eligrey-classlist-js-polyfill@1.2.20171210/classList.min.js"><\/script>'
        )
    window.Promise ||
        document.write(
            '<script src="https://cdn.jsdelivr.net/npm/findindex_polyfill_mdn"><\/script>'
        )
    </script>


    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    <script>
    var options = {
        series: [44, 55, 13],
        chart: {
            width: 380,
            height: '250px',
            type: 'donut',
        },
        dataLabels: {
            enabled: false
        },
        responsive: [{
            breakpoint: 480,
            options: {
                chart: {
                    width: 200
                },
                legend: {
                    show: false
                }
            }
        }],
        legend: {
            show: false,
            position: 'bottom',
            horizontalAlign: 'center',
            offsetY: 0,

        },


    };

    var chart = new ApexCharts(document.querySelector("#chart1"), options);
    chart.render();


    function appendData() {
        var arr = chart.w.globals.series.slice()
        arr.push(Math.floor(Math.random() * (100 - 1 + 1)) + 1)
        return arr;
    }

    function removeData() {
        var arr = chart.w.globals.series.slice()
        arr.pop()
        return arr;
    }

    function randomize() {
        return chart.w.globals.series.map(function() {
            return Math.floor(Math.random() * (100 - 1 + 1)) + 1
        })
    }

    function reset() {
        return options.series
    }

    // document.querySelector("#randomize").addEventListener("click", function() {
    //     chart.updateSeries(randomize())
    // })

    // document.querySelector("#add").addEventListener("click", function() {
    //     chart.updateSeries(appendData())
    // })

    // document.querySelector("#remove").addEventListener("click", function() {
    //     chart.updateSeries(removeData())
    // })

    // document.querySelector("#reset").addEventListener("click", function() {
    //     chart.updateSeries(reset())
    // })
    </script>

@endpush
