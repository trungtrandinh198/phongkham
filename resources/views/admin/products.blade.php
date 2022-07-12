@section('title')
    Sản phẩm
@endsection
@extends('layouts.admin.app')
@section('style_page')
    <!-- PLUGINS STYLES-->
    <link href="{{asset('')}}dash/assets/vendors/DataTables/datatables.min.css" rel="stylesheet" />
    <link href="{{asset('')}}dash/assets/vendors/summernote/dist/summernote.css" rel="stylesheet" />
    <link href="{{asset('')}}dash/assets/vendors/bootstrap-markdown/css/bootstrap-markdown.min.css" rel="stylesheet" />
@endsection
@section('content')
    <div class="page-heading">
        <h1 class="page-title">Quản lý sản phẩm</h1>
    </div>
    <div class="page-content fade-in-up">
        <div class="ibox">
            <div class="ibox-head">
                <div class="ibox-title">Danh sách sản phẩm</div>
                <div class="pull-right">
                    <button class="btn btn-primary btn-fix btn-cursor-pointer" id="show_modal_add_product" data-toggle="modal">
                        <i class="fa fa-plus" aria-hidden="true"></i> Thêm sản phẩm
                    </button>
                </div>
            </div>
            <div class="ibox-body">
                <table class="table table-striped table-bordered table-hover" id="blogs-table" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Tên sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Ghi chú</th>
                        <th>Hình ảnh</th>
                        <th>Thao tác</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Id</th>
                        <th>Tên sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Ghi chú</th>
                        <th>Hình ảnh</th>
                        <th>Thao tác</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @forelse($products as $product)
                        <tr>
                            <td>{{$product->id}}</td>
                            <td>{{$product->laps_pro_name}}</td>
                            <td>{{$product->laps_pro_number}}</td>
                            <td>{{$product->laps_pro_note}}</td>
                            <td>
                                <img class="blog_thumbnail" src="{{ Storage::url($product->laps_img) }}">
                            </td>
                            <td>
                                <button type="button" class="btn btn-primary btn-cursor-pointer btn_update_blog" id_e="{{$product->id}}">Sửa</button>
                                <button type="button" class="btn btn-primary btn-cursor-pointer btn_confirm_delete" id_del="{{$product->id}}">Xoá</button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">Không có dữ liệu</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- model add blog  -->
    @include('admin.models.add_product')
    {{--<!--END: model add blog  -->
    <!-- model add cate  -->
    <!-- model edit blog  -->
    @include('admin.models.editblog')
    <!--END: model edit blog  -->
    <!-- model add cate  -->
    @include('admin.models.addcate')
    <!-- END: model add cate  -->
    <!-- model confirm_delete  -->
    @include('admin.models.confirm_delete')
    <!-- END: confirm_delete  -->--}}
    <input type="hidden" value="{{ Session::get('action') }}"  id="id_ss">
@endsection
@section('script_page')
    <!-- PAGE LEVEL PLUGINS-->
    <script src="{{asset('/')}}dash/plugins/fileinput.min.js" type="text/javascript"></script>
    <script src="{{asset('')}}dash/assets/vendors/DataTables/datatables.min.js" type="text/javascript"></script>
    <script src="{{asset('')}}dash/assets/vendors/summernote/dist/summernote.min.js" type="text/javascript"></script>
    <script src="{{asset('')}}dash/assets/vendors/bootstrap-markdown/js/bootstrap-markdown.js" type="text/javascript"></script>
    <script src="{{asset('')}}dash/scripts/blogs.js" type="text/javascript"></script>

    @if(count($errors) > 0  && session('action')=='create')
        <script>
            $("#show_modal_add_product").modal("show");
        </script>
    @elseif(count($errors) > 0)
        <script>
            var id = $('#id_ss').val();
            console.log('id:', id);
            let base_url_edit = $('body').attr('base_url');
            $.ajax({
                type: "GET",
                url: base_url_edit+"/manager/blogs/"+id,
                success: function (data) {
                    console.log('dât:', data);
                    if(data.status ==1){
                        let name_thumb = data.blog.thumbnail.split('/')[2];
                        // set form action
                        var imgtag = document.getElementById("e_myimage");
                        imgtag.src = base_url_edit+'/storage/blogs/'+name_thumb;
                        // init old data
                        $('#id_e').val(data.blog.id);
                        $('#e_cate_select').val(data.blog.id_cate);
                        $('#e_blog_title').val(data.blog.title);
                        $('#e_intro').val(data.blog.intro);
                        $('#e_tags').val(data.blog.tags);
                        $('#e_status').val(data.blog.status);
                        $("#e_summernote").summernote( 'code',data.blog.content );
                        $("#model_edit_blog").modal("show");
                    }
                }
            });
        </script>
    @endif
<script>
    // show_modal_add_blog
    $("body").on("click", "#show_modal_add_product", function () {
        $("#modal_add_product").modal("show");
    });
    // click chọn ảnh
    $("body").on("click", "#laps_img", function () {
        $("#laps_img_input").trigger("click");
    });
    // load image preview
    function onFileSelected(event) {
        var selectedFile = event.target.files[0];
        var reader = new FileReader();
        var imgtag = document.getElementById("myimage");
        reader.onload = function (event) {
            imgtag.src = event.target.result;
        };
        reader.readAsDataURL(selectedFile);
    }
</script>
@endsection
