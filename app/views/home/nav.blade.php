@extends('layouts.master')


@section('title') @yield('home-title') @stop

@section('css')  @stop

@section('subnav')
<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">Menu</h3>
    </div>
    <div class="panel-body">
        <ul class="list-unstyled">
            <li><a class="@yield('home-active')" href="/">Home</a></li>
        </ul>
    </div>
</div>
@stop

@section('content') @yield('home-content') @stop

@section('js')  @stop