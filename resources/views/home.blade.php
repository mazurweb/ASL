@extends('layouts.app')

@section('stylesheet')
    {{ asset('css/pages/home.css') }}
@endsection
@section('content')
<div class="main-panel">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4><i class="fa fa-bullhorn"></i>Announcements</h4>
                    </div>

                    <div class="panel-body">
                        Announcements will go here!
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
