<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index(Request $req)
    {
        $limit = 2; //tùy chọn, số dòng/ trang
        $page = $req->page > 0 ? $req->page : 1; // trang hiện tại đang truy cập
        $offset = ($page - 1) * $limit; //  số dòng bị loại bỏ
        $query = DB::table('products')
            ->select('products.*', 'categories.name as category_name')
            ->join('categories', 'categories.id', '=', 'products.category_id');
        if ($req->order) {
            $order = explode('-',$req->order);
            $query = $query->orderBy($order[0], $order[1]);
        }
        $totalRow = DB::table('products')->count('id');
        if ($req->name) {
            $query = $query->where('products.name','LIKE', '%'.$req->name.'%');
            $totalRow = DB::table('products')->where('products.name','LIKE', '%'.$req->name.'%')->count('id');
        }
        $products = $query->limit($limit)->offset($offset)->get();

        $totalRow = DB::table('products')->count('id');
        $totalPrice = DB::table('products')->sum('price');
        $maxPrice = DB::table('products')->max('price');
        $minPrice = DB::table('products')->min('price');
        $totalPage = ceil($totalRow/$limit);
        return view('product', compact('products', 'totalRow', 'totalPrice', 'minPrice', 'maxPrice', 'totalPage'));
    }
}
