<head>        <meta name="csrf-token" content="{{csrf_token()}}">
</head>
<!--profile-->
<div class="container rounded bg-white mt-5">
    <div class="row">
        <div class="col-md-4 border-right">
            <form id="ppcf" action="{{url('api/ProfilePicChangingApi')}}" method="post" enctype="multipart/form-data">
                @csrf
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img id="im"  class="rounded-circle mt-5 fake" src="{{url('profilepics/'.$admin->photo)}}" width="150" height="150"><span class="font-weight-bold">{{$admin->UserName}}</span><span class="text-black-50">{{$admin->email}}</span><span>{{$admin->City}}</span></div>
               <input id="real" type="file" name="pp" hidden="hidden">
               <input type="text" name="UserName" value="{{$admin->UserName}}" hidden="hidden">
        </form>
        </div>

        <div class="col-md-8">
            <div class="p-3 py-5">
                <form id="up" method="POST" action="{{url('/UpdateProfile')}}">
                    @csrf
                    <div class="response"></div>
                <div class="row mt-2">
                    <div class="col-md-6"><input type="text" name="UserName" class="form-control" placeholder="{{__('traduction.UN')}}" value="{{$admin->UserName}}">                    <span style="width:100%;text-align:center" class="UserName_error"></span>
                    </div>
                    <div class="col-md-6"><input type="password" name="password" id="pass" class="form-control" value="{{$adminpass}}" placeholder="{{__('traduction.PASS')}}">                 <span style="width:100%;text-align:center"  class="password_error"></span>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6"><input type="text" name="phoneNumber" class="form-control" value="{{$admin->phoneNumber}}" placeholder="{{__('traduction.PN')}}">                   <span style="width:100%;text-align:center"  class="phoneNumber_error"></span>
                    </div>
                    <div class="col-md-6"><input type="date" name="birthdate" class="form-control" value="{{$admin->birthdate}}" placeholder="{{__('traduction.BD')}}">                  <span style="width:100%;text-align:center"  class="birthdate_error"></span>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12"><input type="email" name="email" class="form-control" placeholder="{{__('traduction.Email')}}" value="{{$admin->email}}">                   <span style="width:100%;text-align:center" class="email_error"></span>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12">
                    <input id="hint3"  type="text" class="form-control" value="{{$admin->City}}" name="City" placeholder="{{__('traduction.City')}} " list="depart" >

                    <datalist id="depart" style="text-align: center">
                      <script>
                        $.ajax({
                     type: "GET",
                     url: "{{url('js/moroccocities.json')}}",
                     data: 'ok=ok',
                     dataType: 'json'
                  }).done(function(data){
                    for(var i in data){
                    $('#depart').append("<option value='"+data[i].city+"'>");
                      $('#destination').append("<option value='"+data[i].city+"'>");


                                    }

                  })
                    </script>
                    </datalist>
                    <span style="width:100%;text-align:center" class="City_error"></span>
                    </div>
                </div>
                <input id="name" type="text" value="{{$admin->UserName}}" name="U" hidden="hidden">

                <div class="mt-5 text-right"><input type="submit" class="btn btn-warning profile-button"  id="save" value="{{__('traduction.SAVE')}} "></div>

            </form>
            </div>
        </div>

    </div>
</div>
<script>
    //*****ajax setup *********************//
  $.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});
//****************profile Update Request**************************//
$('#up').on('submit',function(e){
e.preventDefault();
var form=$(this);
for (var pair of new FormData(form[0]).entries()) {
    console.log(pair[0]+ ', ' + pair[1]);
}$.ajax({
url:form.attr('action'),
type:form.attr('method'),
data:new FormData(form[0]),
processData:false,
contentType:false,

success:function(result){
  if(result.code==0){
    $.each(result.error,function(prefix,val){
    form.find('span.'+prefix+'_error').text(val[0]);
    });
  }
  else{
    if(result.code==1){
      $('.response').addClass('alert alert-success');
      console.log(result);
      $('.response').html(result.msg);

    }
    else{
      $('.response').addClass('alert alert-success');
      $('.response').html(result.msg);
      console.log(result);
      $('#name').val(result.username);
    }
  }

},
error:function(er){
  console.log(er);
}
});
})

  </script>
