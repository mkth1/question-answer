<!DOCTYPE html>

<html lang="en">

<head id="Starter-Site">

    <meta charset="UTF-8">

    <!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <title>
        @section('title')
            Forum
        @show
    </title>

    <!--  Mobile Viewport Fix -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <!-- favicon icon -->
    <link rel="shortcut icon" href="{{{ asset('favicon.ico') }}}">

    <!-- CSS -->
    {{ HTML::style('css/bootstrap.css') }}
    {{ HTML::style('css/styles.css') }}

    @yield('styles')

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

</head>