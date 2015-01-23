@extends('admin.nav')


@section('admin-title') Admin Page @stop

@section('nav-admin-index') active @stop

@section('admin-content')

<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">Admin Page</h3>
    </div>
    <div class="panel-body">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title">Last Logins</h3>
            </div>
            <div class="panel-body">
                @foreach($users as $user)
                    <h6>{{$user->username}} <span class="pull-right">{{date('r',$user->last_login)}}</span> </h6>
                @endforeach
            </div>
        </div>
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title">Account Types</h3>
            </div>
            <div class="panel-body">
                @foreach($users as $user)
                <h6>{{$user->username}} <span class="pull-right">Admin: {{$user->admin}}</span> <br />
                <span class="pull-right">SuperAdmin: {{$user->superuser}}</span></h6>
                <hr>
                @endforeach
            </div>
        </div>
    </div>
</div>
@stop