<link rel="stylesheet" href="{{url('css/productstovalidate.css')}}">
@include('modals.addsouscategory')

<div class="container-fluid">
    <div class="row w-100">

        <section class="content w-100 ">
            <div id="remarque"></div>


            <div class="col-md-12 ">
                <div class="panel panel-default ">
                    <select id="cats" style="padding: 8px;margin-left:30%;text-align:center" >
                        <option selected value="all">{{__('traduction.ALL')}}</option>
                        @foreach ($categories as $category)
                            <option value="{{$category->id}}">{{$category->NomCategory}}</option>
                        @endforeach
                    </select>
                    <input class="btn btn-warnning " style="width:200px;background-color:#e29f01;border:0" data-toggle="modal" data-target="#addsouscategrymodal"  type="button" value="{{__('traduction.A')}}">
                    <div id="typecontent">
                   @include('ajax.fetchsouscategories')
                    </div>
                </div>
            </div>
            <br>

        </section>
    </div>
</div>
<script>
    var catid="all";
    var nbrofpage=1;
    function fetch_data(page){
          $.ajax({
              url:"/souscategorybycatblade/"+catid+"?page="+page,
              success:function(data){
                $("#typecontent").html("");
                  $("#typecontent").html(data);
                  removesouscat();






              },
          error:function(er){
            console.log(er);
          }
          })
      }
$(document).on('click','.pages_link a',function(e){
          e.preventDefault();
          var page=$(this).attr('href').split('page=')[1];
          nbrofpage=page;
          fetch_data(nbrofpage);
          removesouscat();


      });

      $('#cats').change(function(){
          catid=$(this).val();
          fetch_data(1);
          $('#cats').val(catid);


      })


      $('#addscat').on('submit',function(e){
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
                    $('.res').addClass('alert alert-success');
                  $('.res').html(result.msg);
                  form[0].reset();
                  fetch_data(nbrofpage);

                  }
                  if(result.code==2){
                    $('.res').addClass('alert alert-danger');
                  $('.res').html(result.msg);
                  }


              }

            },
            error:function(er){
              console.log(er);
            }
          });
        })

        ////////////////

        function removesouscat(){
        $('.remscat').click(function(){
        var souscatid=$(this).attr('id');
        $.ajax({
    url: 'api/removesouscategory',
    type: 'POST',
    data: { _method:'delete', souscatid: souscatid, _token: '{{csrf_token()}}' },
    dataType: 'json',
                              success:function(res){
                                 fetch_data(nbrofpage);

                                  },
            error:function(er){
              console.log(er);
            }
    });
    })
    }
    removesouscat();
</script>
