@extends('layouts.master')
@section('main')
<div class="container">
    <div class="row">
        @foreach ($product as $item)
        <div class="card col-md-4" style="width: 18rem;">

            <img class="card-img-top" src="https://laptopaz.vn/media/product/2683_nitro5_an517_55_redkb_modelmain.png"
                 alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">{{ $item->title }}</h5>
                <p class="card-text">price: {{ $item->price }} </p>
                <a href="#" class="btn btn-primary">View</a>
            </div>
        </div>
        @endforeach
    </div>
</div>
@stop()
