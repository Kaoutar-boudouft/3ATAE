<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Mail;
use App\Mail\verifyemail;
use App\Mail\restpass;
use Illuminate\Support\Str;
Use \Carbon\Carbon;
use App\Http\Controllers\AnnoncesController;
use App\Http\Controllers\MessageController;
use App\Models\Annonces;
use SimpleSoftwareIO\QrCode\Facades\QrCode;





class auth extends Controller
{

    function index(){
        $categories=AnnoncesController::GettingSDCategoryApi();
        $souscategories=AnnoncesController::GettingallSousCategoryApi();
        $recentsann=AnnoncesController::GetRecentsOffersApi();
        $annonces=Annonces::where('id',10)->paginate(10);
        if(session()->has('UserName')){
            $user=User::where('UserName',session('UserName'))->first();
            if ($user->admin==true) {
                return redirect('dashboard');
            }
            else{
                $offersiwant=AnnoncesController::GetOffersIWantApi(session('userid'));
                $newmessage=MessageController::getUnreadMessages(session('userid'));
                return view('homepage',['user'=>$user,'categories'=>$categories,'souscategories'=>$souscategories,'recents'=>$recentsann,'annonces'=>$annonces,'offersiwant'=>$offersiwant,'newmessage'=>$newmessage]);

            }

        }
        else{
            return view('homepage',['categories'=>$categories,'souscategories'=>$souscategories,'recents'=>$recentsann,'annonces'=>$annonces]);
        }
        }

    //////////////////////////////////////////////////////////////////////////////////////////////////////

    function LoginApi(Request $req){
        $user=User::where('UserName',$req->UserName)->get();
        if(count($user)>0){
            if((Crypt::decryptString($user[0]->password))==$req->password){
                if($user[0]->validationlevel==0){
                    if($user[0]->confmssg==''){
                        $randomString = Str::random(30);
                        DB::table('users')->where('UserName',$req->UserName)->update([
                            'confmssg'=>$randomString
                        ]);
                        $details=[
                            'title'=>'3ATAE',
                            'body'=>'Dear'.$req->UserName.' this is your CODEPIN : <br>'.$randomString.''
                        ];
                        Mail::to($user[0]->email)->send(new verifyemail($details));
                    }
                    return '0';
                }
                elseif($user[0]->validationlevel==1){
                    if($user[0]->confnumber==''){
                        $randompin=Str::random(4);
                        DB::table('users')->where('UserName',$req->UserName)->update([
                            'confnumber'=>$randompin
                        ]);
                        $basic  = new \Vonage\Client\Credentials\Basic("1deacccd", "BiVX4dxp88t9ZzJh");
                        $client = new \Vonage\Client($basic);
                        $response = $client->sms()->send(
                            new \Vonage\SMS\Message\SMS('212'.$user[0]->phoneNumber, "AATAE", 'Your Verification PIN is : '.$randompin)
                        );
                    }
                    return '1';
                }
                else{
                    return '2';
                }
            }
            else{
                return "incorrect password";
            }
        }
        else{
            return "invalide user information";
        }
    }

    //////////////////////////////////////////////////////////////////////////////

    function RegistrationApi(Request $req){
        $msg='';
        if(count(User::where('UserName',$req->UserName)->get())!=0){
            $msg=$msg." UserName Already Used ,";
        }
        if(count(User::where('email',$req->Email)->get())!=0){
            $msg=$msg." Email Already Used ,";
        }
        if(count(User::where('phoneNumber',$req->phoneNumber)->get())!=0){
            $msg=$msg." Phone Number Already Used ,";
        }

        if($msg==''){
            $user=new user;
            $user->UserName=$req->UserName;
            $user->email=$req->Email;
            $user->phoneNumber=$req->phoneNumber;
            $user->birthdate=$req->Bdate;
            $user->City=$req->city;
            $user->password=Crypt::encryptString($req->password);

            $user->save();
            return "User Add";
        }
        else{
            return $msg;
        }

    }

//////////////////////////////////////////////////////////////////////////////////////////////////////


    function Login(Request $req){
        $req->validate([
            'UserName'=>'required',
            'password'=>'required',
        ]);
        $loginresponse=$this->LoginApi($req);
        if($loginresponse=='0'){
            session()->put('UserNametoVE',$req->UserName);
            session()->put('passwordtoVE',$req->password);
            return redirect('verifyEmail');
        }
        elseif($loginresponse=='1'){
            session()->put('UserNametoVN',$req->UserName);
            session()->put('passwordtoVN',$req->password);
            return redirect('verifyNumber');
        }
        elseif($loginresponse=='2'){
            if($req->rmemeber!=null){
                setcookie('username',$req->UserName,time()+120);
                setcookie('password',$req->password,time()+120);

            }

            session()->put('UserName',$req->UserName);
            $user=User::where('UserName',session('UserName'))->first();
            session()->put('userid',$user->id);
            session()->forget('UserNametoVE');
            session()->forget('UserNametoVN');
            session()->forget('passwordtoVE');
            session()->forget('passwordtoVN');
            return redirect('/');
        }
        else{
            return back()->with('status',$loginresponse);
        }
    }

//////////////////////////////////////////////////////////////////////////////////////////////////////


