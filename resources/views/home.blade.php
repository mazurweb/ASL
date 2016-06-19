@extends('layouts.app')
@section('title')
    Company Portal | Proctor Gallagher Institute
@endsection
@section('stylesheet')
    <% asset('css/pages/home.css') %>
@endsection
@section('content')
<div class="main-panel" ng-app="home">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3><i class="fa fa-bullhorn"></i>Announcements</h3>
                    </div>

                    <div class="panel-body">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger col-md-6 col-xs-12 col-md-offset-3 col-xs-offset-0">
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
                                <div class="alert alert-success col-md-6 col-xs-12 col-md-offset-3 col-xs-offset-0" style="margin-top: 10px; text-align: center;"> <%Session::get('message')%> </div>
                            </div>
                        @endif
                        <div class="row">
                            <div class="recent-announcements col-md-6 col-xs-12 clearfix" ng-controller="AnnouncementCtrl as vm">
                                <h4 style="padding: 0; color: #328fce;">Recent Announcements</h4>

                                <div class="announcement" ng-repeat="announcement in vm.announcements">
                                    <h5>{{ announcement.title }}</h5>
                                    <p>{{ announcement.body }}</p>
                                    <p style="color: #328fce">by: <b>{{ announcement.user }}</b> - {{ announcement.created_at }}</p>
                                </div>
                            </div>
                        </div>

                        <hr />

                        <div class="row">
                            <div class="announcement-form col-md-6 col-xs-12 clearfix">
                                <h4 style="padding: 0; color: #328fce; margin-top: 0;">Post an Announcement</h4>
                                <form method="post" action="api/create-announcement">
                                    <input type="hidden" name="_token" value="<% csrf_token() %>">
                                    <div class="form-group">
                                        <label>Title:</label>
                                        <input type="text" name="title" placeholder="Enter a Title" class="form-control">

                                    </div>
                                    <div class="form-group">
                                        <label>Body:</label>
                                        <textarea name="body" placeholder="Enter Body Text" class="form-control"></textarea>
                                    </div>
                                    <input type="submit" class="btn" value="Post Announcement">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js-page')
    <script src="<% asset('js/pages/home.js') %>"></script>
@endsection
