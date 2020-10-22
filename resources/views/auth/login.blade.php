<!DOCTYPE html>
<html lang="en">
<head>
    <title>Đăng nhập | Hệ thống quản lý định danh số uID</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="/login-assets/images/icons/favicon.ico"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" src="/login-assets/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/login-assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/login-assets/fonts/iconic/css/material-design-iconic-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" src="/login-assets/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" src="/login-assets/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" src="/login-assets/vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" src="/login-assets/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" src="/login-assets/vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/login-assets/css/util.css">
    <link rel="stylesheet" type="text/css" href="/login-assets/css/main.css">
    <!--===============================================================================================-->
</head>
<body>

<div class="limiter">

    <div class="container-login100" style="background-image: url('/login-assets/images/bg-01.jpg');">

        <div class="wrap-login100">
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
            <?php //Hiển thị thông báo lỗi?>
            @if ( Session::has('error') )
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <strong>{{ Session::get('error') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                </div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                </div>
            @endif
            <form role="form" class="login100-form validate-form" action="{{ route('login') }}" method="POST">
                {!! csrf_field() !!}

                <div class="login100-form-logo"><img src="/assets/images/Hanoi_Logo.png" width="60%" height="65%"></div>


                <span class="login100-form-title p-b-34 p-t-27" tyle="font-size:25px; font-family: unset;">
                       HỆ THỐNG CẤP ĐỊNH DANH SỐ
					</span>

                <div class="wrap-input100 validate-input">
                    <input class="input100" id="email" type="email" name="email" placeholder="Email"
                           value="{{ old('username') ?: old('email') }}" required autofocus>

                    <span class="focus-input100" data-placeholder="&#xf207;"></span>
                    <div class="form-group row">
                        @if ($errors->has('username') || $errors->has('email'))
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        @endif
                    </div>
                </div>


                <div class="wrap-input100 validate-input" data-validate="Enter password">
                    <input class="input100" type="password" name="password" placeholder="Mật khẩu">
                    <span class="focus-input100" data-placeholder="&#xf191;"></span>
                </div>
                <div class="form-group row">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>

                <div class="contact100-form-checkbox">
                    <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember"
                           id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="label-checkbox100" for="ckb1">
                        Ghi nhớ đăng nhập
                    </label>
                </div>

                <div class="container-login100-form-btn">
                    <button type="submit" class="login100-form-btn">
                        Đăng nhập
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>


<div id="dropDownSelect1"></div>

<!--===============================================================================================-->
<script src="/login-assets/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="/login-assets/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
<script src="/login-assets/vendor/bootstrap/js/popper.js"></script>
<script src="/login-assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="/login-assets/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
<script src="/login-assets/vendor/daterangepicker/moment.min.js"></script>
<script src="/login-assets/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
<script src="/login-assets/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
<script src="/login-assets/js/main.js"></script>

</body>
</html>
