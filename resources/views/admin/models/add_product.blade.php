<div class="modal fade model_add_blog" id="modal_add_product" tabindex="-1" role="dialog" aria-labelledby="addBlog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Thêm mới sản phẩm</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('products.store')}}" method="POST" enctype="multipart/form-data" >
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="message-text" class="col-form-label">Tên sản phẩm:</label>
                                        <input class="form-control" name="laps_pro_name" required value="{{ old('laps_pro_name') }}">
                                        @if(count($errors) > 0 && $errors->laps_pro_name !='')
                                            <span class="text-danger">{{ $errors->first('laps_pro_name') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="message-text" class="col-form-label">Số lượng:</label>
                                        <input class="form-control" name="laps_pro_number" type="number" required value="{{ old('laps_pro_number') }}">
                                        @if(count($errors) > 0 && $errors->laps_pro_number !='')
                                            <span class="text-danger">{{ $errors->first('laps_pro_number') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group text-center">
                                <input type="file" accept="image/*" id="laps_img_input" name="laps_img" onchange="onFileSelected(event)" class="hidden">
                                <div class="btn-cursor-pointer block-select-image" id="laps_img">
                                    <img id="myimage" height="100%" style="padding: 2px; border-radius:5px;">
                                </div>
                                @if(count($errors) > 0 && $errors->laps_img !='')
                                    <span class="text-danger">{{ $errors->first('laps_img') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="message-text" class="col-form-label">Ghi chú:</label>
                                <textarea class="form-control" name="laps_pro_note" rows="4" required >{{ old('laps_pro_note')}}</textarea>
                                @if(count($errors) > 0 && $errors->laps_pro_note !='')
                                    <span class="text-danger">{{ $errors->first('laps_pro_note') }}</span>
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
