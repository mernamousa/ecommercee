<!DOCTYPE html>
<html lang="en">
   <head>

      
<style type="text/css">
   #cart {
  max-width: 1440px;
  padding-top: 60px;
  margin: auto;
   }
   .form div {
     margin-bottom: 0.4em;
   }
   .cartItem {
     --bs-gutter-x: 1.5rem;
   }
   .cartItemQuantity,
   .proceed {
     background: #f4f4f4;
   }
   .items {
     padding-right: 30px;
   }
   #btn-checkout {
     min-width: 100%;
   }

   /* stasysiia.com */
   @import url("https://fonts.googleapis.com/css2?family=Exo&display=swap");

   a {
     color: #0e1111;
     text-decoration: none;
   }
   .btn-check:focus + .btn-primary,
   .btn-primary:focus {
     color: #fff;
     background-color: #111;
     border-color: transparent;
     box-shadow: 0 0 0 0.25rem rgb(49 132 253 / 50%);
   }
   button:hover,
   .btn:hover {
     box-shadow: 5px 5px 7px #c8c8c8, -5px -5px 7px white;
   }
   button:active {
     box-shadow: 2px 2px 2px #c8c8c8, -2px -2px 2px white;
   }

   /*PREVENT BROWSER SELECTION*/
   a:focus,
   button:focus,
   input:focus,
   textarea:focus {
     outline: none;
   }
   /*main*/
   main:before {
     content: "";
     display: block;
     height: 88px;
   }
   h1 {
     font-size: 2.4em;
     font-weight: 600;
     letter-spacing: 0.15rem;
     text-align: center;
     margin: 30px 6px;
   }
   h2 {
     color: rgb(37, 44, 54);
     font-weight: 700;
     font-size: 2.5em;
   }
   h3 {
     border-bottom: solid 2px #000;
   }
   h5 {
     padding: 0;
     font-weight: bold;
     color: #92afcc;
   }
   p {
     color: #333;
     font-family: "Roboto", sans-serif;
     margin: 0.6em 0;
   }
   h1,
   h2,
   h4 {
     text-align: center;
     padding-top: 16px;
   }
   /* yukito bloody */
   .back {
     /*position: relative;*/
     top: -30px;
     font-size: 16px;
     margin: 10px 10px 3px 15px;
   }
   .inline {
     display: inline-block;
   }

   .shopnow,
   .contact {
     background-color: #000;
     padding: 10px 20px;
     font-size: 30px;
     color: white;
     text-transform: uppercase;
     letter-spacing: 1px;
     transition: all 0.5s;
     cursor: pointer;
   }
   .shopnow:hover {
     text-decoration: none;
     color: white;
     background-color: #c41505;
   }
   /* for button animation*/
   .shopnow span {
     cursor: pointer;
     display: inline-block;
     position: relative;
     transition: all 0.5s;
   }
   .shopnow span:after {
     content: url("https://badux.co/smc/codepen/caticon.png");
     position: absolute;
     font-size: 30px;
     opacity: 0;
     top: 2px;
     right: -6px;
     transition: all 0.5s;
   }
   .shopnow:hover span {
     padding-right: 25px;
   }
   .shopnow:hover span:after {
     opacity: 1;
     top: 2px;
     right: -6px;
   }
   .ma {
     margin: auto;
   }
   .price {
     color: slategrey;
     font-size: 2em;
   }
   #mycart {
     min-width: 90px;
   }
   #cartItems {
     font-size: 17px;
   }
   #product .container .row .pr4 {
     padding-right: 15px;
   }
   #product .container .row .pl4 {
     padding-left: 15px;
   }



