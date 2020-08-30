@extends('layout.master')

@section('header-content')
    <link rel="stylesheet" href="/assets/css/site.min.css">

    <meta name="csrf-token" value="{{ csrf_token() }}">
    <!-- <link href="{{ mix('css/app.css') }}" rel="stylesheet"> -->

@show
@section('page')
    <div class="page">
{{--        <div class="page-header">--}}
{{--            <h1 class="page-title">TỔNG QUAN</h1>--}}
{{--        </div>--}}
        <!-- <div id="app">
            <example-component></example-component>
        </div> -->

        <script src="{{ mix('js/app.js') }}"></script>
        <!-- Page Content -->
        <div class="page-content container-fluid">
            <div class="row" data-plugin="matchHeight" data-by-row="true">
                <div class="row">
                    <!-- First Row -->
                    <div class="col-xl-3 col-md-6 info-panel">
                        <div class="card card-shadow">
                            <div class="card-block bg-white p-20">
                                <button type="button" class="btn btn-floating btn-sm btn-warning">
                                    <i class="icon wb-shopping-cart"></i>
                                </button>
                                <span class="ml-15 font-weight-400">Kết nối</span>
                                <div class="content-text text-center mb-0">
                                    <i class="text-danger icon wb-triangle-up font-size-20">
                                    </i>
                                    <span class="font-size-40 font-weight-100">399</span>
                                    <p class="blue-grey-400 font-weight-100 m-0">+45% From previous month</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 info-panel">
                        <div class="card card-shadow">
                            <div class="card-block bg-white p-20">
                                <button type="button" class="btn btn-floating btn-sm btn-danger">
                                    <i class="icon fa-dollar"></i>
                                </button>
                                <span class="ml-15 font-weight-400">Chứng chỉ số</span>
                                <div class="content-text text-center mb-0">
                                    <i class="text-success icon wb-triangle-down font-size-20">
                                    </i>
                                    <span class="font-size-40 font-weight-100">$18,628</span>
                                    <p class="blue-grey-400 font-weight-100 m-0">+45% From previous month</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 info-panel">
                        <div class="card card-shadow">
                            <div class="card-block bg-white p-20">
                                <button type="button" class="btn btn-floating btn-sm btn-success">
                                    <i class="icon wb-eye"></i>
                                </button>
                                <span class="ml-15 font-weight-400">Đang chờ người dùng nhận</span>
                                <div class="content-text text-center mb-0">
                                    <i class="text-danger icon wb-triangle-up font-size-20">
                                    </i>
                                    <span class="font-size-40 font-weight-100">23,456</span>
                                    <p class="blue-grey-400 font-weight-100 m-0">+25% From previous month</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 info-panel">
                        <div class="card card-shadow">
                            <div class="card-block bg-white p-20">
                                <button type="button" class="btn btn-floating btn-sm btn-primary">
                                    <i class="icon wb-user"></i>
                                </button>
                                <span class="ml-15 font-weight-400"></span>
                                <div class="content-text text-center mb-0">
                                    <i class="text-danger icon wb-triangle-up font-size-20">
                                    </i>
                                    <span class="font-size-40 font-weight-100">4,367</span>
                                    <p class="blue-grey-400 font-weight-100 m-0">+25% From previous month</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12" id="ecommerceRecentOrder">
                        <div class="card card-shadow table-row">
                            <div class="card-header card-header-transparent py-20">
                                RECENT ORDER
                            </div>
                            <div class="card-block bg-white table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Product</th>
                                        <th>Customer</th>
                                        <th>Purchased On</th>
                                        <th>Status</th>
                                        <th>Tracking No#</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>
                                            <img src="../../assets/examples/images/products/imac.png"
                                                 alt="iMac" />
                                        </td>
                                        <td>iMac</td>
                                        <td>Russell</td>
                                        <td>22/08/2018</td>
                                        <td>
                                            <span class="badge badge-success font-weight-100">Paid</span>
                                        </td>
                                        <td>#98BC85SD84</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img src="../../assets/examples/images/products/iphone.png"
                                                 alt="iPhone" />
                                        </td>
                                        <td>iPhone</td>
                                        <td>Carol</td>
                                        <td>15/07/2018</td>
                                        <td>
                                            <span class="badge badge-warning font-weight-100">Pending</span>
                                        </td>
                                        <td>#98SA3C9SC</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img src="../../assets/examples/images/products/applewatch.png"
                                                 alt="apple_watch" />
                                        </td>
                                        <td>apple Watch</td>
                                        <td>Austin Pena</td>
                                        <td>10/07/2018</td>
                                        <td>
                                            <span class="badge badge-success font-weight-100">Paid</span>
                                        </td>
                                        <td>#98BC85SD84</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img src="../../assets/examples/images/products/macmouse.png"
                                                 alt="mac_mouse" />
                                        </td>
                                        <td>mac Mouse</td>
                                        <td>Randy</td>
                                        <td>22/04/2018</td>
                                        <td>
                                            <span class="badge badge-default font-weight-100">Failed</span>
                                        </td>
                                        <td>#98SA3C9SC</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- End Third Left -->

                    <!-- Third Right -->
                    <!-- End Third Right -->
                    <!-- End Third Row -->
                </div>
                <!--Statistics cards Ends-->
            </div>
        </div>
        <!-- End Page Content -->
    </div>
@endsection
