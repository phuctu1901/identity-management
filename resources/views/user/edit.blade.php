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
            <section id="extended">
                <form class="form form-horizontal"
                      action="{{url('/user/editRequest')}} "
                      method="POST" role="form" enctype="multipart/form-data">
                <div class="form-body">
                    <div class="row">
                        <div class="col-md-6">
                            @csrf
                            <div class="card">
                                <input type="hidden" id="id" name="id" value="{{$user->id}}">
                                <div class="card-header"><h3>Thông tin tài khoản</h3></div>
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control">Họ và tên: </label>
                                        <div class="col-md-9">
                                            <input id="name" class="form-control"
                                                   type="text"
                                                   name="name" value="{{$user->name}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control">Tên đăng nhập: </label>
                                        <div class="col-md-9">
                                            <input id="username" class="form-control"
                                                   type="text"
                                                   name="username" value="{{$user->username}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control">Email: </label>
                                        <div class="col-md-9">
                                            <input id="slider_title" class="form-control"
                                                   type="email"
                                                   name="email" value="{{$user->email}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header"><strong><h3>Vai trò</h3></strong></div>
                                <div class="card-body">
                                    <div class="survey-radio">
                                        <ul>
                                            @foreach($roles as $role)
                                                <div class="survey-radio-success col-md-12">
                                                    <input type="checkbox"
                                                           id="role_{{$role->id}}"
                                                           name="roles[]"
                                                           value="{{$role->id}}" @if($user->roles->contains($role)) checked @endif/>
                                                    <label
                                                        for="role_{{$role->id}}">{{$role->name}}</label>
                                                </div>
                                            @endforeach
                                        </ul>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div> <div class="form-actions">
                        <button type="button" class="btn btn-raised btn-warning mr-1">
                            <i class="ft-x"></i> Reset
                        </button>
                        <button type="submit" class="btn btn-raised btn-primary">
                            <i class="fa fa-check-square-o"></i> Save
                        </button>
                    </div>
                </form>
            </section>
            <!-- // Basic form layout section end -->

        </div>
    </div>
    <style>
        .survey-radio div {
            clear: both;
            overflow: hidden;
        }

        .survey-radio label {
            width: 100%;
            border-radius: 3px;
            border: 1px solid #D1D3D4;
            font-weight: normal;
        }

        .survey-radio input[type="radio"]:empty,
        .survey-radio input[type="checkbox"]:empty {
            display: none;
        }

        .survey-radio input[type="radio"]:empty ~ label,
        .survey-radio input[type="checkbox"]:empty ~ label {
            position: relative;
            line-height: 2.5em;
            text-indent: 3.25em;
            margin-top: 2em;
            cursor: pointer;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        .survey-radio input[type="radio"]:empty ~ label:before,
        .survey-radio input[type="checkbox"]:empty ~ label:before {
            position: absolute;
            display: block;
            top: 0;
            bottom: 0;
            left: 0;
            content: '';
            width: 2.5em;
            background: #D1D3D4;
            border-radius: 3px 0 0 3px;
        }

        .survey-radio input[type="radio"]:hover:not(:checked) ~ label,
        .survey-radio input[type="checkbox"]:hover:not(:checked) ~ label {
            color: #888;
        }

        .survey-radio input[type="radio"]:hover:not(:checked) ~ label:before,
        .survey-radio input[type="checkbox"]:hover:not(:checked) ~ label:before {
            content: '\2714';
            text-indent: .9em;
            color: #C2C2C2;
        }

        .survey-radio input[type="radio"]:checked ~ label,
        .survey-radio input[type="checkbox"]:checked ~ label {
            color: #777;
        }

        .survey-radio input[type="radio"]:checked ~ label:before,
        .survey-radio input[type="checkbox"]:checked ~ label:before {
            content: '\2714';
            text-indent: .9em;
            color: #333;
            background-color: #ccc;
        }

        .survey-radio input[type="radio"]:focus ~ label:before,
        .survey-radio input[type="checkbox"]:focus ~ label:before {
            box-shadow: 0 0 0 3px #999;
        }

        .survey-radio-default input[type="radio"]:checked ~ label:before,
        .survey-radio-default input[type="checkbox"]:checked ~ label:before {
            color: #333;
            background-color: #ccc;
        }

        .survey-radio-primary input[type="radio"]:checked ~ label:before,
        .survey-radio-primary input[type="checkbox"]:checked ~ label:before {
            color: #fff;
            background-color: #337ab7;
        }

        .survey-radio-success input[type="radio"]:checked ~ label:before,
        .survey-radio-success input[type="checkbox"]:checked ~ label:before {
            color: #fff;
            background-color: #5cb85c;
        }

        .survey-radio-danger input[type="radio"]:checked ~ label:before,
        .survey-radio-danger input[type="checkbox"]:checked ~ label:before {
            color: #fff;
            background-color: #d9534f;
        }

        .survey-radio-warning input[type="radio"]:checked ~ label:before,
        .survey-radio-warning input[type="checkbox"]:checked ~ label:before {
            color: #fff;
            background-color: #f0ad4e;
        }

        .survey-radio-info input[type="radio"]:checked ~ label:before,
        .survey-radio-info input[type="checkbox"]:checked ~ label:before {
            color: #fff;
            background-color: #5bc0de;
        }

    </style>

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
@endsection
