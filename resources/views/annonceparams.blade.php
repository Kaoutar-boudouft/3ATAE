<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="{{url('css/annoncepamas.css')}}">
@include('modals.areyousureyouwanttodelete')
@include('modals.chooserandompersonmodal')

@extends('glayouts.nav-bar')
@section('content')
<br>
<br>
<form id="editeannonceform" action="{{url('EditeAnnonce')}}" method="post" enctype="multipart/form-data">
@csrf
<div class="container mt-5 mb-5">
    <div class="card">

        <div class="row g-0 border-bottom">
            <div class="col-md-5 border-end order-xs-2">
                <div class="row g-0 displaynone">
                    @php
                            $date = new DateTime();
                            $result = $date->format('Y-m-d H:i:s');
                            $t1 = strtotime($result);
                            $t2 = strtotime($annonce->AnnDate);
                            $diff = $t1 - $t2;
                            $hours = $diff / ( 60 * 60 );
                    @endphp
                    <?php
                    $pics=explode('**',$annonce->images);
                    $nbrimages=count($pics);
                    ?>
                    <?php
                    for ($i=1; $i <count($pics) ; $i++) {
                      ?>
                       <div class="col-md-6 col-sm-12">
                        <svg class="removepic" id="{{$i}}" style="cursor: pointer" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                            <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
                          </svg>                        <div class="">
                            <div  class="image w-100 " style="height: 250px"> <img id="im{{$i}}" class="img-thumbnail border-1 im" style="height: 250px"
                                    src="{{url('sdannoncespics/'.$pics[$i])}}" >
                            </div>
                        </div>
                        <input type="file" id="file{{$i}}" name="file{{$i}}" hidden="hidden">
                        <input type="text" id="input{{$i}}" value="{{$pics[$i]}}" name="input{{$i}}" hidden="hidden">
                    </div>

                      <?php
                    }
                    if(count($pics)<5){
                        for($i=count($pics);$i<5;$i++){
                            ?>
                       <div class="col-md-6 col-sm-12">
                        <div class="">
                            <div class="image w-100 " style="height: 250px"> <img id="im{{$i}}" class="img-thumbnail border-1 im" style="height: 250px"
                                    src="{{url('images/AddImage.png')}}" >
                            </div>
                            <input type="file" id="file{{$i}}" name="file{{$i}}" hidden="hidden">
                            <input type="text" id="input{{$i}}" value="vide" name="input{{$i}}" hidden="hidden">
                        </div>
                    </div>

                      <?php
                        }
                    }
                ?>



                </div>
            </div>
            <div class="col-md-7 order-xs-1">
                <input type="text" value="{{$annonce->images}}" name="oldpics" hidden="hidden">
                <input type="text" value="{{$annonce->id}}" name="annid" hidden="hidden">

                <div class="main-image p-3"> <img id="im0"  class="border-1 im"
                        src="{{url('sdannoncespics/'.$pics[0])}}" width="90%" height="500px">
                        <svg class="removepic" id="0" style="cursor: pointer" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                            <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
                          </svg>
                    <i class='bx bx-share-alt'></i> </div>
                    <input type="file" id="file0" name="file0" hidden="hidden">
                    <input type="text" id="input0" value="{{$pics[0]}}" name="input0" hidden="hidden">
            </div>
        </div>
        <div class="row g-0">
            <div class="col-md-5 border-end border-hide">
                <div class="p-5 count-down-div">
                    <div class="timer">
                        <span style="text-align: center">{{$annonce->AnnDate}} {{__('traduction.PI')}}</span>

                        <br>
                    </div>
                    <span id="status" style="font-size: 12px;color:rgb(168, 164, 164);margin-left:5px">{{$annonce->status}} {{__('traduction.AS')}}</span>
                    <br>
                    <br>
                    <div class="col-sm-12" style="position: relative">
                        <div class="col-md-12 form-group" style="position:absolute;left:-10;top:0">
                            <input id="ville" style="text-align: center;margin-left:0"  type="text" class="form-control" name="City" placeholder="المدينة" list="depart" >

                            <datalist id="depart">
                              <script>
                                $.ajax({
                             type: "GET",
                             url: "{{url('js/moroccocities.json')}}",
                             data: 'ok=ok',
                             dataType: 'json'
                          }).done(function(data){
                            for(var i in data){
                            $('#depart').append("<option value='"+data[i].city+"'>");
                              $('#destination').append("<option value='"+data[i].city+"'>");


                                            }

                          })
                          $("#ville").val("{{$annonce->City}}");
                            </script>
                            </datalist>
                            <br>
                            <select id="scat" class="mx-auto w-100" name="scat" style="height: 35px;text-align:center" >
                                <script>
                                    var catid;
                                      $(document).ready(function(){
                                                    $.ajax({
                                  url:"{{url('api/Getallsouscategapi/all')}}",
                                  success:function(data){
                                    for(var i in data){
                                        if(data[i].id=={{$annonce->SousCategoryId}}){
                                            catid=data[i].Categoryid;
                                            $("#scat").append("<option  selected value="+data[i].id+" style='text-align: center'>"+data[i].NomSousCategory+"</option>");


                                        }
                                        else{
                                            $("#scat").append("<option value="+data[i].id+">"+data[i].NomSousCategory+"</option>");
                                        }
                                          }
                                      }
                                })
});
                                </script>
                            </select>
                            <br>
                            <br>
                            <select id="cat" name="cat" class="mx-auto w-100" style="height: 35px;text-align:center" >
                                <script>
                                      $(document).ready(function(){
                                                    $.ajax({
                                  url:"{{url('api/GettingSDCategoryApi/all')}}",
                                  success:function(data){
                                    for(var i in data){
                                        if(data[i].id==catid){
                                            $("#cat").append("<option  selected value="+data[i].id+" style='text-align: center'>"+data[i].NomCategory+"</option>");


                                        }
                                        else{
                                            $("#cat").append("<option value="+data[i].id+">"+data[i].NomCategory+"</option>");
                                        }
                                          }
                                      }
                                })
});
                                </script>
                            </select>
                            <br>
                            <br>
                            <div id="statistiques">
                            @if ($annonce->status=="valider")
                            <span >{{count($userswhoswant)}} {{__('traduction.NOPIIYO')}}</span>
                            @endif
                          </div>
                            <div id="userids" hidden="hidden">
                                {{$usersid=""}}
                                @for ($i = 0; $i < count($userswhoswant); $i++)
                                {{ $usersid=$usersid.$userswhoswant[$i]->UserWhoWant."*"}}

                                @endfor
                            </div>
                          </div>


                        <br>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <div class="p-4">
                    <div class="mt-3">
                        <div class="form-group w-100 mx-auto" >
                            <input style="width: 100%;font-size:16pt;text-align:center" type="text" name="Title" id="titre" class="form-control"  val aria-describedby="emailHelp" value="{{$annonce->Title}}">
                          </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <!--Custom Select-->
                            <div class="form-group w-100 mx-auto" >
                                <textarea style="width: 100%;font-size:12pt;text-align:center" value="{{$annonce->Description}}"  name="Description" class="form-control" id="anndescription" rows="3">{{$annonce->Description}}</textarea>
                              </div>
                            <!--custom Select-->
                        </div>

                    </div>
                    <div class="msg alert" style="text-align: center" hidden="hidden"></div>

                    <div class="mt-4 d-flex justify-content-between align-items-center">

                        <div class="d-flex flex-row align-items-center justify-content-end gap-2 mx-auto">
                            @if ($annonce->status!="endiscussion")
                            <input type="button" value="{{__('traduction.D')}}"
                            class="cart-btn btn btn-sm  btn-outline-dark px-4 supprimer" id="{{$annonce->id}}" style="margin-right:3px" data-toggle="modal" data-target="#form"> <input id="editeann" type="submit" value="{{__('traduction.E')}}"
                            class="cart-btn btn btn-sm btn-dark  px-4 gap-2">
                            @else
                            <input type="button" value="{{__('traduction.D')}}"
                            class="cart-btn btn btn-sm  btn-outline-dark px-4 supprimer" id="{{$annonce->id}}" style="margin-right:3px" data-toggle="modal" data-target="#form">

                            @endif
                             </div>
                    </div>
                    <br>
                    @php
                    @endphp
                    @if ($hours<24 || count($userswhoswant)==0)
                        @if ($annonce->status=="valider")
                        <span style="color: white">.......................................................</span><input type="button" value="{{__('traduction.CRW')}}"
                        class="cart-btn btn btn-sm btn-warning px-4  mx-auto" id="{{$annonce->id}}" disabled style="margin-right:3px" data-toggle="modal" data-target="#chooserandommodal">
                    <br>
                    <br>
                    <h6 align="center" style="font-size: 12px">{{__('traduction.CRO')}}</h6>

                    @endif
                    @else
                    @if ($annonce->status=="valider")
                    <span style="color: white">.......................................................</span><input type="button" value="{{__('traduction.CRW')}}"
                    class="cart-btn btn btn-sm btn-warning px-4  mx-auto cbtn" id="{{$annonce->id}}"  style="margin-right:3px" data-toggle="modal" data-target="#chooserandommodal">
                    @endif

                    @endif

                    </div>

            </div>
            @if ($annonce->status=="endiscussion")
                    <div class="col-10 mx-auto  text-center" style="padding: 8px;border:2px solid black"><h4>{{__('traduction.TWITOI')}} {{$winner->UserName}}</h4><br><br>
                      <a href="{{url('/chat')}}"
                      class="cart-btn btn btn-sm btn-warning px-4  mx-auto"   style="margin-right:3px" >{{__('traduction.GTC')}} </a>

                    </div>

                        @else
                        <div class="col-10 mx-auto  text-center winnerdetails" style="padding: 8px;border:2px solid black" hidden="hidden"></div>
                    @endif

        </div>
    </div>
