<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\conversation;
Use \Carbon\Carbon;
use App\Models\User;
use App\Models\message;
use Illuminate\Support\Facades\Validator;    
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use App\Models\Annonces;


class ConversationController extends Controller
{
    //
    public static function addnewconversation(Request $req){
        $conversation=new conversation;
        $conversation->TheOwnerOfOffer=$req->ownerid;
        $conversation->TheWinner=$req->winnerid;
        $conversation->AnnId=$req->annid;
        $conversation->save();
        $convid=DB::select("select id from conversations order by created_at desc limit 1");
        return $convid;
    }
////////////////////////////////////////////////////


        function conversationblade(){
            $myconversations=DB::select("select * from conversations where TheOwnerOfOffer='".session('userid')."' or TheWinner='".session('userid')."' ");
            $users=array();
            $annonces=array();
            $lastsmessages=array();
            $userid=-1;
            foreach ($myconversations as $conv) {
                if ($conv->TheOwnerOfOffer!=session('userid')) {
                    $userid=$conv->TheOwnerOfOffer;
                }
                else{
                    $userid=$conv->TheWinner;
                }
                $user=User::where('id',$userid)->first();
                array_push($users,$user);
            }
            foreach ($myconversations as $conv) {
                $annonce=Annonces::where('id',$conv->AnnId)->first();
                array_push($annonces,$annonce);
            }
            foreach ($myconversations as $conv) {
                $lastmessage=DB::select("select * from messages where IdConversation='".$conv->id."' order by created_at desc limit 1 ");
                array_push($lastsmessages,$lastmessage);
            }
            return view('ajax.fetchconversations',['myconversations'=>$myconversations,'users'=>$users,'messages'=>$lastsmessages,'annonces'=>$annonces]);
        }

        /////////////////////////////////////


        function messagesblade($id){
            $userid=-1;
            $conv=conversation::where('id',$id)->first();
           
            if($conv->TheOwnerOfOffer!=session('userid')){
                $userid=$conv->TheOwnerOfOffer;
            }
            else{
                $userid=$conv->TheWinner;
            }
            $messagewith=User::where('id',$userid)->first();
            $messages=DB::select("select * from messages where IdConversation='".$id."' order by SendAt desc");
            foreach ($messages as $message) {
                if($message->Sender!=session('userid')){
                    $curedate=Carbon::now();
                    $annonce=DB::table('messages')->where('id',$message->id)->update([
                        'Read_At'=>$curedate,
                    ]);
                }
            }
            return view('ajax.fetchmessages',['messagewith'=>$messagewith,'messages'=>$messages,'annid'=>$id]);
        }

///////////////////////////////////////////////

            function chatblade($id=null){
                
                $myconversations=DB::select("select * from conversations where TheOwnerOfOffer='".session('userid')."' or TheWinner='".session('userid')."' ");
            $users=array();
            $annonces=array();
            $lastsmessages=array();
            $userid=-1;
            $convidexist=false;
            $convid;
            foreach ($myconversations as $conv) {
                if ($conv->TheOwnerOfOffer!=session('userid')) {
                    $userid=$conv->TheOwnerOfOffer;
                }
                else{
                    $userid=$conv->TheWinner;
                }
                $user=User::where('id',$userid)->first();
                array_push($users,$user);
            }
            foreach ($myconversations as $conv) {
                $annonce=Annonces::where('id',$conv->AnnId)->first();
                array_push($annonces,$annonce);
            }
            foreach ($myconversations as $conv) {
                $lastmessage=DB::select("select * from messages where IdConversation='".$conv->id."' order by created_at desc limit 1 ");
                array_push($lastsmessages,$lastmessage);
            }
            
            if($id==null){
                $convid="null";
            }
            else{
                foreach ($myconversations as $conv) {
                    if($id==$conv->id){
                        $convidexist=true;
                    }
                }
                if($convidexist==false){
                    $convid="nope";
                }
                else{
                    $convid=$id;
                }
            }
            return view('chat',['myconversations'=>$myconversations,'users'=>$users,'messages'=>$lastsmessages,'annonces'=>$annonces,'convid'=>$convid]);
        
            }





//////////////////////////////////////////////////

            function getConversationByIdApi($id){
                $conv=conversation::where('id',$id)->first();
                return $conv;
            }
    
}
