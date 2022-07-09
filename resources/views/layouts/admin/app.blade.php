<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <title>Phòng Khám | @yield('title','Dashboard')</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{--{{asset('')}}home/img/logo.png--}}">
    @include('layouts.admin.base-css')
</head>
<body class="fixed-navbar has-animation fixed-layout" base_url={{url('')}}>
@guest
    @yield('content')
    <!-- CORE PLUGINS -->
    <script src="{{asset('')}}dash/assets/vendors/jquery/dist/jquery.min.js" type="text/javascript"></script>
    <script src="{{asset('')}}dash/assets/vendors/popper.js/dist/umd/popper.min.js" type="text/javascript"></script>
    <script src="{{asset('')}}dash/assets/vendors/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- PAGE LEVEL PLUGINS -->
    <script src="{{asset('')}}dash/assets/vendors/jquery-validation/dist/jquery.validate.min.js" type="text/javascript"></script>
    <!-- CORE SCRIPTS-->
    <script src="{{asset('')}}dash/assets/js/app.js" type="text/javascript"></script>
    <!-- PAGE LEVEL SCRIPTS-->
    <script type="text/javascript">
        $(function() {
            $('#login-form').validate({
                errorClass: "help-block",
                rules: {
                    email: {
                        required: true,
                        email: true
                    },
                    password: {
                        required: true
                    }
                },
                highlight: function(e) {
                    $(e).closest(".form-group").addClass("has-error")
                },
                unhighlight: function(e) {
                    $(e).closest(".form-group").removeClass("has-error")
                },
            });
        });
    </script>
@else
<div class="page-wrapper">
    <!-- START HEADER-->
@include('layouts.admin.header')
<!-- END HEADER-->
    <!-- START SIDEBAR-->
@include('layouts.admin.sidebar')
<!-- END SIDEBAR-->
    <div class="content-wrapper">
        <!-- START PAGE CONTENT-->
    @yield('content')
    <!-- END PAGE CONTENT-->
        @include('layouts.admin.footer')
    </div>
</div>
<!-- END THEME CONFIG PANEL-->
<!-- BEGIN PAGA BACKDROPS-->
<div class="sidenav-backdrop backdrop"></div>
<div class="preloader-backdrop">
    <div class="page-preloader">Loading</div>
</div>
<!-- END PAGA BACKDROPS-->
<!-- MODAL CHANGE PASSWORD-->
<div class="modal fade model_change_pass" id="model_change_pass" tabindex="-1" role="dialog" aria-labelledby="addBlog"
     aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Đổi mật khẩu admin</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('change_password')}}" method="POST">
            <div class="modal-body">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="row">
                        <div class="col-md-12 col-xs-12">
                            <div class="form-group">
                                <div class="form-group">
                                    <label>Mật khẩu hiện tại</label>
                                    <input type="password" name="old_pass" value="" required class="form-control"
                                           id="idold_pass" placeholder="Nhập mật khẩu hiện tại">
                                    @if(count($errors) > 0 && $errors->old_pass !='') <span
                                        class="text-danger">{{ $errors->first('old_pass') }} @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-xs-12">
                            <div class="form-group">
                                <label>Mật khẩu mới</label>
                                <input type="password" name="new_pass" value="" required class="form-control"
                                       id="idnew_pass" placeholder="Nhập mật khẩu mới">
                                @if(count($errors) > 0 && $errors->new_pass !='') <span
                                    class="text-danger">{{ $errors->first('new_pass') }} @endif
                            </div>
                        </div>
                        <div class="col-md-12 col-xs-12">
                            <div class="form-group">
                                <label>Xác nhận mật khẩu</label>
                                <input type="password" name="renew_pass" value="" required class="form-control"
                                       id="idrenew_pass" placeholder="Xác nhập mật khẩu mới">
                                @if(count($errors) > 0 && $errors->renew_pass !='') <span
                                    class="text-danger">{{ $errors->first('renew_pass') }} @endif
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-cursor-pointer" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary btn-cursor-pointer">Lưu Lại</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- END: MODAL CHANGE PASSWORD-->

<p id="thongbao" class="hidden">{{ session()->get( 'thongbao' ) }}</p>
@include('layouts.admin.base-js')
@endguest

<script>
    $(document).ready(function () {
        $("body").on("click", "#btn_change_password", function (e) {
            $("#model_change_pass").modal();
        });
    });
</script>

@if(session()->get( 'thongbao' ))
    <script>
        let mes = $('#thongbao').html();
        new PNotify({
            title: "Thông báo",
            text: mes,
            type: "success",
            delay: 1500
        });
    </script>
@endif

@yield('script_page')
</body>
</html>
