<!DOCTYPE html>

<html lang="en">

<head id="Starter-Site">

    <meta charset="UTF-8">

    <!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <title>
        @section('title')
            Laravel
        @show
    </title>

    <!--  Mobile Viewport Fix -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <!-- This is the traditional favicon.
     - size: 16x16 or 32x32
     - transparency is OK
     - see wikipedia for info on browser support: http://mky.be/favicon/ -->
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

<body>
    <!-- Container -->
    <div class="container">
        <!-- Navbar -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Laravel 4 Starter</a>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav">
              <li class="{{ (Request::is('/') ? ' active' : '') }}"><a href="/"><span class="glyphicon glyphicon-home"></span> Home</a></li>
              <li><a href="{{{ URL::to('widgets') }}}">Widgets</a></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="#">Action</a></li>
                  <li><a href="#">Another action</a></li>
                  <li><a href="#">Something else here</a></li>
                  <li><a href="#">Separated link</a></li>
                  <li><a href="#">One more separated link</a></li>
                </ul>
              </li>
            </ul>

        <!-- Content -->
        @yield('content')
        <!-- ./ content -->

        <!-- Footer -->
        <footer class="clearfix">
            @yield('footer')
        </footer>
        <!-- ./ Footer -->

    </div>
    <!-- ./ container -->

    <!-- Javascripts -->
    {{ HTML::script('js/jquery-1.10.2.min.js') }}
    {{ HTML::script('js/bootstrap.min.js') }}

    @yield('scripts')

</body>

</html>