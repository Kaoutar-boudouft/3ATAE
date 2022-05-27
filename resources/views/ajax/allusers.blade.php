<link rel="stylesheet" href="{{url('css/userstablestyle.css')}}">
<div class="container uc">
    <div class="table-wrap">
        <table class="table table-borderless table-responsive">
            <thead>
                <tr>
                    <th class="text-muted fw-600">{{__('traduction.Email')}}</th>
                    <th class="text-muted fw-600">{{__('traduction.UN')}}</th>
                    <th class="text-muted fw-600">{{__('traduction.VD')}}</th>
                    <th class="text-muted fw-600">{{__('traduction.ON')}}</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <input id="numberofitemsinpage" type="text" value="{{count($users)}}" hidden="hidden" >
                @for ($i = 0; $i < count($users); $i++)
                <tr class="align-middle alert" role="alert">

                    <td >
                        <div class="d-flex align-items-center">
                            <div class="img-container">
                                <img src="{{url('profilepics/'.$users[$i]->photo)}}"
                                    alt="" width="50" height="50">
                            </div>
                            <br>
                            <div class="ps-3">
                                <div class="fw-600 pb-1">{{$users[$i]->email}}</div>
                                <p class="m-0 text-grey fs-09">Join In: {{$users[$i]->created_at}}</p>
                            </div>
                        </div>
                    </td>
                    <td >
                        <div class="fw-600">{{$users[$i]->UserName}}</div>
                    </td>
                    <td>
                        <div class="d-inline-flex align-items-center active">
                            <div class="circle"></div>
                            <div class="ps-2">{{$users[$i]->validationlevel}}</div>
                        </div>
                    </td>
                    <td>
                        <div class="d-inline-flex align-items-center active">
                            <div class="circle"></div>
                            <div class="ps-2">{{$annoncescountperuser[$i]}}</div>
                        </div>
                    </td>
                    <td>
                        <div class="btn p-0 remuser" id="{{$users[$i]->id}}">
                            <span class="fas fa-times"></span>
                        </div>
                    </td>
                </tr>

                @endfor

            </tbody>
        </table>
        <div class="row">
            <div class="col-2"></div>
            <div class="col-3 pages_link mx-auto">  {{$users->onEachSide(1)->links()}}</div>
            <div class="col-4"></div>
          </div>
    </div>
</div>
<script>

    function fetch_data(page){
          $.ajax({
              url:"/getallusersblade?page="+page,
              success:function(data){
                  $(".uc").html(data);
                  removeuser();






              },
          error:function(er){
            console.log(er);
          }
          })
      }
$(document).on('click','.pages_link a',function(e){
          e.preventDefault();
          var page=$(this).attr('href').split('page=')[1];
          tovalidatepage=page;
          fetch_data(page);

      });

      function removeuser(){
        $('.remuser').click(function(){
            var userid=$(this).attr('id');
            alert(userid);
            $.ajax({
                                url: "{{url('/api/removeUserapi')}}",
                                type: 'POST',
                                data: { _method:'delete', userid: userid, _token: '{{csrf_token()}}' },
                              success:function(res){
                                if ($('#numberofitemsinpage').val()<=1) {
                        tovalidatepage--;
                    }
                    fetch_data(tovalidatepage);

                               alert();


                                  },
            error:function(er){
              console.log(er);
            }
    });


})
      }
      removeuser();

</script>
