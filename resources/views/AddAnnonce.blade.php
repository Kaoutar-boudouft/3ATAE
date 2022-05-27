

@extends('glayouts.nav-bar')
@section('content')

 <section id="add" class="add mx-auto w-100 " >
      <div class="container mx-auto">

        <div class="section-title text-center" data-aos="fade-up">
          <br>
          <h2 style="font-weight: bold;font-size:24pt" align="center">{{__('traduction.ANO')}}</h2>
        </div>
        <br>
        <br>
        <div class="row mx-auto">

          <div class="col-lg-6 col-sm-12 mx-auto "  data-aos="fade-right" data-aos-delay="100">

              <table id="picst" style="background-color:white">
                  <tr>
                    <td  style="border:2px solid #e29f01;padding:2px;align-content: center;text-align:center"><img id="im1" src="{{url('images/AddImage.png')}}" width="200px" height="200px"></td>
                    <td  style="border:2px solid #e29f01;padding:2px;align-content: center;text-align:center"><img id="im2" src="{{url('images/AddImage.png')}}" width="200px" height="200px"></td>
                  </tr>
                  <tr>
                      <td  style="border:2px solid #e29f01;padding:2px;align-content: center;text-align:center"><img id="im3" src="{{url('images/AddImage.png')}}"  width="200px" height="200px"></td>
                      <td  style="border:2px solid #e29f01;padding:2px;align-content: center;text-align:center"><img id="im4" src="{{url('images/AddImage.png')}}"  width="200px" height="200px"></td>
                  </tr>
              </table>

          </div>


          <div class="col-lg-6 col-sm-8  mt-5 mt-lg-0"  data-aos="fade-left" data-aos-delay="200">
            <div id="smalldealform">

            <form id="addsdform" style="padding:20px;font-size: 10pt;background-color:#ffffff00" class="ajout" action="{{url('AddsdAnnouncement')}}" method="post" enctype="multipart/form-data">
              @csrf



                  <div class="row mx-auto">
                      <div class="col-md-6 form-group mx-auto">
                          <select id="sdcat" class="mx-auto" style="width:200px;padding: 8px;background-color:black;color:white">
                              <option selected disabled style="text-align: center">{{__('traduction.Cat')}}</option>
                              <script>
                                    $(document).ready(function(){
                                                  $.ajax({
                                url:'api/GettingSDCategoryApi/all',
                                success:function(data){
                                  for(var i in data){
                                    $("#sdcat").append("<option value="+data[i].id+">"+data[i].NomCategory+"</option>");
                                        }
                                    }
                              })

                                    })
                              </script>
                          </select>
                      </div>
                      <div class="col-md-6 form-group mt-3 mt-md-0">
                          <select id="sdscat" name="souscate" class="mx-auto" style="width: 200px;padding:8px;background-color:black;color:white">
                            <script>
                              $('#sdcat').change(function(){
                                var sdcategid=$('#sdcat').val();
                                $.ajax({
                                url:'api/GettingSDSousCategoryApi/'+sdcategid,
                                success:function(res){
                                  $('#sdscat').html('');
                                  for(var j in res){
                                    $("#sdscat").append("<option value="+res[j].id+">"+res[j].NomSousCategory+"</option>");
                                        }
                                    }
                              })

                              })

                            </script>
                          </select>
                        </div>

                          <span style="color: red;width:100%;text-align:center" class="souscate_error"></span>

                    </div>

              <div class="row" >
                <div class="col-md-6 form-group">
                  <input style="text-align: center" type="text" class="form-control" name="Title" placeholder="{{__('traduction.T')}}" >

                </div>
                  <input type="text" class="form-control" name="Annonceurname" value="{{session('UserName')}}" placeholder="Title" hidden="hidden">
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input style="text-align: center"  type="text" class="form-control" name="City" placeholder="{{__('traduction.City')}}" list="depart" >

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
                <span style="color: red;width:50%;text-align:center" class="Title_error"></span>
                <span style="color: red;width:50%;text-align:center" class="City_error"></span>
              </div>


              <div class="form-group mt-3">
                <textarea class="form-control" style="text-align: center"  rows="5" name="Description" placeholder="{{__('traduction.DESC')}}" ></textarea>
                <span style="color: red;width:400px;width:100%;text-align:center" class="Description_error"></span>

              </div>
              <div class="form-group">
                  <input type="file" class="form-control"   rows="5" id="imu1"  name="im1" hidden="hidden"/>
                  <span style="color: red;width:400px" class="im1_error"></span>


                </div>
                <div class="form-group ">
                    <input type="file" class="form-control"  rows="5" id="imu2"   name="im2"  hidden="hidden"/>

                  </div>
                  <div class="form-group">
                    <input type="file" class="form-control"  rows="5" id="imu3"   name="im3"  hidden="hidden"/>

                  </div>
                  <div class="form-group ">
                    <input type="file" class="form-control"  rows="5" id="imu4"  name="im4"  hidden="hidden"/>

                  </div>
                  <br>
                  <br>
              <div style="margin-top: -100px"><div class="text-center"><input type="submit" value="{{__('traduction.aa')}}" name="add" id="submit" style="background: #000000;border: 0;padding: 10px 30px;color: #fff;transition: 0.4s;border-radius: 50px;"></div>
              <br><div class="text-center"><button type="Reset">{{__('traduction.RESET')}}</button></div></div>
                 </div>
            </form>
            <meta name="csrf-token" content="{{csrf_token()}}">
            <script>
              $(document).ready(function() {


                             const real1=document.getElementById("imu1");
                             const fake1=document.getElementById("im1");

                             const real2=document.getElementById("imu2");
                             const fake2=document.getElementById("im2");

                             const real3=document.getElementById("imu3");
                             const fake3=document.getElementById("im3");

                             const real4=document.getElementById("imu4");
                             const fake4=document.getElementById("im4");


                             fake1.addEventListener("click",function(){
                               real1.click();
                             });
                             real1.addEventListener("change",function(){
                               if(real1.value){
                                 const im=this.files[0];
                                 if(im){
                                   const reader=new FileReader();
                                   reader.addEventListener("load",function(){
                                      fake1.setAttribute('src',"");
                                     fake1.setAttribute('src',reader.result);
                                   });
                                   reader.readAsDataURL(im);
                                 }
                               }
                             });

                             fake2.addEventListener("click",function(){
                               real2.click();
                             });
                             real2.addEventListener("change",function(){
                               if(real2.value){
                                 const im=this.files[0];
                                 if(im){
                                   const reader=new FileReader();
                                   reader.addEventListener("load",function(){
                                      fake2.setAttribute('src',"");
                                     fake2.setAttribute('src',reader.result);
                                   });
                                   reader.readAsDataURL(im);
                                 }
                               }
                             });

                             fake3.addEventListener("click",function(){
                               real3.click();
                             });
                             real3.addEventListener("change",function(){
                               if(real3.value){
                                 const im=this.files[0];
                                 if(im){
                                   const reader=new FileReader();
                                   reader.addEventListener("load",function(){
                                      fake3.setAttribute('src',"");
                                     fake3.setAttribute('src',reader.result);
                                   });
                                   reader.readAsDataURL(im);
                                 }
                               }
                             });

                             fake4.addEventListener("click",function(){
                               real4.click();
                             });
                             real4.addEventListener("change",function(){
                               if(real4.value){
                                 const im=this.files[0];
                                 if(im){
                                   const reader=new FileReader();
                                   reader.addEventListener("load",function(){
                                      fake4.setAttribute('src',"");
                                     fake4.setAttribute('src',reader.result);
                                   });
                                   reader.readAsDataURL(im);
                                 }
                               }
                             });

                                                        $.ajaxSetup({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                }
                            });

                             $('#addsdform').on('submit',function(e){
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
                                    form[0].reset();
                                    window.location="/profile";
                                  }

                                },
            error:function(er){
              console.log(er);
            }
                               });
                             })


                            });

                       </script>
                     <style>
                       body{
                        background-image: url({{url('images/bgadd.png')}});
                        background-size:400px;
                        background-repeat: no-repeat;
                        background-position:right bottom;
                       }
                      .add{
                        margin-top: 100px;
                                            }
                      .add .info {
                    width: 100%;
                    background: #fff;
                    padding-top: 20px;
                    border-right:4px solid black;
                    }
                    .add .info i {
                    font-size: 20px;
                    color: rgba(149, 64, 219, 0.91);
                    float: left;
                    width: 44px;
                    height: 44px;
                    background: #f0f0ff;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    border-radius: 50px;
                    transition: all 0.3s ease-in-out;
                    }
                    .add .info h4 {
                    padding: 10px 0 0 60px;
                    font-size: 22px;
                    font-weight: 600;
                    color: rgba(0, 0, 0, 0.91);

                    }

                    .add .info .b, .add .info .c {
                    margin-top: 40px;
                    }
                    .add .info .a:hover i, .add .info .b:hover i, .add .info .c:hover i {
                    background: #000000;
                    color: #fff;
                    }
                    .add .ajout {
                    width: 100%;
                    background: #fff;
                    }
                    .add .ajout .form-group {
                    padding-bottom: 8px;
                    }
                    .add .ajout input, .add .ajout textarea {
                    border-radius: 0;
                    box-shadow: none;
                    font-size: 14px;
                    }
                    .add .ajout input {
                    height: 44px;
                    }
                    .add .ajout textarea {
                    padding: 10px 12px;
                    }
                    .add .ajout button[type=reset]{
                    border: 0;
                    padding: 10px 30px;
                    color: rgb(0, 0, 0);
                    transition: 0.4s;
                    border-radius: 50px;
                    margin-left: 5px;
                    }
                    .add .ajout  button[type=submit]:hover {
                    background: rgba(149, 64, 219, 0.91);
                    }
                      #home{
                          color:#e29f01;
                      }

                      @media only screen and (max-width: 600px) {

                          #picst{
                                 height: 450px;
                             }
                             #addsdform{
                               width:100%;
                             }

                      }
                      @media only screen and (max-width: 1500px) {
                        .add{
                              margin-top: 100px;
                          }


                      }
                      @media only screen and (max-width: 1000px) and (min-width: 600px) {
                          .add{
                              margin-top: 100px;
                          }
                          #addsdform{
                               width:400px;
                             }
                    #picst{
                      height: 450px;
                      width: 400px;
                    }
                             #picst td {
                               width:100px;
                               height: 100px;
                             }


                      }


                      @media only screen and (min-width: 900px) {
                             #picst{
                                 height: 350px;
                             }


                      }


                    .data-user li {
                    margin: 0;
                    padding: 0;
                    display: table-cell;
                    text-align: center;
                    border-left: 0.1em solid transparent;
                    }

                    .data-user li a,.data-user li strong {
                    display: block;
                    }
                    .data-user li a {
                    background-color: #f7f7f7;
                    border-top: 1px solid rgba(242,242,242,0.5);
                    border-bottom: .2em solid #f7f7f7;
                    box-shadow: inset 0 1px 0 rgba(255,255,255,0.4),0 1px 1px rgba(255,255,255,0.4);
                    padding: .93em 0;
                    color: #46494c;
                    }
                    .data-user li a strong,.data-user li a span {
                    font-weight: 600;
                    line-height: 1;
                    }
                    .data-user li a strong {
                    font-size: 2em;
                    }
                    .data-user li a span {
                    color: #717a7e;
                    }
                    .data-user li a:hover {
                    background: rgba(0, 0, 0, 0.05);
                    border-bottom: .2em solid #e29f01;
                    color: #e29f01;
                    }
                    .data-user li a:hover span {
                    color: #e29f01;
                    }



                    </style>
                    <!-- ======= Add Section ======= -->


            @endsection

