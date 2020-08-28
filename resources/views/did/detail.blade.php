@extends('layout.master')

@section('header-content')
    <link rel="stylesheet" href="/assets/css/site.min.css">
@show


@section('page')
    <div class="page">
        <div class="page-header">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
                <li class="breadcrumb-item"><a href="/did/list">Định danh</a></li>
                <li class="breadcrumb-item active">Chi tiết định  danh</li>
            </ol>

        </div>

        <!-- Page Content -->
        <div class="page-content container-fluid">
            <div class="row" data-plugin="matchHeight" data-by-row="true">

                <div class="col-6">
                    <div class="panel panel-bordered">
                        <div class="panel-heading">
                            <h3 class="panel-title">Thông tin cá nhân</h3>
                        </div>
                        <div class="panel-body">
                            <div class="transaction-detail">
                                <table class="table table-borderless">
                                    <tr>
                                        <td>Họ và tên</td>
                                        <td>{{$pii->fullname}}</td>
                                    </tr>
                                    <tr>
                                        <td>Mã số</td>
                                        <td>{{$pii->code}}  </td>
                                    </tr>
                                    <tr>
                                        <td>Giới tính</td>
                                        @if($pii->gender == 1)
                                        <td>Nam</td>
                                            @else
                                            <td>Nữ</td>
                                        @endif
                                    </tr>
                                    <tr>
                                        <td>Ngày sinh</td>
                                        <td>{{$pii->dob}}</td>
                                    </tr>
                                    <tr>
                                        <td>Địa chỉ</td>
                                        <td>{{$pii->address}}</td>
                                    </tr>
                                    {{--                                    <tr>--}}
                                    {{--                                        <td>Status</td>--}}
                                    {{--                                        <td>--}}
                                    {{--                                            <span class="badge badge-table @if($bot->isActive===1) badge-success @else badge-danger @endif"> @if($bot->isActive===1) Active @else Closed @endif</span>--}}
                                    {{--                                            --}}{{--                    <span class="badge badge-table badge-danger">Suspended</span>--}}
                                    {{--                                        </td>--}}
                                    {{--                                    </tr>--}}
                                    {{--                                    @if($bot->isActive !== 1 )--}}
                                    {{--                                        <tr>--}}
                                    {{--                                            <td>Closed day</td>--}}
                                    {{--                                            <td>{{$bot->action_day}}</td>--}}
                                    {{--                                        </tr>--}}
                                    {{--                                    @endif--}}

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="panel panel-bordered">
                        <div class="panel-heading">
                            <h3 class="panel-title">Thông tin cấp định danh</h3>
                        </div>
                        <div class="panel-body">
                            <div class="transaction-detail">
                                <table class="table table-borderless">
                                    <tr>
                                        <td>Code</td>
                                        <td>{{$info->code}}</td>
                                    </tr>
                                    <tr>
                                        <td>Their DID</td>
                                        <td>{{$info->their_did}}  </td>
                                    </tr>
                                    <tr>
                                        <td>Start day</td>
                                        <td>{{$info->cred_ex_id}}</td>
                                    </tr>
                                    <tr>
                                        <td>Investment</td>
                                        <td>{{$info->created_at}}</td>
                                    </tr>
                                    <tr>
                                        <td>Current</td>
                                        <td>{{$info->updated_at}}</td>
                                    </tr>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Page Content -->
    </div>
@endsection
@section('scripts-content')

    <!-- Optional: include a polyfill for ES6 Promises for IE11 -->
    {{--    <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>--}}

@endsection
