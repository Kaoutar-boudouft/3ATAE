<?php

namespace App\Http\Controllers;
use App\Models\Categories;
use App\Models\SousCategories;
use App\Models\Annonces;
use App\Models\userwantoffer;
Use \Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Facades\Validator;    
use Illuminate\Support\Facades\File;
use App\Http\Controllers\ConversationController;
use App\Models\conversation;



use Illuminate\Support\Facades\DB;



use Illuminate\Http\Request;

class AnnoncesController extends Controller
{
    //
    public static function GettingSDCategoryApi(){
        $categories=Categories::all();
        return $categories;
    }

     ///////////////////////////////////////////////////////////////

     public static function GettingallSousCategoryApi(){
        $souscategories=DB::select("select * from souscategory");
        return $souscategories;
    }

    ///////////////////////////////////////////////////////////////

    public static function GettingSDSousCategoryApi($idSdcategory){
        $souscategories=DB::select("select * from souscategory where Categoryid=".$idSdcategory);
        return $souscategories;
    }

     ///////////////////////////////////////////////////////////////

     
    function AddSdAnnouncementApi(Request $req,$imagesname){
        $user=User::where('UserName',$req->Annonceurname)->first();
        $curedate=Carbon::now();
        $annonce=new Annonces;
        $annonce->Title=$req->Title;
        $annonce->Description=$req->Description;
        $annonce->AnnDate=$curedate;
        $annonce->City=$req->City;
        $annonce->images=$imagesname;
        $annonce->AnnonceurId=$user->id;
        $annonce->SousCategoryId=$req->souscate;
        $annonce->save();
        return "done";

    }

        ///////////////////////////////////////////////////////////////


    function AddAnnonceblade(){
        if(!(session()->has('UserName'))){
            return redirect('signin');
        }
        else{
            return view('AddAnnonce');
        }
    }

            ///////////////////////////////////////////////////////////////


    function AdddAnnouncement(Request $req){

        $validator=\Validator::make($req->all(),[
            'Title'=>'required',
            'Description'=>'required',
            'City'=>'required',
            'im1'=>'required',
            'souscate'=>'required',
        ]);
        if(!$validator->passes()){
            return response()->json(['code'=>0,'error'=>$validator->errors()->toArray()]);
        }
        else{
            $file1=$req->file('im1');
            $extension1=$file1->getClientOriginalExtension();
            $file1name=session('UserName').$req->Title.'1.'.$extension1;
            $file1->move('sdannoncespics/',$file1name);
            $imagesname=$file1name;

            if($req->hasFile('im2')){
                $file2=$req->file('im2');
                $extension2=$file2->getClientOriginalExtension();
                $file2name=session('UserName').$req->Title.'2.'.$extension2;
                $file2->move('sdannoncespics/',$file2name);
                $imagesname=$imagesname.'**'.$file2name;
            }

            if($req->hasFile('im3')){
                $file3=$req->file('im3');
                $extension3=$file3->getClientOriginalExtension();
                $file3name=session('UserName').$req->Title.'3.'.$extension3;
                $file3->move('sdannoncespics/',$file3name);
                $imagesname=$imagesname.'**'.$file3name;
            }

            if($req->hasFile('im4')){
                $file4=$req->file('im4');
                $extension4=$file4->getClientOriginalExtension();
                $file4name=session('UserName').$req->Title.'4.'.$extension4;
                $file4->move('sdannoncespics/',$file4name);
                $imagesname=$imagesname.'**'.$file4name;
            }

             $this->AddSdAnnouncementApi($req,$imagesname);
             return response()->json(['code'=>1]);
            }
     
    }

     ////////////////////////////////////////////////////////////////////////////

     public static function GetSDAPerUserApi($userName,$status){
        $user=User::where('UserName',$userName)->first();
        $sdAnnonces=DB::table('annonces')->where(['AnnonceurId'=>$user->id,'status'=>$status,'deleted_at'=>Null])->paginate(3);
        return $sdAnnonces;
    }

        ////////////////////////////////////////////////////////////////////////////

       public static function GetSDAPerUser($status){
            return AnnoncesController::GetSDAPerUserApi(session('UserName'),$status);
        }

        ///////////////////////////////////////

        public function GetAperAjax(Request $req,$type){
            if($req->ajax()){
                $user=User::where('UserName',session('UserName'))->first();
                $annonces=DB::table('annonces')->where(['AnnonceurId'=>$user->id,'status'=>$type,'deleted_at'=>Null])->paginate(3);
                return view("ajax.myproductsfetching",compact('annonces'))->render();
            }
        }

