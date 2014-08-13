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
        </ul>
      </div>
    </div>
  </nav>

  <!-- Header -->
  <div id="home" class="intro-header">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="intro-message">
            <img src="{{ Config::get('site.logo_path') }}" class="col-sm-8 col-sm-offset-2 ">
            <div class="clearfix"></div>
            <h3>{{ Config::get('site.business.slogan') }}</h3>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Page Content -->
  <div id="services" class="content-services">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h1 class="section-heading">Services</h1>

          @foreach($services as $service)

          <div class="col-lg-4 service">
            <img class="img-circle" src="{{ $service->image_path }}">
            <h3>{{{ $service->title }}}</h3>
            <p>\{{{ $service->introduction }}}</p>
            <p><a class="btn btn-default pull-right" href="#" role="button">View details »</a>
            </p>
          </div>

          @endforeach

        </div>
      </div>
    </div>
  </div>

  <div id="about" class="content-about">
    <div class="container">
      <div class="row">
        <div class="col-lg-7 col-sm-6">
          <h1 class="section-heading">About</h1>
          <p class="lead">
            <strong>Robert Gill &mdash; Dip. Psych., M.I.A.C.P.</strong> is an integrative psychotherapist/counsellorbased in Dublin city centre.</p>
          <p class="lead">Degree in Integrative Psychotherapy and Counselling. Accredited with the Irish Association of Humanistic and Integrative Psychotherapy (IAHIP) and the Irish Association for Counselling and Psychotherapy (IACP). Accredited supervisor with IAHIP.</p>
          <p class="lead">Specialist experience in anxiety, depression, relationships, body-based psychological problems or 'psychosomatic' problems, trauma, bereavement, eating disorders, addictions, anger management, men’s issues, self esteem, among others.</p>
          </p>
        </div>
        <div class="col-lg-4 col-lg-offset-1 col-sm-6">
          <img class="img-responsive pull-right" src="img/robertgill.jpg" alt="">
        </div>
      </div>
    </div>
  </div>

  <div id="location">
    <div class="content-map" id="map-canvas"></div>
  </div>

  <div id="contact" class="content-contact">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <h2>Contact</h2>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-3">
          <p class="lead">
            <span class="highlight">{{ Config::get('site.business.name') }}</span class="highlight">
            <br>
            {{ Config::get('site.business.address') }}
          </p>
          <p class="lead">
            <i class="fa fa-envelope"></i>
            {{ HTML::mailto(HTML::email(Config::get('site.business.email')), Config::get('site.business.email')) }}
            <br>
            <i class="fa fa-phone"></i>
            {{ Config::get('site.business.mobile') }}
            <br>
            <i class="fa fa-globe"></i>
            {{ HTML::link(Config::get('site.business.url'), Config::get('site.business.url')) }}
          </p>
        </div>
        <div class="col-sm-6 col-sm-offset-3">
          <form method="post" action="/enquiries" class="form-horizontal" role="form" id="contact-form">
            <div class="form-group">
              <input type="text" class="form-control" name="name" placeholder="Name" required>
            </div>
            <div class="form-group">
              <input type="email" class="form-control" name="email" placeholder="Email" required>
            </div>
            <div class="form-group">
              <input type="tel" class="form-control" name="phone" placeholder="Phone" required>
            </div>
            <div class="form-group">
              <textarea class="form-control" name="message" placeholder="Message"></textarea>
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-default" id="submit">
                Send
                <i id="spinner" class="fa fa-spinner fa-spin hidden"></i>
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>


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

  <a href="#" class="back-to-top" title="Back to top">
    <i class="fa fa-chevron-up fa-2x fa-inverse"></i>
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