</style>
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
                           <li><a href="{{url('bestSeller')}}">@lang('trans.Best Selles')</a></li>
                           <li><a href="{{url('offers')}}">@lang('trans.Offers')</a></li>
                           <li><a href="{{url('/')}}">@lang('trans.Home')</a></li>
                           <li><a href="{{url('recently')}}">@lang('trans.Recently Items')</a></li>
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
                     <div class="logo"><a href="index.html">
                        <img src="{{url('general_design')}}/images/logo.png"></a></div>
                  </div>
               </div>
            </div>
         </div>
         <!-- logo section end -->
         <!-- header section start -->
         <div class="header_section">
            <div class="container">
               <div class="containt_main">

                  <!-- with login show this -->
                  @if(Auth::check())

                  <div id="mySidenav" class="sidenav">
                     <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                     <a href="{{url('profile')}}">@lang('trans.Profile')</a>
                     <a href="{{url('logout')}}">@lang('trans.Logout')</a>
                  </div>

                  <span class="toggle_icon" onclick="openNav()"><img src="{{url('general_design')}}/images/toggle-icon.png"></span>
                  @endif
                  <!-- end -->

                  <div class="dropdown">
                     <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">@lang('trans.All Category')
                     </button>
                     @if(!empty($sub_categories))
                     <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        @foreach($sub_categories as $sub_category)
                        <a class="dropdown-item" href="{{url('categoryItems/'.$sub_category->id)}}">{{$sub_category->s_categoryName}}</a>
                        @endforeach
                     </div>
                     @endif

                  </div>
                  <div class="main">
                     <!-- Another variation with a button -->
                     <form action="{{url('search')}}" method="get">
                        @csrf
                     <div class="input-group">
                        <input type="text" name="searchKey" class="form-control" placeholder="@lang('trans.Search this blog')" required>
                        <div class="input-group-append">
                           <button class="btn btn-secondary" type="submit" style="background-color: #f26522; border-color:#f26522 ">
                           <i class="fa fa-search"></i>
                           </button>

                        </div>
                     </div>
                     </form>
                  </div>
                  <div class="header_box">
                     <div class="login_menu">
                        <ul>
                           <li><a href="{{url('user_cart')}}">
                              <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                              <span class="padding_10">@lang('trans.Cart')</span></a>
                           </li>
                           @if(Auth::check())
                           <li><a href="{{url('favItems')}}">
                              <i class="fa fa-heart" style="color:red" aria-hidden="true"></i>
                              <span class="padding_10">@lang('trans.Favorite')</span></a>
                           </li>
                           @else
                              <li><a href="{{url('login')}}">
                                 <i class="fa fa-user" aria-hidden="true"></i>
                                 <span class="padding_10">@lang('trans.Login')</span></a>
                              </li>
                           @endif
                        </ul>
                     </div>
                  </div>
                  <div class="main">
                        <!-- Another variation with a button -->
                        <form action="{{url('searchByPrice')}}" method="get">
                           @csrf
                        <div class="input-group">
                           <input type="text" name="priceFrom" class="form-control" placeholder="@lang('trans.from')"required>
                           <input type="text" name="priceTo" class="form-control" placeholder="@lang('trans.to')"required>
                           <div class="input-group-append">
                              <button class="btn btn-secondary" type="submit" style="background-color: #f26522; border-color:#f26522 ">
                              <i class="fa fa-search"></i>
                              </button>
                              
                           </div>
                        </div>
                        </form>
                     </div>
               </div>
            </div>
         </div>
         <!-- header section end -->
         <!-- banner section start -->
         <div class="banner_section layout_padding">
            <div class="container">
               <div id="my_slider" class="carousel slide" data-ride="carousel">
                  <div class="carousel-inner">
                     <div class="carousel-item active">
                        <div class="row">
                           <div class="col-sm-12">
                              <h1 class="banner_taital">@lang('trans.Get Start') <br>@lang('trans.Your favriot shoping')</h1>
                              <div class="buynow_bt"><a href="#">@lang('trans.Buy Now')</a></div>
                           </div>
                        </div>
                     </div>
                     <div class="carousel-item">
                        <div class="row">
                           <div class="col-sm-12">
                              <h1 class="banner_taital">@lang('trans.Get Start') <br>@lang('trans.Your favriot shoping')</h1>
                              <div class="buynow_bt"><a href="#">@lang('trans.Buy Now')</a></div>
                           </div>
                        </div>
                     </div>
                     <div class="carousel-item">
                        <div class="row">
                           <div class="col-sm-12">
                              <h1 class="banner_taital">@lang('trans.Get Start') <br>@lang('trans.Your favriot shoping')</h1>
                              <div class="buynow_bt"><a href="#">@lang('trans.Buy Now')</a></div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <a class="carousel-control-prev" href="#my_slider" role="button" data-slide="prev">
                  <i class="fa fa-angle-left"></i>
                  </a>
                  <a class="carousel-control-next" href="#my_slider" role="button" data-slide="next">
                  <i class="fa fa-angle-right"></i>
                  </a>
               </div>
            </div>
         </div>
         <!-- banner section end -->
      </div>
      <!-- banner bg main end -->
      <!-- fashion section start -->
  