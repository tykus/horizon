<!DOCTYPE html>
<html>
<head>
  <meta charset="utf=8">
  <style type="text/css">
    body {
      background-color: #1886ff;
      font-family: sans-serif;
    }
    .container {
      background-color: #fff;
      border: 1px solid #0a4ce8;
      color: #333;
      font-size: 1.3em;
      margin: 0 auto;
      padding: 50px;
      width: 600px;
    }
    .logo {
      padding-bottom: 50px
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="logo">
      {{ HTML::image(URL::asset('/img/logo_small.png'), 'Horizon Centre') }}
    </div>
    <p>{{ $body }}</p>
  </div>
</body>
</html>
