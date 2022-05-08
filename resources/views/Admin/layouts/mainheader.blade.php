
  <header class="main-header">
    <!-- Logo -->
    <a href="{{Auth::guard('admin')->check() ? url('/admin') : url('/vendor')}}" class="logo" style="color:#fefefe">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>{{config('app.name')}}</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>{{config('app.name')}}</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          
          
          
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="{{url('dashboard_admin_panel/dist/img/user2-160x160.jpg')}}" class="user-image" alt="User Image">
              <span class="hidden-xs"  style="color: #f0f0f0">{{config('app.name')}} @lang('trans.controlPanel')</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="{{url('dashboard_admin_panel/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">

                <p style="color: #f0f0f0">
                  @lang('trans.controlPanel') 
                  <small>{{config('app.name')}} </small>
                </p>
              </li>
              <!-- Menu Body -->
              
              <!-- Menu Footer-->
              <li class="user-footer">
                 
                <!-- <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div> -->
              
                <div class="pull-right">
                  @if(Auth::guard('admin')->check())
                    <a href="{{url('admin/logOut')}}" class="btn btn-default btn-flat">
                      @lang('trans.logOut')
                    </a>
                  @else
                    <a href="{{url('vendor/logOut')}}" class="btn btn-default btn-flat">
                      @lang('trans.logOut')
                    </a>
                  @endif
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          
        </ul>
      </div>
    </nav>
  </header>
 