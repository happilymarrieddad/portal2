@extends('layouts.master')


@section('title') @yield('home-title') @stop

@section('body') background-image:url('../images/warhammer-background.png'); background-size:100%; background-repeat:no-repeat @stop

@section('css')  @stop

@section('subnav')
<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">Menu</h3>
    </div>
    <div class="list-group">
        <a class="list-group-item @yield('home-active')" href="/">Home</a>
    </div>
</div>
@stop

@section('content') @yield('home-content') @stop

@section('js')  @stop