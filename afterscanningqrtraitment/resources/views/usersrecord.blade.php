<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
<div class="card mx-auto" style="width: 18rem;">
    <img class="card-img-top" src="{{url('profilepics/'.$user->photo)}}" alt="Card image cap">
    <div class="card-body">
        @if($user->Points==0)
            <h6 align="center">Record : {{$user->Points}} points</h6>
            <p class="mx-auto" align="center"> Record Null ! </p>
        @else
            <div id="content">
                <h6 align="center">Record : {{$user->Points}} points</h6>
                <div class="input-group mb-3" id="firstform">
                    <input id="sc" type="text" class="form-control" placeholder="Support Code" aria-label="Recipient's username" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="button" id="next1">Next</button>
                    </div>
                    <div id="remarque" style="width: 100%;text-align: center"></div>
                </div>
            </div>




        @endif
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
    var amtopay;
    var pointtodisc;
    var userid="{{$user->id}}";
    $('#next1').click(function(){
        var suppcode=$('#sc').val();
        if(suppcode==""){
            $('#remarque').addClass('alert alert-danger');
            $('#remarque').html('Support Code obligatory! ');
        }
        else {
            $('#remarque').removeClass('alert alert-danger');
            $('#remarque').html('');
            $.ajax({
                url:"{{url('/')}}"+"/api/checksupportcodeapi/"+suppcode,
                success:function(result){
                    if(result.res==0){
                        $('#remarque').addClass('alert alert-danger');
                        $('#remarque').html("Invalidate Support Code !");
                    }
                    else {
                       // $('#firstform').attr('hidden','hidden');
                       // $('#secondform').removeAttr('hidden');
                        $.ajax({
                            url:"{{url('/')}}"+"/form2ofdisc",
                            success:function(res){
                                console.log(res);
                                $('#content').html(res);

                            },
                            error:function(er){
                                console.log(er);
                            }
                        });

                    }

                },
                error:function(er){
                    console.log(er);
                }
            });
        }
    })



</script>
