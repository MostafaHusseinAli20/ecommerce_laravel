<!DOCTYPE html>
<html lang="en">
@include('front.layouts.head')
<body class="animsition">
    @include('front.layouts.navbar')

    <div class="main-content-page">
        @yield('content')
    </div>

    @include('front.layouts.footer')
    @include('front.layouts.scripts')
</body>
</html>