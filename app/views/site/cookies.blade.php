@extends('layouts.site')

@section('content')

  <div class="container">
    <h1>Cookies explained</h1>
    <p>Websites today normally offer some level of interaction - whether it is sending and receiving messages, buying goods or choosing how you wish to view the site. To manage this, small text files called cookies are stored on your computer.</p>
    <p>For more information on cookies and how you can manage your privacy settings, read through the information below. For detailed information about the use of personal information by {{ Config::get('site.business.name') }}, please see our {{ HTML::linkRoute('privacy_path', 'Privacy Statement') }}.</p>

    <hr>

    <h3>What do we use cookies for?</h3>
    <p>Cookies are an important part of the internet. They make using websites much smoother and affect lots of the useful features of websites. There are many different uses for cookies, but they fall into four main groups:</p>
    <ul class="list-unstyled">
      <li><a href="#essential">Essential cookies</a></li>
      <li><a href="#experience">Cookies to improve your browsing experience</a></li>
      <li><a href="#analytics">Analytics cookies</a></li>
      <li><a href="#advertising">Advertising cookies</a></li>
    </ul>


    <h4 id="essential">Essential Cookies</h4>
    <p>Some cookies are essential so you can move around this website and use its features. Without these cookies, services you have asked for cannot be provided. These cookies do not gather information about you that could be used for marketing or remembering where you have been on the internet.</p>
    <p>Here are some examples of essential cookies used by this site:</p>
    <ul class="list-unstyled">
      <li>Some are session cookies which make it possible to navigate through the website smoothly.</li>
    </ul>

    <h4 id="experience">Cookies to improve your browsing experience</h4>
    <p>Some cookies allow the website to remember choices you make, such as your language or region and they provide improved features.</p>
    <p>Here are a few examples of just some of the ways that cookies are used to improve your experience on our websites:</p>
    <ul class="list-unstyled">
      <li>Remembering if you have viewed and acknowledged the Cookies noticce, so you are not asked to do it again.</li>
      <li>Remembering if you have been to the site before. If you are a first-time user, you might see different content to a regular user.</li>
      <li>Showing 'related article' links that are relevant to the page you are looking at.</li>
    </ul>


    <h4 id="analytics">Analytics Cookies</h4>
    <p><em>What are analytic cookies and what information is collected?</em></p>
    <p>We like to keep track of what pages and links are popular and which ones are being visited more infrequently by our users. This is intended to help us keep our site relevant and up to date. It is also very useful to be able to identify trends of how people navigate (find their way through) our site and if they get 'error messages' from web pages.</p>

    <p>This group of cookies, often called <em>'analytics cookies'</em> are used to gather this information. These cookies do not collect information that identifies you. The information collected is anonymous and is grouped with the information from everyone else's cookies. We can then see the overall patterns of usage rather than any one person’s activity. Analytics cookies only record activity on the site you are on and they are only used to improve how a website works.</p>


    <h4 id="advertising">Advertising Cookies</h4>
    <p>This site does not currently use this type of cookie.</p>

    <hr>

    <h3>Controlling my cookies</h3>
    <h4>How can I see and manage my cookies in my browser?</h4>
    <p>All modern web browsers allow you to see what cookies are stroed on your computer. You can choose delete them individually or delete all of them. To find out how to do this visit {{ HTML::link('http://aboutcookies.org') }}, which contains comprehensive information on how to do this on a wide variety of desktop browsers.</p>
  </div>

@stop
