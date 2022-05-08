<aside class="main-sidebar">
    <section class="sidebar">
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{url('dashboard_admin_panel/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{Auth::guard('admin')->user()->name}}</p>            
                <i class="fa fa-circle text-success"></i> @lang('trans.online')
            </div>
        </div>
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">
                @if(App::getLocale() == "ar")
                    <a href="{{url('admin/lang/en')}}" style="color: #f0f0f0;">English</a>
                @else
                    <a href="{{url('admin/lang/ar')}}" style="color: #f0f0f0">عربي</a>
                @endif
            </li>
            <li class="active treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i>
                    <span>@lang('trans.controlPanel')</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    
                    <li>
                        <a href="{{url('admin/adminInfo')}}">
                            <i class="fa fa-circle-o"></i>@lang('trans.admins')
                        </a>
                    </li>

                    <li>
                        <a href="{{url('admin/categoriesInfo')}}">
                            <i class="fa fa-circle-o"></i>@lang('trans.category')
                        </a>
                    </li>

                    <li>
                        <a href="{{url('admin/itemsInfo')}}">
                            <i class="fa fa-circle-o"></i>@lang('trans.items')
                        </a>
                    </li>
                    <li>
                        <a href="{{url('admin/PropertyInfo')}}">
                            <i class="fa fa-circle-o"></i>@lang('trans.properties')
                        </a>
                    </li>

                    <li>
                        <a href="{{url('admin/countryInfo')}}">
                            <i class="fa fa-circle-o"></i>@lang('trans.country')
                        </a>
                    </li>

                    <li>
                        <a href="{{url('admin/ordersInfo')}}">
                            <i class="fa fa-circle-o"></i>@lang('trans.orders')
                        </a>
                    </li>

                </ul>
            </li> 
        </ul>
    </section>
</aside>