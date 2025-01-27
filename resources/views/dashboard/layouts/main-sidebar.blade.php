<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{url('/dashboard')}}" class="brand-link">
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
            <a href="#" class="d-block">محمدرضا عطوان</a>
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
                <p>العلامات</p>
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

            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fa fa-book"></i>
                <p>
                  صفحات
                  <i class="fa fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="pages/examples/invoice.html" class="nav-link">
                    <i class="fa fa-circle-o nav-icon"></i>
                    <p>سفارشات</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/examples/profile.html" class="nav-link">
                    <i class="fa fa-circle-o nav-icon"></i>
                    <p>پروفایل</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/examples/login.html" class="nav-link">
                    <i class="fa fa-circle-o nav-icon"></i>
                    <p>صفحه ورود</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/examples/register.html" class="nav-link">
                    <i class="fa fa-circle-o nav-icon"></i>
                    <p>صفحه عضویت</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/examples/lockscreen.html" class="nav-link">
                    <i class="fa fa-circle-o nav-icon"></i>
                    <p>قفل صفحه</p>
                  </a>
                </li>
              </ul>
            </li>
          
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
    </div>
    <!-- /.sidebar -->
  </aside>