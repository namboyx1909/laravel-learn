<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index()
    {
        $cats = DB::table('categories')->paginate(3);
        return view('category.index', compact('cats'));
    }

    public function create()
    {
        return view('category.create');
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|unique:categories'
        ];
        $messages = [
            'name.required' => 'Tên danh mục không để trống',
            'name.unique' => 'Tên danh mục đã được sử dụng',
        ];
        $request->validate($rules,$messages);
        DB::table('categories')->insert($request->only('name','status'));
        return redirect()->route('category.index');
    }

    public function delete($id){
        DB::table('categories')->where('id',$id)->delete();
        return redirect()->route('category.index');
    }

    public function edit($id){
        $cat = DB::table('categories')->find($id);
        return view('category.edit',compact('cat'));
    }

    public function update($id,Request $request){
        $rules = [
            'name' => 'required|unique:categories'
        ];
        $messages = [
            'name.required' => 'Tên danh mục không để trống',
            'name.unique' => 'Tên danh mục đã được sử dụng',
        ];
        $request->validate($rules,$messages);
        DB::table('categories')->where('id',$id)->update($request->only('name','status'));
        return redirect()->route('category.index'); // chuyển hướng về danh sách
    }
}
