
<link rel="stylesheet" href="{{ url('css/reset.css')}}">
<x-Header type="home" t1p1="" t1p2="{{__('traduction.&')}} " t1p3="{{__('traduction.?')}}"  t2p1="{{__('traduction.d')}}"  t3p1="{{__('traduction.yc')}}" t4p1="{{__('traduction.and')}}" t4p2="{{__('traduction.share')}}" t4p3="{{__('traduction.happiness')}}"  i2="bg2.png" i3="bg3.png" i4="bg4.png"  i1="bg1.png" p1="{{__('traduction.p2')}}" p2="{{__('traduction.p3')}}" p3="{{__('traduction.p1')}}" p4="{{__('traduction.p4')}}"/>
<!--
<section class="product-section">

    <div class="category  grid" style="background-color: black;">
      <div>
        <h3 class="text-black fs-50 fs-poppins bold">

          <span class="block fs-300 fs-poppins bold text-black"style="color:white;"> Big</span
          ><span
            class=" uppercase fs-400 fs-poppins bold-900 lineheight " style="color:white;"
            >Deals</span
          >
        </h3>
        <button class="prdduct-btn large-btn  fs-poppins">
          Brows
        </button>
      </div>
      <div class="product-img4">
        <img src="{{ url('images/bigdeals.png')}}" alt="" />
      </div>
    </div>

    <div class="category  grid" style="background-color: black;">
      <div>
        <h3 class="text-black fs-50 fs-poppins bold">

          <span class="block fs-300 fs-poppins bold text-black"style="color:white;">Small</span
          ><span
            class=" uppercase fs-400 fs-poppins bold-900 lineheight " style="color:white;"
            >Deals</span
          >
        </h3>
        <button class="prdduct-btn large-btn fs-poppins">
          Brows
        </button>
      </div>
      <div class="product-img5">
        <img src="{{ url('images/home_decor.png')}}" alt="" />
      </div>
    </div>
</section>-->
<!-- ========================================= -->
@php
if (session()->has('userid')) {
  $userid=session('userid');

}
else{
  $userid=-1;
}
@endphp
<section class="book-form" id="book-form">
  <div class="form">
    <!--<input data-aos="zoom-in" data-aos-delay="600" type="submit" value="find now" class="btn" id="find">-->

      <div style="text-align: right" data-aos="zoom-in" data-aos-delay="150" class="inputBox">
          <span style="font-size: 18px"> &nbsp; &nbsp; &nbsp;:{{__('traduction.City')}}</span>
          <input id="hint3" style="text-align: right;color:white;height:100%" type="text" class="form-control" name="City" placeholder="{{__('traduction.CC')}}" list="depart" >

                  <datalist id="depart" style="text-align: center">
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
      <div style="text-align: right" data-aos="zoom-in" data-aos-delay="300" class="inputBox">
          <span style="font-size: 18px"> &nbsp; &nbsp; &nbsp;:{{__('traduction.Cat')}}</span>
          <br>
          <select style="text-align: right" type="" placeholder="" value="" style="color:white" id="cat" required>
            <option  disabled selected hidden>{{__('traduction.allcat')}}</option>
            @foreach ($categories as $category)
            <?php
                echo("<optgroup label='$category->NomCategory' style='background-color:#e29f01; font-weight: bold;text-align:center'>");
                  foreach ($souscategories as $souscategory) {
                    if ($souscategory->Categoryid==$category->id) {
                      echo("<option style='background-color:white;color:black' value='$souscategory->id'>$souscategory->NomSousCategory</option>");
                    }
                  }
                  echo("</optgroup>");
        ?>
            @endforeach
          </select>
       </div>
      <div style="text-align: right" data-aos="zoom-in" data-aos-delay="300" class="inputBox">
          <span style="font-size: 18px"> &nbsp; &nbsp; &nbsp;{{__('traduction.wyn')}}</span>
          <input  style="text-align: right" type="" placeholder="{{__('traduction.EKW')}}" value="" id="hint1" required>
      </div>


  </div>

