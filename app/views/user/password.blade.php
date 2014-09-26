@extends('user.nav')


@section('user-title') User Page @stop

@section('nav-profile-password') active @stop

@section('user-content')

<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">Change Password</h3>
    </div>
    <div class="panel-body">
        <div class="form-group">
            <label>Old Password</label>
            <input type="password" class="form-control" name="old_password" id="old_password" required />
        </div>
        <div class="form-group">
            <label>New Password</label>
            <input type="password" class="form-control" name="new_password" id="new_password" required />
        </div>
        <div class="form-group">
            <label>Confirm Password</label>
            <input type="password" class="form-control" name="confirm_password" id="confirm_password" required />
        </div>
        <div class="form-group">
            <button id="change-password" class="btn btn-primary">Change Password</button>
        </div>
    </div>
</div>
@stop

@section('user-js')
<script src="../js/password.js"></script>
@stop