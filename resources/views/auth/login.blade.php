<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Portal Login | Proctor Gallagher Institute</title>

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
    <link href="<% 'css/pages/login.css' %>" rel="stylesheet">

</head>
<body>
<div id="wrapper">
    <div class="container">
        <div class="row">
            <div class="login-section">
                <div id="logo">
                    <img src="<% '/images/pgi-logo.png' %>" class="logo">
                </div>
                <div class="login-header">
                    <h3 class="header-content">Portal Login</h3>
                </div>
                <div class="login-form">
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li><% $error %></li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="post" action="">
                        <input type="hidden" name="_token" value="<% csrf_token() %>">
                        <input id="username" name="username" placeholder="Username" type="username" class="form-control username" value="">
                        <input id="password" name="password" placeholder="Password" type="password" class="form-control password">

                        <div class="form-group clearfix" style="margin: 0;">
                            <div class="col-md-6 col-md-offset-4 check">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <input name="submit" type="submit" value="Login" class="submit-login">
                            <a href="<% url('forgot-password') %>" class="fgpw">Forgot Password?</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>