</div>
</form>
<script>
    $('.removepic').click(function(){
       var imid= $(this).attr('id');
       $("#im"+imid).attr('src',"{{url('images/AddImage.png')}}");
       $(this).attr('hidden','hidden');
       $("#input"+imid).val("vide");

    }
    )

    $('.im').click(function(){
        var imageid=$(this).attr('id');
        var id=imageid.slice(-1);
        const real1=document.getElementById("file"+id);
        const fake1=document.getElementById(imageid);
        real1.click();
        real1.addEventListener("change",function(){
                               if(real1.value){
                                 const im=this.files[0];
                                 if(im){
                                   const reader=new FileReader();
                                   reader.addEventListener("load",function(){
                                      fake1.setAttribute('src',"");
                                     fake1.setAttribute('src',reader.result);
                                     $("#input"+id).val("nonvide");
                                     $("#"+id).removeAttr('hidden');
                                   });
                                   reader.readAsDataURL(im);
                                 }
                               }
                             });

    })

    //////*******************edite offer*******************/////

    $('#editeannonceform').on('submit',function(e){
         e.preventDefault();
         var form=$(this);
         alert();
         var ifallpicsareempty=0;
         for (let i = 0; i < 5; i++) {
             if ($("#input"+i).val()=="vide") {
                 ifallpicsareempty++;
             }

         }
         if (ifallpicsareempty==5) {
            $('.msg').removeClass('alert-success');
             $('.msg').addClass('alert-warning');
             $('.msg').removeAttr('hidden');
             $('.msg').html("{{__('traduction.YALSOP')}}");
         }
         else{

            var ifsomethingchanged=false;
            for (let i = 0; i < {{$nbrimages}}; i++) {
                if($("#input"+i).val()=="vide" || $("#input"+i).val()=="nonvide"){
                    ifsomethingchanged=true;
                }
            }
            for (let i = {{$nbrimages}}; i <5 ; i++) {
                if($("#input"+i).val()!="vide"){
                    ifsomethingchanged=true;
                }

            }

            if($('#ville').val()!="{{$annonce->City}}" || $('#scat').val()!="{{$annonce->SousCategoryId}}" || $('#titre').val()!="{{$annonce->Title}}" || $('#anndescription').val()!="{{$annonce->Description}}"){
                ifsomethingchanged=true;
            }

            if(!ifsomethingchanged){
                $('.msg').removeClass('alert-success');
                $('.msg').addClass('alert-warning');
                $('.msg').removeAttr('hidden');
             $('.msg').html("{{__('traduction.YDCAT')}}");
            }
            else{
                $.ajax({
            url:form.attr('action'),
            type:form.attr('method'),
            data:new FormData(form[0]),
            processData:false,
            contentType:false,

            success:function(result){
              if(result.code==0){
                $('.msg').removeClass('alert-success');
                $('.msg').addClass('alert-warning');
                $('.msg').removeAttr('hidden');
             $('.msg').html("{{__('traduction.YSFAFI')}}");
             }
              else{
                  $('#status').html("{{__('traduction.AUA')}}");
                $('.msg').addClass('alert-success');
                $('.msg').removeClass('alert-warning');
                $('.msg').removeAttr('hidden');
             $('.msg').html("{{__('traduction.ASUO')}}");
              }

            },
            error:function(er){
              console.log(er);
            }
          });
            }


         }

        })


    //***************delete offer ******************//

    $('.delete').click(function() {
        var annid=$(this).attr('id');
        $.ajax({
          url:"/api/DeleteAnnonceById/"+annid,
                              success:function(res){

                                  window.location="{{url('profile')}}";



                                  },
            error:function(er){
              console.log(er);
            }
                            })
    })

    ////////choose randomly//////////////////////

    $('.choose').click(function(){
        $('.loading').removeAttr('hidden');
        var ownerid="{{session('userid')}}";
        var usersid="{{$usersid}}";
        var usersidarray=usersid.split("*");
        var convid;
        usersidarray.pop();
        var item = usersidarray[Math.floor(Math.random()*usersidarray.length)];
        $.ajax({
          url:"/api/GetUserWhoWinByIdApi/"+item,
                              success:function(res){
                                var userim="{{url('/')}}"+'/profilepics/'+res.photo;
                                  $('#userwhowinnpic').attr('src',userim);

                                  $.ajax({
                                url: '/api/fromValidToEnDiscussionApi',
                                type: 'POST',
                                data: { _method:'PUT', winnerid: item,annid:{{$annonce->id}},ownerid: ownerid, _token: '{{csrf_token()}}' },
                                dataType: 'json',
                              success:function(res){

                                if(res.code==1){
                                 convid=res.convid;
                }
                else{
                  window.location="/signin";
                }


                                  },
            error:function(er){
              console.log(er);
            }
    });


                                  setTimeout(() => {
                                    $('.loading').attr('hidden','hidden');
                                    $('#firstfront').attr('hidden','hidden');
                                    $('#text').html(res.UserName+"<br>"+res.City);
                                    $('.choose').attr('hidden','hidden');
                                    $('.cbtn').attr('hidden','hidden');
                                    $('#editeann').attr('hidden','hidden');
                                    $('#statistiques').attr('hidden','hidden');
                                    $('.chat').removeAttr('hidden');
                                    $('#gotochatbtn').val("Start Discussion");
                                    $('#winnerinfo').removeAttr('hidden');
                                    $('.winnerdetails').removeAttr('hidden');
                                    console.log(convid);
                                    var chaturl="{{url('/')}}"+'/chat/'+convid[0].id;
                                    $('.winnerdetails').html('<h4>'+res.UserName+'</h4>{{__('traduction.TWITOI')}}<br><br><a href="'+chaturl+'"  class="cart-btn btn btn-sm btn-warning px-4  mx-auto"   style="margin-right:3px" >{{__('traduction.GTC')}} </a> ');
                                    $('.chat').attr('href',chaturl);
                                  }, 1000);




                                  },
            error:function(er){
              console.log(er);
            }
                            })
    })

   /* $('.supprimer').click(function(){
          var id=$(this).attr('id');
          $.ajax({
              type:"post",
                url:"api/DeleteAnnonceById/"+id,
                success:function(data){


                    else{

                    }

                },
            error:function(er){
              console.log(er);
            }
            })

        })*/
</script>

@endsection
