<div class="modal fade" id="model_confirm_delete" tabindex="-1" role="dialog" aria-labelledby="model_confirm_delete"
     aria-hidden="true">
    <div class="modal-dialog modal-xs">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Xác nhận xoá <span id="confirm_type"></span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="POST" id="form_confirm_delete">
                <div class="modal-body">
                    @method('DELETE')
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="id" value="" id="id_will_del">
                    <div class="row">
                        <div class="col-md-12">
                            <h3>Bạn có chắc xoá <span id="confirm_type_mes"> </span> ?</h3>
                        </div>
                    </div>
                    <button type="submit" class="hidden" id="submit_del"></button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-cursor-pointer" data-dismiss="modal">Không
                    </button>
                    <button type="submit" class="btn btn-danger btn-cursor-pointer" id="btn_submit_del"> Có</button>
                </div>
            </form>
        </div>
    </div>
</div>
