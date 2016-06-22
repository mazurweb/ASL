@extends('layouts.app')
@section('title')
    Employee List | Proctor Gallagher Institute
@endsection

@section('stylesheet')
    <% asset('css/pages/employee-list.css') %>
@endsection

@section('content')
    <div class="main-panel" ng-app="EmployeeList">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3><i class="fa fa-users"></i>Employee List</h3>
                        </div>
                        <div class="panel-body">
                            <div ng-controller="EmployeeController as list">
                                <table class="table employee-table" datatable="ng">
                                    <thead>
                                    <tr>
                                        <th>Employee</th>
                                        <th>Actions</th>
                                        <th>Details</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr ng-repeat="employee in list.employees">
                                        <td style="vertical-align: middle">{{ employee.fname }} {{ employee.lname }}</td>
                                        <td>
                                            <a href="/user/edit/{{ employee.id }}">Edit User</a>
                                        </td>
                                        <td><b>Username:</b> {{ employee.username }}<br><b>Email:</b> {{ employee.email }}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js-page')
    <script src="<% asset('js/pages/employee-list.js') %>"></script>
@endsection
