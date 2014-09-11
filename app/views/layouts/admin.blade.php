<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>{{ Config::get('site.app_name') }} Admin</title>

    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="/css/admin.css" rel="stylesheet">
    @yield('styles')

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
            <li>{{ HTML::linkRoute('dashboard_path', 'Dashboard') }}</li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Settings <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                @foreach ($settings as $setting)
                  <li>
                    {{ HTML::linkRoute('admin.settings.edit', ucfirst($setting->key), $setting->key) }}
                  </li>
                @endforeach
              </ul>
            </li>
            <li>{{ HTML::linkRoute('my-profile', 'Profile') }}</li>
            <li>
              {{ HTML::linkRoute('logout_path', 'Logout ' . Auth::user()->name) }}
            </li>
          </ul>
          <!-- <form class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="Search...">
          </form> -->
        </div>
      </div>
    </div>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <img src="{{ Config::get('site.logo_small_path') }}">
          <ul class="nav nav-sidebar">
            {{ HTML::clever_link("admin", '<i class="glyphicon glyphicon-dashboard"></i> Dashboard' ) }}
            {{ HTML::clever_link("admin/enquiries", '<i class="glyphicon glyphicon-envelope"></i> Enquiries Inbox' ) }}
            {{ HTML::clever_link("#", '<i class="glyphicon glyphicon-stats"></i> Google Analytics' ) }}
          </ul>
          <ul class="nav nav-sidebar">
            {{ HTML::clever_link("admin/services", '<i class="glyphicon glyphicon-cog"></i> Services') }}
            {{ HTML::clever_link("admin/articles", '<i class="glyphicon glyphicon-edit"></i> Articles') }}
            {{ HTML::clever_link("admin/contents/about/edit", '<i class="glyphicon glyphicon-list-alt"></i> About / Bio') }}
            {{ HTML::clever_link("admin/faqs", '<i class="glyphicon glyphicon-question-sign"></i> FAQ\'s') }}
          </ul>
          <ul class="nav nav-sidebar">
            <li>{{ HTML::clever_link("admin/users", '<i class="glyphicon glyphicon-user"></i> Users Admin') }}</li>
            {{ HTML::clever_link("admin/accesslogs", '<i class="glyphicon glyphicon-lock"></i> Access Log') }}
            {{ HTML::clever_link("admin/errors", '<i class="glyphicon glyphicon-warning-sign"></i> Site Errors') }}

          </ul>

          @yield('sidebar') {{-- include any special messages about the current content --}}

        </div>

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

          @include('admin.common.alerts')
          @yield('content') {{-- the current content --}}

        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="/js/jquery.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    @yield('scripts')
    <script src="/js/admin.js"></script>

  </body>
</html>
