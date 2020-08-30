@extends('layout.master')





@section('header-content')
    <link rel="stylesheet" href="/assets/css/app.css">
    {{--    <link rel="stylesheet" href="/assets/css/sitesite.min.css">--}}
    <link rel="stylesheet" href="/assets/css/site.min.css">
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
                <div class="row">
                    <div class="col-md-12 ">

                        <?php //Hiển thị thông báo thành công?>
                        @if ( Session::has('success') )
                            <div class="alert alert-success alert-dismissible" role="alert">
                                <strong>{{ Session::get('success') }}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    <span class="sr-only">Close</span>
                                </button>
                            </div>
                        @endif
                        <?php //Hiển thị thông báo thành công?>
                        @if ( Session::has('delete_success') )
                            <div class="alert alert-success alert-dismissible" role="alert">
                                <strong>{{ Session::get('delete_success') }}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    <span class="sr-only">Close</span>
                                </button>
                            </div>
                        @endif
                    </div>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title" style="display:inline-block;">Quản lý loại tài khoản</h4>
                                <a type="button" name="add" id="add" class="btn btn-success pull-right"
                                   style="display: inline-block" href="/role/add">Thêm loại tài khoản
                                </a>
                            </div>
                            <div class="card-body">
                                <div class="card-block">
                                    <table class="table table-responsive-md-md text-center table-striped">
                                        <thead>
                                        <tr>
                                            <th>Loại tài khoản</th>
                                            <th>Quyền</th>
                                            <th>Tài khoản</th>
                                            <th>Hành động</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($roles as $role)
                                            <tr>
                                                <td>{{$role->name}}</td>
                                                <td>
                                                    @if(count($role->permissions)>0)
                                                        @foreach($role->permissions as $permission)
                                                            <span
                                                                class="badge badge-success">{{$permission->name}}</span>
                                                        @endforeach
                                                    @else
                                                        <span class="badge badge-danger">Không có quyền nào</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <ul>
                                                        @if(count($role->users)>0)
                                                            @foreach($role->users as $user)
                                                                <li class="badge badge-success">{{$user->name}}</li>
                                                            @endforeach
                                                        @else
                                                            <li class="badge badge-danger">Không có tài khoản nào</li>
                                                        @endif
                                                    </ul>
                                                </td>
                                                <td>
                                                    <a class="success p-0" data-original-title="" title=""
                                                       href="/role/edit/{{$role->id}}">
                                                        <i class="ft-edit-2 font-medium-3 mr-2"></i>
                                                    </a>
                                                    <a class="danger p-0 role_delete_button" data-original-title=""
                                                       title=""
                                                       data-id="{{$role->id}}">
                                                        <i class="ft-x font-medium-3 mr-2"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title" style="display:inline-block;">Quản lý quyền</h4>
{{--                                    @can('Quản lý quyền')--}}
                                    <a type="button" name="add" id="add" class="btn btn-success pull-right"
                                       style="display: inline-block" href="/permission/add">Thêm quyền
                                    </a>
{{--                                    @endcan--}}
                                </div>
                                <div class="card-body">
                                    <div class="card-block">
                                        <table class="table table-responsive-md-md text-center table-striped">
                                            <thead>
                                            <tr>
                                                <th>Quyền</th>
                                                <th>Loại tài khoản</th>
                                                <th>Tài khoản</th>
                                                @can('Quản lý quyền')
                                                <th>Hành động</th>
                                                @endcan
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($permissions as $permission)
                                                <tr>
                                                    <td>{{$permission->name}}</td>
                                                    <td>
                                                        @if(count($permission->roles)>0)
                                                            @foreach($permission->roles as $role)
                                                                <span class="badge badge-success">{{$role->name}}</span>
                                                            @endforeach
                                                        @else
                                                            <span
                                                                class="badge badge-danger">Không có loại tài khoản</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <ul>
                                                            {{--                                                            $users = User::permission($permission)->get();--}}
                                                            @if(count(\App\User::permission($permission)->get())>0)
                                                                @foreach(\App\User::permission($permission)->get() as $user)
                                                                    <li class="badge badge-success">{{$user->name}}</li>
                                                                @endforeach
                                                            @else
                                                                <li class="badge badge-danger">Không có tài khoản</li>
                                                            @endif
                                                        </ul>
                                                    </td>
                                                    @can('Quản lý quyền')

                                                    <td>
                                                        <a class="success p-0" data-original-title="" title=""
                                                           href="/permission/edit/{{$role->id}}">
                                                            <i class="ft-edit-2 font-medium-3 mr-2"></i>
                                                        </a>
                                                        <a class="danger p-0 permission_delete_button"
                                                           data-original-title="" title=""
                                                           data-id="{{$permission->id}}">
                                                            <i class="ft-x font-medium-3 mr-2"></i>
                                                        </a>
                                                    </td>
                                                    @endcan

                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
                    console.log("Hello " + id);
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
