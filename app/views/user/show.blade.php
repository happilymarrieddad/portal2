@extends('user.nav')


@section('user-title') User Page @stop

@section('nav-profile-show') active @stop

@section('user-content')

<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">User Information</h3>
    </div>
    <div class="panel-body">
        <div class="col-sm-10 col-sm-offset-1">
            <h4>Username:<span class="pull-right">{{ Auth::user()->username }}</span></h4><br /><br />
            <h4>Email:<span class="pull-right">{{ Auth::user()->email }}</span></h4><br /><br />
            <h4>Last Login:<span class="pull-right">{{ date('r',Auth::user()->last_login) }}</span></h4><br /><br />
            <h4>Account Updated:<span class="pull-right">{{ date('r',Auth::user()->updated_at->timestamp) }}</span></h4><br /><br />
            <h4>Account Created:<span class="pull-right">{{ date('r',Auth::user()->created_at->timestamp) }}</span></h4><br /><br /><br /><br />
            <h6>Contact segfault.developer@yahoo.com for any questions</h6>
            <h6>Website powered by laravel.com and my developing prowess!</h6>
        </div>
    </div>
</div>
@stop