@extends('layouts.master')


@section('title') @yield('admin-title') @stop

@section('body') background-image:url('../images/warhammer-background.png'); background-size:100%; background-repeat:no-repeat @stop

@section('css')  @stop

@section('subnav')
<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">Options</h3>
    </div>
    <div class="list-group">
        <a class="list-group-item @yield('nav-admin-index')" href="/admin/index">Admin</a>
        <a class="list-group-item @yield('nav-admin-show')" href="/admin/show">Show Users</a>
        <a class="list-group-item @yield('nav-admin-')" href="/"></a>
    </div>
</div>
@stop

@section('content') @yield('admin-content') @stop

@section('js') @yield('admin-js') @stop