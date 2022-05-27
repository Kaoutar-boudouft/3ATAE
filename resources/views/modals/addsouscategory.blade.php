<style>

    @media(width:1024px){
        .modal-dialog{
            max-width: 70%;
        }
    }
    .modal-content{
        border-radius: 0.7rem;
    }
    .modal-header img{
        width: 100px;
    }
    .modal-title{
        margin-left:auto;
        margin-right: auto;
    }
    .modal-header{
        border-bottom: none;
        padding-bottom: 0;
        padding-top: 4vh;
    }
    .modal-footer{
        border-top: none;
    }
    button:active{
        outline: none;
    }
    button:focus{
       outline: none;
    }
    .modal-body{
        text-align: center;
    }
    .title{
        font-size: 17px;
        color: grey;
    }
    @media(min-height:768px)and(min-width:411px){
        .title{
            font-size: 20px;
            color: grey;
        }
    }

    form{
        padding: 3vh;
    }
    input {
        outline: none;
        margin: 0;
        border: none;
        -webkit-box-shadow: none;
        -moz-box-shadow: none;
        box-shadow: none;
        width: 100%;
        font-size: 14px;
        font-family: inherit;
      }

      .input-group {
        position: relative;
        margin-bottom: 6vh;
        border-bottom: 1px solid rgba(204, 204, 204, 0.459);
      }

      .input--style-3 {
        font-size: 14px;
        color: rgb(143, 141, 141);
        background: transparent;
      }

      .input--style-3::-webkit-input-placeholder {
        color: rgb(143, 141, 141);
      }

      .input--style-3:-moz-placeholder {
        color: #ccc;
        opacity: 1;
      }

      .input--style-3::-moz-placeholder {
        color: #ccc;
        opacity: 1;
      }

      .input--style-3:-ms-input-placeholder {
        color: #ccc;
      }

      .btn {
        display: inline-block;
        line-height: 42px;
        padding: 0 33px;
        font-family: Poppins;
        cursor: pointer;
        color: #fff;
        -webkit-transition: all 0.4s ease;
        -o-transition: all 0.4s ease;
        -moz-transition: all 0.4s ease;
        transition: all 0.4s ease;
        font-size: 18px;
        width: 100%
      }
      .btn--pill {
        -webkit-border-radius: 20px;
        -moz-border-radius: 20px;
        border-radius: 30px;
        border: 2px solid;
      }

      .btn--green {
        background: transparent;
        border-color: #65d849 ;
        color: #65d849;
        font-size: 12px;
        padding: 0;
      }

      @media(max-width:768px){
        .btn--green {
            font-size: 8px;
          }
      }
      .btn--green img{
        height: 15px;
        width: 15px;
      }

      .btn--signin {
        background: #ccc;
        color: rgb(109, 107, 107);
        font-size: 13px;
        border-color: #ccc;
        margin-bottom: 3vh;
      }

      .extra{
          padding-bottom: 4vh;
          color: rgb(143, 141, 141);
         font-size:13px;
      }
      .extra a{
        color: rgb(143, 141, 141);
        font-size:13px;
      }
      .col{
          padding: 2vh 10px 4vh;
      }
      .new{
          padding-bottom: 0;
      }
      .btn-primary{
          width:40%;
          margin:30%
      }

      .btn:focus{
        box-shadow: none;
        outline: none;
    }
      </style>
<div class="container">

    <!-- The Modal -->
    <div class="modal fade" id="addsouscategrymodal">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form method="POST" action="{{url('api/addsoucategoryapi')}}" id="addscat" >

          <!-- Modal Header -->
          <div class="w-100 res" ></div>

          <div class="modal-header">
        </div>
          <!-- Modal body -->
          <div class="modal-body">
              <div class="input-group">
                <select name="Categoryid"  style="padding: 8px;text-align:center;width:100%" >
                    @foreach ($categories as $category)
                        <option value="{{$category->id}}">{{$category->NomCategory}}</option>
                    @endforeach
                </select>
                                  <span style="width:100%;text-align:center" class="Categoryid_error"></span>
                </div>
                <div class="input-group">
                    <input class="input--style-3" name="NomSousCategory" style="text-align: center" type="text" placeholder="{{__('traduction.CN')}}" name="email">
                    <span style="width:100%;text-align:center" class="NomSousCategory_error"></span>
                  </div>
              <div class="row">
              <div class="col">
                <div class="p-t-10">
                  <input class="btn btn-warnning btn--pill btn--green"  type="submit" value="{{__('traduction.A')}}">

              </div>
              </div>

          </form>
          </div>
        </div>
      </div>
    </div>

  </div>
  <script>

  </script>

