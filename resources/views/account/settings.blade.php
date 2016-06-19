@extends('layouts.app')

@section('title')
    Account Settings | Proctor Gallagher Institute
@endsection

@section('stylesheet')
    <% 'css/pages/settings.css' %>
@endsection

@section('content')
    <div class="main-panel">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4><i class="fa fa-cogs"></i>Account Settings</h4>
                        </div>

                        <div class="panel-body">
                            @if(Session::has('message'))
                                <div class="form-group" style="padding-left: 15px; margin-bottom: 0">
                                    <div class="alert alert-success col-md-6" style="margin-top: 10px;"> <%Session::get('message')%> </div>
                                </div>
                            @endif

                            @if (count($errors) > 0)
                                <div class="form-group" style="padding-left: 15px; margin-bottom: 0;">
                                    <div class="alert alert-danger col-md-6">
                                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li><% $error %></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            @endif

                            <div class="updateInfo clearfix">
                                <form class="form-horizontal" role="form" method="POST" action="<% action('AccountController@updateInfo') %>">
                                    <input type="hidden" name="_token" value="<% csrf_token() %>">
                                    <div class="col-md-6" style="padding: 0;">
                                        <div class="form-group">
                                            <div class="col-md-6">
                                                <label for="fname">First Name</label>
                                                <input type="text" class="form-control" name="fname" value="<% Auth::user()->fname %>">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="lname">Last Name</label>
                                                <input type="text" class="form-control" name="lname" value="<% Auth::user()->lname %>">
                                            </div>
                                            <div class="form-group">
                                                <input type="submit" name="updateInfo" class="btn" style="margin-top: 15px; margin-left: 30px;" value="Update Info">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <div class="updateEmail">
                                <form class="form-horizontal" role="form" method="POST" action="<% action('AccountController@updateEmail') %>">

                                    <input type="hidden" name="_token" value="<% csrf_token() %>">
                                    <div class="form-group">
                                        <div class="col-md-6">
                                            <label for="email">Update Email:</label>
                                            <input type="email" class="form-control" name="email" value="<% Auth::user()->email %>">
                                        </div>
                                    </div>
                                    <div class="form-group" style="padding-left: 15px;">
                                        <input type="submit" class="btn" name="updateEmail" value="Update Email">
                                    </div>

                                </form>
                            </div>

                            <hr class="settings-hr" style="margin-top: 20px;"/>

                            <div class="updatePassword">
                                <form class="form-horizontal" role="form" method="POST" action="<% action('AccountController@changePassword') %>">
                                    <input type="hidden" name="_token" value="<% csrf_token() %>">
                                    <div class="form-group">
                                        <div class="col-md-6">
                                            <label for="password" style="margin-bottom: 10px;">Change Password:</label>
                                            <input type="password" class="form-control" name="password" placeholder="New Password">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-6">
                                            <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password">
                                        </div>
                                    </div>

                                    <input type="submit" class="btn" name="updatePassword" value="Change Password">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection