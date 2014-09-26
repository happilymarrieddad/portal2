@extends('layouts.master')


@section('title') @yield('lizardmen-title') @stop

@section('css')  @stop

@section('subnav')
<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">Units</h3>
    </div>
    <div class="panel-body">
        <ul class="list-unstyled">
            <li></li>
        </ul>
    </div>
</div>
@stop

@section('content') @yield('lizardmen-content') @stop

@section('js')
<script src="js/armies/fantasy/lizardmen/page.js"></script>
@stop