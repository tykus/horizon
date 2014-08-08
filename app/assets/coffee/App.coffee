class App
	constructor: ->
		new GoogleMapCanvas(window.business_location) if $('#map-canvas').length
		new ContactForm($('#contact-form')) if $('#contact-form').length
		@bindEvents()


	bindEvents: ->
		$('a[href*=#]:not([href=#])').click (e) => @smoothScroll(e)

	smoothScroll: (e) ->
		elem = e.target
		if (location.pathname.replace(/^\//,'') == elem.pathname.replace(/^\//,'') && location.hostname == elem.hostname)
      target = $(elem.hash)
      target = $("[name=#{this.hash.slice(1)}]") unless target.length
      $('html,body').animate({
        scrollTop: target.offset().top - 82
      }, 1000)
      return false

$ -> 
	new App if $("#horizon").length