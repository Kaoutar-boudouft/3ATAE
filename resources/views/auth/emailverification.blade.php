@extends('auth.authlayout')
@section('content')
<div class="col-md-6">
    <div class="card-body">
        <h3 class="mb-2 f-w-400" align="center">التحقق من البريد الالكتروني</h3>
        @if (session()->has('status'))
        <div class="alert alert-warning">{{session('status')}}</div>
    @endif
        <p class="mb-4" style="text-align: center">نحتاج لفعل هذا من اجل سلامة مجتمعنا!</p>
        <form method="POST" action="{{url('/ValidateEmail')}}">
            @csrf
        <div class="input-group mb-2">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="bx bx-message-check"></i></span>
            </div>
            <input type="text" class="form-control" style="text-align: center" placeholder="ادخل الرمز الذي تلقيته عبر البريد" name="codepin">
            <input type="text" class="form-control" placeholder="Enter The recieved code" value="{{session('UserNametoVE')}}" name="UserName" hidden="hidden">
            <input type="text" class="form-control" placeholder="Enter The recieved code" value="{{session('passwordtoVE')}}" name="password" hidden="hidden">

            <div class="input-group-append">
                <input type="submit" value="تاكيد" class="btn btn-primary  login">
            </div>
            <span style="color: red;width:400px">@error('codepin'){{$message}}@enderror</span>

        </div>
        </form>
</div>
</div>
<div class="col-md-6 d-none d-md-block" style="height: 100%;">
    <img src="{{ url('images/undraw_two_factor_authentication_namy.svg')}}" class="img-fluid">
</div>
@endsection
