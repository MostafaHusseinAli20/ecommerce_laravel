<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Admin Panel | Register</title>

    {{--<!-- Bootstrap 3.3.7 -->--}}
    <link rel="stylesheet" href="{{ asset('admin_dashboard/dashboard_files/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <link rel="stylesheet" href="{{ asset('admin_dashboard/dashboard_files/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_dashboard/dashboard_files/css/AdminLTE.min.css') }}">
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

</head>
<body class="login-page">

<div class="login-box">

    <div class="login-logo">
        <a href=""><b>Register |</b> Admin Panel</a>
    </div><!-- end of login lgo -->

    <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>

        <form action="{{ route('admin.register') }}" method="post">
            @csrf
            @method('post')

            <div class="form-group has-feedback">
                <input type="name" name="name" class="form-control" placeholder="Name">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>

            <div class="form-group has-feedback">
                <input type="code" name="code" class="form-control" placeholder="Code">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>

            <div class="form-group has-feedback">
                <input type="password" name="password" class="form-control" placeholder="Password">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>

            <div class="form-group">
                <label style="font-weight: normal;"><input type="checkbox" name="remember"> Remember me</label>
            </div>

            <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
            <h6 class="text-center">if You have account go to <a href="{{ url('/dashboard/loginPage') }}" class="text-primary">Login</a></h6>

        </form><!-- end of form -->

    </div><!-- end of login body -->

</div><!-- end of login-box -->

{{--<!-- jQuery 3 -->--}}
<script src="{{ asset('admin_dashboard/dashboard_files/js/jquery.min.js') }}"></script>

{{--<!-- Bootstrap 3.3.7 -->--}}
<script src="{{ asset('admin_dashboard/dashboard_files/js/bootstrap.min.js') }}"></script>

{{--<!-- FastClick -->--}}
<script src="{{ asset('admin_dashboard/dashboard_files/js/fastclick.js') }}"></script>

</body>
</html>