</section>
<section id="serchresult" class="book-form bg-light"  id="book-form" hidden="hidden">
  <h3 align="right" style="margin-right: 3%;border-bottom:2px solid black;border-bottom-height: 100px;">{{__('traduction.SR')}}</h3>
  <div id="productslist">

    @include('ajax.productfetching')

  </div>

</section>
 <section class="book-form bg-light recentes"  id="book-form">
   <h3 align="right" style="margin-right: 3%;border-bottom:2px solid black;border-bottom-height: 100px;">{{__('traduction.RO')}}</h3>
   <main style="align-content: right" dir="rtl">
    <div class="container-fluid bg-trasparent my-4 p-3" style="position: relative;">
        <div class="row row-cols-1 row-cols-xs-2 row-cols-sm-2 row-cols-lg-4 g-3">
   @foreach ($recents as $recent)
    <?php
    $pics=explode('**',$recent->images);
    ?>
    <div class="col">
      <div class="card w-100 h-100 shadow-sm ">
        <div class="card-header ">
          <div id="carousel-{{$recent->id}}" class="carousel slide" data-ride="carousel">

            <div id="ci" class="carousel-inner">
              <div class="carousel-item active"><img src="{{url('sdannoncespics/'.$pics[0])}}" class="w-100 " width="100%" height="200px" alt="...">
                    </div>
              <?php
                  for ($i=1; $i <count($pics) ; $i++) {
                    ?>
                    <div class="carousel-item "><img src="{{url('sdannoncespics/'.$pics[$i])}}" class="w-100 " width="100%" height="200px" alt="...">
                    </div>

                    <?php
                  }
              ?>

            </div>
            <a class="carousel-control-prev" href="#carousel-{{$recent->id}}" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carousel-{{$recent->id}}" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
        </div>

          <div class="card-body">
              <div class="clearfix mb-3"> <span class="float-start badge p-2 rounded-pill bg-primary" style="font-size: 12pt">{{$recent->Title}}</span> <span class="float-end price-hp">{{$recent->City}}</span> </div>
              <br>
              <h5 class="card-title">{{$recent->Description}}</h5>
              @if (session()->has('userid') && session('userid')==$recent->AnnonceurId)
              <div class="text-center my-2"> <a href="AnnonceParametrs/{{$recent->id}}" id="{{$recent->id}}" class="btn btn-warning p-3 traitement" style="font-size:10pt;font-weight:600">اعدادات العرض</a> </div>

              @else
              @if (session()->has('UserName'))
              @php
                  $x=0;
              @endphp
                  @foreach ($offersiwant as $offer)
                      @if ($offer->AnnonceId==$recent->id)
                          @php
                              $x++;
                          @endphp
                      @endif
                  @endforeach
                  @if ($x==0)
                  <div class="text-center my-2"> <a id="{{$recent->id}}" class="btn btn-warning p-3 iwant" style="font-size:10pt;font-weight:600">{{__('traduction.IW')}}</a> </div>
                  <div class="text-center my-2"> <a id="c{{$recent->id}}" class="btn btn-secondary p-3 cancel" style="font-size:10pt;font-weight:600" hidden="hidden">{{__('traduction.Cancel')}}</a> </div>
                 @else
                 <div class="text-center my-2"> <a id="{{$recent->id}}" class="btn btn-warning p-3 iwant" style="font-size:10pt;font-weight:600"  hidden="hidden">{{__('traduction.IW')}}</a> </div>
              <div class="text-center my-2"> <a id="c{{$recent->id}}" class="btn btn-secondary p-3 cancel" style="font-size:10pt;font-weight:600">{{__('traduction.Cancel')}}</a> </div>
                  @endif
                  @else
                  <div class="text-center my-2"> <a id="{{$recent->id}}" class="btn btn-warning p-3 iwant" style="font-size:10pt;font-weight:600">{{__('traduction.IW')}}</a> </div>

              @endif
              @endif
       </div>
      </div>
  </div>
    @endforeach
  </div>
