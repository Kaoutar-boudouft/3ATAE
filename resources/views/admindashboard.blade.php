

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{url('css/dashboard.css')}}">
    <script src="{{ url('js/jquery.js')}}"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <title>Document</title>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light container-fluid w-100">
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynav"
                aria-controls="mynav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="#">
                <div class="d-flex">

                    <div class="ms-3 d-flex flex-column">
                        <a href="{{url('/')}}" class="logo ml-5" >
                            <img src="{{url('images/logo1.png')}}" width="100" height="50">
                        </a>                    </div>
                </div>
            </a>
            <div class="collapse navbar-collapse" id="mynav">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">


                    <div class="btn-group dropleft">
                        <li  class="nav-item" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <a class="nav-link  dropdown-toggle" href="#"> <span class="fas fa-user pe-2"></span> {{session('UserName')}}
                                {{__('traduction.H')}}</a>
                        </li>

                        <div class="dropdown-menu">
                          <!-- Dropdown menu links -->
                       <a href="{{url('Logout')}}" style="text-align: right;font-size:12pt;" type="button"  class="dropdown-item" value="Logout">{{__('traduction.Logout')}}</a>
                        </div>
                      </div>

                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <div class="row">
            <div class="col-lg-3 my-lg-0 my-md-1">
                <div id="sidebar" class="bg-purple">
                    <div class="h4 text-white" style="text-align: center">{{__('traduction.CP')}}</div>
                    <ul class="list">
                        <li id="account" class="active" style="cursor: pointer" >
                            <a  class="text-decoration-none d-flex align-items-start" style="margin-left: 30%">
                                <div class="fa fa-user pt-2 me-3 color-white" style="color: white"></div>
                                <div class="d-flex flex-column">
                                    <div class="link" style="text-align: center">{{__('traduction.MA')}}</div>
                                </div>
                            </a>
                        </li>

                        <li id="allproducts">
                            <a href="#" class="text-decoration-none d-flex align-items-start" style="margin-left: 30%">
                                <div class="far fa-address-book pt-2 me-3"></div>
                                <div class="d-flex flex-column">
                                    <div class="link" style="text-align: center">{{__('traduction.O')}}</div>
                                </div>
                            </a>
                        </li>

                        <li id="allusers">
                            <a href="#" class="text-decoration-none d-flex align-items-start" style="margin-left: 30%">
                                <div class="fas fa-headset pt-2 me-3"></div>
                                <div class="d-flex flex-column">
                                    <div class="link" style="text-align: center">{{__('traduction.U')}}</div>
                                </div>
                            </a>
                        </li>
                        <li id="allcategories">
                            <a href="#" class="text-decoration-none d-flex align-items-start" style="margin-left: 30%">
                                <div class="far fa-address-book pt-2 me-3" style="text-align: center"></div>
                                <div class="d-flex flex-column" style="align-content: center">
                                    <div class="link" style="text-align: center">{{__('traduction.allcat')}}</div>
                                </div>
                            </a>
                        </li>
                        <li id="allsouscategory">
                            <a href="#" class="text-decoration-none d-flex align-items-start" style="margin-left: 30%">
                                <div class="far fa-address-book pt-2 me-3" style="text-align: center"></div>
                                <div class="d-flex flex-column" style="text-align: center">
                                    <div class="link" style="text-align: center">{{__('traduction.SC')}}</div>
                                    <div class="link-desc" style="text-align: center"></div>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-9 my-lg-0 my-1">
                <div id="main-content" class="bg-white border content">

                   @include('ajax.admindata')
                   <script>
                       function changepic(params) {
                        const real=document.getElementById("real");
                              const fake=document.getElementById("im");
                              const pic=document.getElementById("im");


                              fake.addEventListener("click",function(){
                                real.click();
                              });
                              real.addEventListener("change",function(){
                                if(real.value){
                                  const im=this.files[0];
                                  if(im){
                                    const reader=new FileReader();
                                    reader.addEventListener("load",function(){

                                     var form=$('#ppcf');
                                     $.ajax({
                                 url:form.attr('action'),
                                 type:form.attr('method'),
                                 data:new FormData(form[0]),
                                 processData:false,
                                 contentType:false,

                                 success:function(result){
                                   alert(result);
                                 },
                                 error:function(er){
                                   console.log(er);
                                 }
                                });


                                     pic.setAttribute('src',"");
                                     pic.setAttribute('src',reader.result);


                                    });
                                    reader.readAsDataURL(im);
                                  }
                                }
                              });
                       }
                       changepic();


              </script>

                </div>
            </div>
        </div>

    </div>
    @include('modals.addcategory')
@include('modals.update&deletecategory')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="{{ url('js/jquery.js')}}"></script>
    <script src="{{ url('js/bootstrap.bundle.js')}}"></script>
    <script src="{{ url('js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ url('js/bootstrap.min.js')}}"></script>
    <script src="{{ url('js/Chart.bundle.min.js')}}"></script>
    <script src="{{ url('js/popper.min.js')}}"></script>
    <script src="{{ url('js/popper.min.js')}}"></script>

    <script>

