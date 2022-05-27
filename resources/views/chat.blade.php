<link rel="stylesheet" href="{{ url('css/chat.css')}}">
@extends('glayouts.nav-bar')
<script src="{{ url('js/jquery.js')}}"></script>
<script src="{{ url('js/chattraitement.js')}}"></script>

<style>
  .nav{
    margin-left: -25px;
  }
</style>

<div class="container-fluid py-5 px-4 ">
  <!-- For demo purpose-->
  <header class="text-center" style="height: 50px">
    
  </header>

  <div class="row rounded-lg overflow-hidden shadow">
    <!-- Users box-->
    <div id="conversationsside" class="col-5 px-0">
      @include('ajax.fetchconversations')
    </div>
    <!-- Chat Box-->
    <div class="col-7 px-0"  >
      <div class="px-4 py-5 chat-box" style="position: relative" id="messagesside">
        <img width="100%" height="400px" src="{{url('images/New message-bro.svg')}}">
        <h6 align="center">اختر محادثة وابدء الدردشة في حال ليس لديك محادثات عليك التفاعل مع مجتمعنا اما بالعرض او الطلب</h6> 

    </div>
    <!-- Typing area -->
    <div class="input-group mx-auto input" hidden="hidden">
      <input type="text" id="msg" placeholder="Type a message"  aria-describedby="button-addon2" class="form-control rounded-0 border-0 py-4 bg-light">
      <div class="input-group-append" >
        <button   id="button-addon2" type="submit" class="btn btn-link send"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-send" viewBox="0 0 16 16">
          <path d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576 6.636 10.07Zm6.787-8.201L1.591 6.602l4.339 2.76 7.494-7.493Z"/>
        </svg></button>
      </div>
    </div>

  </div>
</div>
<script>
  var convid;
  var userid="{{session('userid')}}";
  var convisselected=false;
  

  

$('.send').click(function(){
  var content=$("#msg").val();
  $("#msg").val("");
  if (content!="") {
    $.ajax({
                                url: "{{url('api/sendmessageapi')}}",
                                type: 'POST',
                                data: {convid: convid,userid:userid,content: content},
                              success:function(res){
                                var ajaxurl="{{url('/')}}"+"/conversations/"+convid;
                                $.ajax({
        url:ajaxurl,
        success:function(data){
            $('#messagesside').html(data);
            $('.input').removeAttr('hidden');
            var x=$("#"+convid).find("p").html(content);
            $("#newornot").html("");
           

        },
    error:function(er){
      console.log(er);
    }
    })
                                
                

                                
                                  },
            error:function(er){
              console.log(er);
            }
    });
  }
})

$('#msg').keydown(function(event){
  if(event.keyCode === 13) {
    var content=$("#msg").val();
  $("#msg").val("");
  if (content!="") {
    $.ajax({
                                url: "{{url('api/sendmessageapi')}}",
                                type: 'POST',
                                data: {convid: convid,userid:userid,content: content},
                              success:function(res){
                                var ajaxurl="{{url('/')}}"+"/conversations/"+convid;
                                $.ajax({
        url:ajaxurl,
        success:function(data){
            $('#messagesside').html(data);
            $('.input').removeAttr('hidden');
            var x=$("#"+convid).find("p").html(content);
            $("#newornot").html("");

        },
    error:function(er){
      console.log(er);
    }
    })
                                
                

                                
                                  },
            error:function(er){
              console.log(er);
            }
    });
  }
  }
 
})

var selectedconv="{{$convid}}";
  if (selectedconv=="nope") {
    window.location="/";

  }
  if (selectedconv!="nope" && selectedconv!="null") {
    $("#"+selectedconv).click();
  } 

setInterval(() => {
  if(convisselected==true){
    var ajaxurl="{{url('/')}}"+"/conversations/"+convid;
                                $.ajax({
        url:ajaxurl,
        success:function(data){
            $('#messagesside').html(data);
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
  }
  
  var ajaxurl="{{url('/')}}"+"/getconv/";
                                $.ajax({
        url:ajaxurl,
        success:function(data){
            $('#conversationsside').html(data);
            

        },
    error:function(er){
      console.log(er);
    }
    })
    
}, 5000);


</script>

