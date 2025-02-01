<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{url('/dashboard/index')}}" class="brand-link">
      <img src="{{asset('admin_dashboard/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light"> AdminLTE</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar" style="direction: ltr">
      <div style="direction: rtl">
        <!-- Sidebar user panel (optional) -->
        
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
              <img src="{{ asset('admin_dashboard/img/avatar.png') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
              <a href="#" class="d-block">{{ auth('admin')->user()->name }}</a>
            </div>
            
          </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            
            <li class="nav-item">
              <a href="{{route('admin.index')}}" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>المشرفين</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="{{route('categories.index')}}" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>الأقسام</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="{{route('tags.index')}}" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>التاجات</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="{{route('products.index')}}" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>المنتجات</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="{{route('sliders.index')}}" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>السلايدر</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="{{route('orders.index')}}" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>الطلبات</p>
              </a>
            </li>

          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
    </div>
    <!-- /.sidebar -->
  </aside>