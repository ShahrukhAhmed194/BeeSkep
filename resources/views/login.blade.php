@extends('master')
@section('content')

<div class="container custom-login">
    <div class="row">
        <div class="col-sm-4 col-sm-offset-4"> <!--offset is for positioning the fields-->
            <form action="login" method="POST">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail">Email Address</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail" placeholder="example@mail.com" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword">Email Address</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword" placeholder="Make It Hard" required>
                </div>
                <button type="submit" class="btn btn-default">Login</button>
            </form>
        </div>
    </div>
</div>
@endsection