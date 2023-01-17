@extends('layouts.master')
@section('main')
<h2>Thêm mới danh mục danh mục</h2>
<form action="{{route('category.store')}}" method="POST" role="form">
    @csrf
    <div class="form-group">
        <label for="">Tên danh mục</label>
        <input class="form-control" name="name" placeholder="Ten danh mục">
        @error('name')
        <small class="help-block text-danger">{{$message}}</small>
        @enderror
    </div>
    <div class="form-group">
        <label for="">Trạng thái</label>
        <div class="radio">
            <label>
                <input type="radio" name="status" value="1" checked>
                Hiển thị
            </label>
            <label>
                <input type="radio" name="status" value="0">
                Ẩn
            </label>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Thêm mới</button>
</form>
@stop()
