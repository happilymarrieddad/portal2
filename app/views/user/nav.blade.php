@extends('layouts.master')


@section('title') @yield('user-title') @stop

@section('body') background-image:url('../images/warhammer-background.png'); background-size:100%; background-repeat:no-repeat @stop

@section('css')  @stop

@section('subnav')
<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">Options</h3>
    </div>
    <div class="list-group">
        <a class="list-group-item @yield('nav-profile-show')" href="/profile/show">Show Profile</a>
        <a class="list-group-item @yield('nav-profile-edit')" href="/profile/edit">Edit Profile</a>
        <a class="list-group-item @yield('nav-profile-password')" href="/profile/password">Change Password</a>
    </div>
</div>
@stop

@section('content') @yield('user-content') @stop

@section('js') @yield('user-js') @stop