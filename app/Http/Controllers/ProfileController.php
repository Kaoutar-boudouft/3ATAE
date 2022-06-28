<?php

namespace App\Http\Controllers;
use App\Models\Categories;
use App\Models\SousCategories;
use App\Models\Annonces;
Use \Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\AnnoncesController;
use Illuminate\Support\Facades\Crypt;
use Session;




use Illuminate\Http\Request;

class ProfileController extends Controller
{
    //
    function UserProfile(){
        if(!(session()->has('UserName'))){
            return redirect('home');
        }
        else{
            $user=User::where('UserName',session('UserName'))->first();
            $valideanncount=DB::table('annonces')->where('AnnonceurId',$user->id)->where('status','valider')->where('deleted_at',Null)->count();
            $encoursdevalidationanncount=DB::table('annonces')->where('AnnonceurId',$user->id)->where('status','encoursdevalidation')->where('deleted_at',Null)->count();
            $endiscussioncount=DB::table('annonces')->where('AnnonceurId',$user->id)->where('status','endiscussion')->where('deleted_at',Null)->count();
            $annonces=AnnoncesController::GetSDAPerUser('valider');
            $pass=Crypt::decryptString($user->password);
            return view('UserProfile',['user'=>$user,'pass'=>$pass,'valideanncount'=>$valideanncount,'encoursdevalidationanncount'=>$encoursdevalidationanncount,'annonces'=>$annonces,'endiscussioncount'=>$endiscussioncount]);
        }
    }

    /////////////////////////////////////////////////////
    function ProfilePicChangingApi(Request $req){
        $user=User::where('UserName',$req->UserName)->first();
        $file=$req->file('pp');
            $extension=$file->getClientOriginalExtension();
            $filename=$req->UserName.'.'.$extension;
            if($user->photo!="utilisateur.png"){
                File::delete('profilepics/'.$user->photo);
            }
            $file->move('profilepics/',$filename);
        $res=DB::table('users')->where('UserName',$req->UserName)->update([
            'photo'=>$filename
        ]);
    }
    /////////////////////////////////////////////
    function UpdateProfileApi(Request $req){

        $user=User::where('UserName',$req->U)->first();
        if($req->email!=$user->email){
            $res=DB::table('users')->where('UserName',$req->U)->update([
                'UserName'=>$req->UserName,
                'email'=>$req->email,
                'phoneNumber'=>$req->phoneNumber,
                'birthdate'=>$req->birthdate,
                'City'=>$req->City,
                'password'=>Crypt::encryptString($req->password),
                'confmssg'=>'',
                'confnumber'=>'',
                'validationlevel'=>0,
            ]);
            return "0";

        }
        if($req->phoneNumber!=$user->phoneNumber){
            $res=DB::table('users')->where('UserName',$req->U)->update([
                'UserName'=>$req->UserName,
                'email'=>$req->email,
                'phoneNumber'=>$req->phoneNumber,
                'birthdate'=>$req->birthdate,
                'City'=>$req->City,
                'password'=>Crypt::encryptString($req->password),
                'confnumber'=>'',
                'validationlevel'=>1,
            ]);
            return "1";
        }
        else{
                $res=DB::table('users')->where('UserName',$req->U)->update([
                    'UserName'=>$req->UserName,
                    'email'=>$req->email,
                    'phoneNumber'=>$req->phoneNumber,
                    'birthdate'=>$req->birthdate,
                    'City'=>$req->City,
                    'password'=>Crypt::encryptString($req->password),
                ]);
                return "2";


        }

    }

    ///////////////////////////////////////////////
    function  UpdateProfile(Request $req){
        $validator=\Validator::make($req->all(),[
            'UserName' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255','regex:/[a-zA-Z0-9._-]+@gmail.com/i'],
            'phoneNumber'=>['required'],
            'birthdate' =>['required','date','before:-18 years'],
            'City' =>['required'],
            'password' => ['required', 'string', 'min:8'],
        ]);
        if(!$validator->passes()){
            return response()->json(['code'=>0,'error'=>$validator->errors()->toArray()]);
        }
        else{

            $updatingresponse=$this->UpdateProfileApi($req);
            if($updatingresponse=="0" || $updatingresponse=="1" ){
                session()->forget('UserName');
                session()->forget('email');
                return response()->json(['code'=>1,'msg'=>"Your Profile Updated Successfully!you should ReLogin to confirm your data"]);
            }
            else{
                Session::put("UserName",$req->UserName);
            Session::save();
            return response()->json(['code'=>2,'msg'=>"Your Profile Updated Successfully!",'username'=>$req->UserName]);
            }
        }

    /////////////////////////////////////////////////////////////

}
    /**
     * @throws \Exception
     */
    function UpdateProfilePicBase64(Request $req){
        //$user=User::where('id',$req->UserId)->first();
        $validator=\Validator::make($req->all(),[
            'UserName' =>['required'],
            'image'=>['required'],
        ]);
        if(!$validator->passes()){
            return response()->json(['code'=>0,'error'=>$validator->errors()->toArray()]);
        }
        else{
            $filename="$req->UserName".".jpg";
            file_put_contents("profilepics/".$filename,base64_decode($req->image));
            $res=DB::table('users')->where('UserName',$req->UserName)->update([
                'photo'=>$req->UserName.".jpg",
            ]);
            return response()->json(['code'=>1]);
        }

    }

    function UpdateUserName(Request $req){
        $validator=\Validator::make($req->all(),[
            'userid'=>['required'],
            'UserName' =>['required', 'string', 'unique:users', 'max:255'],
        ]);
        if(!$validator->passes()){
            return response()->json(['code'=>0,'error'=>$validator->errors()->toArray()]);
        }
        else{
            $res=DB::table('users')->where('id',$req->userid)->update([
                'UserName'=>$req->UserName,
            ]);
            return $res;
        }
    }

    function UpdateCity(Request $req){
        $validator=\Validator::make($req->all(),[
            'userid'=>['required'],
            'city' =>['required'],
        ]);
        if(!$validator->passes()){
            return response()->json(['code'=>0,'error'=>$validator->errors()->toArray()]);
        }
        else{
            $res=DB::table('users')->where('id',$req->userid)->update([
                'City'=>$req->city,
            ]);
            return $res;
        }
    }

    function GetUserById($UserId){
        $user=User::where('id',$UserId)->first();
        return $user;
    }


    function GetUserByUserName($UserName){
        $user=User::where('UserName',$UserName)->first();
        return $user;
    }

    function getitemsofuser($userid){
        $annonces=DB::select("select annonces.* from annonces,userwantoffer where annonces.id=userwantoffer.AnnonceId and userwantoffer.UserWhoWant='".$userid."' and annonces.status='valider' ");
        return $annonces;

    }

    function cancelItemIwant(Request $req){

    }

}








