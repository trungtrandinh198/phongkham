<div class="modal fade model_edit_customer" id="model_edit" tabindex="-1" role="dialog" aria-labelledby="editProduct" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Chỉnh sửa khách hàng</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('customers.update')}}" method="POST" enctype="multipart/form-data" >
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="id" id="e_id" value="{{ csrf_token() }}">
                    @method('PATCH')
                    <div class="row">
                        <div class="col-md-9">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="message-text" class="col-form-label">Tên sản khách hàng:</label>
                                        <input class="form-control" id="e_laps_cus_name" name="laps_cus_name" required value="{{ old('laps_cus_name') }}">
                                        @if(count($errors) > 0 && $errors->laps_cus_name !='')
                                            <span class="text-danger">{{ $errors->first('laps_cus_name') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="message-text" class="col-form-label">Địa chỉ:</label>
                                        <input class="form-control" id="e_laps_cus_address" name="laps_cus_address" type="text" required value="{{ old('laps_cus_address') }}">
                                        @if(count($errors) > 0 && $errors->laps_cus_address !='')
                                            <span class="text-danger">{{ $errors->first('laps_cus_address') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="message-text" class="col-form-label">Số diện thoại:</label>
                                        <input class="form-control" id="e_laps_cus_phone" name="laps_cus_phone" type="number" required value="{{ old('laps_cus_phone') }}">
                                        @if(count($errors) > 0 && $errors->laps_cus_phone !='')
                                            <span class="text-danger">{{ $errors->first('laps_cus_phone') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="message-text" class="col-form-label">Email:</label>
                                        <input class="form-control" id="e_laps_cus_mail" name="laps_cus_mail" type="text" required value="{{ old('laps_cus_mail') }}">
                                        @if(count($errors) > 0 && $errors->laps_cus_mail !='')
                                            <span class="text-danger">{{ $errors->first('laps_cus_mail') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group text-center">
                                <input type="file" accept="image/*" id="e_laps_cus_img_input" name="laps_cus_img" onchange="e_onFileSelected(event)" class="hidden">
                                <div class="btn-cursor-pointer block-select-image" id="e_laps_cus_img">
                                    <img id="e_myimage" height="100%" style="padding: 2px; border-radius:5px;">
                                </div>
                                @if(count($errors) > 0 && $errors->laps_cus_img !='')
                                    <span class="text-danger">{{ $errors->first('laps_cus_img') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="message-text" class="col-form-label">Ghi chú:</label>
                                <textarea class="form-control" id="e_laps_cus_note" name="laps_cus_note" rows="4" required >{{ old('laps_cus_note')}}</textarea>
                                @if(count($errors) > 0 && $errors->laps_cus_note !='')
                                    <span class="text-danger">{{ $errors->first('laps_cus_note') }}</span>
                                @endif
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
