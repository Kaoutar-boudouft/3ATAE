@extends('auth.authlayout')
@section('content')
<div class="col-md-6">
    <div class="card-body">
        <h4 class="mb-3 f-w-400" align="center">استعادة كلمة السر</h4>
        @if (session()->has('status'))
        <div class="alert alert-warning">{{session('status')}}</div>
        @else
        <form method="POST" action="{{url('sendpass')}}">
            @csrf
                            <div class="input-group mb-4">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="bx bx-envelope"></i></span>
                                </div>
                                <input type="email" style="text-align: center" name="email" class="form-control" placeholder="البريد الالكتروني">
                                <span style="color: red;width:400px">@error('email'){{$message." The Email Must Be Like 'xxxx@gmail.com'"}}@enderror</span>

                            </div>
                            <span style="color: white">..................................................</span>
                                <input type="submit" value="استعادة" class="btn btn-primary mx-auto  login">
                            <br>
                            <br>
        </form>  
    @endif
       

                            <p class="mb-0 text-muted text-center">ليس لديك حساب? <a href="{{url('signup')}}" class="f-w-400">انضم الان</a></p>
</div>
</div>
<div class="col-md-6 d-none d-md-block" style="height: 100%;">
    <img src="{{ url('images/undraw_forgot_password_re_hxwm.svg')}}" class="img-fluid">
</div>
@endsection
