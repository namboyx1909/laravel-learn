<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function form()
    {
        return view('upload.form');
    }

    public function upload(Request $request)
    {
        $rules = ['upload' => 'required:mimes:jpeg,png,gif'];
        $mesages = [
            'upload.required' => 'Vui lòng chọn một file',
            'upload.mimes' => 'Định dạng file cho phép là: jpg, png, gif',
        ];

        $request->validate($rules,$mesages);

        $file_name = $request->upload->getClientOriginalName();
        $request->upload->move(public_path('uploads'),$file_name);
        return redirect()->back()->with('success',"Upload ảnh thành công");
    }
}