    ///////////////////////////////////////////////////////////////////////////
    function GetAnnonceById($id){
        $annonce=Annonces::where('id',$id)->where('deleted_at',Null)->first();
        return $annonce;
    }

    ///////////////////////////////////////////////////

    function AnnoncePamas($id){
        $annonce=$this->GetAnnonceById($id);
        if( $annonce!=null && $annonce->AnnonceurId==session('userid') ){
            $winnerid=-1;
                $winner=User::where('id',$annonce->WhoGetTheOffer)->first();
                if ($winner!=Null) {
                    $winnerid=$winner->id;
                }
                $userswhoswant=userwantoffer::where('AnnonceId',$id)->get();
                $convid=conversation::where('TheOwnerOfOffer',session('userid'))->where('TheWinner',$winnerid)->first();
                return view('annonceparams',['annonce'=>$annonce,'userswhoswant'=>$userswhoswant,'winner'=>$winner,'convid'=>$convid]);
            

        }
        else{
            return redirect('/');
        }
    }

    ///////////////////////////////
    public static function DeleteAnnonceById($id){
        $res=DB::table('annonces')->where('id',$id)->first();
        foreach (explode('**',$res->images) as $pic) {
            File::delete('sdannoncespics/'.$pic);
        }
        Annonces::where('id',$id)->delete();
        if ($res->status=="endiscussion") {
            $annonce=DB::table('conversations')->where('AnnId',$id)->update([
                'status'=>'expire',
            ]);
        }
        return response()->json(['code'=>1]);
    }

    //////////////////////////

    function EditeAnnoncesApi(Request $req,$imagesname){
        $annonce=DB::table('annonces')->where('id',$req->annid)->update([
            'Title'=>$req->Title,
            'SousCategoryId'=>$req->scat,
            'Description'=>$req->Description,
            'City'=>$req->City,
            'images'=>$imagesname,
            'status'=>"encoursdevalidation",
        ]);
    }

    //////////////////////////////
    function EditeAnnonce(Request $req){
        $validator=\Validator::make($req->all(),[
            'Title'=>'required',
            'Description'=>'required',
            'City'=>'required',
        ]);
        if(!$validator->passes()){
            return response()->json(['code'=>0,'error'=>$validator->errors()->toArray()]);
        }
        else{
            $oldpics=explode('**',$req->oldpics);
            $countofoldpics=count($oldpics);
            $imagesname="";
            if($req->input0!="vide" && $req->input0!="nonvide"){
                $imagesname=$imagesname.$req->input0;
            }
            else{
                if($req->hasFile('file0')){
                    $file1=$req->file('file0');
                    $extension1=$file1->getClientOriginalExtension();
                    $file1name=session('UserName').$req->Title.'1.'.$extension1;
                    File::delete('sdannoncespics/'.$oldpics[0]);
                    $file1->move('sdannoncespics/',$file1name);
                    $imagesname=$imagesname.$file1name;
                }
                else{
                    File::delete('sdannoncespics/'.$oldpics[0]);
                }
            }
            if($req->input1!="vide" && $req->input1!="nonvide"){
                $imagesname=$imagesname.'**'.$req->input1;
            }
            else{
                if($req->hasFile('file1')){
                    $file2=$req->file('file1');
                    $extension2=$file2->getClientOriginalExtension();
                    $file2name=session('UserName').$req->Title.'2.'.$extension2;
                    if($countofoldpics>1){
                        File::delete('sdannoncespics/'.$oldpics[1]);
                    }
                    $file2->move('sdannoncespics/',$file2name);
                    $imagesname=$imagesname.'**'.$file2name;
                }
                else{
                    if($countofoldpics>1){
                        File::delete('sdannoncespics/'.$oldpics[1]);
                    }
                }
            }
            if($req->input2!="vide" && $req->input2!="nonvide"){
                $imagesname=$imagesname.'**'.$req->input2;
            }
            else{
                if($req->hasFile('file2')){
                    $file3=$req->file('file2');
                    $extension3=$file3->getClientOriginalExtension();
                    $file3name=session('UserName').$req->Title.'3.'.$extension3;
                    if($countofoldpics>2){
                        File::delete('sdannoncespics/'.$oldpics[2]);
                    }
                    $file3->move('sdannoncespics/',$file3name);
                    $imagesname=$imagesname.'**'.$file3name;
                }
                else{
                    if($countofoldpics>2){
                        File::delete('sdannoncespics/'.$oldpics[2]);
                    }
                }
            }
            if($req->input3!="vide" && $req->input3!="nonvide"){
                $imagesname=$imagesname.'**'.$req->input3;
            }
            else{
                if($req->hasFile('file3')){
                    $file4=$req->file('file3');
                    $extension4=$file4->getClientOriginalExtension();
                    $file4name=session('UserName').$req->Title.'4.'.$extension4;
                    if($countofoldpics>3){
                        File::delete('sdannoncespics/'.$oldpics[3]);
                    }
                    $file4->move('sdannoncespics/',$file4name);
                    $imagesname=$imagesname.'**'.$file4name;
                }
                else{
                    if($countofoldpics>3){
                        File::delete('sdannoncespics/'.$oldpics[3]);
                    }
                }
            }
            if($req->input4!="vide" && $req->input4!="nonvide"){
                $imagesname=$imagesname.'**'.$req->input4;
            }
            else{
                if($req->hasFile('file4')){
                    $file5=$req->file('file4');
                    $extension5=$file5->getClientOriginalExtension();
                    $file5name=session('UserName').$req->Title.'5.'.$extension5;
                    if($countofoldpics>4){
                        File::delete('sdannoncespics/'.$oldpics[4]);
                    }
                    $file5->move('sdannoncespics/',$file5name);
                    $imagesname=$imagesname.'**'.$file5name;
                }
                else{
                    if($countofoldpics>4){
                        File::delete('sdannoncespics/'.$oldpics[4]);
                    }
                }
            }

                


          
            $imagesname = ltrim($imagesname, '*');             
            $this->EditeAnnoncesApi($req,$imagesname);
            return response()->json(['code'=>1,'msg'=>"Annonce Was Updated Succefully !"]);
        }
    }

