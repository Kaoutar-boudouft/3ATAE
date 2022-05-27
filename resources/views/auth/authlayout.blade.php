<!DOCTYPE html>
<html lang="en">

<head>
    <title>Signin</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- <link rel="icon" href="../assets/images/favicon.png" type="image/x-icon"> -->
    <!-- fontawesome icon -->
    <!-- animation css -->
    <link rel="stylesheet" href="{{ url('css/animate.min.css')}}">
    <!-- vendor css -->
    <link rel="stylesheet" href="{{ url('css/authstyle.css')}}">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" type="text/css" href="//use.fontawesome.com/releases/v5.7.2/css/all.css">




</head>

<body>
    <div class="auth-wrapper ">
        <div class="auth-content container " >
            <div class="card p-5" style="height: 100%;background-color:#ffffff;box-shadow:15px 15px 15px">
                <div class="row align-items-center" style="height: 100%">
                    @yield('content')
                </div>
            </div>
            
        </div>
    </div>

    <!-- Required Js -->
    <script src="{{ url('js/jquery-3.3.1.slim.min.js')}}"></script>
    <script src="{{ url('js/jquery-1.11.1.min.js')}}"></script>
    <script src="{{ url('js/jquery.js')}}"></script>
    <script src="{{ url('js/popper.min.js')}}"></script>
    <script src="{{ url('js/bootstrap.min.js')}}"></script>
    <script>
        $.ajax({ 
     type: "GET", 
     url: "{{url('js/moroccocities.json')}}", 
     data: 'ok=ok',
     dataType: 'json'
  }).done(function(data){ 
    for(var i in data){
    $('#depart').append("<option value='"+data[i].city+"'>");
      $('#destination').append("<option value='"+data[i].city+"'>");


                    }
      
  })    
    </script>
</body>
</html>
