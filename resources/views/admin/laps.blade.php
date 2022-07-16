@section('title')
    Thông tin
@endsection
@extends('layouts.admin.app')
@section('style_page')
    <link href="{{asset('')}}dash/assets/vendors/summernote/dist/summernote.css" rel="stylesheet" />
@endsection
@section('content')
    <div class="page-content fade-in-up">
        <div class="ibox">
            <div class="ibox-head">
                <div class="ibox-title">Thông tin phòng khám</div>
            </div>
            <div class="ibox-body">
                <div class="ibox">
                    <div class="ibox-body">
                        <form class="form-horizontal" action="{{route('laps.update')}}" method="POST" enctype="multipart/form-data" id="form_update_config">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Tên phòng khám:</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="laps_name" type="text" value="{{ old('laps_name', $lap->laps_name ?? '') }}" placeholder="Nhập tên phòng khám...">
                                </div>
                                @if(count($errors) > 0 && $errors->laps_name !='')
                                    <span class="text-danger">{{ $errors->first('laps_name') }}</span>
                                @endif
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Số điện thoại:</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="laps_phone" type="text" value="{{old('laps_phone', $lap->laps_phone ?? '')}}" placeholder="Nhập số điện thoại...">
                                </div>
                                @if(count($errors) > 0 && $errors->laps_phone !='')
                                    <span class="text-danger">{{ $errors->first('laps_phone') }}</span>
                                @endif
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Địa chỉ:</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="laps_address" type="text" value="{{old('laps_address', $lap->laps_address ?? '')}}" placeholder="Nhập địa chỉ..">
                                </div>
                                @if(count($errors) > 0 && $errors->laps_address !='')
                                    <span class="text-danger">{{ $errors->first('laps_address') }}</span>
                                @endif
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Email:</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="laps_mail" type="text" value="{{old('laps_mail', $lap->laps_mail ?? '')}}" placeholder="Nhập email...">
                                </div>
                                @if(count($errors) > 0 && $errors->laps_mail !='')
                                    <span class="text-danger">{{ $errors->first('laps_mail') }}</span>
                                @endif
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Mô tả:</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" name="laps_note" placeholder="Nhập mô tả...">{{old('laps_note', $lap->laps_note ?? '')}}</textarea>
                                </div>
                                @if(count($errors) > 0 && $errors->laps_note !='')
                                    <span class="text-danger">{{ $errors->first('laps_note') }}</span>
                                @endif
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-10 ml-sm-auto">
                                    <button class="btn btn-info" type="submit">Lưu Lại</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script_page')
    <script src="{{asset('')}}dash/assets/vendors/summernote/dist/summernote.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        // init editor
        $(function () {
            $("#summernote").summernote({
                placeholder: "Nhập nội trang giới thiệu...",
                tabsize: 2,
                height: 250,
                focus: true,
            });
        });
    </script>
@endsection
