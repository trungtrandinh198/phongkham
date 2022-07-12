<?php

namespace App\Http\Controllers;

use App\Models\Lap;
use Illuminate\Http\Request;

class LapController extends Controller
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
        $lap = Lap::first();

        return view('admin.laps', compact('lap'));
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request)
    {
        $lap = Lap::first();
        if (empty($lap)) {
            $lap = new Lap();
        }
        $lap['laps_name']    = $request->laps_name;
        $lap['laps_phone']   = $request->laps_phone;
        $lap['laps_address'] = $request->laps_address;
        $lap['laps_mail']    = $request->laps_mail;
        $lap['laps_note']    = $request->laps_note;

        $lap->save();

        return redirect()->route('laps.index')->with('thongbao', 'Đã cập nhật thành công');
    }
}
