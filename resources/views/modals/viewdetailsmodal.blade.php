
<style>
    .border_dot {
  border: 1px dashed #ccc;
}

.modal-footer button{
  background-color: white;
  border: 2px solid #e29f01;
  color: #e29f01;
  padding: 8px;
}
#dragable_modal {
  position: relative;
}

#dragable_modal .modal-dialog {
  position: fixed;
  max-width: 100%;
  box-shadow: 0 0 5px rgba(0, 0, 0, 0.5);
  background: var(--white);
  /* width:500px; */
  margin: 0;
  /* padding: 20px; */
  /* overflow: hidden; */
  /* resize: both; */
}

#dragable_modal .modal-content {
  /* padding: 20px; */
  height: 400px;
  overflow: hidden;
  resize: both;
  width: 500px;
}

#dragable_modal .modal-body {
  height: relative;
  overflow-x: hidden;
  overflow-y: auto;
}
#dragable_modal .modal-header {
  background: var(--dark);
  color: var(--white);
  border-bottom: 0px;
  padding: 0px;
}
#dragable_modal .modal-header h3 {
  color: var(--white);
  font-size: 18px;
}
#dragable_modal .close_btn {
  opacity: 1;
  width: 40px;
  height: 30px;
  padding: 0px;
  color: #fff;
}

.custom_tab_on_editor {
  background: var(--orange);
  padding: 0px;
  margin: 0px;
}

.custom_tab_on_editor .nav-item {
  margin-bottom: 0px;
}
.custom_tab_on_editor .nav-item .nav-link {
  min-width: 100px;
  text-align: center;
  border: 0px solid transparent;
  border-radius: 0px;
  padding: 10px;
  color: var(--white);
}

.custom_tab_on_editor .nav-item .nav-link:hover {
  color: #ffffff;
  border-width: 0px;
  background: #ffb586;
  border-bottom: 0px solid transparent;
}

.custom_tab_on_editor .nav-item.show .nav-link,
.custom_tab_on_editor .nav-link.active {
  color: #ffffff;
  border-width: 0px;
  background: #ffb586;
  border-bottom: 0px solid transparent;
  position: relative;
}
.dragable_touch {
  cursor: move;
}

.custom_tab_on_editor .nav-item.show .nav-link:before,
.custom_tab_on_editor .nav-link.active:before {
  content: "";
  border-bottom: 10px solid var(--white);
  border-left: 10px solid transparent;
  border-right: 10px solid transparent;
  position: absolute;
  bottom: 0px;
  left: 50%;
  transform: translateX(-50%);
}
</style>

<!-- dragable and editable bootsttrap modal modal -->
<div style="margin-top: 5%" class="modal fade" id="modalid" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header w-100">
        <div class="row m-0 w-100">
          <div class="col-md-12 px-4 p-2 dragable_touch d-block">
            <button type="button" style="margin-top: -6px" class="close close_btn" data-dismiss="modal" aria-label="Close" data-backdrop="static" data-keyboard="false">X</button>
            <h3 class="mr-1 " align="right">معلومات عن العرض</h3>
        </div>


          
        </div>

      </div>

      <div class="modal-body p-3 " style="height: 420px">
        <div class="row w-100 h-100 ml-1">
            <div class="col-6 " style="margin-left: -7px;height:400px">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <div id="ci" class="carousel-inner">
                     
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="sr-only">Next</span>
                    </a>
                  </div>
            </div>
            <div class="col-6 " style="height: 400px;padding:20px;display:block;justify-content:center;align-items:center;margin:auto;margin-top:25px">
                <h2 id="Title" align="center" class="product_name mx-auto" style="font-size: 24pt;font-weight:600;color:#e29f01"></h2>
                        <br>
                        @if (session()->has('UserName'))
                            <input type="text" id="userid" value="{{$user->id}}" hidden="hidden">
                        @endif
                        <br>
                        <p style="box-sizing:border-box;text-align:center;font-size:15pt" class="product_desc mx-auto" id="desc"></p>
                        <br>
                        <p style="box-sizing:border-box;text-align:center;font-size:12pt" class="product_desc mx-auto" id="city"></p>
                         <p style="box-sizing:border-box;text-align:center;font-size:12pt" class="product_desc mx-auto" id="date"></p>

                        </div>
        </div>
       
      </div>
      <div class="modal-footer bg-light">
        <div class="row w-100">
          <div class="col-3"></div>
          <div class="col-6 mx-auto"><button type="button" id=""  class="btn btn-primary iwant" style="margin-left: 40;"> ! انا بحاجته</button></div>
          <div class="col-3"></div>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
    $("#edit_row_btn").click(function () {
  //open modal
  $("#dragable_modal").modal({
    backdrop: false,
    show: true,
  });
  // reset modal if it isn't visible
  if (!$(".modal.in").length) {
    $(".modal-dialog").css({
      top: 20,
      left: 100,
    });
  }

  $(".modal-dialog").draggable({
    cursor: "move",
    handle: ".dragable_touch",
  });
});

    
    $('.cd-trigger').click(function(){
   var produitid=$(this).attr('id');
   $.ajax({
                               url:'api/AnnonceById/'+produitid,
                               type:'GET',
                               success:function(result){
                                 var pics=result.images.split("**");
                                 var user="{{session('UserName')}}";
                                if (user!="") {
                                  var userid=$('#userid').val();
                                  if(userid==result.AnnonceurId){
                                    $('.modal-footer').attr('hidden','hidden');
                                  }
                                  else{
                                    $('.modal-footer').removeAttr('hidden');
                                  }
                                }
                                else{
                                  $('.modal-footer').removeAttr('hidden');
                                }
                                $('.iwant').attr('id',result.id);
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
 })

 $('.iwant').click(function(){
   alert($(this).attr('id'));
 })
 
</script>
