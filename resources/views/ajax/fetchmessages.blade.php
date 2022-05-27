@if (count($messages)>0)
@foreach ($messages as $message)
@if ($message->Sender==session('userid'))
        <!-- Sender Message-->

<div class="media w-50 ml-auto mb-3">
  <div class="media-body">
    <div class=" rounded py-2 px-3 mb-2" style="background-color: #e29f01;color:black">
      <p class="text-small mb-0 ">{{$message->content}}</p>
    </div>
    <p class="small text-muted">{{$message->created_at}}</p>
  </div>
</div>
@else
        <!-- Reciever Message-->

<div class="media w-50 mb-3"><img src="{{url('profilepics/'.$messagewith->photo)}}" alt="user" width="50" class="rounded-circle">
  <div class="media-body ml-3">
    <div class="bg-light rounded py-2 px-3 mb-2">
      <p class="text-small mb-0 text-muted">{{$message->content}}</p>
    </div>
    <p class="small text-muted">{{$message->created_at}}</p>
  </div>
</div>
@endif
@endforeach
@else
<div class="col-12"><img src="{{url('images/Hello-rafiki.svg')}}" alt="user" width="100%" height="100%" class="rounded-circle"></div>
@endif

