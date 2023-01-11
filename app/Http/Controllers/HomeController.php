<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $product = Product::paginate();
        return view('index', compact('product'));
    }

    public function login()
    {
        return view('login');
    }

    public function check_login(Request $request)
    {
        $rules = [
            'email' => 'required|email',
            'password' => 'required'
        ];

        $message = [
            'email.required' => 'Địa chỉ email không được để trống',
            'email.email' => 'Địa chỉ email không đúng định dạng',
            'password.required' => 'Mật khẩu không được để trống'
        ];
        $request->validate($rules, $message);

    }

    public function upload()
    {
        return view('upload_form');
    }

    public function handle_upload(Request $request)
    {
        $rules = [
            'image' => 'required|mimes:jpg,jpeg,png,gif',
        ];

        $message = [
            'image.required' => 'Vui lòng chọn ảnh',
            'image.mimes' => 'Định dạng file cho phép là: jpg,jpeg,png,gif '
        ];

        $request->validate($rules, $message);
        $ext = $request->image->extension();
        $file_name = time() . '.' . $ext;
        $request->image->move(public_path('uploads'), $file_name);
    }
}
