
  <link rel="stylesheet" href="{{ url('css/style.css')}}">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <script src="{{ url('js/jquery.js')}}"></script>
    <script src="{{ url('js/bootstrap.bundle.js')}}"></script>
    <script src="{{ url('js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ url('js/bootstrap.min.js')}}"></script>
    <script src="{{ url('js/Chart.bundle.min.js')}}"></script>
    <script src="{{ url('js/popper.min.js')}}"></script>
    <script src="{{ url('js/popper.min.js')}}"></script>

    <link rel="stylesheet" href="{{ url('css/bootstrap-grid.css')}}">
    <link rel="stylesheet" href="{{ url('css/bootstrap-grid.css.map')}}">
    <link rel="stylesheet" href="{{ url('css/bootstrap-grid.min.css')}}">
    <link rel="stylesheet" href="{{ url('css/bootstrap-grid.min.css.map')}}">
    <link rel="stylesheet" href="{{ url('css/bootstrap-reboot.css')}}">
    <link rel="stylesheet" href="{{ url('css/bootstrap-reboot.min.css')}}">
    <link rel="stylesheet" href="{{ url('css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{ url('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ url('css/bootstrap.min.css.map')}}">
    <link rel="stylesheet" href="{{ url('css/glyphicones.css')}}">
    <link rel="stylesheet" href="{{ url('css/style.css')}}">
    <title>ism de site</title>
    <style>
        .login{
    background-color: #e29f01;
    border: 0;
    font-size: large;

  }
  .login:hover{
    background-color: white;
    border: 1px solid #e29f01;
    color: #e29f01;
  }
    </style>
    <script>
         $(window).scroll(function() {
            if ($(this).scrollTop()<=10)
{
    $('.nav').css('background-color','transparent');
    $('#aa1').css('background-color','black');
    $('#aa1').css('color','white');
    $('.login').css('color','black');
    $('.login').css('border','0.2rem solid #e29f01')

}

            if ($(this).scrollTop()>=100)
                { $('.nav').css('background-color','black');
                $('#aa1').css('background-color','white');
    $('#aa1').css('color','black');
    $('.login').css('color','white');
    $('.login').css('border','0.2rem solid white')
            }
         });
    </script>

    <div class="contain "  >
        <div class="nav" style="padding-left:50px">
            <div class="menu ml-5"  onclick="openNav()">
                <div class="hamburger"></div>
            </div>
            <div class="logo">
                ism d site
            </div>

            <div>
               @if (session()->has('UserName'))
            <div class="notifications" id="box">

            </div>
               <div class="btn-group dropleft">
                   <span class="icon" id="bell" style="margin-top: 22px;margin-right:15px;position: relative;"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-bell" viewBox="0 0 16 16">
                    <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zM8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z"/>
                  </svg><div id="notifalert" style="position: absolute;top:0;left:15px;border-radius: 50%;background-color:red;width:10px;height:10px" hidden="hidden"></div></span>
                <button type="button" style="height:45px;margin-top:11px" class="dropdown-toggle login" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{session('UserName')}}
                </button>
                <div class="dropdown-menu">
                  <!-- Dropdown menu links -->
                 <a href="/chat" class="dropdown-item" style="text-align: right;font-size:12pt;" type="button">{{__('traduction.MSG')}}</a>
                 <a href="{{url('profile')}}" style="text-align:right ;font-size:12pt;" class="dropdown-item" type="button">{{__('traduction.MP')}}</a>
                 <a style="text-align:right ;font-size:12pt;cursor: pointer;" class="dropdown-item" id="showitemsiwant" data-toggle="modal" data-target="#itemsiwant">{{__('traduction.OIW')}}</a>
                 <a href="{{url('Logout')}}" style="text-align: right;font-size:12pt;" type="button"  class="dropdown-item" value="Logout">{{__('traduction.Logout')}}</a>
                </div>
                @if ($type=="home")
                <span><a  href="/AddAnnouncement" class="btn btn-primary" id="aa1">{{__('traduction.AO')}}</a></span>
              @endif
              </div>
               @else
                <div class="logo">
                   <a  class="login" style="height:45px;width:80px;text-decoration:none" href="{{url('signin')}}">{{__('traduction.ENTRER')}}</a>                              <span><a  href="/AddAnnouncement" class="btn btn-primary" style="margin-top: -4px" id="aa1">{{__('traduction.AO')}}</a></span>

            </div>

               @endif

            </div>
        </div>
        <div id="myNav" class="nav-overlay">
            <div class="nav-overlay-content">
                <a id="surf" href="#book-form">{{__('traduction.na')}}</a>
                <a id="aa"  href="/AddAnnouncement">{{__('traduction.AO')}}</a>
                <a id="help" href="#">{{__('traduction.h')}}</a>

                    @if(app()->getLocale()=='ar')
                        <a  href="{{ route('lang.switch', 'en') }}">english</a>
                    @else
                        <a  href="{{ route('lang.switch', 'ar') }}">arabic</a>
                    @endif

            </div>
        </div>
        <div class="sci">
            <i class='bx bxl-facebook-circle'></i>
            <i class='bx bxl-instagram-alt'></i>
            <i class='bx bxl-youtube'></i>
            <i class='bx bxl-twitter'></i>
        </div>
        @if ($type=="home")
        <div class="slide-control">
            <i class='bx bxs-right-arrow'></i>
        </div>
        @endif

        <div class="col-5" style="z-index: 97;">
            <div class="info">
                  <!-- info 3 -->
                  <div class="product-info">
                    <h1 style="text-align:right;color: #e29f01;margin-right:20px;font-size:75pt">
                        {{$t2p1}}
                    </h1>


                    <p style="font-size: 12pt;text-align:right">
                       {{$paragraph3}}
                    </p>
                    <button>
                        {{__('traduction.N')}}

                    </button>


                </div>
                <!-- end info 3 -->
                <!-- info 1 -->
                <div class="product-info">
                    <h1 align="right" style="color: #e29f01;text-align:center;font-size:75pt">
                        {{$t1p1}} <br><span style="color: white;font-size:75pt" >{{$t1p2}} </br></span>
                    </h1>
                    <h1 align="right">
                        <span style="color: #e29f01;;font-size:75pt">{{$t1p3}}</span>
                    </h1>

                    <p style="font-size: 12pt;text-align:right">
                       {{$paragraph1}}
                    </p>

                    <button>
                        {{__('traduction.N')}}
                    </button>


                </div>

                <!-- end info 1 -->
                <!-- info 2 -->
                <div class="product-info">
                    <h1 style="text-align: right">
                        <span style="color: #e29f01;font-size:75pt">{{$t3p1}}
                    </h1>

                    <p style="font-size: 12pt;text-align:right">
                        {{$paragraph2}}
                    </p>
                    <button>
                        {{__('traduction.N')}}

                    </button>


                </div>
                <!-- end info 2 -->

                <!-- info 4 -->
                <div class="product-info">
                    <h1 style="text-align: right">
                        <span style="color: #e29f01;font-size:75pt">{{$t4p1}}</span>{{$t4p2}}
                    </h1>
                    <h1 style="text-align: right;color: #e29f01;font-size:75pt">
                        {{$t4p3}}<span style="">
                    </h1>

                    <p style="font-size: 12pt;text-align:right">
                        {{$paragraph4}}
                    </p>
                    <button>
                        {{__('traduction.N')}}

                    </button>


                </div>
                <!-- end info 4 -->
            </div>
        </div>
        <div class="col-7">
            <div class="slider">
                <div class="sliderx">
                    <div class="img-holder"
                        style="background-image: url({{url('images/'.$image1)}});"></div>
                </div>
                <div class="sliderx">
                    <div class="img-holder"
                        style="background-image: url({{url('images/'.$image2)}})">
                    </div>
                </div>
                <div class="sliderx">
                    <div class="img-holder"
                        style="background-image: url({{url('images/'.$image3)}})"></div>
                </div>
                <div class="sliderx">
                    <div class="img-holder"
                        style="background-image: url({{url('images/'.$image4)}})"></div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ url('js/script.js')}}"></script>

<script>
    $(document).ready(function(){




            var down = false;

            $('#bell').click(function(e){

                var color = $(this).text();
                if(down){

                    $('#box').css('height','0px');
                    $('#box').css('opacity','0');
                    $('#box').css('z-index','0');

                    down = false;
                }else{

                    $('#box').css('height','auto');
                    $('#box').css('opacity','1');
                    $('#box').css('z-index','1000');

                    down = true;

                }

            });

                });
</script>
