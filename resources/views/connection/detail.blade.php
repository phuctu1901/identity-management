@extends('layout.master')

@section('header-content')
    <link rel="stylesheet" href="/assets/css/site.min.css">
@show


@section('page')
    <div class="page">
        <div class="page-header">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
                <li class="breadcrumb-item"><a href="/connection/list">Kết nối</a></li>
                <li class="breadcrumb-item active">Chi tiết kết nối</li>
            </ol>

        </div>

        <!-- Page Content -->
        <div class="page-content container-fluid">
            <div class="row" data-plugin="matchHeight" data-by-row="true">

                <div class="col-6">
                    <div class="panel panel-bordered">
                        <div class="panel-body">
                            <div class="transaction-detail">
                                <table class="table table-borderless">
                                    <tr>
                                        <td>Mã kết nối</td>
                                        <td>{{$data->id}}</td>
                                    </tr>
                                    <tr>
                                        <td>Invitation Key</td>
                                        <td>{{$data->invitation_key}}  </td>
                                    </tr>
                                    <tr>
                                        <td>Invitation Mode</td>
                                        <td>{{$data->invitation_mode}}  </td>
                                    </tr>
                                    <tr>
                                        <td>Initiator</td>
                                        <td>{{$data->initiator}}  </td>
                                    </tr>
                                    <tr>
                                        <td>Invitation Key</td>
                                        <td>{{$data->invitation_key}}  </td>
                                    </tr>
                                    <tr>
                                        <td>State</td>
                                        <td>{{$data->state}}  </td>
                                    </tr>
                                    <tr>
                                        <td>Created At</td>
                                        <td>{{$data->created_at}}  </td>
                                    </tr>
                                    <tr>
                                        <td>Updated At</td>
                                        <td>{{$data->updated_at}}  </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="panel panel-bordered">
                        <div class="panel-body">
                            <div class="transaction-detail">
                                <table class="table table-borderless">
                                    <tr>
                                        <td>Their Label</td>
                                        <td>{{$data->their_label}}  </td>
                                    </tr>
                                    <tr>
                                        <td>Their DID</td>
                                        <td>{{$data->their_did}}  </td>
                                    </tr>
                                    <tr>
                                        <td>My DID</td>
                                        <td>{{$data->my_did}}  </td>
                                    </tr>
                                    <tr>
                                        <td>Invitation Key</td>
                                        <td>{{$data->invitation_key}}  </td>
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
