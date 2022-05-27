<link rel="stylesheet" href="{{url('css/productsstyle.css')}}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
@if (count($annonces)>0)
<main dir="rtl">
  <div class="container-fluid bg-trasparent my-4 p-3" style="position: relative;">
      <div class="row row-cols-1 row-cols-xs-2 row-cols-sm-2 row-cols-lg-4 g-3">
        @foreach ($annonces as $annonce)
        <?php
        $pics=explode('**',$annonce->images);
        ?>
        <div class="col">
          <div class="card w-100 h-100 shadow-sm ">
            <div class="card-header ">
              <div id="carousel2-{{$annonce->id}}" class="carousel slide" data-ride="carousel">

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
                <a class="carousel-control-prev" href="#carousel2-{{$annonce->id}}" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carousel2-{{$annonce->id}}" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>            </div>

              <div class="card-body">
                <div class="clearfix mb-3"> <span class="float-start badge p-2 rounded-pill bg-primary" style="font-size: 12pt">{{$annonce->Title}}</span> <span class="float-end price-hp">{{$annonce->City}}</span> </div>
                <h5 class="card-title" id="">{{$annonce->Description}}</h5>
                @if ($userid==$annonce->AnnonceurId)
                <div class="text-center my-2"> <a href="AnnonceParametrs/{{$annonce->id}}" id="{{$annonce->id}}" class="btn btn-warning p-3 traitement" style="font-size:10pt;font-weight:600">{{__('traduction.OS')}}</a> </div>

                @else
              @if ($userid!=-1)
              @php
                  $x=0;
              @endphp
                  @foreach ($offersiwant as $offer)
                      @if ($offer->AnnonceId==$annonce->id)
                          @php
                              $x++;
                          @endphp
                      @endif
                  @endforeach
                  @if ($x==0)
                  <div class="text-center my-2"> <a id="{{$annonce->id}}" class="btn btn-warning p-3 iwant" style="font-size:10pt;font-weight:600">{{__('traduction.IW')}}</a> </div>
                  <div class="text-center my-2"> <a id="c{{$annonce->id}}" class="btn btn-secondary p-3 cancel" style="font-size:10pt;font-weight:600" hidden="hidden">{{__('traduction.Cancel')}}</a> </div>
                 @else
                 <div class="text-center my-2"> <a id="{{$annonce->id}}" class="btn btn-warning p-3 iwant" style="font-size:10pt;font-weight:600"  hidden="hidden">{{__('traduction.IW')}}</a> </div>
              <div class="text-center my-2"> <a id="c{{$annonce->id}}" class="btn btn-secondary p-3 cancel" style="font-size:10pt;font-weight:600">{{__('traduction.Cancel')}}</a> </div>
                  @endif
                  @else
                  <div class="text-center my-2"> <a id="{{$annonce->id}}" class="btn btn-warning p-3 iwant" style="font-size:10pt;font-weight:600">{{__('traduction.IW')}}</a> </div>

              @endif
                @endif


              </div>
          </div>
      </div>
        @endforeach
      </div>
    </div>
</main>
<div class="row">
  <div class="col-5"></div>
  <div class="col-3 pages_link mx-auto">  {{$annonces->onEachSide(1)->links()}}</div>
  <div class="col-4"></div>
</div>

  <script>



  /* $('.cd-trigger').click(function(){
  var produitid=$(this).attr('id');
  $.ajax({
                              url:'api/AnnonceById/'+produitid,
                              type:'GET',
                              success:function(result){
                                var pics=result.images.split("**");
                               $('#Title').html(result.Title);
                               $('#ci').html('');
                               $('#desc').html(result.Description);
                               $('#date').html(result.AnnDate);
                               $('#city').html(result.City);
                               $('.supprimer').attr('id',result.id);
                               $('.edit').attr('id',result.id);
                               $('#titre').val(result.Title);
                               $('#annid').val(result.id);
                               $('#anndescription').val(result.Description);
                               $('#ville').val(result.City);
                               $('#ci').append('<div class="carousel-item active"><img class="d-block w-100 " width="300px" height="400px" src="sdannoncespics/'+pics[0]+'" alt="First slide"></div>');
                               for (let i = 1; i < pics.length; i++) {
                                $('#ci').append('<div class="carousel-item"><img class="d-block w-100"  width="300px" height="400px" src="sdannoncespics/'+pics[i]+'" alt="First slide"></div>');
                               }
                              },
                              error:function(er){
                                console.log(er);
                              }
                             });
})*/
  </script>
  @else
  <h2 align="center">ليست هناك نتائج مطابقة لبحثك</h2>
  @endif
