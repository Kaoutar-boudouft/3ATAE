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

            /* Absolute Center Spinner */
.loading {
  position: fixed;
  z-index: 999;
  height: 2em;
  width: 2em;
  overflow: visible;
  margin: auto;
  top: 0;
  left: 0;
  bottom: 0;
  right: 0;
}

/* Transparent Overlay */
.loading:before {
  content: '';
  display: block;
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0,0,0,0.3);
}

/* :not(:required) hides these rules from IE9 and below */
.loading:not(:required) {
  /* hide "loading..." text */
  font: 0/0 a;
  color: transparent;
  text-shadow: none;
  background-color: transparent;
  border: 0;
}

.loading:not(:required):after {
  content: '';
  display: block;
  font-size: 10px;
  width: 1em;
  height: 1em;
  margin-top: -0.5em;
  -webkit-animation: spinner 1500ms infinite linear;
  -moz-animation: spinner 1500ms infinite linear;
  -ms-animation: spinner 1500ms infinite linear;
  -o-animation: spinner 1500ms infinite linear;
  animation: spinner 1500ms infinite linear;
  border-radius: 0.5em;
  -webkit-box-shadow: rgba(0, 0, 0, 0.75) 1.5em 0 0 0, rgba(0, 0, 0, 0.75) 1.1em 1.1em 0 0, rgba(0, 0, 0, 0.75) 0 1.5em 0 0, rgba(0, 0, 0, 0.75) -1.1em 1.1em 0 0, rgba(0, 0, 0, 0.5) -1.5em 0 0 0, rgba(0, 0, 0, 0.5) -1.1em -1.1em 0 0, rgba(0, 0, 0, 0.75) 0 -1.5em 0 0, rgba(0, 0, 0, 0.75) 1.1em -1.1em 0 0;
  box-shadow: rgba(0, 0, 0, 0.75) 1.5em 0 0 0, rgba(0, 0, 0, 0.75) 1.1em 1.1em 0 0, rgba(0, 0, 0, 0.75) 0 1.5em 0 0, rgba(0, 0, 0, 0.75) -1.1em 1.1em 0 0, rgba(0, 0, 0, 0.75) -1.5em 0 0 0, rgba(0, 0, 0, 0.75) -1.1em -1.1em 0 0, rgba(0, 0, 0, 0.75) 0 -1.5em 0 0, rgba(0, 0, 0, 0.75) 1.1em -1.1em 0 0;
}

/* Animation */

@-webkit-keyframes spinner {
  0% {
    -webkit-transform: rotate(0deg);
    -moz-transform: rotate(0deg);
    -ms-transform: rotate(0deg);
    -o-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(360deg);
    -moz-transform: rotate(360deg);
    -ms-transform: rotate(360deg);
    -o-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}
@-moz-keyframes spinner {
  0% {
    -webkit-transform: rotate(0deg);
    -moz-transform: rotate(0deg);
    -ms-transform: rotate(0deg);
    -o-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(360deg);
    -moz-transform: rotate(360deg);
    -ms-transform: rotate(360deg);
    -o-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}
@-o-keyframes spinner {
  0% {
    -webkit-transform: rotate(0deg);
    -moz-transform: rotate(0deg);
    -ms-transform: rotate(0deg);
    -o-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(360deg);
    -moz-transform: rotate(360deg);
    -ms-transform: rotate(360deg);
    -o-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}
@keyframes spinner {
  0% {
    -webkit-transform: rotate(0deg);
    -moz-transform: rotate(0deg);
    -ms-transform: rotate(0deg);
    -o-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(360deg);
    -moz-transform: rotate(360deg);
    -ms-transform: rotate(360deg);
    -o-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}
</style>
<div class="modal fade" id="chooserandommodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="card text-center">
                    <div id="firstfront" class="div1 py-3 px-3">
                            <img src="{{url('images/Choose-bro.svg')}}" class="mt-4 mb-3" height="300px">
                            <div class="loading" hidden="hidden">{{__('traduction.PW')}}&#8230;</div>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                            <h5 class="text-center font-weight-bold">{{__('traduction.ITTCW')}}</h5>
                    </div>
                    <div id="winnerinfo" class="div1 py-3 px-3" hidden="hidden">
                      <img id="userwhowinnpic" src="{{url('profilepics/utilisateur.png')}}" class="mt-4 mb-3" height="150px">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                      <h5 class="text-center font-weight-bold">{{__('traduction.TWI')}}</h5>
              </div>





                    <div class="div2 py-2">
                            <p class="px-4" id="text"> {{__('traduction.Person')}} {{count($userswhoswant)}} {{__('traduction.CWF')}}</p>

                            <hr class="d-flex my-0 mx-4">



                                <button  class="btn text-white pt-0 pb-1 px-4 my-3 choose" style="background-color: #e29f01;border-radius: 30px;" >{{__('traduction.CRW')}}</button>
                                <a href=""  class="btn text-white pt-0 pb-1 px-4 my-3 chat" style="background-color: #e29f01;border-radius: 30px;" hidden="hidden">{{__('traduction.GTC')}}</a>


                        </div>
            </div>
        </div>
    </div>
</div>

