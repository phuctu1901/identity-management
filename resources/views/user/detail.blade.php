@extends('layout.master')
@section('header-content')

    <link rel="stylesheet" href="/assets/css/app.css">

    <meta name="csrf-token" value="{{ csrf_token() }}">
    <!-- <link href="{{ mix('css/app.css') }}" rel="stylesheet"> -->

@show
@section('page')
    <div class="page">
        <!-- <div id="app">
            <example-component></example-component>
        </div> -->

        <script src="{{ mix('js/app.js') }}"></script>
        <!-- Page Content -->
        <div class="page-content container-fluid">
            <section id="horizontal-form-layouts">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title" id="horz-layout-basic">Chi tiết tài khoản</h4>
                            </div>
                            <div class="card-body">
                                <div class="px-3">

                                    <form class="form form-horizontal">
                                        <div class="form-body">

                                            <h4 class="form-section"><i class="ft-user"></i> Thông tin tài khoản</h4>
                                            <div class="form-group row">
                                                <label class="col-md-3 label-control">Mã số: </label>
                                                <div class="col-md-9">
                                                    <input  class="form-control"
                                                           type="text"
                                                           name="user_id" value="{{$user->id}}">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-md-3 label-control">Họ và tên: </label>
                                                <div class="col-md-9">
                                                    <input  class="form-control"
                                                           type="text"
                                                           name="name" value="{{$user->name}}">
                                                </div>
                                            </div>


                                            <div class="form-group row">
                                                <label class="col-md-3 label-control">Tên đăng nhập:</label>
                                                <div class="col-md-9">
                                                    <input  class="form-control"
                                                            type="text"
                                                            name="username" value="{{$user->username}}">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-md-3 label-control">Email: </label>
                                                <div class="col-md-9">
                                                    <input id="slider_link" class="form-control"
                                                           type="text"
                                                           name="email" value="{{$user->email}}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-3 label-control">Thời gian tạo tài khoản: </label>
                                                <div class="col-md-9">
                                                    <input id="slider_link" class="form-control"
                                                           type="datetime-local"
                                                           name="email" value="{{$user->created_at}}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-3 label-control">Thời gian cập nhật: </label>
                                                <div class="col-md-9">
                                                    <input id="slider_link" class="form-control"
                                                           type="datetime-local"
                                                           name="email" value="{{$user->updated_at}}">
                                                </div>
                                            </div>




{{--                                            <div class="form-group row">--}}
{{--                                                <label class="col-md-3 label-control">Trạng thái: </label>--}}
{{--                                                <div class="col-md-9">--}}

{{--                                                    <select id="isActive" name="isActive"--}}
{{--                                                            class="form-control">--}}
{{--                                                        <option value="0" selected="" disabled="">Chọn trạng thái cho--}}
{{--                                                            danh--}}
{{--                                                            mục--}}
{{--                                                        </option>--}}
{{--                                                        <option value=0>Không kích hoạt</option>--}}
{{--                                                        <option value=1>Kích hoạt</option>--}}
{{--                                                    </select>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}


                                        </div>


                                        <div class="form-actions">
                                            <a href="/user" type="button" class="btn btn-raised btn-warning mr-1">
                                                <i class="ft-arrow-left"></i> Trở lại
                                            </a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- // Basic form layout section end -->

        </div>
    </div>
    <script>
        var msg = '{{Session::get('
    alert ')}}';
        var exist = '{{Session::has('
    alert ')}}';
        if (exist) {
            alert(msg);
        }
    </script>

     <script type='text/javascript' src='/asset-admin/vendors/js/core/jquery-3.2.1.min.js'></script>
    <script type='text/javascript' src='/client/asset/js/jquery-migrate.min.js'></script>
    <script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>


    <script>


        jQuery(function ($) {
            var options = {
                filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
                filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
                filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
                filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
            };


        });
    </script>
    <script src="/vendor/laravel-filemanager/js/lfm.js"></script>
    <script>

        jQuery(function ($) {





            $(document).ready(function () {

                $('#isActive').val({{$user->isActive}});


            });
        });
    </script>
@endsection
