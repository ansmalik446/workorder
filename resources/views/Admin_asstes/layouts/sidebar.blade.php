<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto"><a class="navbar-brand" href="{{url('/superadmin/index')}}">
                    <div class="" ></div>
                    <h2 class="brand-text mb-0">@if (isset(Auth::user()->name)) {{Auth::user()->name}}  @else WorkOrder @endif</h2>

                </a></li>
            <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></i><i class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block collapse-toggle-icon primary" data-ticon="icon-disc"></i></a></li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

              <li class=" navigation-header">.
            </li>
            <li class="{{ Request::is('adminn')? 'active' : '' }}"><a href="{{url('superadmin/index')}}"><i class="feather icon-home"></i><span class="menu-title" data-i18n="Dashboard">Dashboard</span></a>
            </li>
            
            <li class="nav-item"><a href="{{url('/superadmin/users')}}"><i class="fa fa-user"></i><span class="menu-title" data-i18n="Details">User</span></a></li>
            <li class="nav-item"><a href="{{url('/superadmin/sports')}}"><i class="feather icon-circle"></i><span class="menu-title" data-i18n="Ecommerce">Sports</span></a></li>
            <li class="nav-item"><a href="{{url('/superadmin/products')}}"><i class="fa fa-shopping-basket"></i><span class="menu-title" data-i18n="Ecommerce">Products</span></a>
                
            </li>
            <li class="nav-item"><a href="{{url('/superadmin/options')}}"><i class="feather icon-airplay"></i><span class="menu-title" data-i18n="Ecommerce">Options</span></a>
                
            </li>
            <li class="nav-item"><a href="{{url('/superadmin/orders')}}"><i class="fa fa-cart-plus"></i><span class="menu-title" data-i18n="Ecommerce">Orders</span></a>
                
            </li>






























        </ul>
    </div>
</div>
