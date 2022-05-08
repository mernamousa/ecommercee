      <!-- footer section start -->
      <div class="footer_section layout_padding">
         <div class="container">
            <div class="footer_logo"><a href="index.html"><img src="{{url('general_design')}}/images/footer-logo.png"></a></div>
            <div class="input_bt">
               <input type="text" class="mail_bt" placeholder="Your Email" name="Your Email">
               <span class="subscribe_bt" id="basic-addon2"><a href="#">Subscribe</a></span>
            </div>
            <div class="footer_menu">
                <ul>
                     <li><a href="{{url('bestSeller')}}">@lang('trans.Best Selles')</a></li>
                     <li><a href="{{url('offers')}}">@lang('trans.Offers')</a></li>
                     <li><a href="{{url('/')}}">@lang('trans.Home')</a></li>
                     <li><a href="{{url('recently')}}">@lang('trans.Recently Items')</a></li>
                  </ul>
            </div>
            <div class="location_main">>@lang('trans.Help Line Number') : <a href="#">+1 1800 1200 1200</a></div>
         </div>
      </div>
      <!-- footer section end -->
      <!-- copyright section start -->
      <div class="copyright_section">
         <div class="container">
            <p class="copyright_text">>@lang('trans.© 2020 All Rights Reserved. Design by') <a href="https://html.design">>@lang('trans.You Deserve The Best')</a></p>
         </div>
      </div>
      <!-- copyright section end -->
      <!-- Javascript files-->
      <script src="{{url('general_design')}}/js/jquery.min.js"></script>
      <script src="{{url('general_design')}}/js/popper.min.js"></script>
      <script src="{{url('general_design')}}/js/bootstrap.bundle.min.js"></script>
      <script src="{{url('general_design')}}/js/jquery-3.0.0.min.js"></script>
      <script src="{{url('general_design')}}/js/plugin.js"></script>
      <!-- sidebar -->
      <script src="{{url('general_design')}}/js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="{{url('general_design')}}/js/custom.js"></script>
      <script>
         function openNav() {
           document.getElementById("mySidenav").style.width = "250px";
         }
         
         function closeNav() {
           document.getElementById("mySidenav").style.width = "0";
         }
      </script>
   </body>
</html>