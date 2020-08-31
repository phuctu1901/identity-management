@extends('layout.master')





@section('header-content')
    <meta name="csrf-token" value="{{ csrf_token() }}">
    <!-- <link href="{{ mix('css/app.css') }}" rel="stylesheet"> -->
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.css">
    {{--<style type="text/css" href=""></style>--}}
@show
@section('page')
    <div class="page">
        <div class="page-header">
            <h1 class="page-title">TỔNG QUAN</h1>
        </div>
        <!-- <div id="app">
            <example-component></example-component>
        </div> -->

        <script src="{{ mix('js/app.js') }}"></script>
        <!-- Page Content -->
        <div class="page-content container-fluid">
            <section id="extended">
                <form class="form form-horizontal"
                      action="{{url('/permission/addRequest')}} "
                      method="POST" role="form" enctype="multipart/form-data">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-6">
                                @csrf
                                <div class="card">
                                    <div class="card-header"><h3>Tên quyền</h3></div>
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <div class="col-md-9">
                                                <input id="name" class="form-control"
                                                       type="text"
                                                       name="name">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <button type="button" class="btn btn-raised btn-warning mr-1">
                            <i class="ft-x"></i> Reset
                        </button>
                        <button type="submit" class="btn btn-raised btn-primary">
                            <i class="fa fa-check-square-o"></i> Save
                        </button>
                    </div>
                </form>
            </section>
            <!--Extended Table Ends-->
        </div>
    </div>
@endsection
@section('scripts-content')
    <script src="/assets/examples/js/dashboard/analytics.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.js"
            type="text/javascript"></script>

    <script>
        $(document).on('click', '.role_delete_button', function (e) {
            e.preventDefault();
            var id = $(this).data('id');
            swal({
                    title: "Xác nhận bạn muốn xóa?",
                    type: "error",
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "XÓA",
                    cancelButtonText: "HỦY",
                    showCancelButton: true,
                },
                function () {
                    $.ajax({
                        type: "POST",
                        url: "/role/delete",

                        data: {
                            "id": id,
                            "_token": "{{ csrf_token() }}"
                        },
                        success: function (data) {
                            console.log("Đã xóa thành công")
                            location.reload();
                        },

                    });
                });
        });
    </script>

    <style>
        .card-header{
            background-color: #3e8ef7;
        }
        .card-title{
            color: white;
            font-weight: 1.2px;
        }
    </style>

@show
