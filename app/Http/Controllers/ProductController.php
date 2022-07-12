<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

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

    public function store(Request $request)
    {
        session(['action' => 'create']);
        $this->validate($request,[
            'thumbnail' => 'required|image|max:2048',
            'blog_title' => 'required|',
            'content' => 'required',
            'intro' => 'required',
            'id_cate' => 'required'
        ],[
            'thumbnail.required'  => 'Vui lòng chọn ảnh thumbnail',
            'thumbnail.image'  => 'Chỉ được phép chọn hình ảnh',
            'thumbnail.max'  => 'Dung lượng tối đã là 2MB',
            'blog_title.required'  => 'Nhập tiêu đề',
            'content.required'  => 'Nội dung không được để trống',
            'intro.required'  => 'Intro không được để trống',
            'id_cate.required'  => 'Vui lòng chọn danh mục',
        ]);
        // upload thumbnail
        $name =  time().rand(1,50).'_'.$request->file('thumbnail')->getClientOriginalName();
        // $path = $request->file('thumbnail')->storeAs('public/blogs', $name);
        $path = resize_image_upload($request->file('thumbnail'), 'blogs');
        // create blog
        $blog = new Product();
        $blog->title = $request->blog_title;
        $blog->title_slug = str_slug($request->blog_title);
        $blog->intro = $request->intro;
        $blog->content = $request->content;
        $blog->tags = $request->tags;
        $blog->status = $request->status;
        $blog->id_cate = $request->id_cate;
        $blog->id_user = Auth::user()->id;
        $blog->thumbnail = $path;
        $blog->save();
        return redirect('manager/blogs')->with('thongbao', 'Đã thêm thành công');
    }
}
