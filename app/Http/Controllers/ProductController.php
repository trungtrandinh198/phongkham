<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $products = Product::all();

        return view('admin.products', compact('products'));
    }

    public function show($id)
    {
        $product = Product::find($id);
        $result  = [
            'status' => 1,
            'data'   => $product,
        ];

        return $result;
    }

    public function store(Request $request)
    {
        session(['action' => 'create']);
        $this->validate($request, [
            'laps_img'        => 'required|image|max:2048',
            'laps_pro_name'   => 'required|',
            'laps_pro_number' => 'required',
            'laps_pro_note'   => 'required',
        ], [
            'laps_img.required'        => 'Vui lòng chọn ảnh sản phẩm',
            'laps_img.image'           => 'Chỉ được phép chọn hình ảnh',
            'laps_img.max'             => 'Dung lượng tối đã là 2MB',
            'laps_pro_name.required'   => 'Tên sản phẩm không được để trống',
            'laps_pro_number.required' => 'Số lượng không được để trống',
            'laps_pro_note.required'   => 'Ghi chú không được để trống',
        ]);
        $path                     = resize_image_upload($request->file('laps_img'), 'products');
        $product                  = new Product();
        $product->laps_img        = $path;
        $product->laps_pro_name   = $request->laps_pro_name;
        $product->laps_pro_number = $request->laps_pro_number;
        $product->laps_pro_note   = $request->laps_pro_note;
        $product->save();

        return redirect()->route('products.index')->with('thongbao', 'Đã thêm thành công');
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request)
    {
        session(['action' => $request->id]);
        $product = Product::find($request->id);

        if ($request->file('laps_img'))
        {
            $this->validate($request, [
                'laps_img'        => 'required|image|max:2048',
                'laps_pro_name'   => 'required|',
                'laps_pro_number' => 'required',
                'laps_pro_note'   => 'required',
            ], [
                'laps_img.required'        => 'Vui lòng chọn ảnh sản phẩm',
                'laps_img.image'           => 'Chỉ được phép chọn hình ảnh',
                'laps_img.max'             => 'Dung lượng tối đã là 2MB',
                'laps_pro_name.required'   => 'Tên sản phẩm không được để trống',
                'laps_pro_number.required' => 'Số lượng không được để trống',
                'laps_pro_note.required'   => 'Ghi chú không được để trống',
            ]);

            $product->laps_img                     = resize_image_upload($request->file('laps_img'), 'products');
        } else {
            $this->validate($request, [
                'laps_pro_name'   => 'required',
                'laps_pro_number' => 'required',
                'laps_pro_note'   => 'required',
            ], [
                'laps_img.image'           => 'Chỉ được phép chọn hình ảnh',
                'laps_img.max'             => 'Dung lượng tối đã là 2MB',
                'laps_pro_name.required'   => 'Tên sản phẩm không được để trống',
                'laps_pro_number.required' => 'Số lượng không được để trống',
                'laps_pro_note.required'   => 'Ghi chú không được để trống',
            ]);

        }
        $product->laps_pro_name   = $request->laps_pro_name;
        $product->laps_pro_number = $request->laps_pro_number;
        $product->laps_pro_note   = $request->laps_pro_note;
        $product->save();

        return redirect()->route('products.index')->with('thongbao', 'Chỉnh sửa thành công');
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        if (Storage::exists($product->laps_img))
        {
            Storage::delete($product->laps_img);
        }
        $product->delete();

        return redirect()->route('products.index')->with('thongbao', 'Xoá thành công');
    }
}
