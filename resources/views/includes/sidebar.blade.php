<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          @if(Auth::user()->image == null)
              <img src="{{asset('public/uploads/user.png')}}" class="img-circle" alt="User Image">
              @else
              <img src="{{asset('public/uploads/user.png')}}" style="width:100px;height:50px;" class="img-circle" alt="User Image">
              @endif
        </div>
        <div class="pull-left info">
          <p>{{strtoupper(Auth::user()->name)}}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        @if(Auth::user()->type == "Admin")
        @if($bar == "dashboard")
        <li class="active">
          <a href="{{URL::to('/')}}">
            <i class="fa fa-home"></i> <span>Dashboard</span>
            
          </a>
          
        </li>
        @else
        <li>
          <a href="{{URL::to('/')}}">
            <i class="fa fa-home"></i> <span>Dashboard</span>
            
          </a>
          
        </li>
        @endif

        @if($bar == "suppliers")
        <li class="active">
          <a href="{{URL::to('/suppliers')}}">
            <i class="fa fa-user"></i> <span>Suppliers</span>
            
          </a>
          
        </li>
        @else
        <li>
          <a href="{{URL::to('/suppliers')}}">
            <i class="fa fa-user"></i> <span>Suppliers</span>
            
          </a>
          
        </li>
        @endif

       @if($bar == "items" || $bar == "categories")
        <li class="active treeview">
        @else
        <li class="treeview">
        @endif
          <a href="#">
            <i class="fa fa-barcode"></i>
            <span>Products</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            @if($bar == "categories")
            <li class="active"><a href="{{URL::to('/categories')}}"><i class="fa fa-circle-o"></i> Manage Categories</a></li>
            @else
            <li><a href="{{URL::to('/categories')}}"><i class="fa fa-circle-o"></i> Manage Categories</a></li>
            @endif

            @if($bar == "items")
            <li class="active"><a href="{{URL::to('/products')}}"><i class="fa fa-circle-o"></i> Manage Products</a></li>
            @else
            <li><a href="{{URL::to('/products')}}"><i class="fa fa-circle-o"></i> Manage Products</a></li>
            @endif
          </ul>
        </li>
          
        @if($bar == "sales")
        <li class="active">
          <a href="{{URL::to('/sales')}}">
            <i class="fa fa-shopping-cart"></i> <span>Sales</span>
            
          </a>
          
        </li>
        @else
        <li>
          <a href="{{URL::to('/sales')}}">
            <i class="fa fa-shopping-cart"></i> <span>Sales</span>
            
          </a>
          
        </li>
        @endif

        @if($bar == "view sales")
        <li class="active">
          <a href="{{URL::to('/view/sales')}}">
            <i class="fa fa-list"></i> <span>View Sales</span>
            
          </a>
          
        </li>
        @else
        <li>
          <a href="{{URL::to('/view/sales')}}">
            <i class="fa fa-list"></i> <span>View Sales</span>
            
          </a>
          
        </li>
        @endif

        @if($bar == "stocks")
        <li class="active">
          <a href="{{URL::to('/stocks')}}">
            <i class="fa fa-tags"></i> <span>Stocks</span>
            
          </a>
          
        </li>
        @else
        <li>
          <a href="{{URL::to('/stocks')}}">
            <i class="fa fa-tags"></i> <span>Stocks</span>
            
          </a>
          
        </li>
        @endif

        @if($bar == "sales report" || $bar == "stocks report")
        <li class="active treeview">
       @else
        <li class="treeview">
       @endif
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Reports</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a target="_blank" href="{{URL::to('/reports/items')}}"><i class="fa fa-circle-o"></i> Items </a></li>
            <li><a target="_blank" href="{{URL::to('/reports/categories')}}"><i class="fa fa-circle-o"></i> Item Categories</a></li>
            <li><a target="_blank" href="{{URL::to('/reports/suppliers')}}"><i class="fa fa-circle-o"></i> Suppliers</a></li>
            @if($bar == "sales report")
            <li class="active"><a href="{{URL::to('/reports/stocks')}}"><i class="fa fa-circle-o"></i> Stocks</a></li>
            @else
            <li><a href="{{URL::to('/reports/stocks')}}"><i class="fa fa-circle-o"></i> Stocks</a></li>
            @endif
            @if($bar == "sales report")
            <li class="active"><a rel="facebox" href="{{URL::to('/reports/sales')}}"><i class="fa fa-circle-o"></i> Sales</a></li>
            @else
            <li><a href="{{URL::to('/reports/sales')}}"><i class="fa fa-circle-o"></i> Sales</a></li>
            @endif
            <li><a target="_blank" href="{{URL::to('/reports/users')}}"><i class="fa fa-circle-o"></i> Users</a></li>
          </ul>
        </li>
       
       @if($bar == "settings" || $bar == "organizations")
        <li class="active treeview">
       @else
        <li class="treeview">
       @endif
          <a href="#">
            <i class="fa fa-cogs"></i> <span>Settings</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            @if($bar == "organizations")
            <li class="active"><a href="{{URL::to('/organizations')}}"><i class="fa fa-circle-o"></i> Organization Settings</a></li>
            @else
            <li><a href="{{URL::to('/organizations')}}"><i class="fa fa-circle-o"></i> Organization Settings</a></li>
            @endif
            @if($bar == "settings")
            <li class="active"><a href="{{URL::to('/settings')}}"><i class="fa fa-circle-o"></i> General Settings</a></li>
            @else
            <li><a href="{{URL::to('/settings')}}"><i class="fa fa-circle-o"></i>General Settings</a></li>
            @endif
            <!-- <li><a href="#"><i class="fa fa-circle-o"></i> Loan Products</a></li> -->
          </ul>
        </li>

        @if($bar == "roles" || $bar == "users" || $bar == "inactive users")
         <li class="active treeview">
        @else
         <li class="treeview">
        @endif
          <a href="#">
            <i class="fa fa-users"></i> <span>Users</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            @if($bar == "users")
            <li class="active"><a href="{{URL::to('/users')}}"><i class="fa fa-circle-o"></i> Manage Users</a></li>
            @else
            <li><a href="{{URL::to('/users')}}"><i class="fa fa-circle-o"></i> Manage Users</a></li>
            @endif
            @if($bar == "inactive users")
            <li class="active"><a href="{{URL::to('/users/inactives/')}}"><i class="fa fa-circle-o"></i> Inactive Users</a></li>
            @else
            <li><a href="{{URL::to('/users/inactives')}}"><i class="fa fa-circle-o"></i> Inactive Users</a></li>
            @endif
          </ul>
        </li>
        @else
        @if($bar == "sales")
        <li class="active">
          <a href="{{URL::to('/sales')}}">
            <i class="fa fa-shopping-cart"></i> <span>Sales</span>
            
          </a>
          
        </li>
        @else
        <li>
          <a href="{{URL::to('/sales')}}">
            <i class="fa fa-shopping-cart"></i> <span>Sales</span>
            
          </a>
          
        </li>
        @endif
        @if($bar == "reverse sales")
        <li class="active">
          <a href="{{URL::to('/reverse/sales')}}">
            <i class="fa fa-list"></i> <span>Reverse Sales</span>
            
          </a>
          
        </li>
        @else
        <li>
          <a href="{{URL::to('/reverse/sales')}}">
            <i class="fa fa-list"></i> <span>Reverse Sales</span>
            
          </a>
          
        </li>
        @endif
        @endif
        @if($bar == "profile")
         <li class="active">
        @else
         <li>
        @endif
          <a href="{{URL::to('/profile')}}">
            <i class="fa fa-user"></i> <span>Profile</span>
            
          </a>
        </li>

        <li>
          <a href="{{ url('/logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
            <i class="fa fa-sign-out"></i> <span>Logout</span>

            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
          
          </a>
        </li>
       
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>