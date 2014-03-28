@extends('layouts.default')

@section('content')
<?php dd($users); ?>
<br /><br /><br /><br />
<div class="modalwrapper">

    <div class="modal">
        <div style="float: left; width: 50%">
            Welcome developer.<br /><br />
            Here stands some cheesy text nobody ever reads about some very dangerous bugs you need to fix.<br />
            Of course, you are the last bit of hope! Everyone else is counting on you. What did you expect?!<br /><br />
            But first you need to log in:<br /><br />
            {{ Form::open(array('route' => 'sessions.store')) }}
            {{ Form::text("username") }}
            {{ Form::password("password") }}
            <br /><br />
            {{ Form::submit("Log in") }}
            {{ Form::close() }}
        </div>
        <div style="float: left; width: 50%; text-align: right;">
            So, you are a new developer?! Welcome!<br />You first have to register to play the game.<br /><br />
            <br />
            {{ Form::open(array('route' => 'sessions.register')) }}
            {{ Form::text("username") }}
            {{ Form::label("&nbsp;Username") }}<br />
            {{ Form::text("email") }}
            {{ Form::label("&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Email") }}<br />
            {{ Form::password("password") }}
            {{ Form::label("Password") }}<br /><br />
            <br />
            {{ Form::submit("Register") }}
            {{ Form::close() }}
        </div>

    </div>
    <!--<div class="buttonStart">Log in</div>-->
</div>
@stop
