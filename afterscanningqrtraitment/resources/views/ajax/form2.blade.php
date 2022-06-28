<div id="content1">
<div class="input-group mb-3" id="secondform" >
    <div class="input-group-prepend">
        <span class="input-group-text">DH</span>
    </div>
    <input id="amounttopay" type="amount" class="form-control" placeholder="Amount to pay">
    <div class="input-group-append">
        <button class="btn btn-outline-secondary" type="button" id="next2">Next</button>
    </div>
</div>
</div>
<script>
    $('#next2').click(function(){
        var amounttopay=$('#amounttopay').val();
        $.ajax({
            url:"{{url('/')}}"+"/api/exchangeapi/"+userid+"/"+amounttopay,
            success:function(result){
                //$('#secondform').attr('hidden','hidden');
                //$('#thirdform').removeAttr('hidden');
                $.ajax({
                    url:"{{url('/')}}"+"/form3ofdisc",
                    success:function(res){
                        $('#content1').html(res);

                    },
                    error:function(er){
                        console.log(er);
                    }
                });
                if(result.code==1){
                    console.log(result);
                    pointtodisc=result.pointtodiscount;
                    alert("We Gonna Discount "+result.pointtodiscount+" Points From Your Record");
                }
                else {
                    console.log(result);
                    pointtodisc="all";
                    amtopay=result.amounttopay
                    //$('#secondform').attr('hidden','hidden');
                    //$('#thirdform').removeAttr('hidden');
                    alert("You Should Pay "+result.amounttopay+"DH in addition of Your Record");
                }



            },
            error:function(er){
                console.log(er);
            }
        });

    })

</script>
