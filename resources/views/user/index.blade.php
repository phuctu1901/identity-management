@extends('layout.master')
@section('header-content')
    <link rel="stylesheet" href="/assets/css/app.css">
    {{--    <link rel="stylesheet" href="/assets/css/sitesite.min.css">--}}
    <link rel="stylesheet" href="/assets/css/site.min.css">
    <meta name="csrf-token" value="{{ csrf_token() }}">
    <!-- <link href="{{ mix('css/app.css') }}" rel="stylesheet"> -->
{{--    <link rel="stylesheet" type="text/css" href="/assets/fonts/font-awesome/css/font-awesome.min.css">--}}
    <link rel="stylesheet" type="text/css" href="/assets/fonts/feather/style.min.css">
    <link rel="stylesheet" type="text/css" href="/assets/fonts/simple-line-icons/style.css">
    <link rel="stylesheet" type="text/css" href="/assets/fonts/font-awesome/css/font-awesome.min.css">
{{--    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">--}}
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
                <div class="row">

                    <div class="col-sm-12">
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
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title" style="display:inline-block;">Quản lý người dùng</h4>
                                <a type="button" name="add" id="add" class="btn btn-success pull-right"
                                   style="display: inline-block" href="/user/add">Thêm người dùng
                                </a>
                            </div>
                            <div class="card-body">
                                <div class="card-block">
                                    <table class="table table-responsive-md-md text-center table-striped">
                                        <thead>
                                        <tr>
                                            <th>Tên đăng nhập</th>
                                            <th>Tên người dùng</th>
                                            <th>Email</th>
                                            <th>Loại tài khoản</th>

                                            {{--                                                <th>Tổng số lượng tour</th>--}}
                                            <th>Trạng thái</th>
                                            <th>Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($users as  $user)
                                            <tr>

                                                <td>{{$user->username}}</td>
                                                <td>{{$user->name}}</td>
                                                <td>{{$user->email}}</td>
                                                <td>
                                                    @if(count($user->roles)>0)
                                                        @foreach($user->roles as $roles)
                                                            <span class="badge badge-info">{{$roles->name}}</span>
                                                        @endforeach
                                                    @else
                                                        <span class="badge badge-danger">Chưa phân loại</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if(Cache::has('user-is-online-' . $user->id) and (int) $user->logout !== 1)
                                                        <span class="text-success">Online</span>
                                                    @else
                                                        <span class="text-secondary">Offline</span>
                                                    @endif
                                                    <span class="badge badge-table @if($user->isActive) badge-success  @else badge-danger @endif"> @if($user->isActive) Kích hoạt  @else Khóa @endif</span>
                                                </td>
                                                <td>
                                                    <a class="info p-0" data-original-title="" title=""  href="/user/detail/{{$user->id}}">
                                                        <i class="ft-info font-medium-3 mr-2"></i>
                                                    </a>
                                                    <a class="success p-0" data-original-title="" title=""  href="/user/edit/{{$user->id}}">
                                                        <i class="ft-edit-2 font-medium-3 mr-2"></i>
                                                    </a>
                                                    <a class="danger p-0" data-original-title="" title="" href="/user/delete/{{$user->id}}">
                                                        <i class="ft-x font-medium-3 mr-2"></i>
                                                    </a>
                                                    <a class="danger p-0" data-original-title="" title="" href="/user/logout/{{$user->id}}">
                                                        <i class="fa fa-sign-out font-medium-3 mr-2"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                            <nav aria-label="Page navigation">
                                <ul class="pagination justify-content-center">
                                    {{ $users->links() }}
                                </ul>
                            </nav>
                    </div>
                </div>
            </section>
            <!--Extended Table Ends-->
        </div>
    </div>

@endsection
@section('scripts-content')
    <style>
        .table a{
            text-decoration: unset;
        }
    </style>
@endsection
