@extends('layouts.session')


@section('title') Login Page @stop

@section('css') @stop

@section('content')
<br /><br />
<div class="panel panel-info" style="opacity: 0.85">
    <div class="panel-heading">
        <h3 class="panel-title">Please log in to enter unknown space...</h3>
    </div>
    <div class="panel-body">
        {{ Form::open(array('route'=>'session.store', 'method'=>'post')) }}
            <div class="col-md-8 col-md-offset-2">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" id="email" name="email" class="form-control" required />
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" class="form-control" required />
                </div>
                <hr />
                <div class="form-group">
                    @if($errors->has())
                        @foreach ($errors->all() as $error)
                        <span style="color:red">{{ $error }}</span>
                        @endforeach
                    @endif
                    {{$msg}}<br />
                    <button type="submit" class="btn btn-primary">Login</button>
                    {{ HTML::linkRoute('user.create', 'Create a new account', array(), array('style'=>'color:red', 'class'=>'pull-right')) }}
                </div>
            </div>
        {{ Form::close() }}
    </div>
</div>
@stop

@section('js') @stop

