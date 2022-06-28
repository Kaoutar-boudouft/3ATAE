<div id="thirdform" style="width: 100%">
    <p style="text-align: center" id="text"></p>
    <button id="continue" type="button" class="btn btn-primary btn-lg btn-block mx-auto w-100" >Continue</button>
    <br>
    <button style="margin-top: 10px" id="cancel" type="button" class="btn btn-secondary btn-lg btn-block mx-auto w-100" >Cancel</button>
</div>
<script>
    $('#continue').click(function (){
        $.ajax({
            url: '/api/discountpoints',
            type: 'POST',
            data: { _method:'post', userid: userid,pointtodiscount:pointtodisc, _token: '{{csrf_token()}}' },
            dataType: 'json',
            success:function(res){

                window.location="{{url('/')}}/usersrecord/"+userid;

            },
            error:function(er){
                console.log(er);
            }
        });
    })

    $("#cancel").click(function(){
        window.location="{{url('/')}}/usersrecord/"+userid;
    })
</script>
