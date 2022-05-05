@php
  use App\Http\Controllers\ProductController;
  $total = 0;
  if(Session::has('user')){
    $total = ProductController::cartItem();
  }
@endphp
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">E-Com</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      @if(Session::has('user'))
      <ul class="nav navbar-nav">
        <li class=""><a href="{{route('home')}}">Home</a></li>
        <li class=""><a href="{{route('my_orders')}}">Orders</a></li>       
      </ul>
      @endif

      <form action="{{route('search')}}" method="GET" class="navbar-form navbar-left">
        <div class="form-group">
          <input type="text" name="query" class="form-control search-box" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Search</button>
      </form>

      <ul class="nav navbar-nav navbar-right">
        <li class=""><a href="{{route('cart_list')}}">Cart({{$total}})</a></li>
        @if(Session::has('user'))
        <li class="dropdown">
          <a class="dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
           {{Session::get('user')['name']}}
          </a>
          <ul class="dropdown-menu" >
            <li><a href="{{route('logout')}}">Logout</a></li>
                      
          </ul>
        </li>
        @else
        <li> <a href="{{route('signin')}}">Login</a> </li>
        <li> <a href="{{route('register_view')}}">Register</a> </li>
        @endif
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>