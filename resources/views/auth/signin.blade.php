@extends('auth.authlayout')
@section('content')
@php
$username="";
$pass="";
$checked=false;
  if(isset($_COOKIE['username']))  {
      $username=$_COOKIE['username'];
      $pass=$_COOKIE['password'];
      $checked=true;
  }
@endphp
<div class="col-md-6">
    <div class="card-body">
        <h2 class="mb-3 f-w-400 " align="center">سجل دخولك لحسابك الشخصي</h2>
        @if (session()->has('status'))
            <div class="alert alert-warning">{{session('status')}}</div>
        @endif
        <form method="POST" action="{{url('Login')}}">
            @csrf
        <div class="input-group mb-2">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class='bx bx-user'></i></i></span>
            </div>
            <input type="text" style="text-align: center" class="form-control" placeholder="اسم المستخدم" name="UserName" value="{{$username}}">
            <br>
            <span style="color: red;width:400px">@error('UserName'){{$message}}@enderror</span>
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="bx bx-lock-alt"></i></span>
            </div>
            <input type="password" style="text-align: center" class="form-control" placeholder="كلمة السر" name="password" value="{{$pass}}">
            <br>
            <span style="color: red;width:400px">@error('password'){{$message}}@enderror</span>
        </div>
        
        <div class="form-group text-left mt-2">
            <div class="checkbox d-inline">
                @if ($checked)
                <input type="checkbox" name="rmemeber" checked id="checkbox-fill-a1" >
                @else
                <input type="checkbox" name="rmemeber" id="checkbox-fill-a1" >
                @endif
                <label for="checkbox-fill-a1" class="cr">حفظ البيانات</label>

            </div>
        </div>
        <input type="submit" value="دخول" name="login" class="btn btn-primary shadow-2 mb-4 login">
        </form>
        <p class="mb-2 text-muted text-center">نسيت كلمة السر? <a href="{{url('reset')}}" class="f-w-400">استعادة كلمة السر</a></p>
        <p class="mb-0 text-muted text-center">لا تملك حسابا? <a href="{{url('signup')}}" class="f-w-400">انشئ حسابا</a></p>
    </div>
</div>
<div class="col-md-6 d-none d-md-block" style="height: 100%;">
    <img src="{{ url('images/undraw_welcome_cats_thqn.svg')}}" class="img-fluid">
</div>
@endsection

