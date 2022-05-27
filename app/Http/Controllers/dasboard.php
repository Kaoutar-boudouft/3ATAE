<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Crypt;
use App\Models\Annonces;
use App\Models\Categories;
use App\Models\Support;
use App\Models\SousCategories;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\AnnoncesController;
use Illuminate\Support\Facades\File;



class dasboard extends Controller
{
    //
    function index(){
        if (session()->has('UserName')) {
            $user=User::where('UserName',session('UserName'))->first();
            if($user->admin==true){
                $userpass=Crypt::decryptString($user->password);
                return view('admindashboard',['admin'=>$user,'adminpass'=>$userpass]);
            }
            else{
                return redirect('/');
            }
        }
        else{
            return redirect('/');
        }
        return view('admindashboard');
    }

    function admindatablade(){
        if (session()->has('UserName')) {
            $user=User::where('UserName',session('UserName'))->first();
            if($user->admin==true){
                $userpass=Crypt::decryptString($user->password);
                return view('ajax.admindata',['admin'=>$user,'adminpass'=>$userpass]);
            }
            else{
                return redirect('/');
            }
        }
        else{
            return redirect('/');
        }
        return view('ajax.admindata');
    }

    ///////////////////////////////////////////////////

    function allproductsbystatusapi($status){
        if($status=="all"){
            $annonces=DB::table('annonces')->where('deleted_at',Null)->paginate(3);
        }
        else{
            $annonces=DB::table('annonces')->where('status','=',$status)->where('deleted_at',Null)->paginate(3);
        }
        return $annonces;
    }

    /////////////////////////////////////////

    function allproductsapi(){
        $annonces=DB::table('annonces')->where('deleted_at',Null)->paginate(3);
        return $annonces;
    }

    //////////////////////////////////////////////////

    function productfetchingblade($status){
        $annonces=$this->allproductsbystatusapi($status);
        return view('ajax.adminproductsview',['annonces'=>$annonces]);
    }

    //////////////////////////////

    function allproductsblade(){
        $annonces=$this->allproductsapi();
        return view('ajax.allproducts',['annonces'=>$annonces]);
    }

    ////////////////////////////
    function validateannouncement($annid){
        $annonce=DB::table('annonces')->where('id',$annid)->update([
            'status'=>'valider',
        ]);
        $getannonce=DB::table('annonces')->where('id',$annid)->first();
        $user=DB::table('users')->where('id',$getannonce->AnnonceurId)->first();
        $user1=DB::table('users')->where('id',$getannonce->AnnonceurId)->update([
            'Points'=>$user->Points+5,
        ]);


    }

    ///////////////

    function reffuserannouncement($annid){
        Annonces::where('id',$annid)->delete();
        $annonce=DB::table('annonces')->where('id',$annid)->update([
            'status'=>'reffuser',
        ]);

    }

    /////////////////////////

    function getAllUsersApi(){
        $users=DB::table('users')->where('id','!=',session('userid'))->paginate(2);
        $annoncescountperuser=array();
        foreach ($users as $user) {
            $annoncesnbrperuser=Annonces::where('AnnonceurId','=',$user->id)->count();
            array_push($annoncescountperuser,$annoncesnbrperuser);
        }
        return [$users,$annoncescountperuser];
    }

    /////////////////
    function getallusersblade(){
        $res=$this->getAllUsersApi();
        $users=$res[0];
        $annoncescountperuser=$res[1];
        return view('ajax.allusers',['users'=>$users,'annoncescountperuser'=>$annoncescountperuser]);
    }

    ///////////////////

    function removeUserapi(Request $req){
        $user=DB::table('users')->where('id',$req->userid)->first();
        $userannonces=DB::select("select * from annonces where AnnonceurId='".$user->id."' ");
        foreach ($userannonces as $userannonce) {
            AnnoncesController::DeleteAnnonceById($userannonce->id);
        }
        user::where('id',$req->userid)->delete();
    }

    /////////////////////

    function getallcategoriesblade(){
        $categories=AnnoncesController::GettingSDCategoryApi();
        return view('ajax.allcategories',['categories'=>$categories]);
    }

    //////////////////

    function addcategoryapi(Request $req){
        $validator=\Validator::make($req->all(),[
            'NomCategory'=>'required',
            'ImageCategory'=>'required',
        ]);
        if(!$validator->passes()){
            return response()->json(['code'=>0,'error'=>$validator->errors()->toArray()]);
        }
        else{
            $category=Categories::where('NomCategory',$req->NomCategory)->first();
            if ($category==null) {
                $file=$req->file('ImageCategory');
            $extension=$file->getClientOriginalExtension();
            $filename=$req->NomCategory.'.'.$extension;
            $file->move('images/',$filename);
            $imagename=$filename;

            $category=new Categories;
            $category->NomCategory=$req->NomCategory;
            $category->ImageCategory=$imagename;
            $category->save();
            return response()->json(['code'=>1,'msg'=>'category added successfully!']);
            }
            else{
                return response()->json(['code'=>2,'msg'=>'category already exist!']);
            }


        }
    }

