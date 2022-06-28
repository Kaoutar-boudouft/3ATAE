<link rel="stylesheet" href="{{ url('css/navstyle.css')}}">
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
    <link rel="stylesheet" href="{{ url('css/bootstrap.min.css.map')}}">
    <link rel="stylesheet" href="{{ url('css/glyphicones.css')}}">
    <title>ism de site</title>
    <script>

                 openNav = () => {
      let nav = document.querySelector('.nav-overlay')
      let hamb = document.querySelector('.hamburger')
      nav.classList.toggle('active')
      hamb.classList.toggle('active')
  };
    </script>
      <script>
        $(window).scroll(function() {
           if ($(this).scrollTop()<=10)
{
   $('#aa1').css('background-color','black');
   $('#aa1').css('color','white');
   $('.login').css('color','black');
   $('.login').css('border','0.2rem solid black')

}

           if ($(this).scrollTop()>=100)
               {
               $('#aa1').css('background-color','white');
   $('#aa1').css('color','black');
   $('.login').css('color','white');
   $('.login').css('border','0.2rem solid white')
           }
        });
   </script>
    <div class="contain "  >
        <div class="nav" style="background-color: black;padding-left:10%">
            <div class="menu" onclick="openNav()">
                <div class="hamburger"></div>
            </div>
            <a href="{{url('/')}}" class="logo ml-5" >
                <img src="{{url('images/logo2.png')}}" width="120" height="55">
            </a>
            <div>


            </div>
        </div>
        <div id="myNav" class="nav-overlay bg-dark text-white">
            <div class="nav-overlay-content">
                <a style="text-decoration: none" id="surf" href="/">{{__('traduction.HOME')}}</a>
                <a style="text-decoration: none" id="surf" href="/#book-form">{{__('traduction.na')}}</a>
                <a style="text-decoration: none" id="aa"  href="/AddAnnouncement">{{__('traduction.aa')}}</a>
                <a style="text-decoration: none" id="help" href="#">{{__('traduction.h')}}</a>
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
        <div class="col-12  mx-auto" style="z-index: 97;">
            @yield('content')
        </div>
