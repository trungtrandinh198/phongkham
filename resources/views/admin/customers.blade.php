@section('title')
    khách hàng
@endsection
@extends('layouts.admin.app')
@section('style_page')
    <!-- PLUGINS STYLES-->
    <link href="{{asset('')}}dash/assets/vendors/DataTables/datatables.min.css" rel="stylesheet"/>
    <link href="{{asset('')}}dash/assets/vendors/summernote/dist/summernote.css" rel="stylesheet"/>
    <link href="{{asset('')}}dash/assets/vendors/bootstrap-markdown/css/bootstrap-markdown.min.css" rel="stylesheet"/>
@endsection
@section('content')
    <div class="page-heading">
        <h1 class="page-title">Quản lý khách hàng</h1>
    </div>
    <div class="page-content fade-in-up">
        <div class="ibox">
            <div class="ibox-head">
                <div class="ibox-title">Danh sách khách hàng</div>
                <div class="pull-right">
                    <button class="btn btn-primary btn-fix btn-cursor-pointer" id="show_modal_add_customer"
                            data-toggle="modal">
                        <i class="fa fa-plus" aria-hidden="true"></i> Thêm khách hàng
                    </button>
                </div>
            </div>
            <div class="ibox-body">
                <table class="table table-striped table-bordered table-hover" id="blogs-table" cellspacing="0"
                       width="100%">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Tên khách hàng</th>
                        <th>Địa chỉ</th>
                        <th>Số điện thoại</th>
                        <th>Email</th>
                        <th>Ghi chú</th>
                        <th>Hình ảnh</th>
                        <th>Thao tác</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Id</th>
                        <th>Tên khách hàng</th>
                        <th>Địa chỉ</th>
                        <th>Số điện thoại</th>
                        <th>Email</th>
                        <th>Ghi chú</th>
                        <th>Hình ảnh</th>
                        <th>Thao tác</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @forelse($customers as $customer)
                        <tr>
                            <td>{{$customer->id}}</td>
                            <td>{{$customer->laps_cus_name}}</td>
                            <td>{{$customer->laps_cus_address}}</td>
                            <td>{{$customer->laps_cus_phone}}</td>
                            <td>{{$customer->laps_cus_mail}}</td>
                            <td>{{$customer->laps_cus_note}}</td>
                            <td>
                                <img class="blog_thumbnail" src="{{ Storage::url($customer->laps_cus_img) }}">
                            </td>
                            <td>
                                <button type="button" class="btn btn-primary btn-cursor-pointer btn_update_customer"
                                        onclick="edit_customer({{$customer->id}})">Sửa
                                </button>
                                <button type="button" class="btn btn-primary btn-cursor-pointer btn_confirm_delete"
                                        onclick="delete_customer({{$customer->id}})">Xoá
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center">Không có dữ liệu</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <input type="hidden" value="{{ Session::get('action') }}" id="id_ss">
    @include('admin.models.add_customer')
    @include('admin.models.edit_customer')
    @include('admin.models.delete')
    <input type="hidden" value="{{ Session::get('action') }}" id="id_ss">
@endsection
@section('script_page')
    @if(count($errors) > 0  && session('action')=='create')
        <script>
            $("#modal_add_customer").modal("show");
        </script>
    @elseif(count($errors) > 0)
        <script>
            var id = $('#id_ss').val();
            console.log('id:', id);
            let base_url_edit = $('body').attr('base_url');
            $.ajax({
                type: "GET",
                url: base_url_edit + "/manager/blogs/" + id,
                success: function (data) {
                    console.log('dât:', data);
                    if (data.status == 1) {
                        let name_thumb = data.blog.thumbnail.split('/')[2];
                        // set form action
                        var imgtag = document.getElementById("e_myimage");
                        imgtag.src = base_url_edit + '/storage/customers/' + name_thumb;
                        // init old data
                        $('#id_e').val(data.blog.id);
                        $('#e_cate_select').val(data.blog.id_cate);
                        $('#e_blog_title').val(data.blog.title);
                        $('#e_intro').val(data.blog.intro);
                        $('#e_tags').val(data.blog.tags);
                        $('#e_status').val(data.blog.status);
                        $("#e_summernote").summernote('code', data.blog.content);
                        $("#model_edit_customer").modal("show");
                    }
                }
            });
        </script>
    @endif
    <script>
        // show_modal_add_blog
        $("body").on("click", "#show_modal_add_customer", function () {
            $("#modal_add_customer").modal("show");
        });
        // click chọn ảnh add
        $("body").on("click", "#laps_cus_img", function () {
            $("#laps_cus_img_input").trigger("click");
        });
        // click chọn ảnh edit
        $("body").on("click", "#e_laps_cus_img", function () {
            $("#e_laps_cus_img_input").trigger("click");
        });

        // load image preview add
        function onFileSelected(event) {
            var selectedFile = event.target.files[0];
            var reader = new FileReader();
            var imgtag = document.getElementById("myimage");
            reader.onload = function (event) {
                imgtag.src = event.target.result;
            };
            reader.readAsDataURL(selectedFile);
        }

        // load image preview edit
        function e_onFileSelected(event) {
            console.log('43534');
            var selectedFile = event.target.files[0];
            var reader = new FileReader();
            var imgtag = document.getElementById("e_myimage");
            reader.onload = function (event) {
                imgtag.src = event.target.result;
            };
            reader.readAsDataURL(selectedFile);
        }

        //edit customer
        function edit_customer(id) {
            let base_url = $('body').attr('base_url');
            var editUrl = "{{ route('customers.show', ':id') }}";
            editUrl = editUrl.replace(':id', id);
            $.ajax({
                type: "GET",
                url: editUrl,
                success: function (data) {
                    if (data.status == 1) {
                        data = data.data;
                        let laps_img = data.laps_cus_img.split('/')[2];
                        var imgtag = document.getElementById("e_myimage");
                        imgtag.src = base_url + '/storage/customers/' + laps_img;
                        // init old data
                        $('#e_id').val(data.id);
                        $('#e_laps_cus_name').val(data.laps_cus_name);
                        $('#e_laps_cus_address').val(data.laps_cus_address);
                        $('#e_laps_cus_phone').val(data.laps_cus_phone);
                        $('#e_laps_cus_mail').val(data.laps_cus_mail);
                        $('#e_laps_cus_note').val(data.laps_cus_note);
                        $("#model_edit").modal("show");
                    }
                }
            });
        }

        //delete customer
        function delete_customer(id) {
            var editUrl = "{{ route('customers.destroy', ':id') }}";
            editUrl = editUrl.replace(':id', id);
            $('#form_confirm_delete').attr('action', editUrl);
            $('#id_will_del').val(id);
            $('#confirm_type').html(' khách hàng');
            $('#confirm_type_mes').html(' khách hàng này');
            $("#model_confirm_delete").modal("show");
        }
    </script>
@endsection
