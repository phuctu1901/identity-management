@extends('layout.master')

@section('header-content')
    <link rel="stylesheet" href="/global/vendor/footable/footable.core.css">
    <link rel="stylesheet" href="/assets/examples/css/dashboard/analytics.css">
    <script src="https://js.pusher.com/5.0/pusher.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.css">


@show


@section('page')
    <div class="page">
        <div class="page-header">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
                <li class="breadcrumb-item"><a href="/did/list">Định danh</a></li>
                <li class="breadcrumb-item active">Tất cả định danh đã cấp </li>
            </ol>

        </div>

        <!-- Page Content -->
        <div class="page-content container-fluid">
            <div class="row" data-plugin="matchHeight" data-by-row="true">
                <div class="col-12" id="table_data">
                    <!-- Panel Accordion -->
                @include('did.table')

                <!-- End Panel Accordion -->
                </div>
            </div>
        </div>
        <!-- End Page Content -->
    </div>
@endsection
@section('scripts-content')
    <script src="/global/vendor/footable/footable.min.js"></script>
    <script src="/assets/examples/js/dashboard/analytics.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="/assets/js/qrcode.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.js"></script>
    <!-- Optional: include a polyfill for ES6 Promises for IE11 -->
    {{--    <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>--}}

    <script>
        $(document).ready(function(){

            $(document).on('click', '.pagination a', function(event){
                event.preventDefault();
                var page = $(this).attr('href').split('page=')[1];
                fetch_data(page);
            });

            function fetch_data(page)
            {
                $.ajax({
                    url:"/api/did/getDids?page="+page,
                    success:function(data)
                    {
                        $('#table_data').html(data);
                    }
                });
            }

        });
    </script>
@endsection
