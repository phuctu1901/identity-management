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

                            <div class="col-md-12 col-lg-5">
                                <div class="form-group d-flex justify-content-center">
                                    <div id="qrcode"></div>
                                </div>
                                <div class="d-flex justify-content-center">
                                    <div class="text-center">
                                        <button id="connection_check" class="btn btn-warning">Kiểm tra kết nối</button>
                                        <button id="issue_credential" class="btn btn-success">Cấp định danh</button>
                                        <button id="check_credential" class="btn btn-info">Kiểm tra trạng thái</button>
                                    </div>
                                </div>
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
    <script src="/global/vendor/footable/footable.min.js"></script>
    <script src="/assets/examples/js/dashboard/analytics.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="/assets/js/qrcode.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.js"></script>
    <!-- Optional: include a polyfill for ES6 Promises for IE11 -->
{{--    <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>--}}
    <script>
        $("#connection_check").prop("disabled", true);
        $("#issue_credential").prop("disabled", true);
        $("#check_credential").prop("disabled", true);
        $("#btn-submit").prop("disabled", true);


        $("#btn_check_id").click(function(event){
            event.preventDefault();
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

                    // $('#current_transaction').html(data);
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
                    document.getElementById("qrcode").innerHTML = "";
                    var qrcode = new QRCode(document.getElementById("qrcode"), {
                        text: inviationUrl,
                        width:320,
                        height: 320,
                        colorDark : "#000000",
                        colorLight : "#ffffff",
                        correctLevel : QRCode.CorrectLevel.L
                    });
                    $("#connection_check").data('button-data', {connectionId:connectionId})

                    $("#connection_check").prop("disabled", false);

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

        function getConnection(id){
            $.ajax({
                type: 'GET',
                // data: {code: code},
                url:"/api/connection/get/"+id,
                success:function(data)
                {
                    toastr.success('Lấy thông tin thành công')
                    var data = data.data
                    if(data.state === 'response'){
                        swal('Thành công', 'Đã kết nối đến người dân','success')
                        $("#issue_credential").prop("disabled", false);
                        // $("#connection_check").prop("disabled", false);

                    }
                    else if (data.state === 'invitation'){
                        swal('Đang đợi kết nối', 'Vui lòng kết nối','info')
                    }
                    console.log(data)
                },
                error: function (err) {
                    console.log(err)
                    toastr.error('Lỗi truy vấn thông tin')

                }
            });
        }

        function getCredentialStatus(id){
            $.ajax({
                type: 'GET',
                // data: {code: code},
                url:"/api/credential/get/"+id,
                success:function(data)
                {
                    toastr.success('Lấy thông tin thành công')
                    var data = data.data
                    if(data.state === 'credential_issued'){
                        swal('Thành công', 'Người dân đã lưu chứng chỉ','success')
                        // $("#issue_credential").prop("disabled", false);
                        // $("#connection_check").prop("disabled", false);

                    }
                    else if (data.state === 'offer_sent'){
                        swal('Đang đợi kết nối', 'Vui lòng lưu trên điện thoại','info')
                    }
                    console.log(data)
                },
                error: function (err) {
                    console.log(err)
                    toastr.error('Lỗi truy vấn thông tin')

                }
            });
        }


        $("#connection_check").click(function (event) {
            event.preventDefault();
            var connectionId = $("#connection_check").data('button-data').connectionId
            getConnection(connectionId);
        })

        $("#issue_credential").click(function (event) {
            event.preventDefault();
            var connectionId = $("#connection_check").data('button-data').connectionId
            var code = $("#input_code").val()
            issueCredential(connectionId, code)
        })

        $("#check_credential").click(function (event) {
            event.preventDefault();
            var cred_ex_id = $("#check_credential").data('button-data').cred_ex_id
            // var code = $("#input_code").val()

            getCredentialStatus(cred_ex_id)
        })


    </script>


@endsection
