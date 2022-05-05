@extends('master')
@section('content')

<div class="custom-product">
    <div class="row">
        
        <div class="col-sm-10">
            <table class="table table-dark">
                <tbody>
                  <tr>
                    <td>Amount</td>
                    <td>{{$total}}</td>
                  </tr>
                  <tr>
                    <td>Tax</td>
                    <td>10</td>
                  </tr>
                  <tr>                    
                    <td>Delivery</td>
                    <td>20</td>
                  </tr>
                  <tr>                    
                    <td>Total Amount</td>
                    <td>{{$total+30}}</td>
                  </tr>
                </tbody>
              </table>
        </div>
        
    </div>
    <div>
        <form action="{{route('place_order')}}" method="POST">
          @csrf
            <div class="form-group">
              <textarea name="address" class="form-control" placeholder="Enter Your Address" required></textarea>
            </div>
            <div class="form-group">
              <label for="payment_method">Payment Method</label><br>
              <input type="radio" value="cash" name="payment_method"> <span>Online Payment</span><br>
              <input type="radio" value="cash" name="payment_method"> <span>EMI Payment</span><br>
              <input type="radio" value="cash" name="payment_method"> <span>Cash On Delivery</span><br>
              
            </div>
            <button type="submit" class="btn btn-primary">Order Now</button>
          </form>
    </div>
</div>
@endsection