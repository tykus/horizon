(function(){

  var HorizonApp = {

    init: function() {
      this.bindEvents();
      this.smoothScroll()
      ;

      if($('#map-canvas').length) {
        this.initMap();
      }

    },

    bindEvents: function() {
      var _this = this;
      $("#contact-form").submit(function(e){
        _this.submitForm(e);
      });
    },

    initMap: function() {

      var myLatLng = new google.maps.LatLng(53.3372335,-6.2501318)

      var mapOptions = {
        zoom: 16,
        center: myLatLng
      };
      map = new google.maps.Map(document.getElementById('map-canvas'),
            mapOptions);

      var marker = new google.maps.Marker({
        position: myLatLng,
        map: map,
        title: 'Horizon Centre'
      });
    },

    smoothScroll: function() {
      $('a[href*=#]:not([href=#])').click(function() {
        if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
          var target = $(this.hash);
          target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
          if (target.length) {
            $('html,body').animate({
              scrollTop: target.offset().top - 82
            }, 1000);
            return false;
          }
        }
      });
    },

    submitForm: function(e) {
      $("#spinner").removeClass("hidden");
      var postData = $(this).serializeArray();
      var formURL = $(this).attr("action");

      window.setTimeout(function(){
        $("#spinner").addClass("hidden");
        $("#submit").removeClass("btn-default").addClass("btn-success").addClass("disabled").html("Your enquiry has been sent");
      }, 2000);

      // $.ajax(
      // {
      //     url : formURL,
      //     type: "POST",
      //     data : postData,
      //     success:function(data, textStatus, jqXHR)
      //     {
      //        $("#spinner").addClass("hidden");
      //        $("#submit").removeClass("btn-default").addClass("btn-success").addClass("disabled").html("Your enquiry has been sent");
      //     },
      //     error: function(jqXHR, textStatus, errorThrown)
      //     {
      //        $("#submit").removeClass("btn-default").addClass("btn-danger").html("Your enquiry has not been sent");
      //     }
      // });
      e.preventDefault(); //STOP default action
      // e.unbind(); //unbind. to stop multiple form submit.
    },




  };

  $(document).ready(function(){
    HorizonApp.init();
  });

})();
