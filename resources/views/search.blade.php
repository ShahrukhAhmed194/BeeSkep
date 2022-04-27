@extends('master')
@section('content')

<div class="custom-product">
    <div class="col-sm-4">
        <a href="#">Filter</a>
    </div>
    <div class="col-sm-4">
        <div class="trending-wrapper">
            <h2>Searched Products</h2>
            @foreach ($products as $item)
            <div class="search-item">
                <a href="detail/{{$item['id']}}">
                <img class="trending-image" src="{{$item['gallery']}}" alt="">
                <h5>{{$item['name']}}</h5>
                <h5>{{$item['description']}}</h5>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection