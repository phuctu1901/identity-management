@extends('layout.master')

@section('header-content')
    <link rel="stylesheet" href="/assets/examples/css/dashboard/analytics.css">
    <meta name="csrf-token" value="{{ csrf_token() }}">
    <!-- <link href="{{ mix('css/app.css') }}" rel="stylesheet"> -->

@show
@section('page')
    <div class="page">
        <div class="page-header">
            <h1 class="page-title">Overview</h1>
        </div>
        <!-- <div id="app">
            <example-component></example-component>
        </div> -->

        <script src="{{ mix('js/app.js') }}"></script>
        <!-- Page Content -->
        <div class="page-content container-fluid">
            <div class="row" data-plugin="matchHeight" data-by-row="true">
                <div class="col-12">
                    <!-- Product Overview Card -->
                    <div id="productOverviewWidget" class="card card-shadow card-md">
                        <!-- The Header Of First Card -->
                        <div class="card-header card-header-transparent py-20">
                            <div class="btn-group dropdown">
                                <a href="#" class="text-body dropdown-toggle blue-grey-700 text-uppercase" data-toggle="dropdown">Vehicle</a>
                                <div class="dropdown-menu animate" role="menu">
                                    <a class="dropdown-item" href="#" role="menuitem">Sales</a>
                                    <a class="dropdown-item" href="#" role="menuitem">Total sales</a>
                                    <a class="dropdown-item" href="#" role="menuitem">Profit</a>
                                </div>
                            </div>
                            <div class="card-header-actions">
                                <ul class="nav nav-pills nav-pills-rounded product-filters">
                                    <li class="nav-item">
                                        <a class="active nav-link" href="#scoreLineToDay" data-toggle="tab">Day</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#scoreLineToWeek" data-toggle="tab">Week</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#scoreLineToMonth" data-toggle="tab">Month</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- End The Header Of First Card -->

                        <!-- The Content Of First Card -->
                        <div class="card-block p-20">
                            <div class="tab-content">
                                <div class="ct-chart tab-pane active" id="scoreLineToDay"></div>
                                <div class="ct-chart tab-pane" id="scoreLineToWeek"></div>
                                <div class="ct-chart tab-pane" id="scoreLineToMonth"></div>
                            </div>
                            <div id="productOptionsData" class="text-center">
                                <div class="row no-space">
                                    <!-- The First Counter Block-->
                                    <div class="col-xl-3 col-md-6">
                                        <div class="counter">
                                            <div class="counter-label">Vist</div>
                                            <div class="counter-number-group text-truncate">
                                                <span class="counter-number-related red-600">+</span>
                                                <span class="counter-number">681</span>
                                            </div>
                                            <div class="ct-chart" data-counter-type="productVist"></div>
                                        </div>
                                    </div>
                                    <!-- End The First Counter Block-->

                                    <!-- The Second Counter Block-->
                                    <div class="col-xl-3 col-md-6">
                                        <div class="counter">
                                            <div class="counter-label">Unique Vistors</div>
                                            <div class="counter-number-group text-truncate">
                                                <span class="counter-number-related green-600">-</span>
                                                <span class="counter-number">522</span>
                                            </div>
                                            <div class="ct-chart" data-counter-type="productVistors"></div>
                                        </div>
                                    </div>
                                    <!-- End The Second Counter Block-->

                                    <!-- The Third Counter Block-->
                                    <div class="col-xl-3 col-md-6">
                                        <div class="counter">
                                            <div class="counter-label">Page Views</div>
                                            <div class="counter-number-group text-truncate">
                                                <span class="counter-number-related green-600">-</span>
                                                <span class="counter-number">1,622</span>
                                            </div>
                                            <div class="ct-chart" data-counter-type="productPageViews"></div>
                                        </div>
                                    </div>
                                    <!-- End The Third Counter Block-->

                                    <!-- The fourth Counter Block-->
                                    <div class="col-xl-3 col-md-6">
                                        <div class="counter">
                                            <div class="counter-label">Bounce Rate</div>
                                            <div class="counter-number-group text-truncate">
                                                <span class="counter-number-related red-600">+</span>
                                                <span class="counter-number">843</span>
                                            </div>
                                            <div class="ct-chart" data-counter-type="productBounceRate"></div>
                                        </div>
                                    </div>
                                    <!-- End The fourth Counter Block-->
                                </div>
                            </div>
                        </div>
                        <!-- End The Content Of First Card -->
                    </div>
                    <!-- End Product Overview Card -->
                </div>

                <div class="col-xl-7 col-12">
                    <!-- Browser Flow Card -->
                    <div id="browsersFlowWidget" class="card card-shadow card-md">
                        <div class="card-header card-header-transparent pb-15">
                            <p class="font-size-14 blue-grey-700 mb-0">BROWSER FLOW</p>
                        </div>
                        <div class="card-block px-30">
                            <div class="row">
                                <div class="col-md-6">
                                    <!-- Browsers Vists Table -->
                                    <table class="table table-analytics mb-0">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Browser</th>
                                            <th>Vists</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>
                                                <img src="/assets/examples/images/browser/chrome-logo.png" title="Chrome"
                                                     alt="Chrome">
                                            </td>
                                            <td>
                                                Chrome
                                            </td>
                                            <td>
                                                11,976
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <img src="/assets/examples/images/browser/firefox-logo.png" title="Firefox"
                                                     alt="Firefox">
                                            </td>
                                            <td>
                                                Firefox
                                            </td>
                                            <td>
                                                1,706
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <img src="/assets/examples/images/browser/safari-logo.png" title="Safari"
                                                     alt="Safari">
                                            </td>
                                            <td>
                                                Safari
                                            </td>
                                            <td>
                                                1,677
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <img src="/assets/examples/images/browser/internet-logo.png" title="Internet"
                                                     alt="Internet">
                                            </td>
                                            <td>
                                                Internet
                                            </td>
                                            <td>
                                                1,268
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <img src="/assets/examples/images/browser/opera-logo.png" title="Opera" alt="Opera">
                                            </td>
                                            <td>
                                                Opera
                                            </td>
                                            <td>
                                                915
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <!-- End Browsers Vists Table -->
                                </div>
                                <div class="col-md-6 px-0">
                                    <!-- MorrisDonut -->
                                    <div id="browersVistsDonut"></div>
                                    <!-- End MorrisDonut -->
                                    <!-- Stacked BarChart -->
                                    <div id="weekStackedBarChart"></div>
                                    <!--End Stacked BarChart -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Browser Flow Card -->
                </div>

                <div class="col-xl-5 col-12">
                    <!-- Countries Vists Card -->
                    <div id="countriesVistsWidget" class="card card-shadow card-md">
                        <div class="card-header card-header-transparent pb-15">
                            <p class="font-size-14 blue-grey-700 mb-0">VISTS IN DIFFERENT COUNTRIES</p>
                        </div>
                        <div class="card-block px-30 pt-0">
                            <div class="table-responsive">
                                <table class="table table-analytics mb-0 text-nowrap">
                                    <thead>
                                    <tr>
                                        <th class="language">Language</th>
                                        <th class="vists">Vists</th>
                                        <th class="vists-percent">%Vists</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>
                                            <img src="/assets/examples/images/country/usa-icon.png" title="USA" alt="USA">
                                            <span class="country-name">U.S.A</span>
                                        </td>
                                        <td>12,924</td>
                                        <td>
                                            <div class="progress progress-xs mb-0">
                                                <div class="progress-bar progress-bar-info bg-blue-600" style="width: 90%" aria-valuemax="100"
                                                     aria-valuemin="0" aria-valuenow="90" role="progressbar">
                                                </div>
                                            </div>
                                            <span class="progress-percent">90%
                          </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img src="/assets/examples/images/country/uk-icon.png" title="UK" alt="UK">
                                            <span class="country-name">U.K</span>
                                        </td>
                                        <td>11,246</td>
                                        <td>
                                            <div class="progress progress-xs mb-0">
                                                <div class="progress-bar progress-bar-info bg-blue-600" style="width: 86%" aria-valuemax="100"
                                                     aria-valuemin="0" aria-valuenow="86" role="progressbar">
                                                </div>
                                            </div>
                                            <span class="progress-percent">86%
                          </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img src="/assets/examples/images/country/canada-icon.png" title="Canada"
                                                 alt="Canada">
                                            <span class="country-name">Canada</span>
                                        </td>
                                        <td>10,468</td>
                                        <td>
                                            <div class="progress progress-xs mb-0">
                                                <div class="progress-bar progress-bar-info bg-blue-600" style="width: 68%" aria-valuemax="100"
                                                     aria-valuemin="0" aria-valuenow="68" role="progressbar">
                                                </div>
                                            </div>
                                            <span class="progress-percent">68%
                          </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img src="/assets/examples/images/country/germany-icon.png" title="Germany"
                                                 alt="GermanyGermany">
                                            <span class="country-name">Germany</span>
                                        </td>
                                        <td>8,246</td>
                                        <td>
                                            <div class="progress progress-xs mb-0">
                                                <div class="progress-bar progress-bar-info bg-blue-600" style="width: 56%" aria-valuemax="100"
                                                     aria-valuemin="0" aria-valuenow="56" role="progressbar">
                                                </div>
                                            </div>
                                            <span class="progress-percent">56%
                          </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img src="/assets/examples/images/country/china-icon.png" title="China" alt="China">
                                            <span class="country-name">China</span>
                                        </td>
                                        <td>4,354</td>
                                        <td>
                                            <div class="progress progress-xs mb-0">
                                                <div class="progress-bar progress-bar-info bg-blue-600" style="width: 38%" aria-valuemax="100"
                                                     aria-valuemin="0" aria-valuenow="38" role="progressbar">
                                                </div>
                                            </div>
                                            <span class="progress-percent">38%
                          </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img src="/assets/examples/images/country/australia-icon.png" title="Australia"
                                                 alt="Australia">
                                            <span class="country-name">Australia</span>
                                        </td>
                                        <td>3,675</td>
                                        <td>
                                            <div class="progress progress-xs mb-0">
                                                <div class="progress-bar progress-bar-info bg-blue-600" style="width: 25%" aria-valuemax="100"
                                                     aria-valuemin="0" aria-valuenow="25" role="progressbar">
                                                </div>
                                            </div>
                                            <span class="progress-percent">25%
                          </span>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- End Countries Vists Card -->
                </div>
            </div>
        </div>
        <!-- End Page Content -->
    </div>
@endsection
@section('scripts-content')
    <script src="/assets/examples/js/dashboard/analytics.js"></script>

@show
