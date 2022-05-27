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




      </style>
<div class="container">

    <!-- The Modal -->
    <div class="modal fade" id="addcategrymodal">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form method="POST" action="{{url('api/addcategoryapi')}}" id="addcate" enctype="multipart/form-data">

          <!-- Modal Header -->
          <div class="w-100 res" ></div>

          <div class="modal-header">
            <div class="modal-title w-100 "><img class="img-fluid " id="fakecat"  style="margin-left: 40%"  src="{{url('images/AddImage.png')}}"></div>
        </div>
          <input type="file" id="realcat" name="ImageCategory" hidden="hidden">
                      <span style="width:100%;text-align:center;margin-left:80px" class="ImageCategory_error"></span>

          <!-- Modal body -->
          <div class="modal-body">
              <div class="input-group">
                  <input class="input--style-3" name="NomCategory" style="text-align: center" type="text" placeholder="{{__('traduction.CN')}}" name="email">
                  <span style="width:100%;text-align:center" class="NomCategory_error"></span>
                </div>
              <div class="row">
              <div class="col">
                <div class="p-t-10">
                  <input class="btn btn-warning" style="width: 150px" type="submit" value="{{__('traduction.A')}}">

              </div>
              </div>

          </form>
          </div>
        </div>
      </div>
    </div>

  </div>

