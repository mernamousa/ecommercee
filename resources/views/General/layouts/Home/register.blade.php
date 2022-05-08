<!DOCTYPE html>
<html lang="en">
<head>

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">



    <!-- ***** All CSS Files ***** -->
    <!-- Style css -->
    <link href="{{url('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{url('assets/css/countrySelect.css')}}">
    <link rel="stylesheet" href="{{url('assets/css/intlTelInput.css')}}">
    <link rel="stylesheet" href="{{url('assets/css/style.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker3.min.css">
    @if(session()->get('locale') == 'ar')
        <link rel="stylesheet" href="assets/css/rtl.css">
    @endif

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    <link href='https://fonts.googleapis.com/css?family=Cairo' rel='stylesheet'>
    <link rel="stylesheet" href="{{url('dashboard_admin_panel/myStyle.css')}}">



      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>Eflyer</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" type="text/css" href="{{url('general_design')}}/css/bootstrap.min.css">
      <!-- style css -->
      <link rel="stylesheet" type="text/css" href="{{url('general_design')}}/css/style.css">
      <!-- Responsive-->
      <link rel="stylesheet" href="{{url('general_design')}}/css/responsive.css">
      <!-- fevicon -->
      <link rel="icon" href="{{url('general_design')}}/images/fevicon.png" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="{{url('general_design')}}/css/jquery.mCustomScrollbar.min.css">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <!-- fonts -->
      <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
      <!-- font awesome -->
      <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <!--  -->
      <!-- owl stylesheets -->
      <link href="https://fonts.googleapis.com/css?family=Great+Vibes|Poppins:400,700&display=swap&subset=latin-ext" rel="stylesheet">
      <link rel="stylesheet" href="{{url('general_design')}}/css/owl.carousel.min.css">
      <link rel="stylesoeet" href="{{url('general_design')}}/css/owl.theme.default.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
</head>
   <body>
      <!-- banner bg main start -->
      <div class="banner_bg_main">
         <!-- header top section start -->
         <div class="container">
            <div class="header_section_top">
               <div class="row">
                  <div class="col-sm-12">
                     <div class="custom_menu">
                        <ul>
                           <li><a href="{{url('/')}}">Home</a></li>
                           <li><a href="#">Customer Service</a></li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- header top section start -->
         <!-- logo section start -->
         <div class="logo_section">
            <div class="container">
               <div class="row">
                  <div class="col-sm-12">
                     <div class="logo"><a href="index.html"><img src="{{url('general_design')}}/images/logo.png"></a></div>
                  </div>
               </div>
            </div>
         </div>
         <!-- logo section end -->
         <!-- banner section start -->
        <div class="banner_section">
            <div class="container">
               <div id="my_slider" class="carousel slide" data-ride="carousel">
                  <div class="carousel-inner">
                     <div class="carousel-item active">
                        <div class="row">
                           <div class="col-sm-12">


    <div class="login-basic">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-5 bg-content-login">
                    <div class="login d-flex">
                        <div class="container p-0">
                            <div class="row">
                                <div class="col-lg-10 col-xl-9 m-l-30">
                                    
                                    <h1 class="login-acc-text" style="color: #fff;"> Create Your Account 🚀 </h1>
                                    <form action="{{url('doRegister')}}" method="post">
                                        @csrf
                                        <div class="form-group mb-30">
                                           
                                            <input id="inputEmail" type="text" name='name' placeholder=" Enter your  Name" required="" class="form-control px-4">
                                        </div>

                                        <div class="form-group mb-30">
                                            
                                            <input id="inputEmail" type="email" name='email' placeholder=" Enter your email address" required="" class="form-control px-4">
                                        </div>
                                        <div class="form-group mb-30">
                                            
                                            <input id="inputPassword" type="password" name='password' placeholder=" Enter your password" required="" class="form-control px-4">
                                        </div>

                                        <div class="form-group mb-30">
                                            
                                            <input id="inputPassword" type="password" name='confirm_password' placeholder=" Confirm your password" required="" class="form-control px-4">
                                        </div>
                                       
                                        <button type="submit" class="btn btn-block mb-2 btn-primary login-button"> Create Account</button>
                                        <div class=" mt-4 register-inlogin">

                                            <span class="acccount-text"> Already Have Account,  </span>
                                            <a href="{{url('login')}}" class="register-company"> Login </a>
                                            <br>
                                            <span class="problem-logging"> Have a problem logging in,</span>
                                            <a href="" class="contact-us">Contact Us</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
        
                    </div>
                </div>

            </div>
        </div>
    </div>
                              
                           </div>
                        </div>
                     </div>
      
                  </div>
                 
               </div>
            </div>
        </div>
        </div>
         <!-- banner section end -->
      <!-- banner bg main end -->
      <!-- fashion section start -->
  
   <!-- ***** All jQuery Plugins ***** -->

    <!-- jQuery(necessary for all JavaScript plugins) -->
    <script src="{{url('assets/js/jquery/jquery.min.js')}}"></script>

    <!-- Bootstrap js -->
    <script src="{{url('assets/js/bootstrap/popper.min.js')}}"></script>
    <script src="{{url('assets/js/bootstrap/bootstrap.min.js')}}"></script>

    <!-- Plugins js -->
    <script src="{{url('assets/js/plugins/plugins.min.js')}}"></script>
    <script src="{{url('assets/js/main.js')}}"></script>
    <script src="{{url('assets/js/plugins/countrySelect.js')}}"></script>
    <script src="{{url('assets/js/plugins/intlTelInput.js')}}"></script>
    <script type='text/javascript' src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.min.js"></script>
      <!-- Active js -->
      <script src="{{url('assets/js/active.js')}}"></script>
      <script type='text/javascript'>
        $(function(){
        $('.input-group.date').datepicker({
            calendarWeeks: true,
            todayHighlight: true,
            autoclose: true,
            orientation: "bottom"            
        });  
        });
        
        </script>

</body>

</html>