<div class="bg-white">

    <div class="bg-gray px-4 py-2 bg-light">
      <p class="h5 mb-0 py-1" style="text-align: center">{{__('traduction.CONV')}}</p>
    </div>
    <div class="messages-box ">
      @for ($i = 0; $i < count($myconversations); $i++)

      <div class="list-group rounded-0 ">
        <a class="list-group-item list-group-item-action rounded-0 conversation" id="{{$myconversations[$i]->id}}" >
          <div  class="media"><img src="{{url('profilepics/'.$users[$i]->photo)}}" style="height:70px;width:100px" alt="user"  width="50" class="rounded-circle ">
            <div class="media-body ml-4">
              <div class="d-flex align-items-center justify-content-between mb-1">
                <h6 class="mb-0">{{$users[$i]->UserName}}</h6><small class="small font-weight-bold">{{$myconversations[$i]->created_at}}</small>
              </div>
              @if (count($messages)>0)
              @if ($messages[$i]!=null)
              <div class="col-12" style="display: flex;align-content:space-between">
              <p class="font-italic mb-0 text-small">{{$messages[$i][0]->content}}</p><span id="newornot{{$myconversations[$i]->id}}"></span>
            </div>
            <p class="font-italic mb-0 text-small " style="text-align: center">{{__('traduction.TAO')}} {{$annonces[$i]->Title}}</p>

              @if ($messages[$i][0]->Sender!=session('userid') && $messages[$i][0]->Read_At==Null)
                  <script>
                    $("#newornot"+"{{$myconversations[$i]->id}}").html("<h6 style='color:green'>&ensp;o</h6>");
                  </script>
              @endif
              @else
              <p class="font-italic mb-0 text-small " style="text-align: center">{{__('traduction.TAO')}} {{$annonces[$i]->Title}}</p>
              @endif
              @else
              <p class="font-italic mb-0 text-small " style="text-align: center">{{__('traduction.TAO')}} {{$annonces[$i]->Title}}</p>
              @endif
            </div>
          </div>
        </a>



      </div>
      @endfor

    </div>

  </div>
  <script>
    $('.conversation').click(function(){
    convid=$(this).attr('id');
    var ajaxurl="{{url('/')}}"+"/conversations/"+convid;
    $.ajax({
        url:ajaxurl,
        success:function(data){
            $('#messagesside').html(data);
            convisselected=true;
            $("#newornot"+convid).html("");
            var ajaxurl="api/getConversationByIdApi/"+convid;
            $.ajax({
        url:ajaxurl,
        success:function(data){
          if (data.status=="expire") {
            $('.input').attr('hidden','hidden');
          }
          else{
            $('.input').removeAttr('hidden');
          }
        },
    error:function(er){
      console.log(er);
    }
    })
        },
    error:function(er){
      console.log(er);
    }
    })
})
  </script>



