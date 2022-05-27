<link rel="stylesheet" href="{{url('css/productstovalidate.css')}}">
<div class="container-fluid">
    <div class="row w-100">

        <section class="content w-100 ">
            <h1>{{__('traduction.O')}}</h1>
            <div id="remarque"></div>

            <div class="col-md-12 ">
                <div class="panel panel-default ">
                    <div class="panel-body">
                       <div class="pull-right">
                            <div class="btn-group" style="display: flex;align-items:center;align-content:center;color:black"> <button type="button" class="btn btn-light btn-filter" style="width:25%;color:black" id="all" >{{__('traduction.ALL')}}</button><button type="button" class="btn btn-success btn-filter" style="width: 25%;color:black" data-target="greenee" id="valider">{{__('traduction.V')}}</button> <button type="button" class="btn btn-warning btn-filter" style="width: 25%;color:black" data-target="yelloww" id="endiscussion">{{__('traduction.ID')}}</button> <button style="width: 25%;color:black" type="button" class="btn btn-danger btn-filter" data-target="redd" id="encoursdevalidation">{{__('traduction.IP')}}</button></div>
                        </div>
                        <div class="table-container" id="typecontent">
                            <table class="table table-filter">
                                <tbody>
                                    <input id="numberofitemsinpage" type="text" value="{{count($annonces)}}" hidden="hidden" >

                                    @foreach ($annonces as $annonce)
                                    <?php
                                    $pics=explode('**',$annonce->images);
                                    ?>
                                    <tr data-status="redd">
                                        <td style="width: 30%">
                                            <a href="#" class="pull-left"> <img src="{{url('sdannoncespics/'.$pics[0])}}" width="200" height="200"> </a>

                                        </td>
                                        <td style="width: 60%">
                                            <div class="media">
                                                <div class="media-body">
                                                    <h4 class="title">{{$annonce->Title}}<span class="pull-right redd"> ({{$annonce->status}})</span> </h4>
                                                    <p class="summary">{{$annonce->Description}}</p>
                                                </div>
                                            </div>
                                        </td>
                                        @if ($annonce->status=="encoursdevalidation")
                                        <td style="width: 10%">
                                            <div style="display: flex"><input class="btn btn-success accepter" id="{{$annonce->id}}" style="margin-right: 3px" type="button" value="{{__('traduction.Accept')}}"><input class="btn btn-warning reffuser" type="button" value="{{__('traduction.Refuse')}}" id="{{$annonce->id}}"></div>
                                        </td>
                                        @else
                                        <td style="width: 10%">
                                            <input class="btn btn-danger delete" style="width: 50px;padding:3px" type="button" value="حذف" id="{{$annonce->id}}"></div>
                                        </td>
                                        @endif
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                            <div class="row">
                                <div class="col-2"></div>
                                <div class="col-3 pages_link mx-auto">  {{$annonces->onEachSide(1)->links()}}</div>
                                <div class="col-4"></div>
                              </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>

        </section>
    </div>
</div>
<script>
var tovalidatepage=1;
var type="all";

    $("#valider").click(function(){

        type="valider";
        $.ajax({
                url:"/productfetchingblade/valider",
                success:function(data){
                    $("#typecontent").html("");
                    $("#typecontent").html(data);
                    deleteann();

                },
            error:function(er){
              console.log(er);
            }
            })

    })

    $("#endiscussion").click(function(){
        type="endiscussion";


$.ajax({
        url:"/productfetchingblade/endiscussion",
        success:function(data){
            $("#typecontent").html("");
            $("#typecontent").html(data);
            deleteann();

        },
    error:function(er){
      console.log(er);
    }
    })

})

$("#encoursdevalidation").click(function(){
    type="encoursdevalidation";


$.ajax({
        url:"/productfetchingblade/encoursdevalidation",
        success:function(data){
            $("#typecontent").html("");
            $("#typecontent").html(data);
            deleteann();
            accepter();
            refuser();



        },
    error:function(er){
      console.log(er);
    }
    })

})

$("#all").click(function(){
    type="all";


$.ajax({
        url:"/productfetchingblade/all",
        success:function(data){
            $("#typecontent").html("");
            $("#typecontent").html(data);
            deleteann();
            accepter();
            refuser();



        },
    error:function(er){
      console.log(er);
    }
    })

})



    function fetch_data(page){
          $.ajax({
              url:"/productfetchingblade/"+type+"?page="+page,
              success:function(data){
                $("#typecontent").html("");
                  $("#typecontent").html(data);
                  deleteann();
                  accepter();
                  refuser();





              },
          error:function(er){
            console.log(er);
          }
          })
      }
$(document).on('click','.pages_link a',function(e){
          e.preventDefault();
          var page=$(this).attr('href').split('page=')[1];
          tovalidatepage=page;
          fetch_data(page);

      });


      function deleteann(){
        $('.delete').click(function(){
            var annid=$(this).attr('id');
            $.ajax({
                url:"api/DeleteAnnonceById/"+annid,
                success:function(data){
                    if ($('#numberofitemsinpage').val()<=1) {
                        tovalidatepage--;
                    }
                    fetch_data(tovalidatepage);
                        setTimeout(() => {
                            $('#remarque').addClass('alert alert-success');
      $('#remarque').html("{{__('traduction.AR')}}");
                        }, 900);
                        setTimeout(() => {
                            $('#remarque').removeClass('alert alert-success');
      $('#remarque').html("");
                        }, 900);


                },
            error:function(er){
              console.log(er);
            }
            })
        })
    }
    deleteann();

    function accepter(){
    $('.accepter').click(function(){
            var annid=$(this).attr('id');
            $.ajax({
                url:"api/validateannouncement/"+annid,
                success:function(data){
                    if ($('#numberofitemsinpage').val()<=1) {
                        tovalidatepage--;
                    }
                    fetch_data(tovalidatepage);
                        setTimeout(() => {
                            $('#remarque').addClass('alert alert-success');
      $('#remarque').html("{{__('traduction.AA')}}");
                        }, 900);
                        setTimeout(() => {
                            $('#remarque').removeClass('alert alert-success');
      $('#remarque').html("");
                        }, 900);


                },
            error:function(er){
              console.log(er);
            }
            })
        })
}
    accepter();

    function refuser(){
        $('.reffuser').click(function(){
            var annid=$(this).attr('id');
            $.ajax({
                url:"api/reffuserannouncement/"+annid,
                success:function(data){
                    if ($('#numberofitemsinpage').val()<=1) {
                        tovalidatepage--;
                    }
                    fetch_data(tovalidatepage);
                        setTimeout(() => {
                            $('#remarque').addClass('alert alert-success');
      $('#remarque').html("{{__('traduction.AR')}}");
                        }, 900);
                        setTimeout(() => {
                            $('#remarque').removeClass('alert alert-success');
      $('#remarque').html("");
                        }, 900);



                },
            error:function(er){
              console.log(er);
            }
            })
        })
    }
    refuser();

</script>
