@extends('auth.authlayout')
@section('content')
<div class="row align-items-center" style="height: 100%">
    <div class="col-md-1 d-none d-md-block" style="height: 100%;"></div>
     <div class="col-md-4 d-none d-md-block" style="height: 100%;">
<img src="{{ url('images/undraw_add_user_re_5oib.svg')}}" class="img-fluid">
</div>
    <div class="col-md-6">
        <div class="card-body">
            <h2 class="mb-3 f-w-400 " align="center" >انضم لنا</h2>
            @if (session()->has('failed'))
                <div class="alert alert-danger">
                    {{session()->get('failed')}}
                </div>
            @endif
            <form method="POST" action="{{url('Register')}}">
                @csrf
            <div class="input-group mb-2" >
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class='bx bx-user'></i></i></span>
                </div>
                <input type="text" style="text-align: center" class="form-control" placeholder="اسم المستخدم" value="{{old ('UserName')}}" name="UserName">
                <br>
                <span style="color: red;width:400px">@error('UserName'){{$message}}@enderror</span>
            </div>
            <div class="input-group mb-2">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class='bx bx-envelope'></i></i></span>
                </div>
                <input type="email" style="text-align: center" class="form-control" placeholder="البريد الالكتروني" value="{{old ('Email')}}" name="Email">
                <br>
                <span style="color: red;width:400px">@error('Email'){{$message." The Email Must Be Like 'xxxx@gmail.com'"}}@enderror</span>
            </div>
            <div class="input-group mb-2">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class='bx bx-phone'></i></i></span>
                </div>
                <input type="number" style="text-align: center" class="form-control" placeholder="رقم الهاتف" name="phoneNumber" value="{{old ('phoneNumber')}}">
                <br>
                <span style="color: red;width:400px">@error('phoneNumber'){{$message." The Phone Number Must Be Like '06/07 11111111'"}}@enderror</span>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="bx bx-star"></i></span>
                </div>
                <input type="date" style="text-align: center" class="form-control" name="Bdate">
                <br>
                <span style="color: red;width:400px">@error('Bdate'){{$message}}@enderror</span>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="bx bx-star"></i></span>
                </div>
                <input class="form-control" style="text-align: center" id="location"  type="text" name="city" list="depart" placeholder="المدينة" >
                <datalist id="depart">
                </datalist>                <br>
                <span style="color: red;width:400px">@error('city'){{$message}}@enderror</span>
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="bx bx-lock-alt"></i></span>
                </div>
                <input type="password" style="text-align: center" class="form-control" placeholder="كلمة السر" name="password">
                <br>
                <span style="color: red;width:400px">@error('password'){{$message}}@enderror</span>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="bx bx-lock-alt"></i></span>
                </div>
                <input type="password" style="text-align: center" class="form-control" placeholder="تاكيد كلمة السر" name="password_confirmation">
            </div>
            
            
            
            <span style="color: white">.......................................................</span><input type="submit" value="انضمام" align="center" class="btn btn-primary shadow-2 mb-4 mx-auto login">
            </form>
            <p class="mb-0 text-muted text-center">لديك حساب? <a href="signin" class="f-w-400"> تسدبل الدخول</a></p>
        </div>
    </div></div>
   
@endsection