    ////////////////////////

    function updatecategoryapi(Request $req){
        $validator=\Validator::make($req->all(),[
            'NomCategory'=>'required',
        ]);
        if(!$validator->passes()){
            return response()->json(['code'=>0,'error'=>$validator->errors()->toArray()]);
        }
        else{
            $category=DB::select("select * from category where NomCategory='".$req->NomCategory."' and id!='".$req->catidup."' ");
            if ($category==null) {
                if($req->newimageinput!="changed"){
                    $category=DB::table('category')->where('id',$req->catidup)->update([
                        'NomCategory'=>$req->NomCategory,
                        ]);}
                else{
                    File::delete('images/'.$req->oldpic);
                    $file=$req->file('ImageCategory');
                    $extension=$file->getClientOriginalExtension();
                    $filename=$req->NomCategory.'.'.$extension;
                    $file->move('images/',$filename);
                    $imagename=$filename;
                    $category=DB::table('category')->where('id',$req->catidup)->update([
                        'NomCategory'=>$req->NomCategory,
                        'ImageCategory'=>$imagename,
                        ]);

                 return response()->json(['code'=>1,'msg'=>'category updated successfully!']);
                }
                }
                else{
                    return response()->json(['code'=>2,'msg'=>'This Name Already used !']);

                }

            }
        }

        /////////////////////
        function getCategoryByIdApi($id){
            $category=DB::select("select * from category where id='".$id."' ");
            return $category;
        }


        /////////////////

        function deletecategorybyid(Request $req){
            Categories::where('id',$req->catid)->delete();
            return response()->json(['msg'=>'Category deleted succeffully!']);
        }

        //////////////////////

        function souscategoriesblade(){
            $categories=AnnoncesController::GettingSDCategoryApi();

                $souscategories=DB::table('souscategory')->paginate(6);

            $catofsc=array();
            foreach ($souscategories as $souscategory) {
                $x=DB::select("select * from category where id='".$souscategory->Categoryid."' ");
                array_push($catofsc,$x);
            }
            return view('ajax.souscategories',['categories'=>$categories,'souscategories'=>$souscategories,'catofsc'=>$catofsc]);

        }

        function souscategorybycatblade($catid){
            if ($catid!="all") {
                $souscategories=DB::table('souscategory')->where('Categoryid',$catid)->paginate(6);
            }
            else{
                $souscategories=DB::table('souscategory')->paginate(6);
            }
            $catofsc=array();
            foreach ($souscategories as $souscategory) {
                $x=DB::select("select * from category where id='".$souscategory->Categoryid."' ");
                array_push($catofsc,$x);
            }
            return view('ajax.fetchsouscategories',['souscategories'=>$souscategories,'catofsc'=>$catofsc]);

        }

        //////////////

        function addsoucategoryapi(Request $req){
            $validator=\Validator::make($req->all(),[
                'NomSousCategory'=>'required',
            ]);
            if(!$validator->passes()){
                return response()->json(['code'=>0,'error'=>$validator->errors()->toArray()]);
            }
            else{
                $souscategory=SousCategories::where('NomSousCategory',$req->NomSousCategory)->first();
                if ($souscategory==null) {
                $souscategory=new SousCategories;
                $souscategory->NomSousCategory=$req->NomSousCategory;
                $souscategory->Categoryid=$req->Categoryid;
                $souscategory->save();
                return response()->json(['code'=>1,'msg'=>'category added successfully!']);
                }
                else{
                    return response()->json(['code'=>2,'msg'=>'category already exist!']);
                }


            }
        }

        /////////////////////////

        function removesouscategory(Request $req){
            DB::table('souscategory')->where('id',$req->souscatid)->delete();
            return response()->json(['msg'=>'SousCategory deleted succeffully!']);
        }

        ////////////////////////

        function getitemsofuser($userid){
            $annonces=DB::select("select annonces.* from annonces,userwantoffer where annonces.id=userwantoffer.AnnonceId and userwantoffer.UserWhoWant='".$userid."' and annonces.status='valider' ");
            return view('ajax.itemsiwant',['annonces'=>$annonces]);

        }

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

   /* function productstovalidateblade(){
        $annonces=DB::table('annonces')->where('status','=','encoursdevalidation')->where('deleted_at',Null)->paginate(3);
        return view('ajax.productstovalidate',['annonces'=>$annonces]);
    }



    function refuseannouncement($annid){
        $annonce=DB::table('annonces')->where('id',$annid)->delete();
    }

    function allproductsblade(){
        $annonces=DB::table('annonces')->where('deleted_at',Null)->paginate(3);
        return view('ajax.allproducts',['annonces'=>$annonces]);
    }

    function validateproductsblade(){
        $annonces=DB::table('annonces')->where('status','=','valider')->where('deleted_at',Null)->paginate(3);
        return view('ajax.productstovalidate',['annonces'=>$annonces]);
    }*/


}
