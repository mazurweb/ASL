<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Forgot Password | Proctor Gallagher Institute</title>

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<% 'css/pages/fgpw.css' %>" />
</head>
<body>
<div id="wrapper">
    <div class="container">
        <div class="row">
            <div class="fgpw-section">
                <div id="fgpw-logo">
                    <img src="<% 'images/pgi-logo.png' %>" class="logo">
                </div>
                <div class="fgpw-header">
                    <h3 class="header-content">Forgot Your Password</h3>
                </div>
                <div class="fgpw-form">
                    @if (session('status'))
                        <div class="alert alert-success">
                            <% session('status') %>
                        </div>
                    @endif

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
                    <form action="<% url('/forgot-password') %>" method="post">
                        <input type="hidden" name="_token" value="<% csrf_token() %>">
                        <input id="email" name="email" placeholder="Email" type="email" class="form-control email">
                        <div class="form-group">
                            <input name="submit" type="submit" value="Submit" class="submit-fgpw">
                            <a href="/login" class="login">Back to Login</a>
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
