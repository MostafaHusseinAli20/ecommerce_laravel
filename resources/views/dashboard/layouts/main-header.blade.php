<!-- Navbar -->
<nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ url('/dashboard') }}" class="nav-link">الرئيسية</a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="بحث" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fa fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav mr-auto align-items-center">
      <!-- Logout -->
      <li class="">
        <a href="{{ route('admin.logout') }}" class="btn btn-danger btn-sm btn ml-2">
          <i class="fa fa-user ml-2"></i> خروج
        </a>
      </li>
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        
        <a class="nav-link" data-toggle="dropdown" href="contact">
          <i class="fa fa-comments-o"></i>
          <span class="badge badge-danger navbar-badge">{{ \App\Models\Contact::count() }}</span>
        </a>
        
        @if (\App\Models\Contact::count() > 0)
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-left">

            @foreach (\App\Models\Contact::all() as $item)
              <a href="{{ route('contact.show', $item->id )}}" class="dropdown-item">
                <!-- Message Start -->
                <div class="media">
                  <div class="media-body">
                    <h3 class="dropdown-item-title">
                      {{ $item->name }}
                      <span class="float-left text-sm text-danger"><i class="fa fa-star"></i></span>
                    </h3>
                    <p class="text-sm">{{ $item->subject }}</p>
                    <p class="text-sm text-muted"><i class="fa fa-clock-o mr-1"></i> {{ $item->created_at->format('Y-m-d') }} قبل</p>
                  </div>
                </div>
                <!-- Message End -->
              </a>
              @endforeach

              <div class="dropdown-divider"></div>
              
              <form action="{{ route('contact.destroyAll') }}" method="POST">
                @csrf
                @method('post')
                <button class="dropdown-item dropdown-footer">حذف جميع الرسائل</button>
              </form>
            </div>
          @endif
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fa fa-bell-o"></i>
          <span class="badge badge-warning navbar-badge">
            {{ \App\Models\Noftification::count() }}
          </span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-left">

            @foreach (\App\Models\Noftification::all() as $notification)
              <br>
              <div class="d-flex justify-center align-items-center">
                <div class="dropdown-divider"></div>
                <a href="{{ route('orders.show', $notification->order_id) }}" class="dropdown-item">
                  <i class="fa fa-envelope ml-2"></i> {{ $notification->title }}
                </a>
                <button form="delete{{$notification->id}}" class="ml-3 btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
              </div>
              
                <form method="POST" id="delete{{$notification->id}}" action="{{route('notification.destroy',  $notification->id)}}">
                  @csrf
                  @method('delete')
                </form>

              @endforeach
              <div class="dropdown-divider"></div>
              <button form="softDelete" class="dropdown-item dropdown-footer">حذف جميع الرسائل</button>
              <form method="POST" id="softDelete" action="{{ route('notifications.soft-delete-all') }}">
                @csrf
                @method('DELETE')
              </form>
          </div>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->