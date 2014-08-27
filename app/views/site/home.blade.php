@extends('layouts.site')

@section('content')
    <!-- Intro -->
    <div id="home" class="intro-header">
      @include('site.home._intro')
    </div>

    <!-- Page Content -->
    <div id="services" class="content-services">
        @include('site.home._services')
    </div>

    <div id="about" class="content-about">
      @include('site.home._about')
    </div>

    <div id="location">
      <div class="content-map" id="map-canvas"></div>
    </div>

    <div id="contact" class="content-contact">
      @include('site.home._contact')
    </div>
@stop
