<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="{{ Config::get('site.description') }}">
  <meta name="author" content="{{ Config::get('site.author') }}">

  <title>{{ Config::get('site.business_name') }}</title>

  <!-- CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/horizon.css" rel="stylesheet">
  <link href="font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

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
        <a class="navbar-brand" href="#home">
          <img src="img/logo_white.png" style="height:52px;width:auto;">
        </a>
      </div>
      <div class="collapse navbar-collapse">
        <ul class="nav navbar-nav navbar-right">
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
        <div class="col-lg-12">
          <div class="intro-message">
            <img src="{{ Config::get('site.logo_path') }}" class="col-lg-8 col-lg-offset-2 ">
            <div class="clearfix"></div>
            <h3>{{ Config::get('site.slogan') }}</h3>
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

          <div class="col-lg-4 service">
            <img class="img-circle" src="img/depression.jpg">
            <h3>Counselling &amp; Psychotherapy</h3>
            <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.</p>
            <p><a class="btn btn-default pull-right" href="#" role="button">View details »</a>
            </p>
          </div>

          <div class="col-lg-4 service">
            <img class="img-circle" src="img/addiction.jpg">
            <h3>Dual Diagnosis</h3>
            <p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh.</p>
            <p><a class="btn btn-default pull-right" href="#" role="button">View details »</a>
            </p>
          </div>

          <div class="col-lg-4 service">
            <img class="img-circle" src="img/anxiety.jpg">
            <h3>Young Adults</h3>
            <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
            <p><a class="btn btn-default pull-right" href="#" role="button">View details »</a>
            </p>
          </div>

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
            <strong>Robert Gill &middot; Dip. Psych., M.I.A.C.P.</strong>is an integrative psychotherapist/counsellorbased in Dublin city centre.</p>
          <p class="lead">Degree in Integrative Psychotherapy and Counselling. Accredited with the Irish Association of Humanistic and Integrative Psychotherapy (IAHIP) and the Irish Association for Counselling and Psychotherapy (IACP). Accredited supervisor with IAHIP.</p>
          <p class="lead">Specialist experience in anxiety, depression, relationships, body-based psychological problems or 'psychosomatic' problems, trauma, bereavement, eating disorders, addictions, anger management, men’s issues, self esteem, among others.</p>
          </p>
        </div>
        <div class="col-lg-3 col-lg-offset-2 col-sm-6">
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
        <div class="col-lg-12">
          <h2>Contact</h2>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-3">
          <p class="lead">
            <span class="highlight">{{ Config::get('site.business_name') }}</span class="highlight">
            <br>
            {{ nl2br(Config::get('site.business_address')) }}
          </p>
          <p class="lead">
            <i class="fa fa-envelope"></i> 
            {{ HTML::mailto(HTML::email(Config::get('site.email')), Config::get('site.email')) }}
            <br>
            <i class="fa fa-phone"></i> 
            {{ Config::get('site.mobile') }}
            <br>
            <i class="fa fa-globe"></i> 
            {{ HTML::link(Config::get('site.url'), Config::get('site.url')) }}
          </p>
        </div>
        <div class="col-lg-6 col-lg-offset-3">
          <form method="post" action="process_form.php" class="form-horizontal" role="form" id="contact-form">
            <div class="form-group">
              <input type="text" class="form-control" id="name" placeholder="Name" required>
            </div>
            <div class="form-group">
              <input type="email" class="form-control" id="email" placeholder="Email" required>
            </div>
            <div class="form-group">
              <input type="tel" class="form-control" id="phone" placeholder="Phone" required>
            </div>
            <div class="form-group">
              <textarea class="form-control" id="message" placeholder="Message"></textarea>
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
        <div class="col-lg-6">
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
            Copyright &copy; {{ date('Y') }} {{ Config::get('site.business_name') }}
          </p>
        </div>
        <div class="col-lg-2">
          <img src="{{ Config::get('site.logo_small_path') }}">
        </div>
        <div class="col-lg-3 col-lg-offset-1" id="social">
          <a href="#" class="pull-right" title="Follow us on Facebook"><i class="fa fa-facebook-square"></i></a>
          <a href="#" class="pull-right" title="Connect with us on LinkedIn"><i class="fa fa-linkedin-square"></i></a>
          <a href="#" class="pull-right" title="Follow us on Twitter"><i class="fa fa-twitter-square"></i></a>
        </div>
      </div>
    </div>
  </footer>

  <!-- Javascripts -->
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
  <script src="js/horizon.js"></script>
  <script type="text/javascript">
    var business_location = <?php echo json_encode(Config::get('site.business_location')); ?>
  </script>
</body>

</html>
