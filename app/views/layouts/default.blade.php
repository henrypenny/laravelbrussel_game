<!DOCTYPE html>
<html>
<head>
    <title>Laratron - try to keep up.</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <meta name="HandheldFriendly" content="true" />
    <meta charset="utf-8">
    <meta name="description" content="Laratron - try to keep keep up.">
    {{ HTML::script("js/jquery.js") }}
    {{ HTML::script("js/jquery.knob.js") }}
    {{ HTML::script("js/trongame.js") }}
    {{ HTML::script("js/laravelbrussel.ajax.js") }}
    {{ HTML::script("js/laravelbrussel.moreasy.js") }}

    {{ HTML::style("css/font-awesome.min.css") }}
    {{ HTML::style("css/font-orbitron.css") }}
    {{ HTML::style("css/trongame.css") }}

</head>
<body>

@if (Session::has('flash_message'))
<div class="flash-message {{ Session::get('flash_type', 'flash-succes') }}">
    <p>{{ Session::get('flash_message') }}</p>
</div>
@endif

@yield('content')

<script>
    $('.flash-message').delay(5000).slideUp();
</script>
</body>
</html>
