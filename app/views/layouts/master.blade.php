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

<body>
    <!-- Container -->
    <div class="container">
    <!-- row 1: navigation -->
        <div class="row">
            <!-- the role navigation section is the navbar ,navbar-fixed-top is for full width , navbar-inverse is for color black or inverse color and icon-bar is the icons which comes on the button when u reduce the page size!-->
            <nav class="navbar navbar-default navbar-inverse navbar-fixed-top" role="navigation">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#collapse" >
                        <span class="src-only"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a href="/" class="navbar-brand">Question & Answers</a>
                </div>
                <div class="collapse navbar-collapse pull-right" id="collapse">
                    <ul class="nav navbar-nav">
                                <li>{{HTML::linkRoute('home', 'Home')}}</li>
                                @if(!Auth::check())
                           <li>{{HTML::linkRoute('login', 'Login')}}</li>
                           <li>{{HTML::linkRoute('register', 'Register')}}</li>
                                @else
                                     <li>{{HTML::linkRoute('your-questions', 'Your Qs')}}</li>
                                    <li>{{ HTML::linkRoute('logout','Logout ('.Auth::user()->username.') ') }}</li>
                                @endif

                        <li><a href="#">Contact</a></li>
                    </ul>
                        {{ Form::open( array('url'=>'search','class'=>'navbar-form navbar-left','role'=>'search') ) }}
                        {{ Form::token() }}
                        <div class="form-group">
                        {{ Form::text('keyword',null,array('placeholder'=>'Search','id'=>'keyword' ,'class'=>'form-control')) }}
                         </div>
                        <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                        {{ Form::close() }}
                </div>
            </nav>
        </div>

    <!-- Content -->
                @if( Session::has('message') )
                    <p class="alert alert-danger">{{Session::get('message')}}</p>
                @endif
       @yield('content')
    <!-- ./ content -->

    <!-- Footer -->
    <footer class="clearfix">
       @yield('footer')
    </footer>
    <!-- ./ Footer -->


    <!-- ./ container -->

    <!-- Javascripts -->
    {{ HTML::script('js/jquery-2.1.1.min.js') }}
    {{ HTML::script('js/bootstrap.min.js') }}
    {{ HTML::script('js/application.js') }}

    @yield('scripts')

</body>

</html>