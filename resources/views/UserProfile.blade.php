@extends('glayouts.nav-bar')
@section('content')

<link rel="stylesheet" href="{{ url('css/Profilestyle.css')}}">
<link rel="stylesheet" href="{{ url('css/reset.css')}}">

    <div class="content-profile-page " style="width:90%">
        <div class="profile-user-page card w-100" style="background-image: url({{url('images/515248-PILL7Z-216.png')}});background-size:cover;background-position:center">
           <div class="img-user-profile" style="width:200px;height:300px">
               <div style="background-image:;background-size:100%;background-position:center;height:200px;width:100%"></div>
               <form id="ppcf" action="{{url('api/ProfilePicChangingApi')}}" method="post" enctype="multipart/form-data">
                @csrf
               <img id="im" class="avatar w-100 h-75" src="{{url('profilepics/'.$user->photo)}}" alt="jofpin" />
               <input id="real" type="file" name="pp" hidden="hidden">
               <span id="fake" style="width: 30px;height:30px;padding:8px;background-color:#e29f01;z-index:1111;border-radius:8px;color:white;cursor: pointer;">{{__('traduction.EPP')}}</span>
               <input type="text" name="UserName" value="{{session('UserName')}}" hidden="hidden">

              </form>
               <meta name="csrf-token" content="{{csrf_token()}}">

               <script>
                  $.ajaxSetup({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                }
                            });
                   const real=document.getElementById("real");
                             const fake=document.getElementById("fake");
                             const pic=document.getElementById("im");


                             fake.addEventListener("click",function(){
                               real.click();
                             });
                             real.addEventListener("change",function(){
                               if(real.value){
                                 const im=this.files[0];
                                 if(im){
                                   const reader=new FileReader();
                                   reader.addEventListener("load",function(){

                                    var form=$('#ppcf');
                                    $.ajax({
                                url:form.attr('action'),
                                type:form.attr('method'),
                                data:new FormData(form[0]),
                                processData:false,
                                contentType:false,

                                success:function(result){
                                  alert(result);
                                },
                                error:function(er){
                                  console.log(er);
                                }
                               });


                                    pic.setAttribute('src',"");
                                    pic.setAttribute('src',reader.result);


                                   });
                                   reader.readAsDataURL(im);
                                 }
                               }
                             });
                </script>
              </div>
               <button>Follow</button>
               <div class="user-profile-data" style="background-color:rgba(1, 1, 1, 0.61);color:white">
                   <br>
                 <h1 style="color:white">{{$user->UserName}}</h1>
                 <p style="color:white">{{__('traduction.NU')}}</p>
               </div>
               <div class="description-profile " style="background-color:rgba(1,1, 1, 0.61);padding: 10px;color:white">{{$user->City}}| Maroc</div>
            <ul class="data-user">
             <li id="validate" class="catactive"><a><strong>{{__('traduction.MVO')}}</strong><span class="vnbr">{{__('traduction.V2')}}<br>{{$valideanncount}}</span></a></li>
             <li id="encoursdevalidation"><a><strong>{{__('traduction.MIO')}}</strong><span class="ivnbr">{{__('traduction.ID2')}}<br>{{$encoursdevalidationanncount}}</span></a></li>
             <li id="endiscusion"><a><strong>{{__('traduction.MIDO')}}</strong><span>{{__('traduction.IP2')}}<br>{{$endiscussioncount}}</span></a></li>
            </ul>
           </div>
           <div id="informationcontain"  >
            <div id="editinfo" >
              <br>
              <br>
              <div class="response" style="width:300px"></div>
              <form id="up" method="POST" action="/UpdateProfile">
                <h1 align="center">{{__('traduction.PS')}}</h1>
                <br>
                <div class="form-group w-75 mx-auto text-center" >
                  <label for="exampleInputEmail1" align="center" style="text-align: center">{{__('traduction.UN')}}</label>
                  <input type="text" name="UserName" value="{{$user->UserName}}" class="form-control" id="exampleInputEmail1" val aria-describedby="emailHelp" placeholder="Enter email" >
                </div>
                <span style="color: rgb(254, 254, 254);width:100%;text-align:center;margin-left:20%;" class="UserName_error"></span>
                <div class="form-group w-75 mx-auto text-center" >
                  <label for="exampleInputEmail1">{{__('traduction.Email')}}</label>
                  <input type="email" name="email" value="{{$user->email}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" >
                </div>
                <span style="color: rgb(255, 255, 255);width:100%;margin-left:20%;text-align:center;margin-left:20%;" class="email_error"></span>
                <div class="form-group w-75 mx-auto text-center" >
                  <label for="exampleInputEmail1">{{__('traduction.PN')}}</label>
                  <input type="text" name="phoneNumber" value="{{$user->phoneNumber}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" >
                </div>
                <span style="color: rgb(255, 255, 255);width:100%;text-align:center;margin-left:20%;" class="phoneNumber_error"></span>
                <div class="form-group w-75 mx-auto text-center" >
                  <label for="exampleInputEmail1">{{__('traduction.BD')}}</label>
                  <input type="date" name="birthdate"  value="{{$user->birthdate}}" class="form-control" id="bd" aria-describedby="emailHelp" placeholder="Enter email" >
                </div>
                <span style="color: rgb(255, 255, 255);width:100%;text-align:center;margin-left:20%;" class="birthdate_error"></span>
                <div class="form-group w-75 mx-auto text-center" >
                  <label for="exampleInputEmail1">{{__('traduction.City')}}</label>
                  <input type="text" class="form-control" name="City" value="{{$user->City}}"  placeholder="City" list="depart" >
  <input id="name" type="text" value="{{session('UserName')}}" name="U" hidden="hidden">
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
                  </script>
                  </datalist>
                </div>
                <span style="color: rgb(255, 255, 255);width:100%;text-align:center;margin-left:20%;" class="City_error"></span>
                <div class="form-group w-75 mx-auto text-center" >
                  <label for="exampleInputPassword1">{{__('traduction.PASS')}}</label>
                  <input type="password" name="password" value="{{$pass}}" class="form-control" id="exampleInputPassword1" placeholder="Password" >
                </div>
                <span style="color: rgb(255, 255, 255);width:100%;text-align:center;margin-left:20%;" class="password_error"></span>


                <button id="editeprobtn" type="submit" style="margin-left:19%" class="btn btn-primary">{{__('traduction.E')}}</button>
              </form>
                <div class="mx-auto" style="padding-left: 33%;padding-top: 10px;border-top: 3px solid black"><img class="mx-auto" src="{{url('/usersqr/'.session('UserName').'.svg')}}"></div>
              <br>
                <h6 align="center">{{__('traduction.yp')}}: {{$user->Points}}</h6>
                <script>
                //*****ajax setup *********************//
              $.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