    function Register(Request $req){
        $req->validate([
            'UserName' => ['required', 'string', 'unique:users', 'max:255'],
            'Email' => ['required', 'string', 'email', 'max:255', 'unique:users','regex:/[a-zA-Z0-9._-]+@gmail.com/i'],
            'phoneNumber'=>['required', 'digits:10', 'unique:users', 'regex:/(0)[6-7]{1}[0-9]{8}/i'],
            'Bdate' =>['required','date','before:-18 years'],
            'city' =>['required'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        $registrationresponse=$this->RegistrationApi($req);
        return $this->Login($req);
    }

//////////////////////////////////////////////////////////////////////////////////////////////////////

    function verifyEmailBlade(){
        if(!session()->has('UserNametoVE')){
            return redirect('home');
        }
        else{
            return view('auth.emailverification');
        }
    }

//////////////////////////////////////////////////////////////////////////////////////////////////////

    function ValidateEmailApi(Request $req){
        $user=User::where('UserName',$req->UserName)->first();
        $validationcode=$user->confmssg;
        if($req->codepin==$validationcode){
            DB::table('users')->where('UserName',$req->UserName)->update([
                'validationlevel'=>'1'
            ]);
            return '0';
        }
        else{
            return "Incorrect Confirmation Code";
        }

    }

    ///////////////////////////////////////////////////////////////////////////

    function Validateemail(Request $req){
        $req->validate([
            'codepin'=>'required',
        ]);

        $validateresponse=$this->ValidateEmailApi($req);
        if($validateresponse=='0'){
            session()->put('UserNametoVN',session('UserNametoVE'));
            session()->put('passwordtoVN',session('passwordtoVE'));
            session()->forget('UserNametoVE');
            session()->forget('passwordtoVE');
            return $this->Login($req);

        }
        else{
            return back()->with('status',$validateresponse);
        }

    }

///////////////////////////////////////////////////////////////////////////

    function verifyNumberBlade(){
        if(!session()->has('UserNametoVN')){
            return redirect('home');
        }
        else{
            return view('auth.numberverification');
        }
    }

///////////////////////////////////////////////////////////////////////////

    function ValidateNumberApi(Request $req){
            $user=User::where('UserName',$req->UserName)->first();
        $validationcode=$user->confnumber;
        if($req->codepin==$validationcode){
            DB::table('users')->where('UserName',$req->UserName)->update([
                'validationlevel'=>'2'
            ]);
            return '0';
        }
        else{
            return "Incorrect Confirmation Code";
        }
        }

///////////////////////////////////////////////////////////////////////////

    function Validatenumber(Request $req){
        $req->validate([
            'codepin'=>'required',
        ]);

        $validateresponse=$this->ValidateNumberApi($req);
        if($validateresponse=='0'){
            session()->put('UserName',session('UserNametoVN'));
            session()->forget('UserNametoVN');
            session()->forget('passwordtoVN');
            $user=User::where('UserName',session('UserName'))->first();
            QrCode::generate('https://3atae.000webhostapp.com/usersrecord/'.$user->id, '../public/usersqr/'.$user->id.'.svg');
            return $this->Login($req);
        }
        else{
            return back()->with('status',$validateresponse);
        }
    }

///////////////////////////////////////////////////////////////////////////

    function Logout(){
        session()->forget('UserName');
        session()->forget('email');
        session()->put('userid', -1);
        return redirect()->back();
    }

    ///////////////////////////////////////////////////////////////////////////

    function Signin(){
        if(session()->has('UserName')){
            return redirect('home');
        }
        else{
            return view('auth.signin');
        }
    }

    ///////////////////////////////////////////////////////////////////////////

    function Signup(){
        if(session()->has('UserName')){
            return redirect('home');
        }
        else{
            return view('auth.signup');
        }
    }

    ///////////////////////////////////////////////////////////////////////////

    function reset(){
        if(session()->has('UserName')){
            return redirect('home');
        }
        else{
            return view('auth.resetpassword');
        }
    }



    ///////////////////////////////////////////////////////////////////////////


    function SendResetPassApi(Request $req){
        $user=User::where('email',$req->email)->get();
        if(count($user)!=0){
            $randompass=Str::random(8);
            DB::table('users')->where('email',$req->email)->update([
                'password'=>Hash::make($randompass)
            ]);

            $details=[
                'title'=>'ISM DE SITE',
                'body'=>'The New Random Pass Of Your Account Is : \\n '.$randompass.''
            ];
            Mail::to($req->email)->send(new restpass($details));
            return "A New Random Password Was Sent To Your Email";
        }
        else{
            return "This Email Dosn't Existe !";
        }

    }


    ///////////////////////////////////////////////////////////////////////////


    function sendpass(Request $req){
        $req->validate([
            'email'=>['required','regex:/[a-zA-Z0-9._-]+@gmail.com/i']
        ]);
        $resetresponse=$this->SendResetPassApi($req);
        return back()->with('status',$resetresponse);
    }




}
