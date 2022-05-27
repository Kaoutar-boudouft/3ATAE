<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\message;
Use \Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Facades\DB;



class MessageController extends Controller
{
    //
    function sendmessageapi(Request $req){
        $curedate=Carbon::now();
        $message=new message;
        $message->IdConversation=$req->convid;
        $message->Sender=$req->userid;
        $message->content=$req->content;
        $message->SendAt=$curedate;
        $message->save();
    }

    static function getUnreadMessages($userid){
        $newmessages=DB::select("select * from messages where Sender!='".$userid."' and Read_At is null and idConversation in(select id from conversations where TheOwnerOfOffer='".$userid."'  or TheWinner='".$userid."')");
        $senders=array();
        
        foreach ($newmessages as $newmessage) {
           $sender=User::where('id',$newmessage->Sender)->first();
           array_push($senders,$sender);
        }
        return view('ajax.fetchmessagesnotif',['newmessages'=>$newmessages,'senders'=>$senders]);
    }
}
