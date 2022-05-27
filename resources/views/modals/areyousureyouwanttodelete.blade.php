<style>
    @import url('https://fonts.googleapis.com/css2?family=Marcellus&display=swap');



        .card {
            border-radius: 10px;
            color: #5c647c;
            font-weight: 500;
        }
        .div1{
            background-color: #f7f6fb;
            border-radius: 10px 10px 0 0;
        }

        .div2{
            background-color: #ffffff
            border-radius: 0 0 10px 10px;
        }

        .form-check-input{
            position: absolute;
            left: 55px;
            border-radius: 3px;
        }


        .form-check-label, p{
            font-size: 13px;
        }

        .btn-save{
            background-color: #e29f01;
            border-radius: 30px;
        }

        .modal-content{
            border-radius: 1rem;
        }


        .modal-content:hover{
            box-shadow: 2px 2px 2px black;
        }

        *:focus{
            outline: none;
        }







        label{
            font-weight: 400;
            font-size: 12px;
            font-family: 'Manrope', sans-serif;
            margin-top: 7px;
            }
</style>
<div class="modal fade" id="form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="card text-center">

                    <div class="div1 py-3 px-3">
                            <img src="{{url('images/Discarded idea-amico.svg')}}" class="mt-4 mb-3" height="300px">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                            <h5 class="text-center font-weight-bold">{{__('traduction.AYSYWTDO')}}</h5>
                    </div>




                    <div class="div2 py-2">
                            <p class="px-4">{{__('traduction.AWBDI')}}</p>

                            <hr class="d-flex my-0 mx-4">



                                <button class="btn text-white pt-0 pb-1 px-4 my-3 delete" style="background-color: #e29f01;border-radius: 30px;" id="{{$annonce->id}}">{{__('traduction.CD')}}</button>


                        </div>
            </div>
        </div>
    </div>
</div>
