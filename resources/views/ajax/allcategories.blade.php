
<link rel="stylesheet" href="{{url('css/categories.css')}}">
<div class="container">

    <div class="d-flex justify-content-center align-items-center mt-5"> <button class="btn btn-warning" style="width: 300px" data-toggle="modal" data-target="#addcategrymodal">{{__('traduction.ANC')}}+</button> </div>
    <div class="row mt-2 g-4">
        <div id="res"></div>
        @foreach ($categories as $category)
        <div class="col-md-3 " style="position: relative">
            <div class="remcat" style="position: absolute;top:-20px" id="{{$category->id}}" ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
              </svg></div>
            <div class="card p-1 catgrp" id="{{$category->id}}"  data-toggle="modal" data-target="#upcatmodal" >
                <div class="d-flex justify-content-between align-items-center p-2">
                    <div class="flex-column lh-1 imagename"> <span>{{$category->NomCategory}}</span></div>
                    <div> <img src="{{url('images/'.$category->ImageCategory)}}" height="100" width="100" /> </div>
                </div>

            </div>

        </div>
        @endforeach


    </div>
</div>
<script>
    $(".catgrp").click(function(){
        var catid=$(this).attr('id');
        var urllink="api/getCategoryByIdApi/"+catid;
        $.ajax({
                url:urllink,
                success:function(data){
                    console.log(data);
                    var newsrc="{{url('/')}}"+"/images/"+data[0].ImageCategory;
                    document.getElementById("fakecatup").setAttribute('src',"");
                    document.getElementById("fakecatup").setAttribute('src',newsrc);
                    $('#nomcat').val(data[0].NomCategory);
                    $('#catidup').val(data[0].id);
                    $('#oldpic').val(data[0].ImageCategory);
                },
            error:function(er){
              console.log(er);
            }
            })
    })

    $('.remcat').click(function(){
        var catid=$(this).attr('id');
        $.ajax({
    url: 'api/deletecategorybyid',
    type: 'POST',
    data: { _method:'delete', catid: catid, _token: '{{csrf_token()}}' },
    dataType: 'json',
                              success:function(res){
                                $('#allcategories').click();
                                setTimeout(() => {
                                    $('#res').addClass('alert alert-success');
                  $('#res').html(res.msg);
                                }, 600);

                                  },
            error:function(er){
              console.log(er);
            }
    });
    })
</script>