</div>
</main>
 </section>


<!--**********************-->
 <section class="home-features">
  <div class="feature-card-container">
    <img
      alt="image"
      src="{{url('images/rocket1.svg')}}"
      class="feature-card-image"
    />
    <h5 class="feature-card-text headingThree">
      <span>{{__('traduction.PYAWSS')}}</span>
    </h5>
    <span class="feature-card-text1">
      <span>{{__('traduction.A24H')}}</span>
    </span>
  </div>
  <div class="feature-card-container">
    <img
      alt="image"
      src="{{url('images/person1.svg')}}"
      class="feature-card-image"
    />
    <h5 class="feature-card-text headingThree"><span>{{__('traduction.CT')}}</span></h5>
    <span class="feature-card-text1">
      <span>{{__('traduction.AHT')}}</span>
    </span>
  </div>
  <div class="feature-card-container">
    <img
      alt="image"
      src="{{url('images/cube1.svg')}}"
      class="feature-card-image"
    />
    <h5 class="feature-card-text headingThree">
      <span>{{__('traduction.TTYDN')}}</span>
    </h5>
    <span class="feature-card-text1">
      <span>{{__('traduction.TATMPN')}}</span>
    </span>
  </div>

</section>
<br>
<br>
<br>
      <!--===== APP =======-->
     <section class="app section bd-container" style="">
        <div class="app__container bd-grid">
            <div class="app__data">
                <span class="section-subtitle app__initial">{{__('traduction.App')}}</span>
                <h2 class="section-title app__initial">{{__('traduction.AIANOPS')}}</h2>
                <p class="app__description">{{__('traduction.IIASOF')}}
                </p>
                <div class="app__stores">
                    <a href="#"><img src="{{ url('images/app1.png')}}" alt="" class="app__store"></a>
                    <a href="#"><img src="{{ url('images/app2.png')}}" alt="" class="app__store"></a>
                </div>
            </div>

            <img src="{{ url('images/movil-app.png')}}" alt="" class="app__img">
        </div>
    </section>

    <script>

