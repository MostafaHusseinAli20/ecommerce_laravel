<!DOCTYPE html>
<html lang="en">
<head>
    @include('dashboard.layouts.head')
</head>
<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        @include('dashboard.layouts.main-header')
        @include('dashboard.layouts.main-sidebar')
        @section('main-content')
            
        @show
    </div>
    @include('dashboard.layouts.scripts')
</body>
</html>