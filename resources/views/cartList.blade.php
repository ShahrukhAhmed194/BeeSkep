@extends('master')
@section('content')

<div class="custom-product">
    <div class="row">
        <div class="col-sm-10">
            <div class="trending-wrapper">
                <h4>Result For Products.</h4>
                <a class="btn btn-success" href="{{route('order_now')}}">Order Now</a>
                @foreach ($products as $item)
                <div class="row search-item cart-list-divider">
                    <div class="col-sm-3">
                        <a href="detail/{{$item->id}}">
                            <img class="trending-image" src="{{$item->gallery}}" alt="">
                        </a>
                    </div>
                    <div class="col-sm-4">                    
                        <div class="">
                            <h2>{{$item->name}}</h2>
                            <h5>{{$item->description}}</h5>
                        </div>
                    </div>
                    <div class="col-sm-4">
                       <a href="{{route('remove_cart',[$item->cart_id])}}" class="btn btn-warning" >Remove From Cart</a>
                    </div>
                </div>
                @endforeach
                
            </div>
        </div>
    </div>
</div>
@endsection