//alert("{{session('userid')}}");
var userid;
if({{$userid}}!=""){
  userid={{$userid}};

}
else{
  userid=-1;

}
      var hint1;
      var hint2;
      var hint3;
      $('#hint1').keyup(function(){
        hint1=$(this).val();
        hint2=$('#cat').val();
        hint3=$('#hint3').val();
        if(hint2==null){
          hint2="";
        }

        $.ajax({
          url:'api/GetAnnoncesByHintsApi?hint1='+hint1+'&hint2='+hint2+'&hint3='+hint3+'&page=1&userid='+userid,
                              success:function(res){

                                  $('#serchresult').removeAttr('hidden');
                                  console.log(res);
                                  $("#productslist").html(res);
                                  $('.recentes').attr('hidden','hidden');
                                  iwantclick();
                                  cancelclick();





                                  },
            error:function(er){
              console.log(er);
            }
                            })
      })

      $('#cat').change(function(){
         hint1=$('#hint1').val();
         hint2=$(this).val();
         hint3=$('#hint3').val();
         $.ajax({
          url:'api/GetAnnoncesByHintsApi?hint1='+hint1+'&hint2='+hint2+'&hint3='+hint3+'&page=1&userid='+userid,
                              success:function(res){

                                  $('#serchresult').removeAttr('hidden');
                                  $("#productslist").html(res);
                                  $('.recentes').attr('hidden','hidden');
                                  iwantclick();
                                  cancelclick();




                                  },
            error:function(er){
              console.log(er);
            }
                            })
      })

      $('#hint3').change(function(){
         hint1=$('#hint1').val();
         hint2=$('#cat').val();
         hint3=$(this).val();
        if(hint2==null){
          hint2="";
        }
        $.ajax({
          url:'api/GetAnnoncesByHintsApi?hint1='+hint1+'&hint2='+hint2+'&hint3='+hint3+'&page=1&userid='+userid,
                              success:function(res){

                                  $('#serchresult').removeAttr('hidden');
                                  $("#productslist").html(res);
                                  $('.recentes').attr('hidden','hidden');
                                  iwantclick();
                                  cancelclick();




                                  },
            error:function(er){
              console.log(er);
            }
                            })
      })


       //**************pagination************************//
       function fetch_data(page){
            $.ajax({
                url:'api/GetAnnoncesByHintsApi?hint1='+hint1+'&hint2='+hint2+'&hint3='+hint3+'&page='+page+'&userid='+userid,
                success:function(data){
                    $("#productslist").html(data);
                    $('.recentes').attr('hidden','hidden');
                    iwantclick();
                                  cancelclick();

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

        function iwantclick(){
          $('.iwant').click(function(e){
   alert($(this).attr('id'));
   var annid=$(this).attr('id');
   var username='{{session("userid")}}';
   $.ajax({
    url: '/AddOffertIwant',
    type: 'POST',
    data: { _method:'PUT', username: username,annid:annid, _token: '{{csrf_token()}}' },
    dataType: 'json',
                              success:function(res){

                                if(res.code==1){
                                 $("#"+annid).attr('hidden','hidden');
                                 $("#c"+annid).removeAttr('hidden');
                }
                else{
                  window.location="/signin";
                }


                                  },
            error:function(er){
              console.log(er);
            }
    });


 })
        }
        iwantclick();



 ////////////////////////////

 function cancelclick(){
  $('.cancel').click(function(){
   var annid=$(this).attr('id').substring(1);
   alert(annid);
   var username='{{session("userid")}}';
   $.ajax({
    url: '/deleteOffertIwant',
    type: 'POST',
    data: { _method:'DELETE', username: username,annid:annid, _token: '{{csrf_token()}}' },
    dataType: 'json',
                              success:function(res){

                                if(res.code==1){
                                 $("#c"+annid).attr('hidden','hidden');
                                 $("#"+annid).removeAttr('hidden');
                                 var userid="{{session('userid')}}";
   $.ajax({
          url:'getitemsofuser/'+userid,
                              success:function(res){
                                $("#itemscontenue").html("");
                                  $("#itemscontenue").html(res);
                                  cancelclick();

                                  },
            error:function(er){
              console.log(er);
            }
                            })

                }




                                  },
            error:function(er){
              console.log(er);
            }
    });

 })
 }

 cancelclick();

 //////////////////notification////////////

 if (userid!=-1) {
  $.ajax({
          url:'api/getUnreadMessages/'+userid,
                              success:function(res){
                                  $("#box").html(res);
                                  console.log(res);
                                  if ($('#notifcount').html()!="0") {
                                    $("#notifalert").removeAttr('hidden');
                                  }
                                  else{
                                    $("#notifalert").attr('hidden','hidden');
                                  }


                                  },
            error:function(er){
              console.log(er);
            }
                            })

                            setInterval(() => {
                              $.ajax({
          url:'api/getUnreadMessages/'+userid,
                              success:function(res){
                                  $("#box").html(res);
                                  console.log(res);
                                  if ($('#notifcount').html()!="0") {
                                    $("#notifalert").removeAttr('hidden');
                                  }
                                  else{
                                    $("#notifalert").attr('hidden','hidden');
                                  }


                                  },
            error:function(er){
              console.log(er);
            }
                            })
                            }, 5000);
 }

 function show(){
  $('#showitemsiwant').click(function(){
   var userid="{{session('userid')}}";
   $.ajax({
          url:'getitemsofuser/'+userid,
                              success:function(res){
                                $("#itemscontenue").html("");
                                  $("#itemscontenue").html(res);
                                  cancelclick();

                                  },
            error:function(er){
              console.log(er);
            }
                            })
 })
 }
 show();


    </script>
   @include('modals.itemsiwantcontainer')

<x-Footer/>


