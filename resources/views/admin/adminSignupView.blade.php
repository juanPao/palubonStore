@extends('layouts/baseSignup')

@section('body')
<div class="register-box">
      <div class="register-logo">
        <a href="{{url('home')}}"><b>{{config('constants.OWNER_NAME')}}</b>Store</a>
      </div>

      <div class="register-box-body">
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <p class="login-box-msg">Register a new membership</p>
        <form action="{{url('admin/signup')}}" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <div class="form-group has-feedback">
            <input type="text" class="form-control" name="firstname" placeholder="First Name">
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="text" class="form-control" name="middlename" placeholder="Middle Name">
            
          </div>
          <div class="form-group has-feedback">
            <input type="text" class="form-control" name="lastname" placeholder="Last Name">
            
          </div>
          <div class="form-group has-feedback">
            <input type="email" class="form-control" name="email" placeholder="Email">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div id="checkpass"></div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" name="password" id="password" placeholder="Password">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" name="password_confirm" id="password_confirm" placeholder="Retype password">
            <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-8">

            </div><!-- /.col -->
            <div class="col-xs-4">
              <button type="submit" id="submit" class="btn btn-primary btn-block btn-flat">Register</button>
            </div><!-- /.col -->
          </div>
        </form>

        <a href="{{url('admin/login')}}" class="text-center">I already have a membership</a>
      </div><!-- /.form-box -->
    </div><!-- /.register-box -->


   
@stop
@section('scripts')
 <script>
$(document).ready(function(){

  $(function() {
    $("#password_confirm").keyup(function() {
        var password = $("#password").val();
        $("#checkpass").html(password == $(this).val()
            ? "Passwords match."
            : "Passwords do not match!"
        );
    });
  });​
});
   </script>
@stop