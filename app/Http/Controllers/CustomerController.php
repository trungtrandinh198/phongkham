<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{

    public function index()
    {
        $customers = Customer::all();

        return view('admin.customers', compact('customers'));
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        session(['action' => 'create']);
        $this->validate($request, [
            'laps_cus_img'         => 'required|image|max:2048',
            'laps_cus_name'    => 'required|',
            'laps_cus_address' => 'required',
            'laps_cus_phone'   => 'required',
            'laps_cus_mail'    => 'required',
            'laps_cus_note'    => 'required',
        ], [
            'laps_cus_img.required'         => 'Vui lòng chọn ảnh khách hàng',
            'laps_cus_img.image'            => 'Chỉ được phép chọn hình ảnh',
            'laps_cus_img.max'              => 'Dung lượng tối đã là 2MB',
            'laps_cus_name.required'    => 'Tên khách hàng không được để trống',
            'laps_cus_address.required' => 'Địa chỉ không được để trống',
            'laps_cus_phone.required'   => 'Số điện thoại không được để trống',
            'laps_cus_mail.required'    => 'emailkhông được để trống',
            'laps_cus_note.required'    => 'Ghi chú không được để trống',
        ]);
        $path                       = resize_image_upload($request->file('laps_cus_img'), 'customers');
        $customer                   = new Customer();
        $customer->laps_cus_img         = $path;
        $customer->laps_cus_name    = $request->laps_cus_name;
        $customer->laps_cus_address = $request->laps_cus_address;
        $customer->laps_cus_phone   = $request->laps_cus_phone;
        $customer->laps_cus_mail    = $request->laps_cus_mail;
        $customer->laps_cus_note    = $request->laps_cus_note;
        $customer->save();

        return redirect()->route('customers.index')->with('thongbao', 'Đã thêm thành công');
    }

    /**
     * @param $id
     *
     * @return array
     */
    public function show($id)
    {
        $customer = Customer::find($id);

        $result  = [
            'status' => 1,
            'data'   => $customer,
        ];

        return $result;
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request)
    {
        session(['action' => $request->id]);
        $customer = Customer::find($request->id);
        $path = '';
        if ($request->file('laps_cus_img'))
        {
            $this->validate($request, [
                'laps_cus_img'         => 'required|image|max:2048',
                'laps_cus_name'    => 'required|',
                'laps_cus_address' => 'required',
                'laps_cus_phone'   => 'required',
                'laps_cus_mail'    => 'required',
                'laps_cus_note'    => 'required',
            ], [
                'laps_cus_img.required'         => 'Vui lòng chọn ảnh khách hàng',
                'laps_cus_img.image'            => 'Chỉ được phép chọn hình ảnh',
                'laps_cus_img.max'              => 'Dung lượng tối đã là 2MB',
                'laps_cus_name.required'    => 'Tên khách hàng không được để trống',
                'laps_cus_address.required' => 'Địa chỉ không được để trống',
                'laps_cus_phone.required'   => 'Số điện thoại không được để trống',
                'laps_cus_mail.required'    => 'emailkhông được để trống',
                'laps_cus_note.required'    => 'Ghi chú không được để trống',
            ]);
            $path                       = resize_image_upload($request->file('laps_cus_img'), 'customers');

        } else {
            $this->validate($request, [
                'laps_cus_name'    => 'required|',
                'laps_cus_address' => 'required',
                'laps_cus_phone'   => 'required',
                'laps_cus_mail'    => 'required',
                'laps_cus_note'    => 'required',
            ], [
                'laps_cus_name.required'    => 'Tên khách hàng không được để trống',
                'laps_cus_address.required' => 'Địa chỉ không được để trống',
                'laps_cus_phone.required'   => 'Số điện thoại không được để trống',
                'laps_cus_mail.required'    => 'emailkhông được để trống',
                'laps_cus_note.required'    => 'Ghi chú không được để trống',
            ]);
            $path = $customer->laps_cus_img;
        }
        $customer->laps_cus_img         = $path;
        $customer->laps_cus_name    = $request->laps_cus_name;
        $customer->laps_cus_address = $request->laps_cus_address;
        $customer->laps_cus_phone   = $request->laps_cus_phone;
        $customer->laps_cus_mail    = $request->laps_cus_mail;
        $customer->laps_cus_note    = $request->laps_cus_note;
        $customer->save();

        return redirect()->route('customers.index')->with('thongbao', 'Chỉnh sửa thành công');
    }

    /**
     * @param $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $customer = Customer::find($id);
        if ($customer)
        {
            $customer->delete();
        } else {
            return redirect()->route('customers.index')->with('thongbao', 'Lỗi không có khách hàng');
        }

        return redirect()->route('customers.index')->with('thongbao', 'Xoá thành công');
    }
}
