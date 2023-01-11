@extends('layouts.master')
@section('main')
<div class="container">
    <br>
    <form action="" method="post" enctype="multipart/form-data">
        @csrf
        <legend>Form upload</legend>
        <div class="form-group">
            <lable for="">Chon anh</lable>
            <input type="file" class="form-control" name="image" />
            @error('image') {{ $message }} @enderror
        </div>
        <button type="submit" class="btn btn-primary">Upload</button>
    </form>
</div>
@stop()
