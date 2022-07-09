<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
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
        return view('admin.dashboard');
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function change_password(Request $request)
    {
        $old_pass   = $request->old_pass;
        $new_pass   = $request->new_pass;
        $renew_pass = $request->renew_pass;
        if ($new_pass != $renew_pass) {
            return redirect()->back()->with('thongbao', 'Mật khẩu mới không khớp');
        } elseif (!Auth::attempt(['email' => Auth::user()->email, 'password' => $old_pass])) {
            return redirect()->back()->with('thongbao', 'Mật khẩu hiện tại không đúng');
        } else {
            $admin           = User::where('id', Auth::user()->id)->first();
            $admin->password = bcrypt($new_pass);
            $admin->save();

            return redirect()->back()->with('thongbao', 'Mật khẩu đã được thay đổi');
        }
    }
}