//****************profile Update Request**************************//
      $('#up').on('submit',function(e){
         e.preventDefault();
         var form=$(this);
         $.ajax({
            url:form.attr('action'),
            type:form.attr('method'),
            data:new FormData(form[0]),
            processData:false,
            contentType:false,

            success:function(result){
              if(result.code==0){
                $.each(result.error,function(prefix,val){
                form.find('span.'+prefix+'_error').text(val[0]);
                });
              }
              else{
                if(result.code==1){
                  $('.response').addClass('alert alert-success');
                  $('.response').html(result.msg);
                  setTimeout(() => {
                    window.location="signin";
                  }, 1500);
                }
                else{
                  $('.response').addClass('alert alert-success');
                  $('.response').html(result.msg);
                  $('#name').val(result.username);
                }
              }

            },
            error:function(er){
              console.log(er);
            }
          });
        })

              </script>

              </div>
              <div id="showann" >
               @include('ajax.myproductsfetching')
               <script>

/*$('.cd-trigger').click(function(){
    var produitid=$(this).attr('id');
    $.ajax({
                                url:'api/AnnonceById/'+produitid,
                                type:'GET',
                                success:function(result){
                                  var pics=result.images.split("**");
                                 $('#Title').html(result.Title);
                                 $('#desc').html(result.Description);
                                 $('#date').html(result.AnnDate);
                                 $('.supprimer').attr('id',result.id);
                                 $('.edit').attr('id',result.id);
                                 $('#ci').html('');
                                 $('#ci').append('<div class="carousel-item active"><img class="d-block w-100 " width="300px" height="300px" src="sdannoncespics/'+pics[0]+'" alt="First slide"></div>');
                                 for (let i = 1; i < pics.length; i++) {
                                  $('#ci').append('<div class="carousel-item"><img class="d-block w-100"  width="300px" height="300px" src="sdannoncespics/'+pics[i]+'" alt="First slide"></div>');
                                 }
                                },
                                error:function(er){
                                  console.log(er);
                                }
                               });
  })
*/
///******************filter****************/
                 var type="valider";
      $('#validate').click(function(){
        type="valider";
        $('#validate').addClass('catactive');
        $('#encoursdevalidation').removeClass('catactive');
        $('#endiscusion').removeClass('catactive');
            fetch_data(1);
      });
      $('#encoursdevalidation').click(function(){
        type="encoursdevalidation";
        $('#encoursdevalidation').addClass('catactive');
        $('#validate').removeClass('catactive');
        $('#endiscusion').removeClass('catactive');
            fetch_data(1);
      });

    $('#endiscusion').click(function(){
      type="endiscussion";
      $('#endiscusion').addClass('catactive');
        $('#encoursdevalidation').removeClass('catactive');
        $('#validate').removeClass('catactive');
            fetch_data(1);
    })

      //**************pagination************************//
                  function fetch_data(page){
            $.ajax({
                url:"/GetAnnonces/"+type+"?page="+page,
                success:function(data){
                    $("#showann").html(data);

                },
            error:function(er){
              console.log(er);
            }
            })
        }
