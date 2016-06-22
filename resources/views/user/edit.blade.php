@extends('layouts.app')

@section('title')
    Edit User | Proctor Gallagher Institute
@endsection

@section('stylesheet')
    <% asset('css/pages/user.css') %>
@endsection

@section('content')
    <div class="main-panel" ng-app="user">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3><i class="fa fa-user"></i>Edit User</h3>
                        </div>
                        <div class="panel-body">
                            <h4><a href="/admin/employee-list"><i class="fa fa-arrow-left" style="margin-right: 10px;"></i>Back to Employee List</a></h4>


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

                            @if(Session::has('message'))
                                <div class="form-group">
                                    <div class="alert alert-success" style="margin-top: 10px; text-align: center;"> <%Session::get('message')%> </div>
                                </div>
                            @endif

                            <form class="form-horizontal" role="form" method="POST" action="<% action('UserController@editUser') %>">
                                <input type="hidden" name="_token" value="<% csrf_token() %>">

                                <div class="form-group">
                                    <div class="col-md-2 control-label"></div>
                                    <div class="col-md-6">
                                        <h3>Edit Info for <% $user->fname %> <% $user->lname %>:</h3>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label">First Name</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="fname" value="<% $user->fname %>">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-2 control-label">Last Name</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="lname" value="<% $user->lname %>">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-2 control-label">Username</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="username" value="<% $user->username %>">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-2 control-label">E-Mail Address</label>
                                    <div class="col-md-6">
                                        <input type="email" class="form-control" name="email" value="<% $user->email %>">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-2 control-label">Password</label>
                                    <div class="col-md-6">
                                        <input type="password" class="form-control" name="password">
                                        <p>Leave Password empty unless you are changing the password.</p>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-2">
                                        <input type="submit" class="btn" value="Save">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection