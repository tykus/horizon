<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf=8">
  <style type="text/css">
    body { background-color:#dcdcdc; font-family:sans-serif; padding:50px;}
    .container { background-color:#fff; border:1px solid #0a4ce8; color:#333; font-size:1.3em; font-weight:300; margin:0 auto; padding:50px; width:600px; }
    .logo { padding-bottom:50px; }
    dt {float:left; clear:left; width:100px;text-align:right; font-weight:bold; color:#1886ff;}
    dt:after {content:":";}
    dd {margin:0 0 0 110px;padding:0 0 0.5em 0;}
  </style>
</head>
<body>
  <div class="container">
    <div class="logo">
      {{ HTML::image(URL::asset('/img/logo_small.png'), 'Horizon Centre') }}
    </div>
    <dl>
      <dt>Subject</dt>
      <dd>{{ $subject }}</dd>
      <dt>From</dt>
      <dd>{{ $name }}</dd>
      <dt>Email</dt>
      <dd>{{ $email }}</dd>
      <dt>Phone</dt>
      <dd>{{ $telephone }}</dd>
      <dt>Date</dt>
      <dd>{{ $created_at }}</dd>
    </dl>
    <hr>
    <p>{{ $body }}</p>
  </div>
</body>
</html>
