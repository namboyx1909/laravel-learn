@extends('layouts.master')
@section('main')
<div class="container">
    <br>
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <form action="" method="POST" role="form">
                @csrf
                <legend>Form đăng ký</legend>
                <div class="form-group">
                    <label for="">Name</label>
                    <input class="form-control" name="name" placeholder="Nhập name">
                    @error('name') {{ $message }} @enderror
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input class="form-control" name="email" placeholder="Nhập email">
                    @error('email') {{ $message }} @enderror
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Nhập password">
                    @error('password') {{ $message }} @enderror
                </div>
                <div class="form-group">
                    <label for="">Confirm password</label>
                    <input type="password" class="form-control" name="password_confirmation" placeholder="Nhập lại password">
                    @error('password') {{ $message }} @enderror
                </div>
                <button type="submit" class="btn btn-primary">Đăng Ký</button>
            </form>
        </div>
    </div>
</div>
@stop()
