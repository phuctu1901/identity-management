@extends('layout.master')

@section('header-content')
{{--    <script src="https://js.pusher.com/5.0/pusher.min.js"></script>--}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.css">
<link rel="stylesheet" type="text/css" href="/assets/fonts/feather/style.min.css">


@show

@section('page')
    <div class="page">
        <div class="page-header">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
                <li class="breadcrumb-item"><a href="/did/all">Định danh</a></li>
                <li class="breadcrumb-item active">Cấp định danh</li>

            </ol>

        </div>

        <!-- Page Content -->
        <div class="page-content container-fluid">
            <div class="row" data-plugin="matchHeight" data-by-row="true">

                <div class="col-12">
                    <div  class="card card-shadow card-md" style="margin-top: 30px;">
                        <div class="card-header card-header-transparent pb-15">
                            <p class="font-size-20 black mb-0 text-uppercase">Thông tin định danh</p>
                        </div>
                        <div class="card-block px-90 col-12">
                            <div class="row">
                            <div class="col-md-12 col-lg-6">
                            <form id="citizen-info">
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label">Số định danh: </label>
                                        <div class="col-md-9 input-group" >
                                            <input type="text" class="form-control" id="input_code" placeholder="Mã số công dân" autocomplete="off" />
                                            <span class="input-group-btn">
                                                <button class="btn btn-info" name="btn_check_id"  id="btn_check_id"> Kiểm tra</button>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label">Họ và tên: </label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" id="input_fullname" placeholder="Họ và tên đầy đủ" autocomplete="off" disabled/>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <legend class="col-md-3 col-form-legend">Giới tính: </legend>
                                        <div class="col-md-9">
                                            <div class="radio-custom radio-default radio-inline">
                                                <input type="radio"  name="gender" id="male" disabled/>
                                                <label for="inputHorizontalMale">Name</label>
                                            </div>
                                            <div class="radio-custom radio-default radio-inline">
                                                <input type="radio" name="gender" id="female"  disabled
                                                />
                                                <label for="inputHorizontalFemale">Nữ</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label">Ngày sinh: </label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" id="dob" placeholder=""
                                                   autocomplete="off"  disabled/>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label">Địa chỉ thường trú: </label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" id="address" placeholder=""
                                                   autocomplete="off" disabled/>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-9">
                                            <button type="button"  id="btn-submit" class="btn btn-primary">Gởi yêu cầu </button>
                                            <button type="reset" class="btn btn-warning btn-outline">Đặt lại</button>
                                        </div>
                                    </div>
                                </form>

                            </div>

                            <div class="col-md-6 col-lg-3">
                                <div class="form-group d-flex justify-content-center">
                                    <div id="qrcode"></div>
                                </div>
                                <div class="d-flex justify-content-center" style="display: none!important;">
                                    <div class="text-center">
                                        <button id="connection_check" class="btn btn-warning">Kiểm tra kết nối</button>
                                        <button id="issue_credential" class="btn btn-success">Cấp định danh</button>
                                        <button id="check_credential" class="btn btn-info">Kiểm tra trạng thái</button>
                                    </div>
                                </div>
                            </div>
                                <div class="col-md-6 col-lg-3" id="logs-area">


                                </div>
                            </div>


                        </div>
                    </div>
                    <!-- Panel Accordion -->

                    <!-- End Panel Accordion -->
                </div>
            </div>
        </div>
        <!-- End Page Content -->
    </div>
@endsection
@section('scripts-content')

    <style>
        body{
            color:unset!important;
        }
        .form-control{
            color: black;

            font-weight: 400;

            font-size: 18px;
        }
    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="/assets/js/qrcode.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.js"></script>
    <script src="{{ asset('/js/app.js') }}"></script>

    <!-- Optional: include a polyfill for ES6 Promises for IE11 -->
{{--    <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>--}}
    <script>
        $("#connection_check").prop("disabled", true);
        $("#issue_credential").prop("disabled", true);
        $("#check_credential").prop("disabled", true);
        $("#btn-submit").prop("disabled", true);


        $("#btn_check_id").click(function(event){
            event.preventDefault();
            document.getElementById("qrcode").innerHTML = "";
            $('#logs-area').html('');
            var code = $("#input_code").val()
            console.log(code)
            $('#citizen-info').trigger("reset");
            $("#input_code").val(code)
            $.ajax({
                type: 'POST',
                data: {code: code},
                url:"/api/citizen/getbyid",
                success:function(data)
                {
                    toastr.success('Lấy thông tin thành công')
                    console.log(data.data)
                    $("#input_fullname").val(data.data.fullname)
                    if (data.data.gender === 0){
                        $("#female").attr('checked', true);
                    }else{
                        $("#male").attr('checked', true);
                    }
                    $("#dob").val(data.data.dob)
                    $("#address").val(data.data.address)
                    $("#btn-submit").prop("disabled", false);


                },
                error: function (err) {
                    console.log(err)
                    toastr.error('Lỗi truy vấn thông tin')

                }
            });

        });

        $("#btn-submit").click(function(event){
            event.preventDefault();
            toastr.info('Đang lấy thông tin')
            const  code = $("#input_code").val()

            $.ajax({
                type: 'GET',
                // data: {code: code},
                url:"/api/connection/create",
                success:function(data)
                {
                    toastr.success('Lấy thông tin thành công')
                    var data = data.data
                    var inviationUrl = data.invitation_url
                    var connectionId = data.connection_id
                    console.log(connectionId)
                    var qrcode = new QRCode(document.getElementById("qrcode"), {
                        text: inviationUrl,
                        width:320,
                        height: 320,
                        colorDark : "#000000",
                        colorLight : "#ffffff",
                        correctLevel : QRCode.CorrectLevel.L
                    });
                    $("#connection_check").data('button-data', {connectionId:connectionId})

                    // $("#connection_check").prop("disabled", false);
                    console.log("khoi tao lang nghe su kien tao ket noi");

                    Echo.channel('quanlydinhdanh_channel_add_did_'+connectionId)
                        .listen('.App\\Events\\DID\\ConnectionCreatedEvent', e => {
                            $('#logs-area').append(`<div class="alert alert-info" role="alert">
                                       1. Khởi tạo kết nối
                                    </div>`);
                        })

                    Echo.channel('quanlydinhdanh_channel_add_did_'+connectionId)
                        .listen('.App\\Events\\DID\\ConnectionResponsedEvent', e => {
                            connected_event(connectionId)
                            // swal('Thành công', '','success')
                        })

                    Echo.channel('quanlydinhdanh_channel_add_did_'+connectionId)
                        .listen('.App\\Events\\DID\\OfferSentEvent', e => {
                            $('#logs-area').append(`<div class="alert alert-info" role="alert">
                                       3. Đã gởi đề nghị tới người dùng                                    </div>`);
                        })

                    Echo.channel('quanlydinhdanh_channel_add_did_'+connectionId)
                        .listen('.App\\Events\\DID\\RequestReceivedEvent', e => {
                            $('#logs-area').append(`<div class="alert alert-info" role="alert">
                                       4. Người nhận đã nhận đề nghị                                    </div>`);
                        })

                    Echo.channel('quanlydinhdanh_channel_add_did_'+connectionId)
                        .listen('.App\\Events\\DID\\IssuedCredentialEvent', e => {
                            // connected_event(connectionId)
                            // console.log('hello world')
                            swal('Thành công', 'Người dùng đã lưu chứng chỉ số','success')
                            $('#logs-area').append(`<div class="alert alert-success" role="alert">
                                       5. Đã cấp định danh             </div>`);
                        })

                },
                error: function (err) {
                    console.log(err)
                    toastr.error('Lỗi truy vấn thông tin')

                }
            });



        });
        function issueCredential(connectionId, code) {
            $.ajax({
                type: 'POST',
                data: {connectionId: connectionId, code:code},
                url:"/api/credential/issue",
                success:function(data)
                {
                    toastr.success('Lấy thông tin thành công')
                    console.log(data)
                    $("#check_credential").data('button-data', {cred_ex_id: data.data.credential_exchange_id})
                    $("#check_credential").prop("disabled", false);

                },
                error: function (err) {
                    console.log(err)
                    toastr.error('Lỗi truy vấn thông tin')

                }
            });
        }

        function connected_event(connectionId){
            // toastr.success('Người dùng đã chấp nhận kết nối')
            $('#logs-area').append(`<div class="alert alert-info" role="alert">
                                       2. Người dùng đã kết nối
                                    </div>`);
            var connectionId = $("#connection_check").data('button-data').connectionId
            var code = $("#input_code").val()
            issueCredential(connectionId, code)
            toastr.info('Đang tiến hành gởi thẻ định danh')
            // $('#logs-area').append(`<div class="alert alert-info" role="alert">
            //                            Đang gởi yêu cầu đến người dùng
            //                         </div>`);
        }
    </script>


@endsection