    /////////////////////////////////////////////////////////

    public static function GetRecentsOffersApi(){
            return DB::select("select * from annonces where status='valider' and deleted_at is null order by AnnDate desc limit 4");

    }

/////////////////////////////////////////////////////////

    function GetAnnoncesByHintsApi(Request $req){
        if($req->ajax()){
            if($req->userid!=-1){
                $user=User::where('id',$req->userid)->first();
                $userid=$user->id;
            }
            else{
                $userid=-1;
            }
            $offersiwant=AnnoncesController::GetOffersIWantApi($userid);
        if($req->hint2==""){
           $annonces=DB::table('annonces')->where('Title','like','%'.$req->hint1.'%')->where('City','like','%'.$req->hint3.'%')->where('status','=','valider')->where('deleted_at',Null)->paginate(4);
            return view("ajax.productfetching",['annonces'=>$annonces,'userid'=>$userid,'offersiwant'=>$offersiwant]);

            //return DB::select("select * from annonces where (Title like '%$req->hint1%' or Description like '%$req->hint1%') and City like '%$req->hint3%' ");
        }
        $annonces=DB::table('annonces')->where('Title','like','%'.$req->hint1.'%')->where('SousCategoryId','=',$req->hint2)->where('City','like','%'.$req->hint3.'%')->where('status','=','valider')->where('deleted_at',Null)->paginate(4);
        return view("ajax.productfetching",['annonces'=>$annonces,'userid'=>$userid,'offersiwant'=>$offersiwant]);

    }}

    ////////////////////////////////////////////

    function AddItemIwantApi(Request $req){
        $userwantoffer=new userwantoffer;
        $userwantoffer->UserWhoWant=$req->username;
        $userwantoffer->AnnonceId=$req->annid;
        $userwantoffer->save();
    }

    /////////////////////////////

    function AddOffertIwant(Request $req){
        if(session()->has('UserName')){
            $this->AddItemIwantApi($req);
            $recentsann=$this->GetRecentsOffersApi();
            return response()->json(['code'=>1]);
        }
        else{
            return response()->json(['code'=>0]);
        }
    }

    ////////////
    public static function GetOffersIWantApi($id){
        $offers=userwantoffer::where('UserWhoWant',$id)->get();
        return $offers;
    }

    ////////////////////////////////////////////

    function deleteItemIwantApi(Request $req){
        userwantoffer::where(['UserWhoWant'=>$req->username,'AnnonceId'=>$req->annid])->delete();
        
    }

    /////////////////////////////

    function deleteOffertIwant(Request $req){
            $this->deleteItemIwantApi($req);
            return response()->json(['code'=>1]);
       
    }

    //////////////////////////////
    function GetUserWhoWinByIdApi($id){
        $userwhowin=User::where('id',$id)->first();
        return $userwhowin;
    }

    ////////////////////////
    function fromValidToEnDiscussionApi(Request $req){
        $annonce=DB::table('annonces')->where('id',$req->annid)->update([
            'WhoGetTheOffer'=>$req->winnerid,
            'status'=>'endiscussion',
        ]);
        $convid=ConversationController::addnewconversation($req);

        return response()->json(['code'=>1,'convid'=>$convid]);
    }

   
}
