<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="{{ Config::get('site.description') }}">
  <meta name="author" content="{{ Config::get('site.author') }}">

  <title>{{ Config::get('site.business.name') }}</title>

  <!-- CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link href="css/main.min.css" rel="stylesheet">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="horizon">

  <!-- Navigation -->
  <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">
          <img src="img/logo_white.png" style="height:52px;width:auto;">
        </a>
      </div>
      <div class="collapse navbar-collapse">
        <ul class="nav navbar-nav navbar-right">
          <li><a href="#home">Home</a></li>
          <li><a href="#services">Services</a></li>
          <li><a href="#about">About</a></li>
          <li><a href="#location">Location</a></li>
          <li><a href="#contact">Contact</a></li>
          <li><a href="/faqs">FAQs</a></li>
        </ul>
      </div>
    </div>
  </nav>

  @yield('content')

  <!-- Footer -->
  <footer>
    <div class="container">
      <div class="row">

        <div class="col-sm-3 text-left">
          {{ HTML::image(Config::get('site.logo_small_path'), Config::get('site.business.name')) }}
        </div>

        <div class="col-sm-6 text-center">
          <ul class="list-inline">
            <li>
              <a href="#home">Home</a>
            </li>
            <li class="footer-menu-divider">&sdot;</li>
            <li>
              <a href="#services">Services</a>
            </li>
            <li class="footer-menu-divider">&sdot;</li>
            <li>
              <a href="#about">About</a>
            </li>
            <li class="footer-menu-divider">&sdot;</li>
            <li>
              <a href="#location">Location</a>
            </li>
            <li class="footer-menu-divider">&sdot;</li>
            <li>
              <a href="#contact">Contact</a>
            </li>
            <li class="footer-menu-divider">&sdot;</li>
            <li>
              <a href="/faqs">FAQs</a>
            </li>
          </ul>
          <p class="copyright text-muted small">
            Copyright &copy; {{ date('Y') }} {{ Config::get('site.business.name') }}
          </p>
          <div id="social">
            <a href="#" title="Follow us on Facebook"><i class="fa fa-facebook-square"></i></a>
            <a href="#" title="Connect with us on LinkedIn"><i class="fa fa-linkedin-square"></i></a>
            <a href="#" title="Follow us on Twitter"><i class="fa fa-twitter-square"></i></a>
          </div>
        </div>

        <div class="col-sm-3 text-right">
          <p>
            Developed by
            {{ HTML::linkImage(Config::get('site.author_url'), ['title'=>Config::get('site.author')], '/img/tykus.png', ['style'=>'height:40px;width:auto;']) }}
          </p>
        </div>
      </div>
    </div>
  </footer>

  <!-- Back to top link -->
  <a href="#" class="back-to-top" title="Back to top">
    Back to top 
    <i class="fa fa-chevron-up fa-inverse"></i>
  </a>

  <!-- Javascripts -->
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
  <script src="js/app.js"></script>
  <script type="text/javascript">
    var map_info = <?php echo json_encode(Config::get('site.business')); ?>
  </script>
</body>

</html>
