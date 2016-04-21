@extends('layouts/baseLogin')


@section('body')
<div class="login-box">
  <div class="login-logo">
    <a href="{{url('home')}}"><b>Palubon</b>Store</a>
  </div><!-- /.login-logo -->
  @if(url()->current()===url('admin/login/success'))
  <div class="callout callout-success">
  	<p>Successfuly Registered!</p>
  </div>
  @endif
  @if(url()->current()===url('admin/login/failed'))
  <div class="callout callout-danger">
  	<p>Failed to login!</p>
  </div>
  @endif
  @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>
    <form action="{{url('admin/login')}}" method="post">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <div class="form-group has-feedback">
        <input type="email" class="form-control" name="email" placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" name="password" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          
        </div><!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div><!-- /.col -->
      </div>
    </form>
    <a href="#">I forgot my password</a><br>
    <a href="{{url('admin/signup')}}" class="text-center">Register a new membership</a>

  </div><!-- /.login-box-body -->
</div><!-- /.login-box -->
@stop

@section('scripts')
 <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
@stop