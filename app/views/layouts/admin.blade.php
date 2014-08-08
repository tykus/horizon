<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>{{ Config::get('site.app_name') }}</title>

    <!-- Bootstrap core CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/admin.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body id="admin">

    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">{{ Config::get('site.app_name') }} Admin</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Dashboard</a></li>
            <li><a href="#">Settings</a></li>
            <li><a href="#">Profile</a></li>
            <li><a href="#">Logout Auth::user()->name</a></li> <!-- TODO: echo this out whenever Auth is properly setup -->
          </ul>
          <form class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="Search...">
          </form>
        </div>
      </div>
    </div>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <img src="/{{ Config::get('site.logo_small_path') }}">
          <ul class="nav nav-sidebar">
            <li class="active"><a href="#"><i class="glyphicon glyphicon-dashboard"></i> Dashboard</a></li>
            <li><a href="/admin/enquiries"><i class="glyphicon glyphicon-envelope"></i> Enquiries Inbox</a></li>
            <li><a href="#"><i class="glyphicon glyphicon-stats"></i> Google Analytics</a></li>
            <li><a href="#"><i class="glyphicon glyphicon-picture"></i> Media Manager</a></li>
          </ul>
          <ul class="nav nav-sidebar">
            <li><a href=""><i class="glyphicon glyphicon-cog"></i> Services</a></li>
            <li><a href=""><i class="glyphicon glyphicon-list-alt"></i> About / Bio</a></li>
            <li><a href=""><i class="glyphicon glyphicon-question-sign"></i> FAQ's</a></li>
            <li><a href=""><i class="glyphicon glyphicon-map-marker"></i> Address / Location</a></li>
          </ul>
          <ul class="nav nav-sidebar">
            <li><a href=""><i class="glyphicon glyphicon-warning-sign"></i> Site Errors</a></li>
            <li><a href=""><i class="glyphicon glyphicon-user"></i> Users Admin</a></li>
            <li><a href=""><i class="glyphicon glyphicon-lock"></i> Access Log</a></li>
          </ul>

          @yield('sidebar')

        </div>

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

          @yield('content')

        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="/js/jquery.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/admin.js"></script>
  </body>
</html>