$('.list').on('click', 'li', function() {
    $('.list li.active').removeClass('active');
    $(this).addClass('active');
});

        $('#account').click(function(){
            $.ajax({
                url:"{{url('/admindata')}}",
                success:function(data){
                    $(".content").html("");
                    $(".content").html(data);
                    changepic();

                },
            error:function(er){
              console.log(er);
            }
            })
        })

      /*  $('#productstovalidate').click(function(){
            $.ajax({
                url:"{{url('/productstovalidate')}}",
                success:function(data){
                    $(".content").html("");
                    $(".content").html(data);

                },
            error:function(er){
              console.log(er);
            }
            })
        })*/

        $('#allproducts').click(function(){
            $.ajax({
                url:"{{url('/allproductsblade')}}",
                success:function(data){
                    $(".content").html("");
                    $(".content").html(data);

                },
            error:function(er){
              console.log(er);
            }
            })
        })

        $('#allusers').click(function(){
            $.ajax({
                url:"{{url('/getallusersblade')}}",
                success:function(data){
                    $(".content").html("");
                    $(".content").html(data);

                },
            error:function(er){
              console.log(er);
            }
            })
        })

        $('#allcategories').click(function(){
            $.ajax({
                url:"{{url('/getallcategoriesblade')}}",
                success:function(data){
                    $(".content").html("");
                    $(".content").html(data);

                },
            error:function(er){
              console.log(er);
            }
            })
        })

        //////////////////////////////
      $('#addcate').on('submit',function(e){
         e.preventDefault();
         var form=$(this);
         $.ajax({
            url:form.attr('action'),
            type:form.attr('method'),
            data:new FormData(form[0]),
            processData:false,
            contentType:false,

            success:function(result){
              if(result.code==0){
                $.each(result.error,function(prefix,val){
                form.find('span.'+prefix+'_error').text(val[0]);
                });
              }
              else{
                  if(result.code==1){
                    $('.res').addClass('alert alert-success');
                  $('.res').html(result.msg);
                  form[0].reset();
                  document.getElementById("fakecat").setAttribute('src',"");
                  document.getElementById("fakecat").setAttribute('src',"{{url('images/AddImage.png')}}");
                  $('#allcategories').click();
                  }
                  if(result.code==2){
                    $('.res').addClass('alert alert-danger');
                  $('.res').html(result.msg);
                  }


              }

            },
            error:function(er){
              console.log(er);
            }
          });
        })
 /////////////////////////

                   const realcat=document.getElementById("realcat");
                             const fakecat=document.getElementById("fakecat");


                             fakecat.addEventListener("click",function(){
                                realcat.click();
                             });
                             realcat.addEventListener("change",function(){
                               if(realcat.value){
                                 const im=this.files[0];
                                 if(im){
                                   const reader=new FileReader();
                                   reader.addEventListener("load",function(){
                                    fakecat.setAttribute('src',"");
                                    fakecat.setAttribute('src',reader.result);
                                   });
                                   reader.readAsDataURL(im);
                                 }
                               }
                             });

///////////////////////////////
$('#upcat').on('submit',function(e){
         e.preventDefault();
         var form=$(this);
         $.ajax({
            url:form.attr('action'),
            type:form.attr('method'),
            data:new FormData(form[0]),
            processData:false,
            contentType:false,

            success:function(result){
              if(result.code==0){
                $.each(result.error,function(prefix,val){
                form.find('span.'+prefix+'_error').text(val[0]);
                });
              }
              else{
                  if(result.code==1){
                    $('.resup').addClass('alert alert-success');
                  $('.resup').html(result.msg);
                  $('#allcategories').click();
                  }
                  if(result.code==2){
                    $('.resup').addClass('alert alert-danger');
                  $('.resup').html(result.msg);
                  }


              }

            },
            error:function(er){
              console.log(er);
            }
          });
        })
/////////////////////
const realcatup=document.getElementById("realcatup");
                             const fakecatup=document.getElementById("fakecatup");


                             fakecatup.addEventListener("click",function(){
                                realcatup.click();
                             });
                             realcatup.addEventListener("change",function(){
                               if(realcatup.value){
                                 const im=this.files[0];
                                 if(im){
                                   const reader=new FileReader();
                                   reader.addEventListener("load",function(){
                                    fakecatup.setAttribute('src',"");
                                    fakecatup.setAttribute('src',reader.result);
                                    $("#newimageinput").val("changed");
                                   });
                                   reader.readAsDataURL(im);
                                 }
                               }
                             });

                             ///////////////////////////
                             $('#allsouscategory').click(function(){
            $.ajax({
                url:"{{url('/souscategoriesblade')}}",
                success:function(data){
                    $(".content").html("");
                    $(".content").html(data);

                },
            error:function(er){
              console.log(er);
            }
            })
        })

        /////////////////////////

    </script>
</body>
</html>
