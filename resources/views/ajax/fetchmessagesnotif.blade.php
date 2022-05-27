@if ($newmessages!=null)
<h2>{{__('traduction.NOTIF')}} - <span id="notifcount">{{count($newmessages)}}</span></h2>
@for ($i = 0; $i < count($newmessages); $i++)
<a style="text-decoration: none" href="{{url('chat/'.$newmessages[$i]->IdConversation)}}" class="notifications-item"> <img src="{{url('profilepics/'.$senders[$i]->photo)}}" alt="img">
    <div class="text">
        <h4>{{$senders[$i]->UserName}}</h4>
        <p>{{$newmessages[$i]->content}}</p>
    </div>
</a>
@endfor
@else
<h2>{{__('traduction.NOTIF')}} - <span id="notifcount">0</span></h2>
@endif


