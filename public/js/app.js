// Generated by CoffeeScript 1.6.3
(function() {
  var App, ContactForm, Faqs, GoogleMapCanvas;

  App = (function() {
    function App() {
      if ($('#map-canvas').length) {
        new GoogleMapCanvas();
      }
      if ($('#contact-form').length) {
        new ContactForm($('#contact-form'));
      }
      if ($('#faqs').length) {
        new Faqs;
      }
      if ($('#cookies-notice').length) {
        new CookieNotice;
      }
      this.bindEvents();
    }

    App.prototype.bindEvents = function() {
      var _this = this;
      $('a[href*=#]:not([href=#])').click(function(e) {
        return _this.smoothScroll(e);
      });
      $(window).scroll(function(e) {
        return _this.displayBackToTop(e);
      });
      $('.navbar-brand').click(function(e) {
        return _this.backToTop(e);
      });
      return $('.back-to-top').click(function(e) {
        return _this.backToTop(e);
      });
    };

    App.prototype.backToTop = function(e) {
      e.preventDefault();
      $('html, body').animate({
        scrollTop: 0
      }, 1000);
      return false;
    };

    App.prototype.displayBackToTop = function(e) {
      if ($(e.target).scrollTop() > 300) {
        return $('.back-to-top').fadeIn(500);
      } else {
        return $('.back-to-top').fadeOut(500);
      }
    };

    App.prototype.smoothScroll = function(e) {
      var elem, target;
      elem = e.target;
      if (location.pathname.replace(/^\//, '') === elem.pathname.replace(/^\//, '') && location.hostname === elem.hostname) {
        target = $(elem.hash);
        if (!target.length) {
          target = $("[name=" + (this.hash.slice(1)) + "]");
        }
        $('html,body').animate({
          scrollTop: target.offset().top - 80
        }, 1000);
        return false;
      }
    };

    return App;

  })();

  $(function() {
    if ($("#horizon").length) {
      return new App;
    }
  });

  ContactForm = (function() {
    function ContactForm() {
      this.contactForm = $("#contact-form");
      this.formURL = this.contactForm.attr("action");
      this.submitButton = this.contactForm.find("button[type=submit]");
      this.spinner = this.submitButton.find("#spinner");
      this.bindEvents();
    }

    ContactForm.prototype.bindEvents = function() {
      var _this = this;
      return this.contactForm.submit(function(e) {
        return _this.submitForm(e);
      });
    };

    ContactForm.prototype.submitForm = function(e) {
      var formData,
        _this = this;
      e.preventDefault();
      formData = this.contactForm.serialize();
      this.showSpinner();
      return $.ajax({
        url: this.formURL,
        type: "POST",
        data: formData,
        success: function(data, textStatus, jqXHR) {
          _this.hideSpinner();
          return _this.markSubmitSuccess();
        },
        error: function(jqXHR, textStatus, errorThrown) {
          _this.hideSpinner();
          return _this.markSubmitError();
        }
      });
    };

    ContactForm.prototype.showSpinner = function() {
      return this.spinner.removeClass("hidden");
    };

    ContactForm.prototype.hideSpinner = function() {
      return this.spinner.addClass("hidden");
    };

    ContactForm.prototype.markSubmitSuccess = function() {
      return this.submitButton.removeClass("btn-default").addClass("btn-success").addClass("disabled").html("Your enquiry has been sent");
    };

    ContactForm.prototype.markSubmitError = function() {
      return this.submitButton.removeClass("btn-default").addClass("btn-danger").html("Your enquiry has not been sent");
    };

    return ContactForm;

  })();

  Faqs = (function() {
    function Faqs() {
      this.bindEvents();
    }

    Faqs.prototype.bindEvents = function() {
      var _this = this;
      $('.list-group-item').on('click', function(e) {
        return _this.highlightSelected(e);
      });
      return $(window).scroll(function() {
        if ($(window).scrollTop() === 0) {
          return _this.resetColors();
        }
      });
    };

    Faqs.prototype.highlightSelected = function(e) {
      var anchor;
      anchor = $(e.target).attr('href');
      return this.changeColors(anchor, '#0bd7ff');
    };

    Faqs.prototype.changeColors = function(elem, hex) {
      return $(elem).find('.panel').css('border-color', hex).find('.panel-heading').css('background-color', hex).css('border-color', hex);
    };

    Faqs.prototype.resetColors = function() {
      var _this = this;
      return $('.panel-wrapper').each(function(index, item) {
        return _this.changeColors(item, "#1866ff");
      });
    };

    return Faqs;

  })();

  GoogleMapCanvas = (function() {
    function GoogleMapCanvas() {
      this.business = window.map_info;
      this.buildMap();
      this.bindEvents();
    }

    GoogleMapCanvas.prototype.bindEvents = function() {
      var _this = this;
      return google.maps.event.addListener(this.marker, 'click', function() {
        return _this.infoWindow.open(_this.map, _this.marker);
      });
    };

    GoogleMapCanvas.prototype.buildMap = function() {
      var latitude, longitude, mapOptions, _ref;
      _ref = this.business.location.split(","), longitude = _ref[0], latitude = _ref[1];
      this.horizon = new google.maps.LatLng(longitude, latitude);
      mapOptions = {
        zoom: 16,
        scrollwheel: false,
        streetViewControl: false,
        center: this.horizon,
        panControl: false,
        zoomControl: true,
        scaleControl: true
      };
      this.map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
      return this.placeMarker();
    };

    GoogleMapCanvas.prototype.placeMarker = function() {
      var content;
      content = "<img src=\"/img/logo_small.png\"><br>\n" + this.business.address + "<br>\n" + this.business.phone + "<br>\n<a href=\"mailto:" + this.business.email + "\">" + this.business.email + "</a>";
      this.infoWindow = new google.maps.InfoWindow({
        content: content
      });
      return this.marker = new google.maps.Marker({
        position: this.horizon,
        map: this.map,
        title: this.business.name
      });
    };

    return GoogleMapCanvas;

  })();

}).call(this);
