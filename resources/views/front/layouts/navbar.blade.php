<!-- Header -->
<header>
    @if (app()->getLocale() == 'en')
        <!-- Header desktop -->
    <div class="container-menu-desktop">
        <!-- Topbar -->
        <div class="top-bar">
            <div class="content-topbar flex-sb-m h-full container">
                <div class="left-top-bar">
                    Free shipping for standard order over $100
                </div>

                <div class="right-top-bar flex-w h-full">
                    <a href="#" class="flex-c-m trans-04 p-lr-25">
                        Help & FAQs
                    </a>

                    <a href="#" class="flex-c-m trans-04 p-lr-25">
                        My Account
                    </a>

                    <a href="#" class="flex-c-m trans-04 p-lr-25">
                        EN
                    </a>

                    <a href="#" class="flex-c-m trans-04 p-lr-25">
                        USD
                    </a>
                </div>
            </div>
        </div>

        <div class="wrap-menu-desktop">
            <nav class="limiter-menu-desktop container">
                
                <!-- Logo desktop -->		
                <a href="/" class="logo">
                    <img src="{{asset('front/images/icons/logo-01.png')}}" alt="IMG-LOGO">
                </a>

                <!-- Menu desktop -->
                <div class="menu-desktop">
                    <ul class="main-menu">
                        <li class="active-menu">
                            <a href="{{ url('/') }}">@lang('front.home')</a>
                        </li>

                        <li>
                            <a href="{{ url('/') }}">@lang('front.Shop')</a>
                        </li>

                        <li>
                            <a href="blog.html">@lang('front.Blog')</a>
                        </li>

                        <li>
                            <a href="about.html">@lang('front.About')</a>
                        </li>

                        <li>
                            <a href="contact.html">@lang('front.Contact')</a>
                        </li>

                        <li>
                            <a href="{{ app()->getLocale() == 'ar' ? url('local?local=en') : url('local?local=ar') }}">
                                {{ app()->getLocale() == 'ar' ? 'English' : 'العربية' }}
                            </a>
                        </li>

                    </ul>
                </div>	

                <!-- Icon header -->
                <div class="wrap-icon-header flex-w flex-r-m">
                    <div class="wrap-icon-header flex-w flex-r-m">
                        
                        @auth
                            <a href="{{ url('/logout') }}" class="btn btn-danger">
                                <i class="fa fa-user mr-2"></i> Logout
                            </a>
                        @else
                            <a href="{{ url('/loginPage') }}" type="button" class="btn text-dark">
                                <i class="fa fa-user"></i> Login
                            </a>

                            <a href="{{ url('/registerPage') }}" type="button" class="btn text-dark">
                                <i class="fa fa-user"></i> Register
                            </a>
                        @endauth

                    <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-modal-search">
                        <i class="zmdi zmdi-search"></i>
                    </div>

                    <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart" data-notify="{{ carts()->count() }}">
                        <i class="zmdi zmdi-shopping-cart"></i>
                    </div>

                    {{-- <a href="#" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti" data-notify="0">
                        <i class="zmdi zmdi-favorite-outline"></i>
                    </a> --}}

                    @auth
                        <a href="{{ url('/my_orders') }}" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10">
                            <i class="fa fa-shopping-basket" aria-hidden="true"></i>
                        </a>
                    @endauth
                
                </div>
            </nav>
        </div>	
    </div>
    @else
    
    <!-- Header desktop -->
        <div class="container-menu-desktop" dir="rtl">
            <!-- Topbar -->
            <div class="top-bar">
                <div class="content-topbar flex-sb-m h-full container">
                    <div class="left-top-bar">
                        Free shipping for standard order over $100
                    </div>

                    <div class="right-top-bar flex-w h-full">
                        <a href="#" class="flex-c-m trans-04 p-lr-25">
                            Help & FAQs
                        </a>

                        <a href="#" class="flex-c-m trans-04 p-lr-25">
                            My Account
                        </a>

                        <a href="#" class="flex-c-m trans-04 p-lr-25">
                            EN
                        </a>

                        <a href="#" class="flex-c-m trans-04 p-lr-25">
                            USD
                        </a>
                    </div>
                </div>
            </div>

            <div class="wrap-menu-desktop">
                <nav class="limiter-menu-desktop container">
                    
                    <!-- Logo desktop -->		
                    <a href="#" class="logo">
                        <img src="{{asset('front/images/icons/logo-01.png')}}" alt="IMG-LOGO">
                    </a>

                    <!-- Menu desktop -->
                    <div class="menu-desktop m-4">
                        <ul class="main-menu">
                            
                            <li>
                                <a href="{{ app()->getLocale() == 'ar' ? url('local?local=en') : url('local?local=ar') }}">
                                    {{ app()->getLocale() == 'ar' ? 'English' : 'العربية' }}
                                </a>
                            </li>  

                            <li>
                                <a href="contact.html">@lang('front.Contact')</a>
                            </li>

                            <li>
                                <a href="about.html">@lang('front.About')</a>
                            </li>

                            <li>
                                <a href="blog.html">@lang('front.Blog')</a>
                            </li>
                          

                            <li>
                                <a href="{{ url('/products') }}">@lang('front.Shop')</a>
                            </li>

                            <li class="active-menu">
                                <a href="{{ url('/') }}">@lang('front.home')</a>
                            </li>

                                 
                        </ul>
                    </div>	

                    <!-- Icon header -->
                    <div class="wrap-icon-header flex-w flex-r-m">
                        <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-modal-search">
                            <i class="zmdi zmdi-search"></i>
                        </div>

                        <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart" data-notify="{{ carts()->count() }}">
                            <i class="zmdi zmdi-shopping-cart"></i>
                        </div>

                        <a href="#" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti" data-notify="0">
                            <i class="zmdi zmdi-favorite-outline"></i>
                        </a>
                    </div>
                </nav>
            </div>	
        </div>
    @endif

    <!-- Header Mobile -->
    <div class="wrap-header-mobile">
        <!-- Logo moblie -->		
        <div class="logo-mobile">
            <a href="index.html"><img src="{{asset('front/images/icons/logo-01.png')}}" alt="IMG-LOGO"></a>
        </div>

        <!-- Icon header -->
        <div class="wrap-icon-header flex-w flex-r-m m-r-15">
            <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 js-show-modal-search">
                <i class="zmdi zmdi-search"></i>
            </div>

            <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti js-show-cart" data-notify="{{ carts()->count() }}">
                <i class="zmdi zmdi-shopping-cart"></i>
            </div>

            <a href="#" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti" data-notify="0">
                <i class="zmdi zmdi-favorite-outline"></i>
            </a>

        </div>

        <!-- Button show menu -->
        <div class="btn-show-menu-mobile hamburger hamburger--squeeze">
            <span class="hamburger-box">
                <span class="hamburger-inner"></span>
            </span>
        </div>
    </div>


    <!-- Menu Mobile -->
    <div class="menu-mobile">
        <ul class="topbar-mobile">
            <li>
                <div class="left-top-bar">
                    Free shipping for standard order over $100
                </div>
            </li>

            <li>
                <div class="right-top-bar flex-w h-full">
                    <a href="#" class="flex-c-m p-lr-10 trans-04">
                        Help & FAQs
                    </a>

                    <a href="#" class="flex-c-m p-lr-10 trans-04">
                        My Account
                    </a>

                    <a href="#" class="flex-c-m p-lr-10 trans-04">
                        EN
                    </a>

                    <a href="#" class="flex-c-m p-lr-10 trans-04">
                        USD
                    </a>
                </div>
            </li>
        </ul>

        <ul class="main-menu-m">
            <li>
                <a href="{{ url('/') }}">@lang('front.home')</a>
            </li>

            <li>
                <a href="product.html">@lang('front.Shop')</a>
            </li>

            <li>
                <a href="blog.html">@lang('front.Blog')</a>
            </li>

            <li>
                <a href="about.html">@lang('front.About')</a>
            </li>

            <li>
                <a href="contact.html">@lang('front.Contact')</a>
            </li>

            <li>
                <a href="{{app()->getLocale() == "ar" ? url('local?local=en') : url('local?local=ar')}}"> {{app()->getLocale() == "ar" ? "English":"العربية"}} </a>
            </li>
        </ul>
    </div>

    <!-- Modal Search -->
    <div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
        <div class="container-search-header">
            <button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
                <img src="{{asset('front/images/icons/icon-close2.png')}}" alt="CLOSE">
            </button>

            <form class="wrap-search-header flex-w p-l-15">
                <button class="flex-c-m trans-04">
                    <i class="zmdi zmdi-search"></i>
                </button>
                <input class="plh3" type="text" name="search" placeholder="Search...">
            </form>
        </div>
    </div>
</header>


{{-- 
@if ($errors->any())
    <div class="alert alert-danger" style="margin-top: 10rem">
        <ul>
            @foreach ($errors->all() as $error)
                <li class="text-right text-danger">{{ $error }}</li>
            @endforeach
        </ul>
@endif --}}