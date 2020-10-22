@extends('guest.layout')

@section('body-content')
<div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Thông tin định danh</h2>
                    <h3 class="section-subheading text-muted">Điền thông tin định danh bạn mong muốn (Không cần là dữ liệu thật)</h3>
                </div>
    <div class="col-12">
        <div  class="card card-shadow card-md" style="margin-top: 30px;">
            <div class="card-block px-90 col-12">
                <div class="row">
                    <div class="col-md-12 col-lg-6">
                        <form id="citizen-info">
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label">Số định danh: </label>
                                <div class="col-md-9 input-group" >
                                    <input type="text" class="form-control" id="input_code" placeholder="Mã số công dân" autocomplete="off""/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label">Họ và tên: </label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" id="input_fullname" placeholder="Họ và tên đầy đủ" autocomplete="off" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label">Giới tính: </label>
                                <div class="col-md-9">
                                    <div class="radio-custom radio-default radio-inline">
                                        <input type="radio"  name="gender" id="male" value="Nam" checked/>
                                        <label for="inputHorizontalMale">Name</label>
                                        <input type="radio" name="gender" id="female" value="Nữ"/>
                                        <label for="inputHorizontalFemale">Nữ</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label">Ngày sinh: </label>
                                <div class="col-md-9">
                                    <input type="date" class="form-control" id="dob" placeholder=""
                                           autocomplete="off"  />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label">Địa chỉ thường trú: </label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" id="address" placeholder=""
                                           autocomplete="off" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-9">
                                    <button type="button"  id="btn-submit" class="btn btn-success">Gởi yêu cầu </button>
                                    <button type="reset" class="btn btn-warning btn-outline">Đặt lại</button>
                                </div>
                            </div>
                        </form>

                    </div>

                    <div class="col-md-6 col-lg-3">
                        <div class="form-group d-flex justify-content-center">
                            <div id="qrcode"></div>
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
@endsection
@section('script')
    <script>
        var connection_Id = '';
        $("#btn-submit").click(function(event){
            event.preventDefault();
            toastr.info('Đang lấy thông tin')
            const  code = $("#input_code").val()

            document.getElementById("qrcode").innerHTML = "";
            $('#logs-area').html('');

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
                    connection_Id = connectionId;

                    // $("#connection_check").prop("disabled", false);

                    // Echo.channel('quanlydinhdanh_channel_add_did_'+connectionId)
                    //     .listen('.App\\Events\\DID\\ConnectionCreatedEvent', e => {
                    $('#logs-area').append(`<div class="alert alert-info" role="alert">
                                       1. Khởi tạo kết nối
                                    </div>`);
                    // })

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
        function issueCredential(connectionId, code, name, gender, dob, address) {
            $.ajax({
                type: 'POST',
                data: {connectionId: connectionId, code:code, name: name, gender:gender, dob:dob, address:address},
                url:"/api/credential/issueforguest",
                success:function(data)
                {
                    toastr.success('Lấy thông tin thành công')
                    console.log(data)

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
            var connectionId = connection_Id;
            var code = $("#input_code").val()
            var name = $("#input_fullname").val()
            var gender = document.querySelector('input[name="gender"]:checked').value;
            var dob = $("#dob").val()
            var address = $("#address").val()
            issueCredential(connectionId, code, name, gender, dob, address);
            toastr.info('Đang tiến hành gởi thẻ định danh')
            // $('#logs-area').append(`<div class="alert alert-info" role="alert">
            //                            Đang gởi yêu cầu đến người dùng
            //                         </div>`);
        }
    </script>

@endsection
