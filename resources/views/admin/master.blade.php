<!DOCTYPE html>
</html>
<html lang="en">
<head>
    <title>{{ config('app.name') }} - {{ config('app.subtitle') }}</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

    <link rel="stylesheet" href="{{ URL::asset('admin/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('admin/vendor/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('admin/vendor/linearicons/style.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('admin/vendor/chartist/css/chartist-custom.css') }}">   <!-- MAIN CSS -->
    <link rel="stylesheet" href="{{ URL::asset('admin/css/main.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('admin/css/demo.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ URL::asset('admin/img/apple-icon.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ URL::asset('admin/img/favicon.png') }}">
</head>
<body>
    
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="brand">
                <a href=""><img src="{{ URL::asset('admin/img/logo-dark.png') }}" alt="Klorofil Logo" class="img-responsive logo"></a>
            </div>
            <div class="container-fluid">
                <div class="navbar-btn">
                    <button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
                </div>
                <form class="navbar-form navbar-left">
                    <div class="input-group">
                        <input type="text" value="" class="form-control" placeholder="Search dashboard...">
                        <span class="input-group-btn"><button type="button" class="btn btn-primary">Go</button></span>
                    </div>
                </form>
                @if (Auth::user())
                <div id="navbar-menu">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="{{ URL::asset( Auth::user()->img ) }}" class="img-circle" alt="Avatar"> <span>{{ Auth::user()->name }}</span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="{{ route('profile', Auth::user()->id) }}"><i class="lnr lnr-user"></i> <span>My Profile</span></a></li>
                                <li><a href="{{ route('logout') }}"><i class="lnr lnr-exit"></i> <span>Logout</span></a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                @endif
            </div>
        </nav>
        <div id="sidebar-nav" class="sidebar">
            <div class="sidebar-scroll">
                <nav>
                    <ul class="nav">
                        <li>
                            <a href="" class="active"><i class="lnr lnr-home"></i> <span>Dashboard</span></a>
                        </li>
                        <li>
                            <a href="{{ route('add-category') }}" class=""><i class="lnr lnr-code"></i> <span>New Category</span></a>
                        </li>
                        <li>
                            <a href="{{ route('list-category') }}" class=""><i class="lnr lnr-chart-bars"></i> <span>List Category</span></a>
                        </li>
                        <li>
                            <a href="{{ route('add-tag') }}" class=""><i class="lnr lnr-code"></i> <span>New Tag</span></a>
                        </li>
                        <li>
                            <a href="{{ route('list-tag') }}" class=""><i class="lnr lnr-chart-bars"></i> <span>List Tag</span></a>
                        </li>
                        <li>
                            <a href="{{ route('add-post') }}" class=""><i class="lnr lnr-code"></i> <span>New Post</span></a>
                        </li>
                        <li>
                            <a href="{{ route('list-post') }}" class=""><i class="lnr lnr-chart-bars"></i> <span>List Post</span></a>
                        </li>
                        <li>
                            <a href="#subPages" data-toggle="collapse" class="collapsed"><i class="lnr lnr-file-empty"></i> <span>User</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
                            <div id="subPages" class="collapse ">
                                <ul class="nav">
                                    <li><a href="{{ route('add-user') }}" class="">Add-User</a></li>
                                    <li><a href="{{ route('list-user') }}" class="">List-User</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <div class="main">
            @yield('content')
        </div>
    </div>
    <div class="clearfix"></div>
    <footer>
        <div class="container-fluid">
            <p class="copyright">&copy; 2017 <a href="https://www.themeineed.com/" target="_blank">Theme I Need</a>. All Rights Reserved.</p>
        </div>
    </footer>
</div>

<script src="{{ URL::asset('admin/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ URL::asset('admin/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ URL::asset('admin/vendor/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
<script src="{{ URL::asset('admin/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js') }}"></script>
<script src="{{ URL::asset('admin/vendor/chartist/js/chartist.min.js') }}"></script>
<script src="{{ URL::asset('admin/scripts/klorofil-common.js') }}"></script>
<script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
@yield('javascript')
<script>
    $(function() {
  
        var data, options;
        data = {
            labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
            series: 
            [
                [23, 29, 24, 40, 25, 24, 35],
                [14, 25, 18, 34, 29, 38, 44],
            ]
        };

        options = {
            height: 300,
            showArea: true,
            showLine: false,
            showPoint: false,
            fullWidth: true,
            axisX: {
                showGrid: false
            },
            lineSmooth: false,
        };

        new Chartist.Line('#headline-chart', data, options);
        data = {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            series: [
                {
                    name: 'series-real',
                    data: [200, 380, 350, 320, 410, 450, 570, 400, 555, 620, 750, 900],
                },
                {
                    name: 'series-projection',
                    data: [240, 350, 360, 380, 400, 450, 480, 523, 555, 600, 700, 800],
                }
            ]
        };

        options = {
            fullWidth: true,
            lineSmooth: false,
            height: "270px",
            low: 0,
            high: 'auto',
            series: {
                'series-projection': {
                    showArea: true,
                    showPoint: false,
                    showLine: false
                },
            },
            axisX: {
                showGrid: false,

            },
            axisY: {
                showGrid: false,
                onlyInteger: true,
                offset: 0,
            },
            chartPadding: {
                left: 20,
                right: 20
            }
        };

        new Chartist.Line('#visits-trends-chart', data, options);
        data = {
            labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
            series: [[6384, 6342, 5437, 2764, 3958, 5068, 7654]]
        };

        options = {
            height: 300,
            axisX: {
                showGrid: false
            },
        };

        new Chartist.Bar('#visits-chart', data, options);
        var sysLoad = $('#system-load').easyPieChart({
            size: 130,
            barColor: function(percent) {
                return "rgb(" + Math.round(200 * percent / 100) + ", " + Math.round(200 * (1.1 - percent / 100)) + ", 0)";
            },
            trackColor: 'rgba(245, 245, 245, 0.8)',
            scaleColor: false,
            lineWidth: 5,
            lineCap: "square",
            animate: 800
        });

        var updateInterval = 3000;

        setInterval( function() {
            var randomVal;
            randomVal = getRandomInt(0, 100);
            sysLoad.data('easyPieChart').update(randomVal);
            sysLoad.find('.percent').text(randomVal);
        }, updateInterval);

        function getRandomInt(min, max) {
            return Math.floor(Math.random() * (max - min + 1)) + min;
        }

    });

</script>
</body>
</html>
