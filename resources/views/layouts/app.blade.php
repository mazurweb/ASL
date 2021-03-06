@if(Auth::guest())
    <script>window.location = "<% url('/login') %>";</script>
@else
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link href="<% asset('css/main.css') %>" rel="stylesheet" type="text/css" />
    <link href="@yield('stylesheet')" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="<% asset('/css/lib/jAlert/jAlert-v3.css') %>">
    <link rel="stylesheet" href="<% asset('/css/lib/DataTable/jquery.dataTables.min.css') %>">

    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }
    </style>
</head>
<body id="app-layout">
    <header class="clearfix">
        <div class="container">
            <div class="row">
                <div id="logo">
                    <a href="<% url('/') %>"><img src="<% asset('images/pgi-logo.png') %>"></a>
                </div>
                <div class="nav col-sm-8 pull-right">
                    <div class="navbar-right user pull-right">
                        <span><i class="fa fa-user"></i><% Auth::user()->username %></span>
                        <div class="menu pull-right ">
                            <ul>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle dropbars" data-toggle="dropdown" role="button"><i class="fa fa-caret-down"></i></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="<% url('/account') %>">Manage Account</a></li>
                                        <li><a href="<% url('/logout') %>">Logout</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <nav class="main-menu">
        <div class="container">
            <ul class="navbar-nav navbar-left dash-menu">
                <li style="color: #fff;"><a href="/"><i class="fa fa-home"></i>Home</a></li>
                <li style="color: #fff;" class="dropdown">
                    <a class="dropdown-toggle"><i class="fa fa-lock"></i>Admin</a>
                    <ul class="dropdown-menu">
                        <li><a href="/admin/register"><i class="fa fa-user"></i>Register User</a></li>
                        <li><a href="/admin/employee-list"><i class="fa fa-list"></i>Employee List</a></li>
                    </ul>
                </li>
        </div>
    </nav>

    @yield('content')

    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <!--Angular Scripts -->
    <script src="<% asset('/bower_components/angular/angular.js') %>"></script>
    <script src="<% asset('/bower_components/angular-resource/angular-resource.js') %>"></script>
    <!-- Plugins -->
    <script src="<% asset('/js/lib/DataTable/jquery.dataTables.min.js') %>"></script>
    <script src="<% asset('/js/lib/DataTable/angular-datatables.min.js') %>"></script>
    <script src="https://cdn.datatables.net/buttons/1.1.0/js/dataTables.buttons.min.js"></script>
    <script src="<% asset('/js/lib/jAlert/jAlert-v3.js') %>"></script>
    <script src="<% asset('/js/lib/jAlert/jAlert-functions.min.js') %>"></script>
    <script src="<% asset('/js/lib/jTimeout/jTimeout-v2.0.min.js') %>"></script>

    <!-- Page Scripts -->
    <script src="/js/main.js"></script>
    @yield('js-page')
</body>
</html>
@endif
