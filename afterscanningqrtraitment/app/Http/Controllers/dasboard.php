<?php

namespace App\Http\Controllers;

use App\Models\Support;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class dasboard extends Controller
{
    //
    function usersrecord($userid){
        $user=DB::table('users')->where('id',$userid)->first();
        if ($user){
            return view('usersrecord',compact('user'));
        }
        else{
            return redirect('/');
        }
    }

    function checksupportcodeapi($suppcode){
        $supportexist=Support::where('Code',$suppcode)->count();
        return response()->json(['res'=>$supportexist]);
    }

    function exchangeapi($userid,$amounttopay){
        $user=DB::table('users')->where('id',$userid)->first();
        $amounttopoints=$amounttopay*10;
        if ($user->Points-$amounttopoints>=0){
            return response()->json(['code'=>'1','pointtodiscount'=>$amounttopoints]);
        }
        else{
            $diff=($amounttopoints-$user->Points)/10;
            return response()->json(['code'=>'0','amounttopay'=>$diff]);
        }
    }

    function discountpoints(Request $req){
        if($req->pointtodiscount=="all"){
            $user1=DB::table('users')->where('id',$req->userid)->update([
                'Points'=>0,
            ]);
        }
        else{
            $user=DB::table('users')->where('id',$req->userid)->first();
            $user1=DB::table('users')->where('id',$req->userid)->update([
                'Points'=>$user->Points-$req->pointtodiscount,
            ]);
        }
        return json_encode("hello");
    }

    function form2ofdisc(){
        return view('ajax.form2');
    }
    function form3ofdisc(){
        return view('ajax.form3');
    }

}