$(document).on('click','.pages_link a',function(e){
            e.preventDefault();
            var page=$(this).attr('href').split('page=')[1];
            fetch_data(page);
        });

        //***************delete offer ******************//
        $('.supprimer').click(function(){
          var id=$(this).attr('id');
          $.ajax({
                url:"api/DeleteAnnonceById/"+id,
                success:function(data){
                    $('#cbtn').click();
                    if(type=="valider"){
                      $('#validate').click();
                      $('.vnbr').html('Validate Offers<br>'+{{$valideanncount-1}});
                    }

                    else{
                      $('#encoursdevalidation').click();
                      $('.ivnbr').html('Validate Offers<br>'+{{$encoursdevalidationanncount-1}});
                    }
                    $('.response').addClass('alert alert-success');
                    $('.response').html('Offer Was Deleted Successfully!');
                },
            error:function(er){
              console.log(er);
            }
            })

        })

        //***************edite offer****************//


        $('.edit').click(function(){
          //alert($(this).attr('id'));
          $('#annf').removeAttr('hidden');
            $('#anninfo').attr('hidden','hidden');
            $('#editeannbtn').removeAttr('hidden');
        })


        //**********edite offer request************//

        $('#annediteform').on('submit',function(e){
         e.preventDefault();
         var form=$(this);

            $.ajax({
            url:form.attr('action'),
            type:form.attr('method'),
            data:new FormData(form[0]),
            processData:false,
            contentType:false,

            success:function(result){
              if(result.code==0){
                $.each(result.error,function(prefix,val){
                form.find('span.'+prefix+'_error').text(val[0]);
                });
              }
                else{

                  var anid=$('#annid').val();
                  $('#annf').attr('hidden','hidden');
            $('#anninfo').removeAttr('hidden');
            $('#editeannbtn').attr('hidden','hidden');
                  $('#afterup').addClass('alert alert-success');
                  $('#afterup').html(result.msg);

                  $.ajax({
                                url:'api/AnnonceById/'+anid,
                                type:'GET',
                                success:function(result){
                                  var pics=result.images.split("**");
                                 $('#Title').html(result.Title);
                                 $('#desc').html(result.Description);
                                 $('#date').html(result.AnnDate);
                                 $('#city').html(result.City);
                                 $('.supprimer').attr('id',result.id);
                                 $('.edit').attr('id',result.id);
                                 $('#titre').val(result.Title);
                                 $('#annid').val(result.id);
                                 $('#anndescription').val(result.Description);
                                 $('#ville').val(result.City);
                                },
                                error:function(er){
                                  console.log(er);
                                }
                               });



                                  setTimeout(() => {
                    $('#afterup').removeClass('alert alert-success');
                  $('#afterup').html('');
                  }, 1000);


                }


            },
            error:function(er){
              console.log(er);
            }
          });


        })


               </script>
              </div>
              </div>
            </div>
           </div>

         </div>

<script>




 /*
 function fetch_data(page){
            $.ajax({
                url:"/GetAnnonces?page="+page,
                success:function(data){
                    $("#showann").html(data);

                }
            })
        }
$(document).on('click','.pages_link x',function(e){
            e.preventDefault();
            var page=$(this).attr('href').split('page=')[1];
            alert();
            //fetch_data(page);
        });

 */
</script>


@endsection
