@extends('layouts.master') <!-- Kế thừa master.blade.php -->
@section('main')
<h2>Danh sách danh mục</h2>
<table class="table table-bordered">
    <thead>
    <tr>
        <th>ID</th>
        <th>NAME</th>
        <th>STATUS</th>
        <th>ACTIONS</th>
    </tr>
    </thead>
    <tbody>
    @foreach($cats as $cat)
    <tr>
        <td>{{$cat->id}}</td>
        <td>{{$cat->name}}</td>
        <td>{{$cat->status}}</td>
        <td>
            <form action="{{route('category.delete',$cat->id)}}" method="POST">
                @method('DELETE') @csrf
                <button class="btn btn-xs btn-danger">Xóa</button>
                <a href="{{route('category.edit',$cat->id)}}" class="btn btn-xs btn-primary">Sửa</a>
            </form>
        </td>
    </tr>
    @endforeach
    </tbody>
</table>
{{$cats->links()}}
@stop()
